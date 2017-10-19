<div class="box box-info"><!-- box -->
  <div class="box-header with-border">
    <h3 class="box-title">Users</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
<div class="box-body">
<p><?php

require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";

$counter = 0;

while () {

$sql = "SELECT user_id, username, first_name, last_name, email, gender, dob, profile_picture, admin FROM users WHERE user_id='$counter'";
$result = $conn->query($sql);

$number_of_users = $result->num_rows;

if ($number_of_users == 0) {

}

$counter = 1;

  while($row = $result->fetch_assoc()) {
    $user_id = $row["user_id"];
    $counter ++;
  }

}

mysqli_close($conn);

?></p>

<ul class="list-group">
<li class="list-group-item">
  <div id="stats_table">
    <table class="table table-bordered">
      <tr>
        <td>User ID: <?php echo $user_id ;?></td>
        <td>Username: </td>
        <td>First Name: </td>
        <td>Last Name: </td>
        <td>Email: </td>
        <td>Gender: </td>
        <td>DoB: </td>
        <td>Profile Picture: </td>
        <td>Admin: </td>
        <td>Action: </td>
      </tr>
    </table>
  </div>
</li>
<li class="list-group-item">Dapibus ac facilisis in</li>
<li class="list-group-item">Morbi leo risus</li>
<li class="list-group-item">Porta ac consectetur ac</li>
<li class="list-group-item">Vestibulum at eros</li>
</ul>

</div>

<div class="box-footer">
    <ul class="pagination col-md-12">
      <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
      <li class=""><a href="#">1 <span class="sr-only"></span></a></li>
      <li class=""><a href="#">2 <span class="sr-only"></span></a></li>
      <li class=""><a href="#">3 <span class="sr-only"></span></a></li>
      <li class="active"><a href="#">4 <span class="sr-only">(current)</span></a></li>
      <li class=""><a href="#">5 <span class="sr-only"></span></a></li>
      <li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
    </ul>
</div>
</div>
</div><!-- /.box -->
