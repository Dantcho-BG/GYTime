<?php

session_start();

date_default_timezone_set("Europe/London");

$year = date("Y");
$month = date("m");
$day = date("d");

$hour = date("H");
$min = date("i");

$already_checked_in_before = 0;
$hour_to_display = 00;

$user_id = $_SESSION["user_id"];

require_once "db".DIRECTORY_SEPARATOR."config.php";

$conn = mysqli_connect($mysql_server, $server_username, $server_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT user_id FROM work_times WHERE user_id = '$user_id' AND start_work_date_year = '$year' AND start_work_date_month = '$month' AND start_work_date_day = '$day'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {

  $already_checked_in_before = 1;

}

if ($already_checked_in_before == 1) {

  $sql = "SELECT user_id, start_work_time_hr, start_work_time_min FROM work_times WHERE user_id = '$user_id' AND start_work_date_year = '$year' AND start_work_date_month = '$month' AND start_work_date_day = '$day'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $start_hr = $row["start_work_time_hr"];
      $start_min = $row["start_work_time_min"];
    }

  }

  $sql = "UPDATE work_times SET status = '0' WHERE user_id = '$user_id' AND start_work_date_year = '$year' AND start_work_date_month = '$month' AND start_work_date_day = '$day'";

  if (mysqli_query($conn, $sql)) {
    //echo "";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }


  $start_time = $start_hr.":".$start_min;

  $time_now = $hour.":".$min;

  $start_time = strtotime($start_time);
  $time_now = strtotime($time_now);
  $difference = $time_now - $start_time;

  //Convert to minutes
  $difference = $difference / 60;
  $difference = $difference * 6;

  echo $difference;

}

else {

  $sql = "INSERT INTO work_times (user_id, status, start_work_time_hr, start_work_time_min, start_work_date_year, start_work_date_month, start_work_date_day)
  VALUES ('$user_id', '0', '$hour', '$min', '$year', '$month', '$day')";

  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

mysqli_close($conn);

?>
