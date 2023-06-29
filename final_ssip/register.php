<?php
require 'function.php';

if(isset($_POST["register"])) {
    if(registration($_POST) > 0) {
    echo "<script>
        alert('New User Has Been Added');
        document.location.href = 'login.php';
    </script>";

    } else {
    echo mysqli_error($conn);
    }

}
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
<div class = "login-box">
    <h2>Register</h2>
        <form action="" method="post">
            <div class="user-box">
                <input type ="text" name="email" required="" placeholder="Email">
            </div>
            <div class="user-box">
                <input type ="text" name="username" required="" placeholder="Username">
            </div>
            <div class="user-box">
                <input type ="password" name="password" required="" placeholder="Password">
            </div>
            <div class="user-box">
                <input type ="password" name="password2" required="" placeholder="Confirm Password">
            </div>
            <div class="gender">
                <div class="gender-box">
                    <input type ="radio" name="gender" required>
                    <label> Male </label>
                </div>
                <div class="gender-box">
                    <input type ="radio" name="gender" required>
                    <label> Female </label>
                </div>
            </div>

                <div class= "button-form">
                    <button type="submit" name="register" id="submit">Submit</button>
            
                    <div id="register">
                        Already have an account ?
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </form>
        </div>
    <body>
</html>
