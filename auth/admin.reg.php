<?php
// Connect to the 'bigsell' database
$conn = new mysqli("localhost", "root", "", "bigsell");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_admin'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $created_at = date('Y-m-d H:i:s');

    $sql = "INSERT INTO admins (name, email, password, created_at) VALUES ('$name', '$email', '$password', '$created_at')";

    if ($conn->query($sql) === TRUE) {
        $message = "New admin added successfully.";
    } else {
        $message = "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT id, name, email, created_at FROM admins ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Manage Admins</title>
    <style>
        /* Reset some default */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f8;
            margin: 40px auto;
            max-width: 900px;
            color: #333;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 6px;
        }
        form {
            background: white;
            padding: 20px 25px;
            margin-bottom: 40px;
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
        input[type="password"] {
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
        input[type="password"]:focus {
            border-color: #3498db;
            outline: none;
        }
        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2980b9;
        }
        p.message {
            padding: 12px 20px;
            background-color: #dff0d8;
            border: 1px solid #3c763d;
            color: #3c763d;
            border-radius: 6px;
            margin-bottom: 25px;
            max-width: 500px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 14px 18px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 15px;
        }
        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }
        tr:hover {
            background-color: #f1f9ff;
        }
        /* Responsive */
        @media (max-width: 600px) {
            body {
                margin: 20px 10px;
            }
            table, thead, tbody, th, td, tr {
                display: block;
            }
            tr {
                margin-bottom: 20px;
            }
            th {
                background-color: transparent;
                color: #3498db;
                font-size: 14px;
                padding-left: 0;
            }
            td {
                padding-left: 50%;
                position: relative;
                font-size: 14px;
                border: none;
                border-bottom: 1px solid #ddd;
            }
            td::before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                font-weight: 600;
                color: #3498db;
            }
        }
    </style>
</head>
<body>

    <h2>Add New Admin</h2>

    <?php if (isset($message)): ?>
        <p class="message"><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit" name="add_admin">Add Admin</button>
    </form>

    <h2>Admins List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th><th>Name</th><th>Email</th><th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($admin = $result->fetch_assoc()): ?>
                    <tr>
                        <td data-label="ID"><?= $admin['id'] ?></td>
                        <td data-label="Name"><?= htmlspecialchars($admin['name']) ?></td>
                        <td data-label="Email"><?= htmlspecialchars($admin['email']) ?></td>
                        <td data-label="Created At"><?= $admin['created_at'] ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">No admins found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
