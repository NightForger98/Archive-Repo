<?php
include('config/constants.php') ;


/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //connect db
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());

    //select db
    $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $res = mysqli_query($conn, $sql);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header('Location: index.php');
        exit();
    } else {
        echo "Invalid credentials.";
    }

    $res = mysqli_query($conn, $sql);

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

}*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web2 project index</title>
    <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="style.css"> 
</head>
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
        .myDiv {
  background-color: #8b5a2b;
  border-color: #f4efe7;
  
        }
        .headbut{
            background-color: #5C4033;
        }
     
    </style>
</head>
<body>
    <div class="myDiv">
    <nav class="navbar navbar-expand-lg navbar-light bg-Light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo SITEURL ?>#">Trackula</a> 
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav me-auto">
                   
                    
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo SITEURL; ?>home.php">Home</a>
                        </li>

                  

                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITEURL; ?>manage-list.php">Task Manager</a>
                       
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITEURL; ?>Calendar.php">Calendar</a>
                       
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo SITEURL; ?>blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo SITEURL; ?>contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo SITEURL; ?>aboutus.php">about us</a>
                    </li>
                </ul> 
                <div class="sign-in-form">
                   <!-- <form action="" method="post">-->
                    <input type="text" name="username" class="form-control" placeholder="Username">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <button type="submit" class="headbut">Sign In</button>
                <!-- </form> -->
                    
                </div>
                <div class="user-icon ms-3">
                    <img src="https://via.placeholder.com/40" alt="User Icon" class="rounded-circle">
                </div>
            </div>
        </div>
    </div>
    </nav>
    <div class="container mt-4">
        <h1>Welcome to Trackula, Your local task manager.</h1>
        <p>please Sign in, or create a new account using sign up.</p>
        <button>Sign Up</button>
    </div>
   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
        
</html>
