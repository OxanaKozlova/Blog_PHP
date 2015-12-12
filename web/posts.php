<?php
static $idCount = 0;
	function posts_all() {
		return	get_one_post();
	}

	function posts_get($id) {
		return ["id" => 1, "title" => "Title1", "date" => "08.12.15", "content" => "Content1"];
	}

	function posts_new($title, $content) {
		 data_write(create_string($idCount+1, $title, $content, 'date'));
		 $idCount = $idCount+1;
	}

	function posts_added() {

	}

	function posts_edit($id, $title, $date, $content) {

	}

	function posts_delete($id) {


	}
?>
