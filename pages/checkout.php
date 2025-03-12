<?php
session_start();
include('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Insert the order into the orders table
    $user_id = $_SESSION['user_id'] ?? null;
    $total_price = 0;
    
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }

    $query = "INSERT INTO orders (user_id, total_price) VALUES ('$user_id', '$total_price')";
    mysqli_query($conn, $query);

    // Get the order ID
    $order_id = mysqli_insert_id($conn);

    // Insert order items into order_items table
    foreach ($_SESSION['cart'] as $item) {
        $query = "INSERT INTO order_items (order_id, food_item_id, quantity) VALUES ('$order_id', '{$item['id']}', '{$item['quantity']}')";
        mysqli_query($conn, $query);
    }

    // Clear the cart
    unset($_SESSION['cart']);

    echo "Order placed successfully!";
    exit();
}
?>

<!-- Checkout HTML code here... -->
