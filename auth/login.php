<?php
session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "bigsell");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";
$show_role_option = false;
$temp_data = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login_user'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $message = "Please enter both email and password.";
    } else {
        // Check users
        $user_stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
        $user_stmt->bind_param("s", $email);
        $user_stmt->execute();
        $user_result = $user_stmt->get_result();
        if ($user_result->num_rows === 1) {
            $row = $user_result->fetch_assoc();
            $temp_data['user'] = $row;
        }
        $user_stmt->close();

        // Check admins
        $admin_stmt = $conn->prepare("SELECT id, name, password FROM admins WHERE email = ?");
        $admin_stmt->bind_param("s", $email);
        $admin_stmt->execute();
        $admin_result = $admin_stmt->get_result();
        if ($admin_result->num_rows === 1) {
            $row = $admin_result->fetch_assoc();
            $temp_data['admin'] = $row;
        }
        $admin_stmt->close();

        // If neither found
        if (empty($temp_data)) {
            $message = "You are not registered. Please register first.";
        } else {
            $_SESSION['temp_email'] = $email;
            $_SESSION['temp_password'] = $password;

            $valid_user = isset($temp_data['user']) && password_verify($password, $temp_data['user']['password']);
            $valid_admin = isset($temp_data['admin']) && password_verify($password, $temp_data['admin']['password']);

            if ($valid_user && $valid_admin) {
                $show_role_option = true;
            } elseif ($valid_user) {
                $_SESSION['user_id'] = $temp_data['user']['id'];
                $_SESSION['user_name'] = $temp_data['user']['name'];
                header("Location: ../user/user_dashboard.php");
                exit();
            } elseif ($valid_admin) {
                $_SESSION['admin_id'] = $temp_data['admin']['id'];
                $_SESSION['admin_name'] = $temp_data['admin']['name'];
                header("Location: ../admin/admin_dashboard.php");
                exit();
            } else {
                $message = "Invalid email or password.";
            }
        }
    }
}

// Role selection
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['choose_role'])) {
    $role = $_POST['role'];
    $email = $_SESSION['temp_email'] ?? '';
    $password = $_SESSION['temp_password'] ?? '';

    if ($role === "user") {
        $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    } else {
        $stmt = $conn->prepare("SELECT id, name, password FROM admins WHERE email = ?");
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            if ($role === "user") {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                header("Location: ../user/user_dashboard.php");
            } else {
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_name'] = $row['name'];
                header("Location: ../admin/admin_dashboard.php");
            }
            exit();
        } else {
            $message = "Invalid password.";
        }
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e9f1f7;
            padding: 20px;
        }
        .login-box {
            width: 400px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .message {
            color: red;
            padding: 10px;
            background: #fdd;
            border-left: 5px solid red;
            margin-bottom: 15px;
        }
        input, select, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            font-size: 16px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .link {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Login</h2>

    <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <?php if ($show_role_option): ?>
        <form method="POST">
            <label>Select Role:</label>
            <select name="role" required>
                <option value="user">User Dashboard</option>
                <option value="admin">Admin Dashboard</option>
            </select>
            <button type="submit" name="choose_role">Continue</button>
        </form>
    <?php else: ?>
        <form method="POST">
            <label>Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit" name="login_user">Login</button>
        </form>

        <div class="link">
            Don't have an account? <a href="register_user.php">Register</a><br>
            <a href="reset_request.php" style="font-size: 14px;">Forgot Password?</a>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
