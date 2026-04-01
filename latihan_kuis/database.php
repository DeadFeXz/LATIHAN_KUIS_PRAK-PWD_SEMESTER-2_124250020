<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'komunitas_kucing';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

session_start();
?>