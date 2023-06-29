<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'finalssip';
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO myanimelist (genre, release_date, eps, synopsis, title) VALUES ('Action, Adventure', '2017', '267', 'New friends and familiar faces join Boruto as a new story begins.', 'Boruto: Naruto Next Generations')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../read.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
?>