<?php
class FileHandler implements Handler {
  public	function write_data($id, $title,  $content,$data) {
      $file = '../storage/posts.txt';
      $post = $this->create_string($id, $title,  $content,$data);
      file_put_contents($file, $post, FILE_APPEND | LOCK_EX);
    }
    public function create_string($id, $title, $content, $date){
      return $id.";".$title.";".$content.";".$date."~";
    }

    private  function read_file() {
      $data = file_get_contents('../storage/posts.txt');
      return $data;
    }

    private	function parse($data){
          $post_array = explode("~", $data);
          return $post_array;
      }

    public	function read_data(){
        $data = $this->read_file();
        $post_array = $this->parse($data);
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
    public function set_id(){
      $lastPost =  count($this->read_data()) - 1;
      if(is_null($posts_map[$lastPost]['id'])){
        $next_id = 1;
      }
      else
        $next_id = 1+ $posts_map[$lastPost]['id'];
      return $next_id;
    }

    


}
