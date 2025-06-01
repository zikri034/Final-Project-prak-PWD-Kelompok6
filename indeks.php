<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingZone</title>
    <link rel="stylesheet" href="styles.css"> <!-- External CSS -->
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
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

        .hero {
    text-align: center;
    padding: 50px;
    background-image: url('karaoke.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #ffffff;
    position: relative;
}

        .hero h1 {
            font-size: 48px;
        }

        .hero p {
            font-style: italic;
        }

        .booking-form {
            margin: 20px auto;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .booking-form select,
        .booking-form input,
        .booking-form button {
            padding: 10px;
            border-radius: 5px;
            border: none;
        }

        .booking-form button {
            background-color: #6200ea;
            color: #ffffff;
            cursor: pointer;
        }

        .rooms,
        .join,
        .song-catalog {
            text-align: center;
            padding: 50px;
        }

        .song-catalog {
            background-color: #1c1c1c;
        }

        .song-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 30px;
        }

        .song-card {
            background-color: #ffffff;
            color: #121212;
            border-radius: 10px;
            padding: 20px;
            width: 200px;
            text-align: center;
        }

        .song-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .join button {
            background-color: #6200ea;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a.virtual-tour {
            color: #6200ea;
        }

        .song-card {
    display: block;
        }

        .song-carousel-container {
    position: relative;
    width: 100%;
    overflow: hidden;
    max-width: 900px;
    margin: auto;
}

.song-carousel {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    gap: 20px;
    padding: 10px;
}

.song-card {
    flex: 0 0 auto;
    width: 200px;
    background-color: #fff;
    color: #121212;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
}

.carousel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(98, 0, 234, 0.8);
    border: none;
    color: white;
    font-size: 24px;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
}

.carousel-btn.left {
    left: 0;
}

.carousel-btn.right {
    right: 0;
}

table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid white;
            padding: 10px;
        }
        th {
            background-color: #444;
        }


    </style>
</head>

<body>
    <header style="background-color: #1c1c1c; padding: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
    <h1 style="margin: 0; font-size: 28px;">SingZone</h1>
    <nav style="display: flex; align-items: center; gap: 20px; flex-wrap: wrap;">
        <a href="about.html" class="nav-link">About</a>
        <a href="songcatalog.html" class="nav-link">Song Catalog</a>
        <a href="register_member.php" class="nav-link">Membership</a>
        <a href="contacts.php" class="nav-link">Contact</a>
        <a href="profile.php" title="Go to profile">
            <img src="profile.png" alt="User Profile" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
        </a>
    </nav>
</header>

    <section class="hero">
        <h1>KARAOKE FUN AWAITS</h1>
        <p>“Best karaoke experience! Had an amazing time!” – Dona R.</p>
    </section>

    <section class="rooms">
    <h2>OUR ROOMS</h2>
    <div class="room-cards" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; padding: 20px;">
        <!-- Room 1 -->
        <div class="card" style="background-color: #1c1c1c; color: white; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(255,255,255,0.1); transition: transform 0.3s;">
            <img src="standardroom.jpeg" alt="Standard Room" style="width: 100%; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div style="padding: 20px; text-align: center;">
                <h3>Standard Room</h3>
                <p>A cozy room perfect for small groups.</p>
                <a href="room1.php" class="btn btn-primary" style="background-color: #6200ea; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">View Details</a>
            </div>
        </div>

        <!-- Room 2 -->
        <div class="card" style="background-color: #1c1c1c; color: white; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(255,255,255,0.1); transition: transform 0.3s;">
            <img src="viproom.jpeg" alt="VIP Room" style="width: 100%; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div style="padding: 20px; text-align: center;">
                <h3>VIP Room</h3>
                <p>A luxurious room with premium features.</p>
                <a href="room2.php" class="btn btn-primary" style="background-color: #6200ea; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">View Details</a>
            </div>
        </div>

        <!-- Room 3 -->
        <div class="card" style="background-color: #1c1c1c; color: white; border-radius: 10px; width: 300px; box-shadow: 0 0 10px rgba(255,255,255,0.1); transition: transform 0.3s;">
            <img src="exclusive.jpeg" alt="Exclusive Room" style="width: 100%; border-top-left-radius: 10px; border-top-right-radius: 10px;">
            <div style="padding: 20px; text-align: center;">
                <h3>Exclusive Room</h3>
                <p>An exclusive room for the ultimate experience.</p>
                <a href="room3.php" class="btn btn-primary" style="background-color: #6200ea; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">View Details</a>
            </div>
        </div>
    </div>
</section>

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
