<?php
include "../includes/signup-handle.inc.php";
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

    <link rel="stylesheet" href="../styling/login.css" />

    <title>Signup</title>
</head>

<body>
    <div class="container">

        <!-- Signup form -->
        <form action="signup.php" method="POST">

            <label>Username:<input type="text" name="username" value="<?php echo (isset($_POST['username'])) ? $_POST['username'] : ''; ?>"></label><br>
            <small><?php echo (isset($errors['username'])) ? $errors['username'] : ''; ?></small>

            <label>Password:<input type="password" name="password" value="<?php echo $password ?? ''; ?>"></label><br>
            <small><?php echo (isset($errors['password'])) ? $errors['password'] : ''; ?></small>

            <label>First Name:<input type="text" name="first_name" value="<?php echo (isset($_POST['first_name'])) ? $_POST['first_name'] : ''; ?>"></label><br>
            <small><?php echo (isset($errors['first_name'])) ? $errors['first_name'] : ''; ?></small>

            <label>Last Name:<input type="text" name="last_name" value="<?php echo (isset($_POST['last_name'])) ? $_POST['last_name'] : ''; ?>"></label><br>
            <small><?php echo (isset($errors['last_name'])) ? $errors['last_name'] : ''; ?></small>

            <label>Address:<input type="text" name="address" value="<?php echo (isset($_POST['address'])) ? $_POST['address'] : ''; ?>"></label><br>
            <small><?php echo (isset($errors['address'])) ? $errors['address'] : ''; ?></small>

            <label>City:<input type="text" name="city" value="<?php echo (isset($_POST['city'])) ? $_POST['city'] : ''; ?>"></label><br>
            <small><?php echo (isset($errors['city'])) ? $errors['city'] : ''; ?></small>

            <label>State:<input type="text" name="state" value="<?php echo (isset($_POST['state'])) ? $_POST['state'] : ''; ?>"></label><br>
            <small><?php echo (isset($errors['state'])) ? $errors['state'] : ''; ?></small>

            <label>Zip Code:<input type="number" name="zipcode" value="<?php echo (isset($_POST['zipcode'])) ? $_POST['zipcode'] : ''; ?>"></label><br>
            <small><?php echo (isset($errors['zipcode'])) ? $errors['zipcode'] : ''; ?></small>

            <label>Budget:<input type="number" name="budget" value="<?php echo (isset($_POST['budget'])) ? $_POST['budget'] : ''; ?>"></label><br>
            <small><?php echo (isset($errors['budget'])) ? $errors['budget'] : ''; ?></small>

            <!-- handle duplicate username and unsuccessful insertion to db -->
            <small>
                <?php echo (isset($errors['duplicate'])) ? $errors['duplicate'] : ''; ?>
                <?php echo (isset($errors['insert_err'])) ? $errors['insert_err'] : ''; ?><br>
            </small>

            <input type="submit" class='btn search-icon' name="signup" value="Signup">

        </form>
        <br>

        <!-- link signup to login -->
        <form action="login.php" method="POST">
            <input type="submit" value="Existing User? Login." />
        </form>

    </div>

</body>

</html>