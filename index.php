<?php
require_once("classes/database.php");

$db = new Database();

// Get all categories
$categories = $db->getCategories();

// If category is selected
$selectedCategory = isset($_GET['category']) ? $_GET['category'] : null;
$products = $selectedCategory ? $db->getProductsByCategory($selectedCategory) : null;
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

<?php while($cat = $categories->fetch_assoc()): ?>
    <a class="header" href="?category=<?php echo urlencode($cat['product_id']); ?>">
        <?php echo $cat['product_id']; ?>
    </a>
<?php endwhile; ?>

<?php if ($products): ?>
    <h3><?php echo htmlspecialchars($selectedCategory); ?> Products</h3>
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
