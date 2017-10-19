
<?php

require "functions".DIRECTORY_SEPARATOR."change_profile_picture_validation.php";

?>

    <!-- Horizontal Form -->
    <div class="box box-change_color_background">
      <div class="box-header with-border">
        <h3 class="box-title">Change Profile Picture</h3>
      </div><!-- /.box-header -->
      <!-- form start -->
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-horizontal" enctype="multipart/form-data">
        <div class="box-body">
          <div class="form-group">
            <label for="picture3" class="col-sm-2 control-label">Picture</label>
            <div class="col-sm-10">
              <div class="input-group">
                <span class="input-group-btn">
                  <input class="btn btn-default" value="Change" type="submit">
                </span>
                <input type="file" id="picture3" name="uploaded_picture" class="form-control" placeholder="">
              </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label data-toggle="tooltip" data-placement="left" title="This function will return the default picture to your profile.">
                  <input name="restore_to_default" value="1" type="checkbox"> Restore the default picture
                </label>
              </div>
            </div>
          </div>
        </div><!-- /.box-body -->
      </form>
    </div><!-- /.box -->
