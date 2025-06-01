<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php?error=Silakan login terlebih dahulu untuk booking ruangan.");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Room 2 - SingZone</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #121212;
      color: #f5f5f5;
    }

    header {
            background-color: #1c1c1c;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

       .nav-link {
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #6200ea;
}

    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
      background-color: #1e1e1e;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .room-image {
      width: 100%;
      height: 400px;
      object-fit: cover;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    h1, h3 {
      color: #bb86fc;
    }

    .price {
      font-size: 1.2em;
      font-weight: bold;
      margin-top: 10px;
      color: #ffd700;
    }

    .features {
      margin-top: 20px;
      padding-left: 20px;
    }

    .features li {
      margin-bottom: 8px;
    }

    .booking-button {
      display: inline-block;
      margin-top: 30px;
      padding: 12px 24px;
      background-color: #6200ea;
      color: #fff;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .booking-button:hover {
      background-color: #4b00c4;
    }

    form {
      margin-top: 40px;
      background-color: #2c2c2c;
      padding: 20px;
      border-radius: 10px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      margin-top: 15px;
      color: #f5f5f5;
    }

    input, select, textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: none;
      margin-top: 5px;
      background-color: #444;
      color: #fff;
    }

    textarea {
      resize: vertical;
      min-height: 80px;
    }

    .form-actions {
      margin-top: 20px;
      text-align: center;
    }

    .form-actions button,
    .form-actions a {
      margin: 10px;
      padding: 12px 20px;
      font-size: 1em;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      text-decoration: none;
    }

    .btn-primary {
      background-color: #03dac6;
      color: #000;
    }

    .btn-success {
      background-color: #25d366;
      color: #fff;
    }

    .btn-primary:hover {
      background-color: #00bfa5;
    }

    .btn-success:hover {
      background-color: #1ebe5d;
    }
  </style>
</head>
<body>
   <header style="background-color: #1c1c1c; padding: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
    <h1 style="margin: 0; font-size: 28px;">SingZone</h1>
    <nav style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
      <a href="indeks.php" class="nav-link">Home</a>
        <a href="about.html" class="nav-link">About</a>
        <a href="songcatalog.html" class="nav-link">Song Catalog</a>
        <a href="register_member.php" class="nav-link">Membership</a>
        <a href="contacts.php" class="nav-link">Contact</a>
        <a href="login.php" title="Go to profile">
            <img src="profile.png" alt="User Profile" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
        </a>
    </nav>
</header>
  <div class="container">
    <img src="viproom.jpeg" alt="Room 1" class="room-image" />

    <h1>Room 2 - VIP Private Karaoke</h1>
    <p>Room 1 menawarkan suasana nyaman dan akustik terbaik untuk pengalaman karaoke yang menyenangkan bersama teman atau keluarga. Cocok untuk grup kecil hingga menengah.</p>

    <div class="price">IDR 150.000 / jam</div>

    <h3>Fasilitas:</h3>
    <ul class="features">
      <li>AC & Ruangan Ber-AC Full</li>
      <li>Layar LED 42 inch</li>
      <li>Sound System Profesional</li>
      <li>Mic Wireless</li>
      <li>Kursi Sofa Nyaman</li>
      <li>Lampu Ambient Mood</li>
    </ul>

    <form action="booking.php" method="POST">
      <h3>Reservasi Ruangan</h3>
      <label for="name">Nama Lengkap</label>
      <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>

      <label for="email">Email</label>
       <input type="email" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>" readonly>

      <label for="phone">Nomor WhatsApp</label>
      <input type="tel" id="phone" name="phone" placeholder="08xxxxxxxx" required>

      <label for="date">Pilih Tanggal</label>
      <input type="date" id="date" name="date" required min="<?php echo date('Y-m-d'); ?>">

      <label for="start_time">Jam Mulai</label>
<input type="time" id="start_time" name="start_time" required>

<label for="end_time">Jam Selesai</label>
<input type="time" id="end_time" name="end_time" required>


      <label for="participants">Jumlah Peserta</label>
      <input type="number" id="participants" name="participants" placeholder="Masukkan jumlah peserta" required>

      <label for="room-type">Pilih Ruangan</label>
      <select id="room-type" name="room_type" required>
        <option value="Ruang VIP">Ruang VIP</option>
      </select>

      <label for="notes">Catatan Tambahan</label>
      <textarea id="notes" name="notes" placeholder="Contoh: butuh LCD proyektor tambahan..."></textarea>

      <div class="form-actions">
        <h3>Metode Pembayaran</h3>
      <p>Silakan transfer biaya booking ke rekening berikut:</p>
      <ul class="features">
        <li><strong>BCA:</strong> 1234567890 a/n SingZone Karaoke</li>
        <li><strong>Mandiri:</strong> 9876543210 a/n SingZone Entertainment</li>
      </ul>

      <p>Atau scan QR berikut untuk pembayaran QRIS:</p>
      <img src="gerrydigital.jpg" alt="QRIS Pembayaran" style="max-width: 200px; display: block; margin: 10px auto;" />

      <p style="font-size: 0.95em; color: #ccc; margin-top: 10px;">
        Setelah pembayaran, silakan klik tombol "Konfirmasi & Bayar" dan lanjutkan konfirmasi melalui WhatsApp.
      </p>
        <button type="submit" class="btn-primary">Konfirmasi & Bayar</button>
        <a href="https://wa.me/081292703061?text=Halo%20Saya%20ingin%20booking%20ruangan" class="btn-success">Lanjut ke WhatsApp</a>
      </div>
    </form>
    <p id="availability-info" style="margin-top: 10px; color: #ffd700;"></p>
  </div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const dateInput = document.getElementById("date");
  const roomSelect = document.getElementById("room-type");
  const infoText = document.getElementById("availability-info");

  function cekKetersediaan() {
    const tanggal = dateInput.value;
    const ruangan = roomSelect.value;

    if (tanggal && ruangan) {
      fetch(`cek_ketersediaan.php?date=${tanggal}&room=${encodeURIComponent(ruangan)}`)
        .then(response => response.json())
        .then(data => {
          infoText.textContent = `Tersisa ${data.tersisa} dari ${data.max} ruangan tersedia.`;
          if (data.tersisa <= 0) {
            infoText.style.color = "red";
          } else {
            infoText.style.color = "#ffd700";
          }
        })
        .catch(err => {
          infoText.textContent = "Gagal mengambil data ketersediaan.";
          infoText.style.color = "red";
        });
    }
  }

  dateInput.addEventListener("change", cekKetersediaan);
  roomSelect.addEventListener("change", cekKetersediaan);
});
</script>

</body>
</html>
