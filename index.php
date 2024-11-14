<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
</head>
<body>
<h1>To-Do List</h1>
    <form action="add.php" method="POST">
        <input type="text" name="task" placeholder="Tambah Aktivitas" required>
        <button type="submit">Tambah</button>
    </form>

    <h2>Aktivitas</h2>
<ul>
<?php
include('database.php');

$result = mysqli_query($conn, "SELECT * FROM todo");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . htmlspecialchars($row['task']) . " 
                  <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus tugas ini?\");'>Hapus</a> |
                  <a href='edit.php?id=" . $row['id'] . "'>Edit</a> |
                  <a href='update_status.php?id=" . $row['id'] . "&status=done'>Tandai Selesai</a> | 
                        <a href='update_status.php?id=" . $row['id'] . "&status=pending'>Tandai Belum Selesai</a>
              </li>";
            }
        } else {
            echo "<li>Tidak ada aktivitas yang ditambahkan.</li>";
        }
        ?>

    <ul>
</body>
</html>