<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/Customer.php');

    $db = new Database();
    $connect = $db->connect();

    $customer = new Customer($connect);
    $customer->username = isset($_POST['username']) ? $_POST['username'] : die();
    $customer->password = isset($_POST['password']) ? md5($_POST['password']) : die();

    $result = $customer->get_user();

    $customer_array['data'] = [];

    foreach($result as $row) {
        extract($row);

        $customer_info = array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'name' => $name,
            'avatar' => $avatar,
            'birthday' => $birthday,
            'phone' => $phone,
            'address' => $addess,
            'email' => $email,
            'status' => $status,
            'money_spent' => $money_spent
        );

        array_push($customer_array['data'], $customer_info);
    }

    echo json_encode($customer_array, JSON_PRETTY_PRINT);
?>