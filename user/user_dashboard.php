<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BIGISELL SUPLIES & SERVICES</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Lora:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
      scroll-behavior: smooth;
    }

    header {
      background: linear-gradient(135deg, #0073e6, #005bb5);
      color: white;
      padding: 20px 40px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      position: relative;
    }

    nav ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      margin-right: 25px;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      font-weight: 500;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    nav ul li a:hover {
      color: #ff6600;
      transform: translateY(-3px);
    }

    .header-right {
      display: flex;
      align-items: center;
      gap: 20px;
    }

    .social-links {
      display: flex;
      gap: 15px;
    }

    .social-links a {
      color: white;
      font-size: 24px;
      transition: color 0.3s ease, transform 0.3s ease;
    }

    .social-links a:hover {
      color: #ff6600;
      transform: translateY(-3px);
    }

    .login-btn {
      color: white;
      font-weight: 600;
      text-decoration: none;
      border: 2px solid white;
      padding: 8px 16px;
      border-radius: 5px;
      transition: all 0.3s ease;
    }

    .login-btn:hover {
      background-color: white;
      color: #005bb5;
    }

    #home {
      position: relative;
      height: 100vh;
      display: flex;
      background-color: #000;
      background-size: cover;
      background-position: center;
      animation: imageFlip 20s infinite;
      overflow: hidden;
    }
@keyframes imageFlip {
  0% { background-image: url('/bigsell/uploads/garage1.jpeg'); }
  25% { background-image: url('/bigsell/uploads/garage2.jpeg'); }
  50% { background-image: url('/bigsell/uploads/garage3.jpeg'); }
  75% { background-image: url('/bigsell/uploads/garage4.jpeg'); }
  100% { background-image: url('/bigsell/uploads/garage1.jpeg'); }
}
    

    .left-shadow {
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 40%;
      background: rgba(0, 0, 0, 0.7);
      z-index: 1;
    }

    .left-content {
      width: 40%;
      padding: 60px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      z-index: 2;
      color: white;
    }

    .left-content h1 {
      font-size: 38px;
      margin-bottom: 20px;
      font-family: 'Lora', serif;
      font-weight: 700;
      line-height: 1.3;
      color: #fff;
      text-shadow: 1px 1px 8px rgba(0, 0, 0, 0.8);
    }

    .left-content p {
      font-size: 20px;
      line-height: 1.7;
      margin-bottom: 30px;
      color: #ffcc00;
      font-weight: 500;
      text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.6);
    }

    .left-content button {
      background-color: #ff6600;
      padding: 14px 28px;
      font-size: 18px;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: 600;
      transition: background-color 0.3s ease;
      box-shadow: 0 5px 12px rgba(0, 0, 0, 0.3);
    }

    .left-content button:hover {
      background-color: #e65c00;
    }

    .whatsapp-btn {
      background-color: #25D366;
      color: white;
      font-size: 24px;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      position: fixed;
      bottom: 20px;
      right: 20px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .whatsapp-btn:hover {
      background-color: #128C7E;
    }

    @media screen and (max-width: 768px) {
      .left-shadow, .left-content {
        width: 100%;
      }

      .left-content {
        padding: 40px 20px;
        text-align: center;
        align-items: center;
      }

      .left-content h1 {
        font-size: 28px;
      }

      .left-content p {
        font-size: 16px;
      }

      .left-content button {
        font-size: 16px;
        padding: 12px 24px;
      }

      nav ul {
        flex-direction: column;
        align-items: center;
      }

      nav ul li {
        margin-right: 0;
        margin-bottom: 10px;
      }

      .header-right {
        flex-direction: column;
        gap: 10px;
      }

      .social-links {
        justify-content: center;
      }

      .login-btn {
        padding: 6px 12px;
        font-size: 14px;
      }
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="#location">Our Location</a></li>
      </ul>
    </nav>

    <div class="header-right">
      <div class="social-links">
        <a href="https://web.facebook.com/search/top/?q=bigisell%20supplies%20and%20services" target="_blank" title="Facebook">
          <i class="fab fa-facebook"></i>
        </a>
        <a href="https://www.youtube.com/channel/UC3t34R9w45_7PaRbFy9Yjbw" target="_blank" title="YouTube">
          <i class="fab fa-youtube"></i>
        </a>
        <a href="https://www.tiktok.com/@bigisellsupplies?lang=en" target="_blank" title="TikTok">
          <i class="fab fa-tiktok"></i>
        </a>
        <a href="https://www.instagram.com/bigisellsuppliesandservices/" target="_blank" title="Instagram">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="https://x.com/bigisellsupply" target="_blank" title="Twitter (X)">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="https://ke.linkedin.com/in/seline-nasike-4358b827" target="_blank" title="LinkedIn">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
     <a href="/bigsell/auth/login.php" class="login-btn">Login</a>
    </div>
  </header>

  <section id="home">
    <div class="left-shadow"></div>
    <div class="left-content">
      <h1>Welcome to Bigisell Suplies & Services</h1>
      <p>Your trusted partner in quality vehicle care, repair, and product supply.</p>
<button onclick="window.location.href='/bigsell/services.product/serv.prod.php'">Explore Services And Products</button>
    </div>
  </section>

  <a href="https://wa.me/0710872165" class="whatsapp-btn" target="_blank" title="Chat on WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</body>
</html>


<section id="services">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Automotive Garage Services</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
        }

        .services-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            position: relative;
            width: 100%;
            height: 300px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Rotate or dance animation for images */
        .service-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            animation: rotateAnimation 5s infinite ease-in-out;
        }

        /* Keyframe animation for rotation */
        @keyframes rotateAnimation {
            0% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(15deg);
            }
            50% {
                transform: rotate(0deg);
            }
            75% {
                transform: rotate(-15deg);
            }
            100% {
                transform: rotate(0deg);
            }
        }

        .service-card .service-info {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-align: center;
            z-index: 1;
            padding: 20px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
        }

        .service-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .service-description {
            font-size: 16px;
        }

    </style>
