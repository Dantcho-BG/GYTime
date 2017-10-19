<?php

	/*require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

	
	$user_id = $_SESSION["user_id"];
	$sql = "SELECT worked_time, f_start_work, start_date, end_date password FROM work_times WHERE user_id='$user_id'";
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()) {
    $worked_time=$row["worked_time"];
	$f_start_work=$row["f_start_work"];
    $start_date=$row["start_date"];
	$end_date=$row["end_date"];
	}*/
	
	$worked_time_db = 360;
	$brake_time_db = 60;
	
	$worked_time_hr = $worked_time_db /60;
	$worked_time_min = 32;
	
?>