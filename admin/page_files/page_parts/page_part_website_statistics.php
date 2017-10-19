<div class="box box-info"><!-- box -->
  <div class="box-header with-border">
    <h3 class="box-title">What is this?</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
<div class="box-body">
<h4>This is a page that shows the stats of this website.</h4>
<p>For example you can see how many users are registered.</p>
</div>
</div><!-- /.box -->

<div class="box box-info"><!-- box -->
  <div class="box-header with-border">
    <h3 class="box-title">Stats</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
<div class="box-body">
<h4>Number of registered users:</h4>
<p><?php

require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

$sql = "SELECT username FROM users";
$result = $conn->query($sql);

$number_of_users = $result->num_rows;

mysqli_close($conn);

echo $number_of_users;

?></p>
<h4>Server time:</h4>
<p>
<?php

  echo date("G:i:s");

?>
</p>
<h4>Server date:</h4>
<p>
<?php

  echo date("Y-M-d");

?>
</p>
<h4>Server timezone:</h4>
<p>
<?php

  echo date_default_timezone_get();

?>
</p>
</div>
</div><!-- /.box -->

<div class="box box-info"><!-- box -->
  <div class="box-header with-border">
    <h3 class="box-title">Information about the website</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
<div class="box-body">
<h4>Website name:</h4>
<p><?php echo $website_name; ?></p>
<h4>Creators:</h4>
<p>Yordan Hristov (Dantcho) and Georgi Aleksandrov (Krezme)</p>
</div>
</div><!-- /.box -->
