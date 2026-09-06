<?php
// set button interaction for part 2 later
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - TaskManager</title>
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
                
                
                <li><a href="Blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="aboutus.php" class="active">About Us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="about-us">
            <h1>About Us</h1>
            <p>Welcome to <strong>Trackula</strong>, your all-in-one solution for staying organized and achieving your goals.</p>

            <h2>Our Mission</h2>
            <p>We strive to empower individuals and teams to stay productive by offering a simple yet powerful task management tool. Whether you're planning personal projects or coordinating with a team, TaskManager helps you stay on track and achieve more.</p>

            <h2>Why Choose Trackula?</h2>
            <ul>
                <li>Easy-to-use interface for managing tasks and projects.</li>
                <li>Calender to stay on top of things.</li>
                <li>Customizable task categories and reminders.</li>
                <li>Cross-platform accessibility on web and mobile.</li>
            </ul>

            <h2>Our Story</h2>
            <p>Founded in 2024, Trackula was created by a college student who wanted a better way to manage his. As part of a college project I hope to serve users worldwide, helping them organize their tasks and simplify their lives.</p>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Ahmad Fares LIU 11932981.<br> All Rights Reserved.</p>
    </footer>
</body>
</html>
