<?php
session_start();
include "../navbar.php";
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

    <style>
        .card {
            border: none;
            background: #eee;
        }

        .search {
            width: 100%;
            margin-top: 20px;
            height: 50px;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px
        }

        .search-input {
            padding: 0 10px;
            margin-top: 5px;
            line-height: 20px;
            border: 0;
            outline: 0;
            width: 100%;
            caret-color: #0070F0;
            font-size: 19px;
            font-weight: 300;
            color: black;
        }

        .search-icon {
            height: 34px;
            width: 34px;
            float: right;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            background-color: #00D4F0;
            font-size: 10px;
            bottom: 30px;
            position: relative;
            border-radius: 5px
        }

        .search-icon:hover {
            background-color: #0070F0;
        }

        .card-inner {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
            border: none;
            cursor: pointer;
            transition: all 2s
        }

        .card-inner:hover {
            transform: scale(1.2)
        }

        .mg-text {
            font-size: 12px;
            line-height: 14px;
        }

        span{
            color: #00D4F0;
        }
    </style>

    <title>Homepage</title>
</head>

<body>

    <div class="container mt-4">
        <div class="row d-flex justify-content-center">
            <?php if (isset($_SESSION["username"])) {
                echo "<h2>Welcome <span>" . $_SESSION["username"] . "!</span></h2>";
            } ?>
        </div>
    </div>

    <div class="container mt-4 mb-5">
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
                    <div class="row mt-4 g-1 px-1">
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