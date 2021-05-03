<?php
    include "dbconnect.inc.php"; //we d/n have includes in path because dbconnect is in the same folder as this current file
    include "functions.inc.php";

    //This protects password in the DB
    //https://www.php.net/manual/en/function.password-hash.php

    // var_dump($_POST);

    $error = [];

    // echo "hi"; //test
    if(isset($_POST['signup'])){ //submit comes from attribute name in the button
        //Assume that you have a regular expression (regex)
        $username = sanitizeString($_POST['username']);
        $pwd = sanitizeString($_POST['password']);
        $first_name = sanitizeString($_POST['first_name']);
        $last_name = sanitizeString($_POST['last_name']);
        $address = sanitizeString($_POST['address']);
        $zipcode = sanitizeString($_POST['zipcode']);
        $budget = sanitizeString($_POST['budget']);


        // echo $username;

        $checkQ = "SELECT username FROM customer WHERE username = ?";

        //use prepare statements for these vars
        $stmt = $conn->prepare($checkQ);
        $stmt->bind_param("s",$username);
        $stmt->execute();

        //This is an object, it can tell you how many rows have returned from query
        // $result = $stmt->get_result();
        // var_dump($result());

        if($stmt->get_result()->num_rows > 0){ //there is duplicate
            $error['duplicate'] = "Account is taken";   
        } else { //appending the account information into the db

            //returns hashed string
            $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

            $insertQ = "INSERT INTO customer (username, password, first_name, last_name, address, zipcode, budget)";
            $insertQ .= "VALUES (?, ?, ?, ?, ?, ?, ?)"; //use ? to prevent SQL injection

            $stmt2 = $conn->prepare($insertQ);
            $stmt2->bind_param("sssssii",$username, $hashed_pwd, $first_name, $last_name, $address, $zipcode, $budget);
            if(!$stmt2->execute()){
                $error["insert"] = "We have a problem creating your account"; //can also use try catch block
            } else { // no problems in creating the account
                echo "Your account is created"; 
                // ** Maybe redirect the user to welcome page or login? **
            }
        }
    }
?>