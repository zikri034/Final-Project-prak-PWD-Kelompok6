<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "singzone";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);

    $stmt = $conn->prepare("INSERT INTO members (name, email, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);

    if ($stmt->execute()) {
        echo <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Membership Success</title>
            <style>
                body {
                    font-family: 'Times New Roman', serif;
                    background-color: #121212;
                    color: white;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                }
                .success-box {
                    background-color: #1c1c1c;
                    padding: 40px;
                    border-radius: 12px;
                    box-shadow: 0 0 20px rgba(98, 0, 234, 0.5);
                    text-align: center;
                    width: 90%;
                    max-width: 500px;
                }
                h1 {
                    color: #bb86fc;
                }
                .back-btn {
                    margin-top: 20px;
                    display: inline-block;
                    background-color: #6200ea;
                    color: white;
                    padding: 10px 20px;
                    border-radius: 5px;
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
            <div class="success-box">
                <h1>🎉 Welcome, $name!</h1>
                <p>Thank you for joining SingZone Membership!</p>
                <a class="back-btn" href="indeks.php">Back to Home</a>
            </div>
        </body>
        </html>
        HTML;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>
