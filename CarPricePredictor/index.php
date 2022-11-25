<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Calculate Old Car Price</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="pexels-mark-vegera-1089425.jpg" alt="OldCar">
    <div class="container">
        <h1>Let's Calculate Old Car Price</h3>
            <p>Enter your details and submit this form to check Current Selling Price Of your Car </p>
            <form action="action.php" method="post">
                <section class="basic">
                    <h3>Onwer Details</h3>
                    <input class="field-wrap" type="text" name="firstname" placeholder="First Name" required><br>
                    <input class="field-wrap" type="text" name="lastname" placeholder="Last Name" required><br>
                    <input class="field-wrap" type="email" name="email" placeholder="Email" required>
                    <input class="field-wrap" type="text" name="city" placeholder="City" required><br>
                </section>

                <hr class="shine">

                <section>
                    <h3>Car Details</h3>
                    <label id="para" for="cars">Choose a car & Model:</label>
                    <br>
                    <select name="cars" id="cars" required>
                        <optgroup label="Ford">
                            <option value="Eco">Eco-Sports</option>
                            <option value="Endeavour">Endeavour</option>
                            <option value="Aspire">Aspire</option>
                        </optgroup>
                        <optgroup label="Tata">
                            <option value="Nexon">Nexon</option>
                            <option value="Punch">Punch</option>
                            <option value="Altroz">Altroz</option>
                        </optgroup>
                    </select> <br>
                    <label id="para" for="ModelY">Model Year</label><br>
                    <select name="Year" id="Menu" required>
                        <option value="1999">1999</option>
                        <option value="2000">2000</option>
                        <option value="2001">2001</option>
                        <option value="2002">2002</option>
                        <option value="2003">2003</option>
                        <option value="2004">2004</option>
                        <option value="2005">2005</option>
                        <option value="2006">2006</option>
                        <option value="2007">2007</option>
                        <option value="2008">2008</option>
                        <option value="2009">2009</option>
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select><br>
                </section>

                <hr class="shine">

                <div required class="cci">
                    <h3>Car Current Information</h3>
                    <label id="para" for="MilesD">Miles Driven:</label><br>
                    <input name="MilesD" type="number" required> <br>

                    <p id="para">Any Accidental history?:</p>
                    <label for="Accidental">
                          <input type="radio" id="Yes" name="Accidental" value="Yes">Yes
                    </label><label for="Accidental">
                          <input type="radio" id="No" name="Accidental" value="No">No<br>
                    </label>
                </div>

                <hr class="shine">

                <section class="adda">
                    <h3>Additional accessories</h3>

                    <p id="para">Does your car has Sunroof:</p>
                      <input type="radio" id="Yes" name="Sunroof" value="Yes">Yes
                      <input type="radio" id="No" name="Sunroof" value="No">No

                    <p id="para">Does your car has Rear-View Camera:</p>
                      <input type="radio" id="Yes" name="RVC" value="Yes" placeholder="Yes"> <input type="radio" id="No" name="RVC" value="No" placeholder="No">

                    <p id="para">Does your car have Auto AC:</p>
                      <input type="radio" id="Yes" name="AC" value="Yes">Yes
                      <input type="radio" id="No" name="AC" value="No">No
                      <br>
                </section>
                <button class="btn" name="submit">Submit</button>
            </form>
    </div>

</body>

</html>