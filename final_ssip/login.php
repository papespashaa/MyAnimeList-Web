<?php

session_start();

require 'function.php';

//check cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //take username based on id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE
    id = $id");
    $row = mysqli_fetch_assoc($result);

    //check cookie and username
    if($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
    }
}

if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}


if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");

    //check username
    if(mysqli_num_rows($result) === 1){
        //check password 
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            //set session
            $_SESSION["login"] = true;
            //check remember me
        if(isset($_POST['remember'])) {
        //create cookie
        
        setcookie('id', $row['id'], time() + 180);
        setcookie('key', hash('sha256', $row['username']), time() + 180);
        }
            header("Location: index.php");
            exit;
        }
    }
    $error = true;

}
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
<div class = "login-box">
    <h2>Login</h2>
        <form action="" method="post">
            <div class="user-box">
                <input type ="text" name="username" required placeholder="Username">
            </div>
            <div class="user-box">
                <input type ="password" name="password" required placeholder="Password">
            </div>

            <ul class = "checklist">
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </li>
            </ul>
                <div class= "button-form">
                    <button type="submit" id= "submit" name = "login" >Submit</button>
                    <div id="register">
                        Don't have an account ?
                        <a href="register.php">Register</a>
                    </div>
                </div>
            </form>
        </div>
    <body>
</html>