
<?php

//require 'functions'.DIRECTORY_SEPARATOR.'login_form_validation.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Login Page
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-clock-o"></i> GYTime</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

      <?php

      require 'functions'.DIRECTORY_SEPARATOR.'login_form_validation.php';

      ?>

    <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Login</h3>
			<div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal">
            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo $_POST["email"]; } ?>" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                    <label data-toggle="tooltip" data-placement="left" title="Remember me for 30 days">
                      <input name="remember_me" value="1" type="checkbox"> Remember me
                    </label>
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <a href="index.php" class="btn btn-danger">Cancel</a>
              <a href="register.php" class="btn btn-success">Sign Up</a>
              <button type="submit" class="btn btn-info pull-right">Sign In</button>
            </div><!-- /.box-footer -->
          </form>
        </div><!-- /.box -->
</div><!-- /.content-wrapper -->
