<?php
require_once("classes/database.php");

$db = new Database();

// Get all categories
$categories = $db->getCategories();

// If category is selected
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : null;

if ($selectedCategory === "all") {
    $products = $db->getProducts(); // get all products
} elseif ($selectedCategory) {
    $products = $db->getProductsByCategory($selectedCategory);
} else {
    $products = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            margin: 5px;
            padding: 10px 20px;
            display: inline-block;
            background: #eee;
            border-radius: 5px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .header:hover {
            background: #ccc;
        }
        /* Container for cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        /* Individual card */
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 15px;
            width: 200px;
            background: #fff;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h4 {
            margin: 0 0 10px;
            font-size: 18px;
            color: #333;
        }
        .card p {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
            color: #007BFF;
        }
    </style>
</head>
<body>

<h2>Product Categories</h2>

<!-- "All Products" link -->
<a class="header" href="?category=all">All Products</a>

<?php while($cat = $categories->fetch_assoc()): ?>
    <a class="header" href="?category=<?php echo urlencode($cat['product_id']); ?>">
        <?php echo $cat['product_id']; ?>
    </a>
<?php endwhile; ?>

<?php if ($products): ?>
    <h3>
        <?php 
            echo ($selectedCategory === "all") 
                ? "All Products" 
                : htmlspecialchars($selectedCategory) . " Products"; 
        ?>
    </h3>

    <div class="card-container">
        <?php while($prod = $products->fetch_assoc()): ?>
            <div class="card">
                <h4><?php echo htmlspecialchars($prod['product_name']); ?></h4>
                <p>₱<?php echo number_format($prod['price'], 2); ?></p>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

</body>
</html>
