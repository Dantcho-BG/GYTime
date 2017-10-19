<?php

$error = 0;
$success = 0;

$restore_to_default = 0;

$is_image = "";
$is_image_desc = "";

$too_large_picture = "";
$too_large_picture_desc = "";

$format_error = "";
$format_error_desc = "";

$error_with_upload = "";
$error_with_upload_desc = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset ($_POST["restore_to_default"])) {

  $restore_to_default = $_POST["restore_to_default"];

  }

  if ($restore_to_default == 1) {

    if ($error == 0) {

      $user_id = $_SESSION["user_id"];

      require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

      $sql = "UPDATE users SET profile_picture='default.png' WHERE user_id='$user_id'";
      if (mysqli_query($conn, $sql)) {
      //echo "Record updated successfully";
      } else {
      //echo "Error updating record: " . mysqli_error($conn);
      }

      mysqli_close($conn);

      $success = 1;
    }
  }
  else {

$target_dir = "icons/profile_pics-";
$target_file = $target_dir . basename($_FILES["uploaded_picture"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["uploaded_picture"]["tmp_name"]);
    if($check !== false) {
        //$is_image = "File is an image - " . $check["mime"] . ".";
    } else {
        $is_image = "<h4>File is not an image.</h4>";
        $is_image_desc = "<p>Try uploading a picture</p>";
        $error = 1;
    }
}
// Check file size
if ($_FILES["uploaded_picture"]["size"] > 500000) {
    $too_large_picture = "<h4>Sorry, your file is too large.</h4>";
    $too_large_picture_desc = "<p>Sorry, your file is too large.</p>";
    $error = 1;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $format_error = "<h4>The file is not in correct format</h4>";
    $format_error_desc = "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
    $error = 1;
}
// Check if $uploadOk is set to 0 by an error
if ($error == 0) {
  $temp = explode(".", $_FILES["uploaded_picture"]["name"]);
  $newfilename = round(microtime(true)) . '.' . end($temp);
  if (move_uploaded_file($_FILES["uploaded_picture"]["tmp_name"], "icons/profile_pics" . $newfilename)) {
      //echo "The file ". basename( $_FILES["uploaded_picture"]["name"]). " has been uploaded.";
  } else {
      $error_with_upload = "<h4>Oops...</h4>";
      $error_with_upload_desc = "<p>Sorry, there was an error uploading your file.</p>";
  }
}

if (isset($newfilename)) {

$uploaded_picture_name = "profile_pics".$newfilename;

//$uploaded_picture_link = "icons/".$uploaded_picture_name;

}

  if ($error == 0) {

    $user_id = $_SESSION["user_id"];

    require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

    $sql = "UPDATE users SET profile_picture='$uploaded_picture_name' WHERE user_id='$user_id'";
    if (mysqli_query($conn, $sql)) {
    //echo "Record updated successfully";
    } else {
    //echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);

    $success = 1;
  }

}

}

if ($error == 1) {

?>

          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-bullhorn"></i>
                  <h3 class="box-title">Warning</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="callout callout-danger">
                    <?php

                    echo $is_image;
                    echo $is_image_desc;

                    echo $too_large_picture;
                    echo $too_large_picture_desc;

                    echo $format_error;
                    echo $format_error_desc;

                    echo $error_with_upload;
                    echo $error_with_upload_desc;

					          ?>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div> <!-- /.row -->

<?php

}

?>

<?php

if ($success == 1) {

?>

          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header with-border">
                  <i class="fa fa-bullhorn"></i>
                  <h3 class="box-title">Warning</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="callout callout-success">
										<h4>Successful Change</h4>
										<p>You successfuly changed your profile picture. Click <a href="index.php">here</a> to go to the home page!</p>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div> <!-- /.row -->

<?php

}

?>
