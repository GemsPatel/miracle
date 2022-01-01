<style>
    .form-control{ padding: 6px 5px !important; }
</style>
<div class="main-page" id="product">
	<div class="forms" id="content">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms">
			<div class="form-title" style="padding: 1.8em 0em;">
				<div class="col-md-12 mt-10">
					<div class="col-md-6">
						<h4>Search Error :</h4>
					</div>
					<div class="col-md-6 mt-5 text-right">
						<?php if($this->per_add == 0){?>
            				<button class="button button-gray">
            					<a href="<?php echo base_url( 'admin/'.$this->controller.'/'.$this->controller.'Form');?>" class="btn btn-secondary">
            						<i class="fa fa-file" aria-hidden="true"></i> Insert
            					</a>
            				</button>
            			<?php }?>
					</div>
				</div>
			</div>
			<div class="form-body">
				<form id="form" enctype="multipart/form-data" method="get" action="">
    				<div class="col-md-12">
    					<div class="col-md-2">
    						<div class="form-group">
    							<label>Error Code</label> 
    							<input type="text" id="error_code" name="error_code" value="<?php echo @$_GET['error_code']?>" class="form-control" placeholder="Type to get error code">        
    						</div>
    					</div>
    					<div class="col-md-4">
							<div class="form-group">        
								<label>Error Message</label>
    							<input type="text" class="form-control" id="error_message" name="error_message" value="<?php echo @$_GET['error_message']?>" placeholder="Enter error message">
    						</div>
    					</div>
    					<div class="col-md-4">
    						<div class="i_color mt25">
    							<button type="submit" class="button button-gray">
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
			<?php $this->load->view('admin/'.$this->controller.'/ajax_html_data'); ?>
		</div>
	</div>
</div>