<?php
    include "../navbar.php";
    include_once "../dbconnect.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zipcode Search Results</title>
</head>

<body>
    <div class="container">
        <h3>Results for zipcode: <?php echo $_POST["zipcode"]; ?> </h3>
        <br>
        <br>
        <br>

        <!-- Contractor -->
        <div class="row">
            <div class="col-md-5">
                <img class="img-fluid rounded mb-3 mb-md-0"
                    src="https://www.bigsteelbox.com/content/uploads/2019/11/Home-renovation-costs-2100x1200.jpg">
            </div>
            <div class="col-md-5">

        <?php //displaying contractors by their zipcode
            $query = "SELECT company_name FROM contractor WHERE zipcode = ?";
            $zip = $_POST["zipcode"];
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s",$zip);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows === 0) exit('No Rows'); //exit if empty
            //TODO: Change fetch_assoc to fetch_all 
            while($row = $result->fetch_assoc()) { //Unsure if fetch_all would be better
                //var_dump($row); //array(1) { [0]=> array(1) { [0]=> string(14) "Your Home Inc." } }
                echo $row['company_name']."<br>"; //print out name of company, works for assoc

            } //all of the names would be stored inside row

        ?>
                <h3>Contractor One</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita
                    laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos
                    perspiciatis atque eveniet unde.
                </p>
                <a class="btn btn-primary" href="http://localhost/house_renovation_service/pages/company_info.php">Learn
                    More</a>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>