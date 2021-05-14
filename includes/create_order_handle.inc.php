<?php
    include "functions.inc.php";
    $errors = [];
   
    if(isset($_POST['submit'])){ // user submited from create order, check if there is at least one room. If not, give them an error
        if(!isset($_POST['rooms'])){ //check if rooms are set in POST which you come from create order
        
            $errors['rooms'] = "Missing Rooms, please select at least one room.<br>";
            //handle empty fields

        } else { //since this page has POST and the net page will have empty POST, put the POST variables into SESSION
            $_SESSION["room"] = $_POST["rooms"];
            header("Location: ../pages/order_summary.php"); //go to the order summary page
        }
    }
?>
