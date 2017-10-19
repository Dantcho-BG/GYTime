<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $page_title.' - '.$website_name; ?></title>
    <link href="icons/favicon/favicon.ico" rel="shortcut icon" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-lightblue.css">
	<link rel="stylesheet" href="css/main.css">
	<?php
		if ($page_id == 2) {
			?> 
			<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
			<script src="dist/js/pages/dashboard.js"></script>
			<script src="dist/js/pages/dashboard2.js"></script>
			<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
			<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
			<script src="plugins/daterangepicker/daterangepicker.js"></script>
			<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
			<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
			<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
			<script src="plugins/knob/jquery.knob.js"></script>
			<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
			<?php
		}
?>
	
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
