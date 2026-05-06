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
  <h1 class="text-center text-capitalize mb-5">Order</h1>

  <!-- ========================================== -->
  <div class="container">
    <h3 class="text-center mb-4">Input Data</h3>
    <div class="row">
      <div class="col col-12 col-md-6 m-auto">
        <form action="order-submit.php" method="post">
          <div class="form-group mb-3">
            <label for="orderIdentifier">Order ID:</label>
            <input type="text" class="form-control" id="orderIdentifier" name="orderIdentifier" required>
          </div>
          <!-- Client Name -->
          <div class="form-group mb-3">
            <label for="clientName">Client Name:</label>
            <input type="text" class="form-control" id="clientName" name="clientName" required>
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
          <th>Order ID</th>
          <th>Client Name</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'db.php'; // Include your database connection file

        // Retrieve data from the Order table
        $sql = "SELECT OrderID, ClientName FROM `Order_tbl`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["OrderID"] . "</td>";
            echo "<td>" . $row["ClientName"] . "</td>";
            echo '<td><a href="order-delete.php?orderID='.$row["OrderID"] .'"><i class="bi bi-trash3-fill"></i></a></td>';
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='3'>No orders found.</td></tr>";
        }

        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>