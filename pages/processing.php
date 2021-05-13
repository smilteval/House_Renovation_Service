<?php //processing the order and placing everything into database
session_start();
include "../navbar.php";

var_dump($_SESSION);



$query = "INSERT INTO order_info (customer_id_fk, contractor_id, order_date)";
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