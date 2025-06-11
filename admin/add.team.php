<?php
include '../config/db.php';

// Handle the form submission (Add team member)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name']) && isset($_POST['role'])) {
    $name = $_POST['name'];
    $role = $_POST['role'];
    
    // Upload the images
    $targetDir = "../uploads/";
    $imagePaths = [];

    // Handle image uploads
    for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
        $imageName = basename($_FILES['images']['name'][$i]);
        $targetFile = $targetDir . $imageName;
        if (move_uploaded_file($_FILES['images']['tmp_name'][$i], $targetFile)) {
            $imagePaths[] = $imageName;
        }
    }

    // Convert the image paths to a string
    $imagesString = implode(",", $imagePaths);

    // Insert data into the database
    $sql = "INSERT INTO team_members (name, role, images) VALUES ('$name', '$role', '$imagesString')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "New record created successfully!";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Retrieve all team members from the database
$sqlSelect = "SELECT * FROM team_members";
$result = $conn->query($sqlSelect);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 8px;
            display: inline-block;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1.2em;
        }
        button:hover {
            background-color: #45a049;
        }
        .team-members {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .team-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 15px;
            margin: 15px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: center;
        }
        .team-member img {
            width: 150px; /* Ensure all images are of the same size */
            height: 150px; /* Maintain aspect ratio and size */
            object-fit: cover; /* Ensure images don't stretch or skew */
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .team-member h4 {
            margin: 5px 0;
            font-size: 1.2em;
            color: #333;
        }
        .team-member p {
            font-size: 1em;
            color: #555;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            text-align: center;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Manage Team Members</h2>

    <!-- Form for adding team members -->
    <h3>Add New Team Member</h3>
    <?php if (isset($successMessage)) { ?>
        <div class="message success"><?php echo $successMessage; ?></div>
    <?php } ?>
    
    <?php if (isset($errorMessage)) { ?>
        <div class="message error"><?php echo $errorMessage; ?></div>
    <?php } ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required placeholder="Enter name">

        <label for="role">Role:</label>
        <input type="text" name="role" id="role" required placeholder="Enter role">

        <label for="images">Upload Images:</label>
        <input type="file" name="images[]" id="images" multiple required>

        <button type="submit">Add Member</button>
    </form>

    <!-- Display all team members -->
    <h3>All Team Members</h3>
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
                            <p>Image not found: <?php echo $imagePath; ?></p>
                        <?php } 
                    } ?>
                    <h4><?php echo $row['name']; ?></h4>
                    <p><?php echo $row['role']; ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p>No team members found.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
