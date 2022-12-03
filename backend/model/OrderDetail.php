<?php 
class OrderDetail {
    private $conn;
    
    public $id;
    public $order_id;
    public $book_id;
    public $quantity;
    public $price;
    public $discounnt;
    public $import_price;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM `orders_details`";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        } 

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function show() {
        $query = "SELECT * FROM `orders_details` WHERE book_id = ?";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->book_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        }
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function create() {
        $query = "INSERT INTO `orders_details` SET order_id=:order_id, book_id=:book_id, quantity=:quantity, price=:price, discount=:discount, import_price=:import_price";
        try {
            $stmt = $this->conn->prepare($query);
            $this->order_id = htmlspecialchars(strip_tags($this->order_id)); 
            $this->book_id = htmlspecialchars(strip_tags($this->book_id)); 
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));
            $this->price = htmlspecialchars(strip_tags($this->price));
            $this->discount = htmlspecialchars(strip_tags($this->discount));
            $this->import_price = htmlspecialchars(strip_tags($this->import_price));

            $stmt->bindParam(':order_id', $this->order_id);
            $stmt->bindParam(':book_id', $this->book_id);
            $stmt->bindParam(':quantity', $this->quantity);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':discount', $this->discount);
            $stmt->bindParam(':import_price', $this->import_price);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function delete() {
        $query = "DELETE FROM `orders_details` WHERE book_id=:book_id AND order_id=:order_id";
        try {
            $stmt = $this->conn->prepare($query);
            $this->book_id = htmlspecialchars(strip_tags($this->book_id)); 
            $this->order_id = htmlspecialchars(strip_tags($this->order_id)); 
            $stmt->bindParam(':book_id', $this->product_id);
            $stmt->bindParam(':order_id', $this->order_id);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }
}

?>