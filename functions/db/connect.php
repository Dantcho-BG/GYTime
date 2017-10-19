<?php

require_once "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."config.php";

$conn = mysqli_connect($mysql_server, $server_username, $server_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

?>
