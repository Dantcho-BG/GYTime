
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header">User Navigation Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo $navbar_class_active_home; ?>"><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="<?php echo $navbar_class_active_clock; ?>"><a href="clock_page.php"><i class="fa fa-clock-o"></i> <span>Clock Page</span></a></li>
            <li class="<?php echo $navbar_class_active_section; ?>"><a href="statistics.php"><i class="fa fa-list-alt"></i> <span>Statistics</span></a></li>
			<?php if (isset($_SESSION["user_id"])) {?>
            <li class="<?php echo $navbar_class_active_profile; ?> treeview">
              <a href="#"><i class="fa fa-user "></i> <span>Profile</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li class="<?php echo $navbar_class_active_prev_p; ?>"><a href="profile.php">Preview</a></li>
                <li class="<?php echo $navbar_class_active_p_p_info; ?>"><a href="p_public_info.php">Public Information</a></li>
				<li class="<?php echo $navbar_class_active_pr_p_info; ?>"><a href="p_private_info.php">Private Information</a></li>
              </ul>
            </li>
			<?php } ?>
			<?php
			
				if (isset ($_SESSION["admin"])) {
					if ($_SESSION["admin"] == 1) {
						
						if (isset($_SESSION["user_id"])) {
						
						$user_id == $_SESSION["user_id"];
						
						require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";
						
							$sql = "SELECT admin FROM users WHERE user_id='$user_id'";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
							// output data of each row
								while($row = $result->fetch_assoc()) {
									$is_admin_secure = $row["admin"];
								}
							}
						
						mysqli_close($conn);
						
						}
						
						if (isset($is_admin_secure)) {
						
							if ($is_admin_secure == 1) { ?>
								<li class=""><a href="admin"><i class="fa fa-lock"></i> <span>Admin</span></a></li>
							<?php
							}
						}
					}
				}
			
			?>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
