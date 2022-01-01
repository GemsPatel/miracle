<script type="text/javascript" src="<?php echo asset_url('js/admin/ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
		  	CKEDITOR.replace( 'template_content',
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
		<div class="form-grids row widget-shadow" data-example-id="basic-forms" id="mail_template">
			<div class="form-title">
				<h4>Mail Template Details :</h4>
			</div>
			<form id="form" enctype="multipart/form-data" method="post" action="<?php echo site_url( 'admin/'.$this->controller.'/'.$this->controller.'Form')?>">
				<input type="hidden" name="item_id" value="<?php echo (@$this->cPrimaryId != '') ? _en(@$this->cPrimaryId) : ''; ?>"  />
    			<div class="form-body">
    				<div class="col-md-12">
    					<div class="col-md-3"> </div>
    					<div class="col-md-6">
    						<div class="form-group">
    							<label><span class="required">*</span> Config Key:</label> 
    							<input type="text" class="form-control" name="template_key" value="<?php echo (@$template_key)?$template_key:set_value('template_key');?>" style="text-transform:uppercase" <?php echo (@$this->cPrimaryId) ? 'disabled="disabled"': ''; ?> />
                                <span class="error_msg"><?php echo (@$error)?form_error('template_key'):''; ?> </span>
                                <small class="small_text">For developer reference, do not edit if not required.</small>
    						</div>
    						<div class="form-group  back_col">
    							<label><span class="required">*</span> Template Name:</label> 
                            	<input type="text" class="form-control" name="template_name" value="<?php echo (@$template_name)?$template_name:set_value('template_name');?>">
								<span class="error_msg"><?php echo (@$error)?form_error('template_name'):''; ?></span>
    						</div>
    						<div class="form-group">
    							<label><span class="required">*</span>Subject:</label> 
								<input type="text" class="form-control" name="template_subject" value="<?php echo (@$template_subject)?$template_subject:set_value('template_subject');?>">
								<span class="error_msg"><?php echo (@$error)?form_error('template_subject'):''; ?></span>
    						</div>
    						<div class="form-group">
    							<label><span class="required">*</span>Description:</label> 
    							<textarea id="template_content" class="form-control" name="template_content"><?php echo (@$template_content)?$template_content:set_value('template_content');?></textarea>
								<span class="error_msg"><?php echo (@$error)?form_error('template_content'):''; ?> </span>
    						</div>
    						<div class="form-group space">
    							<label class="control-label"><span class="required">*</span> Status:</label>
								<select name="template_status" class="form-control" id="template_status">
									<option value="1" selected="selected">Enable</option>
									<option value="0" <?php echo (@$template_status == 0 || @$_POST['template_status'] == 0 )?'selected="selected"':'';?>>Disable</option>
								</select>
    						</div>
    					</div>
    					<div class="col-md-3">
    						<div class="form-title" style="margin-top: 100%;">
    							<h5 class="mb20 text-center">Use keyword to dynamic value</h5>
        						<!-- <p><i class="fa fa-arrow-left" aria-hidden="true"></i> {document type}</p> -->
        						<p><i class="fa fa-arrow-left" aria-hidden="true"></i> {document number}</p>
        						<p><i class="fa fa-arrow-left" aria-hidden="true"></i> {document total}</p>
        						<p><i class="fa fa-arrow-left" aria-hidden="true"></i> {issue date}</p>
        						<p><i class="fa fa-arrow-left" aria-hidden="true"></i> {due date}</p>
        						<p><i class="fa fa-arrow-left" aria-hidden="true"></i> {client name}</p>
        						<p><i class="fa fa-arrow-left" aria-hidden="true"></i> {client contact}</p>
        						<p><i class="fa fa-arrow-left" aria-hidden="true"></i> {paypal payment link}</p>
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