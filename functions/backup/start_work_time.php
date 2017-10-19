<?php

session_start();

date_default_timezone_set("Europe/London");

$year = date("Y");
$month = date("m");
$day = date("d");

$date = $day."/".$month."/".$year;

$hour = date("G");
$min = date("i");

$time = $hour.":".$min;

$already_checked_in_before = 0;
$hour_to_display = 00;

$user_id = $_SESSION["user_id"];

require_once "db".DIRECTORY_SEPARATOR."config.php";

$conn = mysqli_connect($mysql_server, $server_username, $server_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT user_id FROM work_times WHERE user_id = '$user_id' AND status = '1' AND start_date = '$date'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {

  $already_checked_in_before = 1;

}

if ($already_checked_in_before == 1) {
	
	//If the sql query on line 45 doesn't work use this! (There is a bug in this sql query but it works for most of the times.)
	//$sql = "SELECT worked_time FROM work_times WHERE user_id = '$user_id' AND status = '1' AND start_date = '$date'";

  $sql = "SELECT worked_time FROM work_times WHERE user_id = '$user_id' AND status = '1' AND end_date = '$date'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $worked_time = $row["worked_time"];
    }

  }
  
  //If the sql query on line 59 doesn't work use this! (I think there is a bug in this sql but I'm not sure.)
  //$sql = "UPDATE work_times SET status = '0', start_work = '$time' WHERE user_id = '$user_id' AND start_date = '$date'";

  $sql = "UPDATE work_times SET status = '0', start_work = '$time' WHERE user_id = '$user_id' AND start_date = '$date'";

  if (mysqli_query($conn, $sql)) {
    //echo "";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  
  list($hours,$mins) = explode(':',$worked_time);
  
  $worked_time_hr = $hours * 3600;
  $worked_time_min = $mins * 60;
  
  $start_timer_from = $worked_time_hr + $worked_time_min;

  echo $start_timer_from;

}

else {

  $sql = "INSERT INTO work_times (user_id, status, start_work, start_date)
  VALUES ('$user_id', '0', '$time', '$date')";

  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

mysqli_close($conn);

?>
