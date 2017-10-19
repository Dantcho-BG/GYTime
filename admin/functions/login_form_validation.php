<?php

	//Email set vars START

	$email_error_empty = "";
	$email_error_empty_desc = "";
	$email_error_allowed_symbols = "";
	$email_error_allowed_symbols_desc = "";
	$email_error_valid = "";
	$email_error_valid_desc = "";

	//Password set vars START

	$password_error_empty = "";
	$password_error_empty_desc = "";
	$password_error_allowed_symbols = "";
	$password_error_allowed_symbols_desc = "";
	$wrong_password = "";
	$wrong_password_desc = "";
	
	//Acc doesn't exist
	
	$acc_no_exist = "";
	$acc_no_exist_desc = "";

	//DB Errors

	$username_exist = "";
	$username_exist_desc = "";
	$email_exist = "";
	$email_exist_desc = "";

  //H-Password

  $hashed_password = "";

	$error = 0;
	$success = 0;
	$remember_me = 0;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$email = $_POST["email"];
		$password = $_POST["password"];
		if (isset($_POST["remember_me"])){
			$remember_me = $_POST["remember_me"];
		}
		//Email START

		if (empty($email)) {
			$email_error_empty = "<h4>E-mail is required</h4>";
			$email_error_empty_desc = "<p>You have to type your e-mail in the form. Please try again!</p>";
			$error = 1;
		}

		else {

			if (!preg_match('/^([^\.]|([^\.])\.[^\.])*$/', $email)) {
				$email_error_allowed_symbols = "<h4>E-mail is invalid</h4>";
				$email_error_allowed_symbols_desc = "<p>Your e-mail is invalid. Make it valid :) Please try again!</p>";
				$error = 1;
			}

			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				$email_error_valid = "<h4>E-mail is invalid</h4>";
				$email_error_valid_desc = "<p>Your e-mail is invalid. Please try again!</p>";
				$error = 1;
			}
		}

		//Password START

		if (empty($password)) {
			$password_error_empty = "<h4>Password is required</h4>";
			$password_error_empty_desc = "<p>You have to type your password in the form. Please try again!</p>";
			$error = 1;
		}

		else {

			if(!preg_match("#[0-9]+#",$password)) {
				$password_error_no_number = "<h4>No numbers in the password</h4>";
				$password_error_no_number_desc = "<p>You have to type minumum one number in the password.</p>";
			}

			if(!preg_match("#[A-Z]+#",$password)) {
				$password_error_no_capital_letter = "<h4>No capital leters</h4>";
				$password_error_no_capital_letter_desc = "<p>Please enter minimum one capital letter in the password.</p>";
			}

			if(!preg_match("#[a-z]+#",$password)) {
				$password_error_no_lowercase_letter = "<h4>No lower letters</h4>";
				$password_error_no_lowercase_letter_desc = "<p>Please enter minimum one lowercase letter. Please try again!</p>";
			}

			if (!preg_match('/^[a-zA-Z][0-9a-zA-Z_!$@#^&]/', $password)) {
				$password_error_allowed_symbols = "<h4>Password contains unallowed symbols</h4>";
				$password_error_allowed_symbols_desc = "<p>Your password contains unallowed symbols. Only letters, numbers, underscore and dash are allowed. Please try again!</p>";
				$error = 1;
			}
		}

		if (!$error) {
			require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

      $sql = "SELECT user_id, email, password, admin FROM users WHERE email='$email'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $user_id = $row["user_id"];
          $email = $row["email"];
          $hash = $row["password"];
		  $is_admin = $row["admin"];
        }
      } else {
		$acc_no_exist = "<h4>Acc doesn't exist</h4>";
		$acc_no_exist_desc = "<p>There is no profile with this email. Please try again!</p>";
        $error = 1;
      }
	  
	  if (isset($hash)) {

	  $hash = preg_replace('/\s+$/m', '', $hash);
	  
	  }
	  
	  else {
		  $error = 1;
	  }

	  $pass = $password;
	  
	  if (!$error) {

	  if (!password_verify($pass, $hash)) {
		$wrong_password = "<h4>Wrong password</h4>";
		$wrong_password_desc = "<p>Your password is wrong. Please try again!</p>";
		$error = 1;
		}
	  }

			mysqli_close($conn);
		}

		if (!$error) {

			if ($remember_me == 1) {
				
				if ($is_admin == 1) {
					$_SESSION["admin"] = 1;;
				}

				$_SESSION["remember_me"] = 1;
				$_SESSION["user_id"] = $user_id;
				$success = 1;
				//This doesn't work because is after the header. (Maybe fix in the future)
				//header('Location: successful_login.php');

			}
			else {
				
				if ($is_admin == 1) {
					$_SESSION["admin"] = 1;;
				}
				
				$_SESSION["user_id"] = $user_id;
				$success = 1;
				//This doesn't work because is after the header. (Maybe fix in the future)
				//header('Location: successful_login.php');
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

					//E-mail START

					echo $email_error_empty;
					echo $email_error_empty_desc;

					echo $email_error_allowed_symbols;
					echo $email_error_allowed_symbols_desc;

					echo $email_error_valid;
					echo $email_error_valid_desc;

					//Password START

					echo $password_error_empty;
					echo $password_error_empty_desc;

					echo $password_error_allowed_symbols;
					echo $password_error_allowed_symbols_desc;

					echo $wrong_password;
					echo $wrong_password_desc;
					
					//Acc doesn't exist
					
					echo $acc_no_exist;
					echo $acc_no_exist_desc;

					//DB errors START

					echo $username_exist;
					echo $username_exist_desc;

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
                  <h3 class="box-title">Success</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="callout callout-success">
										<h4>Successful Login</h4>
										<p>You logged successfuly. Click <a href="index.php">here</a> to go to the home page!</p>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div> <!-- /.row -->

<?php

}

?>
