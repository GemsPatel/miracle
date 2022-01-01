<div class="main-page">
	<div class="forms" id="content">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms">
			<div class="form-title" style="padding: 1.8em 0em;">
				<div class="col-md-12 mt-10">
					<div class="col-md-6">
						<h4>Search Mail Template :</h4>
					</div>
					<div class="col-md-6 mt-5 text-right">
						<?php if($this->per_add == 0){?>
    						<button class="button button-gray">
    							<a href="<?php echo base_url( 'admin/'.$this->controller.'/'.$this->controller.'Form');?>" class="btn btn-secondary">
    								<i class="fa fa-file" aria-hidden="true"></i> New Template
    							</a>
    						</button>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="form-body">
				<form id="form" enctype="multipart/form-data" method="get" action="">
    				<div class="col-md-12">
    					<div class="col-md-3">
    						<div class="form-group">
    							<label>Template Name</label> 
    							<input type="text" id="article_name_filter" name="article_name_filter" value="<?php echo @$_GET['article_name_filter']?>" class="form-control" placeholder="Type to get Article">        
    						</div>
    					</div>
    					<div class="col-md-2">
    						<div class="form-group">
    							<label>Status</label> 
    							<select name="article_key_filter" class="form-control" id="status">
									<option value="">Select</option>
									<option value="1" <?php echo (@$_GET['article_key_filter'] == "1")?'selected="selected"':'';?> >Enabled</option>
                                    <option value="0" <?php echo (@$_GET['article_key_filter'] == "0")?'selected="selected"':'';?> >Disabled</option>
                                </select>
    						</div>
    					</div>
    					<div class="col-md-2 i_color">
    						<div class="form-group text-center">
    							<button type="submit" class="button button-gray mt22">
    								<i class="fas fa-search" aria-hidden="true"></i>Search
    							</button>
    						</div>
    					</div>
    				</div>
				</form>
			</div>
		</div>
		<div class="pre_loader"><div class="listingPreloader"></div></div>
		<div class="form-grids row widget-shadow ajax-content" data-example-id="basic-forms">
			<?php $this->load->view( 'admin/'.$this->controller.'/ajax_html_data'); ?>
		</div>
	</div>
</div>