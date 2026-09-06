<?php
// contact.php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);


    if (!empty($name) && !empty($email) && !empty($message)) {
       
        $success = "Thank you, $name! Your message has been received.";
    } else {
        $error = "Please fill in all the fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Trackula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Welcome</a></li>
                <li><a href="Home.php">Home</a></li>
                <li><a href="calendar.php">Calendar</a></li>
               
                
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php" class="active">Contact</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="contact">
            <h1>Contact Us</h1>
            <p>Tell us if you have any problems, before the planes come.</p>

            <?php
            if (isset($success)) {
                echo "<p class='success'>$success</p>";
            } elseif (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
            ?>

            <form method="POST" action="contact.php">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Ahmad Fares LIU 11932981.<br> All Rights Reserved.</p>
    </footer>
</body>
</html>
