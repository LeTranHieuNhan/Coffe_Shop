<?php


class ReviewController extends Controller {
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
        $posts = $postModel->fetchAllReviews();
        include "views/reviews.php";
    }

    public function create() {
        $review = new Post($this->conn);
        var_dump($this->req);
        $user_name = $this->req['user_name'];
        $review_body = $this->req['review_body'];
        $stars = $this->req['stars'];

        /*echo "User name: ". $user_name. "<br>";
        echo "Review body: ". $review_body. "<br>";
        echo "Stars: ". $stars. "<br>";*/
        if(empty($this->req['user_name']) || empty($review_body)) {
            $errors['empty_text'] = "Text fields cannot be empty!";
        }

        if(empty($this->errors))
        {
            $review->createNewReview($user_name, $review_body, $stars);
            
            header("Location:" . ROOT . "reviews/all?msg=Successful-review");
        }
    }
}
?>
