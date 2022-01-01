<!-- Multiple image upload without ZIP -->
    <input type="hidden" name="is_multiple_image_upload" value="1"/>
	<?php
 	$productImages = array();
 	if( !empty( $this->cPrimaryId ) && !isPost() )
 	{
 		$productImages = fetchProductImages(  contentImageFolderFromSKU( $c_sku ), 0, $this->cPrimaryId);
	}
 	else if( isPost() && !empty( $_POST["c_sku"] ) )  
 	{
 		$c_sku= isset( $_POST["c_sku"] ) ? $_POST["c_sku"] : "";
 		$productImages = fetchProductImages( contentImageFolderFromSKU( $c_sku ), 0, -1 );
	}
 					
 	$lot_row = 0; $ik = 0;
 	if( isEmptyArr( $productImages ) ):
 		$productImages = array( "" );
	endif;
 	
	$col = 12;
	if( !empty( $column_size) )
	{
		if( $column_size == 2 ) $col = 6;
		else if( $column_size == 3 ) $col = 4;
		else if( $column_size == 4 ) $col = 3;
	}
	
	$editImageCount = 0;
	foreach ($productImages as $k=>$ar)
	{
		$product_image_single = $ar;
 		?>
 					
		<input type="hidden" name="lot_ind[]" value="<?php echo $k;?>">
		<input type="hidden" name="image_old_name_<?php echo $k;?>" value="<?php echo hefile_fileName( $product_image_single );?>">
		<div class="dp-row sub-table column col-md-<?php echo $col;?>" id="tr_lot_<?php echo $k;?>">
			<div class="center">
				<label><span class="required">*</span> Image <?php echo ($k+1);?></label>
			</div>
        	<div align="center" style="padding:3px;" class="image wd100">
				<img src="<?php echo (@$product_image_single)?  load_image( $product_image_single ) : asset_url('/images/admin/no_image.jpg');?>" width="100%" height="200" id="imageRemoveBtnLotImg_<?php echo $k;?>" class="image" style="margin-bottom:0px;padding:0px;" /><br />
				<input type="file" name="lot_file_<?php echo $k?>" id="lot_file_<?php echo $k?>" onchange="readURLCommon(this, 'imageRemoveBtnLotImg_<?php echo $k;?>', 'lot_hidden_<?php echo $k?>');" style="display: none;">
				<span class="error_msg"><?php echo (isset($_GET["he_validation_lot_file_".$k]))? $_GET["he_validation_lot_file_".$k] : ''; ?></span>
				<input type="hidden" value="<?php echo (@$product_image_single) ? $product_image_single : @$_POST['lot_hidden_'.$k.''];?>" name="lot_hidden_<?php echo $k?>" id="lot_hidden_<?php echo $k?>" />
				<div align="center">
					<small>
						<a onclick="$('#lot_file_<?php echo $k?>').trigger('click');">Browse</a>&nbsp;|&nbsp;<a style="clear:both;" onclick="clear_image('imageRemoveBtnLotImg_<?php echo $k;?>');">Clear</a>
					</small>
				</div>	
				<div align="center">
					<span style="color: brown;" class="small_text">Upload Size: 360 X 188</span>
				</div>			                      
			</div>
			<div class="row text-center">
				<span>OR</span>
			</div>
			<div>
				<div class="form-group">
					<input type="text" name="video_link_<?php echo $k?>" class="form-control border-input" placeholder="Video link here">
				</div>
			</div>
			<div class="center">
				<?php $remove = '$(\'#tr_lot_'.@$k.'\').remove(); lot_row = lot_row-1;'; ?>
				<a onclick="lotRemove(<?php echo $k ?>)" class="button" style="display:inline-flex"><img src="<?php echo asset_url('images/admin/delete.png') ?>" />&nbsp;Remove</a>
			</div>
		</div>
		<?php
		$ik++;
		$editImageCount++;
	}
	
	$productVideo = executeQuery( "SELECT * FROM content_video_link WHERE content_id=".(int)$this->cPrimaryId );
	
	if( !isEmptyArr( $productVideo ) )
	{
		foreach ($productVideo as $ar)
		{
			?>
			<input type="hidden" name="lot_ind[]" value="<?php echo $ik;?>">
			<input type="hidden" name="image_old_name_<?php echo $ik;?>" value="">
			<div class="col-md-<?php echo $col;?> dp-row sub-table column" id="tr_lot_<?php echo $ik;?>">
				<div class="center">
					<label><span class="required">*</span> Image <?php echo ($ik+1);?></label>
				</div>
	        	<div align="center" style="padding:3px;" class="image wd100">
					<img src="<?php echo asset_url('/images/admin/no_image.jpg');?>" width="100%" height="200" id="imageRemoveBtnLotImg_<?php echo $ik;?>" class="image" style="margin-bottom:0px;padding:0px;" /><br />
					<input type="file" name="lot_file_<?php echo $ik?>" id="lot_file_<?php echo $ik?>" onchange="readURLCommon(this, 'imageRemoveBtnLotImg_<?php echo $ik;?>', 'lot_hidden_<?php echo $ik?>');" style="display: none;">
					<span class="error_msg"><?php echo (isset($_GET["he_validation_lot_file_".$ik]))? $_GET["he_validation_lot_file_".$ik] : ''; ?></span>
					<input type="hidden" value="<?php echo @$_POST['lot_hidden_'.$ik.''];?>" name="lot_hidden_<?php echo $ik?>" id="lot_hidden_<?php echo $ik?>" />
					<div align="center">
						<small>
							<a onclick="$('#lot_file_<?php echo $ik?>').trigger('click');">Browse</a>&nbsp;|&nbsp;<a style="clear:both;" onclick="clear_image('imageRemoveBtnLotImg_<?php echo $ik;?>');">Clear</a>
						</small>
					</div>	
					<div align="center">
						<span style="color: brown;" class="small_text">Upload Size: 360 X 188</span>
					</div>			                      
				</div>
				<div class="row text-center">
					<span>OR</span>
				</div>
				<div>
					<div class="form-group">
						<input type="text" name="video_link_<?php echo $ik?>" class="form-control border-input" value="<?php echo ( @$_POST['video_link_'.$ik] )? $_POST['video_link_'.$ik]: $ar['cv_link'];?>" placeholder="Video link here">
					</div>
				</div>
				<div class="center">
					<?php $remove = '$(\'#tr_lot_'.@$ik.'\').remove(); lot_row = lot_row-1;'; ?>
					<a onclick="lotRemove(<?php echo $ik ?>)" class="button" style="display:inline-flex"><img src="<?php echo asset_url('images/admin/delete.png') ?>" />&nbsp;Remove</a>
				</div>
			</div>
			<?php
			$ik++;
			$editImageCount++;
		}	
	}
	?>
	<div class="col-md-12 text-center">
		<div align="center" style="padding: 0px; margin-top: 0px; background-color: #e3e3e3; width: 22.8% !important;" class="image wd100">
			<a onclick="addMultipleLot( 'true' );" class="button" style="display:inline-flex">
				<img src="<?php echo asset_url('images/admin/add.png') ?>" />&nbsp;Add More			               			
			</a>
		</div>
	</div>
	<?php 
	$last_image_index = $k;
    $corename = file_core_name( hefile_fileName( $product_image_single ) );
    if( strlen($corename) > 1 )
		$last_image_index = substr( $corename, 1 );

	if( !is_numeric( $last_image_index ) )
		$last_image_index = 50;
                	
	$lot_row = $last_image_index + 1;
	$image_number = $ik;
	?>
<!-- END: Multiple image upload without ZIP -->
<script type="text/javascript">
	var lot_row = <?php echo $lot_row;?>;
	var image_number = <?php echo $image_number;?>;
	var editImageCount = <?php echo $editImageCount; ?>;
</script>