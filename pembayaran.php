<?php
session_start();
if (!isset($_SESSION['last_booking_email'])) {
  header("Location: indeks.php");
  exit();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "singzone";

$conn = new mysqli($host, $user, $pass, $db);

$email = $_SESSION['last_booking_email'];
$date = $_SESSION['last_booking_date'];
$start = $_SESSION['last_booking_start'];

$query = $conn->prepare("SELECT * FROM bookings WHERE email=? AND booking_date=? AND start_time=?");
$query->bind_param("sss", $email, $date, $start);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_assoc();

$total = number_format($data['total_price'], 0, ',', '.');

?>

<!DOCTYPE html>
<html>
<head>
  <title>Metode Pembayaran</title>
  <style>
    body { background-color: #121212; color: #fff; font-family: sans-serif; text-align: center; padding: 50px; }
    .box { background: #1e1e1e; padding: 30px; border-radius: 10px; display: inline-block; }
    h1 { color: #bb86fc; }
    .total { font-size: 1.5em; margin: 20px 0; color: #ffd700; }
    select, button {
      padding: 10px;
      border-radius: 6px;
      border: none;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="box">
    <h1>💳 Metode Pembayaran</h1>
    <p>Silakan pilih metode pembayaran dan lanjutkan pembayaran Anda.</p>
    <div class="total">Total Bayar: Rp <?= $total; ?></div>
    <form action="proses_pembayaran.php" method="POST">
      <input type="hidden" name="booking_id" value="<?= $data['id']; ?>">
      <label for="method">Pilih Metode:</label><br>
      <select name="method" id="method" required>
        <option value="">-- Pilih --</option>
        <option value="Transfer Bank">Transfer Bank</option>
        <option value="QRIS">QRIS</option>
        <option value="Bayar di Tempat">Bayar di Tempat</option>
      </select><br><br>
      <button type="submit">Konfirmasi Pembayaran</button>
    </form>
  </div>
</body>
</html>