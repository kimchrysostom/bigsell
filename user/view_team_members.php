<?php
// Database connection
$servername = "localhost";  // Replace with your server info
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "bigsell";        // The database you want to use

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all team members from the database
$sql = "SELECT * FROM team_members";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 2.4em;
            color: #333;
            text-align: center; /* Center the title */
            margin-bottom: 40px;
        }
        .team-members {
            display: flex;
            flex-wrap: wrap; /* Allow cards to wrap onto the next line if needed */
            justify-content: center; /* Center the cards horizontally */
            gap: 30px;
        }
        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            width: 250px; /* Width of the card */
            margin: 0 10px; /* Space between cards */
        }
        .team-member:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }
        .team-member img {
            width: 180px; /* Fixed size for uniform images */
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
            border: 3px solid #f4f6f9;
        }
        .team-member h4 {
            font-size: 1.5em;
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
        }
        .team-member p {
            font-size: 1.1em;
            color: #555;
            text-align: center;
            margin-bottom: 10px;
        }
        .team-member .role {
            font-size: 1em;
            color: #777;
            font-weight: 400;
        }
        .team-member .name {
            font-size: 1.4em;
            font-weight: 500;
            color: #2c3e50;
        }
        .message {
            margin-top: 20px;
            padding: 15px;
            background-color: #e6f7ff;
            border: 1px solid #c1e0f7;
            border-radius: 5px;
            color: #31708f;
            text-align: center;
            font-size: 1.1em;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Our Team Members</h2>

    <!-- Display success or error message -->
    <?php if ($result->num_rows == 0) { ?>
        <div class="message">
            No team members found in the database.
        </div>
    <?php } ?>

    <!-- Display all team members -->
    <div class="team-members">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $images = explode(",", $row['images']);
                ?>
                <div class="team-member">
                    <?php 
                    foreach ($images as $image) {
                        $imagePath = "../uploads/" . basename($image); // Adjust path if needed
                        if (file_exists($imagePath)) { ?>
                            <img src="<?php echo $imagePath; ?>" alt="Team Member Image">
                        <?php } else { ?>
                            <img src="https://via.placeholder.com/180" alt="Image Not Found">
                        <?php } 
                    } ?>
                    <h4 class="name"><?php echo $row['name']; ?></h4>
                    <p class="role"><?php echo $row['role']; ?></p>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

</body>
</html>
