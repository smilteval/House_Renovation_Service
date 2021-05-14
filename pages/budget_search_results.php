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

    <link href="../styling/general.css" rel="stylesheet" />

    <title>Budget Search Results</title>
</head>

<body>
    <div class="container mt-4 mb-4">
        <h3>Results for budget: <span><?php echo "$" . number_format($_POST["budget"]); ?> </span></h3>

        <!-- display contractor list -->
        <div class="row">
            <div class="col-md-12">

                <?php
                $budget = $_POST["budget"];

                //select contractors from db that are within the entered budget
                $query = "SELECT * FROM contractor WHERE cost_for_hire < ?";

                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $budget);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 0) {
                    exit('No Rows');
                }

                //traverse through all the selected contractors
                while ($row = $result->fetch_assoc()) {
                    
                    //show contractor info
                    echo "<hr>";
                    echo "<h3>" . $row['company_name'] . "</h3>";
                    echo "<p><b>Cost for Hire</b>: $" . number_format($row['cost_for_hire']) . "</br>"; //format price with commas
                    echo "<b>Specialization</b>: " . $row['specialization'] . "</br>";
                    echo "<b>Zip Code</b>: " . $row['zipcode'] . "</br>";
                    if (preg_match('/(\d{3})(\d{3})(\d{4})$/', $row['phone'],  $matches)) { //format phone number
                        $format = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
                    }
                    echo "<b>City</b>: " . $row["city"] . "<br>";
                    echo "<b>Phone</b>: " . $format . "</br>";
                    echo "<b>Email</b>: " . $row['email'] . "<br>";
                    echo "<b>Website</b>: <span>" . $row['website'] . "</span></p>";

                    //create an order with the selected contractor
                    echo "<form action= 'create_order.php' method='POST'> ";
                    echo "<button type='submit' class='btn' name='id' value='" . $row['contractor_id'] . "'>Create an Order</button>";
                    echo "</form>";
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>