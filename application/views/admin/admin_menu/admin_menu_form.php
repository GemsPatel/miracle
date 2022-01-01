<div class="main-page">
	<div class="forms">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4>City Information</h4>
			</div>
			<div class="form-body">
                <div class="col-md-12">
                    <form id="form" enctype="multipart/form-data" method="post" action="<?php echo asset_url( 'admin/'.$this->controller.'/'.$this->controller.'Form')?>">
						<input type="hidden" name="item_id" value="<?php echo (@$this->cPrimaryId != '') ? _en(@$this->cPrimaryId) : ''; ?>"  />
						<div class="col-md-12">
							<div class="col-md-3"></div>
							<div class="form-group col-md-6">
								<label class="control-label" for="am_name"><span class="required">*</span> Menu Name:</label> 
								<input type="text" class="form-control border-input" name="am_name" value="<?php echo (@$am_name)?$am_name:@$_POST['am_name'];?>" placeholder="Enter Menu Name Here"/>
								<span class="error_msg"><?php echo (@$error)?form_error('am_name'):''; ?> </span>
							</div>
							<div class="col-md-3"></div>
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3"></div>
							<div class="form-group col-md-6">
								<label class="control-label" for="am_title"><span class="required">*</span> Hover Title:</label> 
								<input type="text" class="form-control border-input" name="am_title" value="<?php echo (@$am_title)?$am_title:@$_POST['am_title'];?>" placeholder="Enter menu mouse hover title here"/>
								<span class="error_msg"><?php echo (@$error)?form_error('am_title'):''; ?> </span>
							</div>
							<div class="col-md-3"></div>
						</div>

						<div class="col-md-12">
							<div class="col-md-3"></div>
							<div class="form-group col-md-6">
								<label class="control-label" for="am_class_name"> Class Name:</label> 
								<input type="text" class="form-control border-input" name="am_class_name" value="<?php echo (@$am_class_name)?$am_class_name:@$_POST['am_class_name'];?>" <?php echo (@$this->cPrimaryId) ? 'readonly="readonly"': ''; ?>/>
				                <small class="small_text">For developer reference, do not edit if not required.</small>
								<span class="error_msg"><?php echo (@$error)?form_error('am_class_name'):''; ?> </span>
							</div>
							<div class="col-md-3"></div>
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3"></div>
							<div class="form-group col-md-6">
								<label class="control-label" for="am_class_name">Parent Name:</label> 
								<?php 
                				$setval =(@$am_parent_id)? $am_parent_id:@$_POST['am_parent_id'];
                				echo form_dropdown('am_parent_id',getMultiLevelAdminMenuDropdown(),@$setval,'class="form-control"');
                				?>
							</div>
							<div class="col-md-3"></div>
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3"></div>
							<div class="form-group col-md-6">
								<label class="control-label" for="am_icon"><span class="required">*</span> Icon:</label> 
								<input type="text" class="form-control border-input" name="am_icon" value="<?php echo (@$am_icon)?$am_icon:@$_POST['am_icon'];?>"/>
								<span class="error_msg"><?php echo (@$error)?form_error('am_icon'):''; ?> </span>
							</div>
							<div class="col-md-3"></div>
						</div>
            
              			<div class="col-md-12">
							<div class="col-md-3"></div>
							<div class="form-group col-md-6">
								<label class="control-label" for="am_sort_order">Sort Order:</label> 
								<input type="text" class="form-control border-input" name="am_sort_order" value="<?php echo (@$am_sort_order)?$am_sort_order:@$_POST['am_sort_order'];?>"/>
								<span class="error_msg"><?php echo (@$error)?form_error('am_sort_order'):''; ?> </span>
							</div>
							<div class="col-md-3"></div>
						</div>
              
              			<div class="col-md-12">
							<div class="col-md-3"></div>
							<div class="form-group col-md-6">
								<label class="control-label" for="am_status">Status:</label>
								<select name="am_status" class="form-control" id="am_status">
									<option value="0" selected="selected">Enable</option>
									<option value="1" <?php echo (@$am_status == 1 || @$_POST['am_status'] == 1 )?'selected="selected"':'';?>>Disable</option>
								</select>
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
