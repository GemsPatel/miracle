<style>
	.boxes.embed-responsive { margin: 20px 0 !important; }
	.cursor { cursor: pointer; }
</style>
<link rel="stylesheet" href="<?php echo asset_url('css/ALightBox.css')?>">
<!--BANNER-->
<div id="banner">
   	<div class="container-fluid">
       	<div class="banner text-center">
        	<img src="<?php echo asset_url($c_banner);?>" class="img-fluid w-100" alt="Content-Banner" />
    	</div>
	</div>
</div>
<!--BANNER-->
<!--TEXT-->
<div id="text">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-sm-12 col-md-5 col-lg-5 text-1">
            	<a href="#"><?php echo @$c_name;?></a>
                <p>
                	<i><?php echo @$c_explanation;?></i>
				</p>
				<a href="#"><?php echo @$c_hashtag;?></a>
			</div>
			<div class="col-sm-12 col-md-7 col-lg-7">
            	<p><?php echo strip_tags( char_limit( @$c_description, 560 ) );?></p>
			</div>
		</div>
	</div>
</div>
<!--TEXT-->
	
<!--BOXES-->
<div class="pt-2"  data-title="Landscape" >
	<?php 
	
	$productImageArr = executeQuery( " SELECT * FROM content_json WHERE content_id = ".$content_id );
	$lightBox = array();
	
	if( !isEmptyArr( $productImageArr ) )
	{
		$lb = 1;
		foreach ( $productImageArr as $ar)
		{
			$imageArr = json_decode( $ar['content_json'] );
			foreach ( $imageArr as $image )
			{
				$column_size = count( $image );
				$col = 12;
				$frame= "embed-responsive-21by9";
				if( $column_size == 2 ) { $col = 6; $frame= "embed-responsive-16by9"; }
				else if( $column_size == 3 ) { $col = 4; $frame= "embed-responsive-16by9"; }
				else if( $column_size == 4 ) { $col = 3; $frame= "embed-responsive-16by9"; }
				?>
				<div class="container-fluid">
    				<div class="row">
						<?php
						foreach ( $image as $k=>$img )
						{
							$lightBox[] = $img;
							if ( strpos( $img, 'www.youtube.com') !== false)
							{
								$str = fetchSubStr( $img, "watch?v=", " ");
								?>
								<div class="col-12 col-sm-<?php echo $col;?> lightbox">
									<div class="boxes embed-responsive <?php echo $frame; ?>">
				                		<iframe width="100%" height="100%" class="embed-responsive-item cursor" src="<?php echo "https://www.youtube.com/embed/".$str;?>"> </iframe>
				                		<a class="alb_item cursor" href="<?php echo "https://www.youtube.com/embed/".$str;?>">Youtube 1</a>
			                		</div>
								</div>
								<?php
							}
							else if ( ( strpos( $img, 'avi') !== false ) || ( strpos( $img, 'mov') !== false ) ||  ( strpos( $img, 'mp4') !== false ) || ( strpos( $img, 'mpg') !== false ) )
							{
								?>
								<div class="col-12 col-sm-<?php echo $col;?> lightbox">
									<div class="boxes embed-responsive <?php echo $frame; ?>">
				                		<video width="100%" height="100%" class="embed-responsive-item alb_item cursor" controls>
											<source src="<?php echo $img;?>" type="video/mp4">
											Your browser does not support the video tag.
										</video>
										<a class="alb_item cursor" href="<?php echo $img;?>">Youtube 1</a>
			                		</div>
								</div>
								<?php
							}
							else 
							{
								?>
								<div class="col-12 col-sm-<?php echo $col;?> lightbox">
									<div class="boxes embed-responsive">
				                		<img src="<?php echo load_image( $img );?>" style="width:100%"class="hover-shadow alb_item cursor"><!-- cursor  onclick="openModal();currentSlide(<?php //echo $lb;?>)"  -->
			                		</div>
								</div>
								<?php
							}
							$lb++;
						}
						?>
					</div>
				</div>
				<?php 	
			}
		}
	}
	?>
</div>
<!--BOXES-->

<!--TEXT-->
<div id="text" style="display: none;">
	<div class="container-fluid">
    	<div class="row">
        	<div class="col-sm-12 col-md-12 col-lg-12 text-justify">
            	<p><?php echo $c_description;?></p>
			</div>
		</div>
	</div>
</div>
<!--TEXT-->
<script src="<?php echo asset_url('js/ALightBox.js')?>"></script>
<script type="text/javascript">
	$('body').ALightBox({
		showYoutubeThumbnails: true
	});
</script>