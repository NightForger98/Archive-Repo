<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show students</title>
    <style>
        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
        </style>
</head>
<body>  
<h2> List of Students </h2>
<table style='  width:100%'>
<tr>
<th>Full Name</th>

<th>Email</th>

<th>Major</th>
<th>Photo</th>
<th> </th><th> </th>
</tr>
<?php
 include "inc/connection.php";
 if(isset($_GET['sid']) && isset($_GET['delete']))
{
  $id=$_GET['sid'];
$sql1 = "delete from students where sID=".$id;
$result1 = mysqli_query($conn, $sql1);
}
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) >0){
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
  
        echo "<tr>";
            echo " <td>". $row["fname"]. "-" .$row["lname"]."</td>
          
              <td>". $row["email"]. "</td>
            
                <td>". $row["major"]. "</td>
                 <td><img src='images/". $row["photo"]. "' width=50px height= 50px></td>
                 <td> <a href='showstudents.php?sid=". $row["sID"]. "&delete=1'> delete</a></td>
              <td> <a href='update.php?sid=". $row["sID"]. "&update=1'> update</a></td>
             
                 </tr>";
    }
  }
mysqli_close($conn);
?>
</table>

<br>
<br>
<a href="student.php"> Add new student </a>
</body>
</html>

