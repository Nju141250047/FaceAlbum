<?php
$config = array (
		'Account/login' => array ( // ��¼���Ĺ���
				array (
						'field' => 'username',
						'label' => '�û���',
						'rules' => 'trim|required|callback_username_check' 
				),
				array (
						'field' => 'password',
						'label' => '����',
						'rules' => 'trim|required|callback_password_check' 
				) 
		),
		'Account/register' => array ( // �û�ע����Ĺ���
				array (
						'field' => 'username',
						'label' => '�û���',
						'rules' => 'trim|required|callback_username_exists' 
				),
				array (
						'field' => 'password',
						'label' => '����',
						'rules' => 'trim|required|min_length[4]|max_length[12]' 
				),
				array (
						'field' => 'email',
						'label' => '�����˺�',
						'rules' => 'trim|required|valid_email|callback_email_exists' 
				) 
		) 
);