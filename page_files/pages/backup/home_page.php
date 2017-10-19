<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Home
      <small>This is home page.</small>
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
	}
	?>
		<div class="box box-info"><!-- box -->
      <div class="box-header with-border">
        <h3 class="box-title">Change Yuor Public Information</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
			<div class="box-body">
			<h2>What we do</h2>
			<!-- /.page heading -->
			<!-- page desc -->
			<p>We detect and reckon your working time or the working hours of your employees.</p>
			<!-- /.page desc -->
			<h2>What you can do in this website</h2>
			<p>You can detect your working time or to detect the working time of your employees. In the page Clock page you can clock in, start your coffee time or lunch and clock out. Also you can see in the page status how much time you're worked, your how much brakes you're had and how long are they.</p>
		</div>
	</div><!-- /.box -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
