<?php
class JSonHandler implements Handler {
    public function __construct(array $array) {
        $this->array = $array;
    }
    public function read_data(){
      $json = file_get_contents('../storage/posts.json');
      $json = json_decode($json, true);
      return $json;
    }

public function write_data($post){
  $json[] = $post;
  $json = json_encode($json, JSON_UNESCAPED_UNICODE);
  file_put_contents('../storage/posts.json', $json);
}



}
