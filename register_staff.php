<?php
session_start();

$name = $username = $phone = "";
$error = "";
$success = false;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register Staff</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f5f7fb;
      font-family: 'Segoe UI', sans-serif;
    }

    .page-title {
      font-size: 32px;
      font-weight: bold;
      color: #1e293b;
    }

    .subtitle {
      color: #64748b;
    }

    .custom-card {
      background: white;
      border-radius: 12px;
      padding: 25px;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.05);
    }

    .input-box {
      background: #f1f2f5;
      border: none;
      padding: 10px;
      border-radius: 8px;
    }

    .btn-blue {
      background-color: #0d6efd;
      color: white;
      padding: 12px;
      width: 100%;
      border-radius: 8px;
      font-weight: 500;
    }
  </style>
</head>

<body>

<div class="container py-5">
  
  <!-- page title -->
  <h1 class="page-title">Register Staff</h1>
  <p class="subtitle mb-4">Add new staff members to the system</p>

  <div class="row g-4">

    <!-- LEFT CARD (Form) -->
    <div class="col-lg-6">
      <div class="custom-card">

        <h5 class="mb-3">
          👤 New Staff Member
        </h5>

        <?php if ($error): ?>
          <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
          <div class="alert alert-success">Staff member added successfully!</div>
        <?php endif; ?>

        <form method="post">

          <label class="mt-2">Staff Name *</label>
          <input type="text" name="name" class="form-control input-box" placeholder="Enter full name">

          <label class="mt-3">Phone Number *</label>
          <input type="text" name="phone" class="form-control input-box" placeholder="012-3456789">

          <label class="mt-3">Username *</label>
          <input type="text" name="username" class="form-control input-box" placeholder="Choose a username">
          <small class="text-muted">Default password will be: staff123</small>

          <button class="btn btn-blue mt-4">
            👤➕ Create Account
          </button>
        </form>

      </div>
    </div>

    <!-- RIGHT CARD (Staff List) -->
    <div class="col-lg-6">
      <div class="custom-card">
        
        <h5 class="mb-3">Current Staff Members</h5>

        <table class="table table-borderless">
          <thead>
            <tr class="text-muted">
              <th>ID</th>
              <th>Name</th>
              <th>Phone</th>
              <th>Username</th>
            </tr>
          </thead>

          <tbody>
            <!-- SAMPLE STATIC DATA — replace with PHP loop later -->
            <tr>
              <td>S001</td>
              <td>John Smith</td>
              <td>012-3456789</td>
              <td>staff1</td>
            </tr>
          </tbody>

        </table>

      </div>
    </div>

  </div>
</div>

</body>
</html>
