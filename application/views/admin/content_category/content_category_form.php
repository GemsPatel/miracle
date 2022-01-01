<script type="text/javascript" src="<?php echo asset_url('js/admin/ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
       	CKEDITOR.replace( 'cc_description',
        {
            filebrowserBrowseUrl : 'kcfinder/browse.php',
            filebrowserImageBrowseUrl : 'kcfinder/browse.php?type=Images',
            filebrowserUploadUrl : 'kcfinder/upload.php',
            filebrowserImageUploadUrl : 'kcfinder/upload.php?type=Images'
        });
    		
    });
</script>
<div class="main-page">
	<div class="forms" id="content">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms">
			<div class="form-title">
				<h4>Category Details :</h4>
			</div>
			<form id="form" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/'.$this->controller.'/'.$this->controller.'Form')?>">
				<input type="hidden" name="item_id" value="<?php echo (@$this->cPrimaryId != '') ? _en(@$this->cPrimaryId) : ''; ?>"  />
    			<div class="form-body">
    				<div class="col-md-12">
    					<div class="col-md-3"></div>
    					<div class="col-md-6">
    						<div class="form-group">
    							<label><span class="required">*</span> Category Name:</label> 
    							<input type="text" class="form-control" name="cc_name" value="<?php echo (@$cc_name)?$cc_name:set_value('cc_name');?>" onkeyup="getUrlName(this.value)">
								<span class="error_msg"><?php echo (@$error)?form_error('cc_name'):''; ?></span>
    						</div>
    						<div class="form-group  back_col">
    							<label>Category Alias:</label> 
                            	<input type="text" class="form-control" name="cc_alias" id="display_alias" value="<?php echo (@$_POST['cc_alias'])? $_POST['cc_alias']: (@$cc_alias); ?>" readonly="readonly">
    						</div>
    						<div class="form-group">
    							<label>Description</label> 
    							<textarea class="cc_description form-control" style="visibility: hidden;"  name="cc_description"><?php echo (@$cc_description)?_pwu($cc_description):set_value('cc_description');?></textarea>
								<span class="error_msg"><?php echo (@$error)?form_error('article_description'):''; ?> </span>
    						</div>
    						<div class="form-group space">
    							<div class="row">
    								<label>Image</label>
    							</div>
    							<div class="image">
									<?php  $url = (@$cc_image) ? $cc_image : ( ( @$_POST['cc_image'] ) ? $_POST['cc_image'] : 'images/no-image.jpg'); ?> 
                                    <img src="<?php echo asset_url($url);?>" width="100" height="100" id="artPrevImage_00"  class="image" style="margin-bottom:0px;padding:3px;" /><br />
                                    <input type="file" name="cc_image" id="ariImg_00" onchange="readURL(this,'00');" style="display: none;">
									<input type="hidden" value="<?php echo (@$cc_image) ? $cc_image : @$_POST['cc_image'];?>" name="cc_image" id="hiddenArtImg" />
									<div align="center">
										<a onclick="$('#ariImg_00').trigger('click');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a style="clear:both;" onclick="javascript:clear_image('artPrevImage_00')"; >Clear</a>
									</div>
									<br>
									<span class="small_text"><?php $allowedSize = getField("config_value", "configuration", "config_key","MANAGE_ARTICAL_IMG_UPLOAD_SIZE");
               							$allowedRec = getField("config_value", "configuration", "config_key","ARTICAL_REC_IMG"); 
               							echo '(Maximum allowed size is '.$allowedSize.'KB, '.$allowedRec.')'; ?>
           							</span>
                                 	<span class="error_msg"><?php echo (@$error)?form_error('article_image'):''; ?> </span>
								</div>
    						</div>
    						<div class="form-group">
    							<label>Sort Order:</label> 
    							<input type="text" class="form-control" name="cc_sort_order" value="<?php echo (@$cc_sort_order)?$cc_name:set_value('cc_sort_order');?>">
								<span class="error_msg"><?php echo (@$error)?form_error('cc_sort_order'):''; ?></span>
    						</div>
    						<div class="form-group space">
    							<label class="control-label" for="cc_status"><span class="required">*</span> Status:</label>
								<select name="cc_status" class="form-control" id="cc_status">
									<option value="0" selected="selected">Enable</option>
									<option value="1" <?php echo (@$cc_status == 0 || @$_POST['cc_status'] == 0 )?'selected="selected"':'';?>>Disable</option>
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