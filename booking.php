<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=Silakan login terlebih dahulu untuk booking.");
    exit();
}

$host = "localhost";
$user = "root";
$pass = "";
$db = "singzone";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];
    $phone = htmlspecialchars($_POST["phone"]);
    $date = $_POST["date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $room_type = $_POST["room_type"];
    $people = intval($_POST["participants"]);
    $notes = htmlspecialchars($_POST["notes"]);

    // Validasi waktu: start harus < end
    if (strtotime($start_time) >= strtotime($end_time)) {
        echo "<h2 style='color:red;text-align:center;margin-top:20%'>❌ Jam mulai harus lebih awal dari jam selesai.</h2>";
        echo "<p style='text-align:center'><a href='javascript:history.back()'>🔙 Kembali</a></p>";
        exit();
    }

    // Cek konflik jadwal
    $cek_query = "
        SELECT * FROM bookings 
        WHERE booking_date = ? AND room_type = ? 
        AND (start_time < ? AND end_time > ?)
    ";
    $cek_stmt = $conn->prepare($cek_query);
    $cek_stmt->bind_param("ssss", $date, $room_type, $end_time, $start_time);
    $cek_stmt->execute();
    $cek_result = $cek_stmt->get_result();

    // Cek jumlah booking ruangan yang sama pada tanggal tersebut
$max_rooms_per_day = 5; 
$jumlah_query = "
    SELECT COUNT(*) as total_booked 
    FROM bookings 
    WHERE booking_date = ? AND room_type = ?
";
$jumlah_stmt = $conn->prepare($jumlah_query);
$jumlah_stmt->bind_param("ss", $date, $room_type);
$jumlah_stmt->execute();
$jumlah_result = $jumlah_stmt->get_result();
$jumlah_data = $jumlah_result->fetch_assoc();
$jumlah_terbooking = $jumlah_data['total_booked'];

if ($jumlah_terbooking >= $max_rooms_per_day) {
    echo <<<HTML
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Ruangan Penuh</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #1c1c1c;
                color: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .error-box {
                background-color: #2c2c2c;
                padding: 40px;
                border-radius: 12px;
                box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
                text-align: center;
                max-width: 500px;
            }
            h1 {
                color: #ff6b6b;
            }
            a {
                margin-top: 20px;
                background-color: #bb86fc;
                padding: 10px 20px;
                color: #fff;
                text-decoration: none;
                border-radius: 6px;
                display: inline-block;
            }
        </style>
    </head>
    <body>
        <div class="error-box">
            <h1>❌ Semua Ruangan Penuh</h1>
            <p>Maaf, semua <strong>$room_type</strong> untuk tanggal <strong>$date</strong> telah dibooking.</p>
            <p>Silakan pilih tanggal lain.</p>
            <a href="javascript:history.back()">Kembali ke Form</a>
        </div>
    </body>
    </html>
    HTML;
    exit();
}

    // Hitung durasi dan total harga
    $durasi_jam = (strtotime($end_time) - strtotime($start_time)) / 3600;
    $harga_per_jam = 100000;
    $total_harga = $durasi_jam * $harga_per_jam;

    if ($cek_result->num_rows > 0) {
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Jadwal Bentrok</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #1c1c1c;
                    color: #fff;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .error-box {
                    background-color: #2c2c2c;
                    padding: 40px;
                    border-radius: 12px;
                    box-shadow: 0 0 15px rgba(255, 0, 0, 0.5);
                    text-align: center;
                    max-width: 500px;
                }
                h1 {
                    color: #ff6b6b;
                }
                a {
                    margin-top: 20px;
                    background-color: #bb86fc;
                    padding: 10px 20px;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 6px;
                    display: inline-block;
                }
            </style>
        </head>
        <body>
            <div class="error-box">
                <h1>❌ Jadwal Sudah Dipesan</h1>
                <p>Ruangan <strong>$room_type</strong> pada <strong>$date</strong> pukul <strong>$start_time – $end_time</strong> sudah dibooking.</p>
                <p>Silakan pilih jadwal lain.</p>
                <a href="javascript:history.back()">Kembali ke Form</a>
            </div>
        </body>
        </html>
        HTML;
        exit();
    }

    // Simpan booking
    $stmt = $conn->prepare("
        INSERT INTO bookings (name, email, phone, booking_date, start_time, end_time, room_type, people, notes, total_price, payment_status) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending')
    ");
    $stmt->bind_param("sssssssisd", $name, $email, $phone, $date, $start_time, $end_time, $room_type, $people, $notes, $total_harga);

    if ($stmt->execute()) {
        $wa_link = "https://wa.me/6281234567890?text=" . urlencode("Halo admin, saya sudah melakukan pembayaran booking atas nama $name");

        echo <<<HTML
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <title>Konfirmasi Booking - SingZone</title>
            <style>
                body {
                    font-family: 'Times New Roman', serif;
                    background-color: #121212;
                    color: #ffffff;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .confirmation-box {
                    background-color: #1c1c1c;
                    padding: 40px;
                    border-radius: 12px;
                    box-shadow: 0 0 20px rgba(98, 0, 234, 0.5);
                    max-width: 500px;
                    text-align: center;
                }
                h1 {
                    color: #bb86fc;
                }
                .back-btn {
                    margin-top: 15px;
                    background-color: #6200ea;
                    color: white;
                    padding: 10px 20px;
                    border-radius: 5px;
                    text-decoration: none;
                    display: inline-block;
                }
                .back-btn:hover {
                    background-color: #7f39fb;
                }
            </style>
        </head>
        <body>
            <div class="confirmation-box">
                <h1>🎉 Booking Berhasil!</h1>
                <p><strong>Nama:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Telepon:</strong> $phone</p>
                <p><strong>Tanggal:</strong> $date</p>
                <p><strong>Waktu:</strong> $start_time – $end_time</p>
                <p><strong>Ruangan:</strong> $room_type</p>
                <p><strong>Jumlah Orang:</strong> $people</p>
                <p><strong>Catatan:</strong> $notes</p>
                <p><strong>Status Pembayaran:</strong> Belum Dibayar</p>
                <p>Silakan transfer ke rekening berikut:</p>
                <p><strong>BCA 1234567890 a/n SingZone</strong></p>
                <p>Atau scan QR berikut untuk pembayaran QRIS:</p>
                <img src="gerrydigital.jpg" alt="QRIS Pembayaran" style="max-width: 200px; margin: 10px 0;"/>
                <p>Setelah transfer, silakan konfirmasi via WhatsApp:</p>
                <a class="back-btn" href="$wa_link">Konfirmasi via WhatsApp</a>
                <a class="back-btn" href="indeks.php">Kembali ke Beranda</a>
            </div>
        </body>
        </html>
        HTML;
    } else {
        echo "Gagal menyimpan booking: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Request tidak valid.";
}

$conn->close();
?>
