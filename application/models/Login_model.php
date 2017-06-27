<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends MY_Model {

	public 	  $rules = [
	array(
		'field' => 'email',
		'label' => 'e-mail',
		'rules' => 'trim|required|valid_email'
		),
	array(
		'field' => 'senha',
		'label' => 'senha',
		'rules' => 'required'
		)
	];

	public function __construct()
	{
		parent::__construct();
		$this->initialize('usuario');
	}
	public function login()
	{
		$user = $this->get_by(array(
			'email' => $this->input->post('email'),
			'senha' => md5($this->input->post('senha')),
			), TRUE);
		if(count($user)){
			$data = array(
				'nome' => $user->nome,
				'email' => $user->email,
				'id' => $user->usuario_id,
				'loggedin' => TRUE
				);
			$this->session->set_userdata($data);
			return TRUE;
		}
	}

	public function hash(){}
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */