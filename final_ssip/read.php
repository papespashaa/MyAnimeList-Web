<?php
require 'function.php';

$anime = query("SELECT * FROM myanimelist");
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
    <title>Read</title>
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
<div class="content read">
    <h2>Anime List</h2>
    <a href="add.php" class="create-contact">ADD</a>
    <table>
    <thead>
        <tr>
            <td>No</td>
            <td>Title</td>
            <td>Image</td>
            <td>Genre</td>
            <td>Release date</td>
            <td>Eps</td>
            <td>Synopsis</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
<?php $i = 1; ?>
<?php foreach($anime as $box) :  ?>
    <tbody>
        <tr>
            <td><?php $i; ?></td>
            <td><?= $box["title"];?></td>
            <td><img src="images/<?= $box["anime_image"];?>" style="width:150px;"></td>
            <td><?= $box["genre"];?></td>
            <td><?= $box["release_date"];?></td>
            <td><?= $box["eps"];?></td>
            <td><?= $box["synopsis"];?></td>
            <td class = "actions"> 
                <a  href="delete.php?id=<?= $box["id"];?>" onclick= "return confirm('Are you sure you want to delete this data?')" class= "trash" ><i class="fas fa-trash fa-xs"></i></a>
                <a  href="update.php?id=<?= $box["id"];?>" onclick= "return confirm('Are you sure you want to update this data?')" class= "edit" ><i class="fas fa-pen fa-xs"></i></a>
            </td>
        </tr>
        <?php $i++; ?>
<?php endforeach; ?>
    </tbody>
    </table>
</div>
</body>
</html>