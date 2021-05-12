<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Selection</title>
</head>

<body>
    <input type="checkbox" id="flooring" name="services[]" value="Flooring">
    <label for="flooring"> Flooring</label><br>

    <input type="checkbox" id="wall_painting" name="services[]" value="Wall Painting">
    <label for="wall_painting"> Wall Painting</label><br>

    <input type="checkbox" id="remodeling" name="services[]" value="Remodeling">
    <label for="remodeling"> Remodeling</label><br>

    <input type="checkbox" id="renovating" name="services[]" value="Renovating">
    <label for="renovating"> Renovating</label><br>

    <input type="checkbox" id="interior_design" name="services[]" value="Interior Design">
    <label for="interior_design"> Interior Design</label><br>
    
    <!-- Buttons -->
    
    <?php

    //if it's the first and the last room selection, show only the checkout button
    if ($current_room_count === 0 && $current_room_count === $selected_room_count - 1) {
        echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
    }

    //if it's the first but not the last room selection, show only next button
    else if ($current_room_count === 0) {
        echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
    }

    //if it's the last room selection, show checkout button
    else if ($current_room_count === $selected_room_count - 1) {
        echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
        echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
    }

    //if it's not last nor first room selection, show previous and next buttons
    else {
        echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
        echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
    }

    ?>

</body>

</html>