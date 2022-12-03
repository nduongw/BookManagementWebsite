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

    $book->id = $data->id;

    if ($book->delete()) {
        echo json_encode(array('messege', 'Delete successful') );
    } else {
        echo json_encode(array('messege', 'Delete failed'));
    }
?>