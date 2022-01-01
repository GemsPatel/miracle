<?php
/**
 * @package pr_: cmn_hlp 
 * @author Cloud Webs Team
 * @version 1.9
 * @abstract common helper
 */

// For 4.3.0 >= PHP <= 5.4.0
if (!function_exists('http_response_code'))
{
	function http_response_code($newcode = NULL)
	{
		static $code = 200;
		if($newcode !== NULL)
		{
			header('X-PHP-Response-Code: '.$newcode, true, $newcode);
			if(!headers_sent())
				$code = $newcode;
		}       
		return $code;
	}
}

/**
 * 
 */
function getFirstSubDomain()
{
	$domainArr = explode( '.', $_SERVER['HTTP_HOST'] );
	return current($domainArr);
}

/**
 * @abstract function will return primary URl whether call form ccTLD or not
 */
function primary_url( $path='' ) 
{
	return base_url().$path; 
}

/**
 * @abstract determine if User Agent is rest client
 */
function is_restClient()
{
	return '';//isset( $_GET[ getSysConfig( "rest_version_index" ) ] );
}

/**
 * Function will search for values in associative array and return key of array where value found
 *
 *	@author Cloud Webs
 *	@param  $array to serach in
 *	@param  $field field name to look in array
 *	@param  $value to serach for
 *	@return key of array if found otherwise FALSE
 */
function associative_array_search($array,$field, $value)
{
	if( is_array( $array ) )
	{
		foreach($array as $k=>$ar)
		{
			if($ar[$field] == $value)
				return $k;
		}
	}
	return FALSE;
}

/**
 * Function will search for values in associative array and return key of array where value found, look for two value match only difference in that manner against native im_::associative_array_search
 *
 *	@author Cloud Webs
 *	@param  $array to serach in
 *	@param  $field field name to look in array
 *	@param  $value to serach for
 *	@return key of array if found otherwise FALSE
 */
function associative_array_searchTwo($array,$field1, $value1, $field2, $value2, &$firstMatchKeyI)
{
	foreach($array as $k=>$ar)
	{
		if($ar[$field1] == $value1)
		{
			$firstMatchKeyI = $k;
			if($ar[$field2] == $value2)
			{
				return $k;
			}
		}
	}
	return 0;
}

/**
 * Strict "AND" search
 * Function will search for values in associative array and return key of array where value found, look for two value match only difference in that manner against native im_::associative_array_search
 *
 *	@author Cloud Webs
 *	@param  $array to serach in
 *	@param  $field field name to look in array
 *	@param  $value to serach for
 *	@return key of array if found otherwise FALSE
 */
function associative_array_searchTwoStrict($array,$field1, $value1, $field2, $value2, &$firstMatchKeyI)
{
	foreach($array as $k=>$ar)
	{
		if($ar[$field1] == $value1 && $ar[$field2] == $value2)
		{
			$firstMatchKeyI = $k;
			return $k;
		}
	}
	return 0;
}

/**
 * Function will search for values in associative array and return key of array where value found, look for two value match only difference in that manner against native im_::associative_array_search
 *
 *	@author Cloud Webs
 *	@param  $array to serach in
 *	@param  $field field name to look in array
 *	@param  $value to serach for
 *	@return key of array if found otherwise FALSE
 */
function associative_array_searchThree($array,$field1, $value1, $field2, $value2, $field3, $value3)
{
	foreach($array as $k=>$ar)
	{
		if($ar[$field1] == $value1 && $ar[$field2] == $value2 && $ar[$field3] == $value3)
		{
			return $k;
		}
	}
	return FALSE;
}

/**
 * Function will search for values in associative array and return key of array where value found, look for two value match only difference in that manner against native im_::associative_array_search
 *
 *	@author Cloud Webs
 *	@param  $array to serach in
 *	@param  $field field name to look in array
 *	@param  $value to serach for
 *	@return array of found values if found otherwise empty array
 */
function im_cmn_associative_array_searchThreeRetArray($array,$field1, $value1, $field2, $value2, $field3, $value3)
{
	$res = array();
	foreach($array as $k=>$ar)
	{
		if($ar[$field1] == $value1 && $ar[$field2] == $value2 && $ar[$field3] == $value3)
		{
			$res[] = $k;
		}
	}
	return $res;
}

/**
 * Function will search for values in associative array and return a specified key's value where value is matched
 *
 *	@author Cloud Webs
 *	@param  $array to serach in
 *	@param  $field field name to look in array
 *	@param  $value to serach for
 *	@return key of array if found else FALSE
 */
function associative_array_searchGetValue($array,$field1, $value1, $keyReturn)
{
	foreach($array as $k=>$ar)
	{
		if($ar[$field] == $value)
			return $ar[$keyReturn];
	}
	return FALSE;
}

/**
 * Function will sort associative array ascending as per the value of key
 */
function associative_array_ASC_SORT(&$array, $callable="cmpASC_SORT")
{
	usort($array,$callable);
}

/**
 * Function will compare associative value for ASC sorting
 */
function cmpASC_SORT($a,$b)
{
	return $a["ASC_SORT"] - $b["ASC_SORT"];
}

/**
 * Function will compare associative value for DESC sorting
 */
function cmpDESC_SORT($a,$b)
{
	return $b["DESC_SORT"] - $a["DESC_SORT"];
}

/*
| Alter file name, remove special character from
| file name and append some random key to file.
*/
function alterFileName($fileName)
{
	$i = pathinfo($fileName);
	return url_title($i['filename'])."_".mt_rand().".".$i['extension'];
}

function char_limit($str,$limit)
{
	if(strlen($str) < $limit)
		return $str;
	else
		return  substr($str,0,$limit)."...";
}

/*
+--------------------------------------------+
	Convert bytes to MB. 
	@params : $bytes -> have to give bytes as input
	@return -> Size in MB
+--------------------------------------------+
*/
function convertToMb($bytes)
{
	$mb = (($bytes/1024)/1024);
	return number_format($mb,2);
}

//function for converting string into indian currency format
function convertToCurrency($cash){ 
	$num=(int)$cash; //take only numeric part
	$decpart = $cash - $num; //take  decimal part 
	//$decpart=sprintf("%01.2f",$decpart); //get only two digit of decimal part 
	$decpart=substr($decpart,1,3); 
	$explrestunits ='';

		if(strlen($num)>3){ //if number is greater than 100  
				$lastthree = substr($num, strlen($num)-3, strlen($num)); 	
				$restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits 	
				$restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping. 
				$expunit = str_split($restunits, 2); 	
				for($i=0; $i<sizeof($expunit); $i++){ 	
					$explrestunits .= (int)$expunit[$i].","; // creates each of the 2's group and adds a comma to the end 
			 }    
				$thecash = $explrestunits.$lastthree; 
		}	else { 
			  $thecash = (int)$cash; 
		} 
		   // return $thecash.".".$currency; // writes the final format where $currency is the currency symbol. 
	return $thecash.$decpart;
}  

