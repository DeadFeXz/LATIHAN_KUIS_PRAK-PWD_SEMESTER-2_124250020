<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas Kucing - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">🐱 Komunitas Kucing</div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="daftar.php">Daftar</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="design.php">Design</a>
                <a href="logout.php">Logout</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <h1>🐾 Selamat Datang di Komunitas Kucing</h1>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEFKNdGoxSbyp08kWk5Ql87e_QeRFbIbGXhg&s" alt="Kucing Lucu" class="hero-img">
            
            <p>Kucing adalah hewan mamalia kecil yang dikenal dengan sifatnya yang lincah, anggun, dan penuh rasa ingin tahu. Tubuhnya lentur dengan bulu lembut yang beragam warna, serta mata tajam yang mampu melihat jelas di kondisi minim cahaya. Kucing termasuk hewan karnivora, namun dapat beradaptasi hidup bersama manusia sebagai hewan peliharaan. Mereka memiliki kebiasaan menandai untuk menandai wilayah, merawat diri dengan menjilat bulunya, serta tidur dalam waktu lama, bisa mencapai 12-16 jam per hari. Kucing sering dianggap membawa kenyamanan dan kasih sayang, sehingga menjadi salah satu hewan peliharaan paling populer di dunia.</p>
            
            <p>Kucing seperti anjing termasuk hewan yang penyayang. Riset yang dilakukan scientificamerican mengungkapkan kucing mempelajari sendiri cara mengeluarkan bunyi meow yang bisa menarik perhatian manusia. Berikut Macam-Macam Kucing:</p>
            
            <h3>Jenis-Jenis Kucing:</h3>
            <ul class="kucing-list">
                <li>Kucing Garong</li>
                <li>Kucing Maiman</li>
                <li>Kucing Tuan Muda</li>
                <li>Kucing Nakal</li>
                <li>dll</li>
            </ul>
            
            <a href="https://www.unsplash.com/images/animals/cat" target="_blank" class="btn">Informasi Lebih Lanjut</a>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; 2025 Komunitas Kucing - Semua hak dilindungi</p>
    </div>
</body>
</html>