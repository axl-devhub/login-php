<?php

include "db_connection.php";
session_start();
if (isset($_POST['email']) && isset($_POST['password'])){
    function validate ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return  $data;
    }


    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: index.php?error=User Name is required");
        exit();
    }
    else if (empty($password)){
        header("Location: index.php?error=Password is required");
        exit();
        
    }

    else{
        //hash the password
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($conn, $sql);



        if (mysqli_num_rows($result)){
            $row =  mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $password){
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['address'] = $row['address'];
                header("Location: homepage.php");
                exit();
            }
        }
        else {
            header("Location: index.php?error=Incorrect user or password");
            exit();
        }
        
    }
}else
{
    header("Location: index..php");
    exit();
}