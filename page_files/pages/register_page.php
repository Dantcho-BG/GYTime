<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Register Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-clock-o"></i> GYTime</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

      <?php

      require 'functions'.DIRECTORY_SEPARATOR.'register_form_validation.php';

	  /*if ($successful_registration == 1) {
		header('Location: successful_register.php');
		}*/

      ?>

    <!-- Horizontal Form -->
        <div class="box box-change_color_background">
          <div class="box-header with-border">
            <h3 class="box-title">Register</h3>
			<div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal">
            <div class="box-body">
              <div class="form-group required">
                <label for="first_email3" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo $_POST["first_name"]; } ?>" class="form-control" name="first_name" id="first_name3" placeholder="Type your first name here">
                </div>
              </div>
              <div class="form-group required">
                <label for="last_name3" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo $_POST["last_name"]; } ?>" class="form-control" name="last_name" id="last_name3" placeholder="Type your last name here">
                </div>
              </div>
              <div class="form-group required">
                <label for="username3" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo $_POST["username"]; } ?>" class="form-control" name="username" id="username3" placeholder="Type your username (display name) here">
                </div>
              </div>
              <div class="form-group required">
                <label for="email3" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="email" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo $_POST["email"]; } ?>" class="form-control" name="email" id="email3" placeholder="Type your e-mail here">
                </div>
              </div>
              <div class="form-group required">
                <label for="password3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" id="password3" placeholder="Type your password here">
                </div>
              </div>
              <div class="form-group required">
                <label for="confirm_password3" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password3" placeholder="Type your password here again">
                </div>
              </div>
			  <div class="form-group">
                <label for="gender3" class="col-sm-2 control-label">Gender</label>
				<div class="col-sm-10 btn-group" data-toggle="buttons">
			      <label class="btn btn-primary <?php if (isset ($_POST["gender"])) { if ($_POST["gender"] == "male") { echo 'active'; } } ?>">
				    <input type="radio" id="gender3" name="gender" value="male" autocomplete="off"> Male
				  </label>
				  <label class="btn btn-primary <?php if (isset ($_POST["gender"])) { if ($_POST["gender"] == "female") { echo 'active'; } } ?>">
				    <input type="radio" id="gender3" name="gender" value="female" autocomplete="off"> Female
				  </label>
			    </div>
              </div>
			  <div class="form-group">
                <label for="dob3" class="col-sm-2 control-label">DoB</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {echo $_POST["dob"];} ?>" name="dob" id="dob3">
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <a href="index.php" class="btn btn-danger">Cancel</a>
              <a href="login.php" type="submit" class="btn btn-info">Sign In</a>
              <button type="submit" class="btn btn-success pull-right">Sign Up</button>
            </div><!-- /.box-footer -->
          </form>
        </div><!-- /.box -->
</div><!-- /.content-wrapper -->
