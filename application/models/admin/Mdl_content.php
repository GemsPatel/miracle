<?php
class Mdl_content extends CI_Model
{
    var $cTableName = '';
    var $cTableNameSA = '';
    var $cAutoId = '';
    var $cAutoIdSA= '';
    var $cPrimaryId = '';
    var $cPrimaryIdSA = array();
	
	function getData( $content_id=0 )
	{
	    if( !empty( $content_id ) )
	        $this->db->where( "content_id",$content_id );
        else if($this->cPrimaryId == "")
		{
			$f = $this->input->get('f');
			$s = $this->input->get('s');
			$c_name = $this->input->get('c_name');
			$c_client = $this->input->get('c_client');
			$c_sku = $this->input->get('c_sku');

			if(isset($c_name) && $c_name != "")
			    $this->db->where( 'c_name LIKE \'%'.$c_name.'%\' ' );
			
		    if(isset($c_client) && $c_client != "")
		    	$this->db->where( 'c_client LIKE \'%'.$c_client.'%\' ' );
		    
	        if(isset($c_sku) && $c_sku != "")
	            $this->db->where('c_sku LIKE \'%'.$c_sku.'%\' ');
    
			if($f !='' && $s != '' )
				$this->db->order_by( $f, $s );
			else
				$this->db->order_by( $this->cAutoId, 'DESC' );
		}
		else if($this->cPrimaryId != '')
			$this->db->where( $this->cAutoId, $this->cPrimaryId );
		
		$res = $this->db->get( $this->cTableName );
		return $res;
	}
	
	function saveData()
	{
	    $logType = "";
// 	    $_POST['p_status'] = 1;
	    $last_id = $this->saveItem( false, $logType );
	    
	    setFlashMessage('success','Product has been '.( ( $this->cPrimaryId != '' ) ? 'updated': 'inserted' ).' successfully.');
	    return $last_id;
	}
	
