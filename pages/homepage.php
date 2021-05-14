<?php
session_start();
include "../navbar.php";
include '../handle_form.inc.php';
include_once "../includes/dbconnect.inc.php";
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

    <?php if (isset($_SESSION["username"])) {
        echo "<h2>Welcome " . $_SESSION["username"] . "!</h2>";
    } ?>

    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <div class="card p-4 mt-3">

                <!-- Search bar for zip code -->
                <form action="zipcode_search_results.php" method="POST">
                    <h3 class="heading mt-5 text-center">Search By Zip Code</h3>
                    <div class="d-flex justify-content-center px-5">
                        <div class="search">
                            <input type="number" class="search-input" name="zipcode" placeholder="Enter your zipcode...">
                            <button type="submit" class="btn search-icon"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <!-- Search bar for city -->
                <form action="city_search_results.php" method="POST">
                    <h3 class="heading mt-5 text-center">Search By City</h3>
                    <div class="d-flex justify-content-center px-5">
                        <div class="search">
                            <input type="text" class="search-input" name="city" placeholder="Enter your city...">
                            <button type="submit" class="btn search-icon"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <!-- Search bar for budget  -->
                <form action="budget_search_results.php" method="POST">
                    <h3 class="heading mt-5 text-center">Search By Budget</h3>
                    <div class="d-flex justify-content-center px-5">
                        <div class="search">
                            <input type="number" class="search-input" name="budget" placeholder="Enter your budget...">
                            <button type="submit" class="btn search-icon"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <!-- Search for services  -->
                <form action="specialization_search_results.php" method="POST">
                    <h3 class="heading mt-5 text-center">Search By Specialization</h3>
                    <div class="row mt-4 g-1 px-1 mb-5">
                        <div class="col-md-2">
                            <button type="submit" name="specialization" value="Electrical" class="btn">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/electrical.png" width="50">
                                    <div class="text-center mg-text pt-1"> Electrical </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="specialization" value="Plumbing" class="btn">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/plumbing.png" width="50">
                                    <div class="text-center mg-text pt-1"> Plumbing </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="specialization" value="Painting" class="btn">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/painting.png" width="50">
                                    <div class="text-center mg-text pt-1"> Painting </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="specialization" value="Flooring" class="btn">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/flooring.png" width="50">
                                    <div class="text-center mg-text pt-1"> Flooring </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="specialization" value="Cleaning" class="btn">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/cleaning.png" width="50">
                                    <div class="text-center mg-text pt-1"> Cleaning </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="specialization" value="Decoration" class="btn">
                                <div class="card-inner p-3 d-flex flex-column align-items-center">
                                    <img src="../styling/icons/room.png" width="50">
                                    <div class="text-center mg-text pt-1"> Decoration </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>