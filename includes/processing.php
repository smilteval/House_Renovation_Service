<!-- processing the order and placing everything into database -->

<?php
session_start();
include "dbconnect.inc.php";

//go to login page if not logged in
if (!isset($_SESSION["username"])) {
    header("Location: ../pages/login.php");
} else {

    //prepare values for the query1
    $intver = (int)$_POST["totalrooms"]; //turn total room from a string to number
    $contractor_id = $_SESSION["contractor_id"];
    $customer_id = $_SESSION["userID"];
    $totalprice = $_POST["totalcost"];
    date_default_timezone_set('America/New_York'); //we need to set time zone in order to get correct time
    $order_date = date('Y-m-d'); //current date
    $project_duration = $intver;

    //insert order info into the order_info table
    $query = "INSERT INTO order_info (customer_id_fk, contractor_id_fk, total_price, order_date, project_duration)";
    $query .= "VALUES(?,?,?,?,?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("iissi", $customer_id, $contractor_id, $totalprice, $order_date, $project_duration);
    $stmt->execute();
    $result = $stmt->get_result();

    //prepare values for the query2
    $id = mysqli_insert_id($conn); //get the last inserted service id
    $service = $_SESSION["specialization"];
    $order_id_fk = $id;

    //insert service info into the service table
    $query2 = "INSERT INTO service(service_name, order_id_fk)";
    $query2 .= "VALUES(?,?)";

    $stmt = $conn->prepare($query2);
    $stmt->bind_param("si", $service, $id);
    $stmt->execute();
    $result = $stmt->get_result();

    //prepare values for the query3
    $id = mysqli_insert_id($conn); //gets the last inserted id (the service id)

    foreach ($_SESSION["room"] as $room) {

        //insert room into the room table
        $query3 = "INSERT INTO room (room_name, service_id_fk)";
        $query3 .= "VALUES(?,?)";

        $stmt = $conn->prepare($query3);
        $stmt->bind_param("si", $room, $id);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    //redirect to my orders page
    header("Location: ../pages/my_orders.php");
}
?>