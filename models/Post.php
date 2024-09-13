<?php


class Post {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function fetchAll() {
        $sql = "SELECT * FROM drinks";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchAllDessert() {
        $sql = "SELECT * FROM desserts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchAllReviews() {
        $sql = "SELECT * FROM reviews";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }

    public function createNewReview($user_name, $review_body, $stars)
    {  
        $sql = "INSERT INTO reviews (user_name, review, stars) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        echo "Query: ". $sql. "<br>";
        echo "Number of rows affected: ". $stmt->affected_rows. "<br>";
        $stmt->bind_param("sss", $user_name, $review_body, $stars);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return $stmt;
        }
    }

    public function fetchPost($id) {
        $sql = "SELECT * FROM drinks WHERE DrinkID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function fetchPost1($id) {
        $sql = "SELECT * FROM desserts WHERE DrinkID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($name, $des, $price, $img)
    {
        $sql = "INSERT INTO drinks (DrinkID, DrinkName, Description, Price, drinks_img) VALUES (NULL, ?, ?, ?, ?);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $des, $price, $img);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return $stmt;
        }
    }

    public function create1($name, $des, $price, $img)
    {
        $sql = "INSERT INTO desserts (DrinkID, DrinkName, Description, Price, dessert_link) VALUES (NULL, ?, ?, ?, ?);";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssss", $name, $des, $price, $img);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return $stmt;
        }
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM drinks WHERE DrinkID = ?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return $stmt;
        }
    }

    public function delete1($id)
    {
        $sql = "DELETE FROM desserts WHERE DrinkID = ?;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return $stmt;
        }
    }

    public function edit($id, $newDetails, $img)
    {
        var_dump($_POST);
        var_dump($_GET);
        var_dump($img);
        //var_dump($newDetails['drink-img']);
        $sql = "UPDATE drinks 
                SET DrinkName = ?, Description = ?, Price = ?, drinks_img = ? 
                WHERE DrinkID = ?;";
        
        $stmt = $this->conn->prepare($sql);
           
       /*if ($img == NULL)
        {   
            var_dump($img);
            var_dump($id);
            $sql2 = "SELECT drink_img FROM drinks WHERE DrinkID = ?";
            $stmt2= $this->conn->prepare($sql2);
            $stmt2->bind_param("s", $id);
            $stmt2->execute();
            $drinkImg = $stmt2->get_result();
            $img= $drinkImg;
            
        }*/
        var_dump($img);
        
        $stmt->bind_param("sssss", $newDetails['drink-name'], $newDetails['description'], $newDetails['price'], $img, $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return $stmt;
        }
    }

    public function edit1($id, $newDetails, $img)
    {
        var_dump($_POST);
        var_dump($_GET);
        var_dump($img);
        //var_dump($newDetails['drink-img']);
        $sql = "UPDATE desserts 
                SET DrinkName = ?, Description = ?, Price = ?, dessert_link = ? 
                WHERE DrinkID = ?;";
        
        $stmt = $this->conn->prepare($sql);
           
       /*if ($img == NULL)
        {   
            var_dump($img);
            var_dump($id);
            $sql2 = "SELECT drink_img FROM drinks WHERE DrinkID = ?";
            $stmt2= $this->conn->prepare($sql2);
            $stmt2->bind_param("s", $id);
            $stmt2->execute();
            $drinkImg = $stmt2->get_result();
            $img= $drinkImg;
            
        }*/
        var_dump($img);
        
        $stmt->bind_param("sssss", $newDetails['drink-name'], $newDetails['description'], $newDetails['price'], $img, $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            return true;
        } else {
            return $stmt;
        }
    }

}