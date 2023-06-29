<?php 
require 'function.php';

if(isset($_POST["submit"])){
    if (add($_POST)>0){
        echo "
        <script>
            alert('Data has been successfullly added!');
            document.location.href = 'read.php';
        </script>    
        ";
    } else {
        echo "
        <script>
            alert('failed to add data!');
            document.location.href = 'read.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Add</title>
</head>
<body>
<div class="btn">
        <span class="fas fa-bars"></span>
    </div>
    <nav class="sidebar">
        <div class="text">Side Menu</div>
        <ul class="main">
        <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="read.php"><i class="fas fa-stream"></i></i>    Anime List</a></li>
            <li><a href="trending.php"><i class="fas fa-fire"></i></i>  Trending</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>    Log Out</a></li>
        </ul>
    </nav>
    <script src="script.js"></script>
</div> 
<div class="content add">
    <h2>Add Anime</h2>
    <form class = "table" action= "" method="POST" enctype="multipart/form-data">
        <label for="Title">Title</label>
        <input type="text" name = "title" id = "title" autocomplete="off">
        <label for="image">image</label>
        <input type="file" name = "image" id = "image" autocomplete="off">
        <label for="genre">genre</label>
        <input type="text" name = "genre" id = "genre" autocomplete="off">
        <label for="release date">release date</label>
        <input type="date" name = "release date" id = "release date">
        <label for="eps">eps</label>
        <input type="text" name = "eps" id = "eps" autocomplete="off">
        <label for="synopsis">synopsis</label>
        <textarea rows="15" cols="150" type="text" name="synopsis" id="synopsis" autocomplete="off"></textarea>
        <input type="submit" name="submit"></input>
    </form>
</div>
</body>
</html>