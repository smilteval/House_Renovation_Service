<?php
    session_start(); //clean the session (steps also in the cheat sheet)
    $_SESSION = []; //clearing session, no more info of the user on server
    session_destroy();
    header("Location: ../login.php"); //redirecting the user
?>