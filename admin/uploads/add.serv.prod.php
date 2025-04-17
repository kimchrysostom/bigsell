<?php
$servername = "localhost";  // Replace with your server info
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "bigsell";        // The database you want to use

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add a service
function addService($name, $description) {
    global $conn;
    $sql = "INSERT INTO services (name, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $description);

    if ($stmt->execute()) {
        echo "New service added successfully!<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Function to add a product (no price field)
function addProduct($name, $description) {
    global $conn;
    $sql = "INSERT INTO products (name, description) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $description);

    if ($stmt->execute()) {
        echo "New product added successfully!<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }

    $stmt->close();
}

// Fetch existing services
function getServices() {
    global $conn;
    $sql = "SELECT * FROM services";
    $result = $conn->query($sql);
    return $result;
}

// Fetch existing products
function getProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    return $result;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_service'])) {
        $service_name = $_POST['service_name'];
        $service_description = $_POST['service_description'];
        addService($service_name, $service_description);
    } elseif (isset($_POST['add_product'])) {
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        addProduct($product_name, $product_description);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service and Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 16px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .form-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .item-list {
            margin-top: 40px;
        }
        .item-list h3 {
            text-align: center;
        }
        .item {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-title">Add Service or Product</div>

    <!-- Service Form -->
    <h3>Add Service</h3>
    <form method="POST" id="serviceForm" onsubmit="return validateServiceForm()">
        <div class="form-group">
            <label for="service_name">Service Name:</label>
            <input type="text" id="service_name" name="service_name" required>
        </div>
        <div class="form-group">
            <label for="service_description">Service Description:</label>
            <textarea id="service_description" name="service_description" rows="4" required></textarea>
        </div>
        <button type="submit" name="add_service">Add Service</button>
    </form>

    <hr>

    <!-- Product Form -->
    <h3>Add Product</h3>
    <form method="POST" id="productForm" onsubmit="return validateProductForm()">
        <div class="form-group">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>
        </div>
        <div class="form-group">
            <label for="product_description">Product Description:</label>
            <textarea id="product_description" name="product_description" rows="4" required></textarea>
        </div>
        <button type="submit" name="add_product">Add Product</button>
    </form>

    <div class="item-list">
        <h3>Services</h3>
        <?php
        $services = getServices();
        if ($services->num_rows > 0) {
            while ($row = $services->fetch_assoc()) {
                echo "<div class='item'><strong>" . htmlspecialchars($row['name']) . "</strong><br>" . htmlspecialchars($row['description']) . "</div>";
            }
        } else {
            echo "No services found.";
        }
        ?>

        <hr>

        <h3>Products</h3>
        <?php
        $products = getProducts();
        if ($products->num_rows > 0) {
            while ($row = $products->fetch_assoc()) {
                echo "<div class='item'><strong>" . htmlspecialchars($row['name']) . "</strong><br>" . htmlspecialchars($row['description']) . "</div>";
            }
        } else {
            echo "No products found.";
        }
        ?>
    </div>

</div>

<script>
    // JavaScript Form Validation for Service
    function validateServiceForm() {
        const name = document.getElementById("service_name").value;
        const description = document.getElementById("service_description").value;

        if (name === "" || description === "") {
            alert("Please fill in all fields for the service.");
            return false;
        }
        return true;
    }

    // JavaScript Form Validation for Product
    function validateProductForm() {
        const name = document.getElementById("product_name").value;
        const description = document.getElementById("product_description").value;

        if (name === "" || description === "") {
            alert("Please fill in all fields for the product.");
            return false;
        }
        return true;
    }
</script>

</body>
</html>
