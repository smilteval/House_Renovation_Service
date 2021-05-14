<?php
    // include "dbconnect.inc.php"; 
    include "functions.inc.php";

    $errors = [];

    if(isset($_POST['signup'])){
        
        //handle empty fields
        if(empty($_POST['username'])){
            $errors['username'] = "Missing Username<br>";
        }
        if(empty($_POST['password'])){
            $errors['password'] = "Missing Password<br>";
        }
        if(empty($_POST['first_name'])){
            $errors['first_name'] = "Missing First Name<br>";
        }
        if(empty($_POST['last_name'])){
            $errors['last_name'] = "Missing Last Name<br>";
        }
        if(empty($_POST['address'])){
            $errors['address'] = "Missing Address<br>";
        }
        if(empty($_POST['city'])){
            $errors['city'] = "Missing City<br>";
        }
        if(empty($_POST['state'])){
            $errors['state'] = "Missing State<br>";
        }
        if(empty($_POST['zipcode'])){
            $errors['zipcode'] = "Missing Zipcode<br>";
        }
        if(empty($_POST['budget'])){
            $errors['budget'] = "Missing Budget<br>";
        }

        //if there are no errors, proceed
        if(count($errors) == 0){ 
    
            //sanitize all input
            $username = sanitizeString($_POST['username']);
            $pwd = sanitizeString($_POST['password']);
            $first_name = sanitizeString($_POST['first_name']);
            $last_name = sanitizeString($_POST['last_name']);
            $address = sanitizeString($_POST['address']);
            $city = sanitizeString($_POST['city']);
            $state = sanitizeString($_POST['state']);
            $zipcode = sanitizeString($_POST['zipcode']);
            $budget = sanitizeString($_POST['budget']);

            //check if a username is already in the db
            $checkQ = "SELECT username FROM customer WHERE username = ?";

            $stmt = $conn->prepare($checkQ);
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){ 
                $errors['duplicate'] = "Username is already taken.<br>";   
            } 
            else { //if the user account does not exist, append it to the db

                $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT); //hash the password 

                $insertQ = "INSERT INTO customer (username, password, first_name, last_name, address, city, state, zipcode, budget)";
                $insertQ .= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; //use ? to prevent SQL injection

                $stmt2 = $conn->prepare($insertQ);
                $stmt2->bind_param("sssssssii",$username, $hashed_pwd, $first_name, $last_name, $address, $city, $state, $zipcode, $budget);
                if(!$stmt2->execute()){
                    $errors["insert_err"] = "We have a problem creating your account<br>"; 
                } 
                else { // if there are no problems, redirect to login page
                    header ("Location: login.php");
                }
            }
        }
    }
?>