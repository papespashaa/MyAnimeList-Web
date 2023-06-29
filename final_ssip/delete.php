<?php 

require 'function.php';
$id = $_GET["id"];

if (delete($id) > 0){
    echo "
    <script>
        alert('Data has been succesfully deleted');
        document.location.href = 'read.php';
    </script>";
} else {
    echo"
    <script>
        alert('Data failed to delete');
        document.location.href = 'index.php';
    </script>";
}
?>