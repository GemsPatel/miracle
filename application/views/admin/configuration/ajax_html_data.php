<input type="hidden" id="hidden_srt" value="<?php echo $srt; ?>" />
<input type="hidden" id="hidden_field" value="<?php echo $field; ?>" /> 

<div class="form-title mb20">
	<h4>Results :</h4>
</div>

<div class="padr-0 padl-0">
	<div class="col-md-12 table-responsive">
		<form id="ajax-form" enctype="multipart/form-data" method="post" action="">
    		<table class="table table-sm table_font table_border">
    			<thead class="thead-dark back" align="center">
    				<tr>
    					<?php
    					$a = get_sort_order($this->input->get('s'),$this->input->get('f'),'config_display_name');
    					$b = get_sort_order($this->input->get('s'),$this->input->get('f'),'config_key');
    					$c = get_sort_order($this->input->get('s'),$this->input->get('f'),'modified_date');
    				  	?>
    					<th scope="col" class="left" f="config_display_name" s="<?php echo @$a;?>">Config Name</th>
    					<th scope="col" class="left" f="config_key" s="<?php echo @$b;?>">Key</th>
    					<th scope="col" class="left">Value</th>
    					<th scope="col" class="left" f="modified_date" s="<?php echo @$c;?>">Modified Date</th>
    					<th scope="col" class="text-center">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php 
    		    	if(count($listArr)):
    					foreach($listArr as $k=>$ar):
    					?>
    						<tr id="<?php echo $ar[$this->cAutoId];?>">
    							<td class="left"><?php echo $ar['config_display_name'];?></td>
    							<td class="left"><?php echo $ar['config_key'];?></td>
    							<td class="left"><?php echo $ar['config_value'];?></td>
    							<td class="left"><?php echo formatDate('d m, Y',$ar['modified_date']);?></td>
    							<td class="text-center">
    								<?php if($this->per_edit == 0){?>
    									[<a  href="<?php echo asset_url('admin/'.$this->controller.'/'.$this->controller.'Form?edit=true&item_id='._en($ar[$this->cAutoId]))?>" style="color: #397c33;">
    										<i class="fas fa-pen col" aria-hidden="true"></i>
    									</a>]
    								<?php }
    								if($this->per_delete == 0){?>
    									[<a id="" onClick="deleteData( <?php echo $ar[$this->cAutoId]?>, '<?php echo $ar['config_display_name'];?>' )" style="color: #ea0a0a;">
    										<i class="fas fa-trash delete" aria-hidden="true"></i>
    									</a>]
    								<?php }?>
    							</td>
    						</tr>
    					<?php 
    			  		endforeach;
    			   	else:
    				 	echo "<tr class='text-center'><td colspan='5'>No results!</td></tr>";
    				endif; 
    				?>
    			</tbody>
    		</table>
    		<div class="pagination">
            	<?php $this->load->view('admin/elements/table_footer');?>
            </div>
        </form>
    </div>
</div>