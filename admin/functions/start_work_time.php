<?php

session_start();

date_default_timezone_set("Europe/London");

//$time = $_REQUEST["time"];

$year = date("Y");
$month = date("F");
$day = date("d");

$date = $year."-".$month."-".$day;

$user_id = $_SESSION["user_id"];

require_once "db".DIRECTORY_SEPARATOR."config.php";

$conn = mysqli_connect($mysql_server, $server_username, $server_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT start_work_time FROM php_status WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
} else {

    $error = 0;

    //Get the data

    $user_id = $_SESSION["user_id"];
    $start_work_time_hr = date("H");
    $start_work_time_min = date("i");
    $start_work_time = $start_work_time_hr.":".$start_work_time_min;

    //Here put the code whitch will create new ZAPIS in the php_status table.

    $sql = "INSERT INTO php_status (user_id, start_work_time)
    VALUES ('$user_id', '$start_work_time')";

    if (mysqli_query($conn, $sql)) {
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

mysqli_close($conn);

/*$conn = mysqli_connect($mysql_server, $server_username, $server_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}*/

?>
