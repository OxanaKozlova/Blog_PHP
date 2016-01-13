<?php
class Config{
    static $db = [
        'host'  => 'localhost',
        'user_name'  => 'root',
        'password'  => '1111',
        'db_name' => 'PHP_Blog'
    ];
    static $path = [
        'file_name_txt'  => '../storage/posts.txt',
        'file_name_json'    => '../storage/posts.json',
    ];
    static $handler = 'FileHandler';

}