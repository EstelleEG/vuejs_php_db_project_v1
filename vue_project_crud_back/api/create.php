<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/book.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Book ($db);

    $data = json_decode(file_get_contents("php://input"));

    $item->name = $data->name;
    $item->author = $data->author;
    $item->collection = $data->collection;
    $item->ISBN = $data->ISBN;
    $item->dimensions = $data->dimensions;
    $item->designation = $data->designation;
    $item->created = date('Y-m-d H:i:s');
    $item->modified = date('Y-m-d H:i:s');

    if($item->createBook()){
        echo 'Book created successfully.';
    } else{
        echo 'Book could not be created.';
    }
?>