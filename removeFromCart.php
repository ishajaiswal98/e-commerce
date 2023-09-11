<?php
session_start();

if (isset($_POST['id'])) {
    $productId = $_POST['id'];

    if (isset($_SESSION['cart'])) {
        $index = array_search($productId, $_SESSION['cart']);
        if ($index !== false) {
            array_splice($_SESSION['cart'], $index, 1);
            echo json_encode(['status' => 'success', 'message' => 'Product removed from cart.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Product not found in cart.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Cart is empty.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Product ID not provided.']);
}
?>
