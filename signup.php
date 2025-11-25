<?php
session_start();

// COMMENT OUT or REMOVE database connection code
/*
include_once 'database.php';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_db, $password_db);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
*/

$name = $username = $password = $confirmPassword = "";
$error = "";
$success = false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Laundry Management System - Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f4ff;
      font-family: 'Segoe UI', sans-serif;
    }
    .signup-card {
      max-width: 400px;
      margin: 80px auto;
      padding: 30px 25px;
      border-radius: 15px;
      background: #fff;
      box-shadow: 0px 4px 15px rgba(0,0,0,0.15);
    }
    .signup-card h2 {
      color: #1d4ed8;
      font-weight: 600;
      margin-bottom: 10px;
    }
    .signup-card p {
      color: #6b7280;
      margin-bottom: 20px;
    }
    label {
      font-weight: 500;
    }
    .btn-primary {
      background-color: #1d4ed8;
      border: none;
      border-radius: 10px;
      padding: 10px;
      font-size: 16px;
    }
    .btn-primary:hover {
      background-color: #1e40af;
    }
  </style>
</head>
<body>

<div class="signup-card">
  <h2 class="text-center">Laundry Management System</h2>
  <p class="text-center mb-4">Sign up for a new client account</p>

  <?php if ($error): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php endif; ?>

  <?php if ($success): ?>
    <div class="alert alert-success">Account created successfully!</div>
  <?php endif; ?>

  <form method="post">
    <div class="mb-3">
      <label>Full Name</label>
      <input type="text" name="name" class="form-control" placeholder="Enter your full name" required>
    </div>

    <div class="mb-3">
      <label>Username</label>
      <input type="text" name="username" class="form-control" placeholder="Choose a username" required>
    </div>

    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" placeholder="Create a password" required>
    </div>

    <div class="mb-3">
      <label>Confirm Password</label>
      <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your password" required>
    </div>

    <button type="submit" name="signup" class="btn btn-primary w-100">Create Account</button>

    <p class="text-center mt-3">
      Already have an account?  
      <a href="client_login.php" class="text-primary fw-bold">Login</a>
    </p>
  </form>
</div>

</body>
</html>
