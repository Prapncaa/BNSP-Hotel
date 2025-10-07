<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Hotels - Luxury Accommodation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navigation */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background: white;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
            font-size: 18px;
        }

        .star {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #D4AF37, #FFD700);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }

        .nav-links {
            display: flex;
            gap: 40px;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #D4AF37;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .book-btn {
            background: #D4AF37;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .book-btn:hover {
            background: #B8941F;
        }

        .list-btn {
            background: #28a745;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .list-btn:hover {
            background: #218838;
        }

        /* Hero Section */
        .hero {
            margin-top: 80px;
            height: 90vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                        url('https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1600&h=900&fit=crop');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            color: white;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-content h1 {
            font-size: 48px;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Booking Card */
        .booking-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            width: 380px;
        }

        .booking-card h3 {
            color: #333;
            margin-bottom: 10px;
            font-size: 24px;
        }

        .booking-card p {
            color: #666;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .booking-card input {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .check-rates-btn {
            width: 100%;
            background: #D4AF37;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .check-rates-btn:hover {
            background: #B8941F;
        }

        /* Rooms Section */
        .rooms-section {
            padding: 80px 60px;
            background: #f8f9fa;
        }

        .rooms-section h2 {
            text-align: center;
            font-size: 42px;
            margin-bottom: 50px;
            color: #333;
        }

        .rooms-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .room-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .room-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .room-image {
            width: 100%;
            height: 250px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .room-card:nth-child(1) .room-image {
            background-image: url('https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800&h=600&fit=crop');
        }

        .room-card:nth-child(2) .room-image {
            background-image: url('https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&h=600&fit=crop');
        }

        .room-card:nth-child(3) .room-image {
            background-image: url('https://images.unsplash.com/photo-1631049307264-da0ec9d70304?w=800&h=600&fit=crop');
        }

        .room-content {
            padding: 30px;
        }

        .room-content h3 {
            font-size: 26px;
            margin-bottom: 15px;
            color: #333;
        }

        .room-content p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .room-features {
            list-style: none;
            margin-bottom: 20px;
        }

        .room-features li {
            padding: 8px 0;
            color: #555;
            border-bottom: 1px solid #eee;
        }

        .room-features li:before {
            content: "✓ ";
            color: #D4AF37;
            font-weight: bold;
            margin-right: 10px;
        }

        .room-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .price {
            font-size: 32px;
            font-weight: bold;
            color: #D4AF37;
        }

        .book-room-btn {
            background: #D4AF37;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .book-room-btn:hover {
            background: #B8941F;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="logo">
            <div class="star"></div>
            <span>STAR HOTELS</span>
        </div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#rooms">Rooms and Suites</a></li>
            <li><a href="#facilities">Facilities</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="nav-buttons">
            <a href="{{ route('booking') }}" class="book-btn">BOOK</a>
            <a href="{{ route('tampilan') }}" class="list-btn">DAFTAR PEMESANAN</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Discover The Perfect Balance Of Hospitality, Luxury And Comfort.</h1>
            <p>We are focused on providing clients with the highest level of comfort and excellent affordable rates</p>
           <a href="{{ route('booking') }}" style="text-decoration: none;">
    <button class="book-btn">BOOK NOW</button>
</a>
        </div>

        <div class="booking-card">
            <h3>Scared you can't afford it?</h3>
            <p>Don't worry, our hotel offers the best affordable rates you can ever find.</p>
            <input type="date" placeholder="Arrival Date">
            <input type="date" placeholder="Departure Date">
            <input type="number" placeholder="Guests" min="1">
            <input type="number" placeholder="Children" min="0">
            <button class="check-rates-btn">CHECK RATES</button>
        </div>
    </section>

    <!-- Rooms Section -->
    <section class="rooms-section" id="rooms">
        <h2>Our Luxury Rooms</h2>
        <div class="rooms-container">
            <!-- Deluxe Room -->
            <div class="room-card">
                <div class="room-image"></div>
                <div class="room-content">
                    <h3>Deluxe Room</h3>
                    <p>Experience comfort and elegance in our spacious deluxe rooms, perfect for business or leisure travelers.</p>
                    <ul class="room-features">
                        <li>King-size bed</li>
                        <li>City view</li>
                        <li>Free Wi-Fi</li>
                        <li>Mini bphp ar</li>
                    </ul>
                    <div class="room-price">
                        <span class="price">$120</span>
                        <button class="book-room-btn">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- Executive Suite -->
            <div class="room-card">
                <div class="room-image"></div>
                <div class="room-content">
                    <h3>Executive Suite</h3>
                    <p>Indulge in luxury with our executive suites featuring separate living areas and premium amenities.</p>
                    <ul class="room-features">
                        <li>Separate living room</li>
                        <li>Ocean view</li>
                        <li>Jacuzzi bathtub</li>
                        <li>24/7 room service</li>
                    </ul>
                    <div class="room-price">
                        <span class="price">$220</span>
                        <button class="book-room-btn">Book Now</button>
                    </div>
                </div>
            </div>

            <!-- Presidential Suite -->
            <div class="room-card">
                <div class="room-image"></div>
                <div class="room-content">
                    <h3>Presidential Suite</h3>
                    <p>The ultimate luxury experience with panoramic views, private terrace, and exclusive concierge service.</p>
                    <ul class="room-features">
                        <li>Two bedrooms</li>
                        <li>Private terrace</li>
                        <li>Personal butler</li>
                        <li>Premium entertainment</li>
                    </ul>
                    <div class="room-price">
                        <span class="price">$450</span>
                        <button class="book-room-btn">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>