<?php

switch ($page_id) {
  case '0':
    $navbar_class_active_admin = "active";
	$navbar_class_active_users = "";
	$navbar_class_active_clock_admin = "";
    break;
	
  case '1':
    $navbar_class_active_admin = "";
	$navbar_class_active_users = "active";
	$navbar_class_active_clock_admin = "";
    break;

  case '2':
    $navbar_class_active_admin = "";
	$navbar_class_active_users = "";
	$navbar_class_active_clock_admin = "active";
    break;
}

?>
