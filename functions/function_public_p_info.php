<?php

  require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

  $user_id = $_SESSION["user_id"];
  $sql = "SELECT first_name, last_name, password, gender, dob FROM users WHERE user_id='$user_id'";
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc()) {
    $first_name=$row["first_name"];
    $last_name=$row["last_name"];
  	$h_password=$row["password"];
  	$gender=$row["gender"];
  	$dob=$row["dob"];
  }

  mysqli_close($conn);

	$new_first_name_error_lenght = "";
	$new_first_name_error_lenght_desc = "";
	$new_first_name_error_allowed_symbols = "";
	$new_first_name_error_allowed_symbols_desc = "";
  $record_updated_successfully_first_name = "";
	$record_updated_successfully_first_name_desc = "";
  $new_first_name_error_exsist_already = "";
  $new_first_name_error_exsist_already_desc = "";

	$new_last_name_error_lenght = "";
	$new_last_name_error_lenght_desc = "";
	$new_last_name_error_allowed_symbols = "";
	$new_last_name_error_allowed_symbols_desc = "";
  $record_updated_successfully_last_name = "" ;
  $record_updated_successfully_last_name_desc = "";
  $new_last_name_error_exsist_already = "";
  $new_last_name_error_exsist_already_desc = "";

	$new_gender_error_result = "";
	$new_gender_error_result_desc = "";
  $record_updated_successfully_gender = "";
  $record_updated_successfully_gender_desc = "";
  $new_gender_error_exsist_already = "";
  $new_gender_error_exsist_already_desc = "";

	$new_dob_error_wrong_format = "";
	$new_dob_error_wrong_format_desc = "";
  $record_updated_successfully_dob = "";
  $record_updated_successfully_dob_desc = "";
  $new_dob_error_exsist_already = "";
  $new_dob_error_exsist_already_desc = "";

	$submit_password_empty = "";
	$submit_password_empty_desc = "";
	$wrong_password = "";
	$wrong_password_desc = "";

	$error = 0;
	$success = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["new_first_name"])){
	$new_first_name = $_POST["new_first_name"];
  }
  if (isset($_POST["new_last_name"])) {
	$new_last_name = $_POST["new_last_name"];
  }
	if (isset($_POST["new_gender"])){
	$new_gender = $_POST["new_gender"];
	}
	if (isset($_POST["new_dob"])) {
	$new_dob = $_POST["new_dob"];
	}
	$submit_password = $_POST["submit_password"];
}

if (empty($new_first_name)) {
}
else {

	if (strlen($new_first_name) < 2) {
		$new_first_name_error_lenght = "<h4>First name is very short</h4>";
		$new_first_name_error_lenght_desc = "<p>Minimum lenght for first name is 2 symbols.</p>";
		$error = 1;
	}

	if (strlen($new_first_name) > 35) {
		$new_first_name_error_lenght = "<h4>First name is very long</h4>";
		$new_first_name_error_lenght_desc = "<p>Maximum lenght for first name is 35 symbols.</p>";
		$error = 1;
	}

	if (!ctype_alnum($new_first_name)) {
		$new_first_name_error_allowed_symbols = "<h4>First name contains unallowed symbols</h4>";
		$new_first_name_error_allowed_symbols_desc = "<p>Your first name contains unallowed symbols. Only letters are allowed. Please try again!</p>";
		$error = 1;
	}
}

if (empty($new_last_name)) {
}
else {

	if (strlen($new_last_name) < 2) {
		$new_last_name_error_lenght = "<h4>Last name is very short</h4>";
		$new_last_name_error_lenght_desc = "<p>Minimum lenght for last name is 2 symbols.</p>";
		$error = 1;
	}

	if (strlen($new_last_name) > 35) {
		$new_last_name_error_lenght = "<h4>Last name is very long</h4>";
		$new_last_name_error_lenght_desc = "<p>Maximum lenght for last name is 35 symbols.</p>";
		$error = 1;

	}

	if (!ctype_alnum($new_last_name)) {
		$new_last_name_error_allowed_symbols = "<h4>Last name contains unallowed symbols</h4>";
		$new_last_name_error_allowed_symbols_desc = "<p>Your last name contains unallowed symbols. Only letters are allowed. Please try again!</p>";
		$error = 1;
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

if (isset($new_gender)) {
if (empty($new_gender)) {
} else {

    if ($new_gender != "male" && $new_gender != "female") {
      $gender_error_result = "<h4>Gender unknown error</h4>";
      $gender_error_result_desc = "<p>Please reload the page and try again!</p>";
      $error = 1;
    }
  }
}

if (isset($new_dob)) {
if (empty($new_dob)) {
}

else {

  if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$new_dob)) {
    $dob_error_wrong_format = "<h4>Date of Birth wrong format</h4>";
    $dob_error_wrong_format_desc = "<p>Please reload the page and try again!</p>";
    $error = 1;
  }
}
}

if (isset($_POST["new_first_name"])) {
  if (!empty($_POST["new_first_name"])) {
    if ($first_name == $new_first_name) {
      $new_first_name_error_exsist_already = "<h4>Same First Name</h4>";
      $new_first_name_error_exsist_already_desc = "<p>Your current first name is $first_name.</p>";
      $error = 1;
    }
  }
}

