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
    <title>My Orders</title>
</head>

<body>

    <h3>Your Orders: </h3>

    <?php

    //getting all the orders for the logged in user

    $user_id = $_SESSION["userID"];

    $query = "SELECT * FROM order_info WHERE customer_id_fk = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = $result->fetch_all(MYSQLI_ASSOC);

    if ($result->num_rows === 0) {
        echo "nothing to show";
    } else {
        echo "<table>
        <tr>
            <th>ORDER_ID</th>
            <th>CONTRACTOR</th>
            <th>SERVICE</th>
            <th>TOTAL PRICE</th>
            <th>ORDER DATE</th>
            <th>DURATION (in weeks)</th>
            <th>ROOMS SELECTED</th>
        </tr>";

        $order_counter = 0;
        foreach ($orders as $order) {
            echo "<tr>";

            $order_id = $order["order_id"];

            echo "<td>" . $order_id . "</td>";

            //getting contractor name from the contractor id

            $company_id = $order["contractor_id_fk"];

            $query2 = "SELECT * FROM contractor WHERE contractor_id = ?";

            $stmt = $conn->prepare($query2);
            $stmt->bind_param("i", $company_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $company = $result->fetch_assoc();

            echo "<td>" . $company["company_name"] . "</td>";
            echo "<td>" . $company["specialization"], "</td>";
            echo "<td>$" . number_format($order["total_price"]) . "</td>";
            echo "<td>" . $order["order_date"] . "</td>";
            echo "<td>" . $order["project_duration"] . "</td>";

            //get all the rooms for that order
            echo "<td>";

            //get service 
            $query = "SELECT service_id FROM service WHERE order_id_fk = ?";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $order_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $service_id = $result->fetch_assoc(); 

            //var_dump($service_id);

            //get all rooms for that service
            $query2 = "SELECT room_name FROM room WHERE service_id_fk = ?";

            $stmt2 = $conn->prepare($query2);
            $stmt2->bind_param("i", $service_id["service_id"]);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            //var_dump($result2);

            $rooms = $result2->fetch_all(MYSQLI_ASSOC);

            //var_dump($rooms);

            if ($result2->num_rows === 0) {
                echo "nothing to show";
            }
            else{
                $index = 0;
                foreach($rooms as $room){
                    
                    echo $room["room_name"];
                    if ($index !== count($rooms)-1){
                        echo ", ";
                    }
                    $index++;
                } 
            }

            echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>

</html>