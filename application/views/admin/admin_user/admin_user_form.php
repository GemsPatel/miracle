<div class="main-page">
	<div class="forms">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4><?php echo ucfirst( @$admin_user_emailid );?> Information: </h4>
			</div>
			<div class="form-body">
                <div class="col-md-12">
                    <form id="form" enctype="multipart/form-data" method="post" action="<?php echo asset_url( 'admin/'.$this->controller.'/adminUserForm')?>">
						<input type="hidden" name="item_id" value="<?php echo (@$this->cPrimaryId != '') ? _en(@$this->cPrimaryId) : ''; ?>"  />
						
						<div class="col-md-12">
							<div class="form-group col-md-6">
								<label class="control-label" for="admin_user_firstname"><span class="required">*</span> First Name:</label> 
								<input type="text" class="form-control border-input" name="admin_user_firstname" value="<?php echo (@$admin_user_firstname)?$admin_user_firstname:@$_POST['admin_user_firstname'];?>" placeholder="Enter First Name Here"/>
								<span class="error_msg"><?php echo (@$error)?form_error('admin_user_firstname'):''; ?> </span>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label" for="admin_user_lastname"><span class="required">*</span> Last Name:</label> 
								<input type="text" class="form-control border-input" name="admin_user_lastname" value="<?php echo (@$admin_user_lastname)?$admin_user_lastname:@$_POST['admin_user_lastname'];?>" placeholder="Enter Last Name Here"/>
								<span class="error_msg"><?php echo (@$error)?form_error('admin_user_lastname'):''; ?> </span>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group col-md-6">
								<label class="control-label" for="admin_user_firstname"><span class="required">*</span> Group:</label> 
								<?php   
							    $sql = "SELECT admin_user_group_id, admin_user_group_name FROM admin_user_group";
							    $userArr = getDropDownAry($sql,"admin_user_group_id", "admin_user_group_name", array('' => "-- Select Users Group --"), false);
							    $setval =(@$admin_user_group_id)? $admin_user_group_id:@$_POST['admin_user_group_id'];
								echo form_dropdown('admin_user_group_id', $userArr, $setval, 'class="form-control"');
                                ?>
								<span class="error_msg"><?php echo (@$error)?form_error('admin_user_firstname'):''; ?> </span>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label" for="admin_user_phone_no"><span class="required">*</span> Phone No:</label> 
								<input type="text" class="form-control border-input" name="admin_user_phone_no" value="<?php echo (@$admin_user_phone_no)?$admin_user_phone_no:@$_POST['admin_user_phone_no'];?>" placeholder="Enter Contact Number Here"/>
								<span class="error_msg"><?php echo (@$error)?form_error('admin_user_phone_no'):''; ?> </span>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group col-md-6">
								<label class="control-label" for="admin_user_password"><span class="required">*</span> Password:</label> 
								<input type="text" class="form-control border-input" name="admin_user_password" value="<?php echo ( @$_POST['admin_user_password'] ) ? $_POST['admin_user_password'] : '' ;?>" placeholder="Enter Password Here"/>
								<span class="error_msg"><?php echo (@$error)?form_error('admin_user_password'):''; ?> </span>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label" for="admin_user_password_confirm"><span class="required">*</span> Confirm Password:</label> 
								<input type="text" class="form-control border-input" name="admin_user_password_confirm" value="<?php echo ( @$_POST['admin_user_password_confirm'] ) ? $_POST['admin_user_password_confirm']: '';?>" placeholder="Enter Confirm Password Here"/>
								<span class="error_msg"><?php echo (@$error)?form_error('admin_user_password_confirm'):''; ?> </span>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group col-md-6">
								<label class="control-label" for="admin_user_newslatter">
									<span class="required">*</span> News Letter:
								</label> 
    							<select name="admin_user_newslatter" class="form-control">
                                    <option value="0" selected="selected">Yes</option>
                                    <option value="1" <?php echo (@$admin_user_newslatter=='1' || @$_POST['admin_user_newslatter']=='1')?'selected="selected"':'';?>>No</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label class="control-label" for="admin_user_status"><span class="required">*</span> Status:</label> 
								<select name="admin_user_status" class="form-control">
                                    <option value="0" selected="selected">Enable</option>
                                    <option value="1" <?php echo (@$admin_user_status == 1 || @$_POST['admin_user_status'] == 1)?'selected="selected"':'';?>>Disable</option>
                                </select>
							</div>
						</div>
						
						<div class="col-md-12">
    						<div class="form-group col-md-6">
    							<label class="control-label" for="admin_profile_image"><span class="required">*</span> Profile Image:</label> 
    							<div class="image" align="center">
                                 	 <?php
                					 $url = (@$admin_profile_image) ? $admin_profile_image : ((@$_POST['admin_profile_image']) ? $_POST['admin_profile_image'] : 'images/admin/no_image.jpg'); ?>
                                     <img src="<?php echo asset_url($url);?>" width="35" height="35" id="proPrevImage_00" class="image" style="margin-bottom:0px;padding:3px;" /><br />
                                     <input type="file" name="admin_profile_image" id="proImg_00" onchange="readURL(this,'00');" style="display: none;">
                                     <input type="hidden" value="<?php echo (@$admin_profile_image) ? $admin_profile_image : @$_POST['admin_profile_image'];?>" name="admin_profile_image" id="hiddenProImg" />
                                     <div align="center">
                                        <small><a onclick="$('#proImg_00').trigger('click');">Browse</a>&nbsp;|&nbsp;<a style="clear:both;" onclick="javascript:clear_image('proPrevImage_00')"; >Clear</a></small>
                                     </div>
                             	 </div>
                                <span class="error_msg"><?php echo (@$error)?form_error('admin_profile_image'):''; ?> </span>
    						</div>
						</div>
						
						<div class="col-md-12">
    						<div class="text-center mb5">
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