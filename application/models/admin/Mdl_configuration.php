<?php
class Mdl_configuration extends CI_Model
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
			
			if($f !='' && $s != '' && check_db_column($this->cTableName,$f))
				$this->db->order_by($f,$s);
			else
				$this->db->order_by($this->cAutoId,'ASC');
		}
		else if($this->cPrimaryId != '')
		{
			$this->db->where( $this->cTableName.".".$this->cAutoId, $this->cPrimaryId);
		}
					
		$res = $this->db->get($this->cTableName);
		return $res;
	}
	
	function saveData()
	{	
		$data = $this->input->post();
		unset($data['item_id']);
		
		$data['admin_user_id'] = $this->session->userdata( 'admin_id' );

		$this->db->set('modified_date', 'NOW()', FALSE);

		//if primary id set then we have to make update query
		$log_name = ( isset( $data["config_key"] ) ? $data["config_key"] : "config_id: ". $this->cPrimaryId );
		if($this->cPrimaryId != '')
		{
			$this->db->where($this->cAutoId,$this->cPrimaryId)->update($this->cTableName,$data);
			$last_id = $this->cPrimaryId;
			$logType = 'E';
		}
		else // insert new row
		{
			$data['config_key'] = strtoupper($data['config_key']);
			$this->db->insert($this->cTableName,$data);
			$last_id = $this->db->insert_id();
			$logType = 'A';
		}
		
		setFlashMessage('success','Configuration has been '.(($this->cPrimaryId != '') ? 'updated': 'inserted').' successfully.');		
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
	        
	        //customer table
	        $getName = getField('c_firstname', $this->cTableName, $this->cAutoId, $id);
	        $this->db->where_in($this->cAutoId,$id )->delete($this->cTableName);
	        
	        $returnArr['type'] ='success';
	        $returnArr['msg'] = count($ids)." records has been deleted successfully.";
	    }
	    else
	    {
	        $returnArr['type'] ='error';
	        $returnArr['msg'] = "Please select at least 1 item.";
	    }
	    
	    echo json_encode($returnArr);
	}
}