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
        table {
            border-collapse: collapse;
            width: 60%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Product Categories</h2>

<!-- "All Products" link -->
<a class="header" href="?category=all">All Products</a> <!-- the ?category=all is just a queryy saying that our categoy are equal to "all" -->

<?php while($cat = $categories->fetch_assoc()): ?>
    <a class="header" href="?category=<?php echo urlencode($cat['product_id']); ?>">
        <?php echo $cat['product_id']; ?> <!-- displaying the product id -->
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
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price (₱)</th>
        </tr>
        <?php while($prod = $products->fetch_assoc()): ?>
            <tr>
                <td><?php echo $prod['product_name']; ?></td>
                <td><?php echo number_format($prod['price'], 2); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php endif; ?>

</body>
</html>