	function saveItem( $is_external, &$logType )
	{
		$data = $this->input->post();
		unset( $data['item_id'] );

		$content['c_alias'] = strtolower( url_title( $data['c_name'] ) );
		$content['c_date'] = $data['c_date'];
		$content['content_category_id'] = $data['content_category_id'];
		$content['c_name'] = $data['c_name'];
		$content['c_client'] = $data['c_client'];
		$content['c_explanation'] = $data['c_explanation'];
		$content['c_sku'] = $data['c_sku'];
		$content['c_hashtag'] = $data['c_hashtag'];
		$content['c_short_description'] = $data['c_short_description'];
		$content['c_description'] = $data['c_description'];
		$content['c_status'] = $data['c_status'];
// 		$content['column_size'] = $data['column_size'];
		$content['is_display_home'] = isset( $data['is_display_home'] ) ? 1 : 0;
		
		if( $this->input->post('c_banner') && $_FILES['c_banner']['name'])
		{
			$content['c_banner'] = uploadFolder( 'c_banner', 'image', 'content/banner' );
// 			resize_image( $content['c_banner'] , $content['c_banner'] , 0, 440 ); //source, destination, width, height
		}
		
		if( $this->input->post('c_home_image') && $_FILES['c_home_image']['name'])
		{
			$content['c_home_image'] = uploadFolder( 'c_home_image', 'image', 'content/home' );
			// 			resize_image( $content['c_banner'] , $content['c_banner'] , 0, 440 ); //source, destination, width, height
		}
		
		/**
		 * Zip Download Folder
		 */
		if(@$_FILES['c_images']['name'] != "")
		{
			$content['c_images'] = uploadFolder('c_images', 'zip', 'content_download');
		}

		//if primary id set then we have to make update query
		if($this->cPrimaryId != '')
		{
			$this->db->set( 'c_modified_date', 'NOW()', FALSE );
			$this->db->where( $this->cAutoId, $this->cPrimaryId )->update( $this->cTableName, $content);
			$last_id = $this->cPrimaryId;
			$logType = 'E';
		}
		else // insert new row
		{
			$this->db->insert( $this->cTableName, $content);
			$last_id = $this->db->insert_id();
			$logType = 'A';
		}

		$lot_cnt = 0;
		$lot_ind = $data["column_size"];
		$product_sku = $data['c_sku'];
		
		if( is_array($lot_ind) && sizeof($lot_ind) > 0 )	//isEmptyArr could not be used here, since in case of one lot with 0 index.
		{
			//delete all content video link
			$this->db->where_in( "content_id", $last_id )->delete( "content_json");
			
			$video['content_id'] = $last_id;
			
			$k=0;
			if( $logType == "E")
				$k=1;
				
			foreach ($lot_ind as $c=>$lot_cnt)
			{
				$content_json = array();
				for( $i=0;$i<$lot_cnt;$i++ )
				{
					$image_name = "";
					if( !empty($_FILES['lot_file_'.$k]['name'] ) )
						$content_json[$c][] = uploadFolder( 'lot_file_'.$k, 'image', 'content/images/'.$data['c_sku'] );
					else if( !empty( $data['video_link_'.$k] ) )
						$content_json[$c][] = $data['video_link_'.$k];
					else if( !empty($data['lot_hidden_'.$k] ) )
						$content_json[$c][] = $data['lot_hidden_'.$k];
					
					$k++;
				}
				
				$video['content_json'] = json_encode( $content_json );
				$this->db->insert( "content_json", $video );
			}
		}
		
		saveAdminLog($this->router->class, $data['c_name'], $this->cTableName, $this->cAutoId, $last_id, $logType);
		return $last_id;
	}
	
/*
+----------------------------------------------------------+
	Deleting item. hadle both request get and post.
	with single delete and multiple delete.
	@prams : $ids -> integer or array
+----------------------------------------------------------+
*/	
	function deleteData($ids)
	{
		$returnArr = array();
		if($ids)
		{
		    $id = $ids;
			$getName = getField('c_name', $this->cTableName, $this->cAutoId, $id);
			saveAdminLog($this->router->class, @$getName, $this->cTableName, $this->cAutoId, $id, 'D');
			
			$this->db->where_in( $this->cAutoId, $id )->delete( "content_images" );
			$this->db->where_in( $this->cAutoId, $id )->delete( "content_video_link" );
			$this->db->where_in( $this->cAutoId, $id )->delete( $this->cTableName );
			
			$returnArr['type'] ='success';
			$returnArr['msg'] = $getName." records has been deleted successfully.";
		}
		else
		{
			$returnArr['type'] ='error';
			$returnArr['msg'] = "Please select at least 1 item.";
		}
		echo json_encode($returnArr);
	}
/*
+-----------------------------------------+
	Update status for enabled/disabled
	@params : post array of ids, status
+-----------------------------------------+
*/	
	function updateStatus()
	{
		$status = $this->input->post('status');
		$cat_id = $this->input->post('cat_id');
		
		$data['c_status'] = $status;
		$this->db->where($this->cAutoId,$cat_id);
		$this->db->update($this->cTable,$data);
	}
	
	/**
	 * export query
	 */
	function exportQuery()
	{
	    $export_limit = $this->input->post("export_limit");
	    if( !empty($export_limit) )
	    {
	        $export_limit = " LIMIT ".$export_limit;
	    }
	    
	    $sql = "SELECT `p`.`product_id` as `ID`, `p`.`p_name` as `Product Name`, `p`.`p_unit_price` as `Unit Price`, `u`.`u_name` as `UoM`, 
                `p`.`p_qty` as `Quantity`, `p`.`p_description` as `Description`, `p`.`p_type` as `Type ( 1-Product 2-Service )`, 
                `p`.`p_purchase_rate` as `Purchase Rate`, `c`.`currency_name` as `Purchase Rate Currency`, `p`.`p_shn` as `SHN/SAC`, 
                `p`.`p_sku` as `SKU`, CONCAT( `t`.`t_name`, ' ', `t`.`t_percentage`,'%' ) as `Tax`, `p`.`p_cess_tk` as `CESS%`, `p`.`p_cess_pls` as `CESS`";
	    
	    $sql .= "FROM product p 
                LEFT JOIN uom u ON u.uom_id = p.uom_id
                LEFT JOIN currency c ON c.currency_id = p.currency_id
                LEFT JOIN tax t ON t.tax_id = p.tax_id
                GROUP BY p.product_id ".$export_limit;
	    
	    $res = $this->db->query( $sql );
	    return $res->result_array();
	}
	
