<?php
include('database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM todo WHERE id = $id");
    $task = mysqli_fetch_assoc($result)['task'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_task = mysqli_real_escape_string($conn, $_POST['task']);
    $query = "UPDATE todo SET task = '$new_task' WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        header('Location: index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Aktivitas</title>
</head>
<body>
    <h1>Edit Aktivitas</h1>
    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <input type="text" name="task" value="<?php echo $task; ?>" required>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>