<?php

  require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

  $user_id = $_SESSION["user_id"];
  $sql = "SELECT email, username, first_name, last_name, dob, gender FROM users WHERE user_id='$user_id'";
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc()) {
    $username=$row["username"];
    $first_name=$row["first_name"];
    $last_name=$row["last_name"];
    $email=$row["email"];
    $dob=$row["dob"];
    $gender=$row["gender"];
  }

  mysqli_close($conn);

?>