	/**
	 * This Function will export product information but only header or column information
	 * downloaded and create csv file.
	 */
	function exportDataSample( $is_header_row_only=false )
	{
	    $listArr = $this->exportQuery();
	    
	    $ext = $this->input->post($this->controller.'_export');
	    if( empty($ext) )
	    {
	        $ext = "csv";
	    }
	    
	    $col= array( array_keys( $listArr[0] ) );
	    $col= $col[0];
	    
	    if( $is_header_row_only )
	    {
	        $headerRowText = $this->exportExcel( $this->cTable.'_'.date('d-m-Y H-i-s').'.'.$ext, $col, '', $ext, array(), $is_header_row_only);
	        return explode(",", $headerRowText);
	    }
	    else
	    {
	        $this->exportExcel($this->cTable.'_'.date('d-m-Y H-i-s').'.'.$ext, $col, '', $ext );
	    }
	    die;
	}
	
	/**
	 * This Function will export product information
	 * downloaded and create csv file.
	 */
	function exportData()
	{
	    $listArr = $this->exportQuery();
	    
	    $ext = $this->input->post($this->controller.'_export');
	    if( empty($ext) )
	    {
	        $ext = "csv";
	    }
	    
	    $col= array(array_keys($listArr[0]));
	    $col= $col[0];
	    
	    $this->exportExcel($this->cTable.'_'.date('d-m-Y H-i-s').'.'.$ext, $col, $listArr, $ext);
	    
	    die;
	}
	
	/**
	 * This Function will export client information but only header or column information
	 * downloaded and create csv file.
	 */
	
	function exportExcel($fileName,$columns,$listArr,$ext,$compAttrArr=array(), $is_header_row_only=false)
	{
	    $CI = & get_instance();
	    $CI->load->helper('download');
	    $sep = ($ext=='csv') ? "," : "\t"; //seperate
	    
	    $fileTextArray = array_values($columns);
	    $fileText = "";
	    foreach($fileTextArray as $va)
	    {
            $fileText .= $va.$sep;
	    }
	    
	    $fileText = substr($fileText,0,-1)."\n";
	    //$fileText = implode(",",$fileTextArray)."\n"; //excel:\t
	    if( $is_header_row_only )
	    {
	        return $fileText;
	    }
	    
	    $handle1 = fopen($fileName,'w');
	    fwrite($handle1, $fileText);
	    
	    /**
	     * added on 20-08-2015
	     * is not pass empty list Array
	     */
	    if(!empty($listArr))
	    {
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
	    }
	    fclose($handle1);
	    
	    myForceDownload($fileName);
	    unlink($fileName);
	}
	
