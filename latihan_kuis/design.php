<?php
include 'database.php';



// Cek apakah user sudah login/daftar
if (!isset($_SESSION['user_id'])) {
    header("Location: daftar.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas Kucing - Gallery</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">🐱 Komunitas Kucing</div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="daftar.php">Daftar</a>
            <a href="design.php">Design</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="container center-img">
        <div class="card" >
            <h2 style="text-align: center;">🐱 Selamat Datang, <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pecinta Kucing' ?>!</h2>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRZZwj5AmTq46_1mlGFuOyCCETpBS-CeCVXXw&s" alt="Kucing Imut" width='500px'>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; 2026 Komunitas Kucing - Semua hak dilindungi</p>
    </div>
</body>
</html>