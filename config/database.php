<?php
// ==============================
// KONFIGURASI DATABASE
// ==============================

$host = "localhost";
$user = "root";
$pass = "";
$db   = "Fawnaycraft";

// MEMBUAT KONEKSI
$conn = mysqli_connect($host, $user, $pass, $db);

// CEK KONEKSI (YANG BENAR)
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
