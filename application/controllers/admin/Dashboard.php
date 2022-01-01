<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
	var $is_ajax = false;
	var $cAutoId = 'customer_id';
	var $cPrimaryId = '';
	var $cTable = 'customer';
	var $controller = 'dashboard';
	var $is_post = false;
	var $per_add = 1;
	var $per_edit = 1;
	var $per_delete = 1;
	var $per_view = 1;
	
	function __construct()
	{
		parent::__construct();
		
		if( !$this->session->userdata('admin_id'))
			redirect('admin/lgs');
	}
	
	/*
	 +-----------------------------------------+
	 This function will remap url for admin,
	 and remove unnecesary name from url.
	 For example : if we don't want index
	 strgin in url while listin item, we can
	 remove it using this function
	 +-----------------------------------------+
	 */
	function _remap($method,$params)
	{
		if(method_exists($this,$method))
			return call_user_func_array(array($this, $method), $params);
		else
		{
			$para[0] = $method;
			
			if(count($params) > 0)
				$para = array_merge($para,$params);
				
			//here we are going to call out custom function for load specific menu.
			call_user_func_array(array($this,'index'),$para);
		}
	}
	
	public function index()
	{
		$data['pageName'] = 'admin/dashboard';
		$this->load->view('admin/site-layout',$data);
	}
}