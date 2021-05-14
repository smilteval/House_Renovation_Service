<?php
    //clear session, no more info of the user on server
    $_SESSION = []; 
    session_destroy();
    header("Location: ../pages/login.php"); //redirect user to login page
?>