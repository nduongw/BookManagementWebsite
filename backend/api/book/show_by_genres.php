<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once('../../config/db.php');
    include_once('../../model/Book.php');

    $db = new Database();
    $connect = $db->connect();

    $book = new Book($connect);
    $genres_id = 2;

    $result = $book->show_by_genres($genres_id);

    $book_array = [];
    $book_array['data'] = [];

    foreach($result as $row) {
        extract($row);

        $book_info = array(
            'id' => $id,
            'title' => $tittle,
            'image' => $image,
            'price' => $price,
            'discount' => $discount,
            'import_price' => $import_price,
            'quantity' => $quantity,
            'content' => $content,
            'publication_date' => $publication_date,
            'created_date' => $created_date,
            'last_updated' => $last_updated
        );

        array_push($book_array['data'], $book_info);
    }

    echo json_encode($book_array, JSON_PRETTY_PRINT);
?>