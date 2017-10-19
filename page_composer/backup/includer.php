<?php

  if (isset ($_SESSION["remember_me"])) {
    if ($_SESSION["remember_me"] == 1) {
      $user_id = $_SESSION["user_id"];
	  echo "asd";
      setcookie("user_id", $user_id, time() + (86400 * 30), "/", "projectupdates.co.uk"); // 86400 = 1 day
      $_SESSION['remember_me'] = 0;
    }
  }

  if (isset($_COOKIE["user_id"])) {
    if (!empty($_COOKIE["user_id"])) {
      if (!$_COOKIE["user_id"] == 0) {
        $_SESSION["user_id"] = $_COOKIE["user_id"];
      }
    }
  }

  require 'config.php';
  require 'page_composer'.DIRECTORY_SEPARATOR.'controler.php';
  require 'page_files'.DIRECTORY_SEPARATOR.'header.php';
  require 'page_files'.DIRECTORY_SEPARATOR.'page_parts'.DIRECTORY_SEPARATOR.'page_part_header.php';
  require 'page_files'.DIRECTORY_SEPARATOR.'page_parts'.DIRECTORY_SEPARATOR.'page_part_left_sidebar.php';
  require 'page_files'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR."$page_content";
  require 'page_files'.DIRECTORY_SEPARATOR.'page_parts'.DIRECTORY_SEPARATOR.'page_part_footer.php';
  require 'page_files'.DIRECTORY_SEPARATOR.'page_parts'.DIRECTORY_SEPARATOR.'page_part_controlsidebar.php';
  require 'page_files'.DIRECTORY_SEPARATOR.'footer.php';

?>
