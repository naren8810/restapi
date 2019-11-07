<?php

 //Headers
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Method: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-Width');
 

 include_once '../../config/Database.php';
 include_once '../../models/Post.php';

 //Instatiate DB & Connect
 $database = new Database();
 $db = $database->DBConnection();

 //Insantiate blog post object
 $post = new Post($db);

//  $post_arr = array(
//     'title' => $_GET['title'],
//     'body' => $_GET['body'],
//     'author' => $_GET['author'],
//     'category_id' => $_GET['category_id'],
//     'category_name' => $_GET['category_name'],
// );

//$data = json_encode($post_arr);

//  //Get raw posted Data

//$data = json_encode(file_get_contents("my.json"));

$dataj->title = "Narendra";
$dataj->body = "Narendra";
$dataj->author = "Narendra";
$dataj->category_id = "Narendra";

$data = json_encode($dataj);

 $post->title = $data->title;
 $post->body = $data->body;
 $post->author = $data->author;
 $post->category_id = $data->category_id;

 //Create post
 if($post->create()){
     echo json_encode(
         array('message' => 'Post Created')
     );
 }else{
     echo json_encode(
         array('message' => 'Post Not Created')
     );
 }