<?php

	session_start();

	//echo "<pre>";
	//print_r($_SESSION);
	//echo "</pre>";

	if (isset($_SESSION['user_id']))
		header ("Location: index.php?msg=login_success");

  $page_id=3;
  require 'page_composer'.DIRECTORY_SEPARATOR.'includer.php';

?>
