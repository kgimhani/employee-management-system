<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $employeeID = $_POST["employeeID"];
    $dependentID = $_POST["dependentID"];
    $dependentName = $_POST["dependentName"];
    $dependentDOB = $_POST["dependentDOB"];
    $relationship = $_POST["relationship"];
    $coverage = $_POST["coverage"];

    // Prepare the SQL statement to insert the dependent data
    $sql = "INSERT INTO Dependent (EmployeeID, DependentID, Name, DateOfBirth, Relationship, Coverage) VALUES (?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("issssi", $employeeID, $dependentID, $dependentName, $dependentDOB, $relationship, $coverage);
        if ($stmt->execute()) {
            echo "Dependent added successfully. <a href='dependent.php'>Back</a>";
        } else {
            echo "Error adding dependent: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
