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
  <h1 class="text-center text-capitalize mb-5">Branches</h1>

  <!-- ========================================== -->
  <div class="container">
    <h3 class="text-center mb-4">Input Data</h3>
    <div class="row">
      <div class="col col-12 col-md-6 m-auto">
        <form action="branch-submit.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">ID</span>
            <input name="branchID" type="number" class="form-control" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input name="branchName" type="text" class="form-control" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Phone Number</span>
            <input name="phoneNumber" type="number" class="form-control" aria-describedby="basic-addon1" required>
          </div>
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
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include 'db.php'; // Include your database connection file

        // Select all records from the Branch table
        $sql = "SELECT * FROM Branch";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["BranchID"] . "</td>";
            echo "<td>" . $row["BranchName"] . "</td>";
            echo "<td>" . $row["PhoneNumber"] . "</td>";
            echo '<td><a href="branch-edit-form.php?branchID='.$row["BranchID"] .'&branchName='.$row["BranchName"].'&phoneNumber='.$row["PhoneNumber"].'"><i class="bi bi-pencil-square"></i></a></td>';
            echo '<td><a href="branch-delete.php?branchID='.$row["BranchID"] .'&branchName='.$row["BranchName"].'"><i class="bi bi-trash3-fill"></i></a></td>';
            echo "</tr>";
          }
        } else {
          echo "No branches found.";
        }

        $conn->close();
        ?>

      </tbody>
    </table>
  </div>

</body>

</html>