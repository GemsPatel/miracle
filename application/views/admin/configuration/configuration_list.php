<div class="main-page">
	<div class="forms" id="content">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms">
			<div class="form-title" style="padding: 1.8em 0em;">
				<div class="col-md-12 mt-10">
					<div class="col-md-6">
						<h4>System Configuration :</h4>
					</div>
					<div class="col-md-6 mt-5 text-right">
						<?php if($this->per_add == 0){?>
    						<button class="button button-gray">
    							<a href="<?php echo base_url( 'admin/'.$this->controller.'/'.$this->controller.'Form');?>" class="btn btn-secondary">
    								<i class="fa fa-file" aria-hidden="true"></i> New Configuration
    							</a>
    						</button>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
		<div class="pre_loader"><div class="listingPreloader"></div></div>
		<div class="form-grids row widget-shadow ajax-content" data-example-id="basic-forms">
			<?php $this->load->view('admin/'.$this->controller.'/ajax_html_data'); ?>
		</div>
	</div>
</div>
