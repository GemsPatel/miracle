<div class="main-page">
	<div class="forms">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms">
			<div class="form-title" style="padding: 1.8em 0em;">
				<div class="col-md-12 mt-10">
					<div class="col-md-6">
						<h4>Search Group :</h4>
					</div>
					<div class="col-md-6 mt-5 text-right">
						<?php if($this->per_add == 0){?>
    						<button class="button button-gray">
    							<a href="<?php echo base_url( 'admin/'.$this->controller.'/adminUserGroupForm');?>" class="btn btn-secondary">
    								<i class="fa fa-file" aria-hidden="true"></i> New Group
    							</a>
    						</button>
						<?php }?>
						<button class="button button-gray hide">
							<a class="btn btn-secondary">
								<i class="fa fas fa-file-export" aria-hidden="true"></i> Export
							</a>
						</button>
					</div>
				</div>
			</div>
			<div class="form-body">
				<form id="form" enctype="multipart/form-data" method="get" action="">
    				<div class="col-md-12">
    					<div class="col-md-3">
    						<div class="form-group">
    							<label>Group Name</label> 
    							<input type="text" id="admin_user_group_name_filter" name="admin_user_group_name_filter" value="<?php echo @$_GET['admin_user_group_name_filter']?>" class="form-control" placeholder="Type to get Group Name">        
    						</div>
    					</div>
    					<div class="i_color col-md-2">
    						<div class="form-group text-center">
    							<button type="submit" class="button button-gray mt22">
    								<i class="fas fa-search" aria-hidden="true"></i> Search
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