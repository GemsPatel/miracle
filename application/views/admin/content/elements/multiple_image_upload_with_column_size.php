<style>
    .multiple-row { box-shadow: 0px 0px 5px 5px #dfdfdf; }
</style>
<!-- Multiple image upload without ZIP -->
<input type="hidden" name="is_multiple_image_upload" value="1"/>

<?php 
$input_qty = 1;
$productImageArr = executeQuery( " SELECT * FROM content_json WHERE content_id = ".$content_id );
if( !isEmptyArr( $productImageArr ) )
{
	foreach ( $productImageArr as $ar)
	{
		$imageArr = json_decode( $ar['content_json'] );
		foreach ( $imageArr as $image )
		{
			$column_size = count( $image );
			$col = 12;
			$upload_size = "Upload Size: 1400px X 700px"; 
			
			if( $column_size == 2 ) { $col = 6; $upload_size = "Upload Size: 670px X 310px";}
// 			else if( $column_size == 3 ) { $col = 4; $upload_size = "Upload Size: 1400px X 700px";}
			else if( $column_size == 4 ) { $col = 3; $upload_size = "Upload Size: 310px X 135px";}
			
			?>
			<div class="row multiple-row">
				<div class="form-group col-md-2">
					<label class="control-label" for="c_status">Choose column size:</label>
					<select name="column_size[]" class="form-control column_size_<?php echo $input_qty;?>" id="column_size_<?php echo $input_qty;?>" onchange="changeColumn(<?php echo $input_qty;?>)">
						<option value="1" <?php echo ( $column_size == 1 ) ? 'selected="selected"' : '';?>>1 Column</option>
						<option value="2" <?php echo ( $column_size == 2 ) ? 'selected="selected"' : '';?>>2 Column</option>
						<option value="4" <?php echo ( $column_size == 4 ) ? 'selected="selected"' : '';?>>4 Column</option>
					</select>
					<div align="center">
						<span class="small_text upload_size_<?php echo $input_qty;?>"><?php echo $upload_size;?></span>
					</div>
				</div>
				<div class="form-group col-md-10">
					<?php 
					foreach ( $image as $k=>$img )
					{
						?>
						<input type="hidden" name="lot_ind[]" value="" class="remove_select_lot_<?php echo $input_qty;?>">
						<input type="hidden" name="image_old_name_<?php echo $input_qty;?>" value="">
						<div class="col-md-<?php echo $col;?> image column_image_size_<?php echo $input_qty;?> imageRow_<?php echo $input_qty;?>" id="tr_lot_<?php echo $input_qty;?>">
							<div class="center">
								<label class="hide"><span class="required">*</span> Image 1</label>
							</div>
				        	<div align="center" style="padding:3px;" class="image wd100">
								<img src="<?php echo ( $img ) ?  load_image( $img ) : asset_url('/images/admin/no_image.jpg');?>" width="100%" height="200" id="imageRemoveBtnLotImg_<?php echo $input_qty?>" class="image" style="margin-bottom:0px;padding:0px;" /><br />
								<input type="file" name="lot_file_<?php echo $input_qty?>" id="lot_file_<?php echo $input_qty?>" onchange="readURLCommon(this, 'imageRemoveBtnLotImg_<?php echo $input_qty?>', 'lot_hidden_<?php echo $input_qty?>');" style="display: none;">
								<span class="error_msg"></span>
								<input type="hidden" value="<?php echo ( $img ) ?  $img : '/images/admin/no_image.jpg';?>" name="lot_hidden_<?php echo $input_qty?>" id="lot_hidden_<?php echo $input_qty?>" />
								<div align="center">
									<small>
										<a onclick="$('#lot_file_<?php echo $input_qty?>').trigger('click');">Browse</a>&nbsp;|&nbsp;<a style="clear:both;" onclick="clear_image('imageRemoveBtnLotImg_<?php echo $input_qty?>');">Clear</a>
									</small>
								</div>	
								<!-- <div align="center">
									<span style="color: brown;" class="small_text">Upload Size: 360 X 188</span>
								</div>-->			                      
							</div>
							<div class="row text-center">
								<span>OR</span>
							</div>
							<div>
								<div class="form-group">
									<?php 
									$video = "";
									if ( strpos( $img, 'www.youtube.com') !== false)
									{
										$video = $img;
									}
									else if ( ( strpos( $img, 'avi') !== false ) || ( strpos( $img, 'mov') !== false ) ||  ( strpos( $img, 'mp4') !== false ) || ( strpos( $img, 'mpg') !== false ) )
									{
										$video = $img;
									}
									?>
									<input type="text" name="video_link_<?php echo $input_qty?>" class="form-control border-input" placeholder="Video link here" value="<?php echo $video;?>">
								</div>
							</div>
							<div class="center">
								<?php $remove = '$(\'#tr_lot_'.$input_qty.'\').remove(); lot_row = lot_row-1;'; ?>
								<a onclick="lotRemove(<?php echo $input_qty?>)" class="button" style="display:inline-flex"><img src="<?php echo asset_url('images/admin/delete.png') ?>" />&nbsp;Remove</a>
							</div>
						 </div>
						<?php 
						$input_qty++;
					}
					?>
				</div>
			</div>
			<?php 
		}
	}
}
else 
{
?>
	<input type="hidden" name="" value="1" id="input_qty"/>
	<div class="row multiple-row">
		<div class="form-group col-md-2">
			<label class="control-label" for="c_status">Choose column size:</label>
			<select name="column_size[]" class="form-control column_size_0" id="column_size_0" onchange="changeColumn(0)">
				<option value="1" selected="selected">1 Column</option>
				<option value="2">2 Column</option>
				<option value="4">4 Column</option>
			</select>
			<div align="center">
				<span class="small_text upload_size_0">Upload Size: 1400px X 700px</span>
			</div>
		</div>
		
		<div class="form-group col-md-10">
			<input type="hidden" name="lot_ind[]" value="" class="remove_select_lot_0">
			<input type="hidden" name="image_old_name_0" value="">
			<div class="col-md-12 column_image_size_0 imageRow_0 image" id="tr_lot_0">
				<div class="center">
					<label class="hide"><span class="required">*</span> Image 1</label>
				</div>
	        	<div align="center" style="padding:3px;" class="image wd100">
					<img src="<?php echo asset_url('/images/admin/no_image.jpg');?>" width="100%" height="200" id="imageRemoveBtnLotImg_0" class="image" style="margin-bottom:0px;padding:0px;" /><br />
					<input type="file" name="lot_file_0" id="lot_file_0" onchange="readURLCommon(this, 'imageRemoveBtnLotImg_0', 'lot_hidden_0');" style="display: none;">
					<span class="error_msg"></span>
					<input type="hidden" value="" name="lot_hidden_0" id="lot_hidden_0" />
					<div align="center">
						<small>
							<a onclick="$('#lot_file_0').trigger('click');">Browse</a>&nbsp;|&nbsp;<a style="clear:both;" onclick="clear_image('imageRemoveBtnLotImg_0');">Clear</a>
						</small>
					</div>	
					<!-- <div align="center">
						<span style="color: brown;" class="small_text">Upload Size: 360 X 188</span>
					</div>	-->		                      
				</div>
				<div class="row text-center">
					<span>OR</span>
				</div>
				<div>
					<div class="form-group">
						<input type="text" name="video_link_0" class="form-control border-input" placeholder="Video link here">
					</div>
				</div>
				<div class="center">
					<?php $remove = '$(\'#tr_lot_0\').remove(); lot_row = lot_row-1;'; ?>
					<a onclick="lotRemove(0)" class="button" style="display:inline-flex"><img src="<?php echo asset_url('images/admin/delete.png') ?>" />&nbsp;Remove</a>
				</div>
			 </div>
		</div>
	</div>
<?php 
}
?>
<input type="hidden" name="" value="<?php echo $input_qty;?>" id="input_qty"/>
<div class="row">
	<div class="col-md-12 text-center">
		<div align="center" style="padding: 0px; margin-top: 0px; background-color: #e3e3e3; width: 22.8% !important;" class="image wd100">
			<a onclick="addMoreImage();" class="button" style="display:inline-flex">
				<img src="<?php echo asset_url('images/admin/add.png') ?>" />&nbsp;Add More			               			
			</a>
		</div>
	</div>
</div>
<script>
var imageCount = <?php echo $input_qty?>;
function changeColumn( id )
{
	$(".remove_select_lot_"+id).remove();
	console.log( "remove_select_lot_"+id );
// 	var select = this.value;
	var select = $('select.column_size_'+id+' option:selected').val();
	
	for( i=1;i<select;i++ )
	{
		addMultipleLot( id, (i+1) );
	}

	changeColSize( id, select );
}

function changeColSize( id, column )
{
	col_size = "col-md-12";
	upload_size = "Upload Size: 1400px X 700px";

	if( column == 2 )
	{
		col_size = "col-md-6";
		upload_size = "Upload Size: 670px X 310px";
	}
	if( column == 4 )
	{
		col_size = "col-md-3";
		upload_size = "Upload Size: 310px X 135px";
	}
	
	$( ".column_image_size_"+id ).removeClass( "col-md-12 col-md-6 col-md-3" ).addClass( col_size );
	$( ".upload_size_"+id ).text( upload_size );
}

function addMultipleLot( lot_row, count )
{
	html = imageHTML( lot_row, count );
// 	$(".dp-row.sub-table").html( html ).last();
	$( html ).insertAfter( $(".imageRow_"+lot_row ).last() );
}

function imageHTML( lot_row, count )
{
	var html = '';
	html += '<input type="hidden" class="remove_select_lot_'+lot_row+'" name="lot_ind[]" value="'+lot_row+'">';
	html += '<div id="tr_lot_'+imageCount+'" class="col-md-12 imageRow_'+lot_row+' column_image_size_'+lot_row+' image remove_select_lot_'+lot_row+'" >';
	html += '<div class="center">';
	html += '<label class="hide">Image '+count+':</label>';
	html += '</div>';
	html += '<div class="image wd100" style="padding:3px;" align="center"><img src="'+asset_url+'images/admin/no_image.jpg" width="100%" height="200" id="imageRemoveBtnLotImg_'+imageCount+'" class="image" style="margin-bottom:0px;padding:0px;" /><br />';
	html += '<input type="file" name="lot_file_'+imageCount+'" id="lot_file_'+imageCount+'" onchange="readURLCommon(this, \'imageRemoveBtnLotImg_'+imageCount+'\', \'lot_hidden_'+imageCount+'\');" style="display: none;">';
	html += '<input type="hidden" value="" name="lot_hidden_'+imageCount+'" id="lot_hidden_'+imageCount+'" />';
	html += '<div align="center"><small><a onclick="$(\'#lot_file_'+imageCount+'\').trigger(\'click\');">Browse</a>&nbsp;|&nbsp;<a style="clear:both;" onclick="clear_image(\'imageRemoveBtnLotImg_'+imageCount+'\');">Clear</a></small></div>';
	html += '</div></td>';//<div align="center"><span style="color: brown;" class="small_text">Upload Size: 360 X 188</span></div>
	html += '<div class="row text-center"><span>OR</span></div>';
	html += '<div><div class="form-group"><input type="text" name="video_link_'+imageCount+'" class="form-control border-input" placeholder="Video link here"></div></div>';
	html += '<div class="center"><a onclick="lotRemove('+imageCount+')" class="button" style="display:inline-flex"><img src="'+asset_url+'images/admin/delete.png" />&nbsp;Remove</a></div>';

	imageCount++;
	return html;
}
function lotRemove(val)
{
	$('#tr_lot_'+val).remove();
}

function addMoreImage()
{
	var lot_row = count = cs = $('#input_qty').val();
	console.log( cs );
	$('#input_qty').val( ( cs + 1) );
	var html = '';
	html += '<div class="row multiple-row">';
	html += '<div class="form-group col-md-2">';
	html += '<label class="control-label" for="c_status">Choose column size:</label>';
	html += '<select name="column_size[]" class="form-control column_size_'+cs+'" id="column_size_'+cs+'" onchange="changeColumn('+cs+')">';
	html += '<option value="1" selected="selected">1 Column</option>';
	html += '<option value="2">2 Column</option>';
	html += '<option value="4">4 Column</option>';
	html += '</select>';
	html += '<div align="center"> <span class="small_text upload_size_'+cs+'">Upload Size: 1440px X 700px</span> </div>';
	html += '</div>';

	html += '<div class="form-group col-md-10">';
// 	html += imageHTML( cs, cs );
	html += '<input type="hidden" class="remove_select_lot_'+lot_row+'" name="lot_ind[]" value="'+lot_row+'">';
	html += '<div id="tr_lot_'+imageCount+'" class="col-md-12 imageRow_'+lot_row+' column_image_size_'+lot_row+' " >';
	html += '<div class="center">';
	html += '<label class="hide">Image '+count+':</label>';
	html += '</div>';
	html += '<div class="image wd100" style="padding:3px;" align="center"><img src="'+asset_url+'images/admin/no_image.jpg" width="100%" height="200" id="imageRemoveBtnLotImg_'+imageCount+'" class="image" style="margin-bottom:0px;padding:0px;" /><br />';
	html += '<input type="file" name="lot_file_'+imageCount+'" id="lot_file_'+imageCount+'" onchange="readURLCommon(this, \'imageRemoveBtnLotImg_'+imageCount+'\', \'lot_hidden_'+imageCount+'\');" style="display: none;">';
	html += '<input type="hidden" value="" name="lot_hidden_'+imageCount+'" id="lot_hidden_'+imageCount+'" />';
	html += '<div align="center"><small><a onclick="$(\'#lot_file_'+imageCount+'\').trigger(\'click\');">Browse</a>&nbsp;|&nbsp;<a style="clear:both;" onclick="clear_image(\'imageRemoveBtnLotImg_'+imageCount+'\');">Clear</a></small></div>';
	html += '</div></td>';//<div align="center"><span style="color: brown;" class="small_text">Upload Size: 360 X 188</span></div>
	html += '<div class="row text-center"><span>OR</span></div>';
	html += '<div><div class="form-group"><input type="text" name="video_link_'+imageCount+'" class="form-control border-input" placeholder="Video link here"></div></div>';
	html += '<div class="center"><a onclick="lotRemove('+imageCount+')" class="button" style="display:inline-flex"><img src="'+asset_url+'images/admin/delete.png" />&nbsp;Remove</a></div>';
	html += '</div>';
	html += '</div>';
	imageCount++;
	$( html ).insertAfter( $(".multiple-row" ).last() );
}
</script>