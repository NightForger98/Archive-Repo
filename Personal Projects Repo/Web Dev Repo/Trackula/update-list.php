<?php 

        include('config/constants.php');
        //get the current values of selected list
        if(isset($_GET['list_id']))
        {
            //get the list id value
            $list_id = $_GET['list_id'];
            //Connect to database
            $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
            //Select Database
            $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
           
            //Qwery to get the values from database 
            $sql = "SELECT * FROM tbl_lists WHERE list_id=$list_id";
            //Execute Query
           
            $res = mysqli_query($conn,$sql);
            //Check whether query executed successfully or not
            if($res == true)
            {
                //Get the Value from Database
                $row = mysqli_fetch_assoc($res); // Value is in array
                //print array for testing
                // print_r($row);
                $list_name = $row['list_name'];
                $list_description = $row['list_description'];
                    
                
            }else{
                //Go back to Manage List Page
                header('location: '.SITEURL.'manage-list.php');
                
            }
        }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task manager update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> 
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
    <h1>TASK MANAGER</h1>
    <div class= "menu">
        <a href="<?php echo SITEURL;?>"> Index</a>
        <a href="<?php echo SITEURL;?>home.php"> Home</a>
        <a href="<?php echo SITEURL;?>manage-list.php"> Manage Lists</a>
        

    </div>

    <h3>Update List Page</h3>

    <p>
        <?php
        //check session is set or not
        if(isset($_SESSION['update_fail']))
        {
            echo $_SESSION['update_fail'];
            unset($_SESSION['update_fail']);
        }
        ?>
    </p>

    <form method= "POST" action="">
        <table>
            <tr>
                <td>List Name: </td>
                <td><input type = "text" name="list_name" value= "<?php echo $list_name; ?>" required = "required"></td>
            </tr>
            <tr>
                <td>List Description:</td>
                <td>
                    <textarea name="list_description">
                        <?php   echo $list_description; ?>
                    </textarea>
            </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="submit" value= "UPDATE">
                    
                    </input>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
        //Check whether update button is clicked or not
        if(isset($_POST['submit']))
        {
          //  echo "Button Clicked";
          //Get updated value from form
          $list_name = $_POST['list_name']; 
          $list_description = $_POST['list_description'];
          //Connect Database new connection for output
          $conn2 = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
          //Select Database
          $db_select2 = mysqli_select_db($conn2,DB_NAME) or die(mysqli_error());
           
          //Qwery to update the list , use same list id
          $sql2 = "UPDATE tbl_lists SET list_name = '$list_name',
                    list_description = '$list_description'
                    WHERE list_id = '$list_id'
          ";
          //Execute Query
          $res2 = mysqli_query($conn2,$sql2);
            //Check whether query executed successfully or not
            if($res2 == true)
            {//update successful
                $_SESSION['update'] = "List updated Successfully";
                //redirect to manage lists page
                header('location: '.SITEURL.'manage-list.php' );

            }
            else{
                //fail to update, set session message
                $_SESSION['update_fail'] = "Failed to update List";
                //Redirect  to self
                header('location: '.SITEURL.'update-list.php?list_id=' .$list_id );


            }
         
        }
        ?>