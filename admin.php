<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // sesuaikan dengan password MySQL-mu
$dbname = 'singzone';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<?php
session_start();
// Ganti username dan password sesuai kebutuhan
$admin_username = 'admin';
$admin_password = 'admin123';
require_once 'config.php';

// Simulasi data booking (bisa diganti dengan database/file)
if (!isset($_SESSION['bookings'])) {
    $_SESSION['bookings'] = [

    ];
}

$bookings = [];
$result = $conn->query("SELECT * FROM booking");
while ($row = $result->fetch_assoc()) {
    $bookings[] = $row;
}

// Jika belum login, tampilkan form login
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        if ($username === $admin_username && $password === $admin_password) {
            $_SESSION['is_admin'] = true;
            header("Location: admin.php");
            exit;
        } else {
            $error = "Username atau password salah!";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Admin - SONG PRIDE</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body { background: #f7f9fc; font-family: 'Segoe UI', Arial, sans-serif; }
            .login-container {
                max-width: 400px; margin: 80px auto; background: #fff; border-radius: 12px;
                box-shadow: 0 4px 16px rgba(0,0,0,0.08); padding: 2rem 2.5rem;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <h2 class="mb-4 text-center">Admin Login</h2>
            <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin.php");
    exit;
}

if (isset($_POST['action']) && $_POST['action'] === 'add') {
    $stmt = $conn->prepare("INSERT INTO booking (room_type, room_number, status, name, start_time, payment_status) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $_POST['type'], $_POST['room_number'], $_POST['status'], $_POST['name'], $_POST['start_time'], $_POST['payment_status']);
    $stmt->execute();
    header("Location: admin.php");
    exit;
}

if (isset($_POST['action']) && $_POST['action'] === 'edit' && isset($_POST['idx'])) {
    $stmt = $conn->prepare("UPDATE booking SET room_type=?, room_number=?, status=?, name=?, start_time=?, payment_status=? WHERE id=?");
    $stmt->bind_param("ssssssi", $_POST['room_type'], $_POST['room_number'], $_POST['status'], $_POST['name'], $_POST['start_time'], $_POST['payment_status'], $_POST['idx']);
    $stmt->execute();
    header("Location: admin.php");
    exit;
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM booking WHERE id = $id");
    header("Location: admin.php");
    exit;
}

$editData = null;
if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $res = $conn->query("SELECT * FROM booking WHERE id = $editId");
    $editData = $res->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Singzone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f7f9fc;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .admin-container {
            max-width: 1100px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            padding: 2rem 2.5rem;
        }
        .admin-title {
            font-weight: 700;
            margin-bottom: 2rem;
            color: #3a3a3a;
        }
        .admin-menu a {
            display: block;
            margin-bottom: 1rem;
            padding: 1rem;
            border-radius: 8px;
            background: #6f42c1;
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            transition: background 0.2s;
            text-align: center;
        }
        .admin-menu a:hover {
            background: #563d7c;
        }
        .table-status td, .table-status th {
            vertical-align: middle;
            text-align: center;
        }
        .badge-booked { background: #ffc107; color: #212529; }
        .badge-inuse { background: #198754; }
        .badge-empty { background: #6c757d; }
        .badge-paid { background: #198754; }
        .badge-unpaid { background: #dc3545; }
    </style>
</head>
<body>
    <div class="admin-container">
        <h2 class="admin-title text-center">Pantauan & Kelola Booking Singzone</h2>
        <h4 class="mb-3">Daftar Booking & Pelanggan</h4>
        <table class="table table-bordered table-status">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Tipe Ruangan</th>
                    <th>Nomor Ruangan</th>
                    <th>Status</th>
                    <th>Pelanggan</th>
                    <th>Waktu Booking</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; foreach ($bookings as $booking): ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= htmlspecialchars($booking['room_type']) ?></td>
        <td><?= htmlspecialchars($booking['room_number']) ?></td>
        <td>
            <?php
            if ($booking['status'] === 'booked') {
                echo "<span class='badge badge-booked'>Booked</span>";
            } elseif ($booking['status'] === 'in_use') {
                echo "<span class='badge badge-inuse'>Sedang Dipakai</span>";
            } else {
                echo "<span class='badge badge-empty'>Kosong</span>";
            }
            ?>
        </td>
        <td><?= $booking['name'] ? htmlspecialchars($booking['name']) : '-' ?></td>
        <td><?= $booking['start_time'] ? htmlspecialchars($booking['start_time']) : '-' ?></td>
        <td>
            <?php
            if (($booking['payment_status'] ?? '') === 'paid') {
                echo "<span class='badge badge-paid'>Sudah Bayar</span>";
            } else {
                echo "<span class='badge badge-unpaid'>Belum Bayar</span>";
            }
            ?>
        </td>
        <td>
            <a href="admin.php?edit=<?= $booking['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="admin.php?delete=<?= $booking['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus booking ini?')">Hapus</a>
        </td>
    </tr>
<?php endforeach; ?>

            </tbody>
        </table>

        <!-- Form Tambah/Edit Booking -->
        <div class="mt-5">
            <h5><?= $editData ? 'Edit Booking' : 'Tambah Booking' ?></h5>
            <form method="post" class="row g-3">
                <input type="hidden" name="action" value="<?= $editData ? 'edit' : 'add' ?>">
                <?php if ($editData): ?>
    <input type="hidden" name="idx" value="<?= $editData['id'] ?>">
<?php endif; ?>
                <div class="col-md-2">
                    <select name="room_type" class="form-select" required>
                        <option value="">Tipe Ruangan</option>
                        <option value="Ruang Standart" <?= isset($editData['room_type']) && $editData['room_type']=='Ruang Standart'?'selected':''; ?>>Ruang Standart</option>
                        <option value="Ruang VIP" <?= isset($editData['room_type']) && $editData['room_type']=='Ruang VIP'?'selected':''; ?>>Ruang VIP</option>
                        <option value="Ruang Exclusive" <?= isset($editData['room_type']) && $editData['room_type']=='Ruang Exclusive'?'selected':''; ?>>Ruang Exclusive</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="room_number" class="form-control" placeholder="No. Ruangan" value="<?= $editData['room_number'] ?? '' ?>" required>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select" required>
                        <option value="booked" <?= isset($editData['status']) && $editData['status']=='booked'?'selected':''; ?>>Booked</option>
                        <option value="in_use" <?= isset($editData['status']) && $editData['status']=='in_use'?'selected':''; ?>>Sedang Dipakai</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="text" name="name" class="form-control" placeholder="Nama Pelanggan" value="<?= $editData['name'] ?? '' ?>" required>
                </div>
                <div class="col-md-2">
                    <input type="text" name="start_time" class="form-control" placeholder="Waktu Booking" value="<?= $editData['start_time'] ?? '' ?>" required>
                </div>
                <div class="col-md-2">
                   <select name="payment_status" class="form-select" required>
    <option value="unpaid" <?= isset($editData['payment_status']) && $editData['payment_status']=='unpaid'?'selected':''; ?>>Belum Bayar</option>
    <option value="paid" <?= isset($editData['payment_status']) && $editData['payment_status']=='paid'?'selected':''; ?>>Sudah Bayar</option>
</select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success"><?= $editData ? 'Update' : 'Tambah' ?></button>
                    <?php if ($editData): ?>
                        <a href="admin.php" class="btn btn-secondary">Batal</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <div class="text-center mt-4">
            <a href="indeks.php" class="btn btn-secondary">Kembali ke Halaman Utama</a>
        </div>
        <div class="text-center mt-4">
            <a href="logout.php" class="btn btn-secondary">Logout</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>