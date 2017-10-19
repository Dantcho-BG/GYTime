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

$sql = "SELECT UID FROM work_times WHERE STATUS = '0' AND UID = '$user_id' AND DATETIME = '$date'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
	$already_checked_in_before = 1;
}

if ($already_checked_in_before == 1) {

  $sql = "UPDATE work_times SET STATUS = '1', LAST_CLOCKOUT = '$time' WHERE STATUS = '0' AND UID = '$user_id' AND DATETIME = '$date'";

  if (mysqli_query($conn, $sql)) {
    //echo "";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

  $sql = "SELECT LAST_CLOCKIN, LAST_CLOCKOUT FROM work_times WHERE UID = '$user_id' AND DATETIME = '$date'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $last_clockin = $row["LAST_CLOCKIN"];
      $last_clockout = $row["LAST_CLOCKOUT"];
    }

  }
  
  function secondsToTime($seconds) {
    $dtF = new \DateTime('@00');
    $dtT = new \DateTime("@$seconds");
    return $dtF->diff($dtT)->format('%h:%i:%s');
  }
  
  $last_clockin_in_time = strtotime($last_clockin);
  $last_clockout_in_time = strtotime($last_clockout);
  
  $worked_time_to_db = $last_clockin_in_time - $last_clockout_in_time;
  
  $worked_time_to_db = secondsToTime($worked_time_to_db);

  $sql = "SELECT TOTAL_CLOCKTIME FROM work_times WHERE UID = '$user_id' AND STATUS = '1' AND DATETIME = '$date'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $worked_time = $row["TOTAL_CLOCKTIME"];
    }

  }
  
  if ($worked_time != "00:00:00") {
	  
	  list($hours[0],$mins[0],$secs[0]) = explode(':',$worked_time);
	  list($hours[1],$mins[1],$secs[1]) = explode(':',$worked_time_to_db);
	  
	  $worked_time_in_secs = (($hours[0] * 60) * 60) + ($mins[0] * 60) + $secs[0];
	  $worked_time_to_db_in_secs = (($hours[1] * 60) * 60) + ($mins[1] * 60) + $secs[1];
	  
	  $worked_time_to_save_in_the_db_in_secs = $worked_time_in_secs + $worked_time_to_db_in_secs;
	  
	  $worked_time_to_save_in_the_db = secondsToTime($worked_time_to_save_in_the_db_in_secs);
	  
	  $sql = "UPDATE work_times SET TOTAL_CLOCKTIME = '$worked_time_to_save_in_the_db' WHERE UID = '$user_id' AND DATETIME = '$date'";

		if (mysqli_query($conn, $sql)) {
			//echo "";
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
	  
  }
  else {
		
	$sql = "UPDATE work_times SET TOTAL_CLOCKTIME = '$worked_time_to_db' WHERE UID = '$user_id' AND DATETIME = '$date'";

	if (mysqli_query($conn, $sql)) {
		//echo "";
	} else {
		echo "Error updating record: " . mysqli_error($conn);
	}
		
  }

}

else {
	echo "Error Not Clocked In Before";
}

mysqli_close($conn);

?>