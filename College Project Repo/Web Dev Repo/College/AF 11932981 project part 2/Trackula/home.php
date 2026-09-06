<?php
include('config/constants.php') ;

//session_start();
//require 'app.php';

/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header('Location: index.php');
        exit();
    } else {
        echo "Invalid credentials.";
    }
}*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="style.css"> 
   <style>
      ul li{
  	display: inline-block;
    color: white;
        }
        .head-nav{
            
 background-color: black;
  color: white;
  padding: 0.5 0.5px;
  text-decoration: none;
  text-transform: uppercase;
}
        
    </style>
</head>
<body>
    <header>
    <h1> Task Manager</h1>
    
      <!-- menu start -->
       <div class="menu">
       <div  id="navbarNav">
                
                <ul class="head-nav">
                    <li class="nav-item">
            <a href = "<?php echo SITEURL; ?>index.php"> Welcome Page</a> -
                     </li>
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
                               //display data
                               while($row2=mysqli_fetch_assoc($res2)){
                                   $list_id =$row2['list_id'];
                                   $list_name = $row2['list_name'];
                                   ?>
                                    <li class="nav-item">
                                    <a href="<?php echo SITEURL;?>list-task.php?list_id=<?php echo $list_id; ?>"><?php echo $list_name; ?></a> - 
                                    </li>
                                    
                                   <?php
                               }
                            }
                     ?>
                    
            <li class="nav-item">
            <a href="<?php echo SITEURL; ?>manage-list.php">Manage Lists</a>
            </li>
            </ul>
            </div>
        </div>
       <!-- menu end -->
    </nav>
    </header>
        <br>
        <main>
<!-- task table-->
 <p>
<?php
if(isset($_SESSION['add'])){
    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['delete'])){
    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}
if(isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if(isset($_SESSION['delete_fail'])){
    echo $_SESSION['delete_fail'];
    unset($_SESSION['delete_fail']);
}
?>
 </p>
 <div class="all-tasks">
    <a href="<?php echo SITEURL; ?>add-task.php">Add Task</a>
    <table>
        <tr>
            <th>S.N  -  </th>
            <th> Task Name  - </th>
            <th> Priority   -  </th>
            <th> Deadline   - </th>
            <th> Actions</th>
        </tr>

        <?php
        //connect db
        $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());
        //select db
          $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
          //sql query disp data frm dp
         $sql="SELECT * FROM tbl_tasks";
              //execute
            $res = mysqli_query($conn,$sql);
            //check execution
          if($res == true){
            //display data from database
            //count the Tasks on Database first     
            $count_rows = mysqli_num_rows($res);

            //Create serial number value
            $sn=1;
            //check whether there is task on db or not
            if($count_rows>0){
                //data in db
                while($row=mysqli_fetch_assoc($res))
                {
                    $task_id = $row['task_id'];
                    $task_name = $row['task_name'];
                    $priority = $row['priority'];
                    $deadline = $row['deadline'];
                    ?>
                    <tr>
                        <td><?php echo $sn++?></td>
                        <td><?php echo $task_name;?> </td>
                        <td> <?php echo $priority?></td>
                        <td> <?php echo $deadline?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>update-task.php?task_id=<?php echo $task_id;?>"> Update </a>  - 
                            <a href="<?php echo SITEURL; ?>delete-task.php?task_id=<?php echo $task_id;?>"> Delete </a>
                        </td>

                    </tr>

                    <?php


                }
            }else{
                //no data
                ?>
                <tr>
                    <td colspan="5"> No Tasks Added Yet.</td>
                </tr>
                
                <?php
            }
          }
        ?>

    </table>
</div>
 <!-- tbl end -->
    </main>
   
</body>
</html>