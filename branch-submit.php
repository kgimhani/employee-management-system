<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $branchName = $_POST["branchName"];
    $branchID = $_POST["branchID"];
    $phoneNumber = $_POST["phoneNumber"];

    // Prepare the SQL statement
    $sql = "INSERT INTO branch (BranchName, BranchID, PhoneNumber) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sis", $branchName, $branchID, $phoneNumber);
        if ($stmt->execute()) {
            echo "Branch data added successfully. <a href='branch.php'>Back</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
