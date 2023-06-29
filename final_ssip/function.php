<?php
//connect to database
$conn = mysqli_connect("localhost","root","","finalssip");


//to show the data form database
function query($query){
    global $conn;
    $r = mysqli_query($conn, $query);
    $boxes = [];
    while($box = mysqli_fetch_assoc($r)){
        $boxes[] =  $box;
    }
    return $boxes;
}

// add
function add($data){
    global $conn;
    $anime_title = htmlspecialchars($data["title"]);
    $anime_genre = htmlspecialchars($data["genre"]);
    $anime_release = htmlspecialchars($data["release_date"]);
    $anime_eps = htmlspecialchars($data["eps"]);
    $anime_synopsis = htmlspecialchars($data["synopsis"]);
    

    //upload image
    $animeImg = upload();
    if(!$animeImg){
        return false;
    }

    $query = "INSERT INTO myanimelist VALUES ('','$animeImg','$anime_genre','$anime_release','$anime_eps','$anime_synopsis','$anime_title')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//upload
function upload(){
    $filename = $_FILES['image']['name'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    //check if no anime img
    if ($error === 4){
        echo"
        <script> alert('Choose an image first!!!'); </script>
        ";
        return false;
    }
    //check the type
    $validExtension = ['jpg','jpeg','png'];
    $imgExtension = explode('.',$filename);
    $imgExtension = strtolower(end($imgExtension));

    if(!in_array($imgExtension,$validExtension)){
        echo "<script>
        alert('Not an Image!')</script>";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $imgExtension;
    
    move_uploaded_file($tmpName,'images/'.$newFileName);

    return $newFileName;
}

//delete
function delete($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM myanimelist WHERE id=$id");
    return mysqli_affected_rows($conn);
}

//update
function update($data) {
    global $conn;

    $id = $data["id"];
    $anime_title = htmlspecialchars($data["title"]);
    $anime_img = htmlspecialchars($data["oldimg"]);
    $anime_genre = htmlspecialchars($data["genre"]);
    $anime_release = htmlspecialchars($data["release_date"]);
    $anime_eps = htmlspecialchars($data["eps"]);
    $anime_synopsis = htmlspecialchars($data["synopsis"]);

    //check if user has new img
    if($_FILES['image']['error'] === 4) {
        $img = $anime_img;
    } else {
        $img = upload();
    }

    $query = "UPDATE myanimelist SET
                title = '$anime_title',
                anime_image = '$img',
                genre = '$anime_genre',
                release_date = '$anime_release',
                eps = '$anime_eps',
                synopsis = '$anime_synopsis'
                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//registration
function registration($data) {
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2= mysqli_real_escape_string($conn, $data["password2"]);
    $gender = $data["gender"];

    //check if username is already exist
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username is already registered!');
        </script>";
    
        return false;
    }
    
      //check password
    if($password !== $password2) {
        echo "<script>
        alert('password does not match!');
        </script>";
        return false;
    } else {
        //encrypt password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        mysqli_query($conn, "INSERT INTO user
                        VALUES
                    ('', '$username', '$email', '$password', '$gender')");
    
        return mysqli_affected_rows($conn);
    }
    
}
//template for trending 
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
?>