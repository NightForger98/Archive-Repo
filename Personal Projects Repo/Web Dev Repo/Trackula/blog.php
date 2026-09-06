<?php
// blog.php


$posts = [
    [
        'title' => 'How to survive a falling building',
        'date' => '2024-12-01',
        'author' => 'Ali Abbass',
        'excerpt' => 'Being at the top floors can decrease the chance of being burried in the rubble',
        'link' => 'post.php?id=1'
    ],
    [
        'title' => 'if You live in dahye, you dont have to move',
        'date' => '2024-12-01',
        'author' => 'Hussien sheib',
        'excerpt' => 'After the air strike, the debris can be a lovely place to grow a garden.',
        'link' => 'post.php?id=2'
    ],
    [
        'title' => 'How to sleep when the MK is not scanning',
        'date' => '2024-12-01',
        'author' => 'wajih shrief',
        'excerpt' => 'hit record audio on your phone during the day if the MK is not scanning, you can play back the audio at night so you can sleep.',
        'link' => 'post.php?id=3'
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - TaskManager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
    <style>
        .blog-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .blog-post {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .blog-post h2 {
            margin-bottom: 10px;
            color: #8b5a2b;
        }
        .blog-post p {
            margin-bottom: 10px;
        }
        .blog-post a {
            color: #8b5a2b;
            text-decoration: none;
            font-weight: bold;
        }
        .blog-post a:hover {
            text-decoration: underline;
        }
        .blog-post .meta {
            font-size: 0.9em;
            color: #6b4423;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Welcome</a></li>
                <li><a href="Home.php">Home</a></li>
                <li><a href="calendar.php">Calendar</a></li>
               
             
                <li><a href="blog.php" class="active">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="blog-container">
            <h1>Latest Articles</h1>
            <?php foreach ($posts as $post): ?>
                <article class="blog-post">
                    <h2><?php echo $post['title']; ?></h2>
                    <p class="meta">By <?php echo $post['author']; ?> on <?php echo date('F j, Y', strtotime($post['date'])); ?></p>
                    <p><?php echo $post['excerpt']; ?></p>
                    <a href="<?php echo $post['link']; ?>">Read More</a>
                </article>
            <?php endforeach; ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Ahmad Fares LIU 11932981.<br> All Rights Reserved.</p>
    </footer>
</body>
</html>
