<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);
    $song = htmlspecialchars($_POST["song_request"]);

    // Koneksi ke database
    $servername = "localhost";
    $username = "root"; // sesuaikan jika berbeda
    $password = "";     // sesuaikan jika ada password
    $dbname = "singzone";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Siapkan dan eksekusi query
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message, song_request) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $message, $song);

    if ($stmt->execute()) {
        echo "<script>alert('Terima kasih, pesan Anda telah dikirim!'); window.location.href='contacts.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan. Silakan coba lagi.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
