<?php
session_start();

$error = "";

// Demo authentication data
$demoAccounts = [
    'admin' => ['username' => 'admin', 'password' => 'admin123'],
    'staff' => ['username' => 'staff1', 'password' => 'staff123'],
    'client' => ['username' => 'arfah', 'password' => 'student123']
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!$username || !$password) {
        $error = "Please fill in all fields.";
    } else {
        $authenticated = false;
        foreach ($demoAccounts as $role => $data) {
            if ($username === $data['username'] && $password === $data['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                // Redirect based on role
                header("Location: {$role}-dashboard.php");
                exit();
            }
        }
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - Laundry Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #007bff; /* Biru Bootstrap Standard */
            --primary-dark: #0056b3; /* Biru Lebih Gelap */
            --bg-light: #f5f7fb;
            --input-bg: #e9ecef;
        }
        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-top: 5px solid var(--primary-dark);
        }
        .login-header {
            color: var(--primary-dark);
            font-weight: 700;
        }
        .btn-primary-custom {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .btn-primary-custom:hover {
            background-color: #003d80;
            border-color: #003d80;
        }
        .input-box {
            background: var(--input-bg);
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 10px;
            height: 48px;
        }
        .input-box:focus {
            background: white;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 5px;
            color: #495057;
        }
        .forgot-password-link {
            font-size: 0.9rem;
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.2s;
        }
        .forgot-password-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        .demo-info {
            background: #e9f5ff;
            border-left: 5px solid var(--primary-color);
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="text-center mb-4">
            <h2 class="login-header mb-1">
                <i class="bi bi-basket me-2"></i>LMS
            </h2>
            <p class="text-muted">Laundry Management System</p>
        </div>
        
        <p class="text-center text-secondary mb-4">Sign in to your account</p>

        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-person"></i></span>
                    <input type="text" id="username" name="username" class="form-control input-box border-start-0" placeholder="Enter username" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-lock"></i></span>
                    <input type="password" id="password" name="password" class="form-control input-box border-start-0" placeholder="Enter password" required>
                </div>
            </div>
            
            <div class="d-flex justify-content-end mb-4">
                <a href="#" class="forgot-password-link">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary-custom">
                <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </button>
        </form>

        <div class="demo-info mt-4 small">
            <p class="mb-1 text-primary-dark" style="font-weight: 600;">Demo Accounts:</p>
            <ul class="list-unstyled mb-0">
                <li><i class="bi bi-person-gear"></i> Admin: **admin / admin123**</li>
                <li><i class="bi bi-person-workspace"></i> Staff: **staff1 / staff123**</li>
                <li><i class="bi bi-person"></i> Client: **arfah / student123**</li>
            </ul>
        </div>
    </div>
</body>
</html>