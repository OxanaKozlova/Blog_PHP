<?php
	function posts_all() {
		$storage = Storage::getInstance();
		return	$storage->readData();
	}

	function posts_get($id) {
		return ["id" => 1, "title" => "Title1", "date" => "08.12.15", "content" => "Content1"];
	}

	function posts_new($title, $content) {
		$storage = Storage::getInstance();
		date_default_timezone_set('UTC');
		$date = date('Y h:i:s A');
		$storage->writeData($storage->setID(), $title, $content, $date);
	}

	function posts_added() {
	}

	function posts_edit($id, $title, $date, $content) {
	}

	function posts_delete($id) {
	}
?>
