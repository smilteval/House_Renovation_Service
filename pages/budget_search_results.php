<?php
include "../navbar.php";
include_once "../includes/dbconnect.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Search Results</title>
</head>

<body>
    <div class="container">
        <h3>Results for budget: <?php echo "$" . $_POST["budget"]; ?> </h3>
        <br>
        <br>
        <br>

        <!-- Contractor -->
        <div class="row">

            <div class="col-md-5">

                <?php //displaying contractor based on budget
                $query = "SELECT * FROM contractor WHERE cost_for_hire < ?"; //users budget should be hire than contractor cost for hire
                $budget = $_POST["budget"];
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $budget);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows === 0) exit('No Rows'); //exit if empty
                //TODO: Change fetch_assoc to fetch_all 
                while ($row = $result->fetch_assoc()) { //Unsure if fetch_all would be better
                    //var_dump($row); //array(1) { [0]=> array(1) { [0]=> string(14) "Your Home Inc." } }
                    echo "<h3>" . $row['company_name'] . "</h3>"; //print out name of company, works for assoc
                    echo " <p> <b>Cost for Hire</b>: $".$row['cost_for_hire']."</br>";
                    echo " <b>Specialization</b>: ".$row['specialization']."</br>";
                    echo " <b>Zip Code</b>: ".$row['zipcode']."</br>";
                    echo " <b>Phone</b>: ".$row['phone']."</br>";
                    echo " <b>Email</b>: ".$row['email']."<br>";
                    echo " <b>Specialization</b>: ".$row['website']."</p>";
                    //var_dump($row);
                    echo "<form action= 'create_order.php' method='POST'> ";
                    echo "<button type='submit' class='btn search-icon' name='id' value='" . $row['contractor_id'] . "'>Create an Order</button>";
                    echo "</form>";
                    echo "<hr>"; //unsure if hr break looks better or just a br
                } //all of the names would be stored inside row

                ?>
                

            </div>
        </div>
        <hr>
    </div>
</body>

</html>