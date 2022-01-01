<?php 
$sliderArr = executeQuery( "SELECT content_id, c_home_image, c_alias FROM content WHERE is_display_home = 1 ORDER BY c_date DESC" );
?>
<div id="slider">
	<div id="carouselExampleIndicators" class="carousel slide"
		data-ride="carousel">
		<ol class="carousel-indicators miracle-indicators">
			<?php
			if( !isEmptyArr( $sliderArr ) )
			{
				foreach ( $sliderArr as $k=>$slider )
				{
					?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $k;?>" class="<?php echo ( $k == 0 ) ? 'active' : '';?>">
					    <div class="m-indi-img">
					        <img src="<?php echo asset_url( $slider['c_home_image'] );?>" class="d-block w-100" alt="...">
					    </div>
					</li>
					<?php 
				}
			}
			?>
			<!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li> -->
		</ol>
		<div class="carousel-inner">
			<?php
			if( !isEmptyArr( $sliderArr ) )
			{
				foreach ( $sliderArr as $k=>$slider )
				{
					?>
					<div class="carousel-item <?php echo ( $k == 0 ) ? 'active' : '';?>">
						<a href="<?php echo asset_url( "content/".$slider['c_alias']."/".$slider['content_id'] );?>">
							<img src="<?php echo asset_url( $slider['c_home_image'] );?>" class="d-block w-100" alt="...">
						</a>
					</div>
					<?php 
				}
			}
			?>
			<!-- <div class="carousel-item">
				<img src="images/slider.jpg" class="d-block w-100" alt="...">
			</div> -->
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> 
			<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
			<span class="sr-only">Previous</span>
		</a> 
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> 
			<span class="carousel-control-next-icon" aria-hidden="true"></span> 
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>