<?php
session_start();
session_unset();    // Hapus semua data session
session_destroy();  // Hancurkan session

// Redirect ke halaman utama
header("Location: indeks.php");
exit();
header("Location: indeks.php?logout=1");
?>
