<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
	var base_url = "<?php echo asset_url(); ?>";
	var asset_url = "<?php echo asset_url(); ?>";
	var controller = "<?php echo ucfirst($this->router->class); ?>";
	//see UML - An-JGV for more information on below variables
	var is_mobile = <?php echo ($this->session->userdata('lType') == 'PC' ? 'false' : 'true') ?>;
	var is_listing_page = false; 	//for scroll pagination
	var baseDomain = '<?php echo base_domain(); ?>';	//base domain for wamp service
	var sessions_id = '<?php echo $this->session->userdata('sessions_id'); ?>';	//used in setting default wamp connection for front user(Exper...)
	var filter_page = '';
	var root_dir = 'miracle';
	var router_dir = '<?php echo $this->router->directory?>';
	var controller_org = "";
	
	/**
	 * notification variables
	 */
	var type = ""; 
	var message = ""; 
</script>

<!-- Global site tag (gtag.js) - Google Analytics Shree Gurave-->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140140412-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-140140412-1');
</script>