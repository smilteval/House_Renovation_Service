<?php
    include "../navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Order</title>
</head>

<body>
    <h3>Create your order here</h3>
    <br>
    <h5>Which Rooms are you planning to renovate?</h5>
    <form method = "POST" action="/action_page.php">
        <input type="checkbox" id="kitchen" name="kitchen" value="kitchen">
        <label for="kitchen"> Kitchen</label><br>

        <input type="checkbox" id="bathroom" name="bathroom" value="bathroom">
        <label for="bathroom"> Bathroom</label><br>

        <input type="checkbox" id="living_room" name="living_room" value="living_room">
        <label for="living_room"> Living Room</label><br>

        <input type="checkbox" id="bedroom" name="bedroom" value="bedroom">
        <label for="bedroom"> Bedroom</label><br>

        <input type="checkbox" id="office" name="office" value="office">
        <label for="office"> Office</label><br>

        <a href="http://localhost/house_renovation_service/pages/service_selection.php" class="btn btn-primary"
            id="order-button">
            Continue to Services
        </a>
        <input type="submit">
    </form>
</body>

</html>