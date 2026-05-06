<?php
session_start();

if (!isset($_SESSION["user_id"])) {
  header("Location: login.php"); // Redirect to login page if not logged in
  exit();
}

// You can now display content for logged-in users
?>