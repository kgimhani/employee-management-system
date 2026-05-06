<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $employeeID = $_POST["employeeID"];
    $orderID = $_POST["orderID"];
    $HoursSpent = $_POST["workHours"];

    // Prepare the SQL statement to insert the order data
    $sql = "INSERT INTO `employee_order` (EmployeeID, OrderID, HoursSpent	) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssi", $employeeID, $orderID, $HoursSpent);
        if ($stmt->execute()) {
            echo "Order added successfully. <a href='index.php'>Back</a>";
        } else {
            echo "Error adding order: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();