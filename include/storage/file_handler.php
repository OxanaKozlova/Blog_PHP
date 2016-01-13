<?php
class FileHandler implements Handler {

  public function write_data($id, $title, $content,$data) {
      $post = $this->create_string($id, $title,  $content,$data);
      file_put_contents(Config::$path['file_name_txt'], $post, FILE_APPEND | LOCK_EX);
    }

    public function get_all_posts(){
      $data = file_get_contents(Config::$path['file_name_txt']);
      $post_array = explode("~", $data);
      $revers_posts = array_reverse($post_array);
      foreach($revers_posts as $p){
        list($id, $title, $content, $date) = explode(";", $p);
        if($title!=""){
          $posts[] = new Post($id, $title, $content, $date);
        }
      }
      return $posts;
    }

    public function add_new_post($title, $content){
      $posts_revers = $this->get_all_posts();
      $posts = array_reverse($posts_revers);
      if($posts != null){
        $id = end($posts)->get_id()+1;
      }
      else $id = 0;
      $date = date('Y h:i:s A');
      $post = new Post($id, $title, $content, $date);
      file_put_contents(Config::$path['file_name_txt'], (String)$post, FILE_APPEND | LOCK_EX);
    }

    public function delete_post($id){
      $posts_revers = $this->get_all_posts();
      $posts = array_reverse($posts_revers);
      foreach($posts as $post){
        if($post->get_id() == $id){
           $delete_string = (String)$post;
           break;
        }
      }
      $data = file_get_contents(Config::$path['file_name_txt']);
      $new_str = str_replace($delete_string, "",$data );
      if($post != null)
        file_put_contents(Config::$path['file_name_txt'], $new_str);
    }
}
