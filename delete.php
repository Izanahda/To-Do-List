<?php
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM todo WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>