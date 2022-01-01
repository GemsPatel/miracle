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
		            	$a = get_sort_order($this->input->get('s'),$this->input->get('f'),'slider_name');
						$b = get_sort_order($this->input->get('s'),$this->input->get('f'),'slider_sort_order');
						$c = get_sort_order($this->input->get('s'),$this->input->get('f'),'slider_status');
					  	?>
    				  	<th scope="col" class="left">No</th>
    				  	<th scope="col" class="left" f="slider_name" s="<?php echo @$a;?>">Slider Name</th>
    				  	<th scope="col" class="center">Slider Image</th>
                        <th scope="col" class="right" f="slider_sort_order" s="<?php echo @$b;?>">Sort Order</th>
                        <th scope="col" class="center" f="slider_status" s="<?php echo @$c;?>">Status</th>
    					<th scope="col" class="center">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php 
    		    	if(count($listArr)):
    					foreach($listArr as $k=>$ar):
    					?>
    						<tr id="<?php echo $ar[$this->cAutoId]?>">
                                <td><?php echo $ar[$this->cAutoId]?></td>
                                <td class="left"><?php echo $ar['slider_name']?></td>
                                <td class="center">
    								<img class="image" src="<?php echo  load_image($ar['slider_image']);?>" width="50" height="35" style="margin-bottom:0px;padding:3px;" />
    							</td>
                                <td class="right sort_order" data-="<?php echo $ar[$this->cAutoId]?>" rel="<?php echo $ar['slider_sort_order']?>"><?php echo $ar['slider_sort_order']?>
                                </td>	
                                <td class="right">
                                <?php if($ar['slider_status'] == 0 )
                                        echo '<a class="ajaxStatusEnabledDisabled" rel="1" data-="'.$ar[$this->cAutoId].'" title="Enabled"><img src="'.asset_url('images/admin/enabled.gif').'" alt="enabled"/></a>';
                                    else
                                        echo '<a class="ajaxStatusEnabledDisabled" rel="0" data-="'.$ar[$this->cAutoId].'" title="Disabled"><img src="'.asset_url('images/admin/disabled.gif').'" alt="disabled"/></a>';
                                ?>
                                </td>
                                <td class="text-center"> 
                                	<?php if($this->per_edit == 0){?>
        								[ <a class="" href="<?php echo asset_url( 'admin/'.$this->controller.'/'.$this->controller.'Form?edit=true&item_id='._en($ar[$this->cAutoId]))?>">
        									<i class="fas fa-pen col" aria-hidden="true"></i>
        								</a> ]
    								<?php }
    								
    								if($this->per_delete == 0){?>
        								[ <a class="" onClick="deleteData( <?php echo $ar[$this->cAutoId]?>, '<?php echo $ar['slider_name']?>' )" style="color: #ea0a0a;">
        									<i class="fas fa-trash delete" aria-hidden="true"></i>
        								</a> ]
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