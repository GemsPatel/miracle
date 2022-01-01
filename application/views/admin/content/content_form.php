<script type="text/javascript" src="<?php //echo asset_url('js/admin/ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript">
	/* $(document).ready(function(e) {
       	CKEDITOR.replace( 'c_description',
        {
            filebrowserBrowseUrl : 'kcfinder/browse.php',
            filebrowserImageBrowseUrl : 'kcfinder/browse.php?type=Images',
            filebrowserUploadUrl : 'kcfinder/upload.php',
            filebrowserImageUploadUrl : 'kcfinder/upload.php?type=Images'
        });
    		
    }); */
</script>
<style>
	.small_text { color: red; font-size: 11px; }
</style>
<div class="main-page">
	<div class="forms">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
			<div class="form-title">
				<h4>Project Information</h4>
			</div>
			<div class="form-body">
                <div class="col-md-12">
                    <form id="form" enctype="multipart/form-data" method="post" action="<?php echo asset_url('admin/'.$this->controller.'/'.$this->controller.'Form')?>">
						<input type="hidden" name="item_id" value="<?php echo (@$this->cPrimaryId != '') ? _en(@$this->cPrimaryId) : ''; ?>"  />
						<div class="row">
    						<div class="col-md-4">
    							<div class="form-group">
    								<label class="control-label" for="c_date"> Date:</label>
    								<input type="text" class="datepicker form-control border-input" name="c_date" id="c_date" value="<?php echo (@$c_date)?$c_date:@$_POST['c_date']; ?>">
    								<span class="error_msg"><?php echo (@$error)?form_error('c_date'):''; ?></span>
    							</div>
    						</div>
						
							<div class="col-md-4">
    							<div class="form-group">
    								<label class="control-label" for="c_client"> Client Name:</label>
    								<input type="text" class="form-control border-input" name="c_client" id="c_client" value="<?php echo (@$c_client)?$c_client:@$_POST['c_client']; ?>">
    								<span class="error_msg"><?php echo (@$error)?form_error('c_client'):''; ?></span>
    							</div>
    						</div>
    						
							<div class="col-md-4">
    							<div class="form-group">
    								<label class="control-label" for="c_date"> Category:</label>
    								<?php 
    								$content_category_id= (@$content_category_id) ? $content_category_id: @$_POST['content_category_id'];
									$sql = "SELECT content_category_id, cc_name FROM content_category WHERE cc_status=0";
									$content_categoryArr = getDropDownAry($sql,"content_category_id", "cc_name", '', false);
									
									echo form_dropdown('content_category_id',@$content_categoryArr,@$content_category_id,'class="form-control border-input"');
									?>
    							</div>
    						</div>
						</div>
						
    					<div class="row">
    						<div class="col-md-12">
    							<div class="form-group">
    								<label class="control-label" for="c_name"><span class="required">*</span> Project Name  ( Max <span id="c_name_char" >70</span> Character ):</label>
    								<input type="text" name="c_name" class="form-control border-input c_name" id="c_name" placeholder="Enter content name here" value="<?php echo (@$c_name)?$c_name:@$_POST['c_name']; ?>" onkeyup="getUrlName( this.value, 'c_sku' )">
    								<span class="error_msg"><?php echo (@$error)?form_error('c_name'):''; ?></span>
    							</div>
    						</div>
						</div>
						<div class="row">
    						<div class="col-md-12">
    							<div class="form-group">
    								<label class="control-label" for="c_explanation"><span class="required">*</span> Box Caption ( Max <span id="c_explanation_char" >140</span> Character ):</label> 
    								<textarea class="form-control border-input" type="text" name="c_explanation" id="c_explanation" placeholder="Enter content explanation here"><?php echo (@$c_explanation) ? $c_explanation: @$_POST['c_explanation'];?></textarea>
             						<span class="error_msg"><?php echo (@$error)?form_error('c_explanation'):''; ?> </span>
    							</div>
    						</div>
						</div>
						<div class="row">
    						<div class="col-md-6 hide">
    							<div class="form-group">
    								<label class="control-label" for="c_sku"> SKU/Unique ID:</label>
    								<input type="text" name="c_sku" id="c_sku" class="form-control border-input" placeholder="Enter content unique Id Here" value="<?php echo (@$c_sku)?$c_sku:@$_POST['c_sku']; ?>">
    								<span class="error_msg"><?php echo (@$error)?form_error('c_sku'):''; ?></span>
    							</div>
    						</div>
    						<div class="col-md-12">
    							<div class="form-group">
    								<label class="control-label" for="c_hashtag"> #hashtag ( Max <span id="c_hashtag_char" >140</span> Character ):</label>
    								<input type="hidden" name="" class="form-control border-input" placeholder="Enter content hashtag Here" value="<?php echo (@$c_hashtag)?$c_hashtag:@$_POST['c_hashtag']; ?>">
    								<textarea class="form-control border-input" type="text" name="c_hashtag" id="c_hashtag" placeholder="Enter content hashtag Here"><?php echo (@$c_hashtag) ? $c_hashtag: @$_POST['c_hashtag'];?></textarea>
    								<span class="error_msg"><?php echo (@$error)?form_error('c_hashtag'):''; ?></span>
    							</div>
    						</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="row">
    								<label><span class="required">*</span> Home Image</label>
    							</div>
    							<div class="image wd100">
									<?php  $url = (@$c_home_image) ? $c_home_image: ( ( @$_POST['c_home_image'] ) ? $_POST['c_home_image'] : 'images/no-image.jpg'); ?> 
                                    <img src="<?php echo asset_url($url);?>" width="100%" height="250" id="homePrevImage_01" class="image"  /><br />
                                    <input type="file" name="c_home_image" id="homeImg_01" onchange="readURL(this,'01');" style="display: none;">
									<input type="hidden" value="<?php echo (@$c_home_image) ? $c_home_image: @$_POST['c_home_image'];?>" name="c_home_image" id="hiddenHomeImg" />
									<div align="center">
										<a onclick="$('#homeImg_01').trigger('click');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a style="clear:both;" onclick="javascript:clear_image('homePrevImage_01')"; >Clear</a>
									</div>
									<div align="center">
										<span class="small_text">Upload Size: 1440 X 750</span>
           							</div>
                                 	<span class="error_msg"><?php echo (@$error)?form_error('c_home_image'):''; ?> </span>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
    								<label><span class="required">*</span> Banner</label>
    							</div>
    							<div class="image wd100">
									<?php  $url = (@$c_banner) ? $c_banner: ( ( @$_POST['c_banner'] ) ? $_POST['c_banner'] : 'images/no-image.jpg'); ?> 
                                    <img src="<?php echo asset_url($url);?>" width="100%" height="250" id="bannerPrevImage_00" class="image"  /><br />
                                    <input type="file" name="c_banner" id="bannerImg_00" onchange="readURL(this,'00');" style="display: none;">
									<input type="hidden" value="<?php echo (@$c_banner) ? $c_banner: @$_POST['c_banner'];?>" name="c_banner" id="hiddenBannerImg" />
									<div align="center">
										<a onclick="$('#bannerImg_00').trigger('click');">Browse</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a style="clear:both;" onclick="javascript:clear_image('bannerPrevImage_00')"; >Clear</a>
									</div>
									<div align="center">
										<span class="small_text">Upload Size: 1440 X 400</span>
           							</div>
                                 	<span class="error_msg"><?php echo (@$error)?form_error('c_banner'):''; ?> </span>
								</div>
							</div>
						</div>
						
						<div class="row hide">
    						<div class="col-md-12">
    							<div class="form-group">
    								<label class="control-label" for="c_short_description"><span class="required">*</span> Project Short Description  ( Max <span id="c_short_description_char" >140</span> Character ):</label>
    								<textarea class="form-control border-input" type="text" name="c_short_description" id="c_short_description" placeholder="Enter content explanation here">c_short_description</textarea>
    								<span class="error_msg"><?php echo (@$error)?form_error('c_short_description'):''; ?></span>
    							</div>
    						</div>
						</div>
						<div class="row">
    						<div class="col-md-12">
    							<div class="form-group">
    								<label class="control-label" for="c_description"><span class="required">*</span> Project Description ( Max <span id="c_description_char" >140</span> Character ):</label> 
    								<textarea class="c_description form-control" rows="5" name="c_description" id="c_description"><?php echo (@$c_description)?_pwu($c_description):set_value('c_description');?></textarea>
             						<span class="error_msg"><?php echo (@$error)?form_error('c_description'):''; ?> </span>
    							</div>
    						</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label" for="c_status">Upload Zip Folder:</label>
										<br>
										<div class="image" style="padding:5px;" align="center">
						                 	  <img src="<?php echo (@$c_images)?  asset_url(image_src_common($c_images.".zip")) : asset_url('/images/admin/no_image.jpg');?>" width="35" height="35" id="imageRemoveBtn_000" class="image" style="margin-bottom:0px;padding:3px;" /><br />
						                      <input type="file" name="c_images" id="productImage_000" accept="application/zip,application/rar" onchange="readURL(this,'000');" style="display: none;">
						                      <input type="hidden" value="<?php echo (@$c_images) ? $c_images: @$_POST['c_images'];?>" name="c_images" id="hiddenProdImg" />
						                      <div align="center">
						                      	<small><a onclick="$('#productImage_000').trigger('click');">Browse</a>&nbsp;|&nbsp;<a style="clear:both;" id="imageRemoveBtn_000">Clear</a></small>
						                      </div>
						                 </div>
					                 </div>
				                 </div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
									<div class="form-group col-md-12">
		    							<label class="control-label" for="c_status">Status:</label>
										<select name="c_status" class="form-control" id="article_status">
											<option value="0" selected="selected">Enable</option>
											<option value="1" <?php echo (@$c_status == 1 || @$_POST['c_status'] == 1 )?'selected="selected"':'';?>>Disable</option>
										</select>
		    						</div>
								</div>
								
								<div class="row">
									<div class="form-group col-md-12">
		    							<div class="form-group">
		    								<input type="checkbox" id="is_display_home" name="is_display_home" <?php echo (@$is_display_home == 1 || @$_POST['is_display_home'] == 1 )?'checked':'';?>>
		    								<label class="control-label" for="is_display_home">Display home page</label>
		    							</div>
		    						</div>
								</div>
							</div>
						</div>
						
						<?php 
						$data['content_id'] = (int)@$content_id;
						$this->load->view('admin/content/elements/multiple_image_upload_with_column_size', $data );
						?>

						<div class="clearfix"></div>
						
						<div class="col-md-12">
    						<div class="text-center">
    							<?php if( $this->per_add == 0 || $this->per_edit == 0 ){?>
        							<button type="submit" onclick="$('#form').submit();" class="button button-gray mb15" style="width: 10%;">
        								<i class="fa fa-check" aria-hidden="true"></i> Save
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
    				</form>
                </div>
    		</div>
        </div>
    </div>
</div>
<script>
	$( "#p_type" ).change(function() {
	  var type = $( this ).val();

	  $(".p_type_sh").addClass("hide");
	  if( type == 1 )
	  {
		  $(".p_type_sh").removeClass("hide");  
	  }
	});
	
	$(document).ready(function() 
	{
		$( "#c_name" ).click();
		
		$( ".datepicker" ).click( function(){
			// DATEPICKER FOR FILTER
			$( ".datepicker" ).datepicker({
			  changeMonth: true,
	   	  	  dateFormat : 'dd/mm/yy',
			  maxDate: "d",
			  numberOfMonths: 2
			});
		});

		$('#c_name').keypress(function(e) 
		{
		    var tval = $('#c_name').val(), tlength = tval.length, set = 70, remain = parseInt(set - tlength);
		    $('#c_name_char').text(remain);
		    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
		        $('#c_name').val((tval).substring(0, tlength - 1));
		        return false;
		    }
		});

		$('#c_explanation').keypress(function(e) 
		{
		    var tval = $('#c_explanation').val(), tlength = tval.length, set = 140, remain = parseInt(set - tlength);
		    $('#c_explanation_char').text(remain);
		    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
		        $('#c_explanation').val((tval).substring(0, tlength - 1));
		        return false;
		    }
		});

		$('#c_hashtag').keypress(function(e) 
		{
		    var tval = $('#c_hashtag').val(), tlength = tval.length, set = 140, remain = parseInt(set - tlength);
		    $('#c_hashtag_char').text(remain);
		    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
		        $('#c_hashtag').val((tval).substring(0, tlength - 1));
		        return false;
		    }
		});

		$('#c_description').keypress(function(e) 
		{
		    var tval = $('#c_description').val(), tlength = tval.length, set = 140, remain = parseInt(set - tlength);
		    $('#c_description_char').text(remain);
		    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
		        $('#c_description').val((tval).substring(0, tlength - 1));
		        return false;
		    }
		});
	});

</script>