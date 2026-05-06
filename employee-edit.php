<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $employeeID = $_POST["id"];
    $name = $_POST["name"];
    $residence = $_POST["residence"];
    $salary = $_POST["salary"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $branchID = $_POST["branchID"];

    // Prepare the SQL statement to update employee data
    $sql = "UPDATE Employee SET Name = ?, Residence = ?, Salary = ?, DateOfBirth = ?, BranchID = ? WHERE EmployeeID = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssdssi", $name, $residence, $salary, $dateOfBirth, $branchID, $employeeID);
        if ($stmt->execute()) {
            echo "Employee data updated successfully.<a href='employee.php'>Back</a>";
        } else {
            echo "Error updating employee data: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
