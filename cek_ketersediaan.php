<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "singzone";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['date']) && isset($_GET['room'])) {
    $date = $_GET['date'];
    $room = $_GET['room'];
    $max_room = 5;

    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM bookings WHERE booking_date = ? AND room_type = ?");
    $stmt->bind_param("ss", $date, $room);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $tersisa = $max_room - intval($row['total']);
    if ($tersisa < 0) $tersisa = 0;

    echo json_encode([
        'tersisa' => $tersisa,
        'max' => $max_room
    ]);
} else {
    echo json_encode([
        'tersisa' => 0,
        'max' => 0
    ]);
}
?>
