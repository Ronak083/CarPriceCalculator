<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <title>result page</title>
</head>

<body>
    <img class="bg" src="pexels-mark-vegera-1089425.jpg" alt="OldCar">
    <section class="container">
        <?php
        $insert = false;
        if (isset($_POST['submit'])) {
            // Set connection variables
            $server = "localhost";
            $username = "root";
            $password = "";

            // Create a database connection
            $con = mysqli_connect($server, $username, $password);

            // Check for connection success
            if (!$con) {
                die("connection to this database failed due to" . mysqli_connect_error());
            }
            // echo "Success connecting to the db";

            // Collect post variables
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $email = $_POST['email'];
            $city = $_POST['city'];
            $Model = $_POST['cars'];
            $yearManufactured = $_POST['Year'];
            $milesDriven = $_POST['MilesD'];
            $hasAccidentHistory = $_POST['Accidental'];
            $hasSunRoof = $_POST['Sunroof'];
            $hasRearViewCamera = $_POST['RVC'];
            $hasAutoAC = $_POST['AC'];

            echo ("<h3>Name: $fname $lname <br></h3>");
            echo "$Model <hr>";

            $salePrice = CarPriceCalculate($Model, $yearManufactured, $milesDriven, $hasAccidentHistory, $hasSunRoof, $hasRearViewCamera, $hasAutoAC);
            echo ("<br><br><h1>Estimated Price: Rs. $salePrice <br></h1>");
            $sql = "INSERT INTO `carp`.`userinformation` (`Fname`, `Lname`, `Email`, `City`, `Model`, `YearManu`, `MilesD`, `Acc`, `SunR`) VALUES ('$fname', '$lname', '$email', '$city', '$Model', '$yearManufactured', '$milesDriven', '$hasAccidentHistory', '$hasSunRoof')";

            if ($con->query($sql) == true) {
                echo "Successfully inserted in Database";
                $insert = true;
            } else {
                echo "ERROR: $sql <br> $con->error";
            }

            // Close the database connection
            $con->close();
        }

        function modelPrice($Model)
        {
            if ($Model == "Eco") {
                $salePrice = 791000;
            } else if ($Model == "Endeavour") {
                $salePrice = 2999000;
            } else if ($Model == "Aspire") {
                $salePrice = 945000;
            } else if ($Model == "Nexon") {
                $salePrice = 770000;
            } else if ($Model == "Punch") {
                $salePrice = 600000;
            } else if ($Model == "Altroz") {
                $salePrice = 665000;
            } else {
                $salePrice = 1000000;
            }
            return $salePrice;
        }

        function CarPriceCalculate($Model, $yearManufactured, $milesDriven, $hasAccidentHistory, $hasSunRoof, $hasRearViewCamera, $hasAutoAC)
        {
            $salePrice = modelPrice($Model);
            echo ("<h3>Model Price:  RS.$salePrice <br></h3>");
            $currentYear = 2022;
            $ageOfCar = $currentYear - $yearManufactured + 1;
            echo "Manufacturing Year $yearManufactured <br>";
            echo "Age Of Car: " . strval($ageOfCar), "<br>";

            if ($ageOfCar <= 10) {
                $n = 5 * $salePrice / 100;
                $salePrice = $salePrice - ($ageOfCar * $n);
            } else {
                $salePrice = $salePrice * 0.01 * $ageOfCar;
            }
            echo ("<h6>Sale-Price after depreciation : RS.$salePrice </h6><hr> ");


            if ($hasRearViewCamera) {
                $salePrice += 20000;
                echo ("Has Rear View Camera + Rs.20000<br>");
            }
            if ($hasSunRoof) {
                $salePrice += 50000;
                echo ("Has Sun Roof + Rs.20000<br>");
            }
            if ($hasAutoAC) {
                $salePrice += 5000;
                echo ("Has Auto AC + Rs.20000<br>");
            }
            echo ("<h6>Sale-Price after accounting for comfort features: RS.$salePrice </h6><hr> ");

            if ($hasAccidentHistory) {
                $salePrice -= 60000;
                echo ("Has Accident history - Rs.60000rs<br>");
            }
            echo ("<h6>Sale-Price after accounting for past accidents: Rs.$salePrice </h6> <hr>");

            $expectedMilesDriven = $ageOfCar * 10000.0;
            $additionalMiles = $milesDriven - $expectedMilesDriven;

            if ($additionalMiles > 1000 && $additionalMiles <= 10000) {
                $salePrice -= 40000;
                echo ("Miles Over limit:<br>Total Miles Driven: $milesDriven km <br> Expected: $expectedMilesDriven km<br> Additional Miles: $additionalMiles km<br>");
                echo "for Extra miles - Rs.40000";
            } else if ($additionalMiles > 10000 && $additionalMiles <= 30000) {
                $salePrice -= 80000;
                echo ("Miles Over limit:<br>Total Miles Driven: $milesDriven km <br> Expected: $expectedMilesDriven km<br> Additional Miles: $additionalMiles km<br>");

                echo "for Extra miles - Rs.80000";
            } else if ($additionalMiles > 30000) {
                $salePrice -= 120000;
                echo ("Miles Over limit:<br>Total Miles Driven: $milesDriven km <br> Expected: $expectedMilesDriven km<br> Additional Miles: $additionalMiles km<br>");

                echo "for Extra miles - Rs.120000<br>";
            }


            echo ("<h6>Sale-Price after accounting for miles driven: RS.$salePrice </h6> <hr>");
            return $salePrice;
        }
        ?>
    </section>
</body>

</html>