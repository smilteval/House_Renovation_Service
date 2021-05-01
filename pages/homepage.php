<?php
include "../navbar.php";
include '../handle_form.inc.php';
include_once "../dbconnect.inc.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

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
                    <a href="http://localhost/house_renovation_service/pages/create_order.php" class="btn btn-primary" id="order-button">
                        Create an Order
                    </a>
                </div>

                <!-- Search Fields -->

                <div class="card p-4 mt-3">

                    <!-- Search bar for zipcode -->
                    <form method="POST" action="zipcode_search_results.php">
                        <!-- POST does not display the data inside http header. Must make sure we protect the input with handleform -->
                        <h3 class="heading mt-5 text-center">Search By Zipcode</h3>
                        <div class="d-flex justify-content-center px-5">
                            <div class="search">
                                <input type="number" class="search-input" name="zipcode" placeholder="Enter your zipcode...">
                                <button type="submit" class="btn search-icon">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Search bar for address  -->

                    <h3 class="heading mt-5 text-center">Search By Address</h3>
                    <div class="d-flex justify-content-center px-5">
                        <div class="search">
                            <input type="text" class="search-input" placeholder="Enter your address...">
                            <button type="submit" class="btn search-icon">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Search bar for budget  -->

                    <form method="POST" action="budget_search_results.php">
                        <h3 class="heading mt-5 text-center">Search By Budget</h3>
                        <div class="d-flex justify-content-center px-5">
                            <div class="search">
                                <input type="number" class="search-input" name="budget" placeholder="Enter your budget...">
                                <button type="submit" class="btn search-icon">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Search for services  -->
                    <!-- Essentially a Radio input -->

                    <h3 class="heading mt-5 text-center">Search By Specialization</h3>

                    <form method="POST" action="specialization_search_results.php">
                        <div class="row mt-4 g-1 px-4 mb-5">
                            <div class="col-md-2">
                                <button type="submit" name="specialization" value="Kitchen Renovation" class="btn">
                                    <div class="card-inner p-3 d-flex flex-column align-items-center">
                                        <img src="../styling/icons/kitchen.png" width="50">
                                        <div class="text-center mg-text pt-1"> Kitchen Renovation </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="specialization" value="Bathroom Renovation" class="btn">
                                    <div class="card-inner p-3 d-flex flex-column align-items-center">
                                        <img src="../styling/icons/bathtub.png" width="50">
                                        <div class="text-center mg-text pt-1"> Bathroom Renovation </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="specialization" value="Full House Renovation" class="btn">
                                    <div class="card-inner p-3 d-flex flex-column align-items-center">
                                        <img src="../styling/icons/house.png" width="50">
                                        <div class="text-center mg-text pt-1"> Full House Renovation </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="specialization" value="Interior Design" class="btn">
                                    <div class="card-inner p-3 d-flex flex-column align-items-center">
                                        <img src="../styling/icons/interior.png" width="50">
                                        <div class="text-center mg-text pt-1"> Interior Design </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="specialization" value="Flooring" class="btn">
                                    <div class="card-inner p-3 d-flex flex-column align-items-center">
                                        <img src="../styling/icons/plank.png" width="50">
                                        <div class="text-center mg-text pt-1"> Flooring </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="specialization" value="Painting" class="btn">
                                    <div class="card-inner p-3 d-flex flex-column align-items-center">
                                        <img src="../styling/icons/paint.png" width="50">
                                        <div class="text-center mg-text pt-1"> Painting </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>