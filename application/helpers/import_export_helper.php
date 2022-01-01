<?php
/**
 * @package ieh_ 
 * @author Gautam Kakadiya
 * @version 2.1.1
 * @Cloudwebs - all right reserved
 * import export helper function
 */

/**
 * @Cloudwebs - all right reserved
 */
	function ieh_successMsg($msg)
	{
		echo '<p><img src="'.load_image("images/admin/enabled.gif").'">&nbsp;&nbsp; '.$msg.'</p><br>'; 
	}

/**
 * @Cloudwebs - all right reserved
 */
	function ieh_warningMsg($msg)
	{
		echo '<p><img src="'.load_image("images/admin/attention.png").'">&nbsp;&nbsp; '.$msg.'</p><br>';
	}
	
/**
 * @Cloudwebs - all right reserved
 */
	function ieh_errorMsg($msg)
	{
		echo '<p><img src="'.load_image("images/admin/disabled.gif").'">&nbsp;&nbsp; '.$msg.'</p><br>';
	}

	function ieh_doneButton( $controller )
	{
	    echo '<button class="button button-gray mb15"><a class="btn btn-secondary" id="done" href="'.site_url('admin/'.$controller).'" ><img src="'.load_image('images/admin/enabled.gif').'" alt="enabled"> Done</a></button><br>';
	}
	
/**
 * @Cloudwebs - all right reserved
 */
	function ieh_hideLoader( $controller )
	{
		ieh_doneButton( $controller );
		echo '<script type="text/javascript">
				jQuery("#import_process_loader").hide();
			  </script>';
	}

/**
 * @Cloudwebs - all right reserved
 */
	function ieh_product_mag_exp_ext_xml_ToArr( $rowArr, $j )
	{}
?>