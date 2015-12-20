<?php
class FileHandler implements Handler {
  private $file_name = '../storage/posts.txt';

  public	function write_data($id, $title, $content,$data) {
      $post = $this->create_string($id, $title,  $content,$data);
      file_put_contents($this->file_name, $post, FILE_APPEND | LOCK_EX);
    }

    public function get_all_posts(){
      $data = file_get_contents($this->file_name);
      $post_array = explode("~", $data);
      foreach($post_array as $p){
        list($id, $title, $content, $date) = explode(";", $p);
        if($title!=""){
          $posts[] = new Post($id, $title, $content, $date);
        }
      }
      return $posts;
    }

    public function add_new_post($title, $content){
      $posts = $this->get_all_posts();
      if($posts != null){
        $id = end($posts)->get_id()+1;
      }
      else $id = 0;
      $date = date('Y h:i:s A');
      $post = new Post($id, $title, $content, $date);
      file_put_contents($this->file_name, $post->toString(), FILE_APPEND | LOCK_EX);
    }

    public function delete_post($id){
      $posts = $this->get_all_posts();
      foreach($posts as $post){
        if($post->get_id() == $id){
           $delete_string = $post->toString();
           break;
        }
      }
      $data = file_get_contents($this->file_name);
      $new_str = str_replace($delete_string, "",$data );
      if($post != null)
        file_put_contents($this->file_name, $new_str);
    }
}
