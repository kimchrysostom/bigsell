<?php
include '../config/db.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);

    if (!empty($email)) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? UNION SELECT id FROM admins WHERE email = ?");
        $stmt->bind_param("ss", $email, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $token = bin2hex(random_bytes(50));
            $expires = date("Y-m-d H:i:s", strtotime("+1 hour"));

            $conn->query("DELETE FROM password_resets WHERE email = '$email'");
            $insert = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
            $insert->bind_param("sss", $email, $token, $expires);
            $insert->execute();

            $resetLink = "http://localhost/reset_password.php?token=" . $token;
            // Replace this with actual email sending logic
            $message = "Password reset link (send via email in production): <a href='$resetLink' target='_blank'>$resetLink</a>";
        } else {
            $message = "No account found with that email.";
        }

        $stmt->close();
    } else {
        $message = "Please enter your email.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <style>
        body {
            background-color: #eef3f7;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .message {
            background-color: #ffecec;
            color: #e74c3c;
            border-left: 5px solid #e74c3c;
            padding: 12px;
            margin-bottom: 15px;
            font-size: 14px;
            border-radius: 5px;
        }

        .success-message {
            background-color: #e8f8f5;
            color: #27ae60;
            border-left: 5px solid #27ae60;
            padding: 12px;
            margin-bottom: 15px;
            font-size: 14px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #34495e;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 16px;
        }

        button {
            width: 100%;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .link {
            margin-top: 15px;
            text-align: center;
        }

        .link a {
            color: #3498db;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Forgot Password</h2>

    <?php if ($message): ?>
        <div class="<?= strpos($message, 'link') !== false ? 'success-message' : 'message' ?>">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <form method="POST">
        <label>Email Address:</label>
        <input type="email" name="email" placeholder="Enter your registered email" required />
        <button type="submit">Send Reset Link</button>
    </form>

    <div class="link">
        <a href="login.php">Back to Login</a>
    </div>
</div>

</body>
</html>
