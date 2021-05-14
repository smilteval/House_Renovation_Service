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
    <title>Order</title>
</head>
<body>
<?php


if(isset($_POST["submit"])){
    $order_id = $_POST["orderID"];

    $query = "SELECT service_id FROM service WHERE order_id_fk = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $service_id = $result->fetch_assoc(); //service id from the order
    

    $query2 = "SELECT room_name FROM room WHERE service_id_fk = ?";

    $stmt = $conn->prepare($query2);
    $stmt->bind_param("i", $service_id);
    $stmt->execute();
    $result2 = $stmt->get_result();

    
    if ($result->num_rows === 0) {
        echo "nothing to show";
    } else {
        
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
    
            //redirect user
            echo "<form action = 'order_info.php' method='POST' >";
            echo "<input type='hidden' name='orderID' value='$order_id' >";
            echo "<td><input type='submit' name='submit' value='View'></td>";
            echo "<form>";
    
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>

</body>
</html>