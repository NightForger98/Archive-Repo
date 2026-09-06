<?php
include('config/constants.php');
//check task id in url
if(isset($_GET['task_id']))
{
    //Delete the task from database
    //Get the task ID
    $task_id =$_GET['task_id'];
    //Connect to database
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    //Select Database
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
   
    //Qwery to get the values from database 
    $sql = "DELETE FROM tbl_tasks WHERE task_id=$task_id";
    //Execute Query
   
    $res = mysqli_query($conn,$sql);
    //Check whether query executed successfully or not
    if($res == true)
    {
        //query success & task deleted
        $_SESSION['delete'] = "Task Deleted Successfully. ";
        //redirect to homepage
        header('location:'.SITEURL.'home.php');

    }else{
        //failed to delete task
        $_SESSION['delete_fail'] = "Task Delete fail. ";
        //redirect to self
        header('location:'.SITEURL.'delete-task.php');
    }
}else{
    //redirect to home
    header('location:'.SITEURL.'home.php');
}
?>