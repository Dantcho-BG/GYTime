<?php

$page_id_0['title']='Admin';
$page_id_0['content']='admin_page.php';

$page_id_1['title'] = 'Users';
$page_id_1['content'] = 'users_page.php';

$page_id_2['title'] = 'Clocking Administration';
$page_id_2['content'] = 'clock_admin_page.php';


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
}

include 'active_menu_button_controler.php';

?>
