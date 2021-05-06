<?php
include "../navbar.php";
include "../includes/dbconnect.inc.php";
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
</head>

<body>
    <div class="container mt-5">

        <h3>Create your order here</h3>
        <br>
        <h5>Which Rooms are you planning to renovate?</h5>

        <form action="service_per_room_form.php" method="post">
            <label><input type="checkbox" name="rooms[]" value="Living Room"> Living room </label><br>
            <label><input type="checkbox" name="rooms[]" value="Bedroom"> Bedroom </label><br>
            <label><input type="checkbox" name="rooms[]" value="Dining Room"> Dining Room </label><br>
            <label><input type="checkbox" name="rooms[]" value="Kitchen"> Kitchen </label><br>
            <label><input type="checkbox" name="rooms[]" value="Bathroom"> Bathroom </label><br>
            <label><input type="checkbox" name="rooms[]" value="Office"> Office </label><br>
            <label><input type="checkbox" name="rooms[]" value="Basement"> Basement </label><br>
            <label><input type="checkbox" name="rooms[]" value="Nursery"> Nursery </label><br>
            <label><input type="checkbox" name="rooms[]" value="Gym"> Gym </label><br>
            <input type="submit" name="submit" value="Choose options" /><br>
            <br>
        </form>

        <?php
        // if (isset($_POST["submit"])) {

        //     //display service selection
        //     // $_POST["rooms"];
        //     // var_dump($_POST["rooms"][0]);

        //     if (!empty($_POST["rooms"])) {

        //         //store the room names into an array to use it later
        //         $_SESSION["rooms"] = $_POST["rooms"];

        //         // $_SESSION["rooms"] = array();
        //         // $_SESSION["rooms"]["Interior Design"];
        //         var_dump($_SESSION);

        //         //  MultiArray[room][service]
        //         // Add service for:     Bathroom
        //         //            Flooring, Wall Painting  
        //         // Add service for:     Office
        //         //            Flooring, Interior Design, Remodeling

        //         //Session[room][service]
        //         //$_SESSION[1][1] //for example kitchen / flooring
        //         //$_SESSION[1][2] //kitchen/painiting



        //         echo "<form action='order_summary.php' method='POST'>";

        //         foreach ($_POST["rooms"] as $checked) {

        //             echo "<h4>Please select services for your <i>" . $checked . "</i></h4>";
        //             include "service_selection.php";


        //         }
        //          echo "<input type='submit' name='submit' value='Choose options' /><br>";
        //         //checkout button
        //         echo "</form>";

        //     } else {
        //         echo "<div class='error'>Room is not selected!</div>";
        //     }
        // }


        ?>

    </div>
</body>

</html>

<?php
$query = "INSERT INTO order_info (customer_id, contractor_id, order_date)";
$query .= "VALUES(?,?,?)";

$contractor_id = $_POST["id"];
$customer_id = 1;
$order_date = date('m/d/Y');

$stmt = $conn->prepare($query);
$stmt->bind_param("iis", $customer_id, $contractor_id, $order_date);
$stmt->execute();
$result = $stmt->get_result();

var_dump($result);
?>