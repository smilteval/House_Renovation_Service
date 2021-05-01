<?php
    include "dbconnect.inc.php"; //we d/n have includes in path because dbconnect is in the same folder as this current file
    include "functions.inc.php";

    //This protects password in the DB
    //https://www.php.net/manual/en/function.password-hash.php

    // var_dump($_POST);

    $error = [];
    if(isset($_POST['signup'])){ //submit comes from attribute name in the button
        //Assume that you have a regular expression (regex)
        $username = sanitizeString($_POST['username']);
        $email = sanitizeString($_POST['email']);
        $password = sanitizeString($_POST['password']);

        //Also show if it is empty, check previous notes how to utilize this
        //Go into database to check

        $checkQ = "SELECT username, passwordd, email FROM users WHERE username = ? and email = ?";

        //use prepare statements for these vars
        $stmt = $conn->prepare($checkQ);
        $stmt->bind_param("ss",$username,$email);
        $stmt->execute();

        //This is an object, it can tell you how many rows have returned from query
        $result = $stmt->get_result();
        var_dump($result());

        if($stmt->get_result()->num_rows > 0){ //there is duplicate
            $error['duplicate'] = "Account is taken";   
        } else { //appending the account information into the db

            //returns hashed string
            $hased_pwd = password_hash($password, PASSWORD_DEFAULT);

            $insertQ = "INSERT INTO users (username, passwordd, email) ";
            $insertQ .= "VALUES (?, ?, ?)"; //use ? to prevent SQL injection

            $stmt2 = $conn->prepare($insertQ);
            $stmt2->bind_param("sss",$username, $hashed_pwd, $email);
            if(!$stmt2->execute()){
                $error["insert"] = "We have a problem creating your account"; //can also use try catch block
            } else { // no problems in creating the account
                echo "Your account is created";
            }
        }
    }
?>