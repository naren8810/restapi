<?php

 //Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');

 include_once '../../config/Database.php';
 include_once '../../models/Post.php';

 //Instatiate DB & Connect
 $database = new Database();
 $db = $database->DBConnection();

 //Insantiate blog post object
 $post = new Post($db);

 //Blog post Query
 $result = $post->read();
 //Get row count
 $num = $result->rowCount();

 //Check if any Posts
 if($num > 0){
     //Post array
     $post_arr = array();
     $post_arr['data'] = array();

     while($row = $result->fetch(PDO::FETCH_ASSOC)){
         extract($row);

         $post_item = array(
             'id' => $id,
             'title' => $title,
             'body' => html_entity_decode($body),
             'author' => $author,
             'category_id' => $category_id,
             'category_name' => $category_name
         );

         //Push to "data"
         array_push($post_arr['data'], $post_item);
     }

     //Turn to JSON & Output
     echo json_encode($post_arr);

 }else{
     //No Posts
     echo json_encode(
         array('message' => 'No Posts Found')
     );

 }