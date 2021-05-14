<?php
include "../includes/login-handle.inc.php"; //needed the ../ for correct path
?>

<!DOCTYPE html>

<html>

<head>
    <title>Login</title>
</head>

<style>
    .container{
        padding: 10px;
    }
    label{
        width: 210px;
        display: inline-block;
    }
    input[type="submit"]{
        background-color: #EFEFEF;
        border: 0;
        padding: 7px;
        width: 178px;
        cursor: pointer;
        border-radius: 4px;
    }
    input[type="submit"]:hover{
        background-color: #d1d1d1;
    }
    small{
       color: red;
    }
</style>

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
        <label>Username: 
            <input type="text" name="username" value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : ''; ?>">
    <br>
            <small>
                <?php echo (isset($errors['username'])) ? $errors['username'] : ''; ?>
            </small>
        </label>
    <br>

        <label>Password: 
            <input type="password" name="password" value="<?php echo $password ?? ''; ?>"> <!-- password had one character already filled in because of the white space between ?> and ". Strange -->
        <br>
            <small>
                <?php echo (isset($errors['password'])) ? $errors['password'] : ''; ?>
                <?php echo (isset($errors['acc'])) ? $errors['acc'] : ''; ?>
            </small>
        </label>
    <br>
    <br>

        <input type="submit" name="login" value="Login">
    </form>
    <br>
    <form action="signup.php" method="POST"> <!-- Button to link user to signup on the login page -->
        <input type="submit" value="No Account? Signup"/>
    </form>

</body>

</html>