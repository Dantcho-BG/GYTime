<?php
require "functions".DIRECTORY_SEPARATOR."function_private_p_info.php";
?>

				<!--<div class="box box-info">
					<div class="box-header with-border">
						<h3 class="box-title">Change Your Pivate Information</h3>
						<div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div class="margin-bottom"><b>Your Current E-mail is:</b> <?php echo $email; ?></div>
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="from-horizontal">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">New E-mail:</label>
								<div class="col-sm-10 margin-bottom">
									<input type="email" class="form-control" name="new_email">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">New Password:</label>
								<div class="col-sm-10 margin-bottom">
									<input type="password" class="form-control" name="new_password">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Confirm New Password:</label>
								<div class="col-sm-10 margin-bottom">
									<input type="password" class="form-control" name="c_new_password">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Current Password:</label>
								<div class="col-sm-10 margin-bottom">
								  <input type="password" class="form-control" name="submit_password">
								</div>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success pull-right">Confirm</button>
						</div>
					</form>
				</div>-->
				
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
              <div class="form-group">
                <label for="new_email3" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="new_email" id="new_email3">
                </div>
              </div>
              <div class="form-group">
                <label for="new_password3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="new_password" id="new_password3">
                </div>
              </div>
              <div class="form-group">
                <label for="c_new_password3" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="c_new_password" id="c_new_password3">
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
