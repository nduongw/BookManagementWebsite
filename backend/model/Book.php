<?php 
class Book {
    private $conn;
    
    public $id;
    public $title;
    public $image;
    public $price;
    public $discount;
    public $import_price;
    public $quantity;
    public $content;
    public $publication_date;
    public $created_date; 
    public $last_updated;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM `books`";
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
        $query = "SELECT * FROM `books` WHERE id =:id";
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
        $this->title = $title;
        $this->image = $image;
        $this->price = $price;
        $this->discount = $discount;
        $this->import_price = $import_price;
        $this->quantity = $quantity;
        $this->content = $content;
        $this->publication_date = $publication_date;
        $this->created_date = $created_date;
        $this->last_updated = $last_updated;

        return $result;
    }

    public function create() {
        $query = "INSERT INTO `books` SET tittle=:title, image=:image, price=:price, discount=:discount, import_price=:import_price, quantity=:quantity, content=:content, publication_date=:publication_date, created_date=:created_date, last_updated=:last_updated";

        try {
            $stmt = $this->conn->prepare($query);
            // $this->id = htmlspecialchars(strip_tags($this->id)); 
            $this->title = htmlspecialchars(strip_tags($this->title)); 
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->price = htmlspecialchars(strip_tags($this->price));
            $this->discount = htmlspecialchars(strip_tags($this->discount));
            $this->import_price = htmlspecialchars(strip_tags($this->import_price));
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));
            $this->content = htmlspecialchars(strip_tags($this->content));
            $this->publication_date = htmlspecialchars(strip_tags($this->publication_date));
            $this->created_date = htmlspecialchars(strip_tags($this->created_date));
            $this->last_updated = htmlspecialchars(strip_tags($this->last_updated));

            // $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':discount', $this->discount);
            $stmt->bindParam(':import_price', $this->import_price);
            $stmt->bindParam(':quantity', $this->quantity);
            $stmt->bindParam(':content', $this->content);
            $stmt->bindParam(':publication_date', $this->publication_date);
            $stmt->bindParam(':created_date', $this->created_date);
            $stmt->bindParam(':last_updated', $this->last_updated);
            
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        return true;
    }

    public function update() {
        $query = "UPDATE `books` SET tittle=:title, image=:image, price=:price, discount=:discount, import_price=:import_price, quantity=:quantity, content=:content, publication_date=:publication_date WHERE id=:id";

        try {
            $stmt = $this->conn->prepare($query);
            $this->title = htmlspecialchars(strip_tags($this->title)); 
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->price = htmlspecialchars(strip_tags($this->price));
            $this->discount = htmlspecialchars(strip_tags($this->discount));
            $this->import_price = htmlspecialchars(strip_tags($this->import_price));
            $this->quantity = htmlspecialchars(strip_tags($this->quantity));
            $this->content = htmlspecialchars(strip_tags($this->content));
            $this->publication_date = htmlspecialchars(strip_tags($this->publication_date));
            $this->id = htmlspecialchars(strip_tags($this->id));
            
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':price', $this->price);
            $stmt->bindParam(':discount', $this->discount);
            $stmt->bindParam(':import_price', $this->import_price);
            $stmt->bindParam(':quantity', $this->quantity);
            $stmt->bindParam(':content', $this->content);
            $stmt->bindParam(':publication_date', $this->publication_date);
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
        $query = "DELETE FROM `reviews` WHERE book_id=:book_id";
        try {
            $stmt = $this->conn->prepare($query);
            $this->id = htmlspecialchars(strip_tags($this->id)); 
            $stmt->bindParam(':book_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `orders_details` WHERE book_id=:book_id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':book_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `favorites` WHERE book_id=:book_id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':book_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `books_publishers` WHERE book_id=:book_id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':book_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `books_library` WHERE book_id=:book_id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':book_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `books_geners` WHERE book_id=:book_id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':book_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `books_authors` WHERE book_id=:book_id";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':book_id', $this->id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
            return false;
        }

        $query = "DELETE FROM `books` WHERE id=:id";
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

    public function show_by_genres($genres_id) {
        $query = "SELECT * FROM `books` WHERE id IN (SELECT book_id FROM `books_genres` WHERE genres_id=:genres_id)";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':genres_id', $genres_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        }
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function show_by_author($author_id) {
        $query = "SELECT * FROM `books` WHERE id IN (SELECT book_id FROM `books_authors` WHERE author_id=:author_id)";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':author_id', $author_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        }
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function show_by_publisher($publisher_id) {
        $query = "SELECT * FROM `books` WHERE id IN (SELECT book_id FROM `books_publishers` WHERE publisher_id=:publisher_id)";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':publisher_id', $publisher_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        }
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }

    public function show_by_ascent_price() {
        $query = "SELECT * FROM `books` ORDER BY price ASC";
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

    public function show_by_descent_price() {
        $query = "SELECT * FROM `books` ORDER BY price DESC";
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

    public function search($search_string) {
        $query = "SELECT * FROM `books` WHERE tittle LIKE '%:title%'";
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':title', $search_string);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error". $e->getMessage();
        }
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();

        return $result;
    }
}

?>