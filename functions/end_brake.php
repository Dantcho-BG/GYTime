<?php

session_start();

date_default_timezone_set("Europe/London");

$year = date("Y");
$month = date("F");
$day = date("d");

$hour = date("H");
$min = date("i");

$user_id = $_SESSION["user_id"];

require_once "db".DIRECTORY_SEPARATOR."config.php";

$conn = mysqli_connect($mysql_server, $server_username, $server_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT user_id FROM work_times WHERE user_id = '$user_id' AND status = '0' AND start_work_date_year = '$year' AND start_work_date_month = '$month' AND start_work_date_day = '$day'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
	$already_checked_in_before = 1;
}

if (!$already_checked_in_before == 1) {

$sql = "SELECT user_id FROM work_times WHERE user_id = '$user_id' AND status = '0'";
$result = mysqli_query($conn, $sql);

if (!mysqli_num_rows($result) == 0) {

  $sql = "INSERT INTO work_times (user_id, status, end_work_time_hr, end_work_time_min, end_work_date_year, end_work_date_month, end_work_date_day)
  VALUES ('$user_id', '1', '$hour', '$min', '$year', '$month', '$day')";

  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

else {

echo "Error";

}

}

else {

  $sql = "SELECT user_id FROM work_times WHERE user_id = '$user_id' AND status = '0'";
  $result = mysqli_query($conn, $sql);

  if (!mysqli_num_rows($result) == 0) {

    $sql = "INSERT INTO work_times (user_id, status, end_work_time_hr, end_work_time_min, end_work_date_year, end_work_date_month, end_work_date_day)
    VALUES ('$user_id', '1', '$hour', '$min', '$year', '$month', '$day')";

    if (mysqli_query($conn, $sql)) {
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

  }

  else {

  echo "Error";

  }

}

mysqli_close($conn);

/*$conn = mysqli_connect($mysql_server, $server_username, $server_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}*/

?>
