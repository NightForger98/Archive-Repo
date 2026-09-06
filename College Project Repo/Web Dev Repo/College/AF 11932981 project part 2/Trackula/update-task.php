<?php
include ('config/constants.php');
//get data
if(isset($_GET['task_id']))
{
    //get the list id value
    $task_id = $_GET['task_id'];
    //Connect to database
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    //Select Database
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
   
    //Qwery to get the values from database 
    $sql = "SELECT * FROM tbl_tasks WHERE task_id=$task_id";
    //Execute Query
   
    $res = mysqli_query($conn,$sql);
    //Check whether query executed successfully or not
    if($res == true)
    {
        //Get the Value from Database
        $row = mysqli_fetch_assoc($res);
        $task_name = $row['task_name'];
        $task_description = $row['task_description'];
        $list_id = $row['list_id'];
        $priority = $row['priority'];
        $deadline= $row['deadline'];


    }else{
        //Go back to home Page
        header('location: '.SITEURL.'home.php');
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <h1>Task Manager</h1>
    <br>
    <a href="<?php echo SITEURL; ?>home.php">Home</a>
    <br>
    <h3>Update Task page</h3>
    <p>
        <?php
        if(isset($_SESSION['update_fail'])){
            echo $_SESSION['update_fail'];
            unset($_SESSION['update_fail']);

        }
        ?>
    </p>
    <form method="POST" action="">
    <table>
        <tr>
            <td>TaskName:</td>
            <td> <input type="text" name="task_name" value="<?php echo $task_name; ?>" required="required"/> </td>
                </tr>
                <tr>
                <td>Task Description:</td>
                <td><textarea name="task_description">
                    <?php echo $task_description;?>

                </textarea></td>
            </tr>
            <tr>
                <td>Select List:</td>
                <td>
                    <select name="list_id" >
                    <?php
                   
                   //connect db
                     $conn2 = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());
                     //select db
                       $db_select2 = mysqli_select_db($conn2,DB_NAME) or die(mysqli_error());
                       //sql query disp data frm dp
                      $sql2="SELECT * FROM tbl_lists";
                           //execute
                         $res2 = mysqli_query($conn2,$sql2);
                         //check execution
                       if($res2 == true){
                           //Create var to count rows
                           $count_rows2 = mysqli_num_rows($res2);
                           //if there is data in database then display all in dropdown else display none as option
                           if($count_rows2>0){
                               //display data
                               while($row2=mysqli_fetch_assoc($res2)){
                                   $list_id_db =$row2['list_id'];
                                   $list_name = $row2['list_name'];
                                   ?>
                                   <option <?php if($list_id_db == $list_id){echo "selected='selected'";}  ?>value="<?php echo $list_id; ?>"><?php echo $list_name; ?></option>
                              <?php
                               }
                           }else{
                               //display none
                               ?>
                               <option <?php if($list_id==0){echo "selected='selected'";}?>value="0">None</option>
                               <?php

                           }
                   }
                   ?>
                        
                    </select>
                    </td>
                </tr>
        <tr>
                <td>Priority:</td>
                <td>
                    <select name="priority" >
                    <option <?php if($priority == "High") {echo "selected='selected'";}?> value="High">High</option>
                    <option <?php if($priority == "Medium") {echo "selected='selected'";}?> value="Medium">Mediium</option>
                    <option <?php if($priority == "Low") {echo "selected='selected'";}?> value="Low">Low</option>
                </select></td>
            </tr>
            <tr>
                <td>Deadline:</td>
                <td><input type="date" name = "deadline" Value= "<?php echo $deadline;?>"/></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value = "UPDATE" /></td>
            </tr>
    </table>

    </form>
    
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
  $conn3 = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
  //Select Database
  $db_select3 = mysqli_select_db($conn3,DB_NAME) or die(mysqli_error());
   
  //Qwery to update the list , use same list id
  echo $sql3 = "UPDATE  tbl_tasks SET 
            task_name = '$task_name',
            task_description = '$task_description',
            list_id = $list_id,
            priority = '$priority',
            deadline = '$deadline'
            WHERE task_id = '$task_id'
  ";
  //Execute Query
    $res3 = mysqli_query($conn3,$sql3);
    //Check whether query executed successfully or not
   if($res3 == true)
    {
        //Query executed and task inserted succesfully
        $_SESSION['update'] = "Task Updated Successfully";
        //redirect to homepage
        header('location:' .SITEURL.'home.php');
        
    }
    else{
    $_SESSION['update_fail'] = "Failed to Add Task";
    //redirect to self
    header('location:' .SITEURL.'update-task.php?task_id='.$task_id);

}

}
?>