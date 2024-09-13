<?php include "views/includes/header.php";?>


    <div class="jumbotron">
        <div class="container">
            <img src="<?php echo ROOT . "public/" . $post['drinks_img']; ?>" style="height: 200px" alt="Card image cap">
            <h1 class="display-4"><?php echo $post['DrinkName'];?></h1>
            <p class="lead"><?php echo $post['Description'];?></p>

            <?php if($_SESSION['logged_in'] === true && $_SESSION['user_role'] == "1"): ?>
                <a href="<?php echo ROOT . "drinks/delete/" . $post['DrinkID']?>" class="btn btn-danger mr-2" >DELETE</a>
                <a href="<?php echo ROOT . "drinks/edit/" . $post['DrinkID']?>" class="btn btn-warning" >EDIT</a>
            <?php endif; ?>
            <hr class="my-4">
            <a href="<?php echo ROOT . "drinks/all"; ?>" style="color: darkblue;"><<--BACK</a>
        </div>
    </div>

<?php include "views/includes/footer.php"; ?>