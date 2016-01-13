<?php
require_once("../include/model/post.php");
require_once("../include/storage/storage.php");
require_once("../include/storage/handler.php");
require_once("../include/storage/file_handler.php");
require_once("../include/storage/json_handler.php");
require_once("../include/storage/database_handler.php");
require_once("../config/config.php");
require_once("router.php");
require_once("controller_blog.php");

Route::choose_action();
