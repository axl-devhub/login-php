<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="styles.css.">
    </head>    
    <body style="background:#253f61;">
        <div class="login-dark" style="height: 100vh;">
            <form action="signup-check.php" method="post">
                <h2 class="sr-only">Sign up</h2>
                <?php if (isset($_GET['error'])){ ?>
                <p class="alert alert-danger"><?php echo $_GET['error'];?></p>
                <?php } ?>
                <?php if (isset($_GET['success'])){ ?>
                <p class="alert alert-success"><?php echo $_GET['success'];?></p>
                <?php } ?>
                <div class="illustration"><i class="icon ion-document-text"></i></div>
                <div class="form-group">
                    <input class="form-control" type="text" name="first_name" placeholder="First Name"<?php if(isset($_GET['first_name'])){ ?> value="<?php echo $_GET['first_name'];}
                    else{
                        echo '';
                    }?>">
                </div>
                <div class="form-group">
                <input class="form-control" type="text" name="address" placeholder="Address"<?php if(isset($_GET['address'])){ ?> value="<?php echo $_GET['address'];}
                    else{
                        echo '';
                    }?>">
                </div>
                <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Email"<?php if(isset($_GET['email'])){ ?> value="<?php echo $_GET['email'];}
                    else{
                        echo '';
                    }?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="re_password" placeholder="Confirm password">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Sign up</button>
                </div>
                <a class="forgot" href="index.php">Already have an account? Log in</a>
            </form>
        </div>
    </body>
</html>