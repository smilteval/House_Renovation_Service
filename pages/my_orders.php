<?php
session_start();
include "../navbar.php";

echo "<h1>Your orders: </h1>";

    //getting all the orders for logged in user

    $user_id = $_SESSION["userID"];

    $query = "SELECT * FROM order_info WHERE customer_id_fk = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $orders = $result->fetch_all(MYSQLI_ASSOC);

    if ($result->num_rows === 0){
        echo "nothing to show";
    } 
    else{
        echo "<table border=1>
        <tr>
            <th>ORDER_ID</th>
            <th>CONTRACTOR</th>
            <th>TOTAL PRICE</th>
            <th>ORDER DATE</th>
            <th>PROJECT DURATION (in weeks)</th>
        </tr>";

        $order_counter = 0;
        foreach ($orders as $order) {
            echo "<tr>";
            echo "<td>".$order["order_id"]."</td>";

            //getting contractor name from the contractor id

            $company_id = $order["contractor_id_fk"];

            $query2 = "SELECT * FROM contractor WHERE contractor_id = ?";

            $stmt = $conn->prepare($query2);
            $stmt->bind_param("i", $company_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $company_name = $result->fetch_assoc();

            echo "<td>".$company_name["company_name"]."</td>";
            echo "<td>".$order["total_price"]."</td>";
            echo "<td>".$order["order_date"]."</td>";
            echo "<td>".$order["project_duration"]."</td>";
            echo "</tr>";
        }  
        echo "</table>";
    }
