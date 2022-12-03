<?php 
class Order {
    private $conn;
    
    public $id;
    public $customer_id;
    public $fullname;
    public $phone;
    public $address;
    public $note;
    public $total;
    public $status;
    public $created_time;
    public $last_updated;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM `orders`";
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
        $query = "SELECT * FROM `orders` WHERE id = ?";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        }
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        
        
        extract($result);
        $this->customer_id = $customer_id;
        $this->phone = $phone;
        $this->address = $address;
        $this->total = $total;
        $this->created_time = $created_time;
        $this->last_updated = $last_updated;

        echo $this->phone;
        return $result;
    }

    public function create() {
        $query = "INSERT INTO `orders` SET id=:id, customer_id=:customer_id, fullname=:fullname, phone=:phone, address=:address, total=:total, note=:note";
        try {
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id)); 
            $this->customer_id = htmlspecialchars(strip_tags($this->customer_id)); 
            $this->fullname = htmlspecialchars(strip_tags($this->fullname));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->total = htmlspecialchars(strip_tags($this->total));
            $this->note = htmlspecialchars(strip_tags($this->note));

            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':customer_id', $this->customer_id);
            $stmt->bindParam(':fullname', $this->fullname);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':total', $this->total);
            $stmt->bindParam(':note', $this->note);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }
}

?>