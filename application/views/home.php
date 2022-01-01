<!--SLIDER-->
<?php $this->load->view('elements/top-slider');?>
<!--SLIDER-->
<style>
	.click-to-view { cursor: pointer; }
</style>
<!--BOXES-->
<div id="boxes">
	<div class="container-fluid">
		<div class="row">
			<?php 
			if( !isEmptyArr( $listArr ) )
			{
				foreach ( $listArr as $k=>$ar )
				{
					?>
					<div class="col-12 col-sm-6 col-lg-3">
						<div class="boxes click-to-view" id="<?php echo "content+".$ar['c_alias']."+".$ar['content_id'];?>">
							<img src="<?php echo load_image( $ar['c_home_image'] );?>" class="img-fluid w-100" style="height: 100%;" alt="<?php echo $ar['c_name'];?>" />
							<div class="boxes-content">
								<div class="content">
									<h3 class="title"><?php echo $ar['c_name'];?></h3>
									<span class="post"><?php echo $ar['c_explanation'];?></span>
									<h3 class="title"><?php echo $ar['c_hashtag'];?></h3>
								</div>
								<ul class="icon">
		                            <li class="d-none"><a href="<?php echo asset_url( "content/".$ar['c_alias']."/".$ar['content_id']."?download=true");?>" target="_blank"><i class="fas fa-download"></i></a></li>
		                            <li><a href="<?php echo asset_url( "content/".$ar['c_alias']."/".$ar['content_id'] );?>"><i class="fas fa-eye"></i></a></li>
		                        </ul>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</div>
<!--BOXES-->

<script>
	$(document).ready(function() { 
	    $(".click-to-view").click(function() 
		{
	    	var id = $(this).attr('id').replace(/\+/g, '/');
	    	window.location.href=base_url+id; 
	    }); 
	});
</script>