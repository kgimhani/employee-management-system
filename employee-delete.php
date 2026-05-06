<?php
include 'db.php'; // Include your database connection file


// Collect data from the form
$employeeID = $_GET["employeeID"];

// Prepare the SQL statement to delete employee data
$sql = "DELETE FROM Employee WHERE EmployeeID = ?";

if ($stmt = $conn->prepare($sql)) {
  $stmt->bind_param("i", $employeeID);
  if ($stmt->execute()) {
    echo "Employee data deleted successfully.<a href='employee.php'>Back</a>";
  } else {
    echo "Error deleting employee data: " . $stmt->error;
  }
  $stmt->close();
} else {
  echo "Error preparing statement: " . $conn->error;
}


$conn->close();
