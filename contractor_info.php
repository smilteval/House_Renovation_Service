<!-- This is a test, may remove later -->

<DOCTYPE html>
    <html>
        <head>
            <title>Contractor Info Page</title>
        </head>
        <body>
   <!-- List out company name and specialization and what not -->

<?php //Contractor Info
    include_once "dbconnect.inc.php";
    //Connect to database from terminal: ssh username@163.238.35.165
    //mysql -u username -p password //same as usual
    //Professor says for the school server, we can connect to the data base either through phpmyadmin or through command prompt with above code

    //test
    //$query1 = $conn->query("SELECT * FROM contractor");// where company_name = ?";
    $query1 = "SELECT * FROM contractor";
    $result = mysqli_query($conn, $query1);
    $check = mysqli_num_rows($result);
    if($check > 0){
        while($row = mysqli_fetch_assoc($result)){ //$row becomes an array
            echo $row['company_name'];
        }
    }

    $query2 = "SELECT * FROM customer WHERE first_name = ?";

    //var_dump($query1);
    $example = 'Vincenzo'; //This is the input
    $stmt = $conn->prepare($query2);
    $stmt->bind_param("s", $example);
    $stmt->execute();
    // $stmt->store_result();
    $result = $stmt->get_result();
    // var_dump($query1);


    if($result->num_rows === 0) exit('No Rows');//no data, exit with no rows
    while($rows = $result->fetch_assoc()){//grab data in assoc array
        echo $rows['first_name'];
    } //print out first name


?>

        </body>
    </html>
</DOCTYPE>
