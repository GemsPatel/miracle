<input type="hidden" id="hidden_srt" value="<?php echo $srt; ?>" />
<input type="hidden" id="hidden_field" value="<?php echo $field; ?>" /> 
<?php
$a = get_sort_order($this->input->get('s'),$this->input->get('f'),'am_icon');
$b = get_sort_order($this->input->get('s'),$this->input->get('f'),'am_name');
$c = get_sort_order($this->input->get('s'),$this->input->get('f'),'am_class_name');
$d = get_sort_order($this->input->get('s'),$this->input->get('f'),'am_sort_order');
$e = get_sort_order($this->input->get('s'),$this->input->get('f'),'am_status');
$f = get_sort_order($this->input->get('s'),$this->input->get('f'),'am_title');
?>
<div class="form-title mb20">
	<h4>Results :</h4>
</div>
<div class="padr-0 padl-0">
	<div class="col-md-12 table-responsive">
		<form id="ajax-form" enctype="multipart/form-data" method="post" action="">
    		<table class="table table-sm table_font table_border">
    			<thead class="thead-dark back text-center">
    				<tr>
    					<th scope="col" class="left">No</th>
    				  	<th scope="col" class="left" f="am_icon" s="<?php echo @$a;?>">Icon</th>
    					<th scope="col" class="left" f="am_name" s="<?php echo @$b;?>">Name</th>
    					<th scope="col" class="left" f="am_name" s="<?php echo @$f;?>">Title</th>
    					<th scope="col" class="left" f="am_class_name" s="<?php echo @$c;?>">Class Name</th>
    					<th scope="col" class="left" f="am_sort_order" s="<?php echo @$d;?>">Sort Order</th>
    					<th scope="col" class="left" f="am_status" s="<?php echo @$e;?>">Status</th>
    					<th scope="col" class="text-center">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php 
        		  	$extra = "";
        	    	if(count($listArr))
        	    	{
        				foreach($listArr as $k=>$ar)
        				{
        				    menuListing($ar,$this->cAutoId,$this->controller,"<b>",$this->per_edit, $this->per_delete);
        					if($ar['am_parent_id'] == 0)
        					    recursiveSubMenu($ar['admin_menu_id'],$this->cAutoId,$this->controller,null,"&raquo; ",$this->per_edit, $this->per_delete);
        				}
                    }
                    else
        			 	echo "<tr><td class='text-center' colspan='7'>No results!</td></tr>";
        		   ?>
    			</tbody>
    		</table>
    		<div class="pagination">
            	<?php $this->load->view('admin/elements/table_footer');?>
            </div>
        </form>
	</div>
</div>
<?php 
/*
	display one tr on each call
	@param : $ar table row from admin_menu
*/
function menuListing($ar,$cAutoId,$controller,$level,$per_edit, $per_delete)
{
?>
    <tr id="<?php echo $ar[$cAutoId]?>" <?php echo ($ar['am_parent_id'] == 0)?'class="clickable" style="cursor:pointer;" ':' class="clickable menu-'.$ar['am_parent_id'].'" style="cursor:pointer; display:none;"'; ?>>
        <td style="text-align: center;"><input type="checkbox" value="<?php echo $ar[$cAutoId]?>" class="menu-<?php echo $ar['am_parent_id']; ?>" name="selected[]" class="chkbox"></td>
        <td class="center"><i class="<?php echo $ar['am_icon']?>"></i></td>
        <td class="left"><?php echo $level ." ". $ar['am_name']?></td>
        <td class="left"><?php echo $ar['am_title']?></td>
        <td class="left"><?php echo $ar['am_class_name']?></td>
        <td class="right"><?php echo $ar['am_sort_order']?></td>	
        <td class="left">
        <?php if($ar['am_status'] == 0 )
                echo '<a id="ajaxStatusEnabled" rel="1" data-="'.$ar[$cAutoId].'" title="Enabled"><img src="'.asset_url('images/enabled.gif').'" alt="enabled"/></a>';
            else
                echo '<a id="ajaxStatusEnabled" rel="0" data-="'.$ar[$cAutoId].'" title="Disabled"><img src="'.asset_url('images/disabled.gif').'" alt="disabled"/></a>';
        ?>
        </td>
        <td class="text-center"> 
            <?php if( $per_edit == 0 ){?>
				[<a class="" href="<?php echo asset_url('admin/'.$controller.'/'.$controller.'Form?edit=true&item_id='._en($ar[$cAutoId]))?>" style="color: #397c33;">
					<i class="fas fa-pen col" aria-hidden="true"></i>
				</a>]
			<?php }
			if( $per_delete == 0 ){?>
				[<a id="" onClick="deleteData( <?php echo $ar[$cAutoId]?>, '<?php echo $ar['am_name'];?>' )" style="color: #ea0a0a;">
					<i class="fas fa-trash delete" aria-hidden="true"></i>
				</a>]
			<?php }?>
    	</td>
    </tr>
<?php
}

function recursiveSubMenu( $admin_menu_id, $cAutoId, $controller, $result,$level,$per_edit, $per_delete)
{
	if(isset($result) && sizeof($result)>0)
	{
		foreach($result as $key=>$row)
		{
			$cnt = getField("admin_menu_id","admin_menu","am_parent_id",$row['admin_menu_id']);
			menuListing($row,$cAutoId,$controller,((int)$cnt>0?'<b>':'').$level,$per_edit, $per_delete);

			if((int)$cnt>0)
			{
			    recursiveSubMenu( $row['admin_menu_id'], $cAutoId, $controller, null, $level."&raquo; ", $per_edit, $per_delete);
			}
		}
	}
	else
	{
		$result = executeQuery("SELECT * FROM admin_menu WHERE am_parent_id=".$admin_menu_id." ORDER BY am_sort_order");
		if(!empty($result))
		    recursiveSubMenu( $admin_menu_id, $cAutoId, $controller, $result, $level, $per_edit, $per_delete);
	}
}
?>
<script>
    $(".clickable").click(function(e) {
    	$(this).nextAll('.menu-'+$(this).attr('id')).toggle();
    });
    
    // Select child when parent selected
    $("input[name=selected\\[\\]]").change(function()
    {
    	var id= $(this).parent().parent().attr('id');
       if($(this).is(":checked"))
       {
    	   	$('.menu-'+id).prop('checked', true);
    		$('.menu-'+id).parent().parent().each(function(){
    			$('.menu-'+$(this).attr('id')).prop('checked', true);
    		});
       }
       else
       {
    	   	$('.menu-'+id).prop('checked', false);
    		$('.menu-'+id).parent().parent().each(function(){
    			$('.menu-'+$(this).attr('id')).prop('checked', false);
    		});
       }
    });
</script>