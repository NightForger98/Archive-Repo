<?php

require 'app.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");

        try {
            $stmt->execute(['username' => $username, 'password' => $password]);
            echo "Registration successful. <a href='login.php'>Login</a>";
        } catch (Exception $e) {
            echo "Registration failed: " . $e->getMessage();
        }
    }
?>

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

