<?php
    include('config/constants.php'); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $username = $_POST['username'];
        $password = $_POST['password'];

        //connect db
        $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die (mysqli_error());
        
        //select db
        $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
        
        $sql = "INSERT INTO users SET 
        username = '$username',
        type = 0,
        password = '$password'
        ";

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


        try {
            $stmt->execute(['username' => $username, 'password' => $password]);
            echo "Registration successful. <a href='login.php'>Login</a>";
        } catch (Exception $e) {
            echo "Registration failed: " . $e->getMessage();
        }
    }   
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
<div class="container">
    <div class="row">
        <div class="col-3 mx-auto d-flex justify-content-center">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-12 text-center py-5">
                        <h2>Register</h2>
                    </div>
                    <div class="col-12 py-2">
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                    </div>

                    <div class="col-12 py-2">
                        <input class="form-control  " type="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="col-12 text-center py-2">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>