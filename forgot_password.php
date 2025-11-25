<?php
$error = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);
    
    if (empty($new_password) || empty($confirm_password)) {
        $error = "Please fill in both password fields.";
    } elseif ($new_password !== $confirm_password) {
        $error = "The new password and confirmation do not match.";
    } elseif (strlen($new_password) < 6) {
        $error = "The password must be at least 6 characters long.";
    } else {
        // In a real application, you would save the new password here.
        $message = "Congratulations! Your password has been successfully reset. Please log in with your new password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Set New Password - Laundry Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #007bff;
            --primary-dark: #0056b3;
            --input-bg: #e9ecef;
        }
        
        body {
            background-image: url('pictures/laundry.png'); 
            background-size: cover;
            background-position: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.3);
            z-index: 0;
        }
        
        .reset-card {
            width: 100%;
            max-width: 420px;
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            border-top: 5px solid var(--primary-dark);
            z-index: 1;
        }
        
        .reset-header {
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
        
        .input-group-text {
            background-color: white !important;
            border-right: none !important;
            color: #6c757d;
        }
        .form-control.input-box.border-start-0 {
            border-left: 1px solid #ced4da !important;
        }
        
        .input-group:focus-within .input-group-text {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            z-index: 3;
        }
        .input-group:focus-within .form-control.input-box.border-start-0 {
            box-shadow: none;
        }

    </style>
</head>
<body>
    <div class="reset-card">
        <div class="text-center mb-4">
            <h2 class="reset-header mb-1">
                <i class="bi bi-key me-2"></i>Set New Password
            </h2>
            <p class="text-muted">Laundry Management System</p>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($message): ?>
            <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
            <div class="text-center mt-4">
                <a href="login.php" class="btn btn-primary-custom"><i class="bi bi-box-arrow-in-right"></i> Login Now</a>
            </div>

        <?php else: ?>
            <p class="text-center text-secondary mb-4">Enter and confirm your new password.</p>

            <form method="post" action="forgot_password.php">
                <div class="mb-3">
                    <label for="new_password" class="form-label">New Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" id="new_password" name="new_password" class="form-control input-box border-start-0" placeholder="Minimum 6 characters" required>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control input-box border-start-0" placeholder="Repeat new password" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary-custom">
                    Set Password
                </button>
            </form>
            <div class="text-center mt-3">
                <a href="login.php" class="text-secondary small text-decoration-none">
                    <i class="bi bi-arrow-left"></i> Back to Login
                </a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
