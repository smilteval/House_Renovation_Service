<?php

include "../includes/dbconnect.inc.php";

//assume that none of the rooms are selected in this form

$room_selection = array(
	"Living Room" => false,
	"Bedroom" => false,
	"Dining Room" => false,
	"Kitchen" => false,
	"Bathroom" => false,
	"Office" => false,
	"Basement" => false,
	"Nursery" => false,
	"Gym" => false
);

//count the number of rooms selected from the previous form

$selected_room_count = count($_POST["rooms"]);

if (isset($_POST["submit"])) {

	//check which rooms were selected in the previous form, assign "true" to those rooms in this form

	foreach ($room_selection as $room_name => $selected) {
		foreach ($_POST["rooms"] as $room) {
			if ($room === $room_name) {
				$room_selection[$room_name] = true;
			}
		}
	}
}

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

			$room_count = 0; //tracks the number of rooms with services already selected

			for ($i = 0; $i < 9; $i++) {
			}

			if ($room_selection["Living Room"] === true) {
				echo "<fieldset>";
				echo "<h2> Select Services for your <i>Living Room: </i></h2><br>";
				include "service_selection.php";

				//if it's the first room selection, do not show previous button
				if ($room_count === 0) {
					echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
				}
				//if it's the last room selection, show checkout button
				if ($room_count === $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
				}
				//otherwise show both previous and next buttons
				if ($room_count !== 0 && $room_count !== $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
				}
				echo "</fieldset>";
				$room_count++;
			}

			if ($room_selection["Bedroom"] === true) {
				echo "<fieldset>";
				echo "<h2> Select Services for your <i>Bedroom: </i></h2><br>";
				include "service_selection.php";

				//if it's the first room selection, do not show previous button
				if ($room_count === 0) {
					echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
				}
				//if it's the last room selection, show checkout button
				if ($room_count === $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
				}
				//otherwise show both previous and next buttons
				if ($room_count !== 0 && $room_count !== $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
				}
				echo "</fieldset>";
				$room_count++;
			}

			if ($room_selection["Dining Room"] === true) {
				echo "<fieldset>";
				echo "<h2> Select Services for your <i>Dining Room: </i></h2><br>";
				include "service_selection.php";

				//if it's the first room selection, do not show previous button
				if ($room_count === 0) {
					echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
				}
				//if it's the last room selection, show checkout button
				if ($room_count === $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
				}
				//otherwise show both previous and next buttons
				if ($room_count !== 0 && $room_count !== $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
				}
				echo "</fieldset>";
				$room_count++;
			}

			if ($room_selection["Kitchen"] === true) {
				echo "<fieldset>";
				echo "<h2> Select Services for your <i>Kitchen: </i></h2><br>";
				include "service_selection.php";

				//if it's the first room selection, do not show previous button
				if ($room_count === 0) {
					echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
				}
				//if it's the last room selection, show checkout button
				if ($room_count === $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
				}
				//otherwise show both previous and next buttons
				if ($room_count !== 0 && $room_count !== $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
				}
				echo "</fieldset>";
				$room_count++;
			}

			if ($room_selection["Bathroom"] === true) {
				echo "<fieldset>";
				echo "<h2> Select Services for your <i>Bathroom: </i></h2><br>";
				include "service_selection.php";

				//if it's the first room selection, do not show previous button
				if ($room_count === 0) {
					echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
				}
				//if it's the last room selection, show checkout button
				if ($room_count === $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
				}
				//otherwise show both previous and next buttons
				if ($room_count !== 0 && $room_count !== $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
				}
				echo "</fieldset>";
				$room_count++;
			}

			if ($room_selection["Office"] === true) {
				echo "<fieldset>";
				echo "<h2> Select Services for your <i>Office: </i></h2><br>";
				include "service_selection.php";

				//if it's the first room selection, do not show previous button
				if ($room_count === 0) {
					echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
				}
				//if it's the last room selection, show checkout button
				if ($room_count === $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
				}
				//otherwise show both previous and next buttons
				if ($room_count !== 0 && $room_count !== $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
				}
				echo "</fieldset>";
				$room_count++;
			}

			if ($room_selection["Basement"] === true) {
				echo "<fieldset>";
				echo "<h2> Select Services for your <i>Basement: </i></h2><br>";
				include "service_selection.php";

				//if it's the first room selection, do not show previous button
				if ($room_count === 0) {
					echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
				}
				//if it's the last room selection, show checkout button
				if ($room_count === $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
				}
				//otherwise show both previous and next buttons
				if ($room_count !== 0 && $room_count !== $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
				}
				echo "</fieldset>";
				$room_count++;
			}

			if ($room_selection["Nursery"] === true) {
				echo "<fieldset>";
				echo "<h2> Select Services for your <i>Nursery: </i></h2><br>";
				include "service_selection.php";

				//if it's the first room selection, do not show previous button
				if ($room_count === 0) {
					echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
				}
				//if it's the last room selection, show checkout button
				if ($room_count === $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
				}
				//otherwise show both previous and next buttons
				if ($room_count !== 0 && $room_count !== $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
				}
				echo "</fieldset>";
				$room_count++;
			}

			if ($room_selection["Gym"] === true) {
				echo "<fieldset>";
				echo "<h2> Select Services for your <i>Gym: </i></h2><br>";
				include "service_selection.php";

				//if it's the first room selection, do not show previous button
				if ($room_count === 0) {
					echo "<input type='button' name='data[]' class='next btn btn-info' value='Next' />";
				}
				//if it's the last room selection, show checkout button
				if ($room_count === $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='submit' name='submit' class='submit btn btn-success' value='Submit' id='submit_data' />";
				}
				//otherwise show both previous and next buttons
				if ($room_count !== 0 && $room_count !== $selected_room_count - 1) {
					echo "<input type='button' name='previous' class='previous btn btn-default' value='Previous' />";
					echo "<input type='button' name='next' class='next btn btn-info' value='Next' />";
				}
				echo "</fieldset>";
				$room_count++;
			}

			?>

		</form>
	</div>
</body>

</html>

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