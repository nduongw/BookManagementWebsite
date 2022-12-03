<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/Order.php');

    $db = new Database();
    $connect = $db->connect();

    $order = new Order($connect);
    $result = $order->read();

    $order_array = [];
    $order_array['data'] = [];

    foreach($result as $row) {
        extract($row);

        $order_info = array(
            'id' => $id,
            'order_id' => $order_id,
            'fullname' => $fullname,
            'phone' => $phone,
            'address' => $address,
            'note' => $note,
            'total' => $total,
            'status' => $status,
            'created_time' => $created_time,
            'last_updated' => $last_updated,
        );

        array_push($order_array['data'], $order_info);
    }

    echo json_encode($order_array, JSON_PRETTY_PRINT);
?>