<?php
class DatabaseHandler implements Handler{
    private $host = 'localhost';
    private  $user_name = 'root';
    private  $password = '1111';
    private $db_name = 'PHP_Blog';

    public function get_all_posts(){

        $result = $this->create_query($this->host, $this->user_name,
            $this->password, $this->db_name,"SELECT * FROM posts" );
        if ($result) {
            while ($post = mysqli_fetch_array($result)) {
                $posts[] = new Post((int)$post['post_id'],
                    $post['title'],
                    $post['content'],
                    $post['date']);
            }
        }
        mysqli_free_result($result);
        return $posts;
    }

    public function add_new_post($title, $content){
        $this->create_query($this->host, $this->user_name, $this->password, $this->db_name,
            "INSERT INTO posts( title, content) VALUES ('$title','$content')" );
    }

    public function delete_post($id){
       $posts = $this->get_all_posts();
       foreach($posts as $post){
           if($post->get_id()==$id){
               $this->create_query($this->host, $this->user_name,
                   $this->password, $this->db_name, "DELETE FROM posts WHERE post_id='$id'");
               return;
            }
        }
   }

    private function create_query($host, $user_name, $password, $db_name, $query){
        $mysqli = new mysqli($host, $user_name, $password, $db_name);
        if ($mysqli->connect_errno) {
            exit();
        }
        $result = $mysqli->query($query);
        mysqli_close($mysqli);
        return $result;
    }


}
