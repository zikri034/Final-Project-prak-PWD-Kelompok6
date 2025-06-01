<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "singzone";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$user_id = $_SESSION["user_id"];
$sql = "SELECT name, email, phone, created_at FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email, $phone, $created_at);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya - SingZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #121212;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }
        .profile-container {
            max-width: 600px;
            margin: 40px auto;
            background: #1e1e1e;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.3);
        }
        h2 {
            color: #bb86fc;
        }
        .btn-logout {
            background: #e53935;
            border: none;
        }
        .btn-logout:hover {
            background: #c62828;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2 class="text-center">Profil Saya</h2>
    <hr>
    <p><strong>Nama:</strong> <?= htmlspecialchars($name) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>No. HP:</strong> <?= htmlspecialchars($phone) ?></p>
    <p><strong>Tanggal Bergabung:</strong> <?= htmlspecialchars($created_at) ?></p>
    <div class="mt-4 d-flex justify-content-between">
        <a href="indeks.php" class="btn btn-secondary">Kembali ke Beranda</a>
        <a href="logout.php" class="btn btn-logout">Logout</a>
    </div>
</div>

</body>
</html>
