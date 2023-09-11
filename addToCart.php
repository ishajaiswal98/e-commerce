<?php
session_start();

if (isset($_POST['id'])) {
    $productId = $_POST['id'];

    // Add the product ID to the cart session
    $_SESSION['cart'][] = $productId;

    // Return a success message (or you can return cart data)
    echo json_encode(['status' => 'success', 'message' => 'Product added to cart.']);
} else {
    // Handle the case where 'id' is not set in the POST request
    echo json_encode(['status' => 'error', 'message' => 'Product ID not provided.']);
}
?>
