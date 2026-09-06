<?php
include('config/constants.php') ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List manager</title>
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
    <h1>Task Manager</h1>
    <a href="<?php echo SITEURL; ?>home.php">Home</a>
    <h3> List Manager Page</h3>

    <p>
        <?php
            //Check sess
            if(isset($_SESSION['add']))
            {
                //disp msg
                echo $_SESSION['add'];
                //rmv after 1 time
                unset($_SESSION['add']);
            }
            //Check the session for delete
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }//check update session
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            //check delete fail
            if(isset($_SESSION['delete_fail'])){

                echo $_SESSION['delete_fail'];
                unset($_SESSION['delete_fail']);
            }//check update fail session
            if(isset($_SESSION['update_fail'])){
                echo $_SESSION['update_fail'];
                unset($_SESSION['update_fail']);
            }
?>
    </p>
    
<!-- Display lists table --> 
 <div class="all-lists">
    <a href= "<?php echo SITEURL; ?>add-list.php"> Add List</a>
    <table>
         <tr>
            <th>S.N. </th>
            <th>list Name</th>
            <th>Actions</th>
          </tr>
            <?php
                //connect db
                $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());
                //select db
                $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
                //sql query disp data frm dp
                $sql="SELECT * FROM tbl_lists";
                //execute
                $res = mysqli_query($conn,$sql);

                if($res == true){
                    //disp data
                   // echo "Executed";
                   //count the rows of data in db
                   $count_rows = mysqli_num_rows($res);

                   //create s.n. var
                   $sn = 1;
                   //chech data in db
                   if($count_rows>0){//data
                    while($row=mysqli_fetch_assoc($res))
                        {
                            //fetch data
                        $list_id = $row['list_id'];
                        $list_name = $row['list_name'];
                        ?>
                          <tr>
                            <td><?php echo $sn++;?> .</td>
                            <td><?php echo $list_name; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>update-list.php? list_id=<?php echo $list_id; //get method ?>"> Update</a> -
                                <a href="<?php echo SITEURL;?> delete-list.php? list_id=<?php echo $list_id; //get method ?>"> Delete</a>
                            </a></td>
                            </tr>

                        <?php


                    }

                   }else{
                    //no data
                    ?>
                    <tr>
                        <td colspan="3">
                            No List Added Yet.
                        </td>
                    </tr>

                    <?php

                   }
                }
            ?>

         
    </table>
</div>
 <!-- table end-->
 
</body>
</html>