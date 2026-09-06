<?php
// calendar.php


$month = date('m');
$year = date('Y');


$firstDayOfMonth = date('w', strtotime("$year-$month-01"));
$totalDays = date('t', strtotime("$year-$month-01"));


$monthName = date('F', strtotime("$year-$month-01"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar - TaskManager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .calendar-container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        .calendar-header {
            margin-bottom: 20px;
        }
        table.calendar {
            width: 100%;
            border-collapse: collapse;
        }
        table.calendar th, table.calendar td {
            border: 1px solid #ddd;
            width: 14.28%; 
            padding: 10px;
            text-align: center;
        }
        table.calendar th {
            background-color: #f4f4f4;
        }
        table.calendar td {
            height: 80px;
            vertical-align: top;
        }
        .today {
            background-color: #ffeb3b; 
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Welcome</a></li>
                <li><a href="Home.php">Home</a></li>
                <li><a href="calendar.php" class="active">Calendar</a></li>
               
                
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="aboutus.php">About Us</a></li>
               
            </ul>
        </nav>
    </header>

    <main>
        <section class="calendar-container">
            <div class="calendar-header">
                <h1><?php echo $monthName . " " . $year; ?></h1>
            </div>
            <table class="calendar">
                <thead>
                    <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $day = 1;
                    $currentDay = date('j'); // Today's day

                    // Loop through weeks
                    for ($row = 0; $row < 6; $row++) {
                        echo "<tr>";
                        // Loop through days of the week
                        for ($col = 0; $col < 7; $col++) {
                            if (($row === 0 && $col < $firstDayOfMonth) || ($day > $totalDays)) {
                                echo "<td></td>";
                            } else {
                                $class = ($day == $currentDay) ? "today" : "";
                                echo "<td class='$class'>$day</td>";
                                $day++;
                            }
                        }
                        echo "</tr>";

                        // Stop the loop if all days are printed
                        if ($day > $totalDays) break;
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Ahmad Fares LIU 11932981.<br> All Rights Reserved.</p>
    </footer>
</body>
</html>
