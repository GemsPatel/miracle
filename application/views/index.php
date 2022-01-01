<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?php echo asset_url( 'images/favicon.png?v='.time() );?>" type="image/x-icon">
		<title>Free GST Billing</title>

		<script type="text/javascript" src="<?php echo asset_url('js/jquery.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/bootstrap.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/timer.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset_url('js/script.js');?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url('css/bootstrap.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url('css/bootstrap.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url('css/font-awesome.min.css');?>">
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="<?php echo asset_url('css/custom.css');?>">
	</head>

	<body onload="countdown(year,month,day,hour,minute)">
		<!-- Carousel -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		        <li data-target="#myCarousel" data-slide-to="1" ></li>
		        <li data-target="#myCarousel" data-slide-to="2"></li>
		        <li data-target="#myCarousel" data-slide-to="3"></li>
		        <li data-target="#myCarousel" data-slide-to="4"></li>
		    </ol>
		    <div class="carousel-inner">
		    	<div class="container timer">
		    		<div id="home" class="logo text-center">
		    			<img alt="Free GST Bills" src="<?php echo asset_url( 'images/logo.png?v='.time() );?>" width="22%">
		   			</div>
			    	<div class="row timer-circle">
			    		<div class="main-text text-center">
			    			<h2 class="top-text hide">Write Slogan Here</h2>
			    			<h2 class="sub-text">Coming Soon</h2>
			    		</div>
			    		<div class="text-center">
							<div class="numbers" id="count2"></div>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
							<div class="circle text-center">
								<div class="row" id="spacer1">
									<div class="title"></div>
									<div class="numbers" id="dday"></div>
								</div>
								<div class="row" id="spacer2">
									<div class="title"></div>
									<div class="title" id="days">Day</div>
								</div>
							</div>
							<div class="circle text-center">
								<div class="row" id="spacer1">
									<div class="title"></div>
									<div class="numbers" id="dhour"></div>
								</div>
								<div class="row" id="spacer2">
									<div class="title"></div>
									<div class="title" id="hours">Hr</div>
								</div>
							</div>
							<div class="circle text-center">
								<div class="row" id="spacer1">
									<div class="title"></div>
									<div class="numbers" id="dmin"></div>
								</div>
								<div class="row" id="spacer2">
									<div class="title"></div>
									<div class="title" id="minutes">Min</div>
								</div>
							</div>
							<div class="circle text-center">
								<div class="row" id="spacer1">
									<div class="title"></div>
									<div class="numbers" id="dsec"></div>
								</div>
								<div class="row" id="spacer2">
									<div class="title"></div>
									<div class="title" id="seconds">Sec</div>
								</div>
							</div>
						</div><!-- end of clock -->
			    	</div><!-- end of timer-circle -->
		    	</div><!-- end of timer -->
			    	
		        <div class="item active">
		        	<img src="images/annuity-promo6.jpg" alt="First slide">
		        	
					<div class="carousel-caption caption hide">
						<h1>Gst is and great idea Which decrease the pollution on Earth With Corruption and through unnecessary Black Marketing <br><b>- Jp shah</b></h1>
					</div>
		        </div><!-- end of first item -->
		        <div class="item">
		          	<img src="images/time-and-money.jpg" alt="Second slide">
		          	
					<div class="carousel-caption caption hide">
						<h1>Both the Parliamentary Affairs Minister and myself have discussed the GST with every senior Congress leader in Parliament. <br><b>- Finance Minister Arun Jaitley</b></h1>
					</div>
		        </div><!-- end of second item -->
		        <div class="item">
			        <img src="images/time-is-money-clock-time.jpg" alt="Third slide">
			        
					<div class="carousel-caption caption hide">
						<h1>Just to save 1 percent, some customers were earlier buying gold without receipts. With the 3-percent GST, now many more will be tempted to make unofficial purchases from small jewelers. <br><b>- Harshad Ajmera</b></h1>
					</div>        
		        </div><!-- end of third item -->
		        <div class="item">
			        <img src="images/login-background-man.jpg" alt="Forth slide">
			        
					<div class="carousel-caption caption hide">
						<h1>Parliament needs to pass an important bill like the GST. Instead of disrupting the house, they should cooperate. <br><b>- Babul Supriyo</b></h1>
					</div>        
		        </div><!-- end of forth item -->
		        <div class="item">
			        <img src="images/login-background.jpg" alt="Fifth slide">
			        
					<div class="carousel-caption caption hide">
						<h1>The GST rate has increased the incentive to bring in smuggled gold. The government should reduce import duty and make smuggling unviable. <br><b>- Aditya Pethe</b></h1>
					</div>        
		        </div><!-- end of fifth item -->
		    </div>
		</div><!-- end of carousel -->

		<div class="body-content">
			<!-- subscribe -->
			<div class="container subscribe">
				<div class="row text-center">
					<div class="col-lg-6 col-lg-offset-3 subscribe-text">
						<h3 class="text-center">Subscribe us</h3>
						<hr class="full">
	                	<p>Welcome to our world of technology</p>
	                	<br/>
					</div>
				</div>
			</div><!-- end of subscribe -->
			<div class="container after-slide">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2 col-sm-12 col-xs-12 text-center">
						<p class="after-slide-text">Our website is under construction. We`ll be here soon with our new site.</p>
					</div>
				</div>
				<div class="subscribe-form" >
					<form id="newsletter_subscriber">
    					<div class="row">
    						<div class="input-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 text-center form">
    						  	<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
    						  	<input class="form-control" type="text" name="newsletter_email" id="newsletter_email" placeholder="Email address" >
    						</div>
    						<div class="input-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 text-center" style="margin-top: -15px; margin-bottom: 5px;">
    						  	<span class="newsletter_email"></span>
						  	</div>
    						<div class="input-group col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 text-center form hide">
    						  	<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
    						  	<input class="form-control" type="password" name="" placeholder="Password">
    						</div>
    						<div class="input-group margin-bottom-sm col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 text-center">
    							<button type="button" class="btn btn-info" id="subscriber">Subscribe</button>
    						</div>
    					</div>
					</form>
					<script>
						$("#subscriber").click( function()
						{
							var base_url = "<?php echo base_url(); ?>";
							form_data = $("#newsletter_subscriber").serialize();

							var loc = base_url+'home/newsletter';
							$.post(loc, form_data, function (data) {
								var arr = $.parseJSON(data);
								console.log( arr );
								if(arr['type'] == "error")
								{
									$( '.newsletter_email' ).text( arr['newsletter_email'] ).css( "color", "red" );
									$( '#newsletter_email' ).css( "border", "1px solid red" );
								}
								else
								{
									$( '.newsletter_email' ).text( "Email Send Successfully" ).css( "color", "green" );
									$( '#newsletter_email' ).css( "border", "1px solid green" );
								}
							});
						} )
					</script>
				</div>
			</div><!-- end of after slide part -->

	        <!-- share part -->
	      	<div class="container share">
				<div class="row text-center">
					<div class="col-lg-6 col-lg-offset-3 share-text">
						<h3 class="text-center">Stay Connected</h3>
						<hr class="full">
	                	<p>We want to connect people like you.</p>
	                	<br/>
					</div>
				</div>
			</div>
			<div class="container share-icons text-center">
				<div class="row text-center">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<ul class="socials-icons col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<li>
								<a href="#" data-toggle="tooltip" title="Share in Facebook" class="facebook"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="#" data-toggle="tooltip" title="Share in Twitter" class="twitter"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="#" data-toggle="tooltip" title="Share in Google +" class="google-plus"><i class="fa fa-google-plus"></i></a>
							</li>
							<li>
								<a href="<?php echo asset_url('admin/lgs');?>" data-toggle="tooltip" title="Login to registered user" class="universal-access"><i class="fa fa-male"></i></a>
							</li>
							<li>
								<a href="#" data-toggle="tooltip" title="Share in Instagram" class="instagram"><i class="fa fa-instagram"></i></a>
							</li>
							<li>
								<a href="#" data-toggle="tooltip" title="Share in Pinterest" class="pinterest"><i class="fa fa-pinterest"></i></a>
							</li>
							<li>
								<a href="#" data-toggle="tooltip" title="Connect with Skype" class="skype"><i class="fa fa-skype"></i></a>
							</li>
						</ul> 
					</div>
				</div>
			</div><!-- end of share part -->
	    </div><!-- end of body content -->
		<!-- footer -->
		<style>
		  .footer_font_family { font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important; }
		  .footer_font_family h1 { font-size: 42px !important; }
		  .mt21 { margin: 21px 0px;}
		</style>
		<div class="wrapper footer">
			<div class="container">
				<div class="row text-center footer_font_family">
					<div class="name col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center mt5">
						<img alt="Free GST Bills" src="<?php echo asset_url( 'images/footer_logo_white.png?v='.time() );?>" width="45%">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 text-center">
						<div class="copyright">
							&copy; Copyright <?php echo date('Y');?> Theme Sixty13.
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" id="back-top">
						<p class="pull-right"><a href="#home"><span></span>Top</a></p>	
					</div>	
				</div><!-- row -->
			</div>
		</div><!--end of footer -->
	</body>
</html>