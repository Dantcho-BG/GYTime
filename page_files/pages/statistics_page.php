<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Statistics Page
      <small>This is statistics page.</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-clock-o"></i> GYTime</a></li>
      <li class="active">Here</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
  <?php

		if (isset($_SESSION["user_id"])) {
			require "page_files".DIRECTORY_SEPARATOR."page_parts".DIRECTORY_SEPARATOR."page_part_small_boxes.php";
			require 'page_files'.DIRECTORY_SEPARATOR.'page_parts'.DIRECTORY_SEPARATOR.'page_part_alerts_section.php';
			require "page_files".DIRECTORY_SEPARATOR."page_parts".DIRECTORY_SEPARATOR."page_part_statistics.php";
		}
		else {
			require "page_files".DIRECTORY_SEPARATOR."page_parts".DIRECTORY_SEPARATOR."page_part_small_boxes_no_logged.php";
		}
	?>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
