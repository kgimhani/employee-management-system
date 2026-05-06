<?php
include 'db.php'; // Include your database connection file


// Collect data from the form or any other source as needed
$ProjectID = $_GET["projectID"];

// Prepare the SQL statement to delete the order
$sql = "DELETE FROM `Project` WHERE ProjectID = ?";

if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("s", $ProjectID); 
  if ($stmt->execute()) {
    echo "Order deleted successfully. <a href='project.php'>Back</a>";
  } else {
    echo "Error deleting order: " . $stmt->error;
  }
  $stmt->close();
} else {
  echo "Error preparing statement: " . $conn->error;
}


$conn->close();
