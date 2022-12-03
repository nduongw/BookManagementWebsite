<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/OrderDetail.php');

    $db = new Database();
    $connect = $db->connect();

    $order_item = new OrderDetail($connect);
    
    $data = json_decode(file_get_contents("php://input"));

    // $order_item->id = $data->id;
    $order_item->order_id = $data->order_id;
    $order_item->book_id = $data->book_id;
    $order_item->quantity = $data->quantity;
    $order_item->price = $data->price;
    $order_item->discount = $data->discount;
    $order_item->import_price = $data->import_price;

    if ($order_item->create()) {
        echo json_encode(array('messege', 'New order_item created'));
    } else {
        echo json_encode(array('messege', 'New order_item not created'));
    }
?>