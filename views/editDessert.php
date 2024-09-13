<?php include "views/includes/header.php";?>

<div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 pr-5">
                    <h2><i class="fas fa-edit    "></i> EDIT</h2>
                    <form action="<?php echo ROOT;?>desserts/edit/<?php echo $post['DrinkID'];?>" method="post" enctype="multipart/form-data">
                    <?php CSRF::createToken();?>    
                        <div class="form-group">
                            <label for="drink-name">Dessert Name: </label>
                            <input id="drink-name" class="form-control" type="text" name="drink-name" placeholder="" autocomplete="off" value="<?php echo $post['DrinkName'];?>">
                        </div>
                        <div class="form-group">
                           <label for="description">Description</label>
                           <textarea id="description" name="description" class="form-control" rows="5"><?php echo $post['Description'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" class="form-control" type="text" name="price" placeholder="" autocomplete="off" value="<?php echo $post['Price'];?>">
                        </div>
                        <div class="form-group">
                           <label for="drink-img">Image: </label> 
                           <img src="<?php echo ROOT . "public/" . $post['dessert_link']?>" alt="post_image" class="img-fluid">
                           <input type="file" name="drink-img" class="form-control mt-2">
                        </div>  
                        <input type="hidden" name= "drink-id" value="<?php echo $post['DrinkID'];?>"></input>
                        <?php var_dump($_POST);?>
                        
                        <input type="hidden" name= "drink-img" value="<?php echo $post['dessert_link'];?>"></input>

                        <?php CSRF::outputToken();?>
                        <button type="submit" class="btn btn-outline-success btn-block btn-lg mt-4" name="edit"><i class="fas fa-edit    "></i> Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "views/includes/footer.php"; ?>