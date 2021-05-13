<?php
session_start();
include "../navbar.php";
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
    <br>

    <?php
    
    if(isSet($_POST["submit"])){
        // var_dump($_POST["rooms"]);


        $_SESSION["room"] = $_POST["rooms"]; //save the room into the session, this is saved as an array: Array { [0]=> "Bathroom" [1] => "Kitchen" }
        echo "Company: ".$_SESSION["company_name"]."<br>";
        echo "Service to be done: ".$_SESSION["specialization"]."<br>";
        echo "Room(s): ".implode(", ", $_SESSION["room"])."<br>"; //implode function adds a space between each array


        // var_dump($_SESSION);
        // var_dump($_POST);

    
    }

    ?>
</body>

</html>