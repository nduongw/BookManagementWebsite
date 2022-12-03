<?php 
class Customer {
    private $conn;
    
    public $id;
    public $username;
    public $password;
    public $name;
    public $avatar;
    public $birthday;
    public $phone;
    public $address;
    public $email;
    public $status;
    public $money_spent;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM `customers`";
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
        $query = "SELECT * FROM `customers` WHERE id =:id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        }
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        
        extract($result);
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->avatar = $avatar;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->address = $address;
        $this->email = $email;
        $this->status = $status;
        $this->money_spent = $money_spent;

        return $result;
    }

    public function get_user() {
        $query = "SELECT * FROM `customers` WHERE username =:username AND password=:password";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        }
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        
        extract($result);
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->avatar = $avatar;
        $this->birthday = $birthday;
        $this->phone = $phone;
        $this->address = $address;
        $this->email = $email;
        $this->status = $status;
        $this->money_spent = $money_spent;

        return $result;
    }

    public function sign_in($username, $password, $phone, $address, $email) {
        $query = "INSERT INTO `customers` SET username=:username, password=:password, phone=:phone, address=:address, email=:email";

        try {
            $stmt = $this->conn->prepare($query);
            // $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':email', $email);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function create() {
        $query = "INSERT INTO `customers` SET username=:username, password=:password, last_name=:last_name, avatar=:avatar, birthday=:birthday, phone=:phone, address=:address, email=:email";

        try {
            $stmt = $this->conn->prepare($query);
            // $this->id = htmlspecialchars(strip_tags($this->id)); 
            $this->username = htmlspecialchars(strip_tags($this->username)); 
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->avatar = htmlspecialchars(strip_tags($this->avatar));
            $this->birthday = htmlspecialchars(strip_tags($this->birthday));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->email = htmlspecialchars(strip_tags($this->email));

            // $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':last_name', $this->name);
            $stmt->bindParam(':avatar', $this->avatar);
            $stmt->bindParam(':birthday', $this->birthday);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':email', $this->email);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function update() {
        $query = "UPDATE `customers` SET last_name=:name, avatar=:avatar, birthday=:birthday, phone=:phone, address=:address, email=:email WHERE id=:id";

        try {
            $stmt = $this->conn->prepare($query);
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->avatar = htmlspecialchars(strip_tags($this->avatar));
            $this->birthday = htmlspecialchars(strip_tags($this->birthday));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->id = htmlspecialchars(strip_tags($this->id));
            
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':avatar', $this->avatar);
            $stmt->bindParam(':birthday', $this->birthday);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':id', $this->id);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function delete() {
        echo $this->id;
        $query = "DELETE FROM `reviews` WHERE customer_id=:customer_id";
        try {
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id)); 
            $stmt->bindParam(':customer_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `orders_details` WHERE order_id IN (SELECT order_id FROM `orders` WHERE customer_id=:customer_id)";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':customer_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `orders` WHERE customer_id=:customer_id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':customer_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `customers` WHERE id=:id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

}

?>