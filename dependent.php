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
        <form action="dependent-submit.php" method="post">
          <!-- Employee Selection (Dynamic) -->
          <div class="form-group mb-3">
            <label for="employeeID">Select Employee:</label>
            <select class="form-control" id="employeeID" name="employeeID">
              <?php
              include 'db.php'; // Include your database connection file

              // Retrieve employee data from the Employee table
              $sql = "SELECT EmployeeID, Name FROM Employee";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row["EmployeeID"] . "'>" . $row["Name"] . "</option>";
                }
              } else {
                echo "<option value=''>No employees found</option>";
              }

              $conn->close();
              ?>
            </select>
          </div>
          <!-- Dependent ID -->
          <div class="form-group mb-3">
            <label for="dependentID">Dependent ID:</label>
            <input type="number" class="form-control" id="dependentID" name="dependentID" required>
          </div>
          <!-- Dependent Name -->
          <div class="form-group mb-3">
            <label for="dependentName">Dependent Name:</label>
            <input type="text" class="form-control" id="dependentName" name="dependentName" required>
          </div>
          <!-- Dependent Date of Birth -->
          <div class="form-group mb-3">
            <label for="dependentDOB">Dependent Date of Birth:</label>
            <input type="date" class="form-control" id="dependentDOB" name="dependentDOB" required>
          </div>
          <!-- Relationship -->
          <div class="form-group mb-3">
            <label for="relationship">Relationship:</label>
            <input type="text" class="form-control" id="relationship" name="relationship" required>
          </div>
          <div class="form-group mb-3">
            <label for="coverage">Coverage:</label>
            <input type="number" class="form-control" id="coverage" name="coverage" required>
          </div>
          <!-- Submit Button -->
          <button type="submit" class="btn btn-success">Add Dependent</button>
        </form>
      </div>
    </div>
  </div>


  <div class="container mt-5">
    <h3 class="text-center mb-4">All data</h3>
    <table class="table table-success table-striped table-hover">
      <thead>
        <tr>
          <th>Dependent ID</th>
          <th>Employee Name</th>
          <th>Dependent Name</th>
          <th>Date of Birth</th>
          <th>Relationship</th>
          <th>Coverage</th>
          <th>Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db.php'; // Include your database connection file

        // Retrieve data from the Dependent and Employee tables
        $sql = "SELECT Dependent.DependentID, Employee.Name AS EmployeeName, Dependent.Name AS DependentName, 
                        Dependent.DateOfBirth, Dependent.Relationship, Dependent.Coverage  
                        FROM Dependent
                        INNER JOIN Employee ON Dependent.EmployeeID = Employee.EmployeeID";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["DependentID"] . "</td>";
            echo "<td>" . $row["EmployeeName"] . "</td>";
            echo "<td>" . $row["DependentName"] . "</td>";
            echo "<td>" . $row["DateOfBirth"] . "</td>";
            echo "<td>" . $row["Relationship"] . "</td>";
            echo "<td>" . $row["Coverage"] . "</td>";
            echo '<td><a href="dependent-delete.php?dependentID='.$row["DependentID"] .'"><i class="bi bi-trash3-fill"></i></a></td>';
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No dependents found.</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>