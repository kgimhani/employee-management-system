<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <style>
    body {
      background-image: linear-gradient(to top, #fad0c4 0%, #ffd1ff 100%);
      background-repeat: no-repeat;
      height: 100vh;
      display: grid;
      place-items: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col col-12 col-md-6 m-auto mt-5">
        <h2 class="text-center">Login Star Apparels</h2>
        <form method="post" action="login-process.php">
          <label for="username">Username:</label>
          <input class="mb-3 form-control" type="text" name="username" required>
          <label for="password">Password:</label>
          <input class="mb-3 form-control" type="password" name="password" required>
          <button class="mb-3 mx-auto d-block btn btn-success" type="submit" value="Login">Login</button>
        </form>

      </div>
    </div>
  </div>
</body>

</html>