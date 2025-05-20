<?php
include 'config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Gunakan password hashing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Cek apakah email sudah terdaftar
$check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
if (mysqli_num_rows($check) > 0) {
    echo "Email sudah terdaftar. Silakan gunakan email lain.";
    exit();
}

// Insert ke database (gunakan hashed password)
$query = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$hashed_password')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
} else {
    echo "Registrasi gagal: " . mysqli_error($conn);
}
?>
