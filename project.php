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
  <h1 class="text-center text-capitalize mb-5">Project</h1>

  <!-- ========================================== -->
  <div class="container">
    <h3 class="text-center mb-4">Input Data</h3>
    <div class="row">
      <div class="col col-12 col-md-6 m-auto">
        <form action="project-submit.php" method="post">
          <div class="form-group mb-3">
            <label for="id">Project ID:</label>
            <input type="text" class="form-control" id="id" name="id" required>
          </div>
          <!-- Client Name -->
          <div class="form-group mb-3">
            <label for="ProjectName">Client Name:</label>
            <input type="text" class="form-control" id="ProjectName" name="ProjectName" required>
          </div>
          <!-- Add more order-related fields here as needed -->
          <!-- Submit Button -->
          <button type="submit" class="btn btn-success">Add Order</button>
        </form>
      </div>
    </div>
  </div>


  <div class="container mt-5">
    <h3 class="text-center mb-4">All data</h3>
    <table class="table table-success table-striped table-hover">
      <thead>
        <tr>
          <th>Project ID</th>
          <th>Project Name</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db.php'; // Include your database connection file

        // Retrieve data from the Project table
        $sql = "SELECT ProjectID, ProjectName FROM Project";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ProjectID"] . "</td>";
            echo "<td>" . $row["ProjectName"] . "</td>";
            echo '<td><a href="project-delete.php?projectID='.$row["ProjectID"] .'"><i class="bi bi-trash3-fill"></i></a></td>';
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='3'>No projects found.</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>