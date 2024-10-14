<?php
require 'connect.php';

if (isset($_GET['id'])) {
    $orderId = $_GET['id'];

    // Update the order status to "Approved"
    $sql = "UPDATE orders SET status = 'Approved' WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $orderId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to approve order']);
    }

    $stmt->close();
}

$conn->close();
?>
