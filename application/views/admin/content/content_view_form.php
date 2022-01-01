<style>
.charts, .row {
    margin: 0 0 0 0 !important;
}
</style>
<div class="main-page">
	<div class="forms">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4>Product Information</h4>
			</div>
			<div class="form-body">
                <div class="col-md-12">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="p_type"><span class="required">*</span> Type:</label> 
								<select class="form-control border-input" name="p_type" id="p_type" disabled="disabled">
									<option value="1">Product</option>
									<option value="2">Service</option>
								</select>
								<span class="error_msg"><?php echo (@$error)?form_error('p_type'):''; ?> </span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label class="control-label" for="uom_id"><span class="required">*</span> UoM:</label>
								<?php 
    							$sql = "SELECT uom_id, u_name FROM uom WHERE u_status=1 ORDER BY u_name ASC";
    							$uomArr = getDropDownAry($sql,"uom_id", "u_name", array('' => "Select Uom"), false);
    							$uoms =(@$uom_id)? $uom_id: @$_POST['uom_id']; 
    							echo form_dropdown('uom_id',@$uomArr,@$uoms,'class="form-control" disabled="disabled"');
                                ?>
								<span class="error_msg"><?php echo (@$error)?form_error('uom_id'):''; ?></span>
							</div>
						</div>
						<div class="col-md-4 p_type_sh">
							<div class="form-group">
								<label class="control-label" for="p_sku"><span class="required">*</span> SKU:</label>
								<input type="text" name="p_sku" class="form-control border-input" placeholder="Enter product sku Here" value="<?php echo (@$p_sku)?$p_sku:@$_POST['p_sku']; ?>" disabled="disabled">
								<span class="error_msg"><?php echo (@$error)?form_error('p_sku'):''; ?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label" for="p_name"><span class="required">*</span> Product Name:</label>
								<input type="text" name="p_name" class="form-control border-input" placeholder="Enter product name here" value="<?php echo (@$p_name)?$p_name:@$_POST['p_name']; ?>" disabled="disabled">
								<span class="error_msg"><?php echo (@$error)?form_error('p_name'):''; ?></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label" for="p_description"><span class="required">*</span> Description:</label> 
								<textarea class="form-control border-input" type="text" name="p_description" placeholder="Enter product description here" disabled="disabled"><?php echo (@$p_description) ? $p_description : @$_POST['p_description'];?></textarea>
         						<span class="error_msg"><?php echo (@$error)?form_error('p_description'):''; ?> </span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label" for="p_shn"><span class="required">*</span> HSN:</label>
								<input type="text" name="p_shn" class="form-control border-input" placeholder="Enter product hsn here" value="<?php echo (@$p_shn)?$p_shn:@$_POST['p_shn']; ?>" disabled="disabled">
								<span class="error_msg"><?php echo (@$error)?form_error('p_shn'):''; ?></span>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 mb15 mt10">
							<h3 class="form-title">Sales Information</h3>
							
							<div class="col-md-12">
    							<div class="form-group">
    								<label class="control-label" for="p_unit_price"><span class="required">*</span> Unit Price( INR ):</label>
    								<input type="text" name="p_unit_price" class="form-control border-input" placeholder="Enter unit price here" value="<?php echo (@$p_unit_price)?$p_unit_price:@$_POST['p_unit_price']; ?>" disabled="disabled">
    								<span class="error_msg"><?php echo (@$error)?form_error('p_unit_price'):''; ?></span>
    							</div>
    						</div>
    						
    						<div class="col-md-12">
    							<div class="form-group">
    								<label class="control-label" for="tax_id"><span class="required">*</span> Tax:</label> 
    								<?php 
        							$sql = "SELECT tax_id, CONCAT( t_name, ' ', t_percentage,' %' ) as tax FROM tax WHERE t_status=1";
        							$tax_idArr = getDropDownAry($sql,"tax_id", "tax", array('0' => "+ < Add New >"), false);
        							$tax_ids =(@$tax_id)? $tax_id: @$_POST['tax_id']; 
        							echo form_dropdown('tax_id',@$tax_idArr,@$tax_ids,'class="form-control" disabled="disabled"');
                                    ?>
    								<span class="error_msg"><?php echo (@$error)?form_error('tax_id'):''; ?> </span>
    							</div>
    						</div>
    						
    						<div class="col-md-12 p_type_sh">
    							<div class="form-group">
    								<label class="control-label" for="p_qty"><span class="required">*</span> Quantity:</label>
    								<input type="text" name="p_qty" class="form-control border-input" placeholder="Enter quantity here" value="<?php echo (@$p_qty)?$p_qty:@$_POST['p_qty']; ?>" disabled="disabled">
    								<span class="error_msg"><?php echo (@$error)?form_error('p_qty'):''; ?></span>
    							</div>
    						</div>
    						
    						<div class="col-md-6 p_type_sh">
    							<div class="form-group">
    								<label class="control-label" for="p_cess_tk">CESS % :</label> 
    								<input type="text" class="form-control border-input" name="p_cess_tk" value="<?php echo (@$p_cess_tk)?$p_cess_tk:@$_POST['p_cess_tk'];?>" placeholder="Enter product cess percentage here" disabled="disabled" />
    								<span class="error_msg"><?php echo (@$error)?form_error('p_cess_tk'):''; ?> </span>
    							</div>
    						</div>
    						<div class="col-md-6 p_type_sh">
    							<div class="form-group">
    								<label class="control-label" for="p_cess_pls">CESS + :</label> 
    								<input type="text" class="form-control border-input" name="p_cess_pls" value="<?php echo (@$p_cess_pls)?$p_cess_pls:@$_POST['p_cess_pls'];?>" placeholder="Enter product cess increement here" disabled="disabled" />
    								<span class="error_msg"><?php echo (@$error)?form_error('p_cess_pls'):''; ?> </span>
    							</div>
    						</div>
						</div>
						<div class="col-md-6 mb15 mt10 p_type_sh">
							<h3 class="form-title">Purchase Information</h3>
							
							<div class="col-md-6">
    							<div class="form-group">
    								<label class="control-label" for="p_purchase_rate"><span class="required">*</span> Purchase Rate:</label>
    								<input class="form-control border-input" type="text" name="p_purchase_rate" value="<?php echo (@$p_purchase_rate) ? $p_purchase_rate : @$_POST['p_purchase_rate'];?>" placeholder="Enter purchase rate here" disabled="disabled">
             						<span class="error_msg"><?php echo (@$error)?form_error('p_purchase_rate'):''; ?> </span>
    							</div>
    						</div>
    						<div class="col-md-6">
    							<div class="form-group">
    								<label class="control-label"> </label>
    								<?php 
        							$sql = "SELECT currency_id, CONCAT( currency_name, ' (', currency_code,')' ) as currency FROM currency WHERE currency_status=0";
        							$currency_idArr = getDropDownAry($sql,"currency_id", "currency", array('' => "Please select currency"), false);
        							$currency_ids =(@$currency_id)? $currency_id: @$_POST['currency_id']; 
        							echo form_dropdown('currency_id',@$currency_idArr,@$currency_ids,'class="form-control" disabled="disabled"');
                                    ?>
    								<span class="error_msg"><?php echo (@$error)?form_error('currency_id'):''; ?></span>
        						</div>
    						</div>
						</div>
					</div>
					
					<div class="clearfix"></div>
					
					<div class="col-md-12">
						<div class="text-center">
							<?php if($this->per_edit == 0){?>
    							<button type="button" class="button button-gray mb15">
    								<a class="" href="<?php echo asset_url( 'admin/'.$this->controller.'/'.$this->controller.'Form?edit=true&item_id='._en($this->cPrimaryId))?>">
    									<i class="fas fa-pen col" aria-hidden="true"></i> Edit
    								</a>
								</button>
							<?php }?>
							<button type="reset" class="button button-gray">
    							<a class="a_button" href="<?php echo site_url( 'admin/'.$this->controller);?>">
    								<i class="fa fa-times error_msg" aria-hidden="true"></i> Cancel
    							</a>
							</button>
						</div>
					</div>
					<div class="clearfix"></div>
                </div>
    		</div>
        </div>
    </div>
</div>
