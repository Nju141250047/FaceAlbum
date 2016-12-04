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
		),
		'Account/settings' => array ( // �û����ù���
				array (
						'field' => 'password',
						'label' => '����',
						'rules' => 'trim|required|min_length[4]|max_length[12]'
				),
				array (
						'field' => 'email',
						'label' => '��������',
						'rules' => 'trim|required|valid_email'
				),
				array (
						'field' => 'telnum',
						'label' => '�ֻ�����',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'age',
						'label' => '����',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'height',
						'label' => '���',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'weight',
						'label' => '����',
						'rules' => 'trim|required'
				),
		), 
		'Health/plan' => array ( // �û�ע����Ĺ���
				array (
						'field' => 'content',
						'label' => '����',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'starttime',
						'label' => '��ʼʱ��',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'endtime',
						'label' => '����ʱ��',
						'rules' => 'trim|required'
				)
		),
);