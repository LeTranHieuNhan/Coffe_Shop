<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<link rel="stylesheet" href="<?php echo ROOT; ?>css/style.css" type="text/css">

<title>ITEC MVC</title>
</head>


<body>

<!-- <div class="loader_bg">
    <div class="loader"><img src="public/gif/burger.gif" alt=""></div>
</div> -->

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0f0f0f;">
    <div class="container">
        <img src="<?php echo ROOT; ?>public/img/logo.jpg" alt="" width="8%">
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>reviews/all"><i class="fas fa-star"></i> Reviews<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>drinks/all"><i class="fas fa-coffee"></i> Drinks<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>desserts/all"><i class="fas fa-circle-notch"></i> Desserts<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>contact" ><i class="fas fa-map"></i> Contact</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>cart" ><i class="fas fa-shopping-cart    "></i> Cart</a>
                </li>
                <?php if($_SESSION['logged_in']):?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo ROOT; ?>user" ><i class="fas fa-user"></i> <?php echo $_SESSION['user_name'];?></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo ROOT; ?>logout" ><i class="fas fa-door-open"></i> Logout</a>
                    </li>
                <?php else: ?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>register" ><i class="fas fa-user-plus"></i> Register</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo ROOT; ?>login" ><i class="fas fa-user"></i> Login</a>
                </li>
                <?php endif;?>
            </ul>
        </div>      
    </div>
</nav>
