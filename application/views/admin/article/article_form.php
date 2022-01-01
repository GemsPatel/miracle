<script type="text/javascript" src="<?php echo asset_url('js/admin/ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
       	CKEDITOR.replace( 'article_description',
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
				<h4>Article Details :</h4>
			</div>
			<form id="form" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/'.$this->controller.'/'.$this->controller.'Form')?>">
				<input type="hidden" name="item_id" value="<?php echo (@$this->cPrimaryId != '') ? _en(@$this->cPrimaryId) : ''; ?>"  />
    			<div class="form-body">
    				<div class="col-md-12">
    					<div class="col-md-3"></div>
    					<div class="col-md-6">
    						<div class="form-group">
    							<label>Article Name:</label> 
    							<input type="text" class="form-control" name="article_name" value="<?php echo (@$article_name)?$article_name:set_value('article_name');?>" onkeyup="getUrlName(this.value)">
								<span class="error_msg"><?php echo (@$error)?form_error('article_name'):''; ?></span>
    						</div>
    						<div class="form-group  back_col">
    							<label>Article Alias:</label> 
                            	<input type="text" class="form-control" name="article_alias" id="display_alias" value="<?php echo (@$_POST['article_alias'])? $_POST['article_alias']: (@$article_alias); ?>" readonly="readonly">
    						</div>
    						<div class="form-group">
    							<label>Config Key:</label> 
								<input type="text" class="form-control" name="article_key" size="75" value="<?php echo (@$article_key)?$article_key:@$_POST['article_key'];?>" style="text-transform:uppercase" <?php echo (@$this->cPrimaryId) ? 'readonly="readonly"': ''; ?> />
                                <span class="error_msg"><?php echo (@$error)?form_error('article_key'):''; ?> </span>
                                <small class="small_text">For developer reference, do not edit if not required.</small>
    						</div>
    						<div class="form-group">
    							<label>Description</label> 
    							<textarea class="article_description form-control" style="visibility: hidden;"  name="article_description"><?php echo (@$article_description)?_pwu($article_description):set_value('article_description');?></textarea>
								<span class="error_msg"><?php echo (@$error)?form_error('article_description'):''; ?> </span>
    						</div>
    						<div class="form-group space">
    							<div class="row">
    								<label>Image</label>
    							</div>
    							<div class="image">
									<?php  $url = (@$article_image) ? $article_image : ( ( @$_POST['article_image'] ) ? $_POST['article_image'] : 'images/no-image.jpg'); ?> 
                                    <img src="<?php echo asset_url($url);?>" width="100" height="100" id="artPrevImage_00"  class="image" style="margin-bottom:0px;padding:3px;" /><br />
                                    <input type="file" name="article_image" id="ariImg_00" onchange="readURL(this,'00');" style="display: none;">
									<input type="hidden" value="<?php echo (@$article_image) ? $article_image : @$_POST['article_image'];?>" name="article_image" id="hiddenArtImg" />
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
    						<div class="form-group space">
    							<label class="control-label" for="country_status"><span class="required">*</span> Status:</label>
								<select name="article_status" class="form-control" id="article_status">
									<option value="1" selected="selected">Enable</option>
									<option value="0" <?php echo (@$article_status == 0 || @$_POST['article_status'] == 0 )?'selected="selected"':'';?>>Disable</option>
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