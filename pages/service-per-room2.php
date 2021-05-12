<?php

include "../includes/dbconnect.inc.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    <title> </title>
</head>

<body>
    <div class="container">
        

        <form id="room_service_form" novalidate method="post">

            <?php

            //assume that none of the rooms are selected in this form

            $room_selection = array(
                "Living Room",
                "Bedroom",
                "Dining Room",
                "Kitchen",
                "Bathroom",
                "Office",
                "Basement",
                "Nursery",
                "Gym"
            );

            //count the number of rooms selected from the previous form

            $selected_room_count = count($_POST["rooms"]);

            //count the number of rooms with services already selected

            $current_room_count = 0;


            if (isset($_POST["submit"])) {

                //check which rooms were selected in the previous form, assign "true" to those rooms in this form

                foreach ($room_selection as $room_name) {
                    foreach ($_POST["rooms"] as $room) {
                        if ($room === $room_name) {

                            echo "<h2> Select Services for your <i>$room_name: </i></h2><br>";
                            echo '<form method="POST" id="form"';

                            include "service_selection.php";

                            //$_SESSION[$room_name] = $_POST["services"];
                            
                            echo "<input type='submit' name='submit service' value='Submit'/>";
                            echo "</form>";

                            $current_room_count++;
                        }
                    }
                }
            }
            ?>

        </form>
    </div>
</body>

</html>

