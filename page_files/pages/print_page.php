<!--http://albert-gonzalez.github.io/easytimer.js/-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">

	<?php

		if (isset($_SESSION["user_id"])) {
			require "page_files".DIRECTORY_SEPARATOR."page_parts".DIRECTORY_SEPARATOR."page_part_print.php";
		}
		else {
			require "page_files".DIRECTORY_SEPARATOR."page_parts".DIRECTORY_SEPARATOR."page_part_small_boxes_no_logged.php";
		}

	?>


  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
