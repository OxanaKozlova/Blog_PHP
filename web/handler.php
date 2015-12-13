<?php
interface Handler
{
    public function read_data();
    public function write_data($id, $title,  $content,$data);
}
