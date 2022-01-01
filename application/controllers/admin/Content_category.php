<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content_category extends CI_controller {
	
	var $is_ajax = false;
	var $cAutoId = 'content_category_id';
	var $cPrimaryId = '';
	var $cTable = 'content_category';
	var $controller = 'content_category';
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
			redirect('admin/lgs');
		
		$this->load->model('admin/mdl_content_category','cc');
		$this->cc->cTableName = $this->cTable;
		$this->cc->cAutoId = $this->cAutoId; 
		$this->is_ajax = $this->input->is_ajax_request();
		
		if($this->input->get('item_id') != '' || $this->input->post('item_id') != '')
		    $this->cPrimaryId  = $this->cc->cPrimaryId = _de($this->security->xss_clean($_REQUEST['item_id']));
		
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
	
	function content_sku($str)
	{
		if($this->cPrimaryId)
			$this->db->where($this->cAutoId." !=",$this->cPrimaryId);
			
		$c = $this->db->where('c_sku',$str)->get($this->cTable)->num_rows();
		if($c > 0)
		{
			$this->form_validation->set_message('c_sku', getErrorMessageFromCode( '01026' ) );
			return false;
		}
		else
		  return true;
	}
	
	/*
	 +-----------------------------------------+
	 Function will save data, all parameters
	 will be in post method.
	 +-----------------------------------------+
	 */
	function bannerSize($str)
	{
		/**
		 * get uploaded file size in KB
		 */
		$filesize = round($_FILES['c_banner']['size'] / 1024);
		$allowedSize = getField("config_value", "configuration", "config_key","MANAGE_ARTICAL_IMG_UPLOAD_SIZE");
		$allowedrec = getField("config_value", "configuration", "config_key","ARTICAL_REC_IMG");
		
		if($filesize > $allowedSize)
		{
			$this->form_validation->set_message('bannerSize', '(Maximum allowed size is : '.$allowedSize.' KB,'.$allowedrec.', your uploaded file size is '.$filesize.' KB.)');
			return false;
		}
		else
		{
			return true;
		}
	}
	
	function index($start = 0)
	{
	    $logType = 'V';
	    saveAdminLog($this->router->class, 'cc', $this->cTable, $this->cAutoId, 0, $logType);
	    if($this->per_view != 0)
	    {
	        setFlashMessage('error',getErrorMessageFromCode( '01010' ) );
	        showPermissionDenied();
	    }
	    
	    $data = array();
	    $num = $this->cc->getData();
		$data = pagiationData( 'admin/'.$this->controller,$num->num_rows(),$start,3);
		
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
	function content_categoryForm()
	{		
		$data = array();
		
		$this->form_validation->set_rules('cc_name','Content Name','trim|required');
		
		if($this->input->get('edit') == 'true')
		{
			$dt =  array();
			if( $this->cPrimaryId != '' ) // if primary id then we have to fetch those primary Id data
			{
			    $dtArr = $this->cc->getData();
			    $dt = $dtArr->row_array();
			}
			$dt['pageName'] = 'admin/'.$this->controller.'/'.$this->controller.'_form';
			$this->load->view('admin/site-layout',$dt);
		}
		else if($this->input->get('view') == 'true')
		{
		    $dt =  array();
		    if( $this->cPrimaryId != '' ) // if primary id then we have to fetch those primary Id data
		    {
		        $dtArr = $this->cc->getData();
		        $dt = $dtArr->row_array();
		    }
		    $dt['pageName'] = 'admin/'.$this->controller.'/'.$this->controller.'_view_form';
		    $this->load->view('admin/site-layout',$dt);
		}
		else
		{
			$this->is_post = true;
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
			    $this->cc->cPrimaryId = $this->cPrimaryId; // setting variable to model
			    $this->cc->saveData();
				redirect('admin/'.$this->controller);
			}
		}
	}
	
	/*
	 *
	 */
	function getProductData()
	{
	    $id = $this->input->post('id');
	    $data = $this->cc->getData( $id );
	    echo json_encode( $data->result_array() );
	}

    /**
     * delete specific record
     */		
	function deleteData()
	{	
		if($this->per_delete == 0)
		{
			$ids = $this->input->post('id');
			$this->cc->deleteData($ids);
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
		    $this->cc->updateStatus();
		else
		    echo json_encode(array('type'=>'error','msg'=>getErrorMessageFromCode( '01008' ) ) );	
	}
	
	/**
	 *	This Function will export cc information
	 downloaded and create csv/xls file.
	 */
	function exportDataSample()
	{
	    if($this->per_view != 0)
	    {
	        setFlashMessage('error',getErrorMessageFromCode( '01010' ) );
	        showPermissionDenied();
	    }
	    
	    $this->cc->exportDataSample();
	}
	
/*
+-----------------------------------------+
	This Function will cc information 
	downloaded and create csv/xls file.
+-----------------------------------------+
*/	
	function exportData()
	{
	    if($this->per_view != 0)
	    {
	        setFlashMessage('error',getErrorMessageFromCode( '01010' ) );
	        showPermissionDenied();
	    }
	    
	    $this->cc->exportData();
	}
	
	/**
	 +-----------------------------------------+
	 function for import data from csv file and
	 insert into pincode table
	 format:: pincode,areaname,cityname,state_id
	 +-----------------------------------------+
	 */
	function importData()
	{
	    if($this->per_edit != 0)
	    {
	        setFlashMessage('error',getErrorMessageFromCode( '01008' ) );
	        showPermissionDenied();
	    }
	    
	    if($this->per_add != 0)
	    {
	        setFlashMessage('error',getErrorMessageFromCode( '01007' ) );
	        showPermissionDenied();
	    }
	    
	    if(isset($_FILES['import_csv']['name']))
	    {
	        $name = $_FILES['import_csv']['name'];
	        $pos  = strpos($name,".");
	        $type = strtoupper(substr($name,$pos+1));
	        
	        if( $type=='CSV' || $type=='XLS' )
	        {
	            $this->cc->importData( $this );
	            setFlashMessage('success',getErrorMessageFromCode( '01030' ) );
	            redirect('admin/'.$this->controller);
	        }
	        else
	        {
	            setFlashMessage('error',getErrorMessageFromCode( '01031' ) );
	            redirect('admin/'.$this->controller);
	        }
	    }
	    else
	    {
	        setFlashMessage('error',getErrorMessageFromCode( '01031' ) );
	        redirect('admin/'.$this->controller);
	    }
	}
	
	/**
	 *
	 */
	function importDataProcess()
	{
	    $path = $this->input->get("path");
	    $start = $this->input->get("start");
	    $this->cc->importDataProcess( $path, $start );
	}}

