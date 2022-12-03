<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/Order.php');

    $db = new Database();
    $connect = $db->connect();

    $order = new Order($connect);
    
    $data = json_decode(file_get_contents("php://input"));

    // $order->id = $data->id;
    $order->id = $data->id;
    $order->customer_id = $data->customer_id;
    $order->fullname = $data->fullname;
    $order->phone = $data->phone;
    $order->address = $data->address;
    $order->total = $data->total;
    $order->note = $data->note;

    if ($order->create()) {
        echo json_encode(array('messege', 'New order created'));
    } else {
        echo json_encode(array('messege', 'New order not created'));
    }
?>