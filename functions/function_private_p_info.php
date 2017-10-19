<?php

  require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

  $user_id = $_SESSION["user_id"];
  $sql = "SELECT email, password FROM users WHERE user_id='$user_id'";
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc()) {
    $email=$row["email"];
    $h_password=$row["password"];
  }

  mysqli_close($conn);

  $error = 0;
  $success = 0;

//New e-mail vars START

  $new_email_error_lenght = "";
  $new_email_error_lenght_desc = "";
  $new_email_error_allowed_symbols = "";
  $new_email_error_allowed_symbols_desc = "";
  $new_email_error_valid = "";
  $new_email_error_valid_desc = "";
  $new_email_error_exsist_already = "";
  $new_email_error_exsist_already_desc = "";
  $new_email_error_exsist_already = "";
  $new_email_error_exsist_already_desc = "";
//New password vars START

  $new_password_error_lenght = "";
  $new_password_error_lenght_desc = "";
  $new_password_error_allowed_symbols = "";
  $new_password_error_allowed_symbols_desc = "";
  $new_password_error_allowed_valid = "";
  $new_password_error_allowed_valid_desc = "";
  $new_password_error_no_lowercase_letter = "";
  $new_password_error_no_lowercase_letter_desc = "";
  $new_password_error_no_capital_letter = "";
  $new_password_error_no_capital_letter_desc = "";
  $new_password_error_no_number = "";
  $new_password_error_no_number_desc = "";
  $new_password_error_exsist_already = "";
  $new_password_error_exsist_already_desc  = "";

// Confirm new pass vars START

  $c_new_password_error_allowed_symbols = "";
  $c_new_password_error_allowed_symbols_desc = "";
  $c_new_password_error_do_not_match = "";
  $c_new_password_error_do_not_match_desc = "";

// Password verify vars START

  $submit_password_empty = "";
  $submit_password_empty_desc = "";
  $wrong_password = "";
  $wrong_password_desc = "";

// Updatind vars START

  $record_updated_successfully_email = "";
  $record_updated_successfully_email_desc = "";

  $record_updated_successfully_pass = "";
  $record_updated_successfully_pass_desc = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $new_email = $_POST["new_email"];
  $new_password = $_POST["new_password"];
  $c_new_password = $_POST["c_new_password"];
  $submit_password = $_POST["submit_password"];


  if (empty($new_email)) {
  }

  else {

    if (strlen($new_email) < 5) {
      $new_email_error_lenght = "<h4>E-mail is very short</h4>";
      $new_email_error_lenght_desc = "<p>Minimum lenght for e-mail is 5 symbols.</p>";
      $error = 1;
    }

    if (strlen($new_email) > 155) {
      $new_email_error_lenght = "<h4>E-mail is very long</h4>";
      $new_email_error_lenght_desc = "<p>Maximum lenght for e-mail is 155 symbols.</p>";
      $error = 1;
    }

    if (!preg_match('/^([^\.]|([^\.])\.[^\.])*$/', $new_email)) {
		    $new_email_error_allowed_symbols = "<h4>E-mail is invalid</h4>";
		    $new_email_error_allowed_symbols_desc = "<p>Your e-mail is invalid. Make it valid :) Please try again!</p>";
		    $error = 1;
	  }

	   if (filter_var($new_email, FILTER_VALIDATE_EMAIL) === false) {
		    $new_email_error_valid = "<h4>E-mail is invalid</h4>";
		    $new_email_error_valid_desc = "<p>Your e-mail is invalid. Please try again!</p>";
		    $error = 1;
	  }
  }
}

if (empty($new_password)) {
} else {

  if (strlen($new_password) < 8) {
    $new_password_error_lenght = "<h4>Password is very short</h4>";
    $new_password_error_lenght_desc = "<p>Minimum lenght for password is 8 symbols.</p>";
    $error = 1;
  }

  if (strlen($new_password) > 35) {
    $new_password_error_lenght = "<h4>Password is very long</h4>";
    $new_password_error_lenght_desc = "<p>Maximum lenght for password is 35 symbols.</p>";
    $error = 1;
  }

  if(!preg_match("#[0-9]+#",$new_password)) {
		$new_password_error_no_number = "<h4>No numbers in the password</h4>";
		$new_password_error_no_number_desc = "<p>You have to type minumum one number in the password.</p>";
    $error = 1;
  }

	if(!preg_match("#[A-Z]+#",$new_password)) {
		$new_password_error_no_capital_letter = "<h4>No capital leters</h4>";
		$new_password_error_no_capital_letter_desc = "<p>Please enter minimum one capital letter in the password.</p>";
    $error = 1;
  }

	if(!preg_match("#[a-z]+#",$new_password)) {
		$new_password_error_no_lowercase_letter = "<h4>No lower letters</h4>";
		$new_password_error_no_lowercase_letter_desc = "<p>Please enter minimum one lowercase letter. Please try again!</p>";
    $error = 1;
  }

	if (!preg_match('/^[a-zA-Z][0-9a-zA-Z_!$@#^&]/', $new_password)) {
		$new_password_error_allowed_symbols = "<h4>Password contains unallowed symbols</h4>";
		$new_password_error_allowed_symbols_desc = "<p>Your password contains unallowed symbols. Only letters, numbers, underscore and dash are allowed. Please try again!</p>";
		$error = 1;
  }
}

