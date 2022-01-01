<?php
/**
 * @package cs_: front_end_hlp 
 * @author Cloud Webs Team
 * @version 1.9
 * @abstract front end features helper except cart which features are separate in cart helper
 * @copyright HSquare Tech
 */

/**
 * sets in session inventory currently being navigated in front end in product catlog.
 * It will be helpful mainly for search filter rendering and help search cater the result specific to inventory
 */
function cs_front_end_hlp_loadCatalogNavigationInventory( $inventory_type_id=0 )
{
	if( !empty( $inventory_type_id ) )
		setInventorySession( inventory_typeKeyForId( $inventory_type_id ) );
}

/*
 * @author   Cloud Webs
 * @abstract function will return current balance of customer
 */
	function getCustBalance($customerId)
	{
		$CI =& get_instance();
		if((int)$customerId!=0)
		{
			$res = $CI->db->query("SELECT customer_bucks FROM customer WHERE customer_id=".$customerId." LIMIT 1")->row_array();
			
			unset($CI);						
			if(!empty($res))
				return $res['customer_bucks'];	
			else
				return 0;	
		}
		return 0;	
	}

/*
+------------------------------------------------------------------+
	@author Cloud Webs
	@return : array of row or null empty array if not specified
+------------------------------------------------------------------+
*/
function FetchLayout($css_class,$where)
{
	$resSlider = executeQuery("SELECT module_manager_serialize_menu,module_manager_table_name,module_manager_field_name,
							  module_manager_primary_id FROM module_manager m INNER JOIN banner_position b 
						ON b.banner_position_id=m.position_id WHERE banner_position_alias='".$css_class."' AND module_manager_status=0");
	if(!empty($resSlider))
	{
		$resMenu = executeQuery("SELECT front_menu_id,front_menu_type_id FROM front_menu ".$where);
		$module_manager_serialize_menu = unserialize($resSlider[0]['module_manager_serialize_menu']);
		if(array_key_exists($resMenu[0]['front_menu_type_id'],$module_manager_serialize_menu))
		{
			if(in_array($resMenu[0]['front_menu_id'],$module_manager_serialize_menu[$resMenu[0]['front_menu_type_id']]))
				return $resSlider;
		}
	}
	return array();
}

/*
+------------------------------------------------------------------+
	Get Country name from country id
	@params-> $country_id :  Country id from country table
+------------------------------------------------------------------+
*/
function gc($country_id)
{
	if($country_id)
		return getField('country_name','country','country_id',$country_id);
	else
		return 'Unknown';
}

/*
+------------------------------------------------------------------+
	Get state name from state id
	@params-> $state_id :  state id from state table
+------------------------------------------------------------------+
*/
function gs($state_id)
{
	if($state_id)
		return getField('state_name','state','state_id',$state_id);
	else
		return 'Unknown';
}

/*
+------------------------------------------------------------------+
	Get Menu icon from menu id
	@params-> $className :  classname from menu table
+------------------------------------------------------------------+
*/
function getMenuIcon($className)
{
	if($className)
		return asset_url().getField('am_icon','admin_menu','am_class_name',$className);
	else
		return asset_url()."images/no-image.jpg";
}


// country dropdown for admin panel
function loadCountryDropdown($sel='', $extra='onchange="getStateFromCountry(this.value)" ',$name='country')
{
	$CI =& get_instance();
	$res = $CI->db->where('country_status','1')->order_by('country_name')->get('country')->result_array();
	
	$arr = array(''=>'--- Please select country ---');
	foreach($res as $r)
		$arr[$r['country_id']] = $r['country_name']; 
		
	return form_dropdown($name,$arr,$sel,$extra);
}

/**
* LOAD ALL state FROM DB TABLE
* @param $countryid of which load state
* @param $name name of select box
* @param $selid default selected id
* @param $extra extra property of select
*/
function loadStateDropdown($name, $countryid, $selid=0, $extra='')
{
	$CI =& get_instance();
	
	$arr = array(''=>'--- Please select state ---');
	
	$res = $CI->db->where('country_id',$countryid)->order_by('state_name')->get('state')->result_array();
	foreach($res as $r)
		$arr[$r['state_id']] = $r['state_name']; 

	unset($CI);
	return form_dropdown($name,$arr,$selid,$extra);
}

/*
 * @author   Cloud Webs
 * @abstract function will load city as per state selected
 */
function loadCity($state_id,$sel='')
{
	if(!empty($state_id))
	{
		$CI =& get_instance();

		$res = $CI->db->query('SELECT DISTINCT(city_name) as cityname FROM city WHERE state_id='.$state_id.' ORDER BY cityname')->result_array();
		$html ='<option value="">- Select City -</option>';
		if(!empty($res))
		{
			foreach($res as $k=>$ar)
			{
				if($ar['cityname']==$sel)
					$html .= '<option value="'.$ar['cityname'].'" selected="selected">'.$ar['cityname'].'</option>';			
				else
					$html .= '<option value="'.$ar['cityname'].'">'.$ar['cityname'].'</option>';			
			}
		}
		else
			return '<option value="">- No City -</option>';

		unset($CI);
		return $html;
	}
	else
	{
		return '<option value="">-- Select state first --</option>';	
	}
}

/**
 * LOAD ALL state FROM DB TABLE
 * @param $countryid of which load state
 * @param $name name of select box
 * @param $selid default selected id
 * @param $extra extra property of select
 */
function loadCityDropdown($name, $state_id, $selid=0, $extra='')
{
    $CI =& get_instance();
    
    $arr = array(''=>'--- Please select city ---');
    
    $res = $CI->db->where('state_id',$state_id)->order_by('city_name')->get('city')->result_array();
    foreach($res as $r)
        $arr[$r['city_id']] = $r['city_name'];
        
    unset($CI);
    return form_dropdown($name,$arr,$selid,$extra);
}

/*
 * @author   Cloud Webs
 * @abstract function will load area as per city selected
 */
function loadArea($city_name,$state_id,$sel='')
{
	if($city_name!='')
	{
		$CI =& get_instance();

		$res = $CI->db->query('SELECT areaname FROM pincode WHERE state_id='.$state_id.' AND cityname=\''.$city_name.'\' ORDER BY areaname')->result_array();
		$html ='<option value="" >- Select Area -</option>';
		if(!empty($res))
		{
			foreach($res as $k=>$ar)
			{
				if($ar['areaname']==$sel)
					$html .= '<option value="'.$ar['areaname'].'" selected="selected" >'.$ar['areaname'].'</option>';			
				else
					$html .= '<option value="'.$ar['areaname'].'">'.$ar['areaname'].'</option>';			
			}
		}
		else
			return '<option value="">- No Area -</option>';

		unset($CI);
		return $html;
	}
	else
	{
		return '<option value="">-- Select city first --</option>';	
	}
}
/*
 * @author   Cloud Webs
 * @abstract function will load pincode as per area selected
 */
function loadPincode($area_name,$city_name,$state_id)
{
	if($area_name!='')
	{
		$CI =& get_instance();

		$res = $CI->db->query('SELECT pincode_id,pincode FROM pincode WHERE state_id='.$state_id.' AND cityname=\''.$city_name.'\' AND areaname=\''.$area_name.'\' AND pincode_status=0 ')->row_array();
		if(!empty($res))
		{
			unset($CI);
			return array('pincode_id'=>$res['pincode_id'],'pincode'=>$res['pincode']);
		}
	}
	else
	{
		return array('pincode_id'=>'','pincode'=>'');	
	}
}

/*
+------------------------------------------------------------------+
	Function will fetch category from database.
	$parent = Start parent id from where you want to make menu tree.
	$para = Default first option value.
	$k = Level of category which will convert in ul li
+------------------------------------------------------------------+
*/
function getMultiLevelCategory($parent=0,$str = '',$selected = '',$k=-1)
{
	$CI =& get_instance();
	
	$res = $CI->db->select('category_id,category_name,category_alias, parent_category')->where('parent_category',$parent)->
	where('del_in','0')->order_by('sort_order')->get('product_category')->result_array();
				
	if(count($res) > 0):
		$str.='<ul>';
		$k++;
		foreach($res as $r):
			$ac_class = '';
			$menu_title = $r['category_name'];
			$ac_class = (in_array($r['category_alias'],$selected))?'active':'';
			$str.='<li>
				<a href="'.getMenuLink($r['category_id']).'" class="'.$ac_class.'" >'.str_repeat('- ',$k).$menu_title.'</a>';
			$str = getMultiLevelCategory($r['category_id'],$str,$selected,$k);
			$str.='</li>';
		endforeach;
		
		$str.='</ul>';
		return $str;
	else:
		return $str;
	endif;
}

/*
+--------------------------------------------------+
	Function fetch data for pipe string IDs from table name specified
+--------------------------------------------------+
*/	
function getPipeStringData($table_name,$id_field_name,$fetch_field_name,$id_string)
{
	
	$CI =& get_instance();
	$id_string = str_replace("|",",",$id_string);
	$where = "";
	if($id_string != "")
		$where = " WHERE ".$id_field_name." IN(".$id_string.")";
		
	$res = $CI->db->query("SELECT ".$fetch_field_name." FROM ".$table_name.$where)->result_array();
	unset($CI);
	return $res;
}
	
/**
 * @abstract function will fetch all of product details, this function will be used in jewellery cont,ajax call,cart cont etc.
 */	
function getProductsDetails( $product_price_id, $is_status_check=true, $cz_suffix='')
{}

/**
 * 
 * @param string $product_generated_code
 * @param number $product_price_id
 * @param unknown $product_sku
 * @return string
 */
function getProdImageFolder($product_generated_code='',$product_price_id=0, $product_sku="", $product_generated_code_info="", $inventory_type_id=0)
{}

/**
 * @return string
 */
function getProdQtyOptionsIndex( $product_generated_code_info, $inventory_type_id )
{}

/**
 * 
 * @param string $product_generated_code
 * @param number $product_price_id
 * @param unknown $product_sku
 * @return string
 */
function getProdQtyOptions( $product_id="",$product_generated_code_info="", $dropdown=array( ''=>"Quantity" ) )
{}


/*
+--------------------------------------------------+
	@author Cloud Webs
	Function generate and return price tag for seo freindly search code
	@abstract whenever function changes it's behaviour it's mandatory to do regression testing for home page search filter
+--------------------------------------------------+
*/	
function generatePriceTag($price_filArr=array(),$min_term=-1,$max_term=-1)
{}


/**
 * @author Cloud Webs
 * @abstract function will return true if $item_id was searched used in search filter
 * @param $item_id the item to look for if it was searched
 * @param $array to search in
 * $return return true if item match else false
*/
function is_searched($item_id,$array)
{
	if(isset($array) && is_array($array))
	{
		if(in_array($item_id,$array))
			return true;
		else
			return false;
	}
}

/*
+------------------------------------------------------------------+
	Function will prepate query and append limit options. 
	return query result options.
	@params : $str -> pagination base url
			  $num -> Total number of rows table contain.
			  $start -> start segment, position 
			  $segment -> From which segment you want to consider pagination record count ?.
+------------------------------------------------------------------+
*/
function pagiationData($str,$num,$start,$segment, $config_arr = array() )
{
	$CI =& get_instance();

	if($CI->input->post('perPage') != '')
		$pp = (int)$CI->input->post('perPage');
		
	else if($CI->input->get('perPage') != '')
		$pp = (int)$CI->input->get('perPage');	
			
	else if($CI->session->userdata('perPage') != '')
		$pp = (int)$CI->session->userdata('perPage');
		
		
	elseif($CI->router->directory == 'admin/')
		$pp = 20;

	if($CI->router->directory != 'admin/' && !$CI->input->get('perPage'))
		$pp = PER_PAGE_FRONT;


	$CI->session->set_userdata('perPage',$pp);

	if( !is_restClient() )
	{
		$config['base_url'] = base_url().$str;
		$config['uri_segment'] = $segment;
	}

	$config['total_rows'] = $num;
	$config['per_page'] = $pp ;			//variable defined by Cloud Webs
	//$config['full_tag_open'] = '<div class="pagination">';
	//$config['full_tag_close'] = '</div>';
	$config['cur_page'] = $start;
	
	if(!empty($config_arr))
		$config = array_merge($config, $config_arr);
		
	
	$CI->pagination->initialize($config); 
	
	$query = $CI->db->last_query()." LIMIT ".$start." , ".$config['per_page'];
	
	$res = $CI->db->query($query);
	
	$data['perpage'] = $pp;
	$data['listArr'] = $res->result_array();
	$data['num'] = $res->num_rows();
	
	if( !is_restClient() )
	{
		$data['links'] =  $CI->pagination->create_links();
	}
	$data['total_rows'] = $num;

	return $data;
}

/*******************************************************************************/

/**
 * @author Cloud Webs
 * @abstract function will fetch all of product details from function getProductsDetails and optimize return for display, this function will be used in jewellery cont,ajax call,cart cont etc.
 * @param if $is_cart_or_checkout is true then it indicates that call is from cart or checkout processes in that case never redirect
 * @param $depth: important to unload cpu usage so that unneccessary information proccessing will be ignored 0 => full, 1 => minimal inforamtion
 */	
function showProductsDetails($product_price_id, $is_ajax=false, $is_cart_or_checkout=false,  $is_status_check=true, $pageToken='', $ring_size_id='', $cz_suffix='', $depth=0)
{}


/**
 * @GAUTAM KAKADIYA
 * @abstract update product quantity
 */
function updateProductQuantity($product_id,$product_value_quantity)
{}

/*
+------------------------------------------------------------------+
	@author Cloud Webs
	Function will FETCH layout for page specified in where condition for apecified css class
	Function will LOAD layout for result passed if not empty
Input ->
	@param $css_class : class name of layout position.
	@param $where : where condition to be appended in sql query.
	@param $css_class : class name of layout position.
	@param $extraStart : html/css to be appended at start of particular layout
	@param $extraEnd : html/css to be appended at end of particular layout
	@return : array of row or null empty array if not specified
+------------------------------------------------------------------+
*/
function LoadLayout($css_class,$where,$extraStart='',$extraEnd='')
{}


/**
 * @author Cloud Webs
 * @abstract function will return pincode_id and if pincode not exist then insert pincode if pincode and return it's pincode_id
 */
	function getPincodeId( $data )
	{
		$CI =& get_instance();
		$pincode_id = exeQuery( "SELECT pincode_id FROM pincode 
								WHERE pincode='".$data['pincode']."' AND state_id='".$data['state_id']."' 
								AND cityname='".$data['address_city']."' AND areaname='".$data['customer_address_landmark_area']."' ", true, "pincode_id" ); 

		if( empty( $pincode_id ) )
		{
			$CI->db->query("INSERT INTO pincode(pincode, areaname, cityname, state_id) 
							values('".$data['pincode']."', '".$data['customer_address_landmark_area']."', '".$data['address_city']."', 
							'".$data['state_id']."' )");
			return $CI->db->insert_id();				
		}

		return $pincode_id;
	}

/**
 * @author Cloud Webs
 * @abstract function will fetch address from cutomer_address and state and pincode tables
 */
	function getAddress($customer_address_id, $suffix='')
	{
		$CI =& get_instance();
	
		return $CI->db->query("SELECT c.customer_address_id, c.customer_address_firstname as customer_address_firstname".$suffix.", c.customer_address_lastname as customer_address_lastname".$suffix.", 
						  CONCAT(c.customer_address_firstname, ' ', c.customer_address_lastname) as customer_name".$suffix.", 
						  c.customer_address_address as customer_address_address".$suffix.", c.customer_address_landmark_area as customer_address_landmark_area".$suffix.", 
						  c.customer_address_company as customer_address_company".$suffix.", c.customer_address_phone_no as customer_address_phone_no".$suffix.", 
						  c.customer_address_city as customer_address_city".$suffix.", p.cityname as address_city".$suffix.", 
						  c.customer_address_zipcode as customer_address_zipcode".$suffix.", p.pincode as pincode".$suffix.", p.state_id as state_id".$suffix.", 
						  s.state_name as state_name".$suffix.", p.cityname as cityname".$suffix.", p.areaname as areaname".$suffix.", 
						  co.country_id as country_id".$suffix.", co.country_code as country_code".$suffix.", co.country_name as country_name".$suffix."  
						  FROM customer_address c 
						  INNER JOIN pincode p ON p.pincode_id=c.customer_address_zipcode 
						  INNER JOIN state s ON s.state_id=p.state_id  
						  INNER JOIN country co ON co.country_id=s.country_id
						  WHERE customer_address_id=".$customer_address_id." ")->row_array();
	}
	
/* 
 * @author Cloud Webs
 * @abstract function will fetch email_list_id for email_id if it is available then return unsubscribe link with email and email_list_id as get parameter
*/
	function getUnsubscribeLink( $email_id )
	{
		$CI =& get_instance();
		
		$resEmail = $CI->db->query("SELECT email_list_id FROM email_list WHERE email_id='".$email_id."' ")->row_array();
		
		if( !empty( $resEmail ) )		
			return site_url('unsubscribe?em='.$email_id.'&eli='.$resEmail['email_list_id']);	
		else
			return site_url('account/unsubscribe');	
	}
	
/**
 * @author Cloud Webs
 * @abstract Function will randomize sort order of product inventory
 */	
	function randomSortOrder()
	{
		$CI =& get_instance();
		$resCnt = $CI->db->query("SELECT count(product_id) as 'Count' FROM product")->row_array();
		$CI->db->query('UPDATE product SET product_sort_order = FLOOR('.$resCnt['Count'].' * RAND()) + 1;');
	}	
	
/**
 * @author Cloud Webs
 * @abstract Function will return price filter array
 */	
	function getPriceFilter()
	{}

/**
 * @author Cloud Webs
 * @abstract Function will return canonical url for product details page
 */	
	function getCanonicalUrl( $prodUrl )
	{
		$rpos = strrpos($prodUrl, "-");
		return substr($prodUrl, 0, $rpos);
	}
		
/**
 * @author Cloud Webs
 * @abstract function record any page accessed by user
 */
	function recordPageAccess()
	{
		$CI =& get_instance();
		$req = getCurrPageUrl( ); 
		
		$ref = "";
		if(isset($_SERVER["HTTP_REFERER"]))
			$ref = $_SERVER["HTTP_REFERER"];
			
		$CI->db->insert( "page_accesses", array( 'sessions_id'=> $CI->session->userdata('sessions_id'), 'session_id'=> session_id(), 'customer_id'=>(int)$CI->session->userdata('customer_id'), 'pa_url'=>$req, 'pa_referell_url'=>$ref));
	}

/**
 * @author Cloud Webs
 * @abstract function will return chat module config applicable for current page
 */
	function getChatConfig()
	{}	

/**
 * @author Cloud Webs
 * @abstract function will decide on ajax call if pro active chat is required and start pro active chat if respective OR any admin operator is online...
 * If multiple pro active chat messages is defined then sort_order and after that time_on_site is given priority
 */
	function getProActiveChatConfig( $position_id, $am_id=0, $ct_id=0)
	{}

/**
 * @author Cloud Webs
 * @abstract function will check and if avaialable return online admin operators to start chat with
 */
	function getOnlineAdmin( $is_random=false, $limit = ' LIMIT 1 ', $admin_user_id=0, $is_validate_time=true )
	{}

/**
 * @author Cloud Webs
 * @abstract function will return auto responder for current chat started by user
 */
	function getAutoResponder( $position_id )
	{}

/**
 * @author Cloud Webs
 * @abstract function will check if current session is of admin
 */
	function isAdmin( $session_id=0 )
	{
		if( $session_id == 0 ) 
		{
			$session_id = session_id();	
		}
		
		$sql = " SELECT cust_admin_user_id FROM logins l 
				WHERE l.l_user_type='A' AND l.l_session_status=1 AND l.session_id='".$session_id."' ";
		$res = executeQuery( $sql );
		if( !empty( $res ) ) 
		{
			return true;
		}
		else
		{
			return false;	
		}
	}

/**
 * @author Cloud Webs
 * @abstract function will check if customer has requested for no pro chat
 */
	function isNoProChat()
	{}
	
/**
 * @author Cloud Webs
 * @abstract function will initiate chat 
 */
	function startChat( $user_id, $sessions_id, $c_page_url, $abstract_proactive_chat_invitation_id=0, $c_status=0)
	{}
	
/**
 * @author Cloud Webs
 * @abstract function will send msg to admin about new chat
 */
	function sendChatSMSToAdmin( $user_id, $chat_id)
	{}

/**
 * @author Cloud Webs
 * @abstract function will store msg conversation for current chat
 */
	function chatMsg( $chat_id, $cust_admin_user_id, $cm_user_type, $cm_msg)
	{}

/**
 * @author Cloud Webs
 * @abstract function will return detaileD chat history for the current user chat if chat is running for current session
 */
	function getChatHistory( $chat_id, $admin_user_id=0, $is_admin=false)
	{}

/**
 * @author Cloud Webs
 * @abstract function will close chat whether it is closed by user or admin
 */
	function closeChats( $chat_id, $c_status=3 )
	{}

/**
 * @author Cloud Webs
 * @abstract function will return chat for admin operator: as per status parameter ask the type of chats
 */
	function getAdminChats( $admin_user_id=0, $c_status=2 )
	{}

/**
 * @author Cloud Webs
 * @abstract function will check if user/admin is active by taking in concern cust_admin_id AND session_id and validating against min minute require to claim itself as active
 */
	function isActive( $type, $cust_admin_id, $sessions_id, $validMinute )
	{
		$res = executeQuery( "SELECT pa_created_time FROM page_accesses WHERE sessions_id=".$sessions_id." ORDER BY page_accesses_id DESC LIMIT 1 " );
		if( !empty($res) )
		{
			$time = time();
			$pa_created_time = strtotime( $res[0]['pa_created_time'] );
			
			if( ( $pa_created_time + ( $validMinute * 60 ) ) > $time )
			{
				return true;	
			}
			else
			{
				return false;				
			}
		}
		else
		{
			return false;
		}
	}
	
/**
 * @author Cloud Webs
 * @abstract function will save email ID in email list and then register user as type specified mainly used for Chat registration 
 */
	function emailListAndReg( $customer_group_type, $customer_firstname, $customer_emailid, $customer_phoneno, $el_priority_level=31 )
	{
		$CI =& get_instance();
		
		$email_list_id = saveEmailList($customer_emailid, 1, 'N', 'CHAT_REG', $el_priority_level);
		
		$customer_group_id = exeQuery( " SELECT customer_group_id FROM customer_group WHERE customer_group_type='".$customer_group_type."' ", true, 'customer_group_id');
		
		return saveCustomer($customer_emailid, array( 'manufacturer_id'=> MANUFACTURER_ID, 'customer_firstname'=>$customer_firstname, 'customer_group_id'=>$customer_group_id, 
						'email_list_id'=>$email_list_id, 'customer_emailid'=>$customer_emailid, 'customer_phoneno'=>$customer_phoneno, 'customer_ip_address'=>$_SERVER['REMOTE_ADDR']));
	}
	
/**
 * @author Cloud Webs
 * @abstract function will count no of pages visited for sessions_id provided
 */
	function pageCount( $sessions_id )
	{
		if( $sessions_id == 0 )
		{
			return 0;			
		}
		else
		{
			return exeQuery( "SELECT COUNT(1) as 'Count' FROM page_accesses WHERE sessions_id=".$sessions_id." ", true, 'Count');			
		}
	}
	
/**
 * @author Cloud Webs
 * @abstract function is chat offline
 */
	function isChatOffline()
	{}

	/**
	 * function fetch main category
	 */

	function menuCategoryMobile( $front_menu_type_id=10 )
	{}

	/**
	 * function fetch main category
	 */
	function menuCategoryDesk( $front_menu_type_id )
	{}

/**
 * @author Cloud Webs
 * @abstract Function will return priority product price ID for product
 */	
	function getPriorityPrPrID( $product_alias='', $product_id=0 )
	{}


	/**
	 * function serves maintainability for detail page related products to be used for both desk and mobile views
	 */
	function relatedProducts( $product_id, $category_id, $product_discounted_price, $range=1000 )
	{}

	/**
	 * function return shipping address available for user for checkout process
	 */
	function getShippAddress( $customer_id )
	{
		return executeQuery("SELECT c.customer_address_id, c.customer_address_firstname, c.customer_address_lastname, c.customer_address_address, 
						c.customer_address_phone_no, c.customer_address_zipcode,
						p.pincode,p.state_id,p.cityname,p.areaname,s.country_id,s.state_name,cn.country_name   
						FROM customer_address c 
						INNER JOIN pincode p ON p.pincode_id=c.customer_address_zipcode 
						INNER JOIN state s ON s.state_id=p.state_id
						INNER JOIN country cn ON cn.country_id=s.country_id
						WHERE customer_id=".$customer_id." ");
	}

	
	/**
	 * function will return all department/store/ccTLD that perrian working with
	 */
	function getManufacturers()
	{
		return executeQuery( " SELECT manufacturer_id FROM manufacturer " );
	}
	
/*
+++++++++++++++++++++++++++++++++++++++++
This function fetch images from folders
para1 :- product_id for fetch image folder path
+++++++++++++++++++++++++++++++++++++++++
*/
	function FetchImageFromFolder($product_id,$is_random=false)
	{
		 $res = executeQuery("select  product_image  from product where product_id='".$product_id."' ");
		 if(empty($res))
		 {
			return '';	 
		 }
		 $dir = $res[0]['product_image'];
		 if(!empty($dir))
		 {
			  if (is_dir($dir)) 
			  {
				if ($dh = opendir($dir)) 
				{
					$image = array();       			 		
					$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir),RecursiveIteratorIterator::SELF_FIRST);
					foreach($iterator as $entry=>$file)
					{
						$filepath = str_replace("\\","/",$entry);
						if(!$file->isDir() && substr($filepath,-3)!=".db")
						{
							if($is_random)
							{
								$image[] = $filepath;
							}
							else
							{
								return $filepath;
							}
						}
					}
					$rand = 0;
					if($is_random)
					{
						$rand = rand(0,sizeof($image)-1);	 
					}
					return $image[$rand];
				}
			 }
			 
		 }
		
	}

/**
 * @abstract function will return images located at specified folder but not from inner dir if exist
 * @author	Cloud Webs
 * @param folderpath specifies folder from which all images will be fetched
 * @return array of images path
*/
	function fetchProductImages($folderpath)
	{
		if(!empty($folderpath))
		{		 
			if (is_dir($folderpath)) 
			{
				if ($dh = opendir($folderpath)) 
				{
					$images = array();
					while (($file = readdir($dh)) !== false)
					{
						if (!is_dir($folderpath.'/'.$file) && substr($file,-3)!=".db") 
						{
							$images[] = $folderpath.'/'.$file;
						}
					}
					closedir($dh);
					sort($images);
					return $images;
				}
			}
		}
		return false;
	}

/*
 *  function will generate sql query to display filter selections. 
 *  
 *  BUG 421: filter display generateFilterDisQuery function needs to be cctldiesed if client require within it cctld content, 
 *  but URL should never support cctld content.  
 */
	function generateFilterDisQuery($filters_table_name,$filters_table_field_name,$filters_table_id,$extra_field='',$order_by='')
	{}
	
/*
 * @abstract this function regenerate product code from parse array
 * $author Horen Donda
 * @param $codeArr product code array
 * @return product generate code as per format
*/
	function genProdcodeFromArr($codeArr)
	{
		return implode( "-", $codeArr );
	}
	
/*
+--------------------------------------------------+
	@author Cloud Webs
	Function generate and return seo freindly search code based on $search_tags array of search tags 
+--------------------------------------------------+
*/	
	function generateSearchCode($search_tagArr,$index='',$value='')
	{}

/*
+--------------------------------------------------+
	@author Cloud Webs
	Function generate and return seo freindly search code based on $search_tags array of search tags 
+--------------------------------------------------+
*/	
	function generateSeoUrl($search_url_tagArr,$index='',$value='')
	{
		if($index!='')		//this condition is for filter
			$search_url_tagArr[$index] = $value;
			
		return htmlspecialchars_decode( str_replace( "++", "+", str_replace( array(0=>'@',1=>'£',2=>'^'),'', trim($search_url_tagArr['metal_purity_url_tag'].$search_url_tagArr['metal_url_tag'].$search_url_tagArr['metal_color_url_tag'].$search_url_tagArr['metal_type_url_tag'].$search_url_tagArr['diamond_purity_url_tag'].$search_url_tagArr['diamond_color_url_tag'].$search_url_tagArr['diamond_shape_url_tag'].$search_url_tagArr['diamond_type_url_tag'].$search_url_tagArr['cz_url_tag'].$search_url_tagArr['diamond_price_url_tag'].$search_url_tagArr['product_offer_url_tag'].$search_url_tagArr['product_categories_url_tag'].$search_url_tagArr['gender_filter_url_tag'].$search_url_tagArr['price_url_tag'].$search_url_tagArr['product_attribute_url_tag'],"+" ) ) ) );
	}

	/**
	 * Product pagination list page
	 */
	function productListPagination($start, $per_page, $total_records,$server_req)
	{
		$select_page = ceil( $start/PER_PAGE_FRONT ) + 1;
		$html = '';	$j = 0; $cnt = 0; 
		if( $select_page > 2 || $total_records <= PER_PAGE_FRONT ) 
		{ 	
			$html .= '<li style="cursor:pointer" class="'.( $select_page == 1 ? 'active':'').'"><a href="'.site_url( setQueryParam( getRequestUri(), "start", 0 ) ).'" >1</a></li>';
		}

		//enhanced algoritham on 24-04-2015
		if( $start > 0 )
		{
			$start = $start - PER_PAGE_FRONT;
		}
		$j = ceil( $start / PER_PAGE_FRONT )+1;
		
		
		if( $total_records > PER_PAGE_FRONT )
		{
			//$start = ($start-PER_PAGE_FRONT);
			//if($j != 0) $j = $j-1;
			
			for(; $start<$total_records; $start += PER_PAGE_FRONT,$j++)
			{				
				//echo "=>".$start."--".$j;
				$cnt++; if($cnt>3) { break; }
				$html .= '<li style="cursor:pointer" class="'.( $select_page == $j ? 'active':'').'"><a href="'.site_url( setQueryParam( getRequestUri(), "start", $start ) ).'">'.$j.'</a></li>';
			}
		}
		
		if( $total_records > PER_PAGE_FRONT && $j < ( ceil( $total_records / PER_PAGE_FRONT ) + 1 ) )
		{
			$html .= '<li style="cursor:pointer" class="'.( $select_page == ( ceil( $total_records / PER_PAGE_FRONT ) + 1 ) ? 'active':'' ).'"><a href="'.site_url( setQueryParam( getRequestUri(), "start", ( $total_records - ( $total_records % PER_PAGE_FRONT ) ) ) ).'" >'.ceil( $total_records/PER_PAGE_FRONT ).'</a></li>';		
		}
		return $html;
	}
	
	/**
	 * @abstract function will create search parameter from seo url
	 */
	function searchParam( $seo_url )
	{}
	

	/**
	 * @abstract function will fetch seo url part from request uri
	 */
	function getSeoUrl( $req_uri )
	{
		$req_uri = substr( $req_uri, strrpos( $req_uri, "/") + 1 );	//extract segment after slash
		$req_uri = substr( $req_uri, 0, strrpos( $req_uri, ".htm"));	//remove segement after .htm
		return $req_uri;
	}

	
	/**
	 * function will generate REST compatible seo_url from searchf parameters
	 * NON-recursive 
	 */
	function generateSeoUrlRESTCompatible( $searchf )
	{}
	
	
	/**
	 * @abstract function will return price filter array sliced according to difference value
	 */
	function generatePriceFilter()
	{}

	/**
	 * @abstract function will filter price search if multiple price filter and match accordingly
	 */
	function filPriceSearch( &$price_filter, $ar, $CURRENCY_SYMBOL ) 
	{}
	
	/**
	 * @author Cloud Webs
	 * @abstract function will remove currency symbol and other chars from currency value
	 */
	function filterFilterValue( $val, $CURRENCY_SYMBOL )
	{}

	/**
	 * @abstract function will return diamond map
	 */
	function sortMap()
	{}

	/**
	 * @abstract function will return array key for value
	 */
	function arrayKey( $arr, $val )
	{
		foreach( $arr as $k=>$ar )
		{
			if( $ar == $val )	
			{
				return $k;	
			}
		}
		return FALSE;
	}

	/**
	 * @abstract function will get search param globally for all pages
	 */
	function getSearchParam( &$data )
	{}
	
	/*
	* Function stemming of wild card keyword term 
	*/
	function removeCommonWord( $keyword )
	{
		return trim( str_replace( array("The"), "", $keyword ) );
	}

	/**
	 * this function will now replace all get_angle view code wherever used in views to get angle for product which is supposed to display
	 */
	function getAngle( $product_accessories )
	{}

	
	/**
	 * 
	 * @param unknown $customer_id
	 */
	function getCampaignUrl($customer_id)
	{	
		return site_url('home/invitedFriends?ref='.getCampaignCode($customer_id));
	}
	
	/**
	 * 
	 * @param unknown $customer
	 * @return unknown
	 */
	function getCampaignCode($customer_id)
	{}

	/**
	 * 
	 * @param unknown $sender
	 * @param unknown $customer_id
	 * @return boolean
	 */
	function addCampaignCode($customer_id, $c_code)
	{}

/**
 * function added On 06-05-2015
 * record capmaign landing page
 */
function recordCampaignLandingPage()
{}

/**
 * function added On 06-05-2015
 * record capmaign landing page
 */
function recordReferralLandingCode( $ref_c_code )
{}

/**
 * @author Cloud Webs
 * Added on 27-06-2015
 * A semi dynamic(only single level deep ) folder structure for attribute based inventory,
 * applicable when attributes like color or colour is found.
 */
function front_end_hlp_attrBasedProductImageFolder( $path, $codeArr, $data=array() )
{}

/**
 * @author Cloud Webs
 * Added on 27-06-2015
 * to support A semi dynamic(only single level deep ) folder structure layer for attribute based inventory.
 * applicable when attributes like color or colour is found.
 */
function front_end_hlp_getProductImages( $product_generated_code, $product_price_id, $product_sku, $product_generated_code_info )
{}

/**
 *
 */
function contentImageFolderFromSKU( $product_sku )
{
	return "assets/content/images/".$product_sku;
}
?>