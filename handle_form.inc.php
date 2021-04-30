<?php

	function validateStr($str){
		$str = trim($str);
		$str = stripcslashes($str);
		$str = htmlspecialchars($str);

		return $str;
	}

    $errors = []; //this is an empty array
	//Check if the user click the submit button
    // *** MNeeds to be updated, unsure if needed, leaving here for now ***
	if(isset($_POST['submit'])){	
		if(empty($_POST['username'])){
			$errors['username'] = "Missing Username"; //associative
		}
    }


?>