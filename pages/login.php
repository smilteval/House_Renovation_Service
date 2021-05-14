<?php
include "../navbar2.php";
include "../includes/login-handle.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- Font Awesome Icons -->

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Our CSS -->

    <link rel="stylesheet" href="../styling/general.css" />

    <title>Login</title>
</head>

<body>
    <div class="container mt-4 mb-4">

        <!-- Login form -->
        <form action="login.php" method="POST">

            <h3 class="mt-4 mb-4">Login:</h3>

            <label>Username: <br><input type="text" name="username" value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : ''; ?>"></label><br>
            <small><?php echo (isset($errors['username'])) ? $errors['username'] : ''; ?></small>

            <label>Password: <br><input type="password" name="password" value="<?php echo $password ?? ''; ?>"></label><br>
            <small><?php echo (isset($errors['password'])) ? $errors['password'] : ''; ?></small>

            <!-- handle incorrect password and non-existing user -->
            <small>
                <?php echo (isset($errors['inc_pwd'])) ? $errors['inc_pwd'] : ''; ?>
                <?php echo (isset($errors['no_user'])) ? $errors['no_user'] : ''; ?><br>
            </small>

            <input type="submit" class="btn" name="login" value="Login"><br>

        </form>
        <br>

        <!-- link login to signup -->
        <form action="signup.php" method="POST">
            <input type="submit" class="btn secondary" value="No Account? Signup." />
        </form>
        
    </div>
</body>

</html>