<?php
    include "functions.inc.php";
    $errors = [];
   
    // user submitted from create order, check if there is at least one room, if not, give them an error
    if(isset($_POST['submit'])){ 

        //check if rooms are set in POST which you come from create order
        if(!isset($_POST['rooms'])){ 
            $errors['rooms'] = "Missing Rooms, please select at least one room.<br>";
        } 
        //since this page has POST and the net page will have empty POST, put the POST variables into SESSION
        else { 
            $_SESSION["room"] = $_POST["rooms"];
            header("Location: ../pages/order_summary.php"); //redirect to the order summary page
        }
    }
?>