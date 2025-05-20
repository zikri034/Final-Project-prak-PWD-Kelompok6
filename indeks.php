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

        nav a {
            color: #ffffff;
            margin: 0 15px;
            text-decoration: none;
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
    <header>
    <h1>SingZone</h1>
    <nav>
        <a href="about.html">About</a>
        <a href="#">Song Catalog</a>
        <a href="#">Membership</a>
        <a href="#">Contact</a>
        <a href="login.php" title="Go to profile">
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


    <section class="song-catalog">
        <h2>INTERACTIVE SONG CATALOG</h2>
        <input type="text" placeholder="Search songs" aria-label="Search songs">
    <div class="song-carousel-container">
    <button class="carousel-btn left">&#8249;</button>
    <div class="song-carousel">
        <div class="song-card">
            <img src="disenchanted.png" alt="Disenchanted album cover">
            <p>Disenchanted</p>
            <footer class="blockquote-footer">My Chemical Romance</footer>
        </div>
        <div class="song-card">
            <img src="iris.jpeg" alt="Iris album cover">
            <p>Iris</p>
            <footer class="blockquote-footer">Goo Goo Dolls</footer>
        </div>
        <div class="song-card">
            <img src="apieceofyou(13).jpeg" alt="A Piece of You album cover">
            <p>A Piece of You</p>
            <footer class="blockquote-footer">Nathaniel Constantin</footer>
        </div>
        <div class="song-card">
            <img src="jannabi.jpeg" alt="A Piece of You album cover">
            <p>Dream, Books, Power And Walls</p>
            <footer class="blockquote-footer">jannabi</footer>
        </div>
        <div class="song-card">
            <img src="lsno.jpeg" alt="A Piece of You album cover">
            <p>Last night on earth</p>
            <footer class="blockquote-footer">Green Day</footer>
        </div>
        
    </div>
    <button class="carousel-btn right">&#8250;</button>
</div>


    <h1>Become A Member</h1>
    <h2>Membership Benefits</h2>
    <h2>Member vs Non-member</h2>
    <table>
        <tr>
            <th>Features</th>
            <th>Non-member</th>
            <th>Member</th>
        </tr>
        <tr>
            <td>Diskon</td>
            <td>X</td>
            <td>10% - 30%</td>
        </tr>
        <tr>
            <td>Free Snack</td>
            <td>X</td>
            <td>Gold ke alts</td>
        </tr>
        <tr>
            <td>Akses 24 Jam</td>
            <td>X</td>
            <td>Platinum</td>
        </tr>
    </table>
    <form method="POST" action="members.php" class="booking-form" style="margin-top: 20px;">
    <input type="text" name="name" placeholder="Full Name" required>
    <input type="email" name="email" placeholder="Email Address" required>
    <input type="text" name="phone" placeholder="Phone Number" required>
    <button type="submit">Join Now</button>
</form>


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
    

      <script>
        const searchInput = document.querySelector('[aria-label="Search songs"]');
        const songCards = document.querySelectorAll('.song-card');
    
        searchInput.addEventListener('input', function () {
            const query = this.value.toLowerCase();
    
            songCards.forEach(card => {
                const songName = card.querySelector('p').textContent.toLowerCase();
                const artist = card.querySelector('footer').textContent.toLowerCase();
                const match = songName.includes(query) || artist.includes(query);
                card.style.display = match ? 'block' : 'none';
            });
        });
    </script>

<script>
    const carousel = document.querySelector('.song-carousel');
    const btnLeft = document.querySelector('.carousel-btn.left');
    const btnRight = document.querySelector('.carousel-btn.right');

    btnLeft.addEventListener('click', () => {
        carousel.scrollBy({ left: -220, behavior: 'smooth' });
    });

    btnRight.addEventListener('click', () => {
        carousel.scrollBy({ left: 220, behavior: 'smooth' });
    });
</script>

    
</body>

</html>
