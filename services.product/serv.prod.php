<?php
include '../config/db.php';

// Define pagination settings
$servicesPerPage = 5;
$productsPerPage = 6;

// Get the current page for services and products, with validation
$servicePage = isset($_GET['service_page']) ? max(1, (int)$_GET['service_page']) : 1;
$productPage = isset($_GET['product_page']) ? max(1, (int)$_GET['product_page']) : 1;

// Calculate the offset for services and products
$serviceOffset = ($servicePage - 1) * $servicesPerPage;
$productOffset = ($productPage - 1) * $productsPerPage;

// Function to fetch data with prepared statements
function fetchData($conn, $sql, $params = []) {
    $stmt = $conn->prepare($sql);
    if ($params) {
        $stmt->bind_param(...$params);
    }
    $stmt->execute();
    return $stmt->get_result();
}

// Fetch services with pagination
function getServices($conn, $serviceOffset, $servicesPerPage) {
    $sql = "SELECT * FROM services LIMIT ?, ?";
    return fetchData($conn, $sql, ['ii', $serviceOffset, $servicesPerPage]);
}

// Fetch products with pagination (no price)
function getProducts($conn, $productOffset, $productsPerPage) {
    $sql = "SELECT * FROM products LIMIT ?, ?";
    return fetchData($conn, $sql, ['ii', $productOffset, $productsPerPage]);
}

// Fetch total number of services
function getTotalCount($conn, $table) {
    $sql = "SELECT COUNT(*) as count FROM $table";
    $result = fetchData($conn, $sql);
    $row = $result->fetch_assoc();
    return $row['count'];
}

// Get the services and products
$services = getServices($conn, $serviceOffset, $servicesPerPage);
$products = getProducts($conn, $productOffset, $productsPerPage);

// Get total count for pagination
$totalServices = getTotalCount($conn, 'services');
$totalProducts = getTotalCount($conn, 'products');

// Calculate total pages
$totalServicePages = ceil($totalServices / $servicesPerPage);
$totalProductPages = ceil($totalProducts / $productsPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Products and Services</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h2 {
            font-size: 40px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .section-description {
            font-size: 20px;
            text-align: center;
            margin-bottom: 40px;
            color: #333;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        }

        /* Cards Layout */
        .cards-section {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
            padding: 40px;
        }

        .card {
            flex: 1;
            min-width: 280px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            margin-bottom: 30px;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }

        .card p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        /* Pagination style */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .page-btn {
            background-color: #e94e77;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .page-btn:hover {
            background-color: #ff6f61;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Vehicle Products and Services</h2>
    <p class="section-description">Browse our wide selection of vehicle products and services. Whether you're looking for a new vehicle service or a product to enhance your driving experience, we've got you covered!</p>

    <div class="cards-section">
        <!-- Services Cards -->
        <div class="card">
            <h3>Services</h3>
            <div id="service-list">
                <?php while ($row = $services->fetch_assoc()) { ?>
                    <div class='card'>
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                    </div>
                <?php } ?>
            </div>
            <div class="pagination">
                <?php if ($servicePage > 1) { ?>
                    <a href="?service_page=<?php echo $servicePage - 1; ?>" class="page-btn">Prev</a>
                <?php } ?>
                <?php if ($servicePage < $totalServicePages) { ?>
                    <a href="?service_page=<?php echo $servicePage + 1; ?>" class="page-btn">Next</a>
                <?php } ?>
            </div>
        </div>

        <!-- Products Cards -->
        <div class="card">
            <h3>Products</h3>
            <div id="product-list">
                <?php while ($row = $products->fetch_assoc()) { ?>
                    <div class='card'>
                        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                    </div>
                <?php } ?>
            </div>
            <div class="pagination">
                <?php if ($productPage > 1) { ?>
                    <a href="?product_page=<?php echo $productPage - 1; ?>" class="page-btn">Prev</a>
                <?php } ?>
                <?php if ($productPage < $totalProductPages) { ?>
                    <a href="?product_page=<?php echo $productPage + 1; ?>" class="page-btn">Next</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php
$conn->close();
?>
