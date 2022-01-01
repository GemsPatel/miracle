<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mail_templates extends CI_Controller {
	
	var $is_ajax = false;
	var $cAutoId = 'template_id';
	var $cPrimaryId = '';
	var $cTable = 'mail_templates';
	var $controller = 'mail_templates';
	var $is_post = false;
	var $per_add = 1;
	var $per_edit = 1;
	var $per_delete = 1;
	var $per_view = 1;
	
	//parent constructor will load model inside it
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/mdl_mail_templates','shipme');
		$this->shipme->cTableName = $this->cTable;
		$this->shipme->cAutoId = $this->cAutoId;
		$this->is_ajax = $this->input->is_ajax_request();
		
		if($this->input->get('item_id') != '' || $this->input->post('item_id') != '')
			$this->cPrimaryId  = $this->shipme->cPrimaryId = _de($this->security->xss_clean($_REQUEST['item_id']));
		if((int)$this->session->userdata('admin_id')!=0)
		{
			$res = checkIsSuperAdmin();
			if(!$res)
			{
			    setFlashMessage('error',getErrorMessageFromCode( '01023' ) );
				adminRedirect('admin/dashboard');
			}
		}
	
		$this->chk_permission();
		
		$this->is_post = ($_SERVER['REQUEST_METHOD']=='POST')?true:false;
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

/*
+--------------------------------------------------+
	function will check banner name, return error
	if name already exist.
+--------------------------------------------------+
*/	
	function mailTemplateName($str)
	{
		if($this->cPrimaryId)
		$this->db->where($this->cAutoId." !=",$this->cPrimaryId);
			
		$c = $this->db->where('template_name',$str)->get($this->cTable)->num_rows();
		if($c > 0)
		{
			$this->form_validation->set_message('mailTemplateName', getErrorMessageFromCode( '01025' ) );
			return false;
		}
		else
		return true;
	}
	function mailTemplatekey($str)
	{
		if($this->cPrimaryId)
		$this->db->where($this->cAutoId." !=",$this->cPrimaryId);
		$c = $this->db->where('template_key',$str)->get($this->cTable)->num_rows();
		if($c > 0)
		{
			$this->form_validation->set_message('mailTemplatekey', getErrorMessageFromCode( '01026' ) );
			return false;
		}
		else
		return true;
	}
	function index($start = 0)
	{
		$logType = 'V';
		saveAdminLog($this->router->class, 'Mail Templates', $this->cTable, $this->cAutoId, 0, $logType);
		if($this->per_view != 0)
		{
		    setFlashMessage('error',getErrorMessageFromCode( '01010' ) );
			showPermissionDenied();
		}
		
		$data = array();
		$num = $this->shipme->getData();
		$data = pagiationData('admin/'.$this->controller,$num->num_rows(),$start,3);
		
		$data['start'] = $start; //starting position of records
		$data['total_records'] = $num->num_rows(); // total num of records
		$data['per_page_drop'] = per_page_drop(); // per page dropdown
		$data['srt'] = $this->input->get('s'); // sort order
		$data['field'] = $this->input->get('f'); // sort field name
		$data['text_name'] = $this->input->get('text_name');
		$data['text_key'] = $this->input->get('text_key');
		$data['text_subject'] = $this->input->get('text_subject');
		$data['status_filter'] = ($this->input->get('status_filter') != '')?$this->input->get('status_filter'):'-1'; // filter by status

		if($this->is_ajax)
		{
			$this->load->view('admin/'.$this->controller.'/ajax_html_data',$data); // this view loaded on ajax call
		}
		else
		{
			$data['pageName'] = 'admin/'.$this->controller.'/'.$this->controller.'_list';
			$this->load->view('admin/site-layout',$data);
		}
	}
/*
+-----------------------------------------+
	Function will save data, all parameters 
	will be in post method.
+-----------------------------------------+
*/
	function mail_TemplatesForm()
	{
		if($this->cPrimaryId != '')
		{
			if($this->per_edit != 0)
			{
			    setFlashMessage('error',getErrorMessageFromCode( '01008' ) );
				showPermissionDenied();
			}
		}
		else if($this->per_add != 0)
		{
		    setFlashMessage('error',getErrorMessageFromCode( '01007' ) );
			showPermissionDenied();
		}
		$data = array();
		$this->form_validation->set_rules('template_name','Template Name','trim|required|callback_mailTemplateName');
		if(!$this->cPrimaryId)
		{
			$this->form_validation->set_rules('template_key','Template Key','trim|required|callback_mailTemplatekey');
		}
		$this->form_validation->set_rules('template_content','Content','trim|required');
		$this->form_validation->set_rules('template_subject','Subject','trim|required');
		if($this->input->get('edit') == 'true')
		{
			$dt =  array();
			if($this->cPrimaryId != '') // if primary id then we have to fetch those primary Id data
			{
				$dtArr = $this->shipme->getData();
				$dt = $dtArr->row_array();
			}
			$dt['pageName'] = 'admin/'.$this->controller.'/'.$this->controller.'_form';
			$this->load->view('admin/site-layout',$dt);
		}
		else
		{
			if($this->form_validation->run() == FALSE )
			{
				$data['error'] = $this->form_validation->get_errors();
				if($data['error'])
				    setFlashMessage('error',getErrorMessageFromCode( '01005' ) );
				
				$data['pageName'] = 'admin/'.$this->controller.'/'.$this->controller.'_form';
				$this->load->view('admin/site-layout',$data);
			}
			else // saving data to database
			{
				$this->shipme->cPrimaryId = $this->cPrimaryId; // setting variable to model
				
  			 	$this->shipme->saveData();
				redirect('admin/'.$this->controller);
			}
		}
		
	}
	
/*
+-----------------------------------------+
	Delete artegory, single artegory and multiple
	artegory from single function call.
	@params : Item id. OR post array of ids
+-----------------------------------------+
*/		
	function deleteData()
	{
		if($this->per_delete == 0)
		{	
		    $ids = $this->input->post('id');
			$this->shipme->deleteData($ids);
		}
		else
		    echo json_encode(array('type'=>'error','msg'=>getErrorMessageFromCode( '01009' ) ) );
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
			$this->shipme->updateStatus();
		else
		    echo json_encode(array('type'=>'error','msg'=>getErrorMessageFromCode( '01008' ) ) );		
	}
}