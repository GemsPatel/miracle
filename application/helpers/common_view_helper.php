<?php
/**
 * @package cs_: cmn_vw
 * @version 1.0
 * @author Cloud Webs Team
 * common view helper<br> 
 * layer functions which responds to both Web and REST clients  
 */

/**
 * contact us form
 */
function cmn_vw_contact()
{
	$CI =& get_instance();
	$CI->load->model('mdl_home','hom');
	$cmn_vw = array();

	$CI->form_validation->set_rules('pm_name','Full Name','trim|required');
	$CI->form_validation->set_rules('pm_email','Email Id','trim|required|valid_email');
	$CI->form_validation->set_rules('pm_phone','Phone Number','trim|required|numeric');
	$CI->form_validation->set_rules('pm_message','Message','trim|required');

	$data = array();
	if($CI->form_validation->run() == FALSE)
	{
		$data = $CI->form_validation->get_errors();
		echo json_encode($data);
	}
	else
	{
		$CI->hom->feedback();
		$data['success'] = getLangMsg("s_msg");
		echo json_encode($data);
	}
}	

/******************************* login signup functions ***********************************/

/**
 * @return multitype:NULL Ambigous <multitype:, string, number, NULL, multitype:string , unknown>
 */
function cmn_vw_guestSignup()
{}

/**
 * Create Date 08-05-2018 For Use restAPI
 * Login / Signin Form
 */
function cmn_vw_login()
{}

/**
 * created Date 09-05-2015
 * New Register / signup form
 */
function cmn_vw_signup()
{}

/**
 * created Date 11-05-2018
 * forgot password form
 */
function cmn_vw_forgot()
{}

/**
 * @return multitype:Ambigous <multitype:, string, unknown, multitype:string , number, NULL>
 */
function cmn_vw_logout()
{}

/******************************* login signup functions end ***********************************/

/**
 * Create date : 15-05-2018
 * change password to restAPI / Desktop
 */
function cmn_vw_changePassword()
{}

/**
 * Create date : 15-05-2018
 * InviteFriends to restAPI / Desktop
 */
function cmn_vw_invitefriend()
{}

/******************************* account panel functions ***********************************/

/**
 * Create date : 15-05-2018
 * Save New Address Book to restAPI / Desktop
 */
function cmn_vw_saveAddress( &$__this )
{}

/******************************* account panel functions end ********************************/

/******************************* Autoload functions start ********************************/

/**
 * autoload client dropdown by type any keyword in to inputbox
 */
function cmn_vw_getAutoClientName( $keyword )
{
    $CI =& get_instance();
    $CI->db->select( "client.client_id, CONCAT( client.c_name, ' | ', c.city_name) as c_name" );
    $CI->db->from( "client" );
    $CI->db->order_by( "client.c_name", "ASC" );
    $CI->db->like( "client.c_name", $keyword);
    $CI->db->join( "city c", "c.city_id = client.city_id");
    $res = $CI->db->get();
    return $res->result_array();
}

/**
 * autoload state dropdown by type any keyword in to inputbox
 */
function cmn_vw_getAutoClientSupply( $keyword )
{
    $CI =& get_instance();
    $CI->db->order_by( 'state_name', 'ASC' );
    $CI->db->like( "state_name", $keyword);
    return $CI->db->get( "state" )->result_array();
}

/**
 * autoload Port code dropdown by type any keyword in to inputbox
 */
function cmn_vw_getAutoPortCode( $keyword )
{
    $CI =& get_instance();
    $CI->db->order_by( 'ipc_state_name', 'ASC' );
    $CI->db->like( "ipc_state_name", $keyword);
    return $CI->db->get( "invoice_post_code" )->result_array();
}

/**
 * autoload city dropdown by type any keyword in to inputbox
 */
function cmn_vw_getAutoClientCity( $keyword )
{
    $CI =& get_instance();
    $CI->db->order_by( 'city_name', 'ASC' );
    $CI->db->like( "city_name", $keyword);
    return $CI->db->get( "city" )->result_array();
}

/**
 * autoload product dropdown by type any keyword in to inputbox
 */
function cmn_vw_getAutoProduct( $keyword )
{
    $CI =& get_instance();
    $CI->db->order_by( 'p_name', 'ASC' );
    $CI->db->like( "p_name", $keyword);
    return $CI->db->get( "product" )->result_array();
}

/**
 * autoload product dropdown by type any keyword in to inputbox
 */
function cmn_vw_getAutoContent( $keyword )
{
	$CI =& get_instance();
	$CI->db->order_by( 'c_name', 'ASC' );
	$CI->db->like( "c_name", $keyword);
	return $CI->db->get( "content" )->result_array();
}

/******************************* Autoload functions end ********************************/