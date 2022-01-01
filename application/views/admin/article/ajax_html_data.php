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
    					$a = get_sort_order($this->input->get('s'),$this->input->get('f'),'article_name');
    					$d = get_sort_order($this->input->get('s'),$this->input->get('f'),'article_key');
    					$b = get_sort_order($this->input->get('s'),$this->input->get('f'),'article_sort_order');
    					$c = get_sort_order($this->input->get('s'),$this->input->get('f'),'article_status');
    				  	?>
    				  	<th scope="col" class="left">No</th>
    				  	<th scope="col" class="left" f="article_name" s="<?php echo @$a;?>">Article Name</th>
                        <th scope="col" class="left" f="article_key" s="<?php echo @$d;?>">Article Key</th>
                        <th scope="col" class="right" f="article_sort_order" s="<?php echo @$b;?>">Sort Order</th>
                        <th scope="col" class="right" f="article_status" s="<?php echo @$c;?>">Status</th>
    					<th scope="col" class="text-center">Action</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php 
    		    	if(count($listArr)):
    					foreach($listArr as $k=>$ar):
    					?>
    						<tr id="<?php echo $ar[$this->cAutoId]?>">
                                <td style="text-align: center;"><input type="checkbox" value="<?php echo $ar[$this->cAutoId]?>" name="selected[]" class="chkbox"></td>
                                <td class="left"><?php echo $ar['article_name']?></td>
                                <td class="left"><?php echo $ar['article_key']?></td>
                                <td class="right sort_order" data-="<?php echo $ar[$this->cAutoId]?>" rel="<?php echo $ar['article_sort_order']?>"><?php echo $ar['article_sort_order']?>
                                </td>	
                                <td class="right">
                                <?php if($ar['article_status']=='0')
                                        echo '<a id="ajaxStatusEnabled" rel="1" data-="'.$ar[$this->cAutoId].'" title="Enabled"><img src="'.asset_url('images/admin/enabled.gif').'" alt="enabled"/></a>';
                                    else
                                        echo '<a id="ajaxStatusEnabled" rel="0" data-="'.$ar[$this->cAutoId].'" title="Disabled"><img src="'.asset_url('images/admin/disabled.gif').'" alt="disabled"/></a>';
                                ?>
                                </td>
                                <td class="text-center"> 
                                	<?php if($this->per_edit == 0){?>
        								[ <a class="" href="<?php echo asset_url( 'admin/'.$this->controller.'/'.$this->controller.'Form?edit=true&item_id='._en($ar[$this->cAutoId]))?>">
        									<i class="fas fa-pen col" aria-hidden="true"></i>
        								</a> ]
    								<?php }
    								
    								if($this->per_delete == 0){?>
        								[ <a class="" onClick="deleteData( <?php echo $ar[$this->cAutoId]?>, '<?php echo $ar['article_name']?>' )" style="color: #ea0a0a;">
        									<i class="fas fa-trash delete" aria-hidden="true"></i>
        								</a> ]
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