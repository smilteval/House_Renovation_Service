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
    if (isset($_POST["submit"])) {

        //display service selection

        if (!empty($_POST["services"])) {

            foreach ($_POST["services"] as $checked) {
                echo $checked;
            }

            foreach ($_SESSION["rooms"] as $rooms) {
                echo $rooms;
            }
        }

        //ending the session 

        echo "<br>";
        var_dump($_SESSION['rooms']);
        echo "<br>";
        var_dump($_POST['services']);


        $_SESSION = [];
        session_destroy();
    }

    //room_info table

    //bedroom 
    //dining room
    //kitchen
    //bathroom




    ?>
</body>

</html>