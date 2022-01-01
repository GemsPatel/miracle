<input type="hidden" id="hidden_srt" value="<?php echo $srt; ?>" />
<input type="hidden" id="hidden_field" value="<?php echo $field; ?>" />
<?php
$a = get_sort_order($this->input->get('s'),$this->input->get('f'),'error_code');
$b = get_sort_order($this->input->get('s'),$this->input->get('f'),'error_message');
$c = get_sort_order($this->input->get('s'),$this->input->get('f'),'modified_date');
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
    					<th scope="col" class="left" f="error_code" s="<?php echo @$a;?>">Error Code</th>
                        <th scope="col" class="left" f="error_message" s="<?php echo @$b;?>">Message</th>
                        <th scope="col" class="left" f="modified_date" s="<?php echo @$c;?>">Modified Date</th>
                        <td scope="col" class="right">Action</td>
    				</tr>
    			</thead>
    			<tbody>
    				<?php 
                    if(count($listArr)):
                    	foreach($listArr as $k=>$ar):
                            ?>
                            <tr id="<?php echo $ar[$this->cAutoId];?>">
                            <td class="left"><?php echo $ar['error_code'];?></td>
                            <td class="left"><?php echo $ar['error_message'];?></td>
                            <td class="left"><?php echo formatDate('d m, Y <b>h:i a</b>',$ar['modified_date']);?></td>
                            <td class="text-center">
								<?php if($this->per_edit == 0){?>
    								[ <a class="" href="<?php echo asset_url( 'admin/'.$this->controller.'/'.$this->controller.'Form?edit=true&item_id='._en($ar[$this->cAutoId]))?>">
    									<i class="fas fa-pen col" aria-hidden="true"></i>
    								</a> ]
								<?php }
								
								if($this->per_delete == 0){?>
    								[ <a class="" onClick="deleteData( <?php echo $ar[$this->cAutoId]?>, '<?php echo $ar['error_message'];?>' )" style="color: #ea0a0a;">
    									<i class="fas fa-trash delete" aria-hidden="true"></i>
    								</a> ]
								<?php }?>
							</td>
                            </tr>
                            <?php 
                    	endforeach;
                    else:
                     	echo "<tr><td class='center' colspan='5'>No results!</td></tr>";
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