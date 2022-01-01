<input type="hidden" id="hidden_srt" value="<?php echo $srt; ?>" />
<input type="hidden" id="hidden_field" value="<?php echo $field; ?>" /> 

<?php
$a = get_sort_order($this->input->get('s'),$this->input->get('f'),'content_id');
$b = get_sort_order($this->input->get('s'),$this->input->get('f'),'c_name');
$c = get_sort_order($this->input->get('s'),$this->input->get('f'),'c_client');
$d = get_sort_order($this->input->get('s'),$this->input->get('f'),'c_banner');
$e = get_sort_order($this->input->get('s'),$this->input->get('f'),'c_images');
$f = get_sort_order($this->input->get('s'),$this->input->get('f'),'c_explanation');
$h = get_sort_order($this->input->get('s'),$this->input->get('f'),'c_created_date');
$i = get_sort_order($this->input->get('s'),$this->input->get('f'),'c_status');
?>

<div class="form-title mb20">
	<h4>Results :</h4>
</div>

<div class="padr-0 padl-0">
	<div class="col-md-12 table-responsive">
		<form id="ajax-form" enctype="multipart/form-data" method="post" action="">
    		<table class="table table-sm table_font table_border">
    			<thead class="thead-dark back" align="center">
    				<tr>
    					<th scope="col" class="center" f="product_id" s="<?php echo @$a;?>">No</th>
    					<th scope="col" class="left" f="c_name" s="<?php echo @$b;?>">Project Name</th>
    					<th scope="col" class="left" f="c_client" s="<?php echo @$l;?>">Client Name</th>
    					<th scope="col" class="center" f="c_home_image" s="<?php echo @$c;?>">Image</th>
    					<th scope="col" class="center" f="c_banner" s="<?php echo @$c;?>">Banner</th>
    					<th scope="col" class="left" f="c_explanation" s="<?php echo @$e;?>">Project Details</th>
    					<th scope="col" class="left" f="c_created_date" s="<?php echo @$f;?>">Created Date</th>
    					<th scope="col" class="center" f="c_status" s="<?php echo @$g;?>">Status</th>
    					<th scope="col" class="center" style="width: 8%">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php 
    		    	if(count($listArr))
    		    	{
                        $p_qty = $p_qty_sold = $p_amt = $p_cogs = $p_gross_margin = 0;
    					foreach($listArr as $k=>$ar)
    					{
    					?>
    						<tr id="<?php echo $ar[$this->cAutoId];?>">
    							<td class="center"><?php echo $ar[$this->cAutoId];?></td>
    							<td class="left"><?php echo $ar['c_name'];?></td>
    							<td class="left"><?php echo $ar['c_client'];?></td>
    							<td class="center">
    								<img class="image" src="<?php echo  load_image($ar['c_home_image']);?>" width="50" height="35"  style="margin-bottom:0px;padding:3px;" />
    							</td>
    							<td class="center">
    								<img class="image" src="<?php echo  load_image($ar['c_banner']);?>" width="50" height="35"  style="margin-bottom:0px;padding:3px;" />
    							</td>
    							<td class="left"><?php echo $ar['c_explanation'];?></td>
    							<td class="left"><?php echo formatDate( 'd/m/Y', $ar['c_created_date'] );?></td>
    							<td class="center">
									<?php if($ar['c_status'] == 0 )
					                        echo '<a class="ajaxStatusEnabledDisabled" rel="1" data-="'.$ar[$this->cAutoId].'" title="Enabled"><img src="'.asset_url('images/admin/enabled.gif').'" alt="enabled"/></a>';
					                    else
					                        echo '<a class="ajaxStatusEnabledDisabled" rel="0" data-="'.$ar[$this->cAutoId].'" title="Disabled"><img src="'.asset_url('images/admin/disabled.gif').'" alt="disabled"/></a>';
					                ?>
								</td>
    							<td class="center">
    								<?php if($this->per_edit == 0){?>
        								[ <a class="" href="<?php echo asset_url( 'admin/'.$this->controller.'/'.$this->controller.'Form?edit=true&item_id='._en($ar[$this->cAutoId]))?>">
        									<i class="fas fa-pen col" aria-hidden="true"></i>
        								</a> ]
    								<?php }
    								
    								if( false && $this->per_view == 0){?>
        								[ <a class="" href="<?php echo asset_url( 'admin/'.$this->controller.'/'.$this->controller.'Form?view=true&item_id='._en($ar[$this->cAutoId]))?>">
        									<i class="fa fa-eye" aria-hidden="true"></i>
        								</a> ]
    									<br>
    								<?php }
    								
    								if($this->per_delete == 0){?>
        								[ <a class="" onClick="deleteData( <?php echo $ar[$this->cAutoId]?>, '<?php echo $ar['c_name'];?>' )" style="color: #ea0a0a;">
        									<i class="fas fa-trash delete" aria-hidden="true"></i>
        								</a> ]
    								<?php }?>
    							</td>
    						</tr>
    					<?php 
    					}
    		    	} else {
    				 	echo "<tr class='text-center'><td colspan='9'>No results!</td></tr>";
    		    	}
    				?>
    			</tbody>
    		</table>
    		<div class="pagination">
            	<?php $this->load->view('admin/elements/table_footer');?>
            </div>
        </form>
	</div>
</div>