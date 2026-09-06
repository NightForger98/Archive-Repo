<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
        course Title: <input type= "text" name="title"><br>
        course Code: <input type= "text" name="code"><br>
        number of credits: <input  type= "text" name="credits"><br>
        
</form>
   <?php
   //def vars & set empty
   $titleErr= $codeErr =$creditErr="";
   $title = $code = $credit = "";
   if($_SERVER["REQUEST_METHOD"] == "Post" ) {

    if(empty($_POST["title"])) {
        $titleErr   = "course title is Required";
    }
    else{
        $title = test_input($_POST["title"]);
        //check
        if(!preg_match("/^[a-zA-Z-']*$/",$title)){
            $titleErr = "Only letters and whitespace allowed"
        }

    }

    if(empty($_POST["code"])) {
            $codeErr   = "last name is Required";
        }
     else{
         $code = test_input($_POST["code"]);
         if(!preg_match("/^[a-zA-Z-1-0-']*$/",$code)){
            $codeErr = "Only letters & numbers allowed"
        }
        }

     if (empty($_POST["credit"])) {
        $creditErr = "number of credits required"; } 
    else {
        $credit = test_input($_POST["credit"]);
        if(!preg_match("/^[1-0-']*$/",$credit)){
            $creditErr = "Only numbers allowed"
        } }
              
            
            
   } 
</body>
</html>