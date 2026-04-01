<?php
include 'database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi Sisi Server
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $kelompok_umur = $_POST['kelompok_umur'];
    $jenis_kelamin = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
    $asal_daerah = trim($_POST['asal_daerah']);
    $alasan = trim($_POST['alasan']);
    
    // Cek apakah field utama kosong
    if (empty($nama_lengkap)) {
        $error = "Nama lengkap harus diisi!";
    } elseif (empty($tanggal_lahir)) {
        $error = "Tanggal lahir harus diisi!";
    } elseif (empty($asal_daerah)) {
        $error = "Asal daerah harus diisi!";
    } else {
        // 2. Jika validasi lolos, bersihkan data untuk SQL
        $nama_lengkap = mysqli_real_escape_string($conn, $nama_lengkap);
        $tanggal_lahir = mysqli_real_escape_string($conn, $tanggal_lahir);
        $kelompok_umur = mysqli_real_escape_string($conn, $kelompok_umur);
        $jenis_kelamin = mysqli_real_escape_string($conn, $jenis_kelamin);
        $asal_daerah = mysqli_real_escape_string($conn, $asal_daerah);
        $alasan = mysqli_real_escape_string($conn, $alasan);
        
        $hobi_arr = isset($_POST['hobi']) ? $_POST['hobi'] : [];
        $hobi = mysqli_real_escape_string($conn, implode(', ', $hobi_arr));
        
        // 3. Masukkan ke Database
        $query = "INSERT INTO users (nama_lengkap, tanggal_lahir, kelompok_umur, jenis_kelamin, hobi, asal_daerah, alasan) 
                  VALUES ('$nama_lengkap', '$tanggal_lahir', '$kelompok_umur', '$jenis_kelamin', '$hobi', '$asal_daerah', '$alasan')";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION['user_id'] = mysqli_insert_id($conn);
            $_SESSION['username'] = $nama_lengkap;
            header("Location: design.php");
            exit();
        } else {
            $error = "Gagal mendaftar: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas Kucing - Form Pendaftaran</title>
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
            <h2>📝 Form Pendaftaran Komunitas Kucing</h2>
            
            <?php if($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form id="form-daftar" method="POST" action="">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?= isset($_POST['nama_lengkap']) ? htmlspecialchars($_POST['nama_lengkap']) : '' ?>">
                </div>
                
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="<?= isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '' ?>">
                </div>
                
                <div class="form-group">
                    <label>Kelompok Umur</label>
                    <select name="kelompok_umur">
                        <option value="">Pilih Kelompok Umur</option>
                        <option value="Anak-anak" <?= (isset($_POST['kelompok_umur']) && $_POST['kelompok_umur'] == 'Anak-anak') ? 'selected' : '' ?>>Anak-anak</option>
                        <option value="Remaja" <?= (isset($_POST['kelompok_umur']) && $_POST['kelompok_umur'] == 'Remaja') ? 'selected' : '' ?>>Remaja</option>
                        <option value="Dewasa" <?= (isset($_POST['kelompok_umur']) && $_POST['kelompok_umur'] == 'Dewasa') ? 'selected' : '' ?>>Dewasa</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                        <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?= (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Laki-laki') ? 'checked' : '' ?>> Laki-laki</label>
                        <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?= (isset($_POST['jenis_kelamin']) && $_POST['jenis_kelamin'] == 'Perempuan') ? 'checked' : '' ?>> Perempuan</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Hobi</label>
                    <div class="checkbox-group">
                        <?php 
                        $hobbies = isset($_POST['hobi']) ? $_POST['hobi'] : []; 
                        ?>
                        <label><input type="checkbox" name="hobi[]" value="Main Game" <?= in_array('Main Game', $hobbies) ? 'checked' : '' ?>> Main Game</label>
                        <label><input type="checkbox" name="hobi[]" value="Ngoding" <?= in_array('Ngoding', $hobbies) ? 'checked' : '' ?>> Ngoding</label>
                        <label><input type="checkbox" name="hobi[]" value="Bermain dengan kucing" <?= in_array('Bermain dengan kucing', $hobbies) ? 'checked' : '' ?>> Bermain dengan kucing</label>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Asal Daerah</label>
                    <input type="text" name="asal_daerah" value="<?= isset($_POST['asal_daerah']) ? htmlspecialchars($_POST['asal_daerah']) : '' ?>">
                </div>
                
                <div class="form-group">
                    <label>Alasan Ingin Bergabung</label>
                    <textarea name="alasan" rows="4"><?= isset($_POST['alasan']) ? htmlspecialchars($_POST['alasan']) : '' ?></textarea>
                </div>
                
                <button type="submit" class="btn">Daftar Sekarang</button>
            </form>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; 2026 Komunitas Kucing - Semua hak dilindungi</p>
    </div>
</body>
</html>