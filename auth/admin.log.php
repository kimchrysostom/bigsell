<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['admin_id'])) {
    header("Location: admin.dashboard.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $db = "bigsell";
    $user = "root"; // adjust as needed
    $pass = "";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $name, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['admin_id'] = $id;
            $_SESSION['admin_name'] = $name;
            header("Location: admin.dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Admin not found.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Login</title>
  <style>
    body {
      background: #ecf0f1;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      width: 350px;
    }

    h2 {
      text-align: center;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      font-size: 16px;
    }

    button {
      width: 100%;
      padding: 10px;
      background-color: #2980b9;
      color: #fff;
      border: none;
      margin-top: 15px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #3498db;
    }

    .message {
      color: red;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>

<form method="POST" action="">
  <h2>Admin Login</h2>
  <input type="email" name="email" placeholder="Email" required />
  <input type="password" name="password" placeholder="Password" required />
  <button type="submit">Login</button>

  <?php if (isset($error)): ?>
    <div class="message"><?= $error ?></div>
  <?php endif; ?>
</form>

</body>
</html>
