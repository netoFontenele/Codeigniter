<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model','login');
	}

	public function index()
	{
		$rules = $this->login->rules;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			if($this->login->login() == TRUE){
				redirect('dashboard','refresh');
			}
			else{
				$this->session->set_flashdata('danger','não foi possível fazer a autenticação !');
			}
		}
		$this->load->view('_layout');
	}
	public function logout()
	{
		redirect('login','refresh');
		$this->session->sess_destroy();
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */