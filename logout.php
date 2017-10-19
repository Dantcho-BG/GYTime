<?php

	session_start();

	unset($_SESSION["user_id"]);
	if (isset($_COOKIE["user_id"])) {
		setcookie("user_id", "", time() + (86400 * 30), "/", "projectupdates.co.uk"); // 86400 = 1 day
	}

	header ("Location: index.php");

?>
