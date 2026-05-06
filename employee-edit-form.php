<?php
include 'header.php';

$employeeID = $_GET["employeeID"];
$name = $_GET["name"];
$residence = $_GET["residence"];
$salary = $_GET["salary"];
$dateOfBirth = $_GET["dateOfBirth"];

?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
  <?php
  include 'nav.php';
  ?>
  <h1 class="text-center text-capitalize mb-5">Employee</h1>
  <!-- ========================================== -->
  <div class="container">
    <h3 class="text-center mb-4">Input Data</h3>
    <div class="row">
      <div class="col col-12 col-md-6 m-auto">
        <form action="employee-edit.php" method="post">
          <!-- Employee Name -->
          <div class="form-group mb-3">
            <label for="name">Employee ID:</label>
            <input value="<?php echo $employeeID?>" type="text" class="form-control" id="id" name="id" required>
          </div>
          <div class="form-group mb-3">
            <label for="name">Employee Name:</label>
            <input value="<?php echo $name?>" type="text" class="form-control" id="name" name="name" required>
          </div>
          <!-- Residence -->
          <div class="form-group mb-3">
            <label for="residence">Residence:</label>
            <input value="<?php echo $residence?>" type="text" class="form-control" id="residence" name="residence" required>
          </div>
          <!-- Salary -->
          <div class="form-group mb-3">
            <label for="salary">Salary:</label>
            <input value="<?php echo $salary?>" type="number" class="form-control" id="salary" name="salary" required>
          </div>
          <!-- Date of Birth -->
          <div class="form-group mb-3">
            <label for="dateOfBirth">Date of Birth:</label>
            <input value="<?php echo $dateOfBirth?>" type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
          </div>
          <!-- Branch Selection (Dynamic) -->
          <div class="form-group mb-3">
            <label for="branchID">Select Branch:</label>
            <select class="form-control" id="branchID" name="branchID">
              <?php
              include 'db.php'; // Include your database connection file

              // Retrieve branch data from the Branch table
              $sql = "SELECT BranchID, BranchName FROM Branch";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row["BranchID"] . "'>" . $row["BranchName"] . "</option>";
                }
              } else {
                echo "<option value=''>No branches found</option>";
              }

              $conn->close();
              ?>
            </select>
          </div>
          <!-- Submit Button -->
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>