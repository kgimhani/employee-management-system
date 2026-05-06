<?php
include 'db.php'; // Include your database connection file


// Collect data from the form or any other source as needed
$orderID = $_GET["orderID"];

// Prepare the SQL statement to delete the order
$sql = "DELETE FROM `Order_tbl` WHERE OrderID = ?";

if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("s", $orderID);
  if ($stmt->execute()) {
    echo "Order deleted successfully. <a href='order.php'>Back</a>";
  } else {
    echo "Error deleting order: " . $stmt->error;
  }
  $stmt->close();
} else {
  echo "Error preparing statement: " . $conn->error;
}


$conn->close();
