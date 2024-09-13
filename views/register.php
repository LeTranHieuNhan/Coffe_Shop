<?php
    include "views/includes/header.php";
?>

<div class="jumbotron jumbotron-fluid mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 pr-5">
                    <h2><i class="fa fa-user-plus" aria-hidden="true"></i> Register</h2>
                    <form action="<?php echo ROOT;?>register" method="post">
                        <div class="form-group">
                            <label for="my-input">Choose a username</label>
                            <input id="my-input" class="form-control" type="text" name="username" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" class="form-control" type="password" name="password" placeholder="" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Password Confirm</label>
                            <input id="password-confirm" class="form-control" type="password" name="password-confirm" placeholder="">
                        </div>
                        <?php CSRF::outputToken();?>
                        <button type="submit" class="btn btn-outline-success btn-block btn-lg" name="register"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</button>
                    </form>
                    <br>
                    <div class="d-flex flex-column">
                        <br>
                        <h6 style="font-size: 30px; font-family: Times New Roman, Times, serif; font-weight: bolder">OR</h6>
                        <br>
                        <a type="submit" href="<?php echo ROOT; ?>login" class="btn btn-info btn-block"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include "views/includes/footer.php";
?>