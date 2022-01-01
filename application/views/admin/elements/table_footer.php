<?php 
$dateFilter = array( 'content' );//pass controller name to display date filter in every datepicker pages.

if(in_array($this->router->class, $dateFilter)):
?>
<script language="javascript">
$(function() {
	if($( "#from" ).size()){
		// DATEPICKER FOR FILTER
		$( "#from" ).datepicker({
		  changeMonth: true,
   	  	  dateFormat : 'dd/mm/yy',
		  maxDate: "d",
		  numberOfMonths: 2,
		  onClose: function( selectedDate ) {
			  if(selectedDate != '')
				$( "#to" ).datepicker( "option", "minDate", selectedDate );
		  }
		});
	}
	
	if($( "#to" ).size()){
		// DATEPICKER FOR FILTER
		$( "#to" ).datepicker({
		  defaultDate: "+1w",
		  dateFormat : 'dd/mm/yy',
		  changeMonth: true,
		  numberOfMonths: 2,
		  maxDate: "d",
		  onClose: function( selectedDate ) {
			  if(selectedDate != '')
				$( "#from" ).datepicker( "option", "maxDate", selectedDate );
		  }
		});
	}

	if($( ".datepicker" ).size()){
		// DATEPICKER FOR FILTER
		$( ".datepicker" ).datepicker({
		  changeMonth: true,
   	  	  dateFormat : 'dd/mm/yy',
		  maxDate: "d",
		  numberOfMonths: 2
		});
	}

	<?php if($this->input->get('fromDate')){ ?>
			  $( "#to" ).datepicker( "option", "minDate", '<?php echo $this->input->get('fromDate'); ?>' );
	<?php };?>

	<?php if($this->input->get('toDate')){ ?>
			  $( "#from" ).datepicker( "option", "maxDate", '<?php echo $this->input->get('toDate'); ?>');
	<?php };?>

});
</script>
<?php endif;?>

<!-- pagination link -->
<?php if($links){ ?>
<div class="links"><?php echo $links;?></div>
<div class="results"><?php echo form_dropdown('perPage',$per_page_drop,set_value('perPage',@$this->session->userdata('perPage')),'class="perPageDropdown" onchange="perPageManage(this)"'); ?></div>
<?php }?>
<!-- End pagination link -->