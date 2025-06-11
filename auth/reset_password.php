<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bigsell");

$token = $_GET['token'] ?? '';
$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['reset_password'])) {
    $newPassword = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $token = $_POST['token'];

    if ($newPassword !== $confirmPassword) {
        $message = "Passwords do not match.";
    } elseif (strlen($newPassword) < 6) {
        $message = "Password must be at least 6 characters.";
    } else {
        $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ? AND expires_at > NOW()");
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->fetch();

        if ($email) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            // Update in both tables (whichever exists)
            $conn->query("UPDATE users SET password = '$hashedPassword' WHERE email = '$email'");
            $conn->query("UPDATE admins SET password = '$hashedPassword' WHERE email = '$email'");
            $conn->query("DELETE FROM password_resets WHERE email = '$email'");

            $message = "Password successfully reset. <a href='login.php'>Login here</a>";
        } else {
            $message = "Invalid or expired token.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
<h2>Reset Your Password</h2>
<?php if ($message): ?>
    <p><?= $message ?></p>
<?php endif; ?>
<form method="POST">
    <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>" />
    <label>New Password:</label>
    <input type="password" name="password" required />
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required />
    <button type="submit" name="reset_password">Reset Password</button>
</form>
</body>
</html>
