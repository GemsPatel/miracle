<style>
    .form-control{ padding: 6px 5px !important; }
</style>
<div class="main-page" id="product">
	<div class="forms" id="content_show">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms">
			<div class="form-title" style="padding: 1.8em 0em;">
				<div class="col-md-12 mt-10">
					<div class="col-md-6">
						<h4>Search Project :</h4>
					</div>
					<div class="col-md-6 mt-5 text-right hide">
						<?php if($this->per_add == 0){?>
            				<div class="col-md-12">
                				<button class="button button-gray">
                					<a href="<?php echo base_url( 'admin/'.$this->controller.'/'.$this->controller.'Form');?>" class="btn btn-secondary">
                						<i class="fa fa-file" aria-hidden="true"></i> Insert
                					</a>
                				</button>
            				</div>
            			<?php }?>
						<?php if( false && $this->per_add == 0 && $this->per_edit == 0){?>
                			<div class="col-md-3">
                				<button class="button button-gray" data-toggle="modal" style="padding: 8px 20px; color: #337ab7;" data-target="#clientModel"><!-- href="javascript:void(0)" onclick="$('#export_form').submit();"-->
                					<i class="fa fa-upload" aria-hidden="true"></i> Import
                				</button>
                				<form method="post" id="import_form" enctype="multipart/form-data" action="<?php echo site_url('admin/'.$this->controller.'/importData') ?>" class="fleft hide">
                					<div class="uploadbtn">
                    					<i class="fa fa-upload" aria-hidden="true"></i>
                    					<input type="file" id="import_csv" name="import_csv" class="input-upload hide" onchange="this.form.submit()"/>
                    					<label for="import_csv"> Import</label>
                    				</div>
                				</form>
                			</div>
            			<?php }?>
            			<?php if( false ) {?>
	            			<div class="col-md-3">
	            				<form method="post" id="export_form" action="<?php echo site_url('admin/'.$this->controller.'/exportData') ?>">
	            					<input name="<?php echo $this->controller.'_export'?>" value="CSV" type="hidden">
	                				<button class="button button-gray" href="javascript:void(0)" onclick="$('#export_form').submit();">
	                					<a class="btn btn-secondary">
	                						<i class="fa fa-file-export" aria-hidden="true"></i> Export
	                					</a>
	                				</button>
	            				</form>
	            			</div>
            			<?php }?>
					</div>
				</div>
			</div>
			<div class="form-body">
				<form id="form" enctype="multipart/form-data" method="get" action="">
    				<div class="col-md-12">
    					<div class="col-md-4">
    						<div class="form-group">
    							<label>Project Name</label> 
    							<input type="text" id="c_name" name="c_name" value="<?php echo @$_GET['c_name']?>" autocomplete="off" class="form-control" placeholder="Type to get Content Name">        
    		                    <ul class="dropdown-menu txt_c_name" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCName"></ul>
    						</div>
    					</div>
    					<div class="col-md-4">
							<div class="form-group">        
								<label>Client</label>
    							<input type="text" class="form-control" id="c_client" name="c_client" value="<?php echo @$_GET['c_client']?>" placeholder="Content Client">
    						</div>
    					</div>
	    				<div class="col-md-4 mt25">
	    					<div class="i_color text-center">
	    						<button type="submit" class="button button-gray">
	    							<i class="fas fa-search" aria-hidden="true"></i>Search
	    						</button>
	    						<button type="reset" class="button button-gray" id="formreset">
	    							<a class="a_button" href="<?php echo site_url( 'admin/'.$this->controller);?>" style="padding: 0px 5px;">
	    								<i class="fas fa-redo-alt error_msg" aria-hidden="true"></i>Reset
									</a>
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