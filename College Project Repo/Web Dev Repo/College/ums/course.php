<?php
// Define error variables and set them to empty values
 $courseTitleErr = $courseCodeErr = $numberOfCreditsErr = "";
$courseTitle = $courseCode = $numberOfCredits = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (empty($_POST["courseTitle"])) {
        $courseTitleErr = "Course Title is required";
    } else {
        $courseTitle = test_input($_POST["courseTitle"]);
    }

    if (empty($_POST["courseCode"])) {
        $courseCodeErr = "Course Code is required";
    } else {
        $courseCode = test_input($_POST["courseCode"]);
        if (!is_numeric($courseCode)) {
            $courseCodeErr = "Just Numeric";
        }
    }

    if (empty($_POST["numberOfCredits"])) {
        $numberOfCreditsErr = "Number of Credits is required";
    } else {
        $numberOfCredits = test_input($_POST["numberOfCredits"]);
        if (!is_numeric($numberOfCredits)) {
            $numberOfCreditsErr = "Invalid format for Number of Credits";
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>

<h2>Course Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Course Title: <input type="text" name="courseTitle" value="<?php echo $courseTitle;?>">
    <span class="error">* <?php echo $courseTitleErr;?></span>
    <br><br>
    Course Code: <input type="text" name="courseCode" value="<?php echo $courseCode;?>">
    <span class="error">* <?php echo $courseCodeErr;?></span>
    <br><br>
    Number of Credits: <input type="text" name="numberOfCredits" value="<?php echo $numberOfCredits;?>">
    <span class="error">* <?php echo $numberOfCreditsErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"  && !$courseTitleErr && !$courseCodeErr && !$numberOfCreditsErr) {
    include "inc/connection.php";
   $sql = "INSERT INTO courses (courseCode,courseTitle, NumberofCredits) 
    VALUES ('".$courseCode."','". $courseTitle."',".  $numberOfCredits.")";
    
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
   
}
?>

</body>
</html>
