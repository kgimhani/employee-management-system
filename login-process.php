<?php
session_start();

include("db.php");
// Include the database connection file


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Perform database query to check credentials
  // Replace this with your actual database query
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
  $stmt->bind_param("ss", $username, $password);
  $stmt->execute();
  $result = $stmt->get_result();
  $user_row = $result->fetch_assoc();
  $stmt->close();
  // Execute the query and fetch the user row

  if ($user_row) {
    $_SESSION["user_id"] = $user_row["id"];
    $_SESSION["username"] = $user_row["username"];
    header("Location: index.php"); // Redirect to the inner page
    exit();
  } else {
    echo "Invalid username or password";
  }
}
