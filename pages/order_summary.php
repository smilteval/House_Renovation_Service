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

        <br>
        <div class="row">

            <div class="col-md-5">

                <?php

                if (isset($_POST["submit"]) || $_SESSION["order saved"] === true) {
                    // var_dump($_POST["rooms"]);


                    $_SESSION["room"] = $_POST["rooms"]; //save the room into the session, this is saved as an array: Array { [0]=> "Bathroom" [1] => "Kitchen" }
                    echo "<b>User:</b> ";
                    if (empty($_SESSION["username"])) { //check if the user is logged in. If not, username would be empty
                        echo "<b>Not logged in, please log in!</b>";
                    } else { //if the user is logged in, display their username
                        echo $_SESSION["username"];
                    }
                    echo "<br>"; //username if logged in
                    echo "<b>Company:</b> " . $_SESSION["company_name"] . "<br>";
                    echo "<b>Company Cost:</b> $" . number_format($_SESSION["cost_for_hire"]) . "<br>";
                    echo "<b>Service:</b> " . $_SESSION["specialization"] . "<br>";
                    echo "<b>Room(s):</b><br> "; //.implode(", ", $_SESSION["room"])."<br>"; //implode function adds a space between each array
                    $totalcost = $_SESSION["cost_for_hire"];
                    $roomprice = 1000; //static value for now
                    foreach ($_SESSION["room"] as $room) { //printing out each room one by one
                        echo $room . "  $" . number_format($roomprice) . "<br>";
                        $totalcost += $roomprice;
                    }
                    echo "<b>Total Cost:</b> $" . number_format($totalcost); //total price includes company cost and room prices
                    var_dump($_SESSION);
                    // var_dump($_POST);


                }

                ?>
                <form action="processing.php" method="post">
                <?php echo "<input type='hidden' name='totalcost' value='$totalcost' > </input>"?>
                    <input type="submit" name="submit" class="btn btn-primary" id="login-button" value="Complete Order" />
                </form>
                <!-- <a href="processing.php" class="btn btn-primary" id="login-button">
                    Complete Order
                </a> -->

            </div>
        </div>
    </div>
</body>

</html>