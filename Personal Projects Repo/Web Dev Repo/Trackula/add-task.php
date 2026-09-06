<?php
include ('config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task Page</title>
</head>
<body>
    <h1>Task Manager</h1>
    <br>
    <a href="<?php echo SITEURL; ?>home.php">Home</a>
    <br>
    <h3>Add- Task Page</h3>
    <p>
        <?php

        if(isset($_SESSION['add_fail']))
        {
            echo $_SESSION['add_fail'];
            unset($_SESSION['add_fail']);
        }
        ?>
    </p>
    <form method = "POST" action="">
        <table>
            <tr>
                <td>Task Name:</td>
                <td> <input type="text" name="task_name" placeholder= "Type your Task Name" required="required"/> </td>
                </tr>
                <tr>
                <td>Task Description:</td>
                <td><textarea name="task_description" placeholder="Type Task Description" ></textarea></td>
            </tr>
            <tr>
                <td>Select List:</td>
                <td>
                    <select name="list_id" >
                        <?php
                   
                        //connect db
                          $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());
                          //select db
                            $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
                            //sql query disp data frm dp
                           $sql="SELECT * FROM tbl_lists";
                                //execute
                              $res = mysqli_query($conn,$sql);
                              //check execution
                            if($res == true){
                                //Create var to count rows
                                $count_rows = mysqli_num_rows($res);
                                //if there is data in database then display all in dropdown else display none as option
                                if($count_rows>0){
                                    //display data
                                    while($row=mysqli_fetch_assoc($res)){
                                        $list_id =$row['list_id'];
                                        $list_name = $row['list_name'];
                                        ?>
                                        <option value="<?php echo $list_id; ?>"><?php echo $list_name; ?></option>
                                   <?php
                                    }
                                }else{
                                    //display none
                                    ?>
                                    <option value="0">None</option>
                                    <?php

                                }
                        }
                        ?>
                                
                    </select>
                </td>
            </tr>
            <tr>
                <td>Priority:</td>
                <td><select name="priority" id="">
                    <option value="High">High</option>
                    <option value="Medium">Mediium</option>
                    <option value="Low">Low</option>
                </select></td>
            </tr>
            <tr>
                <td>Deadline:</td>
                <td><input type="date" name = "deadline" /></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value = "SAVE" /></td>
            </tr>
           
        </table>
</body>
</html>
<?php
//check whether the save button is clicked or not
if(isset($_POST['submit'])){
  //  echo "Button Clicked";

  //Get All the values from Form
  $task_name = $_POST['task_name'];
  $task_description = $_POST['task_description'];
  $list_id = $_POST['list_id'];
  $priority=$_POST['priority'];
  $deadline = $_POST['deadline'];
  
  //Connect Database new connection for output
  $conn2 = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
  //Select Database
  $db_select2 = mysqli_select_db($conn2,DB_NAME) or die(mysqli_error());
   
  //Qwery to update the list , use same list id
  echo $sql2 = "INSERT INTO tbl_tasks SET 
            task_name = '$task_name',
            task_description = '$task_description',
            list_id = $list_id,
            priority = '$priority',
            deadline = '$deadline'
  ";
  //Execute Query
    $res2 = mysqli_query($conn2,$sql2);
    //Check whether query executed successfully or not
   if($res2 == true)
    {
        //Query executed and task inserted succesfully
        $_SESSION['add'] = "Task Added Successfully";
        //redirect to homepage
        header('location:' .SITEURL.'home.php');
        
    }
    else{
    $_SESSION['add_fail'] = "Failed to Add Task";
    //redirect to self
    header('location:' .SITEURL.'add-task.php');

}

}
?>