<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $_table_name;
	protected $_primary_key;
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	public 	  $rules = array();


	protected function initialize($table = '')
	{
		/* se não informar a tabela, pegar pelo nome do model*/
		if (!empty($table)) {
			$this->_table_name = $table;
		}
		else{
			$table = strtolower(get_class($this));
			$_table_name = explode('_', $table);
			$this->_table_name = $_table_name[0];
		}
		/*Se não informado o valor para chave primária*/
		if(empty($primary_key)){
			$this->_primary_key = $this->_table_name.'_id';
		}
		if(!empty($this->_order_by)){
			$this->_order_by = $this->_primary_key;
		}
	}

	public function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}
	public function get($id = NULL, $single = FALSE)
	{
		if($id != NULL){
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key,$id);
			$method = 'row';
		}
		elseif($single == TRUE){
			$method = 'row';
		}
		else{
			$method = 'result';
		}
		if(!count($this->db->order_by($this->_order_by))){
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name)->$method();
	}


	public function get_by($where, $single = FALSE)
	{
		$this->db->where($where);
		return $this->get(NULL, $single);
	}


	public function save($data, $id = NULL)
	{
		//insert
		if ($id == NULL) {
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}
		//update
		else{
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key,$id);
			$this->db->update($this->_table_name);
		}
		return $id;
	}
	

	public function delete($id)
	{
		$filter = $this->_primary_filter;
		$id = $filter($id); 
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key, $id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}

}

/* End of file  */
/* Location: ./application/models/ */