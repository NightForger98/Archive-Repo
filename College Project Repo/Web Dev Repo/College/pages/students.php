<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
        Name: <input type= "text" name="fname"><br>
        lastName: <input type= "text" name="lname"><br>
        dob: <input  type= "text" name="dob"><br>
        address: <textarea name= "address" rows= "5" cols="40"></textarea><br>
        email: <input  type= "text" name="email"><br>
        Major: <input type = "radio" name ="major" value = "CS">     CS
        <input type = "radio" name ="major" value = "Arch"> Architechure
         <input type = "radio" name ="major" value = "Math">Math
        <input type="submit">
</form>
   <?php
   //def vars & set empty
   $fnameErr= $lnameErr =$dobErr=$addressErr = $emailErr=$majorErr="";
   $fname = $lname = $dob = $address = $email=$major ="";
   if($_SERVER["REQUEST_METHOD"] == "Post" ) {

    if(empty($_POST["fname"])) {
        $fnameErr   = "Name is Required";
    }
    else{
        $fname = test_input($_POST["fname"]);
        //check
        if(!preg_match("/^[a-zA-Z-']*$/",$fname)){
            $fnameErr = "Only letters and whitespace allowed"
        }

    }

    if(empty($_POST["lname"])) {
            $lnameErr   = "last name is Required";
        }
     else{
         $lname = test_input($_POST["lname"]);
         if(!preg_match("/^[a-zA-Z-']*$/",$lname)){
            $lnameErr = "Only letters and whitespace allowed"
        }
        }

     if (empty($_POST["dob"])) {
        $dobErr = "date of birth required"; } 
    else {
        $dob = test_input($_POST["dob"]); }
              
    if (empty($_POST["address"])) {
         $address = "";}//not required
     else {
        $address = test_input($_POST["address"]);  }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";}
        else {
           $email = test_input($_POST["email"]);  }
              
    if (empty($_POST["major"])) {
         $majorErr = "Major is required"; }
     else {
         $major = test_input($_POST["major"]); }
            
            
   } 
</body>
</html>