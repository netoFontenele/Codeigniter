<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model','usuario');
	}

	public function index()
	{
		$data = [
		'usuarios' => $this->usuario->get()
		];
		$this->load->view('_layout', $data);
	}
	public function view(){
		$data = [
		'usuario' => $this->usuario->get($this->uri->segment(3),TRUE)
		];
		$this->load->view('_layout', $data);
	}
	public function add()
	{
		$rules = $this->usuario->rules;
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE){
			$data = $this->usuario->array_from_post(array('nome','email','senha'));
			$data['senha'] = md5($data['senha']);
			$this->usuario->save($data);
			$this->session->set_flashdata('success','Usuário salvo com sucesso !');
			redirect('usuario');
		}
		$this->load->view('_layout');
	}
	public function edit()
	{
		$id = $this->uri->segment(3);
		$rules = $this->usuario->rules;
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == TRUE){
			$data = $this->usuario->array_from_post(array('nome','email','senha'));
			$data['senha'] = md5($data['senha']);
			$this->usuario->save($data,$this->input->post('id'));
			$this->session->set_flashdata('success','Usuário editado com sucesso !');
			redirect('usuario');
		}
		$data = array('usuario' => $this->usuario->get($id,TRUE));
		$this->load->view('_layout',$data);
	}
	public function delete($id)
	{
		$this->usuario->delete($id);
		$this->session->set_flashdata('success','Usuário deletado com sucesso !');
		redirect('usuario');
	}
}

/* End of file Usuario.php */
/* Location: ./application/controllers/Usuario.php */