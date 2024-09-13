<?php 
    include "views/includes/header.php";
    var_dump($_GET);
    var_dump($_POST);
?>
<div class="container mt-5">
    <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
        <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "1"): ?>
            <a href="<?php echo ROOT . "drinks/create"; ?>" class="btn btn-secondary ml-2 mb-3" style="width: 23%;">CREATE</a>
            <hr style="border: 2px solid black;">
        <?php endif; ?>
    <?php endif; ?>
    <div class="row mt-4" style="justify-content: center; align-items: center;">
        <div class="container">
            <?php if (!empty($posts)): ?>
                <div class="row">
                <?php foreach ($posts as $post): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card justify-content-between" style="width: 100%; 
                        <?php if((isset($_SESSION['user_role']) && $_SESSION['user_role'] == "1") || $_SESSION['logged_in'] === false): ?>
                            <?php echo "height: 330px;";?>
                        <?php else: ?>
                            <?php echo "height: 430px;";?>
                        <?php endif;?>  
                        border: 1px solid #4f4f4f; border-radius: 10%; margin: 10px; overflow: hidden;">
                            <img src="<?php echo ROOT . "public/" . $post['drinks_img']; ?>" style="height: 200px" alt="Card image cap">
                            <div class="card-body" style="position: absolute; bottom: 10px;">
                                <h5 class="card-title">
                                    <strong><?php echo $post['DrinkName']; ?></strong>
                                </h5>
                                <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != "1"): ?>
                                    <div>
                                        <a href="<?php echo ROOT . "drinks/get/" . $post['DrinkID']?>" class="btn btn-info"><i class="fas fa-info-circle"></i> DETAILS</a>
                                        <i class="fas fa-dollar-sign"> <?php echo $post['Price'] ?></i>
                                        <form method="post" action="<?php echo ROOT;?>cart.php?DrinkID=<?php echo $post['DrinkID']; ?>" >
                                            <input type="hidden" name="DrinkID" value="<?php echo $post['DrinkID'];?>">
                                            <input type="hidden" name="DrinkName" value="<?php echo $post['DrinkName'];?>">
                                            <input type="hidden" name="Price" value="<?php echo $post['Price'];?>">
                                            <input type="number" name="Quantity" value="0" class="form-control mt-2">
                                            <input type="submit" name="add_to_cart" class="btn btn-warning btn-block my-2" value="Add to Cart">
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo ROOT . "drinks/get/" . $post['DrinkID']?>" class="btn btn-info"><i class="fas fa-info-circle" aria-hidden="true"></i> DETAILS</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "views/includes/footer.php"; ?>
