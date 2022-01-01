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
    					$a = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_user_firstname');
    					$b = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_user_lastname');
    					$c = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_user_emailid');
    					$d = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_user_group_name');
    					$e = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_user_status');
    					$f = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_user_created_date');
    					$g = get_sort_order($this->input->get('s'),$this->input->get('f'),'manufacturer_id');
    					$h = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_xmpp_id');
    					$i = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_can_chat');
    					$j = get_sort_order($this->input->get('s'),$this->input->get('f'),'admin_chat_priority');
    				  	?>
    				  	<th scope="col" class="left">No</th>
    					<th scope="col" class="left" f="admin_user_firstname" s="<?php echo @$a;?>">First Name</th>
                        <th scope="col" class="left" f="admin_user_lastname" s="<?php echo @$b;?>">Last Name</th>
                        <th scope="col" class="left" f="admin_user_emailid" s="<?php echo @$c;?>">Email Id</th>
                        <th scope="col" class="left" f="admin_user_group_name" s="<?php echo @$d;?>">User Group</th>
                        <th scope="col" class="right" f="admin_user_status" s="<?php echo @$e;?>">Date Added</th>
                        <th scope="col" class="right" f="admin_user_created_date" s="<?php echo @$f;?>">Status</th>
    					<th scope="col" class="right">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php 
    		    	if(count($listArr)):
    					foreach($listArr as $k=>$ar):
    					?>
    						<tr id="<?php echo $ar[$this->cAutoId];?>">
    							<td class="left"><?php echo $ar[$this->cAutoId];?></td>
    							<td class="left"><?php echo $ar['admin_user_firstname'];?></td>
                                <td class="left"><?php echo $ar['admin_user_lastname'];?></td>
                                <td class="left"><?php echo $ar['admin_user_emailid'];?></td>
                                <td class="left"><?php echo getField('admin_user_group_name','admin_user_group','admin_user_group_id',$ar['admin_user_group_id']);?></td>
                                <td class="right"><?php echo formatDate('d m, Y <b>h:i a</b>',$ar['admin_user_created_date']);?></td>
                                <td class="right">
                                <?php if($ar['admin_user_status'] == 0 )
                                        echo '<a id="ajaxStatusEnabled" rel="1" data-="'.$ar[$this->cAutoId].'" title="Enabled"><img src="'.asset_url('images/admin/enabled.gif').'" alt="enabled"/></a>';
                                    else
                                        echo '<a id="ajaxStatusEnabled" rel="0" data-="'.$ar[$this->cAutoId].'" title="Disabled"><img src="'.asset_url('images/admin/disabled.gif').'" alt="disabled"/></a>';
                                ?>
                                </td>
                                <td class="right"> 
                                	<?php if($this->per_edit == 0){?> 
                                		[ <a href="<?php echo site_url('admin/'.$this->controller.'/adminUserForm?edit=true&item_id='._en($ar[$this->cAutoId]))?>" title="Edit">
    										<i class="fas fa-pen col" aria-hidden="true"></i>
    									</a> ]
                            		<?php }
                            		if($this->per_delete == 0){?>
        								[ <a class="" onClick="deleteData( <?php echo $ar[$this->cAutoId]?>, '<?php echo $ar['admin_user_firstname']." ".$ar['admin_user_lastname'];?>' )" style="color: #ea0a0a;">
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