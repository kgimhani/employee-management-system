<?php
include 'db.php'; // Include your database connection file

// Get the dependent ID from the POST data
$dependentID = $_GET["dependentID"];

// Prepare the SQL statement to delete the dependent
$sql = "DELETE FROM Dependent WHERE DependentID = ?";

if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("i", $dependentID);
  if ($stmt->execute()) {
    echo "Dependent deleted successfully. <a href='dependent.php'>Back</a>";
  } else {
    echo "Error deleting dependent: " . $stmt->error;
  }
  $stmt->close();
} else {
  echo "Error preparing statement: " . $conn->error;
}


$conn->close();
