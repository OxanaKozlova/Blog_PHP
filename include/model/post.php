<?php
class Post{
  private $id;
  private $content;
  private $date;
  private $title;

  public function __construct($id, $title, $content, $date){
    $this->id = $id;
    $this->title = $title;
    $this->content  =$content;
    $this->date = $date;
  }

  public function toString(){
    return $this->id.";".$this->title.";".$this->content.";".$this->date."~";
  }

  public function get_id(){
    return $this->id;
  }

  public function set_id($id){
    $this->id = $id;
  }

  public function get_title(){
    return $this->title;
  }

  public function set_title($title){
    $this->title = $title;
  }

  public function get_content(){
    return $this->content;
  }

  public function set_content($content){
    $this->content = $content;
  }

  public function get_date(){
    return $this->date;
  }

  public function set_date($date){
    $this->date = $date;
  }

}
