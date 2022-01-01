<?php
class Mdl_slider extends CI_Model
{
	var $cTableName = '';
	var $cAutoId = '';
	var $cPrimaryId = '';
	var $cCategory = '';
	
	function getData()
	{
		if($this->cPrimaryId == "")
		{
			$f = $this->input->get('f');
			$s = $this->input->get('s');
			$status_filter = $this->input->get('status_filter');
			$text_name = $this->input->get('text_name');
			
			if(isset($text_name) && $text_name != "")
			{
				$this->db->where($this->cTableName.'.slider_name LIKE \''.$text_name.'%\' ');
			}
			if(isset($status_filter) && $status_filter != "")
			{
				$this->db->where($this->cTableName.'.slider_status LIKE \''.$status_filter.'\' ');
			}
			if($f !='' && $s != '' )
				$this->db->order_by($f,$s);				
			else
				$this->db->order_by($this->cAutoId,'ASC');
		}
		else if($this->cPrimaryId != '')
			$this->db->where( $this->cTableName.".".$this->cAutoId, $this->cPrimaryId);
			
			
		$res = $this->db->get($this->cTableName);
		//echo $this->db->last_query();
		return $res;
		
	}
	
	function saveData()
	{
		$data = $this->input->post();
		unset($data['item_id']);
		
		if( $this->input->post('slider_image') && $_FILES['slider_image']['name'])
			$data['slider_image'] = uploadFolder( 'slider_image', 'image', 'content_category' );
					
		
		$slider_name = @$data['slider_name'];
		
		//if primary id set then we have to make update query
		if($this->cPrimaryId != '')
		{
			$this->db->set('slider_modified_date', 'NOW()', FALSE);
			$this->db->where($this->cAutoId,$this->cPrimaryId)->update($this->cTableName,$data);
			$last_id = $this->cPrimaryId;
			$logType = 'E';
		}
		else // insert new row
		{
			$this->db->insert($this->cTableName,$data);
			$last_id = $this->db->insert_id();
			$logType = 'A';
		}
		
		saveAdminLog($this->router->class, $slider_name, $this->cTableName, $this->cAutoId, $last_id, $logType); 
		setFlashMessage('success','Slider has been '.(($this->cPrimaryId != '') ? 'updated': 'inserted').' successfully.');
		
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
			foreach($ids as $img)
			{	//image path delete on folder
				
			}
			foreach($ids as $id)
			{
				$tabNameArr = array(0=>'module_manager');
				$fieldNameArr = array(0=>array('0'=>'module_manager_table_name','1'=>'module_manager_primary_id'));
				$valArr = array(0=>array('0'=>'slider','1'=>$id));
				$res=isFieldIdExistMul($tabNameArr,$fieldNameArr,$valArr);
				
				if(sizeof($res)>0)
				{
					echo json_encode($res);	
					return;
				}
				else
				{
					$getImg = getField('slider_image', $this->cTableName, $this->cAutoId, $id);
					$getName = getField('slider_name', $this->cTableName, $this->cAutoId, $id);
					saveAdminLog($this->router->class, @$getName, $this->cTableName, $this->cAutoId, $id, 'D');
					
					//ccTLD					
					$this->db->where_in( $this->cAutoId, $id)->delete( $this->cTableName."_cctld" );

					$this->db->where_in($this->cAutoId,$id)->delete($this->cTableName);

					//Delete Images
					@unlinkFile($getImg);
					
					$returnArr['type'] ='success';
					$returnArr['msg'] = count($ids)." records has been deleted successfully.";
				}
			}			
			
		}
		else{
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
		
		$data['slider_status'] = $status;
		$this->db->where($this->cAutoId,$cat_id);
		$this->db->update($this->cTable,$data);
	}
}