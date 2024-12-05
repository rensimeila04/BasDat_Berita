<?php 
session_start();

if (isset($_COOKIE['admin_logged_in']) && $_COOKIE['admin_logged_in'] == 'true') {
    header('Location: admin_dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

    if ($username === 'admin' && $password === 'admin123') { 
        $_SESSION['admin_logged_in'] = true;
        setcookie('admin_logged_in', 'true', time() + (86400 * 30), "/");
        header('Location: admin_dashboard.php');
        exit; 
    } else { 
        $error_message = "Username atau password salah."; 
    } 
} 
?>

<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Login Admin</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../style/style.css"> 
    <style> 
        body { 
            background-color: #E9E9E9; 
        } 
        .container { 
            background-color: #fff; 
            padding: 20px; 
            border-radius: 10px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            max-width: 400px; 
            margin: 0 auto; 
        } 
        .btn.btn-outline-dark:hover { 
            background-color: #b61318; 
            color: #ffffff; 
            transform: translateY(-1px);
            box-shadow: 0 2px 4px #333; 
        } 
    </style> 
</head> 

<body> 
    <div class="container mt-5"> 
        <h2 class="text-center fw-bold" style="color: #b61318">Login Admin</h2> 
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action=""> 
            <div style="margin: 40px 0 "> 
                <div class="form-group"> 
                    <label for="username">Username:</label> 
                    <input type="text" name="username" id="username" class="form-control" required> 
                </div> 
                <div class="form-group"> 
                    <label for="password">Password:</label> 
                    <input type="password" name="password" id="password" class="form-control" required> 
                </div> 
            </div> 
            <div class="d-flex justify-content-end"> 
                <button type="submit" class="btn btn-outline-dark">Login</button> 
            </div> 
        </form> 
    </div> 
</body> 
</html>
