<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $orderIdentifier = $_POST["orderIdentifier"];
    $clientName = $_POST["clientName"];

    // Prepare the SQL statement to insert the order data
    $sql = "INSERT INTO `Order_tbl` (OrderID, ClientName) VALUES (?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $orderIdentifier, $clientName);
        if ($stmt->execute()) {
            echo "Order added successfully. <a href='order.php'>Back</a>";
        } else {
            echo "Error adding order: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
