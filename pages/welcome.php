<?php
    include "includes/dbconnect.inc.php";
    session_start(); //this is important. When you log the use rin, you log in their id, this is how u check if they are logged in or not
    // if(!isset($_SESSION["id"])){ //if the user is NOT logged in, they can not access this page, they will be sent back to login.php
    //     header("Location: login.php");
    // }

    //What if user is a guest and wants to read items without logging in?
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>
        <ul>
            <?php if(!isset($_SESSION["userID"])) { //if username is NOT logged in, show signup and login ?>
                <li><a href="login.php"> Login </a></li>
                <li><a href="signup.php"> Signup </a></li>
            <?php } else { //otherwise, if the user is logged in, show the logout button ?>
                <li><a href="includes/logout-handle.inc.php"> Logout </a></li>
            <?php } ?>
        
        </ul>
        <?php echo "I am ".$_SESSION['username']; ?>
        <br>
        <!-- <a href="includes/logout-handle.inc.php"> Logout </a> -->
    </body>
</html>
