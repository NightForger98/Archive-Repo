<?php
include('config/constants.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addlists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .user-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 1px solid #ccc;
            cursor: pointer;
        }
        .sign-in-form {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <h1>Task Manager</h1>
     <a href="<?php echo SITEURL ?>index.php">Main</a> - 
     <a href="<?php echo SITEURL ?>home.php">home</a> - 
     <a href="<?php echo SITEURL; ?>manage-list.php"> Manage Lists</a>
     <br>
     <h3>Add lists Page</h3>
     <p>
        <?php
            //check session creation
            if(isset($_SESSION['add_fail']))
            {
                echo $_SESSION['add_fail'];
                //remove after first display
                unset($_SESSION['add_fail']);
            }
        ?>
     </p>
<!-- Form Add Lists-->
 <form method="POST" action="">
        <table>
            <tr>
                <td>List Name</td>
                <td><input type="text" name="list_name" placeholder= "Type  List name here" required="required" /> </td>
            </tr>
            <tr>
                <td>List Description</td>
                <td><textarea name="list_description" id="" placeholder= "Type List Description Here"></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name= "submit" value="Save"></td>
            </tr>

        </table>
 </form>
 <!-- end form --> 
</body>
</html>

<?php

//check whether the form is submitted or not
if(isset($_POST['submit']))
{
  
   //Get the values from form & set it in variables
    $list_name=$_POST['list_name'] ;

    $list_description = $_POST['list_description']; 
    // echo " Form Submitted";
   //Connect Database
   $conn = mysqli_connect(LOCALHOST, DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    //check db connection
    /*
    if($conn == true)
    {
        echo "database Connected";
    } 
        */
        //select Database
        $db_select = mysqli_select_db($conn,DB_NAME);
        //check selection
       /* if($db_select == true){
            echo "Database Selected";
        }*/

         $sql = "INSERT INTO tbl_lists SET 
        list_name = '$list_name',
        list_description = '$list_description'
        ";
        //Execute Query and Insert into Database
        $res = mysqli_query($conn, $sql);
        //check query success or fail
        if($res == true)
        {
            //echo "Data inserted successfully";
            //redirect to Manage list
            $_SESSION['add']= "List Added Successfully";
            header('location:'.SITEURL.'manage-list.php');
            //Create session variable for msg display
            
        }
        else{
            //create ses fail msg
             $_SESSION['add_fail']= "failed to add list";
           // echo "Data insertion failed";
           header('location'.SITEURL.'add-list.php');

        }
    }

?>