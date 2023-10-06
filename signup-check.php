<?php

include "db_connection.php";
session_start();
if (isset($_POST['first_name']) && isset($_POST['address']) && 
    isset($_POST['email']) && isset($_POST['password']) && isset($_POST['re_password'])){
    function validate ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return  $data;
    }

    $first_name = validate($_POST['first_name']);
    $address = validate($_POST['address']);

    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $re_password = validate($_POST['re_password']);

    $user_data = "email=". $email. "&first_name= ". $first_name. "&address=". $address;

    if (empty($first_name)) {
        header("Location: register.php?error=Name is required&$user_data");
        exit();
    }
    else if (empty($address)){
        header("Location: register.php?error=Address is required&$user_data");
        exit();
    }
    else if (empty($email)){
        header("Location: register.php?error=Email is required&$user_data");
        exit();
    }
    else if (empty($password)){
        header("Location: register.php?error=Password is required&$user_data");
        exit();
    }
    else if ($password !==  $re_password){
        header("Location: register.php?error=Passwords should be the same&$user_data");
        exit();
    }
    else{
        //hash the password
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0){
            header("Location: register.php?error=This email is already registered&$user_data");
            exit();
        } 
        else {
            $insert = "INSERT INTO users(first_name,password,email,address) VALUES('$first_name','$password','$email','$address')";
            $insert_result = mysqli_query($conn, $insert);
            if ($insert_result){
                header("Location: register.php?success=Your account has been created successfully");
                exit();
            }
            else{
                header("Location: register.php?error=Unknown error ocurred&$user_data");
                exit();
            }
        }
    }
}
else
{
    header("Location: register.php");
    exit();
}