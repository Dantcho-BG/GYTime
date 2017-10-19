<?php

  require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

  $user_id = $_SESSION["user_id"];
  $sql = "SELECT email, username, first_name, last_name, password, gender, dob FROM users WHERE user_id='$user_id'";
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc()) {
    $username=$row["username"];
    $first_name=$row["first_name"];
    $last_name=$row["last_name"];
    $email=$row["email"];
	$password=$row["password"];
	$gender=$row["gender"];
	$dob=$row["dob"];
  }

  mysqli_close($conn);

	$first_name = "";
	$first_name_error_empty = "";
	$first_name_error_empty_desc = "";
	$first_name_error_lenght = "";
	$first_name_error_lenght_desc = "";
	$first_name_error_allowed_symbols = "";
	$first_name_error_allowed_symbols_desc = "";

	$last_name_error_empty = "";
	$last_name_error_empty_desc = "";
	$last_name_error_lenght = "";
	$last_name_error_lenght_desc = "";
	$last_name_error_allowed_symbols = "";
	$last_name_error_allowed_symbols_desc = "";

	$gender_error_result = "";
	$gender_error_result_desc = "";
	
	$dob_error_wrong_format = "";
	$dob_error_wrong_format_desc = "";

	$error = 0;
	$success = 0;
  
  
	
  
  
  
  
  
  
  
  
  
  ?>
