<?php //processing the order and placing everything into database
session_start();
include "../navbar.php";

if(!isset($_SESSION["username"])) { //go to login page if not logged in
    header("Location: login.php");
}

// var_dump($_POST);
$_SESSION["totalcost"] = $_POST["totalcost"];
var_dump($_SESSION);

// $checkQ = "SELECT username FROM customer WHERE username = ?";

            // //use prepare statements for these vars
            // $stmt = $conn->prepare($checkQ);
            // $stmt->bind_param("s",$username);
            // $stmt->execute();

$query = "INSERT INTO order_info (customer_id_fk, contractor_id_fk, total_price, order_date)"; //insert into the order table
$query .= "VALUES(?,?,?,?)";

$contractor_id = $_SESSION["contractor_id"]; //contractor id
$customer_id = $_SESSION["userID"]; //userID is the customer id
$totalprice = $_SESSION["totalcost"]; //totalprice
$order_date = date('Y-m-d'); //current date

// var_dump($order_date);

$stmt = $conn->prepare($query);
$stmt->bind_param("iiss", $customer_id, $contractor_id, $totalprice, $order_date);
$stmt->execute();
$result = $stmt->get_result();

$id = mysqli_insert_id($conn); //gets the last inserted id
var_dump($id);

// var_dump($result);

$query2 = "INSERT INTO service(service_name, order_id_fk)"; //insert into the service table
$query2 .= "VALUES(?,?)";

$service = $_SESSION["specialization"]; //service name is from the contractors specializations
$order_id_fk = 1;


?>