if (isset($_POST["new_last_name"])) {
  if (!empty($_POST["new_last_name"])) {
    if ($last_name == $new_last_name) {
      $new_last_name_error_exsist_already = "<h4>Same Last Name</h4>";
      $new_last_name_error_exsist_already_desc = "<p>Your current last name is $last_name.</p>";
      $error = 1;
    }
  }
}

if (isset($_POST["new_gender"])) {
  if (!empty($_POST["new_gender"])) {
    if ($gender == $new_gender) {
      $new_gender_error_exsist_already = "<h4>Same Gender</h4>";
      $new_gender_error_exsist_already_desc = "<p>Your current gender is $gender.</p>";
      $error = 1;
    }
  }
}

if (isset($_POST["new_dob"])) {
  if (!empty($_POST["new_dob"])) {
    if ($dob == $new_dob) {
      $new_dob_error_exsist_already = "<h4>Same Dob</h4>";
      $new_dob_error_exsist_already_desc = "<p>Your current dob is $dob.</p>";
      $error = 1;
    }
  }
}

require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

if (isset($_POST["new_first_name"])) {
  if (!$error == 1) {
    if (!empty($new_first_name)) {
      $user_id = $_SESSION["user_id"];
      $sql = "UPDATE users SET first_name='$new_first_name' WHERE user_id='$user_id'";
    }
  }

  if ($conn->query($sql) === TRUE) {
      $record_updated_successfully_first_name = "<h4>First name updated successfully</h4>";
      $record_updated_successfully_first_name_desc = "<p>You successfully changed your first name to $new_first_name.</p>";
      $success = 1;
  } else {
      $conn->error;
  }
}

if (isset($_POST["new_last_name"])) {
  if (!$error == 1) {
    if (!empty($new_last_name)) {
      $user_id = $_SESSION["user_id"];
      $sql = "UPDATE users SET last_name='$new_last_name' WHERE user_id='$user_id'";
    }

    if ($conn->query($sql) === TRUE) {
        $record_updated_successfully_last_name = "<h4>Last name updated successfully</h4>";
        $record_updated_successfully_last_name_desc = "<p>You successfully changed your last name to $new_last_name.</p>";
        $success = 1;
    } else {
    	$conn->error;
    }
  }
}

if (isset($_POST["new_gender"])) {
  if (!$error == 1) {
    if (!empty($new_gender)) {
      $user_id = $_SESSION["user_id"];
      $sql = "UPDATE users SET gender='$new_gender' WHERE user_id='$user_id'";
    }

    if ($conn->query($sql) === TRUE) {
        $record_updated_successfully_gender = "<h4>Gender updated successfully</h4>";
        $record_updated_successfully_gender_desc = "<p>You successfully changed your gender to $new_gender.</p>";
        $success = 1;
    } else {
    	$conn->error;
    }
  }
}

if (isset($_POST["new_dob"])) {
  if (!$error == 1) {
    if (!empty($new_dob)) {
      $user_id = $_SESSION["user_id"];
      $sql = "UPDATE users SET dob='$new_dob' WHERE user_id='$user_id'";
    }

    if ($conn->query($sql) === TRUE) {
        $record_updated_successfully_dob = "<h4>Date of Birth updated successfully</h4>";
        $record_updated_successfully_dob_desc = "<p>You successfully changed your date of birth to $new_dob.</p>";
        $success = 1;
    } else {
    	$conn->error;
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

			         echo $new_first_name_error_lenght;
               echo $new_first_name_error_lenght_desc;

               echo $new_first_name_error_allowed_symbols;
               echo $new_first_name_error_allowed_symbols_desc;

               echo $new_last_name_error_lenght;
               echo $new_last_name_error_lenght_desc;

               echo $new_last_name_error_allowed_symbols;
               echo $new_last_name_error_allowed_symbols_desc;

               echo $wrong_password;
               echo $wrong_password_desc;

               echo $new_gender_error_result;
               echo $new_gender_error_result_desc;

               echo $new_dob_error_wrong_format;
             	 echo $new_dob_error_wrong_format_desc;

               echo $new_first_name_error_exsist_already;
               echo $new_first_name_error_exsist_already_desc;

               echo $new_last_name_error_exsist_already;
               echo $new_last_name_error_exsist_already_desc;

               echo $new_gender_error_exsist_already;
               echo $new_gender_error_exsist_already_desc;

               echo $new_dob_error_exsist_already;
               echo $new_dob_error_exsist_already_desc;
			   
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

              if (!empty($_POST["new_first_name"])) {
			           echo $record_updated_successfully_first_name;
			           echo $record_updated_successfully_first_name_desc;
              }

              if (!empty($_POST["new_last_name"])) {
			           echo $record_updated_successfully_last_name;
			           echo $record_updated_successfully_last_name_desc;
              }

              if (!empty($_POST["new_gender"])) {
                 echo $record_updated_successfully_gender;
                 echo $record_updated_successfully_gender_desc;
              }

              if (!empty($_POST["new_dob"])) {
                 echo $record_updated_successfully_dob;
                 echo $record_updated_successfully_dob_desc;
              }
            ?>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div> <!-- /.row -->

<?php

}

?>
