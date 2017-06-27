<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!is_loggedin()){
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$this->load->view('_Layout');
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */