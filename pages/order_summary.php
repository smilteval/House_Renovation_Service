<?php
include "../navbar.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
</head>

<body>
    <h3>Your order summary:</h3>
    <a href="http://localhost/house_renovation_service/pages/homepage.php" class="btn btn-primary" id="order-button">
        Complete Order
    </a>

    <?php
    
    if(isSet($_POST["submit"])){

        $_SESSION[$_SESSION["room name"]] = $_POST["services"];

        var_dump($_SESSION);

    
    }

    ?>
</body>

</html>