<div class="main-page">
	<div class="forms" id="content">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms">
			<div class="form-title">
				<h4>Import process...</h4>
			</div>
			<div class="form-body">
            	<div class="col-md-12 mb10">
            		<span id="import_process_loader" class="fright">
                    	<img class="login_priloaded" src="<?php echo asset_url("images/preloader-white.gif");?>" alt="loader">
                    	Processing file.....
                    </span>
            	</div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
	importDataProcess( '<?php echo $path;?>', <?php echo $start;?>);
</script>
<?php die;?>