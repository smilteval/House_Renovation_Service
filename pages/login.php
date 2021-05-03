<?php
include "../includes/login-handle.inc.php"; //needed the ../ for correct path
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
    <form action="login.php" method="POST"> <!-- changed action to login.php, previously was on homepage.php. I guess the form never finished and just instantly went to homepage -->
        Username: <input type="text" name="username" value="<?php echo $username ?? ''; ?>">
        <br>

        Password: <input type="password" name="password" value="<?php echo $password ?? ''; ?>"> <!-- password had one character already filled in because of the white space between ?> and ". Strange -->
        <br>

        <input type="submit" name="login" value="Login">
    </form>

</body>

</html>