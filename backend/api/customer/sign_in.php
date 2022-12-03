<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Request With');

    include_once('../../config/db.php');
    include_once('../../model/Customer.php');

    $db = new Database();
    $connect = $db->connect();

    $customer = new Customer($connect);

    $usename = isset($_POST['usename']) ? $_POST['username'] : die();
    $password = isset($_POST['password']) ? md5($_POST['password']) : die();
    $phone = isset($_POST['phone']) ? $_POST['phone'] : die();
    $address = isset($_POST['address']) ? $_POST['address'] : die();
    $email = isset($_POST['email']) ? $_POST['email'] : die();

    // $customer->id = $data->id;

    if ($customer->create($usename, $password, $phone, $address, $email)) {
        echo json_encode(array('messege', 'New customer created'));
    } else {
        echo json_encode(array('messege', 'New customer not created'));
    }
?>