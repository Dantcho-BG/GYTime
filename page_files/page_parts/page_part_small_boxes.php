<?php

$worked_time = NULL;

$year = date("Y");
$month = date("m");
$day = date("d");

$date = $day."/".$month."/".$year;

$hour = date("G");
$min = date("i");

$time = $hour.":".$min;

require_once "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

$sql = "SELECT worked_time, status FROM work_times WHERE user_id = '$user_id' AND status = '1' AND end_date = '$date'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $worked_time = $row["worked_time"];
    }

  }
  
  mysqli_close($conn);
  
  if ($worked_time == NULL) {
	$today_worked_time = "00hr 00min";
	$work_box_text = "You haven't worked today yet.";
  }
  
  else {
	list($hours,$mins) = explode(':',$worked_time);
	if ($hours >= 02) {
		$hr_or_hrs = "hrs";
	}
	
	else {
		$hr_or_hrs = "hr";
	}
	$worked_time = $hours.$hr_or_hrs." ".$mins."min";
	$today_worked_time = $worked_time;
	$work_box_text = "That is your time for today.";
  }

?>

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $today_worked_time; ?></h3>
            <p><?php echo $work_box_text; ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-social-usd"></i>
          </div>
          <div class="small-box-footer">Status <i class="fa fa-refresh"></i></div>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-6 col-xs-12">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>44</h3>
            <p>Brake</p>
          </div>
          <div class="icon">
            <i class="ion ion-coffee"></i>
          </div>
          <div class="small-box-footer">Status <i class="fa fa-refresh"></i></div>
        </div>
      </div><!-- ./col -->
    </div><!-- /.row -->
