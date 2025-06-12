<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../inc/header.php';
?>
<link rel="stylesheet" href="../assets/css/index.css">

<style>
    .contact-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }

    .contact-info, .contact-form {
        flex: 1 1 45%;
    }

    .contact-info h2, .contact-form h2 {
        color: #ff0000;
        margin-bottom: 20px;
    }

    .contact-info p {
        margin-bottom: 15px;
        font-size: 15px;
        color: #444;
    }

    .contact-info p i {
        color: #ff0000;
        margin-right: 10px;
    }

    .contact-form form input,
    .contact-form form textarea {
        width: 100%;
        padding: 10px 15px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
    }

    .contact-form form textarea {
        height: 120px;
        resize: vertical;
    }

    .contact-form form button {
        background-color: #ff0000;
        color: #fff;
        padding: 10px 20px;
        font-size: 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .contact-form form button:hover {
        background-color: #cc0000;
    }

    .map {
        margin: 30px auto 0;
        width: 100%;
        max-width: 1000px;
        height: 300px;
        border: none;
        border-radius: 10px;
    }
</style>

<div class="contact-container">
    <!-- Contact Info -->
    <div class="contact-info">
        <h2>Contact Information</h2>
        <p><i class="fas fa-map-marker-alt"></i> 123 Red Street, Nairobi, Kenya</p>
        <p><i class="fas fa-envelope"></i> info@example.com</p>
        <p><i class="fas fa-phone"></i> +254 700 123 456</p>
        <p><i class="fas fa-clock"></i> Mon - Fri: 9:00 AM - 5:00 PM</p>
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
        <h2>Send Us a Message</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message..." required></textarea>
            <button type="submit" name="submit">Send Message</button>
        </form>

        <?php
        // Handle submission (for demo purposes, just show confirmation)
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $name = htmlspecialchars($_POST['name']);
            $email = htmlspecialchars($_POST['email']);
            $message = htmlspecialchars($_POST['message']);

            echo "<p style='color: green; margin-top: 15px;'>Thank you, $name. Your message has been received!</p>";

            // Here you could send the email or save to a DB
            // mail($to, $subject, $message, $headers);
        }
        ?>
    </div>
</div>

<!-- Optional Google Maps Embed -->
<iframe class="map" 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.7458827491033!2d36.81666585826186!3d-1.2863895976661925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10e2c2023b7f%3A0x6ab6b64cfef0cccd!2sNairobi%20CBD!5e0!3m2!1sen!2ske!4v1700000000000!5m2!1sen!2ske" 
    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>