if (empty($c_new_password)) {
}
else {

  if (!preg_match('/^[a-zA-Z][0-9a-zA-Z_!$@#^&]/', $c_new_password)) {
    $c_new_password_error_allowed_symbols = "<h4>Confirm password is required</h4>";
    $c_new_password_error_allowed_symbols_desc = "<p>You have to confirm your password in the form. Please try again!</p>";
    $error = 1;
  }

  if (!empty($c_new_password) && !empty($new_password)) {
    if ($c_new_password != $new_password) {
      $c_new_password_error_do_not_match = "<h4>Password doesn't match</h4>";
      $c_new_password_error_do_not_match_desc = "<p>The password doesn't match. Please try again.</p>";
      $error = 1;
    }
  }
}

if (isset($h_password)) {
	$h_password = preg_replace('/\s+$/m', '', $h_password);
	
	if (isset($submit_password)){
		if (empty($submit_password)) {
			$submit_password_empty = "<h4>Current password is empty</h4>";
			$submit_password_empty_desc = "<p>You have to submit your password correctly.Please try again!</p>";
			$error = 1;
		}
	}

	if (!empty($submit_password)) {

		$pass = $submit_password;

		if (!password_verify($pass, $h_password)) {
			$wrong_password = "<h4>Wrong password</h4>";
			$wrong_password_desc = "<p>Your password is wrong. Please try again!</p>";
			$error = 1;
		}
	}
}

if (isset($_POST["new_email"])) {
  if (!empty($_POST["new_email"])) {
    if ($email == $new_email) {
      $new_email_error_exsist_already = "<h4>Same E-mail</h4>";
      $new_email_error_exsist_already_desc = "<p>Your current e-mail is $email.</p>";
      $error = 1;
    }
  }
}

if (isset($_POST["new_password"])) {
  if (!empty($_POST["new_password"])) {
    if ($h_password == $new_password) {
      $new_password_error_exsist_already = "<h4>Same Password</h4>";
      $new_password_error_exsist_already_desc = "<p>You can't change your password to the same.</p>";
      $error = 1;
    }
  }
}

require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";
if (isset($new_email)) {
if (!$error == 1) {
  if (!empty($new_email)) {
    $changed_email = $new_email;
    $user_id = $_SESSION["user_id"];
    $sql = "UPDATE users SET email='$changed_email' WHERE user_id='$user_id'";

if ($conn->query($sql) === TRUE) {
    $record_updated_successfully_email = "<h4>Record updated successfully</h4>";
    $record_updated_successfully_email_desc = "<p>You successfully changed your email to $changed_email. Please reload the page!</p>";
    $success = 1;
} else {
    $conn->error;
}
  }
}
}

if (isset($new_password)) {
  if (!$error == 1) {
    if (!empty($new_password)) {
      $changed_password = $new_password;
      $options = ['cost' => 11];
      $h_new_password = password_hash($new_password, PASSWORD_BCRYPT, $options)."\n";
      $user_id = $_SESSION["user_id"];
      $sql = "UPDATE users SET password='$h_new_password' WHERE user_id='$user_id'";

      if ($conn->query($sql) === TRUE) {
          $record_updated_successfully_pass = "<h4>Record updated successfully</h4>";
          $record_updated_successfully_pass_desc = "<p>You successfully changed your pasword.</p>";
          $success = 1;
      }
      else {
        $conn->error;
      }
    }
  }
}

mysqli_close($conn);

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

// new E-mail validations

            echo $new_email_error_lenght;
            echo $new_email_error_lenght_desc;

            echo $new_email_error_allowed_symbols;
            echo $new_email_error_allowed_symbols_desc;

            echo $new_email_error_valid;
            echo $new_email_error_valid_desc;

// new password validations

            echo $new_password_error_lenght;
            echo $new_password_error_lenght_desc;

            echo $new_password_error_allowed_symbols;
            echo $new_password_error_allowed_symbols_desc;

            echo $new_password_error_allowed_valid;
            echo $new_password_error_allowed_valid_desc;

            echo $new_password_error_no_lowercase_letter;
            echo $new_password_error_no_lowercase_letter_desc;

            echo $new_password_error_no_capital_letter;
            echo $new_password_error_no_capital_letter_desc;

            echo $new_password_error_no_number;
            echo $new_password_error_no_number_desc;

            echo $wrong_password;
            echo $wrong_password_desc;

            echo $new_password_error_exsist_already;
            echo $new_password_error_exsist_already_desc;

// Confirm new password validations

            echo $c_new_password_error_do_not_match;
            echo $c_new_password_error_do_not_match_desc;
			
			echo $submit_password_empty;
			echo $submit_password_empty_desc;

            ?>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div> <!-- /.row -->

<?php

}



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
            <?php

            echo $record_updated_successfully_email;
            echo $record_updated_successfully_email_desc;

			echo $record_updated_successfully_pass;
            echo $record_updated_successfully_pass_desc;

            ?>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div> <!-- /.row -->

<?php

}
?>
