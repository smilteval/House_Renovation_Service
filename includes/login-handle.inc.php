<?php
    include "dbconnect.inc.php";
    include "functions.inc.php";

    $errors = [];

    if(isset($_POST['login'])){ //sanitize string and make sure account is in db
        if(empty($_POST['username'])){
            $errors['username'] = "Missing Username";
        }
        if(empty($_POST['password'])){
            $errors['password'] = "Missing Password";
        }
        if(count($errors) == 0){ //if there are no errors, proceed
            $username = sanitizeString($_POST["username"]);
            $pwd = sanitizeString($_POST["password"]);
            // $email = sanitizeString($_POST["email"]);

            $query1 = "SELECT customer_id, username, password FROM customer "; //read from the customer table, not users table!
            $query1 .= "WHERE username = ? LIMIT 1";

            $stmt = $conn->prepare($query1);
            $stmt->bind_param("s",$username);
            $stmt->execute();

            $result = $stmt->get_result();

            if($result->num_rows > 0 ){ //triple = is for checking type and value
                //use fetch_assoc or fetch_all? both arrays, assoc gives you ONE record. All creates dynamic array incase you have more than one. Use Assoc
                $user = $result->fetch_assoc(); //user will be associatvie array
                //what are the keys in this array? The keys are what we select from the database 
                //hackers can has your password but not rehash (decrypt) it! If you want to crack a pw you need a super computer or it would take a LONG time!
                if(password_verify($pwd, $user['password'])){ //pwd is correct, log them in, create a session or cookies to log them in
                    session_start();
                    $_SESSION['userID'] = $user['customer_id'];
                    $_SESSION['username'] = $user['username'];

                    header("Location: homepage.php");
                    exit(0);
                } else {
                    $errors["acc"] = "The password is incorrect! That's a little sus...";
                }
            } else {
                $errors["acc"] = "The record is not matched";
            }
        }
    }
?>
