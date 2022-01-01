<div class="main-page">
	<div class="forms">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4>Error Information</h4>
			</div>
			<div class="form-body">
                <div class="col-md-12">
                    <form id="form" enctype="multipart/form-data" method="post" action="<?php echo asset_url( 'admin/'.$this->controller.'/'.$this->controller.'Form')?>">
						<input type="hidden" name="item_id" value="<?php echo (@$this->cPrimaryId != '') ? _en(@$this->cPrimaryId) : ''; ?>"  />
						<div class="col-md-12">
							<div class="col-md-3"></div>
							<div class="form-group col-md-6">
								<label class="control-label" for="error_code"><span class="required">*</span> Error Code:</label> 
								<input type="text" class="form-control border-input" name="error_code" value="<?php echo (@$error_code)?$error_code:@$_POST['error_code'];?>" placeholder="Enter error code"/>
								<span class="error_msg"><?php echo (@$error)?form_error('error_code'):''; ?> </span>
								<small class="small_text">For developer reference, do not edit if not required.</small>
							</div>
							<div class="col-md-3"></div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3"></div>
							<div class="form-group col-md-6">
								<label class="control-label" for="error_message"><span class="required">*</span> Message:</label> 
								<textarea class="textarea form-control border-input" name="error_message" rows="2" cols="72"><?php echo (@$error_message) ? $error_message : set_value('error_message');?></textarea>
                     			<span class="error_msg"><?php echo (@$error)?form_error('error_message'):''; ?> </span>
							</div>
							<div class="col-md-3"></div>
						</div>
						<div class="clearfix"></div>
						
						<div class="col-md-12">
    						<div class="text-center">
    							<?php if( $this->per_add == 0 || $this->per_edit == 0 ){?>
        							<button type="submit" onclick="$('#form').submit();" class="button button-gray mb15">
        								<i class="fa fa-check" aria-hidden="true"></i> Save
    								</button>
								<?php }?>
								<button type="button" class="button button-gray">
        							<a class="a_button" href="<?php echo site_url( 'admin/'.$this->controller);?>">
        								<i class="fa fa-times error_msg" aria-hidden="true"></i> Cancel
    								</a>
								</button>
    						</div>
						</div>
    					<div class="clearfix"></div>
    				</form>
                </div>
    		</div>
        </div>
    </div>
</div>