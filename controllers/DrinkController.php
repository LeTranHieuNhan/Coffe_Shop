<?php


class DrinkController extends Controller {
    // properties
    public $post_id;
    public $post_user_id;
    public $post = [];
    public $posts = [];
    public $errors = [];

    // constructor
    public function __construct() {
        parent::__construct();
    }


    public function getAllPosts() {
        $postModel = new Post($this->conn);
        $posts = $postModel->fetchAll();
        include "views/drinks.php";
    }

    public function getPost($id) {
        $this->id = $id;
        $postModel = new Post($this->conn);
        $post = $postModel->fetchPost($this->id);
        include "views/single_drink.php";
    }

    public function addDrink() {
        include "views/cart.php";
    }

    public function getEditPost($id) {
        $this->id = $id;
        $postModel = new Post($this->conn);
        $post = $postModel->fetchPost($this->id);
        include "views/editDrink.php";
        return $post;
    }
    
    public function createPost($imgLink)
    {
        $drinkName = $this->req['drink-name'];
        $des = $this->req['description'];
        $price = $this->req['price'];
        $drinkImg = "img/" . time() . "_" . $_FILES['drink-img']['name'];
        $uploadedFilePath = "public/" . $drinkImg;
        move_uploaded_file($_FILES['drink-img']['tmp_name'], $uploadedFilePath);
            
        $postModel = new Post($this->conn);
        $post = $postModel->create($drinkName, $des, $price, $drinkImg);

        header("Location:" . ROOT . "drinks/all?msg=Successful-create");
    }
    

    public function deletePost($id)
    {   
        $this->id = $id;
        $postModel = new Post($this->conn);
        $post = $postModel->delete($id);

        header("Location:" . ROOT . "drinks/all?msg=Successful-delete");

    }


    public function editPost()
    { 
        $id = $this->req['drink-id'];
        //var_dump($_FILES);
        $drinkImg= $this->files['drink-img'];
        $newDetails= $this->req;
        
        //var_dump($_POST);
        //var_dump($_GET);
        $postModel = new Post($this->conn);
        //$drinkImg="";
        //var_dump($drinkImg);
        if($drinkImg['error'] == 0) {
            $drinkImg = "img/" . time() . "_" . $_FILES['drink-img']['name'];
            $uploadedFilePath = "public/" . $drinkImg;
            move_uploaded_file($_FILES['drink-img']['tmp_name'], $uploadedFilePath);
        }
        else {
            $drinkImg= $this->req['drink-img'];
        }
            

        $post = $postModel->edit($id, $newDetails, $drinkImg);
        header("Location:" . ROOT . "drinks/all?msg=Successful-edit");
    }
}
?>
