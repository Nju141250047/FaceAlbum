<?php
class Account_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	
	/**
	 * ����û�session����,�����û�����״̬
	 *
	 * @param string $username        	
	 */
	function login($username) {
		$data = array (
				'username' => $username,
				'logged_in' => TRUE 
		);
		$this->session->set_userdata ( $data ); // ���session����
	}
	
	/**
	 * ע���û�
	 *
	 * @return boolean
	 */
	function logout() {
		if ($this->session->userdata ( 'logged_in' ) === TRUE) {
			$this->session->sess_destroy (); // ��������session������
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * ͨ���û�������û���¼
	 *
	 * @param string $username        	
	 */
	function get_by_username($username) {
		$this->db->where ( 'username', $username );
		$query = $this->db->get ( 'user' );
		// return $query->row(); //���жϻ��ʲôֱ�ӷ���
		if ($query->num_rows () == 1) {
			return $query->row ();
		} else {
			return FALSE;
		}
	}
	function get_by_userid($userid) {
		$this->db->where ( 'userid', $userid );
		$query = $this->db->get ( 'user' );
		// return $query->row(); //���жϻ��ʲôֱ�ӷ���
		if ($query->num_rows () == 1) {
			return $query->row ();
		} else {
			return FALSE;
		}
	}
	
	/**
	 * �û���������ʱ,����false
	 * �û�������ʱ����֤�����Ƿ���ȷ
	 */
	function password_check($username, $password) {
		if ($user = $this->get_by_username ( $username )) {
			return $user->password == $password ? TRUE : FALSE;
		}
		return FALSE; // ���û���������ʱ
	}
	
	/**
	 * ����û�
	 */
	function add_user($username, $password, $email) {
		$data = array (
				'username' => $username,
				'password' => $password,
				'email' => $email 
		);
		$this->db->insert ( 'user', $data );
		if ($this->db->affected_rows () > 0) {
			$this->login ( $username );
			return TRUE;
		}
		return FALSE;
	}
	function update_user($username, $password, $email, $tel, $age, $height, $weight) {
		$data = array (
				'password' => md5 ( "HOBBY" . $password ),
				'email' => $email,
				'tel' => $tel,
				'age' => $age,
				'height' => $height,
				'weight' => $weight 
		);
		$this->db->where ( 'username', $username );
		$this->db->update ( 'user', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	
	/**
	 * ��������˺��Ƿ����.
	 *
	 * @param string $email        	
	 * @return boolean
	 */
	function email_exists($email) {
		$this->db->where ( 'email', $email );
		$query = $this->db->get ( 'user' );
		return $query->num_rows () ? TRUE : FALSE;
	}
}