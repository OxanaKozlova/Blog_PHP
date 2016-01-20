<?php
interface Storage_Handler
{
    public function get_all_posts();
    public function add_new_post($title, $content);
    public function delete_post($id);
}
