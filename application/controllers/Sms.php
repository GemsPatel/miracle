<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sms extends CI_controller {
	
	var $is_ajax = false;
	var $cAutoId = 'sms_id';
	var $cPrimaryId = '';
	var $cTable = 'sms';
	var $controller = 'sms';
	var $is_post = false;
	var $per_add = 1;
	var $per_edit = 1;
	var $per_delete = 1;
	var $per_view = 1;
	
	//parent constructor will load model inside it
	function __construct()
	{
		parent::__construct();
		
		if( !$this->session->userdata('admin_id'))
			redirect('lgs');
		
		$this->load->model('mdl_sms','cust');
		$this->cust->cTableName = $this->cTable;
		$this->cust->cAutoId = $this->cAutoId; 

		if($this->input->get('item_id') != '' || $this->input->post('item_id') != '')
			$this->cPrimaryId  = $this->cust->cPrimaryId = _de($this->security->xss_clean($_REQUEST['item_id']));
		
// 		$this->chk_permission();	
	}
/**
+----------------------------------------------------+
	check permission for user
+----------------------------------------------------+
*/
	function chk_permission()
	{
		$per =  fetchPermission($this->controller);
		if(!empty($per))
		{
			$this->per_add = @$per['permission_add'];		
			$this->per_edit = @$per['permission_edit'];		
			$this->per_delete = @$per['permission_delete'];		
			$this->per_view = @$per['permission_view'];		
		}
		else 
		{
			showPermissionDenied();
		}
	}	
/*
+-----------------------------------------+
	This function will remap url for admin,
	and remove unnecesary name from url.
	For exaconle : if we don't want index
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
	
	function customerEmail($str)
	{
		if($this->cPrimaryId)
			$this->db->where($this->cAutoId." !=",$this->cPrimaryId);
			
		$c = $this->db->where('customer_emailid',$str)->get($this->cTable)->num_rows();
		if($c > 0)
		{
			$this->form_validation->set_message('customerEmail', 'This '.$str.' already exist in database, please try different.');
			return false;
		}
		else
		return true;
	}
	
	function index($start = 0)
	{
		$num = $this->cust->getData();
		$data = pagiationData($this->controller,$num->num_rows(),$start,3);
		//echo $this->db->last_query();
		
		$data['start'] = $start;
		$data['total_records'] = $num->num_rows();
		$data['per_page_drop'] = per_page_drop();
		$data['srt'] = $this->input->get('s'); // sort order
		$data['field'] = $this->input->get('f'); // sort field name
		
		if($this->is_ajax)
		{
			$this->load->view('admin/'.$this->controller.'/ajax_html_data',$data);
		}
		else
		{
			$data['pageName'] = $this->controller.'/'.$this->controller.'_list';
			$this->load->view('site-layout',$data);
		}
	}
/*
+-----------------------------------------+
	Function will save data, all parameters 
	will be in post method.
+-----------------------------------------+
*/
	function smsForm()
	{
		$data = array();
		
		$this->form_validation->set_rules('sms_content','Message Content','trim|required');
		
		if($this->input->get('edit') == 'true')
		{
			$dt =  array();
			if($this->cPrimaryId != '' && $this->cPrimaryIdA != '') // if primary id then we have to fetch those primary Id data
			{
				$dt = $this->cust->getData();
			}
			$dt['pageName'] = $this->controller.'/'.$this->controller.'_form';
			$this->load->view('layout',$dt);
		}
		else
		{
			$this->is_post = true;
			if($this->form_validation->run() == FALSE )
			{
				$data['error'] = $this->form_validation->get_errors();
				
				setFlashMessage('error',getErrorMessageFromCode('01005'));
				
				$data['pageName'] = $this->controller.'/'.$this->controller.'_form';
				$this->load->view('site-layout',$data);
			}
			else // saving data to database
			{
				
				$this->cust->cPrimaryId = $this->cPrimaryId; // setting variable to model
				$this->cust->saveData();
				
				redirect($this->controller);
			}
		}
		
	}
	
	function deleteData()
	{	
		if($this->per_delete == 0)
		{
			$ids = $this->input->post('selected');
			$this->cust->deleteData($ids);
		}
		else
			echo json_encode(array('type'=>'error','msg'=>getErrorMessageFromCode('01009')));
	}
/*
+-----------------------------------------+
	Update status for enabled/disabled
	@params : post array of ids,status
+-----------------------------------------+
*/	
	function updateStatus()
	{
		if($this->per_edit == 0)
			$this->cust->updateStatus();
		else
			echo json_encode(array('type'=>'error','msg'=>getErrorMessageFromCode('01008')));	
	}
}