<?php

$page_id_0['title']='Home';
$page_id_0['content']='home_page.php';

$page_id_1['title'] = 'Clock';
$page_id_1['content'] = 'clock_page.php';

$page_id_2['title'] = 'Statistics';
$page_id_2['content'] = 'statistics_page.php';

$page_id_3['title'] = 'Login';
$page_id_3['content'] = 'login_page.php';

$page_id_4['title'] = 'Register';
$page_id_4['content'] = 'register_page.php';

$page_id_5['title'] = 'Profile';
$page_id_5['content'] = 'profile_page.php';

$page_id_6['title'] = 'Public Information';
$page_id_6['content'] = 'p_p_info_page.php';

$page_id_7['title'] = 'Private Information';
$page_id_7['content'] = 'pr_p_info_page.php';

$page_id_8['title'] = 'Change Profile Picture';
$page_id_8['content'] = 'change_profile_picture_page.php';

$page_id_9['title'] = 'Print';
$page_id_9['content'] = 'print_page.php';

switch ($page_id) {
  case '0':
    $page_title = $page_id_0['title'];
    $page_content = $page_id_0['content'];
    break;

  case '1':
    $page_title = $page_id_1['title'];
    $page_content = $page_id_1['content'];
    break;

  case '2':
    $page_title = $page_id_2['title'];
    $page_content = $page_id_2['content'];
    break;

  case '3':
    $page_title = $page_id_3['title'];
    $page_content = $page_id_3['content'];
    break;

  case '4':
    $page_title = $page_id_4['title'];
    $page_content = $page_id_4['content'];
    break;

  case '5':
    $page_title = $page_id_5['title'];
    $page_content = $page_id_5['content'];
    break;

  case '6':
    $page_title = $page_id_6['title'];
    $page_content = $page_id_6['content'];
    break;

  case '7':
    $page_title = $page_id_7['title'];
    $page_content = $page_id_7['content'];
    break;

  case '8':
    $page_title = $page_id_8['title'];
    $page_content = $page_id_8['content'];
    break;
	
	case '9':
    $page_title = $page_id_9['title'];
    $page_content = $page_id_9['content'];
    break;
}

include 'active_menu_button_controler.php'

?>
