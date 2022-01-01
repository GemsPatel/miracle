<?php
class Mdl_preferences extends CI_Model
{
	var $cTableName = '';
	var $cAutoId = '';
	var $cPrimaryId = '';
	
	function getData()
	{
		$this->db->where($this->cAutoId,$this->cPrimaryId);
		$res = $this->db->get($this->cTableName);
		return $res->row_array();
	}
	
	function saveData()
	{
		$data = $this->input->post();
		
		$prefArr['admin_id'] = (int)$this->session->userdata('admin_id');
		$prefArr['g_p_1'] = ( @$data['g_p_1'] ) ? 1 : 0;
		$prefArr['g_p_2'] = ( @$data['g_p_2'] ) ? 1 : 0;
		$prefArr['g_p_3'] = ( @$data['g_p_3'] ) ? 1 : 0;
		$prefArr['g_p_4'] = ( @$data['g_p_4'] ) ? 1 : 0;
		$prefArr['g_p_5'] = ( @$data['g_p_5'] ) ? 1 : 0;
		$prefArr['g_p_6'] = ( @$data['g_p_6'] ) ? 1 : 0;
		$prefArr['g_p_7'] = ( @$data['g_p_7'] ) ? 1 : 0;
		$prefArr['g_p_8'] = ( @$data['g_p_8'] ) ? 1 : 0;
		$prefArr['g_p_9'] = ( @$data['g_p_9'] ) ? 1 : 0;
		$prefArr['g_p_10'] = ( @$data['g_p_10'] ) ? 1 : 0;
		$prefArr['date_format_preferred'] = @$data['date_format_preferred'];
		$prefArr['g_p_11'] = ( @$data['g_p_11'] ) ? 1 : 0;
		$prefArr['num_dec_place'] = @$data['num_dec_place'];
		$prefArr['g_p_12'] = ( @$data['g_p_12'] ) ? 1 : 0;
		$prefArr['g_p_13'] = ( @$data['g_p_13'] ) ? 1 : 0;
		$prefArr['g_p_14'] = ( @$data['g_p_14'] ) ? 1 : 0;
		$prefArr['g_p_15'] = ( @$data['g_p_15'] ) ? 1 : 0;
		$prefArr['d_p_1'] = ( @$data['d_p_1'] ) ? 1 : 0;
		$prefArr['d_p_2'] = ( @$data['d_p_2'] ) ? 1 : 0;
		$prefArr['d_p_3'] = ( @$data['d_p_3'] ) ? 1 : 0;
		$prefArr['d_p_4'] = ( @$data['d_p_4'] ) ? 1 : 0;
		$prefArr['d_p_5'] = ( @$data['d_p_5'] ) ? 1 : 0;
		$prefArr['d_p_6'] = ( @$data['d_p_6'] ) ? 1 : 0;
		$prefArr['d_p_7'] = ( @$data['d_p_7'] ) ? 1 : 0;
		$prefArr['d_p_19'] = ( @$data['d_p_19'] ) ? 1 : 0;
		$prefArr['d_p_8'] = ( @$data['d_p_8'] ) ? 1 : 0;
		$prefArr['d_p_9'] = ( @$data['d_p_9'] ) ? 1 : 0;
		$prefArr['d_p_10'] = ( @$data['d_p_10'] ) ? 1 : 0;
		$prefArr['d_p_11'] = ( @$data['d_p_11'] ) ? 1 : 0;
		$prefArr['d_p_12'] = ( @$data['d_p_12'] ) ? 1 : 0;
		$prefArr['d_p_13'] = ( @$data['d_p_13'] ) ? 1 : 0;
		$prefArr['d_p_14'] = ( @$data['d_p_14'] ) ? 1 : 0;
		$prefArr['d_p_15'] = ( @$data['d_p_15'] ) ? 1 : 0;
		$prefArr['d_p_16'] = ( @$data['d_p_16'] ) ? 1 : 0;
        $prefArr['d_p_17'] = ( @$data['d_p_17'] ) ? 1 : 0;
        $prefArr['invoice_title'] = @$data['invoice_title'];
        $prefArr['tax_invoice_title'] = @$data['tax_invoice_title'];
        $prefArr['proforma_title'] = @$data['proforma_title'];
        $prefArr['challan_title'] = @$data['challan_title'];
        $prefArr['quotation_title'] = @$data['quotation_title'];
        $prefArr['product_service'] = @$data['product_service'];
        $prefArr['uom'] = @$data['uom'];
        $prefArr['quantity'] = @$data['quantity'];
        $prefArr['uom_lbl'] = ( @$data['uom_lbl'] ) ? 1 : 0;
        $prefArr['quantity_lbl'] = ( @$data['quantity_lbl'] ) ? 1 : 0;
        $prefArr['tax'] = @$data['tax'];
        $prefArr['unit_price'] = @$data['unit_price'];
        $prefArr['shipping_packaging'] = @$data['shipping_packaging'];
        $prefArr['unit_price_lbl'] = ( @$data['unit_price_lbl'] ) ? 1 : 0;
        $prefArr['p_o_number'] = @$data['p_o_number'];
        $prefArr['note'] = @$data['note'];
        $prefArr['origional_copy'] = @$data['origional_copy'];
        $prefArr['duplicate'] = @$data['duplicate'];
        $prefArr['quadruplicate'] = @$data['quadruplicate'];
        $prefArr['amount'] = @$data['amount'];
        $prefArr['unit_price_2'] = @$data['unit_price_2'];
        $prefArr['amount_lbl'] = ( @$data['amount_lbl'] ) ? 1 : 0;
        $prefArr['unit_price_2_lbl'] = ( @$data['unit_price_2_lbl'] ) ? 1 : 0;
        $prefArr['tax_2'] = @$data['tax_2'];
        $prefArr['tax_lbl'] = ( @$data['tax_lbl'] ) ? 1 : 0;
        
        $recordExist = getField( "preference_id" , "preferences", "admin_id", $prefArr['admin_id'] );

		//if primary id set then we have to make update query
        if( !empty( $recordExist ) )
		{
			$this->db->set( 'p_modified_date', 'NOW()', FALSE );
			$this->db->where( "preference_id", $recordExist )->update( $this->cTableName, $prefArr );
			$last_id = $recordExist;
			$logType = 'E';
			
		}
		else // insert new row
		{
		    $this->db->insert( $this->cTableName, $prefArr );
			$last_id = $this->db->insert_id();
			$logType = 'A';
		}
		
		setFlashMessage('success','Customer has been '.( ( $recordExist ) ? 'updated': 'inserted').' successfully.');
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
			$tabNameArr = array('0'=>'orders','1'=>'customer_account_manage','2'=>'private_message');
			$fieldNameArr = array('0'=>'customer_id','1'=>'customer_id','2'=>'customer_id');
			$res=isImageIdExist($tabNameArr,$fieldNameArr,$id);
			
			if(sizeof($res)>0)
			{
				echo json_encode($res);	
				return;
			}
			else
			{
				$getName = getField('customer_firstname', $this->cTableName, $this->cAutoId, $id);
				saveAdminLog($this->router->class, @$getName, $this->cTableName, $this->cAutoId, $id, 'D');
				
				$this->db->where_in($this->cAutoId,$id)->delete($this->cTableNameA);
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
		
		$data['customer_status'] = $status;
		$this->db->where($this->cAutoId,$cat_id);
		$this->db->update($this->cTable,$data);
	}
}