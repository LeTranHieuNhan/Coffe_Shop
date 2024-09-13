<?php 
    include "views/includes/header.php";
?>

<div class="container">
    <div class="row" style="justify-content: center; align-items: center;">
        <div class="container">
        <?php if (!empty($posts)): ?>
                <div class="row">
                <?php foreach ($posts as $post): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card" style="height: 200px; position: relative; border: 1px solid #4f4f4f; border-radius: 10%; margin: 10px; overflow: hidden;">
                            
                            <div class="card-body" style="position: absolute; bottom: 10px;">
                                <h5 class="card-title">
                                  <strong>  <?php echo $post['user_name']; ?> </strong>
                                </h5>
                                <p class="card-text"><?php echo $post['review']?></p>
                                <?php for ($x = 0; $x < $post['stars']; $x+=1): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor?>
                            </div>
                        </div>
                    </div>

            
                <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="jumbotron jumbotron-fluid">
        <div class="container">
        <h1 class="display-4">Write a review</h1>
        <hr class="my-4">
        <form method="post" action="<?php echo ROOT; ?>reviews/all" method="post">
        <?php CSRF::createToken();?>
            <div class="form-group">
                <label for="user_name">Name</label>
                <input id="user_name" class="form-control" type="text" name="user_name" placeholder="Type in name">
            </div>
            <div class="form-group">
                <label for="review_body">Review</label>
                <textarea id="review_body" class="form-control" name="review_body" rows=5></textarea>
            </div>
            <div class="form-group">
                <label for="stars">Stars <i class="fas fa-star"></i></label>
                    <select id="stars" class="form-control" name="stars">
                    <option value="5">5 <span class="star-rating">★</span><span class="star-rating">★</span><span class="star-rating">★</span><span class="star-rating">★</span><span class="star-rating">★</span></option>
                    <option value="4">4 <span class="star-rating">★</span><span class="star-rating">★</span><span class="star-rating">★</span><span class="star-rating">★</span></option>
                    <option value="3">3 <span class="star-rating">★</span><span class="star-rating">★</span><span class="star-rating">★</span></option>
                    <option value="2">2 <span class="star-rating">★</span><span class="star-rating">★</span></option>
                    <option value="1">1 <span class="star-rating">★</span></option>
                    </select>
            </div>
            <?php CSRF::outputToken();?>
            <button type="submit" name="create" id="" class="btn btn-primary btn-lg btn-block"><i class="fas fa-plus-circle"></i> Create Post</button>
        </form>
        </div>
    </div>





<?php 
    include "views/includes/footer.php"; 
?>