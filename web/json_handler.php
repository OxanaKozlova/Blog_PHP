<?php
class JSonHandler implements Handler {

    public function read_data(){

    }

    public function write_data($id, $title, $content, $data){
      $post = array("id"=>$id, "title"=>$title, "content"=> $content, "data"=>$data);
      $json[] = $post;
      $json = json_encode($json);
      file_put_contents('../storage/posts.json', $json , FILE_APPEND | LOCK_EX);
    } 
}