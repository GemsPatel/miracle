<!DOCTYPE HTML>
<html>
    <head>
        <title>Miracle Bahrain</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        
        <link href="<?php echo asset_url('css/admin/bootstrap.css');?>" rel='stylesheet' type='text/css' />
        <link href="<?php echo asset_url('css/admin/style.css?v='.time());?>" rel='stylesheet' type='text/css' />
        <link href="<?php echo asset_url('css/admin/font-awesome.css');?>" rel="stylesheet">
        <link href='<?php echo asset_url('css/admin/SidebarNav.min.css?v='.time());?>' media='all' rel='stylesheet' type='text/css' />
        <link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
        <link href="<?php echo asset_url('css/admin/custom.css?v='.time());?>" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
        
        <script src="<?php echo asset_url('js/admin/jquery-1.11.1.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo asset_url('js/admin/admin.js?v='.time()); ?>"></script>
        
        <style>
            #chartdiv { width: 100%; height: 295px; }
        </style>
        <link href="<?php echo base_url('css/admin/owl.carousel.css');?>" rel="stylesheet">
        <?php $this->load->view('admin/elements/js-variables');?>
    </head>
    <body class="cbp-spmenu-push">
    	<div class="main-content">
			<!--left-fixed -navigation-->
    		<?php $this->load->view('admin/elements/left-side-menu');?>
    		<!--left-fixed -navigation-->
    
    		<!-- header-starts -->
    		<?php $this->load->view('admin/elements/header-menu');?>
    		<!-- //header-ends -->
    		<!-- main content start-->
    		<div id="page-wrapper">
    		<?php $this->load->view('admin/elements/notification-popup'); ?>
    		<?php $this->load->view('admin/elements/notifications'); ?>