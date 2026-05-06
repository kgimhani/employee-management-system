<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
  <?php
  include 'nav.php';
  ?>
  <h1 class="text-center text-capitalize mb-5">Employee Details Page</h1>

  <div class="container mb-5">
    <div class="row">
      <div class="col-12 col-md-6 m-auto">
        <?php
        include 'db.php'; // Include your database connection file

        // Check if the "employeeID" query parameter is set
        if (isset($_GET["employeeID"])) {
          $employeeID = $_GET["employeeID"];

          // Retrieve employee details based on the employee ID
          $sql = "SELECT * FROM Employee WHERE EmployeeID = ?";
          if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $employeeID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
              $row = $result->fetch_assoc();
        ?>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $row["Name"]; ?></h4>
                  <p class="card-text">Employee ID: <?php echo $row["EmployeeID"]; ?></p>
                  <p class="card-text">Residence: <?php echo $row["Residence"]; ?></p>
                  <p class="card-text">Salary: <?php echo $row["Salary"]; ?></p>
                  <p class="card-text">Date of Birth: <?php echo $row["DateOfBirth"]; ?></p>
                  <!-- Add more employee details as needed -->
                </div>
              </div>
        <?php
            } else {
              echo "<div class='alert alert-danger'>Employee not found.</div>";
            }
            $stmt->close();
          } else {
            echo "<div class='alert alert-danger'>Error preparing statement: " . $conn->error . "</div>";
          }
        } else {
          echo "<div class='alert alert-warning'>Employee ID not provided.</div>";
        }

        ?>
      </div>
    </div>
  </div>



  <div class="container mb-5">
    <div class="row">
      <div class="col-12 col-md-6 m-auto">
        <?php

        // Retrieve employee details based on the employee ID
        $sql2 = "SELECT * FROM dependent WHERE EmployeeID = ?";

        if ($stmt2 = $conn->prepare($sql2)) {
          $stmt2->bind_param("i", $employeeID);
          $stmt2->execute();
          $result2 = $stmt2->get_result();

          if ($result2->num_rows == 1) {
            $row2 = $result2->fetch_assoc();
        ?>
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"><?php echo $row2["Name"]; ?></h4>
                <p class="card-text">Coverage: <?php echo $row2["Coverage"]; ?></p>
                <p class="card-text">Relationship: <?php echo $row2["Relationship"]; ?></p>
                <p class="card-text">Date of Birth: <?php echo $row2["DateOfBirth"]; ?></p>
              </div>
            </div>
        <?php
          } else {
            echo "<div class='alert alert-danger'>Dependent not found.</div>";
          }
          $stmt2->close();
        } else {
          echo "<div class='alert alert-danger'>Error preparing statement: " . $conn->error . "</div>";
        }

        $conn->close();
        ?>
      </div>
    </div>
  </div>



</body>

</html>