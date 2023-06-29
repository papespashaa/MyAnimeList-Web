<?php

//connect to database
require 'function.php';

$id = $_GET["id"];

$anime = query("SELECT * FROM myanimelist WHERE id = $id")[0];

//add button pressed
if(isset($_POST["submit"])) {
    if(update($_POST)> 0) {
        echo "
        <script>
        alert('Data has been successfuly edited!');
        document.location.href = 'read.php';
        </script>";
    } else {
        echo "
        <script>
        alert('Failed to edited data!');
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
    <title>Update Anime</title>
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
<div class="content update">
    <h2>Update Anime</h2>
    <form class= "login" action=""  method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $anime["id"]; ?>">
        <input type="hidden" name="oldimg" value="<?= $anime["anime_image"]; ?>">

        <label for="title">Update Anime Title</label>
        <input type="text" autocomplete="off" name="title" id="title" required value="<?= $anime["title"];?>">
        <img src="images/<?= $anime["anime_image"];?>" style="width:150px;">

        <input type="file" autocomplete="off" name = "image" id = "image" required value="<?= $anime["anime_image"];?>" >

        <label for="genre">genre</label>
        <input type="text" autocomplete="off" name = "genre" id = "genre" required value="<?= $anime["genre"];?>">

        <label for="release date">release date</label>
        <input type="date" autocomplete="off" name = "release date" id = "release date" required value="<?= $anime["release_date"];?>">

        <label for="eps">eps</label>
        <input type="text" autocomplete="off" name = "eps" id = "eps" required value="<?= $anime["eps"];?>">

        <label for="synopsis">synopsis</label>
        <textarea rows="15" cols="150" type="text" name="synopsis"  id="synopsis" autocomplete="off"><?= $anime["synopsis"];?></textarea>


        <input type="submit" name="submit"></input>
    </form>
</div>

</body>
</html>