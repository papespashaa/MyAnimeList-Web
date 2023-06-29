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
    $sql = "INSERT INTO myanimelist (genre, release_date, eps, synopsis, title) VALUES ('Action, Drama, Supernatural', '2021', '24', 'Takemichi decides to fly through time to change the course of the future.', 'Tokyo Revengers')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../read.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
?>