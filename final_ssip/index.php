<?php

session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'function.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>Final_ssip</title>
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
    <div class="content">
        <h2>Home</h2>
        <div class="home">
        <div class="card">
            <div class="border">
                <h1 class="lg"><span class="logo">Welcome</span></h1>
            </div>
        </div>
        </div>
        <section id="profil">
        <div class="card-b">
        <div class="border-bb">
            <div class="container">
            <div class="box">
                <img src="naruto.png">
            </div>
            </div>
            <h3 id="p">HELLO,</h3>
            <p id="pp">Welcome to this website. Anime (Japanese: アニメ, IPA: [aɲime] (listen)) is hand-drawn and computer-generated animation originating from Japan. Outside of Japan and in English, anime refers to Japanese animation, and refers specifically to animation produced in Japan.[1] However, in Japan and in Japanese, anime (a term derived from a shortening of the English word animation) describes all animated works, regardless of style or origin. Animation produced outside of Japan with similar style to Japanese animation is commonly referred to as anime-influenced animation.The earliest commercial Japanese animations date to 1917. A characteristic art style emerged in the 1960s with the works of cartoonist. In here you can make your Anime list.</p>
        </div>
        </div>
    </section>
</div>
    <footer class="akhir"></footer>
</body>
</html>