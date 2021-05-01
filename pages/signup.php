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
    if(!empty($error)){ //prints errors if there are any 
        echo "<ul>";
        foreach($error as $e){
            echo "<li>$e</li>";
        }
        echo "</ul>";
    }
?>
    <form action="signup.php" method="POST"> <!-- use post method for sensitive data-->
        User: <input type="text" name="username" value="<?php echo $username ?? ''; ?> ">
    <br>
        Email: <input type="text" name="email" value="<?php echo $email ?? ''; ?> ">
<br>
        Password: <input type="password" name="passwordd" value="<?php echo $password ?? ''; ?> ">
    <br>
        <input type="submit" name="signup" value="Signup">
    
    
    </form>

</body>

</html><?php //login and signup at basic level / normal way




?>