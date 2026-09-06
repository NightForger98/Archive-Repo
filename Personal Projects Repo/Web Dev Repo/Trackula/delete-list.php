<?php

//Include constants.php
Include('config/constants.php');
//echo "Delete List Page"
//check list_id is assigned
if(isset($_GET['list_id'])){
    //delete list from database
    //Get the list_id value from URL or Get method
    $list_id =$_GET['list_id'];

    //Connect the db
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());
    //select db)
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
    //write query to delete list from db
   echo  $sql = "DELETE FROM tbl_lists WHERE list_id=$list_id";
   //execute the query
   $res = mysqli_query($conn,$sql);
   //check whether the query executed 
   if($res == true)
   {//query success, list deleted
        $_SESSION['delete']= "List Deleted Successfully";
        //redirect to manage list page
        header('location:'.SITEURL.'manage-list.php');
   }
   else{
    //list dlt fail
    $_SESSION['delete_fail'] = "Failed to delete list";
    header('location:'.SITEURL.'manage-list.php');
   }

}else{//redirect
    header('location:'.SITEURL.'manage-list.php');
}


?>