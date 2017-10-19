<?php

require "functions".DIRECTORY_SEPARATOR."function_public_p_info.php";

?>
		
		<div class="box box-change_color_background">
          <div class="box-header with-border">
            <h3 class="box-title">Change Your Public Information</h3>
			<div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div><!-- /.box-header -->
          <!-- form start -->
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal">
            <div class="box-body">
              <div class="form-group">
                <label for="new_first_name3" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="new_first_name" id="new_first_name3">
                </div>
              </div>
              <div class="form-group">
                <label for="new_last_name3" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="new_last_name" id="new_last_name3">
                </div>
              </div>
			  <div class="form-group">
                <label for="new_gender3" class="col-sm-2 control-label">Gender</label>
				<div class="col-sm-10 btn-group" data-toggle="buttons">
			      <label class="btn btn-primary <?php if (isset ($_POST["gender"])) { if ($_POST["gender"] == "male") { echo 'active'; } } ?>">
				    <input type="radio" id="new_gender3" name="new_gender" value="male" autocomplete="off"> Male
				  </label>
				  <label class="btn btn-primary <?php if (isset ($_POST["gender"])) { if ($_POST["gender"] == "female") { echo 'active'; } } ?>">
				    <input type="radio" id="new_gender3" name="new_gender" value="female" autocomplete="off"> Female
				  </label>
			    </div>
              </div>
			  <div class="form-group">
                <label for="new_dob3" class="col-sm-2 control-label">DoB</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="new_dob" id="new_dob3">
                </div>
              </div>
			  <div class="form-group">
                <label for="submit_password3" class="col-sm-2 control-label">Current Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="submit_password" id="submit_password3">
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Confirm</button>
			</div><!-- /.box-footer -->
          </form>
        </div><!-- /.box -->
