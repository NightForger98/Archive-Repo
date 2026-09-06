<?php
    session_start();
    require 'app.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                    </div>

                    <div class="col-12 text-center py-2">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="col-12 text-center py-2">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
