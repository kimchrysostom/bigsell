<?php
session_start();
if (!isset($_SESSION['temp_email']) || !isset($_SESSION['temp_password'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Choose Role</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; text-align: center; margin-top: 100px; }
        .box {
            background: white;
            display: inline-block;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h2 { margin-bottom: 20px; }
        form { margin-top: 20px; }
        button {
            background: #2980b9;
            color: white;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Choose how you want to log in</h2>
    <form method="post" action="login.php">
        <input type="hidden" name="email" value="<?= htmlspecialchars($_SESSION['temp_email']) ?>">
        <input type="hidden" name="password" value="<?= htmlspecialchars($_SESSION['temp_password']) ?>">
        <button type="submit" name="login_user" value="1" name="role" value="user">Login as User</button>
        <button type="submit" name="login_user" value="1" name="role" value="admin">Login as Admin</button>
    </form>
</div>

</body>
</html>
