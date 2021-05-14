<?php
    include "dbconnect.inc.php";
    
    $errors = [];
    var_dump($_POST);
    if(isset($_POST['submit'])){ // user submited from create order, check if there is at least one room. If not, give them an error

        //handle empty fields
        if(!isset($_POST['rooms[]'])){
            $errors['rooms'] = "Missing Rooms, please select at least one room.<br>";
        }

        //if there are no errors, proceed
        if(count($errors) == 0){ 

            header("Location: order_summary.php");
        }
    }
?>
