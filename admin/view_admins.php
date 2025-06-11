<?php
include '../config/db.php';
// Fetch all admins ordered by newest first
$result = $conn->query("SELECT id, name, email, created_at FROM admins ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>View Admins</title>
    <style>
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
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 20px;
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
