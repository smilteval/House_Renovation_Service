<?php
    include "functions.inc.php";

    $errors = [];

    var_dump($_POST);
   
    if(isset($_POST['submit'])){ // user submited from create order, check if there is at least one room. If not, give them an error
        if(!isset($_POST['rooms'])){ //check if rooms are set in POST which you come from
        
            $errors['rooms'] = "Missing Rooms, please select at least one room.<br>";
            //handle empty fields
            // var_dump($errors['rooms']);

        } else {
            $_SESSION["room"] = $_POST["rooms"];
            header("Location: ../pages/order_summary.php");
        }

       
    }
     //if there are no errors, proceed
    //  if(count($errors) == 0){ 

    // }
?>
