<?php
    session_start();
    require 'config/db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];


        $stmt = $pdo->prepare("SELECT * FROM users WHERE uname = :uname");
        $stmt->execute(['uname' => $uname]);
        $user = $stmt->fetch();
        if ($user && $pass == $user['pass']) {
            $_SESSION['user'] = $user['uname'];
            if($user['Type'] == 'Registrar'){
              $_SESSION['Type'] = $user['Type'];
                header('Location: registrar.php');
            }
            else{
                var_dump('False');
                header('Location: viewStudents.php');
            }
            
            exit();
        } else {

            echo "Invalid credentials.";
        }
    }
?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-3 mx-5">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-12 text-center py-5">
                        <h2>Login</h2>
                    </div>

                    <div class="col-12 text-center py-2">
                        <input class="form-control" type="text" name="uname" placeholder="uname" required>
                    </div>

                    <div class="col-12 text-center py-2">
                        <input class="form-control" type="pass" name="pass" placeholder="pass" required>
                    </div>

                    <div class="col-12 text-center py-2">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
