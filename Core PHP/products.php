<?php
    ob_start();

    // Including database connection
    include "database.php";

    // Query to get all products with quantities
    $sqlQuery = "SELECT * FROM products INNER JOIN quantities ON products.id = quantities.product_id ORDER BY products.id DESC";

    $allProducts = mysqli_query($connection, $sqlQuery);
?>
