<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page with Tabs</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyWebsite</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="page1.php">Page 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page2.php">Page 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page3.php">Page 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page4.php">Page 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page5.php">Page 5</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="page6.php">Page 6</a>
                    </li>
                </ul>
                <div class="sign-in-form">
                    <input type="text" class="form-control" placeholder="Username">
                    <input type="password" class="form-control" placeholder="Password">
                    <button class="btn btn-primary">Sign In</button>
                </div>
                <div class="user-icon ms-3">
                    <img src="https://via.placeholder.com/40" alt="User Icon" class="rounded-circle">
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Welcome to My Website!</h1>
        <p>This is the home page with tabs to navigate to other sections.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