/*
+--------------------------------------------+
	Convert currency from to to code. 
	@params : $amount -> amount
			  $from_code -> from currency INR
			  $to_code -> to currency USD
+--------------------------------------------+
*/
function convert_currency($amount, $from_code, $to_code)
{
	$url = 'http://www.webservicex.net/CurrencyConvertor.asmx/ConversionRate?FromCurrency='.$from_code.'&ToCurrency='.$to_code.'';
	$xml = simpleXML_load_file($url,"SimpleXMLElement",LIBXML_NOCDATA);
	if($xml ===  FALSE)
	{
	   //deal with error
	}
	else 
	{ 
		$rate = $xml;
	}
	return $xml;		
}
	
/**
 * @abstact function will check if form is posted
 */
function isPost()
{
	if( $_SERVER['REQUEST_METHOD'] == "POST" || !empty($_POST) )
	{
		return true;
	}
	else
	{
		return false;
	}
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	This function decode ids and return in array.
	basically it will decode using base64 algo.
	
++++++++++++++++++++++++++++++++++++++++++++++
*/
function _de($id)
{
	return base64_decode( $id );
}
function _deWalk(&$id)
{
	$id = base64_decode($id);
}

//encrypt string like token
//$key-> which key you want to decrypt from url.
function _dcrpt($str,$key = '')
{
	if($str != '')
	{
		$CI =& get_instance();
	
		$CI->encrypt->set_cipher(MCRYPT_RC2);
		$d = $CI->encrypt->decode($str);
		
		//if systen not able to decode the ids then we have to get it from server header for decrypt
		if($d == '' && $key != '')
		{		
			$s = explode('&',$_SERVER['QUERY_STRING']);
			foreach($s as $i)
			{
				if(substr_count($i,$key.'=') > 0)
				{
					$d = $CI->encrypt->decode(str_replace($key.'=','',$i));
					break;
				}
			}
			
		}
		return $d;
	}
}
//encrypt string like token
function _encrpt($str)
{
	if($str != '')
	{
		$CI =& get_instance();
	
		$CI->encrypt->set_cipher(MCRYPT_RC2);
		return $CI->encrypt->encode($str);
	}
}

/** 
 * @abstract return domain in use
 */
function base_domain()
{
	return ( $_SERVER['HTTP_HOST'] != LOCALHOST_IP ? '119.18.54.84':LOCALHOST_IP );
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	This function encode ids and return in array.
	basically it will encode using base64 algo.
	
++++++++++++++++++++++++++++++++++++++++++++++
*/
function _en($id)
{
	return base64_encode($id);
}
/*
++++++++++++++++++++++++++++++++++++++++++++++
	This function is Converting database format
	to convienant form
	@params : 
		@date : Date which you get from database.
		@format : Format you want to retrieve.
	@return :
		- Formatted date.
++++++++++++++++++++++++++++++++++++++++++++++
*/
function formatDate($format = '',$date = '')
{
	if($format)
		return date($format,strtotime($date));
	else
		return date('Y-m-d H:i:s');
}

/**
 * wrapper around PHP's strtotime, added On 13-05-2015
 */
function cmn_hlp_strtotime( $date, $now = null )
{
	return strtotime( str_replace('/', '-', $date), $now); 
}


/*
++++++++++++++++++++++++++++++++++++++++++++++
	This function is read csv files and returns array of content,
	@params : 
		@filepath : path of file to be read
++++++++++++++++++++++++++++++++++++++++++++++
*/
function readCsvNew($filepath,$delimiter=',')
{
	$res = array();
	$cnt=0;
	if (($handle = fopen(site_url($filepath), "r")) !== FALSE) 
	{
		while (($data = fgetcsv($handle, 1000, $delimiter)) !== FALSE) 
		{
			$num = count($data);
			for ($c=0; $c < $num; $c++) 
			{
				$res[$cnt][] = trim( $data[$c] );
				
			}
			$cnt++;
		}
		fclose($handle);
	}
	
	if(sizeof($res)>0)
		return $res;
	else
		return '';
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	This function is read csv files and returns array of content,
	@params : 
		@filepath : path of file to be read
++++++++++++++++++++++++++++++++++++++++++++++
*/
function readCsv($filepath)
{
	$res = array();
	if (($handle = fopen(site_url($filepath), "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			for ($c=0; $c < $num; $c++) {
				$res[] = $data[$c];
			}
		}
		fclose($handle);
	}
	
	if(sizeof($res)>0)
		return $res;
	else
		return '';
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	This function is displaying error message,
	keep data in session.
	@params : 
		@Key : Key name of the variable
++++++++++++++++++++++++++++++++++++++++++++++
*/
function getDecodedIds($arr)
{
	array_walk($arr,'_deWalk');
	return $arr;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	This function is displaying error message,
	keep data in session.
	@params : 
		@Key : Key name of the variable
++++++++++++++++++++++++++++++++++++++++++++++
*/
function getFlashMessage($key)
{
	$C =& get_instance();
	$msg = '';
	if($C->session->userdata('flash_'.$key) != '')
	{
		$msg = $C->session->userdata('flash_'.$key);
		$C->session->unset_userdata('flash_'.$key);
	}
	return @$msg;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	This function Will generate captcha everytime
	that we need.
++++++++++++++++++++++++++++++++++++++++++++++
*/
function generateCaptcha()
{
	$C =& get_instance();
	$C->load->helper('captcha');
	
	$word = random_string('alnum','6');
		
	$vals = array(
		'word'	 => $word,
		'img_path'	 => './assets/captcha/',
		'img_url'	 => asset_url().'assets/captcha/',
		'font_path'	 => './font/helveticaneue.ttf',
		'img_width'	 => '130',
		'img_height' => 30,
		'expiration' => 7200
	);
	
	$k = md5($C->router->method);
	
	$past = $C->session->userdata($k);
	
	//will unlink past image
	if(count($past) > 0)
		@unlink('./assets/captcha/'.$past['cp_time'].".jpg");
		
	$dt = create_captcha($vals);
	$fn = array('word'=>$dt['word'],'cp_time'=>$dt['time']);
	$C->session->set_userdata($k,$fn);
	
	return $dt;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Function will return name of resize image 
	that should be useful for image resize.
	$type : should be "s" : small
						'm' : Medium
	$path : Relative path of file.									
++++++++++++++++++++++++++++++++++++++++++++++
*/
function getResizeFileName($path,$type)
{
	if(trim($path) != '')
	{
		$p = pathinfo($path);
		return $p['dirname']."/".$p['filename']."_".$type.".".$p['extension'];
	}
}

/* made by  Cloud Webs 
++++++++++++++++++++++++++++++++++++++++++++++
	Function will return name of resize image 
	that should be useful for image resize.
	$type : should be "s" : small
						'm' : Medium
	$path : Relative path of file.									
++++++++++++++++++++++++++++++++++++++++++++++
*/
function getResizeFileNameByPath($path,$type,$folder='')
{
	if(trim($path) != '')
	{
		$p = pathinfo($path);
		if($folder != '')
			$fld = '/'.$folder;
		else
			$fld = '';
			
		if(!is_dir('./'.$p['dirname']) && $fld != '')
			@mkdir($p['dirname'].$fld);
		
		$new = $p['dirname'].$fld;
		return $new."/".$p['filename'].mt_rand()."_".$type.".".$p['extension'];		
	}
}

function get_sort_order($sort, $postField, $field)
{
	if($postField == $field)
	{
		if($sort == 'ASC')
			$sort = 'DESC';
		else 
			$sort = 'ASC';	
	}
	if($sort == '')
		$sort = 'DESC';
		
	return $sort;
}

	/*
* Get year dropdown
*/
function getYearDropdown($sel='')
{
	$html ='<option selected="selected" value="0">Year</option>';
	for($y=2020; $y>=1905; $y--){
		if($sel == $y)
			$html .= '<option value="'.$y.'" selected="selected">'.$y.'</option>';
		else
			$html .= '<option value="'.$y.'">'.$y.'</option>';
	}
	return $html;
}

/*
* Get day dropdown
*/
function getDayDropdown($sel='')
{
	$html ='<option selected="selected" value="0">Day</option>';
	for($d=1; $d<=31; $d++){
		if($sel == $d)
			$html .= '<option value="'.$d.'" selected="selected">'.$d.'</option>';
		else
			$html .= '<option value="'.$d.'">'.$d.'</option>';
	}
	return $html;
}

// SET THUMB FOR UPDOADED CONTENT.
function image_src_common($filepath)
{
//*.pdf; *.doc; *.docx; *.xls; *.ppt; *.rtf; *.xlsx; *.pptx; *.swf; *.txt; *.csv; *.text; *.TEXT; *.ACL; *.AFP; *.ANS; *.CSV; *.CWK; *.STW; *.RPT; *.PDAX; *.PAP; *.PAGES; *.SXW; *.STW; *.QUOX; *.WRI; *.XML; *.HTML; *.MCW; *.XPS; *.TXT; *.ABW; *.PPT; *.PPTX; *.PDF; *.DOC; *.DOCX; *.XLS; *.XLSX; *.TeX;
	$ext = substr(strrchr(basename($filepath), '.'), 1);
	$imageArr = array('jpeg', 'jpg', 'png', 'bmp', 'gif', 'JPEG');
	$docArr = array('doc', 'docx');
	$pdfArr = array('pdf');
	$xlsArr = array('xls','xlsx');
	$videoArr = array('mp4','flv');
	$zipArr = array('zip','rar','tar','gz','gzip');
		
	switch($ext)
	{
		case in_array($ext, $imageArr) :
			$img_src = $filepath;
			break;
		case in_array($ext, $docArr) :
			$img_src = 'images/admin/doc.png';
			break;
		case in_array($ext, $pdfArr) :
			$img_src = 'images/admin/pdf.png';
			break;
		case in_array($ext, $xlsArr) :
			$img_src = 'images/admin/xls.png';
			break;
		case in_array($ext, $videoArr) :
			$img_src = 'images/admin/video.png';
			break;
		case in_array($ext, $zipArr) :
			$img_src = 'images/admin/zip.png';
			break;
		case 'mov' :
		case 'ppt' :
		case 'xml' :
		case 'ppt' :
		case 'ppt' :
			$img_src = 'images/admin/'.$ext.'.png';
			break;
		default :
			$img_src = 'images/admin/unknown.png';
			break;
	}
	
	return $img_src;
	
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Load thumb url of uploaded image. there is 
	fix syntax with image name. we are uploading 
	thumb image with same name but with "thumb"
	named folder. If there is no image then it will
	load default thumb image.
	@params : $url -> URL of image [url will be relative].
			   $type -> should be small or medium image [s,m] 
	@returrn : Path of thumb image
++++++++++++++++++++++++++++++++++++++++++++++
*/
function load_thumb($url,$type)
{
	$th = getResizeFileName($url,$type);
		
	$thumb_path =  asset_url().$th; 
	if(file_exists('./'.$th) && $th != '')
		return $thumb_path;
	else
		return asset_url()."images/no-image.jpg";
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Load image from url. if not file exist then
	it will load default selected image.
	
	@params : $url -> URL of image [url will be relative].
			  $fl -> Flag stand for return image path only.
	@returrn : Path of image
++++++++++++++++++++++++++++++++++++++++++++++
*/
function load_image($url)
{
	if( is_restClient() || ( $url != '' && file_exists('./'.$url) ) )
		return asset_url($url);
	else
		return asset_url("/images/admin/no_image.jpg");
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Load Admin logo according to display alias 
	passed from argument.
	@params : $logo -> Url path of admin logo
	@returrn : Path of image
++++++++++++++++++++++++++++++++++++++++++++++
*/
function load_admin_logo($logo)
{		
	if($logo != '' && file_exists('./'.$logo))
		return asset_url().$logo;
	else
		return asset_url()."images/admin/logo.png";
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
  Parse With Url
	Function will parse {base_url} into current 
	website's base url which containing url word.
	@params: $str-> String in which you are going
			to replace string with base_url
			+ config email in it.
++++++++++++++++++++++++++++++++++++++++++++++
*/
function _pwu($str)
{
	$str = str_replace('{base_url}',base_url(),$str);
	
	return $str;
}

/*
+--------------------------------------------------+
	@author Cloud Webs
	Function parse and return mono of 10 characters simply removes +91 sign if it does exist or remove 0 
+--------------------------------------------------+
*/	
function parseMobileNo($mono)
{
	if(strpos($mono, '+91') !== FALSE && strlen($mono)==13)
	{
		return substr($mono, 3);
	}
	else if(strpos($mono, '91') !== FALSE && strlen($mono)==12)
	{
		return substr($mono, 2);
	}
	else if( substr($mono, 0, 1) == '0' && strlen($mono)==11)
	{
		return substr($mono, 1);	
	}
	else
		return $mono;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	display pagetitle and header title on browser
++++++++++++++++++++++++++++++++++++++++++++++
*/
function pgTitle($pgName)
{
	return ucwords(str_replace(array(0=>'-',1=>'_'),' ',$pgName));
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Just dropdown of per page listing, you can 
	set how many records you want to see on page.
++++++++++++++++++++++++++++++++++++++++++++++
*/
function per_page_drop()
{
	$CI = & get_instance();
	$dropdown = array('2'=>'2 Items Per Page','5'=>'5 Items Per Page','10'=>'10 Items Per Page','20'=>'20 Items Per Page','50'=>'50 Items Per Page');
		
	return $dropdown;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Shortcut function for print data.
++++++++++++++++++++++++++++++++++++++++++++++
*/
function pr($data)
{
	if( ENVIRONMENT !== "production" || isIntranetIp() ) 
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Image resizing fuction. will resize image.
	@params : $source -> relative path of source image
			  $dest -> Setination path of image.
			  $width -> Width of the image you want to achieve.
			  $height - > height of the image you want to achieve;.
	@return : Resized image array.
++++++++++++++++++++++++++++++++++++++++++++++
*/
function resize_image($source,$dest,$width,$height)
{
	$C = & get_instance();
	
	$config['image_library'] = 'gd2';
	$config['source_image']	= $source;
	$config['create_thumb'] = TRUE;
	$config['new_image'] = $dest;
	$config['maintain_ratio'] = TRUE;
	$config['width']	 = $width;
	$config['height']	= $height;
	$config['thumb_marker'] = '';
	
	$C->load->library('image_lib'); 
	$C->image_lib->initialize($config);
	$rt = $C->image_lib->resize();
	
	unset($C);
	return $rt;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Return list of files in directory for dropdown
	@params : $directory -> Root path of directory
	@return : Array which us usable for dropdown.
++++++++++++++++++++++++++++++++++++++++++++++
*/
function readDirectory($directory)
{
	$drop_array = array(''=>'Select Template');
	$ls = scandir($directory);
	//Start from 2 because we want to ignore[".",".."]
	for($i=2; $i<count($ls); $i++)
		$drop_array[substr($ls[$i],0,-4)] = substr($ls[$i],0,-4);
	
	return $drop_array;
}

// redirect to payment gateway.
function rdToG($url)
{
	echo '<script type="text/javascript">setTimeout(function(){ document.location.href="'.$url.'"}, 2000);</script>';
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Mail send shortcut function.
	Pass parameters according described in functions
	parameters.
++++++++++++++++++++++++++++++++++++++++++++++
*/
function sendMail($toEmail,$subject,$mail_body,$from_email='',$from_name = '',$file_path = '')
{
	$C =& get_instance();
	if($_SERVER['HTTP_HOST'] == LOCALHOST_IP)
		$smtp = true;
	else
		$smtp = false;
	
	$C->load->library('email');
	if($from_email != '')
		$fromEmail = $from_email;
	else
	{
		$fromEmail = getField('config_value','configuration','config_key','ADMIN_EMAIL');
	}
		
	
	if($from_name == '')
		$from_name = 'Free GST Bills';
	
	if($smtp == TRUE)
	{
	    $config['protocol'] = getField('config_value','configuration','config_key','SMTP_PROTOCOL');
		$config['smtp_host'] = getField('config_value','configuration','config_key','SMTP_HOST');
		$config['smtp_port'] = getField('config_value','configuration','config_key','SMTP_PORT');
		$config['smtp_user'] = getField('config_value','configuration','config_key','SMTP_USER');
		$config['smtp_pass'] = getField('config_value','configuration','config_key','SMTP_PASSWORD');
		$config['charset']='utf-8';  
		$config['newline']="\r\n"; 
	}
	else
	{
		$config['protocol'] = 'mail';
	}
	
	$config['mailtype'] = 'html';
	$config['mailpath'] = '/usr/sbin/sendmail';
	$C->email->initialize($config);
	
	$C->email->from($fromEmail , $from_name);
	$C->email->to($toEmail);
	$C->email->subject($subject);
	$C->email->message($mail_body);
	$C->email->reply_to($fromEmail,'');
	
	if($file_path)
		$C->email->attach($file_path,'');
	
	 $emails  = explode(",",$toEmail);
	 foreach($emails as $email)
	   $C->email->bcc($email);
			   
	@$C->email->send();
	//echo $C->email->print_debugger();die;
	unset($C);
}

/**
 * @abstract function willl send sms
 */
function sendSMS($mo_no,$msg, $id='dndperrian_pri')
{
	return;
	
	//echo $mo_no."==".$msg."==".$id;
	if(!empty($mo_no) && !empty($msg))
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,  "http://spider.blogdns.com:8080/spidersms/smsapi.jsp");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,"userId=$id&password=p123&mobileno=$mo_no&message=$msg&senderid=Perian");
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		$response = curl_exec($ch);
		
		/*$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if (curl_errno($ch)) {
		   echo "Error : ".curl_error($ch);
		}
		curl_close($ch);
		echo "Response : ".$response;*/
		
		/*$out = curl_exec($ch);
		if(empty($out))
		{ echo '<script>alert("Please Correct Details.");</script>'; }
		else
		{ echo '<script>alert("Your Password Has Been Sent To Your Mobile No..");</script>'; }
		*/
		
		curl_close($ch);
		//ob_end_clean();
	}
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	This function is setting error,notification,
	information message,
	keep data in session.
	@params : 
		@Key : Key name of the variable
		@msg : Which message you want to dispaly 
				in next page without pass query string.
++++++++++++++++++++++++++++++++++++++++++++++
*/
function setFlashMessage($key,$msg)
{
	if($key && $msg != '')
	{
		$C = & get_instance();
		$C->session->set_userdata('flash_'.$key,$msg);
	}
}

/*
+---------------------------------------------------+
	This function is uplaod files in directory which 
	you specified in parameters
	@params ::
		$uploadFile : Input type "file" name which you gave in HTML form
		$fileType : File type you want allow while uploading E.X [image,video,doc]
		$folder : In which folder you want uplaod current file
		$fileName (Optional) : If you will specify file name then codeigniter
								take that file name while uploading file.
+---------------------------------------------------+
*/
function uploadFile($uploadFile,$filetype,$folder,$fileName='')
{
	$CI = & get_instance();
	$resultArr = array();
	
	$config['max_size'] = '1024000';
	if($filetype == 'image') 	$config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG';
	if($filetype == 'All') 	$config['allowed_types'] = '*';
	if($filetype == 'pdf') 	$config['allowed_types'] = 'pdf';
	if($filetype == 'doc') $config['allowed_types'] = 'pdf|doc|docx|xls|ppt|rtf|xlsx|pptx|swf|gif|jpg|png|jpeg|txt|csv|text|TEXT|ACL|AFP|ANS|CSV|CWK|STW|RPT|PDAX|PAP|PAGES|SXW|STW|QUOX|WRI|XML|HTML|MCW|XPS|TXT|ABW|JPEG|PNG|SWF|PPT|PPTX|PDF|DOC|DOCX|XLS|XLSX|TeX';
	if($filetype == 'csv') 	$config['allowed_types'] = 'csv';
	if($filetype == 'swf') 	$config['allowed_types'] = 'swf';
	if($filetype == 'video') $config['allowed_types'] = 'flv|mp4|mov';
	if($filetype == 'zip') $config['allowed_types'] = 'zip|rar|gz|tar|tgz';
	
	$dir_path = 'assets/'.$folder;
	
	if(!is_dir('./'.$dir_path))
		mkdir('./assets/'.$folder);
		
	$config['upload_path'] = $dir_path;
	
	if($fileName != "")
		$config['file_name'] = $fileName;
	
	$CI->load->library('upload', $config);
	$CI->upload->initialize($config);
	
	if(!$CI->upload->do_upload($uploadFile))
	{
		$resultArr['success'] = false;
		$resultArr['error'] = $CI->upload->display_errors();
	}
	else
	{
		$resArr = $CI->upload->data();
		$resultArr['success'] = true;

		if($CI->router->class == 'product' && $uploadFile == "product_image" )
		{
			//upzip folder structure
			/*$data = array('upload_data' => $resArr);
			extractZip($data);*/
			
			$CI->load->library('unzip');
			if(file_exists("./".$dir_path."/".$resArr['raw_name']))
			{
				$resultArr['success'] = false;
				$resultArr['error'] = ucfirst($folder)." ".getErrorMessageFromCode( '01034' );
			}
			else
			{
				$CI->unzip->extract($dir_path."/".$resArr['file_name'], $resArr['file_path']);
			}
			$CI->unzip->close();
		}

		$resultArr['path'] = $dir_path."/".$resArr['file_name'];
	}
	
	return $resultArr;
}

function extractZip($data)
{
	$zip = new ZipArchive();
	
	$file = $data['upload_data']['full_path'];
	$targetdir = $data['upload_data']['file_path'];
	
	//echo $file."==".$targetdir;
	//chmod($file,0777);
	
	$res = $zip->open($file);
	if ($res === TRUE)
	{
		$zip->extractTo($targetdir); // place in the directory with same name  
		$zip->close();
		//echo 'Ok';die;
	}
	else
	{
		//echo 'Failed';die;
	}
	
}

function unlinkFile($path)
{
	$resArr = array();
	if(preg_match("/\bassets\/\w+\/\w+/",$path) == FALSE)
	{
		$resArr['success'] = false;
		$resArr['error'] = "Access denied";
		return $resArr;
	}
	
    if (is_dir($path))
	{
		$iterator = new RecursiveIteratorIterator( new RecursiveDirectoryIterator($path, 4096), 2 ); //4096 and 2 are replaced vesion of PHP CONSTANTS since the costants are not avaialable in this PHP version

		foreach ($iterator as $file)
		{
			if ($file->isDir())
			{
				rmdir($file->getPathname());
			}
			else
			{
				unlink($file->getPathname());
			}
		}
		rmdir($path);
	}
	else
	{
		(file_exists($path))?unlink($path):"";
	}

	$resArr['success'] = true;
	return $resArr;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++
	Function will return text which are fully 
	closed tag. function will automatically close
	all tags which are not closed. 
++++++++++++++++++++++++++++++++++++++++++++++
*/
function __MCEText($string,$length)
{
	if( !empty( $string ) && $length>0 ) 
	{ 
		$isText = true; 
		$ret = ""; 
		$i = 0; 
		
		$currentChar = ""; 
		$lastSpacePosition = -1; 
		$lastChar = ""; 
		
		$tagsArray = array(); 
		$currentTag = ""; 
		$tagLevel = 0; 
		
		$noTagLength = strlen( strip_tags( $string ) ); 
		
		// Parser loop 
		for( $j=0; $j<strlen( $string ); $j++ ) 
		{ 
			$currentChar = substr( $string, $j, 1 ); 
			$ret .= $currentChar; 
			
			// Lesser than event 
			if( $currentChar == "<") $isText = false; 
			
			// Character handler 
			if( $isText ) 
			{ 	
				// Memorize last space position 
				if( $currentChar == " " ) { $lastSpacePosition = $j; } 
				else { $lastChar = $currentChar; } 
				$i++; 
			} 
			else  
				$currentTag .= $currentChar; 
		
		
			// Greater than event 
			if( $currentChar == ">" ) 
			{ 
				$isText = true; 
			
				// Opening tag handler 
				if( ( strpos( $currentTag, "<" ) !== FALSE ) && ( strpos( $currentTag, "/>" ) === FALSE ) &&  ( strpos( $currentTag, "</") === FALSE ) ) 
				{ 
					// Tag has attribute(s) 
					if( strpos( $currentTag, " " ) !== FALSE )
						$currentTag = substr( $currentTag, 1, strpos( $currentTag, " " ) - 1 ); 
					else 
						$currentTag = substr( $currentTag, 1, -1 );  // Tag doesn't have attribute(s) 

					array_push( $tagsArray, $currentTag ); 
				
				} 
				else if( strpos( $currentTag, "</" ) !== FALSE ) 
					array_pop( $tagsArray ); 
					
				$currentTag = ""; 
			} 
			
			if( $i >= $length) 
				break; 
		} 
		
		// Cut HTML string at last space position 
		if( $length < $noTagLength ) 
		{ 
			if( $lastSpacePosition != -1 ) 
				$ret = substr( $string, 0, $lastSpacePosition ); 
			else 
				$ret = substr( $string, $j ); 
				
		} 
		if(strlen($string) > $length)
			$ret.='...';
		// Close broken XHTML elements 
		while( sizeof( $tagsArray ) != 0 ) 
		{ 
			$aTag = array_pop( $tagsArray ); 
			$ret .= "</" . $aTag . ">\n"; 
		} 
		
	} 
	else 
		$ret = ""; 
	
	return( $ret ); 
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++
this function helps for fetch product code .
and extract for cs , s1 ,s2 ,m 

++++++++++++++++++++++++++++++++++++++++++++++++++

*/
function parseProductcode($product_generated_code)
{
	return explode("-",$product_generated_code);
}

/*
 ++++++++++++++++++++++++++++++++++++++++++++++++++
this function helps for fetch product code .
and extract for cs , s1 ,s2 ,m

++++++++++++++++++++++++++++++++++++++++++++++++++

*/
function parseProductcodeInfo($product_generated_code_info)
{
	return explode("|",$product_generated_code_info);
}

/**
 * @author Cloud Webs
 * @abstract generate unique page token 
 */
function pageToken()
{
	return rand(1,1000).random_string('alnum','7').rand(1,1000);	
}

/**
 * @author Cloud Webs
 * @abstract explicit override of ucwords:  function will first lowercase all char and then uppercase first char using ucwords
*/
	function ucWordsNew($str='')
	{
		if($str!='')
			return ucwords(strtolower($str));
		else 
			return '';	
	}

/*
 * @author Cloud Webs
 * @abstract function will optimize redirect url to overcome Code igniter bug
*/
	function customizeRedUrl($msg)
	{
		$pos = strpos($msg, '&');
		if ($pos !== false)
		{
			$msg = substr_replace($msg,'?',$pos, 1);
		}			
		return $msg;
	}

/**
 * @author Cloud Webs
 * @abstract Function will check if array is empty
 */	
	function isEmptyArr( $arr )
	{
		if( is_array($arr) )
		{
			$arr = array_filter($arr);
			if ( !empty($arr) ) { return false; }
			else { return true; }
		}
		else 
		{ return true; }
	}
	
/* 
 * @author Cloud Webs
 * @abstract function will return url for search by keyword on filter
 */
	function searchByKeywordUrl( $keyword )
	{
		$keyword = str_replace( array('&', '#',"'s"), "", $keyword); 
		$keyword = str_replace( array(' '), "-", $keyword); 
		return site_url($keyword.'.html');
	}
	
	/*
	 * @author Cloud Webs
	 * @abstract return current user agent and device
	 */
	function getUserAgentDevice( )
	{	
		return array('l_user_agent'=>$_SERVER['HTTP_USER_AGENT'], 'l_user_device'=>'');
	}
	
	function getUserAgent()
	{
		return (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
	}

/**
 * @author Cloud Webs
 * @abstract function record any page accessed by user
 */
	function getOnlineVisiotrsMap( $onlineVis )
	{
		$CI =& get_instance();
	}

/**
 * @author Cloud Webs
 * @abstract function return user navigation flow URL
 */
	function customerUrl( $customer_id=0 )
	{
		return site_url();
	}
	
/**
 * @author Cloud Webs
 * @abstract function return user navigation flow URL
 */
	function userAccessFlowUrl( $session_id='', $ip='', $email_id='', $customer_id=0 )
	{
		return site_url();
	}
	
/**
 * @author Cloud Webs
 * @abstract function return user navigation flow URL
 */
	function trafficFlowUrl( $session_id='', $ip='', $email_id='', $customer_id=0 )
	{
		return site_url();
	}

/**
 * @author Cloud Webs
 * @abstract function return user navigation flow URL
 */
	function emailFlowUrl( $session_id='', $ip='', $email_id='', $customer_id=0 )
	{
		return site_url();
	}

/**
 * @author Cloud Webs
 * @abstract function will convert timein seconds to string
 */
	function time2string($time)
	{
		$second = 1;
		$minute = 60*$second;
		$hour   = 60*$minute;
		$day    = 24*$hour;
		
		$ans[0] = floor($time/$day);
		$ans[1] = floor(($time%$day)/$hour);
		$ans[2] = floor((($time%$day)%$hour)/$minute);
		$ans[3] = floor(((($time%$day)%$hour)%$minute)/$second);
		
	    return ( !empty($ans[0]) ? $ans[0].' Day ': '' ).( !empty($ans[1]) ? $ans[1].' Hr ': '' ).( !empty($ans[2]) ? $ans[2].' Min ': '' ).( !empty($ans[3]) ? $ans[3].' Sec': '' );
	}

/**
 * @author Cloud Webs
 * @abstract wrapper for set_time_limit PHP function
 */
	function setTimeLimit($time=36000)
	{
		if (function_exists("set_time_limit") == TRUE AND @ini_get("safe_mode") == 0)
		{
			@set_time_limit( $time );
		}
		ini_set('memory_limit', '-1');
	}
	
/**
 * @author Cloud Webs
 * @abstract function get current page URL
 */
	function getCurrPageUrl( )
	{
		return site_url( str_replace("MyOwn/", "", $_SERVER['REQUEST_URI']) );
	}
	
/*
* Function will redirect ip address url
*/
	function redirectIpAddressUrl($ip="")
	{
		return "http://www.ip-tracker.org/locator/ip-lookup.php?ip=".@$ip;
	}	
	
/**
 * @abstract function will return types of layout applicable 
 */
	function layoutTypes()
	{
		return array( 'PC', 'Tablet', 'Mobile');
	}

/*
+--------------------------------------------------+
	@author Cloud Webs
	Function will filter keyword for search
+--------------------------------------------------+
*/	
	function isKeyword( $keyword )
	{
		$keyword = trim($keyword);
		if( empty( $keyword ) || strlen( $keyword ) == 1 )	
		{
			return false;
		}
		else
		{
			return str_replace( "'s", "", $keyword);	
		}
	}
	
	/*
	* Function get view dir according to device like... mobile or desktop 
	*/
	function getViewDir( $view )
	{
		/**
		 * if mobile specific site is used separately then allow this function logic and comment below return statement
		 */
		return ""; 
		
		$CI =& get_instance();
		if( $CI->session->userdata('lType') == 'PC' )
		{
			return '';	
		}
		else if( strpos( $view, "admin/") === FALSE )		
		{
			return 'm/';
		}
		else	//no mobile implementation for admin panel 
		{
			return '';
		}
	}

	/*
	* Function will return device compatible view path 
	* if device type is non PC then inject "m/" in view path to render device compatible page
	*/
	function deviceComPath( $view )
	{
		$CI =& get_instance();
		$vDir = getViewDir( $view );
		
		if( $vDir == '' || $CI->router->class == 'mobile')	//temp second condition
		{
			return $view;
		}	
		else
		{
			return filterMobView( $vDir.$view );
		}
	}

	/*
	* Function inject string in string after specified string
	*/
	function injectStr( $str, $after_str, $ins_str )
	{
		$pos = strpos( $str, $after_str ) + strlen($after_str);
		$part1 = substr( $str, 0, $pos);
		$part2 = substr( $str, $pos);
		return $part1.$ins_str.$part2;
	}

	/*
	* Function will filter mobile view to overcome some of the differences between 
	* rendering of deswk and mobile site: like desk has home page while mobile site directly lands to jewellery page
	* so there is need to redirect desk new-jewellery(jewellery) page to mobile sites home page
	*/
	function filterMobView( $str )
	{
		if( strpos( $str, "new-jewellery" ) !== FALSE )
			return str_replace( "new-jewellery", "home", $str );
		else if( strpos( $str, "js_variables" ) !== FALSE )
			return str_replace( "m/", "", $str );
		else if( strpos( $str, "notifications" ) !== FALSE )
			return str_replace( "m/", "", $str );
		else if( strpos( $str, "login_fb" ) !== FALSE )
			return str_replace( "m/", "", $str );
		else if( strpos( $str, "m_hlive_chat" ) !== FALSE )
			return str_replace( "m/", "", $str );
		else if( strpos( $str, "payuform" ) !== FALSE )
			return str_replace( "m/", "", $str );
		else if( strpos( $str, "paypal_form" ) !== FALSE )	
			return str_replace( "m/", "", $str );
		else if( strpos( $str, "templates/" ) !== FALSE )
			return str_replace( "m/", "", $str );
		else
			return $str;
	}
	
	/**
	 * this function will return domain prefixed url for perrian assets 
	 */
	function asset_url( $path='' )
	{
		return ASSET_URL.$path;
	}

	/**
	 * @abstract multi dimensional to single dimensional array
	 */
	function array_flatten($array)
	{ 
		if (!is_array($array))
		{ 
			return FALSE; 
		} 
		$result = array(); 
		
		foreach ($array as $key => $value)
		{ 
			if (is_array($value))
			{ 
			  $result = array_merge($result, array_flatten($value)); 
			} 
			else
			{ 
			  $result[$key] = $value; 
			} 
		} 
		return $result; 
	} 

	/**
	 * @abstract cctld redirect
	 */
	function flip_ccTld( $domain, $key )
	{ 
		header( 'Location: '.$domain.'?change_country='.$key );
	}
	
	/**
	 *
	 * @abstract override logically systems error_log function
	 */
	function errorLog( $key, $msg, $is_mail= true )
	{ 
		//log to db
		insertLog( $key, $msg);
	
		if( $is_mail )
		{
			//log to email
			// ini_set("log_errors", 1); //ini_set("error_log", "/tmp/php-error.log");
			$headers = "From: kakdiya.gautam288@gmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			error_log ( 'Subject: '.$key. ' <br><br>Message: ' .$msg, 1, 'kakdiya.gautam288@gmail.com', $headers );
		}
	}
	
	/**
	 * function insert log in log table for anything that needs to be logged in system process
	 */
	function insertLog( $l_group_key, $l_description )
	{
		$CI =& get_instance();
		$CI->db->insert( "log", array( 'l_group_key'=>$l_group_key, 'l_description'=>$l_description ) );
	}

/*
+------------------------------------------------------------------+
	Function will be use for generate export csv/excel file. 
	@params-> $fileName : download file name
			  $columns : column field name in file 
			  $listArr : list data of array
+------------------------------------------------------------------+
*/
function exportExcel($fileName,$columns,$listArr,$ext)
{
	$CI = & get_instance();
	$CI->load->helper('download');
	$handle1 = fopen($fileName,'w');
	$sep = ($ext=='csv') ? "," : "\t"; //seperate
		
	$fileTextArray = array_values($columns);
	$fileText = "";
	foreach($fileTextArray as $ke=>$va)
		$fileText .= pgTitle($va).$sep;
	
	$fileText = substr($fileText,0,-1)."\n";
	//$fileText = implode(",",$fileTextArray)."\n"; //excel:\t
	
	fwrite($handle1, $fileText);
	
	foreach($listArr as $list)
	{
		if( $ext == "csv" )
		{
			foreach( $list as $key=>$val )
			{
				$newtitle = str_replace(",",".",$val);
				$newtitle = str_replace("","'",unhtmlentities($newtitle));
				$list[ $key ] = ("\"".$newtitle."\"");
			}
		}
		
		$fileText = implode($sep,$list)."\n";  //excel:\t
		fwrite($handle1, $fileText);
	}
	fclose($handle1);

	myForceDownload($fileName);
	unlink($fileName);
}

/*
 * 
 */
function unhtmlentities ($string)  {
   $trans_tbl = get_html_translation_table (HTML_ENTITIES);
   $trans_tbl = array_flip ($trans_tbl);
   $ret = strtr ($string, $trans_tbl);
   return preg_replace('/&#(\d+);/me', 
      "chr('\\1')",$ret);
}

/*
+------------------------------------------------------------------+
	Function will be use for excel download. 
	@params-> $file : download file name
+------------------------------------------------------------------+
*/	
function myForceDownload($file)
{  
	if ((isset($file))&&(file_exists($file))) 
	{
	   $fileName = str_replace("./","",$file);
					
	   header("Content-length: ".filesize($file));  
	   header('Content-Type: application/octet-stream');
	   header('Content-Disposition: attachment; filename="'.$fileName.'"');
	   
	   readfile($file);
	} 
	else 
	   echo "No file selected";
}

//string replace for India to AUS
function strReplaceIndToAus($str)
{
	if( MANUFACTURER_ID != 7 )
	{
		$arr = array('India','india');
		$newStr = str_replace($arr,"Australia/NZ",$str);
	}
	else
		$newStr = $str;
		
	return $newStr;	
	//return str_replace("india","Australia/NZ",$str);
}

/**
 * @abstract fetch string within specified start and end
 */
function fetchSubStr( $str, $start, $end, &$offsetI=0 )
{
	$pos1 = strpos( $str, $start );
	if( $pos1 !== FALSE )
	{
		$pos1 = $pos1 + strlen( $start );

		$pos2 = FALSE;
		if( !empty( $end ) )	
		{
			$pos2 = strpos( $str, $end, $pos1 );
		}
		
		if( $pos2 !== FALSE )
		{
			$offsetI = $pos2;
			return substr( $str, $pos1, ( $pos2 - $pos1 ) );
		}
		else
		{
			$offsetI = $pos1;
			return substr( $str, $pos1 );
		}
	}
}

/**
 * @abstract fetch last substring within specified start and end
 */
function fetchLastSubStr( $str, $start, $end, &$offsetI=0 )
{
	$pos1 = strrpos( $str, $start );
	if( $pos1 !== FALSE )
	{
		$pos1 = $pos1 + strlen( $start );

		$pos2 = FALSE;
		if( !empty( $end ) )
		{
			$pos2 = strpos( $str, $end, $pos1 );
		}

		if( $pos2 !== FALSE )
		{
			$offsetI = $pos2;
			return substr( $str, $pos1, ( $pos2 - $pos1 ) );
		}
		else
		{
			$offsetI = $pos1;
			return substr( $str, $pos1 );
		}
	}
}

/**
 * Create URL Title
 *
 * Takes a "title" string as input and creates a
 * human-friendly URL string with a "separator" string
 * as the word separator.
 *
 * @access	public
 * @param	string	the string
 * @param	string	the separator
 * @return	string
 */
if ( ! function_exists('url_title'))
{
	function url_title($str, $separator = '-', $lowercase = FALSE)
	{
		if ($separator == 'dash')
		{
			$separator = '-';
		}
		else if ($separator == 'underscore')
		{
			$separator = '_';
		}

		$q_separator = preg_quote($separator);

		$trans = array(
				'&.+?;'                 => '',
				'[^a-z0-9 _-]'          => '',
				'\s+'                   => $separator,
				'('.$q_separator.')+'   => $separator
		);

		$str = strip_tags($str);

		foreach ($trans as $key => $val)
		{
			$str = preg_replace("#".$key."#i", $val, $str);
		}

		if ($lowercase === TRUE)
		{
			$str = strtolower($str);
		}

		return trim($str, $separator);
	}
}

function str_safe( $str )
{
	return strtolower( str_replace( array( "-", " " ), "_", $str ) );
}

function getAdUniqueCode( $prefix='' )
{
	return $prefix."-".time();
}

/* Function will remove white space */
function removeSpace($str)
{
	return trim(preg_replace('/\s+|&nbsp;/', ' ', $str));
}

/**
 * @abstract
 */
function isIntranetIp()
{
	if( $_SERVER['REMOTE_ADDR'] == '182.70.120.52' ) 
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validateInput( $str )
{
	return mysql_real_escape_string( stripslashes( $str ) );
}

function validateOutput( $str )
{
	return stripslashes( $str );
}

/*
* Function will remove whole tag removed
*/
function strip_tags_content($text, $tags = '', $invert = FALSE) 
{
	  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags);
    $tags = array_unique($tags[1]);

    if (is_array($tags) and count($tags) > 0) 
    {
        if ($invert == FALSE) 
            return preg_replace('@<(?!(?:' . implode('|', $tags) . ')\b)(\w+)\b.*?>.*?</\1>@si', '', $text);
        else 
            return preg_replace('@<(' . implode('|', $tags) . ')\b.*?>.*?</\1>@si', '', $text);
    } 
    elseif ($invert == FALSE) 
        return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $text);

    return $text;
} 
/*
* Function will return array of file exptension 
*/
function getAllFileExtension()
{
	return array('jpeg', 'jpg', 'png', 'bmp', 'gif', 'JPEG', 'doc', 'docx', 'pdf', 'xls', 'xlsx', 'mp4', 'flv', 'zip', 'rar', 'tar', 'gz', 'gzip', 'txt', 'rtf', 'csv', 'ppt', 'pptx' );
}
	
/**
 * @abstract Java equavalent string contains function 
 */
function isContains( $str, $search )
{
    return strpos($str, $search) !== FALSE;
}

/**
 * @abstract function will load library from application/libraries folder for which CI is not working properly
 */
function loadLibrary( $path )
{
	require_once BASE_DIR.'application/libraries/'.$path.'.php';
}

/**
 * @abstract check directory exists: abstraction function
 */
function isDirExists( $path )
{
	return file_exists( BASE_DIR.$path );
}
/**
 * @abstract make dir: abstraction function
 */
function mkDirectory( $path )
{
	return mkdir( BASE_DIR.$path );
}
/**
 * @abstract copy dir: abstraction function
 */
function copyDir( $source, $dest )
{
	if( !isDirExists( $source ) )
	{
		return false;
	}
	
	$dir = opendir( $source ); 
	$cnt = 0;
	while( false !== ( $file = readdir( $dir ) ) )
	{ 
		$cnt++;
		if ( ( $file != '.' ) && ( $file != '..' ) )
		{ 
			if( is_dir( $source . '/' . $file ) )
				copyDir($source . '/' . $file,$dest . '/' . $file); 
			else
				copy( $source . '/' . $file, $dest . '/' . $file ); 
		} 
	} 
	closedir($dir); 
}

function fileRead( $filename )
{
	return file_get_contents( BASE_DIR.$filename );
}
function fileWrite( $filename, $content )
{
	$fp = fopen( BASE_DIR . $filename, "w") or die("Unable to open file!");
	fwrite( $fp, $content);
	fclose( $fp );
}

/*
 * Save other location images from product or any other modules
 */
function saveImageFromUrl( $url, $folder="", $subdomain="" )
{
	$dir_path = 'assets/'.$folder; 
	
	if(!is_dir('./'.$dir_path))
		mkdir('./assets/'.$folder);
		
	$subdomain = ($subdomain) ? $subdomain."/" : '';
	$url =  "http" . fetchSubStr($url, "http", "?");
	
	$allowed_ext = array( 'jpg', 'jpeg', 'png', 'JPG' );
	$pos = strrpos( $url, "." );
	if( $pos !== FALSE )
	{
		$ext = substr( $url, $pos + 1 );
		if( in_array( $ext, $allowed_ext ) )
		{
			$path = $dir_path.'/'.time().'_'.rand( 1000, 100000 ).'.'.$ext;
			$img = BASE_DIR. "/".$subdomain . $path;	//upload to main domain from basedomain product
			file_put_contents( $img, file_get_contents( $url ) );
		}
	}
	return $path;
}
/*
* Function will create folder
*/
function createFolderWithFile($folder="", $manufacturer_id)
{
	if( !isDirExists( $folder ) )
	{
		mkDirectory( $folder );		
		
		$source = BASE_DIR . "index.php";
		$dest = BASE_DIR . $folder. "/index.php";
		
		copy($source, $dest);	
		
		$filename = $folder. "/index.php";
		
		$old_content = fileRead($filename); 
		$replace_str = "define( 'MANUFACTURER_ID', ".$manufacturer_id."); \n chdir( '/home/resultig/ebay1/' ); \n ";
		$new_content = str_replace("define( 'MANUFACTURER_ID', 7);", $replace_str, $old_content);
		
		fileWrite($filename, $new_content);	
		
		//Set the name for your New Sub Domain
		$subDomainname=$folder;
		$cPanelUserName="resultig";
		$cPanelPassName="Ix58nXod74";
		$rootDomainName="ebay1.imthetic.com"; 
		
		create_subdomain($subDomainname,$cPanelUserName,$cPanelPassName,$rootDomainName);		
	}
}

//Function to create subdomain
function create_subdomain($subDomain,$cPanelUser,$cPanelPass,$rootDomain) 
{
    //Generate URL for access the subdomain creation in cPanel through PHP
    $buildRequest = "/frontend/x3/subdomain/doadddomain.html?rootdomain=" . $rootDomain . "&domain=" . $subDomain . "&dir=ebay1/" . $subDomain;

    //Open the socket
    $openSocket = fsockopen('localhost',2082);
    if(!$openSocket) {
        //SHow error
        return "Socket error";
        exit();
    }

    //Login Details
    $authString = $cPanelUser . ":" . $cPanelPass;

    //Encrypt the Login Details 
    $authPass = base64_encode($authString);

    //Request to Server using GET method
    $buildHeaders  = "GET " . $buildRequest ."\r\n";

    //HTTP
    $buildHeaders .= "HTTP/1.0\r\n";
    //Define Host
    $buildHeaders .= "Host:localhost\r\n";

    //Request Authorization
    $buildHeaders .= "Authorization: Basic " . $authPass . "\r\n";
    $buildHeaders .= "\r\n";

    //fputs
    fputs($openSocket, $buildHeaders);
    while(!feof($openSocket)) {
    fgets($openSocket,128);
    }
    fclose($openSocket);

    //Return the New SUbdomain with full URL
    $newDomain = "http://" . $subDomain . "." . $rootDomain . "/";

    //return with Message
    return "Created subdomain:=".$newDomain;

}

/**
 * function will sets inventory session currently under use
 */
function setInventorySession($it_key)
{
	$CI =& get_instance();
	$CI->session->set_userdata(array("IT_KEY"=>$it_key));
}

/*
 * Function will seo data
*/
function getCmsPages($key="")
{
	$CI = & get_instance();
	if(!empty($key))
	{
		return $CI->db->where('p_key',$key)->where('manufacturer_id',MANUFACTURER_ID)->where('p_status',0)->get('cms_pages')->row_array();
	}
}

/**
 *
 */
function getRequestUri()
{
	$CI =& get_instance(); 
	if( $_SERVER["HTTP_HOST"] != LOCALHOST_IP )
	{
		return $CI->input->server('REQUEST_URI'); 
	}
	else 
	{
		return str_replace( "/bansi_stationary", "", $CI->input->server('REQUEST_URI'));
	}
}

/**
 * set query param
 */
function setQueryParam( $req_uri, $set_key, $set_val )
{
	$CI =& get_instance();
	if( strpos( $req_uri, $set_key ) !== FALSE )
	{
		$tmpV = $CI->input->get( $set_key );
		$req_uri = str_replace( $set_key."=".$tmpV, $set_key."=".$set_val, $req_uri); 
	}
	else 
	{
		if( strpos( $req_uri, "?" ) === FALSE )
			return $req_uri."?".$set_key."=".$set_val;
		else 
			return $req_uri."&".$set_key."=".$set_val;
	}

	return $req_uri; 
}

/**
 * flushes un necessary parts like html, numeric
 */
function breadcumbLastPartFlush( $ar )
{
	if( strpos( $ar, ".htm" ) !== FALSE )
	{
		$ar = str_ireplace( array(".html", ".html" ), "", $ar);
		return str_replace("+", "-", $ar);
	}
	else if( strpos( $ar, "-" ) !== FALSE )
	{
		$tempA = explode("-", $ar);
		if( is_numeric( array_pop( $tempA ) ) )
			return implode("-", $tempA);
		else 
			return $ar;
	}
	else 
	{
		return $ar; 
	}
}



/**
 * secret used in hash algorithm for both web app and mobile app user
 */
function generateSessionId( $sessions_id )
{
	$CI =& get_instance();
	return md5( $sessions_id . $CI->config->item('encryption_key') );
}

/**
 * @author Cloud Webs
 * PHP unique session_id override for both web app and mobile app users
 */
function set_session_id( $id )
{
	session_id( $id );
}

/**
 * return current mysql compatible timestamp
 */
function mysqlTimestamp()
{
	return date("Y-m-d H:i:s"); 
}

/**
 *
 */
function changeLangUriParams( $lang_id, $lang_key )
{
	return "set=lang&lang=".$lang_key;
}

/**
 * Function will get all Inventory Type
 */
function changeInventoryUriParams( $it_key )
{
	return "si=IT_KEY&IT_KEY=".$it_key;
}

/**
 *
 */
function dirToArray($dir)
{
	$contents = array();
	foreach (scandir($dir) as $node)
	{
		if ($node == '.' || $node == '..') continue;
		if (is_dir($dir . '/' . $node))
		{
			$contents[$node] = dirToArray($dir . '/' . $node);
		}
		else
		{
			$contents[] = $node;
		}
	}
	return $contents;
}
?>