	function formValidation( $cons__this )
	{
	    $cons__this->form_validation->set_rules('c_name','Client Name','trim|required');
	    $cons__this->form_validation->set_rules('c_contact_name','Contact Name','trim|required');
	    $cons__this->form_validation->set_rules('c_phone','Phone Number','trim|required');
	    $cons__this->form_validation->set_rules('c_email','Customer Email','trim|required|valid_email|callback_clientEmail');
	    $cons__this->form_validation->set_rules('c_gstin','GSTIN','trim|required');
	    $cons__this->form_validation->set_rules('c_tin','TIN','trim|required');
	    $cons__this->form_validation->set_rules('c_pan','PAN','trim|required');
	    $cons__this->form_validation->set_rules('c_vat_no','VAT','trim|required');
	    $cons__this->form_validation->set_rules('c_billing_address','Billing Address','trim|required');
	    $cons__this->form_validation->set_rules('country_id','Country','trim|required|numeric');
	    $cons__this->form_validation->set_rules('state_id','State','trim|required');
	    $cons__this->form_validation->set_rules('city_id','City','trim|required');
	    $cons__this->form_validation->set_rules('c_pincode','Pincode','trim|required');
	    $cons__this->form_validation->set_rules('currency_id','Currency','trim|required');
	    
	    if( $_POST['c_is_diff_ship_address'] == 1 )
	    {
	        //address table fields
	        $cons__this->form_validation->set_rules('csa_client_name[]','Client Name','trim|required');
	        $cons__this->form_validation->set_rules('csa_address[]','Client Address','trim|required');
	        $cons__this->form_validation->set_rules('csa_country[]','Country','trim|required');
	        $cons__this->form_validation->set_rules('csa_state[]','State','trim|required');
	        $cons__this->form_validation->set_rules('csa_city[]','City','trim|required');
	        $cons__this->form_validation->set_rules('csa_pincode[]','Pincode','trim|required');
	    }
	}

