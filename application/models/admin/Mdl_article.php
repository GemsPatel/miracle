<?php
class Mdl_article extends CI_Model
{
	var $cTableName = '';
	var $cAutoId = '';
	var $cPrimaryId = '';
	var $article = '';
	
	function getData()
	{
		if($this->cPrimaryId == "")
		{			
			$f = $this->input->get('f');
			$s = $this->input->get('s');
			$cat_filter = $this->input->get('cat_filter');
			$status_filter = $this->input->get('status_filter');
			$article_name_filter = $this->input->get('article_name_filter');
			$article_key_filter = $this->input->get('article_key_filter');
			
			if(isset($article_name_filter) && $article_name_filter != "")
				$this->db->where($this->cTableName.'.article_name LIKE \''.$article_name_filter.'%\' ');

			if(isset($article_key_filter) && $article_key_filter != "")
				$this->db->where($this->cTableName.'.article_key LIKE \''.$article_key_filter.'%\' ');

			if(isset($cat_filter) && $cat_filter != "")
				$this->db->where($this->cTableName.'.article_category_id',$cat_filter);

			if(isset($status_filter) && $status_filter != "")
				$this->db->where($this->cTableName.'.article_status='.$status_filter.' ');

			if($f !='' && $s != '')
				$this->db->order_by($f,$s);
			else
				$this->db->order_by($this->cAutoId,'ASC');
		}
		else if($this->cPrimaryId != '')
			$this->db->where( $this->cTableName.".".$this->cAutoId, $this->cPrimaryId);
			
		$res = $this->db->get($this->cTableName);
		return $res;
	}
	
	function saveData()
	{
		// post data for insert and edit
		$data = $this->input->post();
		
		// unset item id 
		unset($data['item_id']);
		$data['article_alias'] = strtolower( url_title( $data['article_name'] ) );
		
		$getImg="";
		if( $this->cPrimaryId != '' )
			$getImg = exeQuery( " SELECT article_image FROM ".$this->cTableName." WHERE ".$this->cAutoId."=".$this->cPrimaryId." ", true, 'article_image' ); 

		if( $this->input->post('article_image') && $_FILES['article_image']['name'])
		    $data['article_image'] = uploadFolder( 'article_image', 'image', 'article' );		
		
		if($this->cPrimaryId != '')
		{
			$this->db->set('article_modified_date', 'NOW()', FALSE);
			$this->db->where($this->cAutoId,$this->cPrimaryId)->update($this->cTableName,$data);
			$last_id = $this->cPrimaryId;
			$logType = 'E';
		}
		else // insert new row
		{
			$data['article_key'] = strtoupper($data['article_key']);
			$this->db->insert( $this->cTableName, $data );
			$last_id = $this->db->insert_id();
			$logType = 'A';	
		}
		
		saveAdminLog($this->router->class, @$data['article_name'], $this->cTableName, $this->cAutoId, $last_id, $logType); 
		setFlashMessage('success','Article has been '.(($this->cPrimaryId != '') ? 'updated': 'inserted').' successfully.');
	}
	
/*
+----------------------------------------------------------+
	Deleting article. hadle both request get and post.
	with single delete and multiple delete.
	@prams : $ids -> integer or array
+----------------------------------------------------------+
*/	
	function deleteData($ids)
	{
		if($ids)
		{			
		    $id = $ids;
			$tabNameArr = array(0=>'module_manager');
			$fieldNameArr = array(0=>array('0'=>'module_manager_table_name','1'=>'module_manager_primary_id'));
			$valArr = array(0=>array('0'=>'article','1'=>$id));
			$res=isFieldIdExistMul($tabNameArr,$fieldNameArr,$valArr);
			
			if(sizeof($res)>0)
			{
				echo json_encode($res);	
				return;
			}
			else
			{	
				$getImg = getField('article_image', $this->cTableName, $this->cAutoId, $id);
				 @unlinkFile($getImg);
				
				$getName = getField('article_name', $this->cTableName, $this->cAutoId, $id);
				saveAdminLog($this->router->class, @$getName, $this->cTableName, $this->cAutoId, $id, 'D');

				//
				$this->db->where_in($this->cAutoId,$id)->delete($this->cTableName);
				
				$returnArr['type'] ='success';
				$returnArr['msg'] = count($ids)." records has been deleted successfully.";
			}
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
		
		$data['article_status'] = $status;
		$this->db->where($this->cAutoId,$cat_id);
		$this->db->update($this->cTable,$data);
	}
}