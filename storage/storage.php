<?php

	function data_read() {
		$data = file_get_contents('../storage/posts.txt');
		return $data;
	}
	function create_string($id, $title, $content, $date){

		return $id.";".$title.";".$content.";".$date."~";

	}

	function data_write($string) {
		$file = '../storage/posts.txt';
		file_put_contents($file, $string, FILE_APPEND | LOCK_EX);

	}



	function parse($data){
			$post_array = explode("~", $data);
			return $post_array;
	}


	function get_one_post(){
		$data=data_read();
		$post_array = parse($data);
		$i = 0;
		foreach($post_array as $p){
			list($id, $title, $content, $date) = explode(";", $p);
			if($title!=""){
				$posts_map[$i] =["id"=> $id, "title"=>$title, "content"=> $content, "date"=> $date];
				$i++;
		}
		}
		return $posts_map;
	}




//HERE'S GOING TO BE POSTS SAVING!
?>
