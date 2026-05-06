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
  <h1 class="text-center text-capitalize mb-5">Home</h1>

  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="mb-3">Employees</h3>
        <div class="card mb-3">
          <ul class="list-group list-group-flush">

            <?php
            include 'db.php'; // Include your database connection file

            // Retrieve employee data from the Employee table
            $sql = "SELECT EmployeeID, Name FROM Employee";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $employeeID = $row["EmployeeID"];
                $employeeName = $row["Name"];
                echo "<li class='list-group-item'><a href='employee-details.php?employeeID=$employeeID'>$employeeName</a></li>";
              }
            } else {
              echo "<li>No employees found.</li>";
            }

            ?>
          </ul>
        </div>
        <h3 class="mb-3">Employees Work hours Order</h3>
        <div class="card mb-3">
        
          <ul class="list-group list-group-flush">
            <?php
            include 'db.php'; // Include your database connection file

            // Retrieve data from the employee_order table
            $sql = "SELECT * FROM employee_order";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<li class="list-group-item">';
                echo '<strong>Order ID:</strong> ' . $row["OrderID"] . '<br>';
                echo '<strong>Employee ID:</strong> ' . $row["EmployeeID"] . '<br>';
                echo '<strong>HoursSpent:</strong> ' . $row["HoursSpent"] . '<br>';

                // Add more order details as needed
                echo '</li>';
              }
            } else {
              echo '<li class="list-group-item">No orders found.</li>';
            }

            $conn->close();
            ?>
          </ul>
        </div>

        <h3 class="mb-3">Employees Work hours Projects</h3>
        <div class="card">
          <ul class="list-group list-group-flush">
            <?php
            include 'db.php'; // Include your database connection file

            // Retrieve data from the employee_order table
            $sql = "SELECT * FROM employee_project";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<li class="list-group-item">';
                echo '<strong>Order ID:</strong> ' . $row["ProjectID"] . '<br>';
                echo '<strong>Employee ID:</strong> ' . $row["EmployeeID"] . '<br>';
                echo '<strong>HoursSpent:</strong> ' . $row["HoursSpent"] . '<br>';

                // Add more order details as needed
                echo '</li>';
              }
            } else {
              echo '<li class="list-group-item">No orders found.</li>';
            }

            $conn->close();
            ?>
          </ul>
        </div>


      </div>



      <div class="col">
        <h3 class="mb-3">Working Hours Orders</h3>
        <form action="order-time.php" method="post">
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


              ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="orderID">Select Order:</label>
            <select class="form-control" id="orderID" name="orderID">
              <?php

              // Retrieve employee data from the Employee table
              $sql2 = "SELECT * FROM Order_tbl";
              $result2 = $conn->query($sql2);

              if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                  echo "<option value='" . $row2["OrderID"] . "'>" . $row2["ClientName"] . "</option>";
                }
              } else {
                echo "<option value=''>No Orders found</option>";
              }

              $conn->close();
              ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="workHours">Work Hours:</label>
            <input type="number" class="form-control" id="workHours" name="workHours" required>
          </div>
          <button type="submit" class="btn btn-success">Add Dependent</button>
        </form>



        <h3 class="mb-3 mt-5">Working Hours Projects</h3>
        <form action="project-time.php" method="post" class="mb-5">
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


              ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="projectID">Select Order:</label>
            <select class="form-control" id="projectID" name="projectID">
              <?php

              // Retrieve employee data from the Employee table
              $sql3 = "SELECT * FROM Project";
              $result3 = $conn->query($sql3);

              if ($result3->num_rows > 0) {
                while ($row3 = $result3->fetch_assoc()) {
                  echo "<option value='" . $row3["ProjectID"] . "'>" . $row3["ProjectName"] . "</option>";
                }
              } else {
                echo "<option value=''>No Projects found</option>";
              }

              $conn->close();
              ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="workHours">Work Hours:</label>
            <input type="number" class="form-control" id="workHours" name="workHours" required>
          </div>
          <button type="submit" class="btn btn-success">Add Dependent</button>
        </form>


      </div>
    </div>
  </div>
</body>

</html>