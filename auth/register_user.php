<?php
include '../config/db.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_user'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phonenumber = trim($_POST['phonenumber']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    if (empty($name) || empty($email) || empty($phonenumber) || empty($password) || empty($confirm_password)) {
        $message = "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } elseif ($password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $message = "Email is already registered.";
        } else {
            // Insert user
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (name, email, phone_number, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $phonenumber, $hashed_password);

            if ($stmt->execute()) {
                $message = "User registered successfully!";
                // Optionally clear fields here
                $_POST = array();
            } else {
                $message = "Error: " . $stmt->error;
            }
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f8;
            margin: 40px auto;
            max-width: 450px;
            color: #333;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #27ae60;
            padding-bottom: 6px;
            margin-bottom: 20px;
        }
        form {
            background: white;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 10px 14px;
            margin-bottom: 18px;
            border: 1.5px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="tel"]:focus {
            border-color: #27ae60;
            outline: none;
        }
        button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #1e8449;
        }
        p.message {
            padding: 12px 20px;
            background-color: #d4edda;
            border: 1px solid #28a745;
            color: #155724;
            border-radius: 6px;
            margin-bottom: 20px;
        }
        p.error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>

<h2>User Registration</h2>

<?php if ($message): ?>
    <p class="message <?= strpos($message, 'Error') !== false || strpos($message, 'already') !== false || strpos($message, 'fill') !== false || strpos($message, 'Invalid') !== false || strpos($message, 'match') !== false ? 'error' : '' ?>">
        <?= htmlspecialchars($message) ?>
    </p>
<?php endif; ?>

<form method="POST" action="">
    <label for="name">Full Name:</label>
    <input type="text" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required />

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required />

    <label for="phonenumber">Phone Number:</label>
    <input type="tel" id="phonenumber" name="phonenumber" value="<?= htmlspecialchars($_POST['phonenumber'] ?? '') ?>" required pattern="[0-9+\-\s]{7,20}" title="Enter valid phone number" />

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required />

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required />

    <button type="submit" name="register_user">Register</button>
</form>

</body>
</html>
