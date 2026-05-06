<?php
include 'session.php'
?>

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
  <h1 class="text-center text-capitalize mb-5">Employee</h1>
  <!-- ========================================== -->
  <div class="container">
    <h3 class="text-center mb-4">Input Data</h3>
    <div class="row">
      <div class="col col-12 col-md-6 m-auto">
        <form action="employee-submit.php" method="post">
          <!-- Employee Name -->
          <div class="form-group mb-3">
            <label for="name">Employee ID:</label>
            <input type="text" class="form-control" id="id" name="id" required>
          </div>
          <div class="form-group mb-3">
            <label for="name">Employee Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <!-- Residence -->
          <div class="form-group mb-3">
            <label for="residence">Residence:</label>
            <input type="text" class="form-control" id="residence" name="residence" required>
          </div>
          <!-- Salary -->
          <div class="form-group mb-3">
            <label for="salary">Salary:</label>
            <input type="number" class="form-control" id="salary" name="salary" required>
          </div>
          <!-- Date of Birth -->
          <div class="form-group mb-3">
            <label for="dateOfBirth">Date of Birth:</label>
            <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
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


  <div class="container mt-5">
    <h3 class="text-center mb-4">All data</h3>
    <table class="table table-success table-striped table-hover">
      <thead>
        <tr>
          <th>Employee ID</th>
          <th>Employee Name</th>
          <th>Residence</th>
          <th>Salary</th>
          <th>Date of Birth</th>
          <th>Branch</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db.php'; // Include your database connection file

        // Retrieve employee data with branch names
        $sql = "SELECT Employee.EmployeeID, Employee.Name, Employee.Residence, Employee.Salary, Employee.DateOfBirth, Branch.BranchName 
                        FROM Employee
                        LEFT JOIN Branch ON Employee.BranchID = Branch.BranchID";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["EmployeeID"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["Residence"] . "</td>";
            echo "<td>" . $row["Salary"] . "</td>";
            echo "<td>" . $row["DateOfBirth"] . "</td>";
            echo "<td>" . $row["BranchName"] . "</td>";
            echo '<td><a href="employee-edit-form.php?employeeID=' . $row["EmployeeID"] . '&name=' . $row["Name"] . '&residence=' . $row["Residence"] . '&salary=' . $row["Salary"] . '&dateOfBirth=' . $row["DateOfBirth"] . '"><i class="bi bi-pencil-square"></i></a></td>';
            echo '<td><a href="employee-delete.php?employeeID=' . $row["EmployeeID"] . '"><i class="bi bi-trash3-fill"></i></a></td>';
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No employees found.</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>