<?php

	//First name set vars START

	$first_name = "";
	$first_name_error_empty = "";
	$first_name_error_empty_desc = "";
	$first_name_error_lenght = "";
	$first_name_error_lenght_desc = "";
	$first_name_error_allowed_symbols = "";
	$first_name_error_allowed_symbols_desc = "";

	//Last name set vars START

	$last_name_error_empty = "";
	$last_name_error_empty_desc = "";
	$last_name_error_lenght = "";
	$last_name_error_lenght_desc = "";
	$last_name_error_allowed_symbols = "";
	$last_name_error_allowed_symbols_desc = "";

	//Username set vars START

	$username_error_empty = "";
	$username_error_empty_desc = "";
	$username_error_lenght = "";
	$username_error_lenght_desc = "";
	$username_error_allowed_symbols = "";
	$username_error_allowed_symbols_desc = "";

	//Email set vars START

	$email_error_empty = "";
	$email_error_empty_desc = "";
	$email_error_lenght = "";
	$email_error_lenght_desc = "";
	$email_error_allowed_symbols = "";
	$email_error_allowed_symbols_desc = "";
	$email_error_valid = "";
	$email_error_valid_desc = "";

	//Password set vars START

	$password_error_empty = "";
	$password_error_empty_desc = "";
	$password_error_lenght = "";
	$password_error_lenght_desc = "";
	$password_error_no_number = "";
	$password_error_no_number_desc = "";
	$password_error_no_capital_letter = "";
	$password_error_no_capital_letter_desc = "";
	$password_error_no_lowercase_letter = "";
	$password_error_no_lowercase_letter_desc = "";
	$password_error_allowed_symbols = "";
	$password_error_allowed_symbols_desc = "";

	//Confirm password vars START

	$c_password_error_empty = "";
	$c_password_error_empty_desc = "";
	$c_password_error_allowed_symbols = "";
	$c_password_error_allowed_symbols_desc = "";

	//Check password vars START

	$check_password = "";
	$check_password_desc = "";

	//Gender vars START

	$gender_error_result = "";
	$gender_error_result_desc = "";

	//DoB vars START

	$dob_error_wrong_format = "";
	$dob_error_wrong_format_desc = "";

	//DB Errors

	$username_exist = "";
	$username_exist_desc = "";
	$email_exist = "";
	$email_exist_desc = "";

	$successful_registration = 1;

	$error = 0;
	$success = 0;
	$gender = "";
	$dob = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$c_password = $_POST["confirm_password"];
		if (isset($_POST["gender"])){
			$gender = $_POST["gender"];
		}
		if (isset($_POST["dob"])){
			$dob = $_POST["dob"];
		}

		//First Name START

		if (empty($first_name)) {
			$first_name_error_empty = "<h4>First name is required</h4>";
			$first_name_error_empty_desc = "<p>You have to type your first name in the form. Please try again!</p>";
			$error = 1;
		}

		else {

			if (strlen($first_name) < 5) {
				$first_name_error_lenght = "<h4>First name is very short</h4>";
				$first_name_error_lenght_desc = "<p>Minimum lenght for first name is 5 symbols.</p>";
				$error = 1;
			}

			if (strlen($first_name) > 35) {
				$first_name_error_lenght = "<h4>First name is very long</h4>";
				$first_name_error_lenght_desc = "<p>Maximum lenght for first name is 35 symbols.</p>";
				$error = 1;
			}

			if (!ctype_alnum($first_name)) {
				$first_name_error_allowed_symbols = "<h4>First name contains unallowed symbols</h4>";
				$first_name_error_allowed_symbols_desc = "<p>Your first name contains unallowed symbols. Only letters are allowed. Please try again!</p>";
				$error = 1;
			}
		}

		//Last Name START

		if (empty($last_name)) {
			$last_name_error_empty = "<h4>Last name is required</h4>";
			$last_name_error_empty_desc = "<p>You have to type your last name in the form. Please try again!</p>";
			$error = 1;
		}

		else {

			if (strlen($last_name) < 5) {
				$last_name_error_lenght = "<h4>Last name is very short</h4>";
				$last_name_error_lenght_desc = "<p>Minimum lenght for last name is 5 symbols.</p>";
				$error = 1;
			}

			if (strlen($last_name) > 35) {
				$last_name_error_lenght = "<h4>Last name is very long</h4>";
				$last_name_error_lenght_desc = "<p>Maximum lenght for last name is 35 symbols.</p>";
				$error = 1;
			}

			if (!ctype_alnum($last_name)) {
				$last_name_error_allowed_symbols = "<h4>Last name contains unallowed symbols</h4>";
				$last_name_error_allowed_symbols_desc = "<p>Your last name contains unallowed symbols. Only letters are allowed. Please try again!</p>";
				$error = 1;
			}
		}

		//Username START

		if (empty($username)) {
			$username_error_empty = "<h4>Username is required</h4>";
			$username_error_empty_desc = "<p>You have to type your username in the form. Please try again!</p>";
			$error = 1;
		}

		else {

			if (strlen($username) < 5) {
				$username_error_lenght = "<h4>Username is very short</h4>";
				$username_error_lenght_desc = "<p>Minimum lenght for username is 5 symbols.</p>";
				$error = 1;
			}

			if (strlen($username) > 35) {
				$username_error_lenght = "<h4>Username is very long</h4>";
				$username_error_lenght_desc = "<p>Maximum lenght for username is 35 symbols.</p>";
				$error = 1;
			}

			if (!preg_match('/^[A-Za-z0-9_-]+([A-Za-z0-9]+)*$/', $username)) {
				$username_error_allowed_symbols = "<h4>Username contains unallowed symbols</h4>";
				$username_error_allowed_symbols_desc = "<p>Your username contains unallowed symbols. Only letters, numbers, underscore and dash are allowed. Please try again!</p>";
				$error = 1;
			}
		}

		//Email START

		if (empty($email)) {
			$email_error_empty = "<h4>E-mail is required</h4>";
			$email_error_empty_desc = "<p>You have to type your e-mail in the form. Please try again!</p>";
			$error = 1;
		}

		else {

			if (strlen($email) < 5) {
				$email_error_lenght = "<h4>E-mail is very short</h4>";
				$email_error_lenght_desc = "<p>Minimum lenght for e-mail is 5 symbols.</p>";
				$error = 1;
			}

			if (strlen($email) > 155) {
				$email_error_lenght = "<h4>E-mail is very long</h4>";
				$email_error_lenght_desc = "<p>Maximum lenght for e-mail is 155 symbols.</p>";
				$error = 1;
			}

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

			if (strlen($password) < 8) {
				$password_error_lenght = "<h4>Password is very short</h4>";
				$password_error_lenght_desc = "<p>Minimum lenght for password is 8 symbols.</p>";
				$error = 1;
			}

			if (strlen($password) > 35) {
				$password_error_lenght = "<h4>Password is very long</h4>";
				$password_error_lenght_desc = "<p>Maximum lenght for password is 35 symbols.</p>";
				$error = 1;
			}

			if(!preg_match("#[0-9]+#",$password)) {
				$password_error_no_number = "<h4>No numbers in the password</h4>";
				$password_error_no_number_desc = "<p>You have to type minumum one number in the password.</p>";
				$error = 1;
			}

			if(!preg_match("#[A-Z]+#",$password)) {
				$password_error_no_capital_letter = "<h4>No capital leters</h4>";
				$password_error_no_capital_letter_desc = "<p>Please enter minimum one capital letter in the password.</p>";
				$error = 1;
			}

			if(!preg_match("#[a-z]+#",$password)) {
				$password_error_no_lowercase_letter = "<h4>No lower letters</h4>";
				$password_error_no_lowercase_letter_desc = "<p>Please enter minimum one lowercase letter. Please try again!</p>";
				$error = 1;
			}

			if (!preg_match('/^[a-zA-Z][0-9a-zA-Z_!$@#^&]/', $password)) {
				$password_error_allowed_symbols = "<h4>Password contains unallowed symbols</h4>";
				$password_error_allowed_symbols_desc = "<p>Your password contains unallowed symbols. Only letters, numbers, underscore and dash are allowed. Please try again!</p>";
				$error = 1;
			}
		}

		//Confirm password START

		if (empty($c_password)) {
			$c_password_error_empty = "<h4>Confirm password is required</h4>";
			$c_password_error_empty_desc = "<p>You have to confirm your password in the form. Please try again!</p>";
			$error = 1;
		}

		else {

			if (!preg_match('/^[a-zA-Z][0-9a-zA-Z_!$@#^&]/', $c_password)) {
				$c_password_error_allowed_symbols = "<h4>Confirm password contains unallowed symbols</h4>";
				$c_password_error_allowed_symbols_desc = "<p>Your confirm password contains unallowed symbols. Only letters, numbers, underscore and dash are allowed. Please try again!</p>";
				$error = 1;
			}
		}

		//Check password START

		if (!empty($password) && !empty($c_password)) {
			if ($password != $c_password) {
				$check_password = "<h4>Password doesn't match</h4>";
				$check_password_desc = "<p>The password doesn't match. Please try again.</p>";
				$error = 1;
			}
		}

		//Gender START

		if (empty($gender)) {
			$gender = "Not given";
		}

		else {

			if ($gender != "male" && $gender != "female") {
				$gender_error_result = "<h4>Gender unknown error</h4>";
				$gender_error_result_desc = "<p>Please reload the page and try again!</p>";
				$error = 1;
			}

		}

		//DoB START

		if (empty($dob)) {
			$dob = "Not given";
		}

		else {

			if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$dob)) {
				$dob_error_wrong_format = "<h4>Date of Birth wrong format</h4>";
				$dob_error_wrong_format_desc = "<p>Please reload the page and try again!</p>";
				$error = 1;
    	}

		}

		//SELECT COUNT(*) FROM `users` WHERE `email` = 'mail@example.com'

		$options = ['cost' => 11];
		$h_password = password_hash($password, PASSWORD_BCRYPT, $options)."\n";

		if (!$error) {
			require_once "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

			$sql = "SELECT username FROM users WHERE username='$username'";
			$result = $conn->query($sql);

			if (!$result->num_rows == 0) {
					$error = 1;
					$username_exist = "<h4>The username is taken</h4>";
					$username_exist_desc = "<p>The username is taken by another person. Please try again!</p>";
			}

			$sql = "SELECT email FROM users WHERE email='$email'";
			$result = $conn->query($sql);

			if (!$result->num_rows == 0) {
					$error = 1;
					$email_exist = "<h4>The email is taken</h4>";
					$email_exist_desc = "<p>The email is taken by another person. Please try again!</p>";
			}

			if (!$error) {
				$sql = "INSERT INTO users (username, first_name, last_name, email, password, gender, dob)
				VALUES ('$username', '$first_name', '$last_name', '$email', '$h_password', '$gender', '$dob')";

				if (mysqli_query($conn, $sql)) {
				$successful_registration = 1;
				} else {
		    	//echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				$error = 1;
				}
				$success = 1;
				//header('Location: successful_register.php');
			}

			mysqli_close($conn);
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

					//First name START

					echo $first_name_error_empty;
					echo $first_name_error_empty_desc;

					echo $first_name_error_lenght;
					echo $first_name_error_lenght_desc;

					echo $first_name_error_allowed_symbols;
					echo $first_name_error_allowed_symbols_desc;

					//Last name START

					echo $last_name_error_empty;
					echo $last_name_error_empty_desc;

					echo $last_name_error_lenght;
					echo $last_name_error_lenght_desc;

					echo $last_name_error_allowed_symbols;
					echo $last_name_error_allowed_symbols_desc;

					//Username START

					echo $username_error_empty;
					echo $username_error_empty_desc;

					echo $username_error_lenght;
					echo $username_error_lenght_desc;

					echo $username_error_allowed_symbols;
					echo $username_error_allowed_symbols_desc;

					//E-mail START

					echo $email_error_empty;
					echo $email_error_empty_desc;

					echo $email_error_lenght;
					echo $email_error_lenght_desc;

					echo $email_error_allowed_symbols;
					echo $email_error_allowed_symbols_desc;

					echo $email_error_valid;
					echo $email_error_valid_desc;

					//Password START

					echo $password_error_empty;
					echo $password_error_empty_desc;

					echo $password_error_lenght;
					echo $password_error_lenght_desc;

					echo $password_error_no_number;
					echo $password_error_no_number_desc;

					echo $password_error_no_capital_letter;
					echo $password_error_no_capital_letter_desc;

					echo $password_error_no_lowercase_letter;
					echo $password_error_no_lowercase_letter_desc;

					echo $password_error_allowed_symbols;
					echo $password_error_allowed_symbols_desc;

					//Confirm password START

					echo $c_password_error_empty;
					echo $c_password_error_empty_desc;

					echo $c_password_error_allowed_symbols;
					echo $c_password_error_allowed_symbols_desc;

					//Check password START

					echo $check_password;
					echo $check_password_desc;

					//Gender START

					echo $gender_error_result;
					echo $gender_error_result_desc;

					//DoB START

					echo $dob_error_wrong_format;
					echo $dob_error_wrong_format_desc;

					//DB errors START

					echo $username_exist;
					echo $username_exist_desc;

					echo $email_exist;
					echo $email_exist_desc;

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
										<h4>Successful Registration</h4>
										<p>You registered successfuly. Click <a href="login.php">here</a> to login!</p>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div> <!-- /.row -->

<?php

}

?>
