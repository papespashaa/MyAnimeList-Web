<?php
function connection() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'animelist';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
function template_header($title) {
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link rel="stylesheet" href="trendingstyle.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
EOT;
}
function template_footer() {
echo <<<EOT
    </body>
</html>
EOT;
}
?>