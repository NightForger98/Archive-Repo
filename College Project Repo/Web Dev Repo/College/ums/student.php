<?php
// Define error variables and set them to empty values
 $fnameErr = $lnameErr = $dobErr = $addressErr = $emailErr = $majorErr = "";
 $fname = $lname = $dob = $address = $email = $major = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["fname"])) {
        $fnameErr = "First name is required";
    } else {
        $fname = test_input($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
            $fnameErr = "Only letters and whitespace allowed";
        }
    }

    if (empty($_POST["lname"])) {
        $lnameErr = "Last name is required";
    } else {
        $lname = test_input($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
            $lnameErr = "Only letters and whitespace allowed";
        }
    }

    if (empty($_POST["dob"])) {
        $dobErr = "Date of birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
    }

    if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["major"])) {
        $majorErr = "Major is required";
    } else {
        $major =$_POST["major"];
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
<h2>Student Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  
    First Name: <input type="text" name="fname" value="<?php echo $fname;?>">
    <span class="error">* <?php echo $fnameErr;?></span>
    <br><br>
    Last Name: <input type="text" name="lname" value="<?php echo $lname;?>">
    <span class="error">* <?php echo $lnameErr;?></span>
    <br><br>
    Date of Birth: <input type="date" name="dob" value="<?php echo $dob;?>">
    <span class="error">* <?php echo $dobErr;?></span>
    <br><br>
    Address: <input type="text" name="address" value="<?php echo $address;?>">
    <span class="error">* <?php echo $addressErr;?></span>
    <br><br>
    Email: <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
Major: <select name="major" value="<?php echo $major;?>">
  <option value="Computer Science">Computer Science</option>
  <option value="IT">IT</option>
  <option value="Engineering">Engineering</option>
  <option value="Pharmacy">Pharmacy</option>
</select>  <span class="error">* <?php echo $majorErr;?></span> <br><br>
Photo: <input type="file" name="image" /> <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && !$fnameErr && !$lnameErr && !$dobErr && !$addressErr && !$emailErr && !$majorErr) {
    include "inc/connection.php";
    if(isset($_FILES['image'])){
        $errors= array(); //create an array to handle the errors
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts =explode('.',$file_name);
        $file_ext=strtolower(end($file_parts));
        $extensions= array("jpeg","jpg","png"); //only images with these extensions are allowed
        if(in_array($file_ext,$extensions)=== false)
            $errors[]='extension not allowed, please choose a JPEG or PNG file.';
        
        if($file_size > 2097152) 
            $errors[]='File size must be excately 2 MB';
        
         if(empty($errors)==true) {
           $pic=$file_name;
            move_uploaded_file($file_tmp,"images/".$file_name );
             }
            }
  $sql = "INSERT INTO students (fname,lname, dob, address, email, major,photo) 
    VALUES ('".$fname."','". $lname."','".  $dob."','".  $address."','".  $email."','".  $major."','".$pic."')";
   
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    
}
?>
<br>
<br>
<a href="showstudents.php"> Show students </a>
</body>
</html>
