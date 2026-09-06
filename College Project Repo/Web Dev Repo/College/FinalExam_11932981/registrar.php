<?php
session_start();


if (!isset($_SESSION['user']) && $_SESSION['Type'] == 'Registrar') {
    header('Location: login.php');
    exit();
}
?>

<h2>Welcome, <?php echo $_SESSION['user'] ?></h2>
<a href='logout.php'>Logout</a>

<img src="images/uimg2.png" alt="">

<a href="/FINALEXAM_11932981/addstudent.php">Register a Student</a>


