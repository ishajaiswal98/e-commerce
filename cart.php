<?php
session_start();

require_once('connection.php'); // Include your database connection code

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // Initialize variables to store total price
    $totalPrice = 0;

    // Start building the cart HTML
    echo '<h1>Shopping Cart</h1>';
    echo '<div class="container">';
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Product</th>';
    echo '<th>Price</th>';
    echo '<th>Quantity</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Loop through the product IDs in the cart
    foreach ($_SESSION['cart'] as $productId) {
        // Fetch product details from the database (replace 'products' with your table name)
        $query = "SELECT * FROM products WHERE id = $productId";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $productName = $row['name'];
            $productPrice = $row['price'];

            // Count how many times the product appears in the cart (quantity)
            $quantity = array_count_values($_SESSION['cart'])[$productId];

            // Calculate the total price for this product (price * quantity)
            $productTotal = $productPrice * $quantity;

            // Update the total price of all items in the cart
            $totalPrice += $productTotal;

            // Display the product in the cart
            echo '<tr>';
            echo '<td>' . $productName . '</td>';
            echo '<td>$' . $productPrice . '</td>';
            echo '<td>' . $quantity . '</td>';
            echo '<td><button class="btn btn-danger btn-remove-from-cart" data-id="' . $productId . '">Remove</button></td>';
            echo '</tr>';
        }
    }

    // Display the total price
    echo '<tr>';
    echo '<td colspan="3"><strong>Total</strong></td>';
    echo '<td>$' . $totalPrice . '</td>';
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo '<p>Your cart is empty.</p>';
}
?>
