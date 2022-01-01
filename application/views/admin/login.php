<?php $controller = $this->router->class; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<script type="text/javascript" src="<?php echo asset_url('js/admin/jquery-1.11.1.min.js'); ?>"></script>
		<script type="text/javascript">
			var base_url = "<?php echo base_url(); ?>";
			var controller = "<?php echo ucfirst(@$controller); ?>";
		</script>
		<title>Administrator Login</title>
		
		<link href="<?php echo asset_url('css/admin/admin_login_style.css?v=0.1'); ?>" rel="stylesheet" type="text/css" />
		<style>
			.forgot_pass
			{
				text-decoration: none;
			    font-size: 16px;
			    color: wheat;
			}
			.notification div {
			    display: block;
			    font-style: normal;
			    padding: 10px 10px 10px 36px;
			    line-height: 1.5em;
			    background-color: #fb89a6;
			    font-size: 12px;
			    color: #fff;
			}
		</style>
	</head>
	<body>
		<div class="cont" id="box_bg">
			<div class="demo" id="content">
				<div class="login" id="login">
					<div class="login__check"></div>
					<?php $this->load->view('admin/elements/notifications'); ?>
					<form method="post">
						<div class="login__form">
							<div class="login__row">
								<svg class="login__icon name svg-icon" viewBox="0 0 20 20">
									<path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
								</svg>
								<input type="text" value="<?php echo ( set_value('admin_user_emailid') ) ? set_value('admin_user_emailid') : "demo@gmail.com"; ?>" name="admin_user_emailid" class="login__input name" placeholder="Email ID" autofocus/>
							</div>
							<div class="login__row">
								<svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
									<path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
								</svg>
								<input type="password" name="admin_user_password" class="login__input pass" placeholder="Password" value="123456"/>
							</div>
							<button type="submit" name="admin_login" class="login__submit">Sign in</button>
							<br></br>
							<a href="<?php echo site_url('admin/lgs/forgotPassword'); ?>" class="forgot_pass" style="display: none;">Forgot Your Password?</a>
							<!-- <p class="login__signup">Don't have an account? &nbsp;<a>Sign up</a></p> -->
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<script type="text/javascript" src="<?php echo asset_url('js/admin/admin.js'); ?>"></script>
	</body>
</html>