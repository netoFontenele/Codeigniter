<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ( ! function_exists('load_content_view'))
{
	function load_content_view($part = NULL){
		$CI =& get_instance();
		if($part != NULL){	
			$url = $CI->router->class.'/'.$part;
		} 
		else{
			$url = $CI->router->class.'/'.$CI->router->method;	
		}
		return $CI->load->view($url);
	}
}

if( !function_exists('btn_edit')){
	function btn_edit($uri){
		return anchor($uri, '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>');
	}
}
if( !function_exists('btn_delete')){
	function btn_delete($uri){
		return anchor($uri, '<i class="fa fa-times" aria-hidden="true"></i>', array('onclick' => "return confirm('Deseja realmente apagar o registro, essa operação não poderá ser desfeita !')"));
	}
}
if( !function_exists('dateTimeToBr')){
	function dateTimeToBr($date){
		if($date)
			return date('d/m/Y H:i', strtotime($date));
	}
}
if( !function_exists('dateTimeToUs')){
	function dateTimeToUs($date){
		if($date)
			return date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $date)));
	}
}
if( !function_exists('is_loggedin')){
	function is_loggedin()
	{
		$CI =& get_instance();
		return (bool) $CI->session->userdata('loggedin');
	}
}