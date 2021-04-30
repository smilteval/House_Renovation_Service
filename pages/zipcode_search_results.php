<?php
    include "../navbar.php";
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