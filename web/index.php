<?php
require_once("posts.php");

require_once("../storage/storage.php");



function write_json_string($post){
	$json = file_get_contents('../storage/posts.json');
	$json = json_decode($json, true);
  $json = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
  $json = json_encode($json, JSON_UNESCAPED_UNICODE);
  file_put_contents('../storage/posts.json', $json);
}
write_json_string("asdasdasd");

$post = posts_get($_GET['id']);
$posts = posts_all();

if(isset($_GET['action']))
	$action = $_GET['action'];
else
	$action = "";

if($action == "add") {
	if(!empty($_POST)) {
		//	header("Location: index.php");
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
