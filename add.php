<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = mysqli_real_escape_string($conn, $_POST['task']);
    $query = "INSERT INTO todo (task) VALUES ('$task')";
    
    if (mysqli_query($conn, $query)) {
        header('Location: index.php'); 
        exit(); 
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>