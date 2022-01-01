<input type="hidden" id="hidden_srt" value="<?php echo $srt; ?>" />
<input type="hidden" id="hidden_field" value="<?php echo $field; ?>" /> 

<div class="form-title mb20">
	<h4>Results :</h4>
</div>
<div class="padr-0 padl-0">
	<div class="col-md-12 table-responsive">
		<form id="ajax-form" enctype="multipart/form-data" method="post" action="">
    		<table class="table table-sm table_font table_border">
    			<thead class="thead-dark back text-center">
    				<tr>
    					<?php
    					$a = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_user_group_name');
    					$b = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_user_group_key');
    				  	?>
    				  	<th scope="col" class="left">No</th>
    				  	<th scope="col" class="left" f="admin_user_group_name" s="<?php echo @$a;?>">Name</th>
                  		<th scope="col" class="left" f="admin_user_group_key" s="<?php echo @$b;?>">Key</th>
    					<th scope="col" class="text-center">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php 
    		    	if(count($listArr)):
    					foreach($listArr as $k=>$ar):
    					?>
    						<tr id="<?php echo $ar[$this->cAutoId];?>">
    							<td class="left"><?php echo $ar[$this->cAutoId];?></td>
    							<td class="left"><?php echo $ar['admin_user_group_name'];?></td>
    							<td class="left"><?php echo $ar['admin_user_group_key'];?></td>
    							<td class="text-center"> 
    								<?php if($this->per_edit == 0){?>
    									[ <a href="<?php echo site_url('admin/'.$this->controller.'/adminUserGroupForm?edit=true&item_id='._en($ar[$this->cAutoId]))?>" title="Edit">
    										<i class="fas fa-pen col" aria-hidden="true"></i>
    									</a> ] 
    								<?php }
        								
    								if($this->per_delete == 0){?>
        								[ <a class="" onClick="deleteData( <?php echo $ar[$this->cAutoId]?>, '<?php echo $ar['admin_user_group_name'];?>' )" style="color: #ea0a0a;">
        									<i class="fas fa-trash delete" aria-hidden="true"></i>
        								</a> ]
    								<?php }?> 
    							</td>
    						</tr>
    					<?php 
    			  		endforeach;
    			   	else:
    				 	echo "<tr class='text-center'><td colspan='8'>No results!</td></tr>";
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