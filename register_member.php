<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "singzone";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Cek apakah email sudah terdaftar
    $cek = $conn->prepare("SELECT * FROM members WHERE email = ?");
    $cek->bind_param("s", $email);
    $cek->execute();
    $result = $cek->get_result();

    if ($result->num_rows > 0) {
        $error = "Email sudah terdaftar sebagai member.";
    } else {
        $stmt = $conn->prepare("INSERT INTO members (name, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $password);
        if ($stmt->execute()) {
            $success = true;
        } else {
            $error = "Gagal mendaftar: " . $stmt->error;
        }
        $stmt->close();
    }

    $cek->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Member SingZone</title>
    <style>
        
        body { background:#121212; color:#fff; font-family:Arial; display:flex; justify-content:center; align-items:center; height:100vh; margin:0; }
        .form-box { background:#1e1e1e; padding:40px; border-radius:10px; box-shadow:0 0 15px rgba(98,0,234,0.5); width:100%; max-width:400px; }
        h2 { text-align:center; color:#bb86fc; }
        input[type=text], input[type=email], input[type=password] {
            width:100%; padding:10px; margin:10px 0; border:none; border-radius:6px;
        }
        button {
            width:100%; padding:10px; background:#bb86fc; border:none; color:#fff; border-radius:6px; cursor:pointer;
        }
        button:hover { background:#a26eea; }
        .message { text-align:center; margin-top:15px; }
        .success { color:#80ff80; }
        .error { color:#ff6b6b; }
        a { color:#bb86fc; text-decoration:none; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Daftar Member SingZone</h2>
        <table style="width:100%; border-collapse:collapse; margin-top:20px; color:#fff;">
  <thead>
    <tr style="background-color:#333;">
      <th style="padding:12px; border:1px solid #444;">Fitur</th>
      <th style="padding:12px; border:1px solid #444;">Member</th>
      <th style="padding:12px; border:1px solid #444;">Non-Member</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="padding:10px; border:1px solid #444;">Diskon Booking</td>
      <td style="padding:10px; border:1px solid #444;">✅ 10% Diskon</td>
      <td style="padding:10px; border:1px solid #444;">❌ Tidak Ada Diskon</td>
    </tr>
    <tr style="background-color:#2c2c2c;">
      <td style="padding:10px; border:1px solid #444;">Akses Prioritas Jadwal</td>
      <td style="padding:10px; border:1px solid #444;">✅ Ya</td>
      <td style="padding:10px; border:1px solid #444;">❌ Tidak</td>
    </tr>
    <tr>
      <td style="padding:10px; border:1px solid #444;">Notifikasi Promo</td>
      <td style="padding:10px; border:1px solid #444;">✅ Dapat via Email</td>
      <td style="padding:10px; border:1px solid #444;">❌ Tidak Dapat</td>
    </tr>
    <tr style="background-color:#2c2c2c;">
      <td style="padding:10px; border:1px solid #444;">Pendaftaran</td>
      <td style="padding:10px; border:1px solid #444;">✅ Gratis</td>
      <td style="padding:10px; border:1px solid #444;">–</td>
    </tr>
    <tr>
      <td style="padding:10px; border:1px solid #444;">Akses Katalog Lagu Spesial</td>
      <td style="padding:10px; border:1px solid #444;">✅ Ya</td>
      <td style="padding:10px; border:1px solid #444;">❌ Tidak</td>
    </tr>
  </tbody>
</table>

        <?php if ($success): ?>
            <p class="message success">✅ Pendaftaran berhasil! Silakan <a href="login.php">login</a>.</p>
        <?php elseif ($error): ?>
            <p class="message error">❌ <?= $error ?></p>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="No. HP / WhatsApp" required>
            <input type="password" name="password" placeholder="Kata Sandi" required>
            <button type="submit">Daftar Member</button>
        </form>
    </div>
</body>
</html>
