
<html>
<head>
    <title>Add New Student</title>
</head>
<body>
    <h2>Add New Student</h2>
    <form method="post" action="addstudent.php">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname"><br><br>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname"><br><br>

        <label for="year">Year:</label>
        <input type="radio" id="first" name="year" value="First">
        <label for="first">First</label>
        <input type="radio" id="second" name="year" value="Second">
        <label for="second">Second</label>
        <input type="radio" id="third" name="year" value="Third">
        <label for="third">Third</label><br><br>

        <label for="major">Major:</label>
        <select id="major" name="major">
            <option value="1">Computer Science</option>
            <option value="2">Mathematics</option>
            <option value="3">Physics</option>
            <!-- Add more options as needed -->
        </select><br><br>

        <input type="submit" name="submit" value="Add new student">
        <input type="reset" value="Clear">
    </form>
</body>
</html>

</form>

<?php 

require 'config/db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $firstname = $_POST["firstname"]; 
    $lastname = $_POST["lastname"]; 
    $year = $_POST["year"]; 
    $major = $_POST["major"]; 

    $sql = "INSERT INTO student (first_name, last_name, year, major_id) VALUES ('$firstname', '$lastname', '$year', '$major')"; 
    if ($conn->query($sql) === TRUE) { 
        echo "New record created successfully"; 
        } else { 
            echo "Error: " . $sql . "<br>" . $conn->error; 
            } $conn->close(); 
            } 
            ?>