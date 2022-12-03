<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/OrderDetail.php');

    $db = new Database();
    $connect = $db->connect();

    $order_detail = new OrderDetail($connect);
    $result = $order_detail->read();

    $order_detail_array = [];
    $order_detail_array['data'] = [];

    foreach($result as $row) {
        extract($row);

        $order_detail_info = array(
            'id' => $id,
            'order_id' => $order_id,
            'book_id' => $book_id,
            'quantity' => $quantity,
            'price' => $price,
            'discounnt' => $discounnt,
            'import_price' => $import_price,
        );

        array_push($order_detail_array['data'], $order_detail_info);
    }

    echo json_encode($order_detail_array, JSON_PRETTY_PRINT);
?>