<?php
require_once("../include/model/post.php");
require_once("../include/storage/storage.php");
require_once("../include/storage/handler.php");
require_once("../include/storage/file_handler.php");
require_once("../include/storage/json_handler.php");
require_once("../include/storage/database_handler.php");

Storage::getInstance()->setHandler(new DatabaseHandler());

if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = "";

if($action == "add") {
	if(!empty($_POST))
		Storage::getInstance()->write_data($_POST['title'], $_POST['content']);
	}

if($action == "delete"){
	if (isset($_GET['id']))
		Storage::getInstance()->delete($_GET['id']);
}

Storage::getInstance()->read_data();
require_once("../view/index.html.php");

?>
