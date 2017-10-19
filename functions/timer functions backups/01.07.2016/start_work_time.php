<?php

session_start();

date_default_timezone_set("Europe/London");

$year = date("Y");
$month = date("m");
$day = date("d");

$date = $year."-".$month."-".$day;

$hour = date("G");
$min = date("i");
$sec = date("s");

$time = $hour.":".$min.":".$sec;

$already_checked_in_before = 0;

$user_id = $_SESSION["user_id"];

require_once "db".DIRECTORY_SEPARATOR."config.php";

$conn = mysqli_connect($mysql_server, $server_username, $server_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT UID FROM work_times WHERE UID = '$user_id' AND STATUS = '1' AND DATETIME = '$date'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
	
  //Check if the user clocked out before.

  $already_checked_in_before = 1;

}

if ($already_checked_in_before == 1) {
	
  //If the user clocked in, out and then again in.
	
	//If the sql query on line 45 doesn't work use this! (There is a bug in this sql query but it works for most of the times.)
	//$sql = "SELECT worked_time FROM work_times WHERE user_id = '$user_id' AND status = '1' AND start_date = '$date'";

  $sql = "SELECT TOTAL_CLOCKTIME FROM work_times WHERE UID = '$user_id' AND STATUS = '1' AND DATETIME = '$date'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $worked_time = $row["TOTAL_CLOCKTIME"];
    }

  }
  
  //If the sql query on line 59 doesn't work use this! (I think there is a bug in this sql but I'm not sure.)
  //$sql = "UPDATE work_times SET status = '0', start_work = '$time' WHERE user_id = '$user_id' AND start_date = '$date'";

  $sql = "UPDATE work_times SET STATUS = '0', LAST_CLOCKIN = '$time' WHERE UID = '$user_id' AND DATETIME = '$date'";

  if (mysqli_query($conn, $sql)) {
    //echo "";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
  
  list($hours,$mins,$secs) = explode(':',$worked_time);
  
  $worked_time_hrs_in_secs = $hours * 3600;
  $worked_time_mins_in_secs = $mins * 60;
  
  $start_timer_from = $worked_time_hrs_in_secs + $worked_time_mins_in_secs + $secs;

  echo $start_timer_from;

}

else {
	
  //If the user is clocked for first time in the system for today

  $sql = "INSERT INTO work_times (UID, STATUS, LAST_CLOCKIN, DATETIME)
  VALUES ('$user_id', '0', '$time', '$date')";

  if (mysqli_query($conn, $sql)) {
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

}

mysqli_close($conn);

?>
