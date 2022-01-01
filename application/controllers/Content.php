<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller 
{
	var $c_alias = '';
	var $menu_id = '';
	var $controller = 'content';
	var $start = 0; //pagination variable
	var $is_ajax = false;
	var $cAutoId = 'content_id';
	var $cPrimaryId = '';
	var $cTable = 'content';
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('admin/mdl_content','content');
        $this->content->cTableName = $this->cTable;
        $this->content->cAutoId = $this->cAutoId; 
        
        $segArr = $this->uri->segment_array();
        $this->is_ajax = $this->input->is_ajax_request();
        
        $this->menu_id = end($segArr);
        
        $this->c_alias = $segArr;
            
    }
    
	public function index()
	{
		$data['pageName'] = 'content_details';
		$data['title'] = 'Miracle Bahrain';
		$this->load->view('front-layout',$data);
	}
	
	public function contentDetails()
	{
		$data = $this->content->getData( $this->menu_id )->row_array();
		$data['pageName'] = 'content_details';
		$data['title'] = $data['c_name'];
		$this->load->view('front-layout',$data);
	}
}
