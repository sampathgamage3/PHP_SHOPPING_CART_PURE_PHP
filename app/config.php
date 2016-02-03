<?php
if(!session_start()){
    session_start();
}
include 'Controller/DB.php';

global $db,$dbcon;
$db = new DB();
$dbcon = $db->connect_db();
$browser_t = "View";

include 'Controller/Login_controller.php';
include 'Controller/Product_controller.php';

$current_page_uri = $_SERVER['REQUEST_URI'];
$part_url = explode("/", $current_page_uri);
$page_name = end($part_url);
$email_id = "sampathgamage3@gmail.com";
$file_url = 'http://'.$_SERVER['HTTP_HOST'].'/'. $part_url[1];
$login = new Login_controller();

?>
