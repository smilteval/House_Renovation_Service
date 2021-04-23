<?php
    include "../navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <!-- Font Awesome Icons -->

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Our CSS -->

    <link rel="stylesheet" href="../styling/homepage.css" />

    <title>Homepage</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">

                <!-- Create an order button -->

                <div class="row d-flex justify-content-end mr-1">
                    <a href="http://localhost/house_renovation_service/pages/create_order.php" class="btn btn-primary"
                        id="order-button">
                        Create an Order
                    </a>
                </div>

                <!-- Search Fields -->

                <div class="card p-4 mt-3">

                    <!-- Search bar for zipcode -->

                    <h3 class="heading mt-5 text-center">Search By Zipcode</h3>
                    <div class="d-flex justify-content-center px-5">
                        <div class="search">
                            <input type="number" class="search-input" placeholder="Enter your zipcode...">
                            <a href="http://localhost/house_renovation_service/pages/zipcode_search_results.php"
                                class="search-icon">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Search bar for address  -->

                    <h3 class="heading mt-5 text-center">Search By Address</h3>
                    <div class="d-flex justify-content-center px-5">
                        <div class="search">
                            <input type="text" class="search-input" placeholder="Enter your address...">
                            <a href="http://localhost/house_renovation_service/pages/address_search_results.php"
                                class="search-icon">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Search bar for budget  -->

                    <h3 class="heading mt-5 text-center">Search By Budget</h3>
                    <div class="d-flex justify-content-center px-5">
                        <div class="search">
                            <input type="number" class="search-input" placeholder="Enter your budget...">
                            <a href="http://localhost/house_renovation_service/pages/budget_search_results.php"
                                class="search-icon">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Search for services  -->

                    <h3 class="heading mt-5 text-center">Search By Specialization</h3>
                    <div class="row mt-4 g-1 px-4 mb-5">
                        <div class="col-md-2">
                            <a href="http://localhost/house_renovation_service/pages/specialization_search_results.php">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/kitchen.png" width="50">
                                    <div class="text-center mg-text pt-1"> Kitchen Renovation </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a href="http://localhost/house_renovation_service/pages/specialization_search_results.php">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/bathtub.png" width="50">
                                    <div class="text-center mg-text pt-1"> Bathroom Renovation </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a href="http://localhost/house_renovation_service/pages/specialization_search_results.php">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/house.png" width="50">
                                    <div class="text-center mg-text pt-1"> Full House Renovation </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a href="http://localhost/house_renovation_service/pages/specialization_search_results.php">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/interior.png" width="50">
                                    <div class="text-center mg-text pt-1"> Interior Design </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a href="http://localhost/house_renovation_service/pages/specialization_search_results.php">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/plank.png" width="50">
                                    <div class="text-center mg-text pt-1"> Flooring </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a href="http://localhost/house_renovation_service/pages/specialization_search_results.php">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/paint.png" width="50">
                                    <div class="text-center mg-text pt-1"> Painting </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>