</head>
<body>

    <h1>Some Of Our Services</h1>

    <div class="services-container">
        <div class="service-card">
            <img src="/bigsell/uploads/vehicle1.jpeg" alt="Vehicle Service 1">
            <div class="service-info">
                <div class="service-title">Engine Repair</div>
                <div class="service-description">We offer high-quality engine repair services, ensuring your vehicle runs smoothly and efficiently.</div>
            </div>
        </div>

        <div class="service-card">
            <img src="/bigsell/uploads/vehicle2.jpeg" alt="Vehicle Service 2">
            <div class="service-info">
                <div class="service-title">Transmission Service</div>
                <div class="service-description">Our transmission specialists are here to handle all your transmission needs, from repairs to replacements.</div>
            </div>
        </div>

        <div class="service-card">
            <img src="/bigsell/uploads/vehicle3.jpeg" alt="Vehicle Service 3">
            <div class="service-info">
                <div class="service-title">Brake Service</div>
                <div class="service-description">Ensure your safety on the road with our professional brake services, including inspections and replacements.</div>
            </div>
        </div>

        <div class="service-card">
            <img src="/bigsell/uploads/vehicle4.jpeg" alt="Vehicle Service 4">
            <div class="service-info">
                <div class="service-title">Suspension Repair</div>
                <div class="service-description">Our suspension repair services help keep your ride smooth and ensure better handling and safety.</div>
            </div>
        </div>

        <div class="service-card">
            <img src="/bigsell/uploads/vehicle5.jpeg" alt="Vehicle Service 5">
            <div class="service-info">
                <div class="service-title">Oil Change</div>
                <div class="service-description">Routine oil changes to keep your engine running at optimal performance, extending the life of your vehicle.</div>
            </div>
        </div>

        <div class="service-card">
            <img src="/bigsell/uploads/vehicle6.jpeg" alt="Vehicle Service 6">
            <div class="service-info">
                <div class="service-title">Tyre Service</div>
                <div class="service-description">Tyre rotation, balancing, and replacements to ensure the safety and performance of your vehicle.</div>
            </div>
        </div>
    </div>
    
</body>
</html>

