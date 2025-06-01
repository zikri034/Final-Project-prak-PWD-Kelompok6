<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SINGZONE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #121212;
            font-family: 'Segoe UI', Arial, sans-serif;
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

        .contact-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            padding: 2rem 2.5rem;
        }
        .contact-title {
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #3a3a3a;
        }
        .contact-info {
            margin-bottom: 2rem;
        }
        .contact-info p {
            margin-bottom: 0.5rem;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-primary {
            background: #6f42c1;
            border: none;
        }
        .btn-primary:hover {
            background: #563d7c;
        }
        .social-links a {
            margin-right: 1rem;
            font-size: 1.5rem;
            color: #6f42c1;
            transition: color 0.2s;
            text-decoration: none;
        }
        .social-links a:hover {
            color: #563d7c;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
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

    <div class="contact-container">
        <h2 class="contact-title text-center">Contact Us</h2>
        <div class="contact-info">
            <p><i class="bi bi-geo-alt-fill"></i> Alamat: Jl. Musik Bahagia No. 123, Jakarta</p>
            <p><i class="bi bi-telephone-fill"></i> Telepon: <a href="tel:+6281292703061">+62 812-9270-3061</a></p>
            <p><i class="bi bi-envelope-fill"></i> Email: <a href="mailto:muhammadzikrirausyan@gmail.com">muhammadzikrirausyan@gmail.com</a></p>
            <div class="social-links">
                <a href="https://wa.me/81292703061" target="_blank" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                <a href="https://instagram.com/songpride" target="_blank" title="Instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://facebook.com/songpride" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
            </div>
        </div>
        <form action="submit_contact.php" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email@domain.com" required>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Pesan</label>
        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Tulis pesan Anda..." required></textarea>
    </div>
    <div class="mb-3">
        <label for="song-request" class="form-label">Request Lagu (Opsional)</label>
        <input type="text" class="form-control" id="song-request" name="song_request" placeholder="Judul & Artis Lagu yang Anda inginkan">
    </div>
    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg">Kirim Pesan</button>
    </div>
</form>
        <div class="text-center mt-4">
            <a href="indeks.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>

     <!-- Footer -->
       <footer style="background-color: #000; color: #fff; text-align: center; padding: 20px;">
        <div>
            <p style="margin: 0;">&copy; 2025 Sing it out loud! All rights reserved.</p>
            <small>
                Follow us on
                <a href="https://www.instagram.com/zikrihermwan?igsh=bHJ2eXFmZ3g2YnRz" style="color: #bbb; text-decoration: none;">Instagram</a>,
                <a href="#" style="color: #bbb; text-decoration: none;">Twitter</a>,
                <a href="#" style="color: #bbb; text-decoration: none;">YouTube</a>
            </small>
        </div>
    </footer> 
    
</body>
</html>