<?php
include "../includes/signup-handle.inc.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title>Signup</title>
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
        border:0;
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
            echo "<li><small>$e</small></li>";
        }
        echo "</ul>";
    }
    ?>
    <div class="container">
    <form action="signup.php" method="POST">
        <!-- use post method for sensitive data-->
        <label>Username:
        <input type="text" name="username" value="<?php echo $username ?? ''; ?>">
    <br>
            <small>
                <?php echo (isset($errors['username'])) ? $errors['username'] : ''; ?>
            </small>
        </label>
    <br>
        <label>Password: 
        <input type="password" name="password" value="<?php echo $password ?? ''; ?>">
    <br>
            <small>
                <?php echo (isset($errors['password'])) ? $errors['password'] : ''; ?>
            </small>
        </label>
    <br>
        <label>First Name: 
        <input type="text" name="first_name" value="<?php echo $first_name ?? ''; ?>">
    <br>
            <small>
                <?php echo (isset($errors['first_name'])) ? $errors['first_name'] : ''; ?>
            </small>
        </label>
    <br>
        <label>Last Name: 
        <input type="text" name="last_name" value="<?php echo $last_name ?? ''; ?>">
    <br>
            <small>
                <?php echo (isset($errors['last_name'])) ? $errors['last_name'] : ''; ?>
            </small>
        <label>
    <!-- <br> -->
        <label>Address: 
        <input type="text" name="address" value="<?php echo $address ?? ''; ?>">
    <br>
            <small>
                <?php echo (isset($errors['address'])) ? $errors['address'] : ''; ?>
            </small>
        </label>
    <br>
        <label>City: 
        <input type="text" name="city" value="<?php echo $city ?? ''; ?>">
    <br>
            <small>
                <?php echo (isset($errors['city'])) ? $errors['city'] : ''; ?>
            </small>
        </label>
        <label>Zip Code: 
        <input type="number" name="zipcode" value="<?php echo $zipcode ?? ''; ?>">
    <br>
            <small>
                <?php echo (isset($errors['zipcode'])) ? $errors['zipcode'] : ''; ?>
            </small>
        </label>
    <br>
        <label>Budget: 
        <input type="number" name="budget" value="<?php echo $budget ?? ''; ?>">
    <br>
            <small>
                <?php echo (isset($errors['budget'])) ? $errors['budget'] : ''; ?>
            </small>
        </label>
    <br>
    <br>
        <input type="submit" class='btn search-icon' name="signup" value="Signup">

    </form>
    <br>
    <br>
    <form method = "POST" action="login.php"> <!-- Button to link user to login on the signup page -->
        <input type="submit" value="Existing User? Login"/>
    </form>
    </div>

</body>

</html>