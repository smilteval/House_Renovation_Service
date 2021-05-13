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
    <title>Order Summary</title>
</head>

<body>
    <div class="container">
        <h3>Your order summary:</h3>
        <a href="http://localhost/house_renovation_service/pages/homepage.php" class="btn btn-primary" id="order-button">
            Complete Order
        </a>
        <br>
        <div class="row">
                
            <div class="col-md-5">

                <?php
                
                if(isSet($_POST["submit"])){
                    // var_dump($_POST["rooms"]);


                    $_SESSION["room"] = $_POST["rooms"]; //save the room into the session, this is saved as an array: Array { [0]=> "Bathroom" [1] => "Kitchen" }
                    echo "<b>User:</b> ";
                    if (empty($_SESSION["username"])){ //check if the user is logged in. If not, username would be empty
                        echo "<b>Not logged in, please log in!</b>";
                    } else { //if the user is logged in, display their username
                        echo $_SESSION["username"];
                    }
                    echo "<br>"; //username if logged in
                    echo "<b>Company:</b> ".$_SESSION["company_name"]."<br>";
                    echo "<b>Service:</b> ".$_SESSION["specialization"]."<br>";
                    echo "<b>Room(s):</b><br> "; //.implode(", ", $_SESSION["room"])."<br>"; //implode function adds a space between each array
                    foreach($_SESSION["room"] as $room){ //printing out each room one by one
                        echo $room."<br>";

                    }

                    var_dump($_SESSION);
                    // var_dump($_POST);

                
                }

                ?>
            </div>
        </div>
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