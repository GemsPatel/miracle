<script type="text/javascript">
	var tab = 110;
	function addMultipleLot( isInc )
	{
		var tabindexd = parseInt(tab) + parseInt(lot_row) + 0.5;
		var tabindexq = parseInt(tab) + parseInt(lot_row) + 1;
		
		var qlbl = $('#input_qty_lbl').val();

		html = '<input type="hidden" class="remove_select_lot" name="lot_ind[]" value="'+lot_row+'">';
		html += '<div id="tr_lot_'+lot_row+'" class="col-md-12 column dp-row sub-table remove_select_lot">';
		html += '<div class="center">';
		html += '<label>Image '+( image_number + 1 )+':</label>';
		html += '</div>';
		html += '<div class="image wd100" style="padding:3px;" align="center"><img src="'+asset_url+'images/admin/no_image.jpg" width="100%" height="200" id="imageRemoveBtnLotImg_'+lot_row+'" class="image" style="margin-bottom:0px;padding:0px;" /><br />';
		html += '<input type="file" name="lot_file_'+lot_row+'" id="lot_file_'+lot_row+'" onchange="readURLCommon(this, \'imageRemoveBtnLotImg_'+lot_row+'\', \'lot_hidden_'+lot_row+'\');" style="display: none;">';
		html += '<input type="hidden" value="" name="lot_hidden_'+lot_row+'" id="lot_hidden_'+lot_row+'" />';
		html += '<div align="center"><small><a onclick="$(\'#lot_file_'+lot_row+'\').trigger(\'click\');">Browse</a>&nbsp;|&nbsp;<a style="clear:both;" onclick="clear_image(\'imageRemoveBtnLotImg_'+lot_row+'\');">Clear</a></small></div>';
		html += '<div align="center"><span style="color: brown;" class="small_text">Upload Size: 360 X 188</span></div></div></td>';
		html += '<div class="row text-center"><span>OR</span></div>';
		html += '<div><div class="form-group"><input type="text" name="video_link_'+lot_row+'" class="form-control border-input" placeholder="Video link here"></div></div>';
		html += '<div class="center"><a onclick="lotRemove('+lot_row+')" class="button" style="display:inline-flex"><img src="'+asset_url+'images/admin/delete.png" />&nbsp;Remove</a></div>';
		
		jQuery( html ).insertAfter(jQuery(".dp-row.sub-table").last());
		
// 		jQuery( html ).insertAfter('#tr_lot_'+( lot_row - 1));

		if( isInc )
		{
			lot_row++;
			image_number++;

			changeColSize();
		}
	}
	
	function lotRemove(val)
	{
		$('#tr_lot_'+val).remove();
	}

	$("#column_size").on( "change", function(){

		$(".remove_select_lot").remove();
		
		var select = this.value;

		lot_row = editImageCount;
		image_number = editImageCount;
		for( i=image_number;i<select;i++ )
		{
			addMultipleLot( false );
			lot_row++;
			image_number++;
		}

		changeColSize();
	});

	function changeColSize()
	{
		var column = $('select#column_size option:selected').val();

		if( column == 1 )
			col_size = "col-md-12";
		if( column == 2 )
			col_size = "col-md-6";
		if( column == 4 )
			col_size = "col-md-3";

		$(".column").removeClass( "col-md-12 col-md-6 col-md-3" ).addClass( col_size );
	}
</script>
