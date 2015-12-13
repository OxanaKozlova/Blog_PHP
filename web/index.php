<?php
require_once("posts.php");
require_once("storage.php");
require_once("handler.php");
require_once("file_handler.php");
require_once("json_handler.php");

$storage = Storage::getInstance();
$storage->setHandler(new FileHandler());
$storage->setID();
$post = posts_get($_GET['id']);
$posts = posts_all();

if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = "";
if($action == "add") {
	if(!empty($_POST)) {
		$posts = posts_new($_POST['title'], $_POST['content']);
		$posts = posts_all();
	}
	require_once("../view/index.html.php");
}
else {
	require_once("../view/index.html.php");
		$posts = posts_all();
}

?>
