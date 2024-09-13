<?php
    include "views/includes/header.php";
?>

<div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <div class="row justify-content-center">   
                <div class="col-md-6 pl-5">
                    <h2><i class="fa fa-user" aria-hidden="true"></i> Login</h2>
                    <form action="<?php echo ROOT;?>login" method="post">
                        <div class="form-group">
                            <label for="my-input">Choose a username</label>
                            <input id="my-input" class="form-control" type="text" name="username" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" placeholder="" autocomplete="off">
                        </div>
                        <?php CSRF::outputToken();?>
                        <button type="submit" class="btn btn-outline-info btn-block btn-lg" name="login"><i class="fa fa-user" aria-hidden="true"></i> Login</button>
                    </form>
                    <br>
                    <div class="d-flex flex-column">
                        <br>
                        <h6 style="font-size: 30px; font-family: Times New Roman, Times, serif; font-weight: bolder">OR</h6>
                        <br>
                        <a type="submit" href="<?php echo ROOT; ?>register" class="btn btn-success btn-block"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include "views/includes/footer.php";
?>