<?php
include "includes/login-handle.inc.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title>Login</title>
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
    <form action="homepage.php" method="POST">
        User: <input type="text" name="username" value="<?php echo $username ?? ''; ?> ">
        <br>

        Password: <input type="password" name="password" value="<?php echo $password ?? ''; ?> ">
        <br>

        <input type="submit" name="login" value="Login">
    </form>

</body>

</html>