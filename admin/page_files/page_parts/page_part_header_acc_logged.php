<?php

    require "functions".DIRECTORY_SEPARATOR."db".DIRECTORY_SEPARATOR."connect.php";



    $user_id = $_SESSION["user_id"];

    $sql = "SELECT username, first_name, last_name, profile_picture FROM users WHERE user_id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $username=$row["username"];
        $first_name=$row["first_name"];
        $last_name=$row["last_name"];
        $profile_picture_link=$row["profile_picture"];
      }
    } else {
      echo "0 results";
    }

?>

<!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" id="hide_acc_button" class=" dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
				  <img src="../icons/<?php echo $profile_picture_link; ?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span id="hide_acc_button">My profile</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="../icons/<?php echo $profile_picture_link; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $first_name." ".$last_name; ?>
                      <small><?php echo $username; ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-6 text-center">
                      <a href="#">Friends</a>
                    </div>
                    <div class="col-xs-6 text-center">
                      <a href="change_profile_picture.php">Change Profile Picture</a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
