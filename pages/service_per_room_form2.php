<?php

include "../includes/dbconnect.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style type="text/css">
        #room_service_form fieldset:not(:first-of-type) {
            display: none;
        }
    </style>
    <title> </title>
</head>

<body>
    <div class="container">
        <h1></h1>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <form id="room_service_form" novalidate action="order_summary.php" method="post">

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
                            echo "<fieldset>";
                            echo "<h2> Select Services for your <i>$room_name: </i></h2><br>";

                            include "service_selection.php";

                            echo "</fieldset>";

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

<!-- Handles the navigation between different steps of the form -->
<script type="text/javascript">
    $(document).ready(function() {
        var current = 1,
            current_step, next_step, steps;
        steps = $("fieldset").length;
        $(".next").click(function() {
            current_step = $(this).parent();
            next_step = $(this).parent().next();
            next_step.show();
            current_step.hide();
            setProgressBar(++current);
        });
        $(".previous").click(function() {
            current_step = $(this).parent();
            next_step = $(this).parent().prev();
            next_step.show();
            current_step.hide();
            setProgressBar(--current);
        });
        setProgressBar(current);

        // Change progress bar action
        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
                .html(percent + "%");
        }
    });
</script>