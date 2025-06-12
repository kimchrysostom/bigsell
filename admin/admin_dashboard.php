<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 220px;
      background-color: #2c3e50;
      color: #fff;
      display: flex;
      flex-direction: column;
      padding: 20px 0;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a {
      color: #ecf0f1;
      text-decoration: none;
      padding: 12px 20px;
      display: block;
      transition: background 0.3s;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }

    .main {
      flex-grow: 1;
      padding: 20px;
      animation: imageFlip 20s infinite;
      background-size: cover;
      background-position: center;
    }

    @keyframes imageFlip {
      0% { background-image: url('../uploads/garage1.jpeg'); }
      25% { background-image: url('../uploads/garage2.jpeg'); }
      50% { background-image: url('../uploads/garage3.jpeg'); }
      75% { background-image: url('../uploads/garage4.jpeg'); }
      100% { background-image: url('../uploads/garage1.jpeg'); }
    }

    .header {
      background-color: #fff;
      padding: 10px 20px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      margin-bottom: 20px;
    }

    .content {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .card h3 {
      margin-top: 0;
    }

    .back-button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #2980b9;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      margin-top: 20px;
      transition: background-color 0.3s;
    }

    .back-button:hover {
      background-color: #1c5980;
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="add.serv.prod.php">Add Services & Products</a>
    <a href="Add.team.php">Add Team Members</a>
    <a href="admin.reg.php">Add Admins</a>
    <a href="View_registered_user.php">View Users</a>
    <a href="view_admins.php">View Admins</a>
    <a href="../services.product/serv.prod.php">View Services & Products</a>
  </div>

  <div class="main">
    <div class="header">
      <h1>Welcome to Admin Dashboard</h1>
    </div>

    <!-- Button to return to user page -->
    <a href="../index.php" class="back-button">Back to User Page</a>

    <!-- You can add more dashboard cards here -->
  </div>

</body>
</html>
