<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "singzone";

$conn = new mysqli($host, $user, $pass, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['booking_id'];
    $method = $_POST['method'];

    $stmt = $conn->prepare("UPDATE bookings SET payment_method=?, payment_status='proses' WHERE id=?");
    $stmt->bind_param("si", $method, $id);

    if ($stmt->execute()) {
        echo "<h2 style='color:lime;text-align:center;'>✅ Metode pembayaran berhasil disimpan.</h2>";
        echo "<p style='text-align:center'><a href='indeks.php'>Kembali ke Beranda</a></p>";
    } else {
        echo "Gagal memperbarui metode pembayaran: " . $stmt->error;
    }
}
?>
