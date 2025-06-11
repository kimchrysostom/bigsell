<?php
include '../config/db.php';

// Fetch all users
$sql = "SELECT id, name, email, phone_number FROM users ORDER BY id DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Registered Users</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f8;
            max-width: 900px;
            margin: 40px auto;
            color: #333;
        }
        h2 {
            color: #2c3e50;
            border-bottom: 2px solid #2980b9;
            padding-bottom: 6px;
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            overflow: hidden;
        }
        th, td {
            padding: 14px 20px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #2980b9;
            color: white;
            font-weight: 600;
        }
        tr:hover {
            background-color: #f1f9ff;
        }
        caption {
            caption-side: top;
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #2980b9;
        }
    </style>
</head>
<body>

<h2>Registered Users</h2>

<?php if ($result && $result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']) ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['phone_number']) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No registered users found.</p>
<?php endif; ?>

</body>
</html>
