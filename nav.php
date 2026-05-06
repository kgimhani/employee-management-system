<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<style>
  a{
    color: unset;
  }
  .navbar .navbar-nav .nav-link:hover{
    color: #00ee11 !important;
  }
</style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand text-uppercase fw-bold" href="#">Star Apparels</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="branch.php">Branch</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="employee.php">Employee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="order.php">Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="project.php">Project</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dependent.php">Dependent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>

</html>