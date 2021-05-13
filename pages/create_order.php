<?php
session_start();
include "../navbar.php";
// include "../includes/dbconnect.inc.php";

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

        <?php 
            $query = "SELECT company_name, specialization FROM contractor WHERE contractor_id = ?"; //POST has the contractor id saved, let's get other info with it
            $theid = $_POST["id"];
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $theid);
            $stmt->execute();
            $result = $stmt->get_result();
            // var_dump($_POST); //POST has the contractor id
            $row = $result->fetch_assoc();
            // var_dump($row);
            $_SESSION["company_name"] = $row["company_name"]; //company name saved into session
            $_SESSION["specialization"] = $row["specialization"]; //company sepcialization saved into session
            var_dump($_SESSION);
        ?>

        <h3>Create your order here:</h3>
        <br>
        <h5>Which rooms do you plan to renovate with the <b><?php echo $row['specialization'];?></b> service?</h5> 

        <form action="order_summary.php" method="post"> <!-- service-per-room2.php -->
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

    </div>
</body>

</html>