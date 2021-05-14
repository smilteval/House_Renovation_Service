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

    <title>Create Order</title>
</head>

<body>
    <div class="container mt-4">

        <?php
        $contractorId = $_POST["id"];

        //get all info about the selected contractor from db
        $query = "SELECT contractor_id, company_name, specialization, cost_for_hire FROM contractor WHERE contractor_id = ?"; //POST has the contractor id saved, let's get other info with it

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $contractorId);
        $stmt->execute();
        $result = $stmt->get_result();
        $contractor = $result->fetch_assoc();

        //save all that info into session
        $_SESSION["company_name"] = $contractor["company_name"];
        $_SESSION["specialization"] = $contractor["specialization"];
        $_SESSION["cost_for_hire"] = $contractor["cost_for_hire"];
        $_SESSION["contractor_id"] = $contractor["contractor_id"];
        ?>

        <h3 class = "mb-4">Create your order here:</h3>
        <h5 class = "mb-4">Which rooms do you plan to renovate with the <span><?php echo $contractor['specialization']; ?></span> service provided by <span><?php echo $contractor["company_name"]?></span>?</h5>

        <!-- select rooms for the service -->
        <form action="order_summary.php" method="POST">
            <label><input type="checkbox" name="rooms[]" value="Living Room"> Living room </label><br>
            <label><input type="checkbox" name="rooms[]" value="Bedroom"> Bedroom </label><br>
            <label><input type="checkbox" name="rooms[]" value="Dining Room"> Dining Room </label><br>
            <label><input type="checkbox" name="rooms[]" value="Kitchen"> Kitchen </label><br>
            <label><input type="checkbox" name="rooms[]" value="Bathroom"> Bathroom </label><br>
            <label><input type="checkbox" name="rooms[]" value="Office"> Office </label><br>
            <label><input type="checkbox" name="rooms[]" value="Basement"> Basement </label><br>
            <label><input type="checkbox" name="rooms[]" value="Nursery"> Nursery </label><br>
            <label><input type="checkbox" name="rooms[]" value="Gym"> Gym </label><br>
            <br>
            <input type="submit" class="btn" name="submit" value="Choose options" /><br>
        </form>

    </div>
</body>

</html>