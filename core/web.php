<?php

Router::get("", function() {
    $home = new HomeController;
    $home->index();
});


Router::get("contact", function() {
    include "views/contact.php";
});


Router::get("login", function() {
    $user = new UserController();
    $user->getLogin();
 });
 
 Router::post("login", function() {
    $user = new UserController();
    $user->validateLogin();
});



Router::get("register", function() {
    include "views/register.php";
});

Router::post("register", function() {
    $user = new UserController();
    $user->create();
});

Router::get("logout", function() {
    $_SESSION = [];
    session_destroy();
    header("Location:" . ROOT);
});



Router::get("drinks/all", function() {
    $post = new DrinkController();
    $post->getAllPosts();
});



Router::get("drinks/get/{id}", function($id) {
    $post = new DrinkController();
    $post->getPost($id);
});


Router::get("drinks/create", function() {
    include "views/createDrink.php";
});

Router::post("drinks/create", function() {
    $post = new DrinkController();
    $post->createPost($_FILES);
});


Router::get("drinks/delete/{id}", function($id) {
    $post = new DrinkController();
    $post->deletePost($id);
});







Router::get("drinks/edit/{id}", function($id) {
    $post = new DrinkController();
    $post->getEditPost($id);
});


Router::post("drinks/edit/{id}", function() {
    $post = new DrinkController();
    $post->editPost();
    
});



Router::get("cart", function() {
    include "views/cart.php";
});

Router::post("cart.php", function() {
    $post = new DrinkController();
    $post->addDrink();
});


Router::get("desserts/all", function() {
    $post = new DessertController();
    $post->getAllPosts();
});

Router::get("desserts/get/{id}", function($id) {
    $post = new DessertController();
    $post->getPost($id);
});

Router::get("desserts/create", function() {
    include "views/createDrink.php";
});

Router::post("desserts/create", function() {
    $post = new DessertController();
    $post->createPost($_FILES);
});


Router::get("desserts/delete/{id}", function($id) {
    $post = new DessertController();
    $post->deletePost($id);
});


Router::get("desserts/edit/{id}", function($id) {
    $post = new DessertController();
    $post->getEditPost($id);
});


Router::post("desserts/edit/{id}", function() {
    $post = new DessertController();
    $post->editPost();
    
});

Router::get("reviews/all", function() {
    $post = new ReviewController();
    $post->getAllPosts();
});

Router::post("reviews/all", function(){
    $post = new ReviewController();
    $post->create();
});





if(Router::$found === false) {
    include "views/_404.php";
}