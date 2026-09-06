<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hello
<br>
db connection test: 
</body>
</html>


<?php
$dbhost="localhost";
$dbName= "potatoeggplant";
$user="root";
$pass="1";
$conn = new mysql("mysql:host=$dbhost;dbname=$dbname",$user,$pass);
try{
    echo "Successfully connected with newdb database";

}
catch (Exception $e){
    die("Connection failed".$e->getMessage());

}
$sql = 'SELECT * FROM Employee';
$retval = mysqli_query($conn,$sql);

if(mysqli_num_rows($retval)>0){
    while ($row = mysqli_fetch_assoc($retval)){
        echo "EMP ID :{$row['id']} <br>".
            "EMP NAME : {$row['name']}<br>".
            "EMP SALARY : {$row['salary']}<br>".
            "---------------------------<br>";
    }//end of while
}else{
    echo "0 results";
}
mysqli_close($conn);
?>