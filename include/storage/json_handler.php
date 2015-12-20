<?php
class JSonHandler implements Handler {
  private $file_name = '../storage/posts.json';

  private function read_json(){
    $data = file_get_contents($this->file_name);
    return json_decode($data, TRUE);
  }

  private function write_json($json){
    $new_json = json_encode($json);
    file_put_contents($this->file_name, $new_json);
  }

  public function add_new_post($title, $content){
    $posts = $this->get_all_posts();
      if (count($posts) > 0) {
          $id = $posts[count($posts)-1]->get_id() + 1;
      } else $id = 0;
      $date = date('Y h:i:s A');
      $posts[] = new Post($id, $title, $content, $date);
      $this->write_json($posts);
  }

  public function delete_post($id){
        $json = $this->read_json();
        for ($i = 0; $i < count($json); $i++) {
            if ($json[$i]['id'] == $id) {
                array_splice($json, $i, 1);
                break;
            }
        }
          $this->write_json($json);
  }

  public function get_all_posts(){
    $json = $this->read_json();
    for ($i = 0; $i < count($json); $i++) {
          $posts[] = new Post($json[$i]['id'],
              $json[$i]['title'],
              $json[$i]['content'],
              $json[$i]['date']);
      }
      return $posts;
  }
}
