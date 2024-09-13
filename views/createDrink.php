<?php include "views/includes/header.php";?>

<div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 pr-5">
                    <h2><i class="fa fa-plus-square" aria-hidden="true"></i> CREATE</h2>
                    <form action="<?php echo ROOT;?>drinks/create" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="drink-name">Drink Name: </label>
                            <input id="drink-name" class="form-control" type="text" name="drink-name" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                           <label for="description">Description</label>
                           <textarea id="description" name="description" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input id="price" class="form-control" type="text" name="price" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                           <label for="drink-img">Image: </label>
                           <input type="file" name="drink-img" class="form-control">
                        </div>
                        <?php CSRF::outputToken();?>
                        <button type="submit" class="btn btn-outline-success btn-block btn-lg mt-4" name="create"><i class="fa fa-plus-square" aria-hidden="true"></i> Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include "views/includes/footer.php"; ?>