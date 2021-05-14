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

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- Font Awesome Icons -->

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Our CSS -->

    <link rel="stylesheet" href="../styling/general.css" />

    <title>Order Summary</title>
</head>

<body>
    <div class="container mt-4 mb-4">
        <h3>Your order summary:</h3>

        <div class="row">

            <div class="col-md-12">

                <?php
                if(isset($_SESSION["submit"])){
                    $_POST["submit"] = $_SESSION["submit"];
                }

                if (isset($_POST["submit"])) {

                    //save selected rooms in the session
                    $_SESSION["room"] = $_POST["rooms"];

                    //if the user is not logged in, display a warning message
                    if (empty($_SESSION["username"])) {
                        $error_msg = "Warning: the order will not be saved since you are browsing as a guest. To complete the order, please log in.<b>";
                    }
                    //if the user is logged in, display their username 
                    else {
                        echo "<br><b>User: </b> " . $_SESSION["username"] . "<br>";
                    }

                    //display other order info
                    echo "<b>Company:</b> " . $_SESSION["company_name"] . "<br>";
                    echo "<b>Company Cost:</b> $" . number_format($_SESSION["cost_for_hire"]) . "<br>";
                    echo "<b>Service:</b> " . $_SESSION["specialization"] . "<br>";
                    echo "<b>Room(s):</b><br> ";

                    $totalcost = $_SESSION["cost_for_hire"];
                    $roomprice = 1000;
                    $totalrooms = 0;

                    //print out each room one by one
                    foreach ($_SESSION["room"] as $room) {

                        //calculate the total price "cost for hire + price for every room"
                        echo $room . "  $" . number_format($roomprice) . "<br>";
                        $totalcost += $roomprice;
                        $totalrooms += 1;
                    }

                    echo "<br><b>Total Cost:</b> $" . number_format($totalcost)."<br><br>";
                }

                ?>

                <!-- process order data and send it to db -->
                <form action="../includes/processing.php" method="POST">
                    <?php
                    echo "<input type='hidden' name='totalcost' value='$totalcost' >";
                    echo "<input type='hidden' name='totalrooms' value='$totalrooms' >";
                    ?>
                    <input type="submit" name="submit" class="btn" id="login-button" value="Complete Order" />
                </form>

            </div>
        </div>
    </div>
</body>

</html>