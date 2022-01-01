<?php
class Mdl_error_code extends CI_Model
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
			$text_filter = $this->input->get('error_message');
			$code_filter = $this->input->get('error_code');
			
			if(isset($text_filter) && $text_filter != "")
			    $this->db->where('error_message LIKE \'%'.$text_filter.'%\' ');
			    
		    if(isset($code_filter) && $code_filter != "")
		        $this->db->where('error_code LIKE \'%'.$code_filter.'%\' ');
			
			if($f !='' && $s != '' && check_db_column($this->cTableName,$f))
				$this->db->order_by($f,$s);
			else
				$this->db->order_by($this->cAutoId,'ASC');
				
		}
		else if($this->cPrimaryId != '')
			$this->db->where($this->cAutoId,$this->cPrimaryId);
					
		$res = $this->db->get($this->cTableName);
		return $res;
	}
	
	function saveData()
	{
		$data = $this->input->post();
		unset($data['item_id']);
		
		$this->db->set('modified_date', 'NOW()', FALSE);
		
		//if primary id set then we have to make update query
		if($this->cPrimaryId != '')
		{
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
		saveAdminLog($this->router->class, @$data['error_message'], $this->cTableName, $this->cAutoId, $last_id, $logType); 
		setFlashMessage('success','Error code has been '.(($this->cPrimaryId != '') ? 'updated': 'inserted').' successfully.');		
	}
}