<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $id = $_POST["id"];
    $ProjectName = $_POST["ProjectName"];

    // Prepare the SQL statement to insert the order data
    $sql = "INSERT INTO `Project` (ProjectID, ProjectName) VALUES (?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $id, $ProjectName);
        if ($stmt->execute()) {
            echo "Order added successfully. <a href='project.php'>Back</a>";
        } else {
            echo "Error adding order: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
