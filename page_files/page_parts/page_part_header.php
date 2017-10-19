<body class="hold-transition skin-lightblue sidebar-mini">
  <div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

      <!-- Logo -->
      <a href="index.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>GY</b>T</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>GY</b>Time</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
           <?php

     if (isset($_SESSION["user_id"])) {
        require "page_files".DIRECTORY_SEPARATOR."page_parts".DIRECTORY_SEPARATOR."page_part_right_navbar.php";
     }
     ?>
      <?php

      if (isset($_SESSION["user_id"])) {
        require "page_files".DIRECTORY_SEPARATOR."page_parts".DIRECTORY_SEPARATOR."page_part_header_acc_logged.php";
      }
      else {
        require "page_files".DIRECTORY_SEPARATOR."page_parts".DIRECTORY_SEPARATOR."page_part_header_acc_no_logged.php";
      }

      ?>
            <!-- Control Sidebar Toggle Button -->
            <!--<li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>-->
          </ul>
        </div>
      </nav>
    </header>
