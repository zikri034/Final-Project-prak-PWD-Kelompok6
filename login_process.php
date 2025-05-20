<?php
session_start();
include 'config.php'; // koneksi ke database

// Tangkap data dari form
$email = $_POST['email'];
$password = $_POST['password'];

// Cek apakah email terdaftar
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) === 1) {
    $user = mysqli_fetch_assoc($result);

    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name']; // ← pastikan kolom ini ada di tabel users
        header("Location: indeks.php");
        exit();
    } else {
        echo "Password salah.";
    }
} else {
    echo "Email tidak ditemukan.";
}
?>
