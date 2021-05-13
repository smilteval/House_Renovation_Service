<?php //processing the order and placing everything into database
session_start();
include "../navbar.php";

if(!isset($_SESSION["username"])) { //go to login page if not logged in
    header("Location: login.php");
}

// var_dump($_POST);
$_SESSION["totalcost"] = $_POST["totalcost"]; //we get the total cost from POST, put it into session
$intver = (int)$_POST["totalrooms"]; //turns total room from a string to number
$_SESSION["totalroom"] = $intver; //number of total rooms in session
var_dump($_SESSION);

if (!isset ($_SESSION["username"])){
    header ("Location: login.php");
} 

$query = "INSERT INTO order_info (customer_id_fk, contractor_id_fk, total_price, order_date, project_duration)"; //insert into the order table
$query .= "VALUES(?,?,?,?,?)";

$contractor_id = $_SESSION["contractor_id"]; //contractor id
$customer_id = $_SESSION["userID"]; //userID is the customer id
$totalprice = $_SESSION["totalcost"]; //totalprice
$order_date = date('Y-m-d'); //current date
$project_duration = $_SESSION["totalroom"];

// var_dump($order_date);

$stmt = $conn->prepare($query);
$stmt->bind_param("iissi", $customer_id, $contractor_id, $totalprice, $order_date, $project_duration);
$stmt->execute();
$result = $stmt->get_result();

$id = mysqli_insert_id($conn); //gets the last inserted id (the service id)
var_dump($id);

// var_dump($result);

$query2 = "INSERT INTO service(service_name, order_id_fk)"; //insert into the service table
$query2 .= "VALUES(?,?)";

$service = $_SESSION["specialization"]; //service name is from the contractors specializations
$order_id_fk = $id; //order id is from the $id variable to gather the last inserted id

$stmt = $conn->prepare($query2);
$stmt->bind_param("si", $service, $id);
$stmt->execute();
$result = $stmt->get_result();

$id = mysqli_insert_id($conn); //gets the last inserted id (the service id)

foreach ($_SESSION["room"] as $room) { //printing out each room one by one
    echo $room;

    $query3 = "INSERT INTO room (room_name, service_id_fk)"; //put all the info into the room table
    $query3 .= "VALUES(?,?)";

    $stmt = $conn->prepare($query3);
    $stmt->bind_param("si", $room, $id);
    $stmt->execute();
    $result = $stmt->get_result();

}


?>