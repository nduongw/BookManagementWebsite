<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/OrderDetail.php');

    $db = new Database();
    $connect = $db->connect();

    $order_item = new OrderDetail($connect);
    $order_item->id = 10;

    $result = $order_item->show();

    $order_item_array['data'] = [];

    foreach($result as $row) {
        extract($row);

        $order_item_info = array(
            'id' => $id,
            'order_id' => $order_id,
            'book_id' => $book_id,
            'quantity' => $quantity,
            'price' => $price,
            'discounnt' => $discounnt,
            'import_price' => $import_price,
        );

        array_push($order_item_array['data'], $order_item_info);
    }

    echo json_encode($order_item_array, JSON_PRETTY_PRINT);
?>