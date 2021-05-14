<?php
include "includes/dbconnect.inc.php";
?>

<!doctype html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Our CSS -->

  <style>
    nav {
      font-family: Helvetica;
    }
  </style>

</head>

<body>
  <!-- Nav bar -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <!-- Dark theme -->
    <a class="navbar-brand" href="http://localhost/house_renovation_service/pages/homepage.php">House Renovation Service</a> <!-- Left most side of navbar -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">

        <!-- If user is logged in, show logout and my orders-->
        <?php if (isset($_SESSION["username"])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="../includes/logout-handle.inc.php" target="">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../pages/my_orders.php" target="">My Orders</a>
          </li>

          <!-- If user is not logged in, show login and signup -->
        <?php } else {  ?>
          <li class="nav-item">
            <a class="nav-link" href="signup.php" target="">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php" target="">Login</a>
          <?php } ?>
          </li>
      </ul>

    </div>
  </nav>

  <!-- Adding the script allowed the dropdown menu to work -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>