	/**
	 * @abstract insert data into pincode table in format
	 * format:: pincode,areaname,cityname,state_id
	 */
	function importData()
	{
	    setTimeLimit();
	    $this->load->helper("import_export");
	    $this->load->helper("custom_file");
	    $image = uploadFile('import_csv','All','import_data_client');
	    if( empty( $image["path"] ) )
	    {
	        //[temp]
	        if( isset( $image["error"] ) )
	        {
	            setFlashMessage("error", $image["error"]);
	        }
	        else
	        {
	            setFlashMessage("error", "Import file missing, some error occured in upload.");
	        }
	        
	        redirect("admin/".$this->controller);
	    }
	    
	    $data["path"] = $image['path'];
	    $data["start"] = 1;
	    $data['pageName'] = 'admin/'.$this->controller.'/import_process';
	    
	    $this->load->view('admin/site-layout',$data);
	    
	    exit(1);
	}
	
	
	/**
	 * @abstract insert data into pincode table in format
	 * format:: pincode,areaname,cityname,state_id
	 */
	function importDataProcess( $path, $start )
	{
	    setTimeLimit();
	    $is_debug=false;
	    $num_records = 1;	//number of records to process each time
	    $this->load->helper("import_export");
	    $this->load->helper("custom_file");
	    
	    if( !empty($path) )
	    {
	        $resArr = array();
	        $EXT = strtoupper( file_extension($path) );
	        
	        if( $EXT == "CSV" )
	        {
	            $resArr = readCsvNew($path, ",", true);
	        }
	        else
	        {
	            ieh_errorMsg("File type: ".$EXT." does not supported, import terminated.");
	        }
	        
	        $logType = "";
	        $header = $resArr[0];
	        $attrIndexStart = 14;
	        foreach( $resArr as $k=>$ar)
	        {
	            if($k >= $start && $k < ($start + $num_records) )
	            {
	                if( sizeof( $ar ) < $attrIndexStart )
	                {
	                    ieh_errorMsg("Row number ".$k." skipped due to row has not enough number of columns, total columns found are: ". sizeof( $ar ) );
	                    continue;
	                }
	                
	                $this->cPrimaryId = $ar[0];
	                
	                $_POST['p_name'] = $ar[1];
	                $_POST['p_unit_price'] = $ar[2];

	                //Fetch uom name to id
	                if( is_numeric( $ar[3] ) )
	                {
	                    $_POST['uom_id'] = $ar[3];
	                }
	                else
	                {
	                    $_POST['uom_id'] = getField( "uom_id" , "uom", "u_key", strtoupper( $ar[3] ) );// Fetch UoM
	                }
	                
	                $_POST['p_qty'] = $ar[4];
	                $_POST['p_description'] = $ar[5];

	                //Fetch country name to id
	                if( is_numeric( $ar[6] ) )
	                {
	                    $_POST['p_type'] = ( $ar[6] == 1 ) ? 1 : 2;
	                }
	                else
	                {
	                    $_POST['p_type'] = ( strtoupper( $ar[6] ) == "PRODUCT" || strtoupper( $ar[6] ) == "PRODUCTS" ) ? 1 : 2;
	                }
	                
	                $_POST['p_purchase_rate'] = $ar[7];
	                
	                //Fetch currency name to id
	                if( is_numeric( $ar[8] ) )
	                {
	                    $_POST['currency_id'] = $ar[8];
	                }
	                else
	                {
	                    $_POST['currency_id'] = getField( "currency_id" , "currency", "currency_key", strtoupper( $ar[8] ) );// Fetch Currency
	                }
	                
	                $_POST['p_shn'] = $ar[9];
	                $_POST['p_sku'] = $ar[10];
	                $_POST['tax_id'] = $ar[11];
	                $_POST['p_cess_tk'] = $ar[12];
	                $_POST['p_cess_pls'] = $ar[13];
	                $_POST['p_status'] = 0;
	               
	                $last_id = $this->saveItem(true, $logType);
	                
	                if( $logType == "A" )
	                {
	                    ieh_successMsg("Row number ".$k." has been processed, record inserted with ID: ".$last_id);
	                }
	                else
	                {
	                    ieh_successMsg("Row number ".$k." has been processed, record updated with ID: ".$last_id);
	                }
	            }
	            else
	            {
	                if( $k >= ($start + $num_records) )
	                {
	                    echo '<script type="text/javascript">
								setTimeout( function()
											{ importDataProcess( \''.$path.'\', '.($start + $num_records).'); }, 2000 );
							  </script>';
	                    
	                    exit(1);
	                }
	            }
	        }
	        
	        ieh_successMsg("File has been imported.");
	    }
	    else
	    {
            ieh_errorMsg("Import file missing.");
	    }
	    
	    ieh_hideLoader( $this->controller );
	    
	    exit(1);
	}
	
	/**
	 *
	 */
	function multipleImageUploadName( $image_index )
	{
		return "l".$image_index;
	}
	
	/**
	 *
	 */
	function multipleImageUploadRemoveWrapper( $image_index, $product_sku )
	{
		if( $this->input->post("image_old_name_".$image_index) !== FALSE )
		{
			$this->imageVersionsRemove( $this->input->post("image_old_name_".$image_index), contentImageFolderFromSKU( $product_sku ), "image", "", true);
		}
		else
		{
			$this->imageVersionsRemove( $this->multipleImageUploadName( $image_index ), contentImageFolderFromSKU( $product_sku ), "image");
		}
		
	}
	
	/**
	 * uploads product image folder
	 * Changed on 24-03-2015 to suppport both single image file upload and zip file upload
	 */
	function uploadFolder( $uploadFile, $filetype, $folder, $product_sku="", $filename="", $product_id=0 )
	{
		/**
		 * load file helpers
		 */
		$this->load->helper( "Custom_file" );
		
		
		$image = uploadFile( $uploadFile, $filetype, $folder, $filename ); //input file, type, folder
		
		if(@$image['error'])
		{
			setFlashMessage('error',$image['error']);
			$path = $image['path'];
			@unlink('./'.$path);
			
			redirect($_SERVER['HTTP_REFERER']);
		}
		$path = $image['path'];
		
		if( $filetype == "zip" )
		{
			@unlink('./'.$path); //delete zip file
			
			/**
			 *  image name cleaning
			 */
			$this->imageNameCleaning("", "assets/".$folder."/".$product_sku, "dir");
			
			/**
			 * create image versions
			 */
			//$this->imageVersions("", "assets/".$folder."/".$product_sku, "dir", $product_sku);
			
			/**
			 * saveFolderStructure
			 */
			$this->saveFolderStructure( $product_id );
			
			return substr($path,0,strrpos($path,".")) ;
		}
		else
		{
			/**
			 *  image name cleaning
			 */
			$this->imageNameCleaning($path, "assets/".$folder, "image");
			
			/**
			 * create image versions
			 */
			//$this->imageVersions($path, "assets/".$folder, "image");
			
			/**
			 * saveFolderStructure
			 */
			$this->saveFolderStructure( $product_id );
			
			return $path;
		}
	}
	
	/**
	 * saves image(product sku) folder structure entry in DB
	 */
	function saveFolderStructure( $product_id )
	{
		if( empty( $product_id ) )
		{
			return FALSE;
		}
		
		$product_sku = getField("c_sku", "content", "content_id", $product_id);
		$fsArr = dirToArray( BASE_DIR . "assets/content/images/".$product_sku  );
		//pr( $fsArr );
		$piData["ci_folder_structure"] = serialize( $fsArr );
		if( checkIfRowExist( "SELECT 1 FROM content_images WHERE content_id=".$product_id." " ) )
		{
			$this->db->set("ci_modified_date", "NOW()", FALSE);
			$this->db->where("content_id", $product_id);
			$this->db->update("content_images", $piData);
		}
		else
		{
			$piData["content_id"] = $product_id;
			$this->db->insert("content_images", $piData);
		}
	}
	
	
	/**
	 * function will replace white space characters in image name with -, and so on cleaning.
	 */
	function imageNameCleaning( $srcFile, $srcFolder, $type )
	{
		if( $type == "image" )
		{
			/**
			 * replace white spaces to dashes "-" only in directories
			 */
			$fileName = hefile_fileName( $srcFile );
			
			if( strpos($fileName, " ") !== FALSE )
			{
				hefile_rename($srcFile, $srcFolder."/". str_replace(" ", "-", $fileName));
			}
		}
		else if( $type == "dir" )	//folder
		{
			$dir = $srcFolder;
			if( hefile_isDir($dir) )
			{
				if ($dh = opendir($dir))
				{
					$imagePath = null;
					while (($file = readdir($dh)) !== false)
					{
						if ( !hefile_isDir($dir.'/'.$file) && substr($file,-3)!=".db" )
						{
							$srcFile = $dir.'/'.$file;
							
							/**
							 * replace white spaces to dashes "-" only in directories
							 */
							$fileName = hefile_fileName( $srcFile );
							
							if( strpos($fileName, " ") !== FALSE )
							{
								$fileName = str_replace(" ", "-", $fileName);
								hefile_rename($srcFile, str_replace( hefile_fileName( $srcFile ), $fileName, $srcFile) );
							}
						}
					}
				}
			}
		}
	}
	
	
	/**
	 * function will create thumbnail __T and medium __M version of images
	 */
	function imageVersions( $srcFile, $srcFolder, $type, $product_sku="" )
	{
		if( $type == "image" )
		{
			$fileName = hefile_fileName( $srcFile );
			
			/**
			 * __T thumbnail version
			 */
			if( !hefile_isDirExists( $srcFolder."/__T/" ) )
			{
				hefile_createDir($srcFolder."/__T/" );
			}
			resize_image($srcFile, $srcFolder."/__T/".$fileName, 100, 100, false);
			
			/**
			 * __M medium version
			 */
			if( !hefile_isDirExists( $srcFolder."/__M/" ) )
			{
				hefile_createDir($srcFolder."/__M/" );
			}
			resize_image($srcFile, $srcFolder."/__M/".$fileName, 350, 350, false);
			
			/**
			 * __L medium version
			 */
			if( !hefile_isDirExists( $srcFolder."/__L/" ) )
			{
				hefile_createDir($srcFolder."/__L/" );
			}
			resize_image($srcFile, $srcFolder."/__L/".$fileName, 800, 800, false);
		}
		else if( $type == "dir" )	//folder
		{
			//create temp dir
			hefile_copyDir($srcFolder, "assets/tmp/".$product_sku);
			
			/**
			 * __T thumbnail version
			 */
			hefile_copyDir("assets/tmp/".$product_sku, $srcFolder."/__T");
			$dir = $srcFolder."/__T";
			
			if( hefile_isDir($dir) )
			{
				if ($dh = opendir($dir))
				{
					$imagePath = null;
					while (($file = readdir($dh)) !== false)
					{
						if ( !hefile_isDir($dir.'/'.$file) && substr($file,-3)!=".db" )
						{
							$srcFile = $dir.'/'.$file;
							
							/**
							 * resize to thumbnail version
							 */
							resize_image($srcFile, $srcFile, 100, 100, false);
						}
					}
				}
			}
			
			
			/**
			 * __M medium version
			 */
			hefile_copyDir("assets/tmp/".$product_sku, $srcFolder."/__M");
			$dir = $srcFolder."/__M";
			if( hefile_isDir($dir) )
			{
				if ($dh = opendir($dir))
				{
					$imagePath = null;
					while (($file = readdir($dh)) !== false)
					{
						if ( !hefile_isDir($dir.'/'.$file) && substr($file,-3)!=".db" )
						{
							$srcFile = $dir.'/'.$file;
							
							/**
							 * resize to medium version
							 */
							resize_image($srcFile, $srcFile, 350, 350, false);
						}
					}
				}
			}
			
			/**
			 * __L medium version
			 */
			hefile_copyDir("assets/tmp/".$product_sku, $srcFolder."/__L");
			$dir = $srcFolder."/__L";
			if( hefile_isDir($dir) )
			{
				if ($dh = opendir($dir))
				{
					$imagePath = null;
					while (($file = readdir($dh)) !== false)
					{
						if ( !hefile_isDir($dir.'/'.$file) && substr($file,-3)!=".db" )
						{
							$srcFile = $dir.'/'.$file;
							
							/**
							 * resize to medium version
							 */
							resize_image($srcFile, $srcFile, 800, 800, false);
						}
					}
				}
			}
			
			//remove temp dir
			hefile_removeDirRecursive( "assets/tmp/".$product_sku );
		}
	}
	
	/**
	 * function will create thumbnail __T and medium __M version of images
	 */
	function imageVersionsRemove( $fileName, $srcFolder, $type, $product_sku="", $is_full_name=false )
	{
		if( $type == "image" )
		{
			if( empty($fileName) )
			{
				return false;
			}
			
			if( $is_full_name )
			{
				/**
				 * __T thumbnail version
				 */
				if( hefile_isFileExists( $srcFolder."/__T/".$fileName ) )
				{
					hefile_imfile_remove( $srcFolder."/__T/".$fileName );
				}
				
				/**
				 * __M medium version
				 */
				if( hefile_isFileExists( $srcFolder."/__M/".$fileName ) )
				{
					hefile_imfile_remove( $srcFolder."/__M/".$fileName );
				}
				
				/**
				 * __L medium version
				 */
				if( hefile_isFileExists( $srcFolder."/__L/".$fileName ) )
				{
					hefile_imfile_remove( $srcFolder."/__L/".$fileName );
				}
				
				/**
				 * original version
				 */
				if( hefile_isFileExists( $srcFolder."/".$fileName ) )
				{
					hefile_imfile_remove( $srcFolder."/".$fileName );
				}
			}
			else
			{
				/**
				 * __T thumbnail version
				 */
				if( $ext = hefile_isFileExistsByExtType( $srcFolder."/__T/".$fileName, $type ) )
				{
					hefile_imfile_remove( $srcFolder."/__T/".$fileName.".".$ext );
				}
				
				/**
				 * __M medium version
				 */
				if( $ext = hefile_isFileExistsByExtType( $srcFolder."/__M/".$fileName, $type ) )
				{
					hefile_imfile_remove( $srcFolder."/__M/".$fileName.".".$ext );
				}
				
				/**
				 * __L medium version
				 */
				if( $ext = hefile_isFileExistsByExtType( $srcFolder."/__L/".$fileName, $type ) )
				{
					hefile_imfile_remove( $srcFolder."/__L/".$fileName.".".$ext );
				}
				
				/**
				 * original version
				 */
				if( $ext = hefile_isFileExistsByExtType( $srcFolder."/".$fileName, $type ) )
				{
					hefile_imfile_remove( $srcFolder."/".$fileName.".".$ext );
				}
			}
		}
		else if( $type == "dir" )	//folder
		{}
	}
}