<?php
class Account extends CI_Controller {
	private $salt;
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'Account_model' );
		$this->load->helper ( array (
				'form',
				'url' 
		) );
		$this->load->library ( array (
				'form_validation',
				'session' 
		) );
		$this->salt = "HOBBY";
	}
	function overview() {
		$this->load->view ( 'account/homepage' );
	}
	function settings() {
		$this->form_validation->set_error_delimiters ( '<span class="error">', '</span>' );
		
		$username = $this->session->userdata ( 'username' ); // �û���
		$data ['userMsg'] = $this->Account_model->get_by_username ( $username );
		
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'account/personal_settings', $data );
		} else {
			$username = $this->session->userdata ( 'username' );
			$password = md5 ( $this->salt . $this->input->post ( 'password' ) );
			$email = $this->input->post ( 'email' );
			$tel = $this->input->post ( 'telnum' );
			$age = $this->input->post ( 'age' );
			$height = $this->input->post ( 'height' );
			$weight = $this->input->post ( 'weight' );
			if ($this->Account_model->update_user ( $username, $password, $email, $tel, $age, $height, $weight )) {
				$data ['message'] = "The information has now been set! You can go " . anchor ( 'account/overview', 'homepage' ) . '.';
			} else {
				$data ['message'] = "There was a problem when set your information. You can set " . anchor ( 'account/settings', 'here' ) . ' again.';
			}
			$this->load->view ( 'account/note', $data );
		}
	}
	/**
	 * ���ա���֤��¼��
	 * �������������ļ�:/config/form_validation.php
	 * 'account/login'=>array( //��¼���Ĺ���
	 * array(
	 * 'field'=>'username',
	 * 'label'=>'�û���',
	 * 'rules'=>'trim|required|xss_clean|callback_username_check'
	 * ),
	 * array(
	 * 'field'=>'password',
	 * 'label'=>'����',
	 * 'rules'=>'trim|required|xss_clean|callback_password_check'
	 * )
	 * )
	 * ������ʾ��Ϣ���ļ���/system/language/english/form_validation_lang.php
	 */
	function login() {
		// ���ô��󶨽��
		$this->form_validation->set_error_delimiters ( '<span class="error">', '</span>' );
		
		$this->_username = $this->input->post ( 'username' ); // �û���
		
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'account/login' );
		} else {
			// ע��session,�趨��¼״̬
			$this->Account_model->login ( $this->_username );
			
			$row = $this->Account_model->get_by_username ( $this->_username );
			$identity = $row->identity;
			if ($identity == "user")
				$data ['message'] = $this->session->userdata ( 'username' ) . ' You have logged in successfully! Now take a look at the ' . anchor ( 'account/overview', 'homepage' );
			else
				$data ['message'] = 'Adminstrator You have logged in successfully! Now take a look at the ' . anchor ( 'management/overview', 'System Management' );
			$this->load->view ( 'account/note', $data );
		}
	}
	
	// ��¼����֤ʱ�Զ���ĺ���
	/**
	 * ��ʾ�û����ǲ����ڵĵ�¼
	 *
	 * @param string $username        	
	 * @return bool
	 */
	function username_check($username) {
		if ($this->Account_model->get_by_username ( $username )) {
			return TRUE;
		} else {
			$this->form_validation->set_message ( 'username_check', '�û���������' );
			return FALSE;
		}
	}
	/**
	 * ����û���������ȷ��
	 */
	function password_check($password) {
		$password = md5 ( $this->salt . $password );
		if ($this->Account_model->password_check ( $this->_username, $password )) {
			return TRUE;
		} else {
			$this->form_validation->set_message ( 'password_check', '�û��������벻��ȷ' );
			return FALSE;
		}
	}
	
	/**
	 * �û�ע��
	 * �������������ļ�:/config/form_validation.php
	 * 'account/register'=>array( //�û�ע����Ĺ���
	 * array(
	 * 'field'=>'username',
	 * 'label'=>'�û���',
	 * 'rules'=>'trim|required|xss_clean|callback_username_exists'
	 * ),
	 * array(
	 * 'field'=>'password',
	 * 'label'=>'����',
	 * 'rules'=>'trim|required|min_length[4]|max_length[12]
	 * |matches[password_conf]|xss_clean'
	 * ),
	 * array(
	 * 'field'=>'email',
	 * 'label'=>'�����˺�',
	 * 'rules'=>'trim|required|xss_clean|valid_email|callback_email_exists'
	 * )
	 * )
	 * ������ʾ��Ϣ���ļ���/system/language/english/form_validation_lang.php
	 */
	function register() {
		// ���ô��󶨽��
		$this->form_validation->set_error_delimiters ( '<span class="error">', '</span>' );
		
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'account/register' );
		} else {
			$username = $this->input->post ( 'username' );
			$password = md5 ( $this->salt . $this->input->post ( 'password' ) );
			$email = $this->input->post ( 'email' );
			if ($this->Account_model->add_user ( $username, $password, $email )) {
				$data ['message'] = "The user account has now been created! You can go " . anchor ( 'account/overview', 'here' ) . '.';
			} else {
				$data ['message'] = "There was a problem when adding your account. You can register " . anchor ( 'account/register', 'here' ) . ' again.';
			}
			$this->load->view ( 'account/note', $data );
		}
	}
	/**
	 * ======================================
	 * ����ע�����֤�ĺ���
	 * 1��username_exists()
	 * 2��email_exists()
	 * ======================================
	 */
	/**
	 * ��֤�û����Ƿ�ռ�á�
	 * ���ڷ���false, ���߷���true.
	 *
	 * @param string $username        	
	 * @return boolean
	 */
	function username_exists($username) {
		if ($this->Account_model->get_by_username ( $username )) {
			$this->form_validation->set_message ( 'username_exists', '�û����ѱ�ռ��' );
			return FALSE;
		}
		return TRUE;
	}
	function email_exists($email) {
		if ($this->Account_model->email_exists ( $email )) {
			$this->form_validation->set_message ( 'email_exists', '�����ѱ�ռ��' );
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * �û��˳�
	 * �Ѿ���¼���˳�������ת��details
	 */
	function logout() {
		$data ['message'] = $this->session->userdata ( 'username' ) . ' You have logged out successfully! ';
		if ($this->Account_model->logout () == TRUE) {
			$this->load->view ( 'account/note', $data );
		} else {
		}
	}
}