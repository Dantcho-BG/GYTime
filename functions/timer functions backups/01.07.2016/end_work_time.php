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

  $sql = "UPDATE work_times SET STATUS = '1', LAST_CLOCLOUT = '$time' WHERE STATUS = '0' AND UID = '$user_id' AND DATETIME = '$date'";

  if (mysqli_query($conn, $sql)) {
    //echo "";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

  $sql = "SELECT LAST_CLOCKIN, LAST_CLOCLOUT FROM work_times WHERE UID = '$user_id' AND DATETIME = '$date'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $last_clockin = $row["LAST_CLOCKIN"];
      $last_clockout = $row["LAST_CLOCLOUT"];
    }

  }
  
  $start_time = $start_work;

  echo $start_time."<br>";

  $end_time = $end_work;

  echo $end_time."<br>";

  $start_time = strtotime($start_time);
  $end_time = strtotime($end_time);

  echo $start_time." - Start time from DB converted to time. :D<br>";
  echo $end_time." - End time from DB converted to time. :D<br>";

  if ($end_time > $start_time) {
	$difference = $end_time - $start_time;
  }

  else {
	$difference = $start_time - $end_time;
  }

  //Convert to minutes
  $difference = $difference / 60;
  $difference = $difference * 6;
  $difference = $difference / 6;

  function convertToHoursMins($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
	}

	echo $difference."<br>";

  $worked_time = convertToHoursMins($difference, '%02d-%02d');

  echo $worked_time." - Converted to hours and mins<br>";

  $worked_time = explode("-", $worked_time);

  echo $worked_time[0]." - Hours to write in the db<br>";
  echo $worked_time[1]." - Minutes to write in the db<br>";
  
  $worked_time_to_db = $worked_time[0].":".$worked_time[1];
  
  echo $worked_time_to_db." - Worked Time To Write In The DB<br>";

  //Do tuk dobre

  $sql = "SELECT worked_time FROM work_times WHERE user_id = '$user_id' AND status = '1' AND start_date = '$date'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $worked_time = $row["worked_time"];
	  echo $worked_time." - Worked time from db<br>";
    }

  }
  
  if (!$worked_time == NULL) {
	  
	  function secondsToTime($seconds)
		{
    // extract hours
    $hours = floor($seconds / (60 * 60));
 
    // extract minutes
    $divisor_for_minutes = $seconds % (60 * 60);
    $minutes = floor($divisor_for_minutes / 60);
 
    // extract the remaining seconds
    $divisor_for_seconds = $divisor_for_minutes % 60;
    $seconds = ceil($divisor_for_seconds);
 
    // return the final array
    $obj = array(
        "h" => (int) $hours,
        "m" => (int) $minutes,
        "s" => (int) $seconds,
    );
    return $obj;
}
		
		echo $worked_time." - Worked time From DB<br>";
		echo $worked_time_to_db." - Worked time to Add In The DB<br>";
		
		$worked_time = explode(":", $worked_time);
		
		$worked_time_to_db = explode(":", $worked_time_to_db);
		
		echo $worked_time[0]." - Worked time From DB HR<br>";
		echo $worked_time[1]." - Worked time to Add In The DB MIN<br>";
		echo $worked_time_to_db[0]." - Worked time From DB HR<br>";
		echo $worked_time_to_db[1]." - Worked time to Add In The DB MIN<br>";
		
		$worked_time_hr_from_db_sec = $worked_time[0] * 3600;
		$worked_time_min_from_db_sec = $worked_time[1] * 60;
		$worked_time_hr_to_add_sec = $worked_time_to_db[0] * 3600;
		$worked_time_min_to_add_sec = $worked_time_to_db[1] * 60;
		
		echo $worked_time_hr_from_db_sec."worked_time_hr_from_db_sec<br>";
		echo $worked_time_min_from_db_sec."worked_time_min_from_db_sec<br>";
		
		$seconds_hr = $worked_time[0] + $worked_time_to_db[0];
		$seconds_min = $worked_time[1] +$worked_time_to_db[1];
		
		echo $seconds_hr." - Seconds HR<br>";
		echo $seconds_min." - Seconds MIN<br>";
		
		$converted_hrs = secondsToTime($seconds_hr);
		$converted_mins = secondsToTime($seconds_min);
		
		echo var_dump ($converted_hrs)."<br>";
		echo var_dump ($converted_mins)."<br>";
		
		$converted_hrs_to_add = $converted_hrs["h"] + $converted_mins["h"];
		
		echo $converted_hrs["h"]."<br>";
		echo $converted_mins["h"]."<br>";
		
		echo $converted_hrs_to_add." - Converted HRS To Add<br>";
		
		$worked_time_to_save_in_the_db = $converted_hrs_to_add.":".$converted_mins["m"];
		
		echo var_dump($worked_time_to_save_in_the_db);
		
		$sql = "UPDATE work_times SET worked_time = '$worked_time_to_save_in_the_db' WHERE user_id = '$user_id' AND end_date = '$date'";

		if (mysqli_query($conn, $sql)) {
			//echo "";
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}

	}
	else {
		
		echo "edno<br>";
		
		$sql = "UPDATE work_times SET worked_time = '$worked_time_to_db' WHERE user_id = '$user_id' AND end_date = '$date'";

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