<section id="about">
<section id="about-us" style="padding: 40px; background-color: #f8f9fa; font-family: Arial, sans-serif;">
  <div style="max-width: 800px; margin: auto;">
    <h2 style="color: #333333; text-align: center;">About Us</h2>
    <p style="font-size: 16px; color: #555555; line-height: 1.6;">
      <strong>Bigisell Suplies and Services</strong> is your trusted partner in all things automotive. 
      From comprehensive garage services to high-quality automotive supplies, we are committed to keeping your vehicle in top shape—efficiently, affordably, and professionally.
    </p>
    <p style="font-size: 16px; color: #555555; line-height: 1.6;">
      We offer a wide range of services including vehicle diagnostics, routine maintenance, repairs, and parts sourcing for all vehicle types. 
      Our experienced technicians are dedicated to providing reliable workmanship and customer-focused service you can count on.
    </p>
    <p style="font-size: 16px; color: #555555; line-height: 1.6;">
      At Bigisell, we don't just fix vehicles—we build relationships through quality, trust, and performance.
      Whether you're an everyday driver or a fleet manager, we're here to keep you moving with confidence.
    </p>
  </div>
</section>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us | Bigisell Supplies and Services</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        header h1 {
            color: #009578;
            font-size: 32px;
        }

        header p {
            font-size: 18px;
            color: #555;
            margin-top: 10px;
        }

        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: space-between;
        }

        .contact-info, form {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            flex: 1 1 48%;
        }

        .contact-info h2, form h2 {
            color: #009578;
            margin-bottom: 20px;
            font-size: 22px;
        }

        .contact-info p {
            margin-bottom: 12px;
        }

        .contact-info p strong {
            display: inline-block;
            width: 100px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input[type="submit"] {
            background-color: #009578;
            color: white;
            border: none;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #007f66;
        }

        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        footer {
            text-align: center;
            margin-top: 60px;
            color: #777;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

<section id="contact">
    <div class="container">
        <!-- Header -->
        <header>
            <h1>Contact Bigisell Suplies and Services</h1>
            <p>We’re here to answer your questions and provide assistance. Reach out to us!</p>
        </header>

        <div class="content">
            <!-- Company Info -->
            <div class="contact-info">
                <h2>Our Contact Information</h2>
                <p><strong>📍 Address:</strong> P.O. Box 23510-00100, Nairobi, Kenya</p>
                <p><strong>☎ Phone:</strong> +254 710 872165 / +254 704 494192</p>
                <p><strong>✉ Email:</strong> <a href="mailto:bigisell@gmail.com">bigisell@gmail.com</a></p>
                
            </div>

            <!-- Contact Form -->
            <form method="POST" action="" enctype="multipart/form-data">
                <h2>Send Us a Message</h2>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $to = "bigisell@gmail.com";
                    $subject = "New message from Bigisell Website";

                    $name = strip_tags(trim($_POST["name"]));
                    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
                    $message = trim($_POST["message"]);

                    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($message)) {
                        $boundary = md5(time());

                        // Email Headers
                        $headers = "From: $name <$email>\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

                        // Message Body
                        $body = "--{$boundary}\r\n";
                        $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
                        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
                        $body .= "You have received a new message from the Bigisell website:\n\n";
                        $body .= "Name: $name\n";
                        $body .= "Email: $email\n\n";
                        $body .= "Message:\n$message\n\n";

                        // Handle File Attachment
                        if (!empty($_FILES['attachment']['tmp_name'])) {
                            $file_tmp = $_FILES['attachment']['tmp_name'];
                            $file_name = basename($_FILES['attachment']['name']);
                            $file_size = $_FILES['attachment']['size'];
                            $file_type = mime_content_type($file_tmp);

                            if ($file_size <= 10485760) { // 10MB limit
                                $file_content = chunk_split(base64_encode(file_get_contents($file_tmp)));

                                $body .= "--{$boundary}\r\n";
                                $body .= "Content-Type: $file_type; name=\"$file_name\"\r\n";
                                $body .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n";
                                $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
                                $body .= $file_content . "\r\n";
                            } else {
                                echo '<div class="message error">❌ File size should not exceed 10MB.</div>';
                                exit;
                            }
                        }

                        $body .= "--{$boundary}--";

                        // Send Mail
                        if (mail($to, $subject, $body, $headers)) {
                            echo '<div class="message success">✅ Message and file sent successfully! Thank you, ' . htmlspecialchars($name) . '.</div>';
                        } else {
                            echo '<div class="message error">❌ Something went wrong. Please try again later.</div>';
                        }
                    } else {
                        echo '<div class="message error">❌ Please fill in all fields correctly.</div>';
                    }
                }
                ?>

                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name" placeholder="John Doe" required>

                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" placeholder="you@example.com" required>

                <label for="message">Your Message:</label>
                <textarea name="message" id="message" rows="6" placeholder="Type your message here..." required></textarea>

                <label for="attachment">Attach a File (Optional):</label>
                <input type="file" name="attachment" id="attachment">

                <input type="submit" value="Send Message">
            </form>
        </div>
    </div>
