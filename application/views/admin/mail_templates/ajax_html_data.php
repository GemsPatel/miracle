<input type="hidden" id="hidden_srt" value="<?php echo $srt; ?>" />
<input type="hidden" id="hidden_field" value="<?php echo $field; ?>" /> 
<?php
$a = get_sort_order($this->input->get('s'),$this->input->get('f'),'template_name');
$b = get_sort_order($this->input->get('s'),$this->input->get('f'),'template_key');
$c = get_sort_order($this->input->get('s'),$this->input->get('f'),'template_subject');
$d = get_sort_order($this->input->get('s'),$this->input->get('f'),'template_status');
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
    				  	<th scope="col" class="left" f="template_name" s="<?php echo @$a;?>">Name</th>
                        <th scope="col" class="left" f="template_key" s="<?php echo @$b;?>">Key</th>
                        <th scope="col" class="right" f="template_subject" s="<?php echo @$c;?>">Subject</th>
                        <th scope="col" class="right" f="template_status" s="<?php echo @$d;?>">Status</th>
    					<th scope="col" class="text-center">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php 
    		    	if(count($listArr)):
    					foreach($listArr as $k=>$ar):
    					?>
    						<tr id="<?php echo $ar[$this->cAutoId]?>">
                                <td style="text-align: center;"><?php echo $ar[$this->cAutoId]?></td>
                                <td class="left"><?php echo $ar['template_name']?></td>
                                <td class="left"><?php echo $ar['template_key']?></td>
                                <td class="left"><?php echo $ar['template_subject']?></td>
                                <td class="right">
                                <?php if($ar['template_status'] == 1 )
                                        echo '<a id="ajaxStatusEnabledDisabled" rel="0" data-="'.$ar[$this->cAutoId].'" title="Enabled"><img src="'.asset_url('images/admin/enabled.gif').'" alt="enabled"/></a>';
                                    else
                                        echo '<a id="ajaxStatusEnabledDisabled" rel="1" data-="'.$ar[$this->cAutoId].'" title="Disabled"><img src="'.asset_url('images/admin/disabled.gif').'" alt="disabled"/></a>';
                                ?>
                                </td>
                                <td class="text-center"> 
                                	<?php if($this->per_edit == 0){?>
    									[<a class="" href="<?php echo asset_url('admin/'.$this->controller.'/'.$this->controller.'Form?edit=true&item_id='._en($ar[$this->cAutoId]))?>" style="color: #397c33;">
    										<i class="fas fa-pen col" aria-hidden="true"></i>
    									</a>]
    								<?php }
    								if($this->per_delete == 0){?>
    									[<a id="" onClick="deleteData( <?php echo $ar[$this->cAutoId]?>, '<?php echo $ar['template_name']?> )" style="color: #ea0a0a;">
    										<i class="fas fa-trash delete" aria-hidden="true"></i>
    									</a>]
    								<?php }?> 
                        		</td>
                            </tr>
    					<?php 
    			  		endforeach;
    			   	else:
    				 	echo "<tr class='text-center'><td colspan='6'>No results!</td></tr>";
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