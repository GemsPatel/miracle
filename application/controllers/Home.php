<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    function __construct()
    {
        parent::__construct();
        
        $this->load->model('mdl_home','hom');
//         $this->load->model('mdl_customer','cust');
//         $this->cust->cTableName = $this->cTable;
//         $this->cust->cAutoId = $this->cAutoId;
//         $this->is_ajax = $this->input->is_ajax_request();
            
    }
    
	public function index()
	{
		$data['listArr'] = executeQuery( "SELECT * FROM content WHERE c_status = 0 ORDER BY c_date DESC" );
		$data['pageName'] = 'home';
		$data['title'] = 'Mirable Bahrain';
		$this->load->view('front-layout',$data);
	}
	
	/**
	 * @author Cloud Webs
	 * @abstract Autocomplete Client from database using name on listing page
	 */
	function getAutoClientName()
	{
	    $keyword=$this->input->post('keyword');
	    $data = cmn_vw_getAutoClientName( $keyword );
	    echo json_encode($data);
	}
	
	/**
	 * @author Cloud Webs
	 * @abstract Autocomplete Client from database using name on listing page
	 */
	function getAutoPortCode()
	{
	    $keyword=$this->input->post('keyword');
	    $data = cmn_vw_getAutoPortCode( $keyword );
	    echo json_encode($data);
	}
	
	/**
	 * @author Cloud Webs
	 * @abstract Autocomplete State from database using name on listing page
	 */
	function getAutoClientSupply()
	{
	    $keyword=$this->input->post('keyword');
	    $data = cmn_vw_getAutoClientSupply( $keyword );
	    echo json_encode($data);
	}
	
	/**
	 * @author Cloud Webs
	 * @abstract Autocomplete City from database using city on listing page
	 */
	function getAutoClientCity()
	{
	    $keyword = $this->input->post('keyword');
	    $data = cmn_vw_getAutoClientCity( $keyword );
	    echo json_encode($data);
	}
	
	/**
	 * @author Cloud Webs
	 * @abstract Autocomplete Product from database using product on listing page
	 */
	function getAutoProduct()
	{
	    $keyword = $this->input->post('keyword');
	    $data = cmn_vw_getAutoProduct( $keyword );
	    echo json_encode($data);
	}
	
	/**
	 * @author Cloud Webs
	 * @abstract Autocomplete Product from database using product on listing page
	 */
	function getAutoContent()
	{
		$keyword = $this->input->post('keyword');
		$data = cmn_vw_getAutoContent( $keyword );
		echo json_encode($data);
	}
	
	function downlaodImage()
	{
	    $imageurl  = asset_url( 'assets/invoice_print/2.png' );
	    
	    // Process download
	    if( file_exists( $imageurl ) )
	    {
	        header('Content-Description: File Transfer');
	        header('Content-Type: application/octet-stream');
	        header('Content-Disposition: attachment; filename="'.basename( $imageurl ).'"');
	        header('Expires: 0');
	        header('Cache-Control: must-revalidate');
	        header('Pragma: public');
	        header('Content-Length: ' . filesize( $imageurl ) );
	        ob_clean();
	        flush(); // Flush system output buffer
	        readfile( $imageurl );
	        exit();
	    }
	}
	
	/*
	 +--------------------------------------------------+
	 pop up email subscription
	 function will check email id, return error
	 if name already exist.
	 +--------------------------------------------------+
	 */
	function existsEmailId($str)
	{
// 	    if($this->input->post('newsletter_subscriber_id'))
// 	        $this->db->where($this->input->post('newsletter_subscriber_id')." !=",$this->input->post('newsletter_subscriber_id'));
	    
        $c = $this->db->where('newsletter_email',$str)->get('newsletter_subscriber')->num_rows();
        
        if($c > 0)
        {
            $this->form_validation->set_message('existsEmailId', 'This '.$str.' is already subscribed.');
            return false;
        }
        else
            return true;
	}
	
	public function newsletter()
	{
	    $this->form_validation->set_rules('newsletter_email','Email Id','trim|required|valid_email|callback_existsEmailId');
	    
	    if($this->form_validation->run() == FALSE)
	    {
	        $data = $this->form_validation->get_errors();
	        $data['type'] = "error";
	        echo json_encode($data);
	        die;
	    }
	    else
	    {
	        $this->hom->newsletter();
	        $data['type'] = "success";
	        echo json_encode($data);
	        die;
	    }
// 	    $this->load->view('elements/onload_popup', $data);
	}
	
	function passQuery()
	{
		query( "ALTER TABLE `content` ADD `c_home_image` VARCHAR(100) NULL DEFAULT NULL AFTER `c_images`;" );
	}
}
