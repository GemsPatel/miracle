<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	<aside class="sidebar-left">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
				</button>
				<h1>
					<a class="navbar-brand" href="<?php echo base_url('admin/dashboard');?>">
						<img style="margin-top: 2px;" src="<?php echo asset_url('images/logo.png')?>" alt="Logo" class="w-100" />
						<span class="dashboard_text hide">Dashboard</span>
					</a>
				</h1>
			</div>
			<?php 
			if( (int)$this->session->userdata( 'admin_id' ) == 1 )
			{
				?>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="sidebar-menu">
						<li class="header text-center">NAVIGATION</li>
						<li class="treeview">
	                        <a href="<?php echo asset_url('admin/content');?>">
	                        	<i class="fa fa-desktop"></i> 
	                        	<span>Dashboard</span>
	                        </a>
	                  	</li>
						<?php
	            		$res = executeQuery("SELECT m.admin_menu_id, m.am_class_name, m.am_title, m.am_parent_id, m.am_name, m.am_icon from admin_menu m WHERE m.am_parent_id=0 AND m.am_status=0 ORDER BY am_sort_order");
	            		$sql = "SELECT admin_menu_id, permission_view FROM permission WHERE admin_user_id=".$this->session->userdata('admin_id')." ";
	            		$per = getDropDownAry( $sql, "admin_menu_id", "permission_view" );
	            		
	            		if(is_array($res) && sizeof($res)>0)
	            		{
	            			foreach($res as $k=>$ar)
	            			{
	            				$href = "";
	            				if(@$ar['am_class_name'] != '')
	            				{
	            					if(array_key_exists($ar['admin_menu_id'],$per))
	            						$href = ($per[$ar['admin_menu_id']] == 0)? ' href="'.asset_url('admin/'.@$ar['am_class_name'].'').'" ':' onClick="return  permissionDenied(\'View\');" class="parent hide"';
	            					else
	            						$href = ' onClick="return permissionDenied(\'View\');" class="parent hide"';
	            				}
	            				?>
	        					<li id="<?php echo strtolower($ar['am_name']); ?>" class="treeview">
	        						<a <?php echo $href; ?> title="<?php echo $ar['am_title'];?>"> 
	        							<i class="<?php echo $ar['am_icon']; ?>"></i> 
	        							<span><?php echo $ar['am_name']; ?></span>
	        						</a>
	        						<?php adminmenuListing($ar['admin_menu_id'],$per);?>
	        					</li>
	            				<?php 
	            			}
	            		}
	                    ?>
					</ul>
				</div>
				<?php 
			}
			else 
			{
				$last = $this->uri->total_segments();
				$segment = $this->uri->segment($last);
				?>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="sidebar-menu">
						<li class="header text-center"></li>
						<li class="treeview <?php echo ( $segment == "content" ) ? 'active' : '';?>">
	                        <a href="<?php echo asset_url('admin/content');?>">
	                        	<i class="fa fa-desktop"></i> 
	                        	<span>Project List</span>
	                        </a>
	                  	</li>
	                  	<li class="treeview <?php echo ( $segment == "contentForm" ) ? 'active' : '';?>">
	                        <a href="<?php echo asset_url('admin/content/contentForm');?>">
	                        	<i class="fa fa-object-group"></i> 
	                        	<span>Add Project</span>
	                        </a>
	                  	</li>
	                  	<li class="treeview <?php echo ( $segment == "content_category" ) ? 'active' : '';?>">
	                        <a href="<?php echo asset_url('admin/content_category');?>">
	                        	<i class="fa fa-list"></i> 
	                        	<span>Add Category</span>
	                        </a>
	                  	</li>
	                  	<li class=" hide treeview <?php echo ( $segment == "slider" ) ? 'active' : '';?>">
	                        <a href="<?php echo asset_url('admin/slider');?>">
	                        	<i class="fa fa-list"></i> 
	                        	<span>Slider</span>
	                        </a>
	                  	</li>
					</ul>
				</div>
				<?php 
			}
			?>
		</nav>
	</aside>
</div>
<?php
function adminmenuListing($menu_primary_id,$per)
{
    $res = executeQuery("SELECT m.admin_menu_id, m.am_class_name, m.am_title, m.am_parent_id, m.am_name, m.am_icon from admin_menu m WHERE m.am_parent_id=".$menu_primary_id." AND m.am_status=0 ORDER BY am_sort_order");
    if(!empty($res))
    {
        foreach($res as $k=>$ar)
        {
            $href = "";
            if(@$ar['am_class_name'] != '')
            {
                if(array_key_exists($ar['admin_menu_id'],$per))
                    $href = ($per[$ar['admin_menu_id']] == 0)? ' href="'.asset_url('admin/'.@$ar['am_class_name'].'').'" ':' onClick="return  permissionDenied(\'View\');" class="parent hide"';
                else
                    $href = ' onClick="return permissionDenied(\'View\');" class="parent hide"';
            }
            
            $cnt = getField("admin_menu_id","admin_menu","am_parent_id",$ar['admin_menu_id']);

            if((int)$cnt>0)
            { ?>
				<ul class="treeview-menu">
    				<li>
    					<a <?php echo $href; ?> title="<?php echo $ar['am_title'];?>">
    						<i class="<?php echo $ar['am_icon']; ?>"></i> 
							<span><?php echo $ar['am_name']; ?></span>
						</a>
						<?php adminmenuListing($ar['admin_menu_id'],$per); ?>
					</li>
				</ul>
    		<?php } else { ?>
                <ul class="treeview-menu">
    				<li>
    					<a <?php echo $href; ?> title="<?php echo $ar['am_title'];?>">
    						<!-- <i class="fa fa-angle-right"></i> -->
    						<i class="<?php echo $ar['am_icon']; ?>"></i> 
							<span><?php echo $ar['am_name']; ?></span>
						</a>
					</li>
				</ul>
    		<?php				
            }
        }
    }
}

?>