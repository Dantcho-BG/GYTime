<?php

  if (isset($_SESSION["admin"])) {
	  if ($_SESSION["admin"] == 1) {
		  
		$user_id = $_SESSION["user_id"];
		  
		require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";
						
		$sql = "SELECT admin FROM users WHERE user_id='$user_id'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				$is_admin_secure = $row["admin"];
			}
		}
						
		mysqli_close($conn);
		
		if ($is_admin_secure == 1) {
			require 'config.php';
			require 'page_composer'.DIRECTORY_SEPARATOR.'controler.php';
			require 'page_files'.DIRECTORY_SEPARATOR.'header.php';
			require 'page_files'.DIRECTORY_SEPARATOR.'page_parts'.DIRECTORY_SEPARATOR.'page_part_header.php';
			require 'page_files'.DIRECTORY_SEPARATOR.'page_parts'.DIRECTORY_SEPARATOR.'page_part_left_sidebar.php';
			require 'page_files'.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR."$page_content";
			require 'page_files'.DIRECTORY_SEPARATOR.'page_parts'.DIRECTORY_SEPARATOR.'page_part_footer.php';
			require 'page_files'.DIRECTORY_SEPARATOR.'page_parts'.DIRECTORY_SEPARATOR.'page_part_controlsidebar.php';
			require 'page_files'.DIRECTORY_SEPARATOR.'footer.php';
		}
		
		else {
			header ("Location: ../index.php");
		}
		
	  }
	  
	  else {
		  header ("Location: ../index.php");
	  }
  }
  
  else {
	  header ("Location: ../index.php");
  }

?>
