<?php

class Storage
{
    private static $instance = null;
	private $handler;

	private function __construct() {}
	private function __clone() {}

	public static function getInstance() {
		if(null === self::$instance) {
			self::$instance = new self();
			self::$instance->setHandler();
		}
		return self::$instance;
	}

    public function read_data(){
      return $this->handler->get_all_posts();
    }

	public function setHandler() {
    $classname = Config::$handler;
    $this->handler = new $classname;
	}

	public function write_data($title, $content) {
		$this->handler->add_new_post($title,  $content);
	}

    public function delete($id){
      $this->handler->delete_post($id);
    }

    public function read_posts(){
      $this->handler->get_all_posts();
    }
}
