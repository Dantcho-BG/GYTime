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

$time = "10:59";

$already_checked_in_before = 0;

$user_id = $_SESSION["user_id"];

require_once "db".DIRECTORY_SEPARATOR."config.php";

$conn = mysqli_connect($mysql_server, $server_username, $server_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT user_id FROM work_times WHERE status = '0' AND user_id = '$user_id' AND start_date = '$date'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
	$already_checked_in_before = 1;
}

if ($already_checked_in_before == 1) {

  $sql = "UPDATE work_times SET status = '1', end_work = '$time', end_date = '$date' WHERE status = '0' AND user_id = '$user_id' AND start_date = '$date'";

  if (mysqli_query($conn, $sql)) {
    //echo "";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }

  $sql = "SELECT start_work, end_work FROM work_times WHERE user_id = '$user_id' AND start_date = '$date'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $start_work = $row["start_work"];
      $end_work = $row["end_work"];
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
		
		echo $worked_time."<hr> - Worked Time From DB<br>";
		
		echo $worked_time_to_db." - Worked Time To Add<br>";

		//$worked_time = strtotime($worked_time);
		//$worked_time_to_db = strtotime($worked_time_to_db);
		
		//echo $worked_time." - Worked Time From DB Convertet to time<br>";
		//echo $worked_time_to_db." - Worked Time To Add Convertet to time<br>";
		
		//Convert to minutes
		
		//Maybe I don't need this code.
		/*$worked_time_from_db = date("i", $worked_time_from_db);
		$worked_time_to_add = date("i", $worked_time_to_add);
		
		echo $worked_time_from_db." - Worked Time From DB Converted with zeros<br>";
		echo $worked_time_to_add." - Worked Time To Add Converted with zeros<br>";
		
		//Convert to seconds*/
		
		$worked_time = $worked_time * 60;
		$worked_time_to_db = $worked_time_to_db * 60;
		
		echo $worked_time." - Worked Time From DB Converted To Seconds<br>";
		echo $worked_time_to_db." - Worked Time To Add Converted To Seconds<br>";
		
		$worked_time_from_db = (int)$worked_time_from_db;
		$worked_time_to_add = (int)$worked_time_to_add;

        $worked_time = $worked_time_from_db + $worked_time_to_add;
		
		echo $worked_time." - Worked Time After Addidng The New Time To The Old Time<br>";

		//Convert to minutes
		/*$difference = $difference / 60;
		$difference = $difference * 6;
		$difference = $difference / 6;*/
		
		//$difference = date("s", $worked_time);
		
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
		
		$worked_time = secondsToTime($worked_time);

		//$worked_time = convertToHoursMins($worked_time, '%02d-%02d');

		echo $worked_time["h"]." - Worked Time To Write In The DB HR<br>";
		echo $worked_time["m"]." - Worked Time To Write In The DB MIN<br>";

		//$worked_time = explode("-", $worked_time);
		
		$worked_time[0] = $worked_time["h"];
		$worked_time[1] = $worked_time["m"];
		
		$sql = "UPDATE work_times SET worked_time_hr = '$worked_time[0]', worked_time_min = '$worked_time[1]' WHERE user_id = '$user_id' AND end_work_date_year = '$year' AND end_work_date_month = '$month' AND end_work_date_day = '$day'";

		if (mysqli_query($conn, $sql)) {
			//echo "";
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
		
		echo "dve";

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
