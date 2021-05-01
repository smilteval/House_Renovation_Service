<?php
include "includes/signup-handle.inc.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title></title>
</head>

<body>

    <?php
    if (!empty($error)) { //prints errors if there are any 
        echo "<ul>";
        foreach ($error as $e) {
            echo "<li>$e</li>";
        }
        echo "</ul>";
    }
    ?>
    <form action="signup.php" method="POST">
        <!-- use post method for sensitive data-->
        User: <input type="text" name="username" value="<?php echo $username ?? ''; ?> ">
        <br>
        Password: <input type="password" name="password" value="<?php echo $password ?? ''; ?> ">
        <br>
        First Name: <input type="text" name="first_name" value="<?php echo $first_name ?? ''; ?> ">
        <br>
        Last Name: <input type="text" name="last_name" value="<?php echo $last_name ?? ''; ?> ">
        <br>
        Address: <input type="text" name="address" value="<?php echo $address ?? ''; ?> ">
        <br>
        Zip Code: <input type="number" name="zipcode" value="<?php echo $zipcode ?? ''; ?> ">
        <br>
        Budget: <input type="number" name="budget" value="<?php echo $budget ?? ''; ?> ">
        <br>
        <input type="submit" name="signup" value="Signup">

    </form>

</body>

</html>