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
    $sql = "INSERT INTO myanimelist (genre, release_date, eps, synopsis, title) VALUES ('Action', '2022', '10', 'Denji devotes everything and fights with all his might to make his naive dreams a reality.', 'Chainsaw Man')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ../read.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
?>