<?php
include "../navbar.php";
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

        <form action="" method="post">
            <label>
                <input type="checkbox" name="rooms[]" value="Living room">
                Living room
            </label>
            <br>
            <label>
                <input type="checkbox" name="rooms[]" value="Bedroom">
                Bedroom
            </label>
            <br>
            <label>
                <input type="checkbox" name="rooms[]" value="Dining Room">
                Dining Room
            </label>
            <br>
            <label>
                <input type="checkbox" name="rooms[]" value="Kitchen">
                Kitchen
            </label>
            <br>
            <label>
                <input type="checkbox" name="rooms[]" value="Bathroom">
                Bathroom
            </label>
            <br>
            <label>
                <input type="checkbox" name="rooms[]" value="Office">
                Office
            </label>
            <br>
            <label>
                <input type="checkbox" name="rooms[]" value="Basement">
                Basement
            </label>
            <br>
            <label>
                <input type="checkbox" name="rooms[]" value="Nursery">
                Nursery
            </label>
            <br>
            <label>
                <input type="checkbox" name="rooms[]" value="Gym">
                Gym
            </label>
            <br>
            <input type="submit" name="submit" value="Choose options" />
            <br>
            <br>
        </form>

        <?php
        if (isset($_POST["submit"])) {

            //display service selection
            if (!empty($_POST["rooms"])) {
                foreach ($_POST["rooms"] as $checked) {
                    echo "<h4>Please select services for your <i>" . $checked . "</i></h4>";
                    include "service_selection.php";
                }

                // //send selections to the db
                // $room = $_POST["rooms"];
                // $room_query= "INSERT INTO room_info (room_name, room_cost)";


                // $stmt = $conn->prepare($room_query);
                // $stmt->bind_param("s", $room);
                // $stmt->execute();
                // $result = $stmt->get_result();

                // if ($result->num_rows === 0) {
                //     exit(0);
                // }

                // $partInfo = $result3->fetch_all(MYSQLI_ASSOC);

                // echo "<table border=1>
                //         <tr>
                //             <th>PART_NUM</th>
                //             <th>DESCRIPTION</th>
                //             <th>ON_HAND</th>
                //             <th>CLASS</th>
                //             <th>WAREHOUSE</th>
                //             <th>PRICE</th>
                //         </tr>";

                // foreach ($partInfo as $info) {
                //     echo "<tr>";
                //     foreach ($info as $key => $value) {
                //         echo "<td>" . $value . "</td>";
                //     }
                //     echo "</tr>";
                // }

                // echo "</table>";


            } else {
                echo "<div class='error'>Room is not selected!</div>";
            }
            //checkout button
            echo "<a href='http://localhost/house_renovation_service/pages/order_summary.php' class='btn btn-primary' id='order-button'> Checkout </a>";
        }
        ?>

    </div>
</body>

</html>