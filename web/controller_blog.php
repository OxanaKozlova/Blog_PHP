<?php

class Controller_blog{

  function action_delete(){
      if (isset($_GET['id'])) {
          Storage::getInstance()->delete($_GET['id']);
      }
  }

  function action_add(){
      if(!empty($_POST)){
          Storage::getInstance()->write_data($_POST['title'], $_POST['content']);
      }
  }

  function action_index() {
      $posts = Storage::getInstance()->read_posts();
  }
}
 ?>
