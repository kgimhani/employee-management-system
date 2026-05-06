<?php
// Collect data from the form
$branchName = $_GET["branchName"];
$branchID = $_GET["branchID"];
$phoneNumber = $_GET["phoneNumber"];
include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
 
  <h1 class="text-center text-capitalize mb-5">Branches</h1>

  <!-- ========================================== -->
  <div class="container">
    <h3 class="text-center mb-4">Input Data</h3>
    <div class="row">
      <div class="col col-12 col-md-6 m-auto">
        <form action="branch-edit.php" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">ID</span>
            <input value="<?php echo $branchID;?>" name="branchID" type="number" class="form-control" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input value="<?php echo $branchName;?>" name="branchName" type="text" class="form-control" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Phone Number</span>
            <input value="<?php echo $phoneNumber;?>" name="phoneNumber" type="number" class="form-control" aria-describedby="basic-addon1" required>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>

</body>

</html>