</section>

</body>
</html>


<section id="location">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Find Us - Behind Nairobi Railways Station</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      padding: 20px;
      background-color: #f9f9f9;
    }

    h2 {
      color: #333;
      margin-bottom: 10px;
    }

    p {
      font-size: 16px;
      color: #555;
    }

    .btn {
      display: inline-block;
      margin-top: 20px;
      padding: 15px 30px;
      background-color: #28a745;
      color: white;
      font-size: 18px;
      border: none;
      border-radius: 6px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #218838;
    }

    iframe {
      margin-top: 30px;
      width: 100%;
      max-width: 600px;
      height: 400px;
      border: none;
      border-radius: 8px;
    }

    .container {
      max-width: 800px;
      margin: auto;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>📍 Visit Our Business</h2>
    <p>We’re located just behind the <strong>Nairobi National Railways Station</strong>.</p>

    <!-- Button: Get Directions Using GPS -->
    <button class="btn" onclick="openGoogleMaps()">🚗 Get Directions from Your Location</button>

    <!-- Embedded Google Map -->
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3988.7900633344607!2d36.83438642247619!3d-1.3008320752383267!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ske!4v1744290515584!5m2!1sen!2ske" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

  <script>
    function openGoogleMaps() {
      const destinationLat = -1.3008320752383267;
      const destinationLng = 36.83438642247619;

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function (position) {
            const userLat = position.coords.latitude;
            const userLng = position.coords.longitude;

            const mapsUrl = `https://www.google.com/maps/dir/?api=1&origin=${userLat},${userLng}&destination=${destinationLat},${destinationLng}&travelmode=driving`;
            window.open(mapsUrl, '_blank');
          },
          function () {
            alert("We couldn't get your location. Please make sure GPS/location is turned on.");
          }
        );
      } else {
        alert("Geolocation is not supported by your browser.");
      }
    }
  </script>

</body>
</html>
</section>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <!-- Font Awesome for Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    footer {
      background-color: #222;
      color: white;
      padding: 20px 0;
      text-align: center;
    }
    .footer-icons a {
      color: white;
      margin: 0 15px;
      font-size: 30px;
      text-decoration: none;
    }
    .footer-icons a:hover {
      color: #4CAF50;
    }
    .footer-text {
      margin-top: 10px;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <!-- Footer Section -->
  <footer>
    <div class="footer-icons">
      <a href="https://web.facebook.com/search/top/?q=bigisell%20supplies%20and%20services" target="_blank" title="Facebook">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://www.tiktok.com/@bigisellsupplies?lang=en" target="_blank" title="TikTok">
        <i class="fab fa-tiktok"></i>
      </a>
      <a href="https://www.instagram.com/bigisellsuppliesandservices/" target="_blank" title="Instagram">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="https://www.youtube.com/channel/UC3t34R9w45_7PaRbFy9Yjbw" target="_blank" title="YouTube">
        <i class="fab fa-youtube"></i>
      </a>
      <a href="https://x.com/bigisellsupply" target="_blank" title="Twitter (X)">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="https://wa.me/254798834576" target="_blank" title="WhatsApp">
        <i class="fab fa-whatsapp"></i>
      </a>
      <a href="https://www.linkedin.com/company/bigisellsuppliesandservices/" target="_blank" title="LinkedIn">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <div class="footer-text">
    <p>This web was designed by Chrysostom | Contact: <a href="https://wa.me/254798834576" target="_blank" style="color: #4CAF50; text-decoration: none;">0798834576</a></p>

      <p>&copy; 2025 All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
