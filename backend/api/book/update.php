<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/Book.php');

    $db = new Database();
    $connect = $db->connect();

    $book = new Book($connect);

    $data = json_decode(file_get_contents("php://input"));

    echo $data->id;

    $book->id = $data->id;
    $book->title = $data->title;
    $book->image = $data->image;
    $book->price = $data->price;
    $book->discount = $data->discount;
    $book->import_price = $data->import_price;
    $book->quantity = $data->quantity;
    $book->content = $data->content;
    $book->publication_date = $data->publication_date;
    $book->created_date = $data->created_date;
    $book->last_updated = $data->last_updated;

    if ($book->update()) {
        echo json_encode(array('messege', 'Update successful'));
    } else {
        echo json_encode(array('messege', 'Update failed'));
    }
?>