<?php
	require "functions".DIRECTORY_SEPARATOR."p_preview.php";
?>

<!-- DONUT CHART -->
              <div class="box box-change_color_background">
                <div class="box-header with-border">
                  <h3 class="box-title">Profile Information</h3>
				  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
				<div class="box-body">
					<div><b>Username:</b> <?php echo $username; ?></div>
					<div><b>First Name:</b> <?php echo $first_name; ?></div>
					<div><b>Last Name:</b> <?php echo $last_name; ?></div>
					<div><b>E-mail:</b> <?php echo $email; ?> </div>
					<div><b>Gender:</b> <?php echo $gender; ?> </div>
					<div><b>DOB:</b> <?php echo $dob; ?> </div>
				</div>
				<div class="box-footer">
					<a href="change_profile_picture.php">Change your profile picture</a>
				</div>
              </div><!-- /.box -->
