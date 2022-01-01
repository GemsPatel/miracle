<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo ( !empty($custom_page_title) ) ? $custom_page_title : "Miracle"; ?></title>
        <base href="<?php echo asset_url();?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php 
		$currentURL = current_url(); //for simple URL
		$params = $_SERVER['QUERY_STRING']; //for parameters
		$fact = "Mirable Bahrain";
		$image = asset_url('images/favicon.png');
		?>
		<link rel="canonical" href="<?php echo asset_url( $_SERVER['REQUEST_URI'] );?>" >
		<meta property="og:url"           content="<?php echo asset_url( $_SERVER['REQUEST_URI'] );?>" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="<?php echo $fact ?>" />
		<meta property="og:description"   content="" />
		<meta property="og:image"         content="<?php echo $image; ?>" />
  
  		<meta name="keywords" content="<?php echo $fact ?>" />
		<meta name="robots" content="Index, Follow" />
		<meta name="author" content="Mirable Bahrain" />
		<meta name="copyright" content="Copyright (c) 2019" />
		<meta name="generator" content="info@miracle.online" />
		
		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo asset_url('images/favicon.png')?>">
		
		<!-- Google Fonts
		============================================ -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link href="<?php echo asset_url('css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        
		<!-- font-awesome CSS
		============================================ -->
        <link rel="stylesheet" href="<?php echo asset_url('css/fontawesome-all.min.css')?>">
		
		<!-- Custom CSS
		============================================ -->
        <link rel="stylesheet" href="<?php echo asset_url('css/style.css?v='.time())?>">
        
		<?php $this->load->view('elements/js-variables');  ?>
    
		<noscript> <!-- Show a notification if the user has disabled javascript -->
			<div class="notification error png_bg">
				<div>
					Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser" rel="nofollow,noindex">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser" rel="nofollow,noindex">enable</a> Javascript to navigate the interface properly.
				</div>
			</div>
		</noscript>
		
		<!-- google + link -->
		<!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->
		
	</head>
    <body class="home-2">
    	<div id="miracle">

	    	<!--NAVBAR-->
	    	<?php $this->load->view('elements/header-menu');?>
    		<!--NAVBAR-->