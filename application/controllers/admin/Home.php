<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
    function __construct()
	{
		parent::__construct();
// 		$this->load->model('mdl_home','hom');
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
// 	function _remap($method,$params)
// 	{
// 		if(method_exists($this,$method))
// 			return call_user_func_array(array($this, $method), $params);
// 		else
// 		{
// 			$para[0] = $method;
			
// 			if(count($params) > 0)
// 				$para = array_merge($para,$params);
				
// 			//here we are going to call out custom function for load specific menu.
// 			call_user_func_array(array($this,'index'),$para);
// 		}
// 	}
	
	public function index()
	{
		$data['pageName'] = 'dashboard';
		$this->load->view('site-layout',$data);
	}
}