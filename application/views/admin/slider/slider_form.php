<div class="main-page">
	<div class="forms" id="content_show">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms">
			<div class="form-title">
				<h4>Slider Details :</h4>
			</div>
			<form id="form" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/'.$this->controller.'/'.$this->controller.'Form')?>">
				<input type="hidden" name="item_id" value="<?php echo (@$this->cPrimaryId != '') ? _en(@$this->cPrimaryId) : ''; ?>"  />
    			<div class="form-body">
    				<div class="col-md-12">
    					<div class="col-md-3"></div>
    					<div class="col-md-6">
    						<div class="form-group">
    							<label>Slider Name:</label> 
    							<input type="text" class="form-control" name="slider_name" value="<?php echo (@$slider_name)?$slider_name:set_value('slider_name');?>">
								<span class="error_msg"><?php echo (@$error)?form_error('slider_name'):''; ?></span>
    						</div>
    						<div class="form-group  back_col space text-center">
    							<div style="text-align: left;">Image:</div> 
                            	<div class="image">
									<?php $url = (@$slider_image) ? $slider_image : ((@$_POST['slider_image']) ? $_POST['slider_image'] : 'images/admin/no_image.jpg');?>
									<img src="<?php echo asset_url($url);?>" width="100" height="100" id="giftPrevImage_00"  class="image" style="margin-bottom:0px;padding:3px;" /><br />
									<input type="file" name="slider_image" id="sliderImg_00" onchange="readURL(this,'00');" style="display: none;">
			                 		<input type="hidden" value="<?php echo (@$slider_image) ? $slider_image : @$_POST['slider_image'];?>" name="slider_image" id="hiddensliderImg" />
			                 		<div align="center">
			                  			<a onclick="$('#sliderImg_00').trigger('click');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a style="clear:both;" onclick="javascript:clear_image('giftPrevImage_00')"; >Clear</a>
			                 		</div>
			             		</div><br>
			             		<span class="small_text">
			             			(Upload size: 1440 X 750 )
		                 		</span>
			                    <span class="error_msg"><?php echo (@$error)?form_error('slider_image'):''; ?> </span>
    						</div>
    						<div class="form-group hide">
    							<label>Link:</label> 
								<input type="text" class="form-control" name="slider_url" value="<?php echo (@$slider_url)?$slider_url:@$_POST['slider_url'];?>" />
                                <span class="error_msg"><?php echo (@$error)?form_error('slider_url'):''; ?> </span>
    						</div>
    						
    						<div class="form-group hide">
    							<label>Size:</label> 
								<input type="text" class="form-control" name="image_size_id" value="0" />
                                <span class="error_msg"><?php echo (@$error)?form_error('image_size_id'):''; ?> </span>
    						</div>
    						
    						<div class="form-group space">
    							<label class="control-label" for="slider_sort_order"><span class="required">*</span> Sort Order:</label>
								<input type="text" class="form-control" name="slider_sort_order" value="<?php echo (@$slider_sort_order)?$slider_sort_order:@$_POST['slider_sort_order'];?>" />
    						</div>
    						
    						<div class="form-group space hide">
    							<label class="control-label" for="slider_display"><span class="required">*</span> Is Display:</label>
								<select name="slider_display" class="form-control" id="slider_display">
									<option value="1" selected="selected">Enable</option>
									<option value="0" <?php echo (@$slider_display== 0 || @$_POST['slider_display'] == 0 )?'selected="selected"':'';?>>Disable</option>
								</select>
    						</div>
    						
    						<div class="form-group space">
    							<label class="control-label" for="country_status"><span class="required">*</span> Status:</label>
								<select name="slider_status" class="form-control" id="slider_status">
									<option value="1" selected="selected">Enable</option>
									<option value="0" <?php echo (@slider_status== 0 || @$_POST['slider_status'] == 0 )?'selected="selected"':'';?>>Disable</option>
								</select>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-12 i_color text-center mb10">
    				<div class="text-center">
    					<?php if( $this->per_add == 0 || $this->per_edit == 0 ){?>
    						<button type="submit" onclick="$('#form').submit();" class="button button-gray mb15">
    							<i class="fa fa-check" aria-hidden="true"></i>Save
    						</button>
						<?php }?>
						<button type="button" class="button button-gray">
    						<a class="a_button" href="<?php echo site_url( 'admin/'.$this->controller);?>">
    							<i class="fa fa-times error_msg" aria-hidden="true"></i>Cancel
    						</a>
						</button>
					</div>
    			</div>
			</form>
		</div>
	</div>
</div>