<?php 
$adminArr = exeQuery( "SELECT * FROM admin_user WHERE admin_user_id = ".(int)$this->session->userdata( 'admin_id' ) );
?>
<div class="sticky-header header-section ">
	<div class="header-left hide">
		<!--toggle button start-->
		<button id="showLeftPush">
			<i class="fa fa-bars"></i>
		</button>
		<!--toggle button end-->
		<div class="profile_details_left hide">
			<!--notifications of menu start -->
			<ul class="nofitications-dropdown">
				<li class="dropdown head-dpdn"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" aria-expanded="false"><i
						class="fa fa-envelope"></i><span class="badge">4</span></a>
					<ul class="dropdown-menu">
						<li>
							<div class="notification_header">
								<h3>You have 3 new messages</h3>
							</div>
						</li>
						<li>
							<a href="#">
								<div class="user_img">
									<img src="<?php echo base_url('images/1.jpg');?>" alt="">
								</div>
								<div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p>
										<span>1 hour ago</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li class="odd">
							<a href="#">
								<div class="user_img">
									<img src="<?php echo base_url('images/4.jpg')?>" alt="">
								</div>
								<div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p>
										<span>1 hour ago</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="user_img">
									<img src="<?php echo base_url('images/3.jpg')?>" alt="">
								</div>
								<div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p>
										<span>1 hour ago</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="user_img">
									<img src="<?php echo base_url('images/2.jpg')?>" alt="">
								</div>
								<div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p>
										<span>1 hour ago</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<div class="notification_bottom">
								<a href="#">See all messages</a>
							</div>
						</li>
					</ul>
				</li>
				<li class="dropdown head-dpdn">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-bell"></i>
						<span class="badge blue">4</span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="notification_header">
								<h3>You have 3 new notification</h3>
							</div>
						</li>
						<li>
							<a href="#">
								<div class="user_img">
									<img src="<?php echo base_url('images/4.jpg')?>" alt="">
								</div>
								<div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p>
										<span>1 hour ago</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li class="odd">
							<a href="#">
								<div class="user_img">
									<img src="<?php echo base_url('images/1.jpg')?>" alt="">
								</div>
								<div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p>
										<span>1 hour ago</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="user_img">
									<img src="<?php echo base_url('images/3.jpg')?>" alt="">
								</div>
								<div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p>
										<span>1 hour ago</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="user_img">
									<img src="<?php echo base_url('images/2.jpg')?>" alt="">
								</div>
								<div class="notification_desc">
									<p>Lorem ipsum dolor amet</p>
									<p>
										<span>1 hour ago</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</a>
						</li>
						<li>
							<div class="notification_bottom">
								<a href="#">See all notifications</a>
							</div>
						</li>
					</ul>
				</li>
				<li class="dropdown head-dpdn">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-tasks"></i>
						<span class="badge blue1">8</span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<div class="notification_header">
								<h3>You have 8 pending task</h3>
							</div>
						</li>
						<li>
							<a href="#">
								<div class="task-info">
									<span class="task-desc">Database update</span><span
										class="percentage">40%</span>
									<div class="clearfix"></div>
								</div>
								<div class="progress progress-striped active">
									<div class="bar yellow" style="width: 40%;"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="task-info">
									<span class="task-desc">Dashboard done</span><span
										class="percentage">90%</span>
									<div class="clearfix"></div>
								</div>
								<div class="progress progress-striped active">
									<div class="bar green" style="width: 90%;"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="task-info">
									<span class="task-desc">Mobile App</span><span
										class="percentage">33%</span>
									<div class="clearfix"></div>
								</div>
								<div class="progress progress-striped active">
									<div class="bar red" style="width: 33%;"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="#">
								<div class="task-info">
									<span class="task-desc">Issues fixed</span><span
										class="percentage">80%</span>
									<div class="clearfix"></div>
								</div>
								<div class="progress progress-striped active">
									<div class="bar  blue" style="width: 80%;"></div>
								</div>
							</a>
						</li>
						<li>
							<div class="notification_bottom">
								<a href="#">See all pending tasks</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<!--notification menu end -->
		<div class="clearfix"></div>
	</div>
	<div class="header-right">
		<!--search-box-->
		<div class="search-box hide">
			<form class="input">
				<input class="sb-search-input input__field--madoka" placeholder="Search..." type="search" id="input-31" /> 
					<label class="input__label" for="input-31"> 
						<svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77" preserveAspectRatio="none">
						<path d="m0,0l404,0l0,77l-404,0l0,-77z" />
					</svg>
				</label>
			</form>
		</div>
		<!--//end-search-box-->

		<div class="profile_details">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<div class="profile_img">
							<span class="prfil-img">
								<img src="<?php echo load_image( $adminArr['admin_profile_image'] );?>" width="50px" height="50px" alt="<?php echo $adminArr['admin_user_firstname']." ".$adminArr['admin_user_lastname']?>"> 
							</span>
							<div class="user-name">
								<p><?php echo $adminArr['admin_user_firstname']." ".$adminArr['admin_user_lastname']?></p>
								<span><?php echo getField( "admin_user_group_name", "admin_user_group", "admin_user_group_id", $adminArr['admin_user_group_id'] );?></span>
							</div>
							<i class="fa fa-angle-down lnr"></i> 
							<i class="fa fa-angle-up lnr"></i>
							<div class="clearfix"></div>
						</div>
					</a>
					<ul class="dropdown-menu drp-mnu">
						<li><a href="<?php echo asset_url('admin/admin_user/adminUserForm?edit=true&item_id='._en( $adminArr['admin_user_id'] ) )?>"><i class="fa fa-user"></i> My Account</a></li>
						<li class="hide"><a href="<?php echo asset_url('admin/admin_user/adminUserForm?edit=true&item_id='._en( $adminArr['admin_user_id'] ) )?>"><i class="fa fa-suitcase"></i> Profile</a></li>
						<li><a href="<?php echo asset_url('admin/lgs/logout');?>"><i class="fa fa-lock"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>