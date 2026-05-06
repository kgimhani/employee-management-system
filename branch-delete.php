<?php
include 'db.php'; // Include your database connection file


// Collect data from the form
$branchName = $_GET["branchName"];
$branchID = $_GET["branchID"];

// Prepare the SQL statement
$sql = "DELETE FROM Branch WHERE BranchName = ? AND BranchID = ?";

if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("si", $branchName, $branchID);
  if ($stmt->execute()) {
    echo "Branch data deleted successfully.<a href='branch.php'>Back</a>";
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
} else {
  echo "Error: " . $conn->error;
}


$conn->close();
