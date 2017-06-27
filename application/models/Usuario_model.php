<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends MY_Model {

	protected $_table_name;
	protected $_primary_key;
	protected $_primary_filter = 'intval';
	protected $_order_by;
	public 	  $rules = [
	array(
		'field' => 'nome',
		'label' => 'nome',
		'rules' => 'trim|required'
		),
	array(
		'field' => 'email',
		'label' => 'e-mail',
		'rules' => 'trim|required|valid_email'
		),
	array(
		'field' => 'senha',
		'label' => 'senha',
		'rules' => 'required'
		),
	array(
		'field' => 'senhaconf',
		'label' => 'confirmação de senha',
		'rules' => 'required|matches[senha]'
		),
	];

	public function __construct()
	{
		parent::__construct();
		$this->initialize();
	}
}

/* End of file Usuario_model.php */
/* Location: ./application/models/Usuario_model.php */