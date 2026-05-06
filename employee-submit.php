<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $id = $_POST["id"];
    $name = $_POST["name"];
    $residence = $_POST["residence"];
    $salary = $_POST["salary"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $branchID = $_POST["branchID"];

    // Prepare the SQL statement to insert employee data
    $sqlEmployee = "INSERT INTO Employee (EmployeeID, Name, Residence, Salary, DateOfBirth, BranchID) VALUES (?,?, ?, ?, ?, ?)";

    if ($stmtEmployee = $conn->prepare($sqlEmployee)) {
        $stmtEmployee->bind_param("dssdss",$id, $name, $residence, $salary, $dateOfBirth, $branchID);
        if ($stmtEmployee->execute()) {
            echo "Employee data added successfully.<a href='employee.php'>Back</a>";
        } else {
            echo "Error inserting employee data: " . $stmtEmployee->error;
        }
        $stmtEmployee->close();
    } else {
        echo "Error preparing employee statement: " . $conn->error;
    }
}

$conn->close();
