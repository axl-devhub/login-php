<?php
session_start();
    if(isset($_SESSION['id']) && isset($_SESSION['email'])){
        
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="styles.css.">
</head>

<body style="background: #253f61;">
<div class="container">
    <div class="login-dark" style="height: 100vh;"> 
        <form>
            <h1  class="title">Hello <?php echo $_SESSION['first_name']; ?></h1>
            <a class="logout" href="logout.php">Logout</a>
        </form>
    </div>
</div>
</body>
</html>
<?php
}else {
    header("Location: index.php");
    exit();
}
?>