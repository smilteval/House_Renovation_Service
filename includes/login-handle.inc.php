<?php
    // include "dbconnect.inc.php";
    include "functions.inc.php";

    $errors = [];

    if(isset($_POST['login'])){ 

        //handle empty fields
        if(empty($_POST['username'])){
            $errors['username'] = "Missing Username<br>";
        }
        if(empty($_POST['password'])){
            $errors['password'] = "Missing Password<br>";
        }

        //if there are no errors, proceed
        if(count($errors) == 0){ 

            //sanitize username and password input
            $username = sanitizeString($_POST["username"]);
            $pwd = sanitizeString($_POST["password"]);

            //check if a username is in the db
            $query1 = "SELECT customer_id, username, password FROM customer ";
            $query1 .= "WHERE username = ? LIMIT 1";

            $stmt = $conn->prepare($query1);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0 ){ 
                
                $user = $result->fetch_assoc(); 

                //check if the password entered matches the password in the db
                if(password_verify($pwd, $user['password'])){ 

                    //log them in, create a session and redirect to homepage
                    session_start();
                    $_SESSION['userID'] = $user['customer_id'];
                    $_SESSION['username'] = $user['username'];
                    header("Location: homepage.php");
                    exit(0);
                }
                else {
                    $errors["inc_pwd"] = "The password is incorrect. Try again.<br>";
                }
            } 
            else {
                $errors["no_user"] = "The user does not exist.<br>";
            }
        }
    }
?>