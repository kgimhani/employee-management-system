<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $branchName = $_POST["branchName"];
    $branchID = $_POST["branchID"];
    $phoneNumber = $_POST["phoneNumber"];

    // Prepare the SQL statement
    $sql = "UPDATE Branch SET PhoneNumber = ? WHERE BranchName = ? AND BranchID = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssi", $phoneNumber, $branchName, $branchID);
        if ($stmt->execute()) {
            echo "Branch data updated successfully.<a href='branch.php'>Back</a>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
