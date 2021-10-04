<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, otherwise redirect to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: signing/login.php");
        exit;
    }
    // Include config file
    require_once "config.php";
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Stocktake App</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script>

            // Returns a rounded number to 2 decimal places
            function round(num) {
                var m = Number((Math.abs(num) * 100).toPrecision(15));
                return Math.round(m) / 100 * Math.sign(num);
            }

            // Calculates the current volume of a bottle and displays it for the user 
            function calculateVolume(e) {

                e.preventDefault();

                var values = document.getElementById('converter').selectedOptions[0].value
                var current_weight = document.getElementById('current_weight').value;
                current_weight = parseFloat(current_weight); 
                var vol_array = values.split(" ");
                var empty_weight = vol_array[0];
                var full_weight = vol_array[1];

                if (Number.isNaN(current_weight)) {
                    document.querySelectorAll('#vol_calc').forEach(function(element) {
                        element.innerHTML = "Please enter a current weight.";
                        element.style.display = "block";
                    });
                } else if (current_weight < empty_weight || current_weight > full_weight) {
                    document.querySelectorAll('#vol_calc').forEach(function(element) {
                        element.innerHTML = "INVALID WEIGHT: Please enter a weight between Empty Weight: " + empty_weight.toString()
                        + "g and Full Weight: " + full_weight.toString() + "g";
                        element.style.display = "block";                        
                    });
                } else {
                    // Everything is still a string.
                    
                    var full_vol = vol_array[2];
                    var fluid_weight = full_weight-empty_weight;
                    var current_weight_ratio = (current_weight-empty_weight)/fluid_weight;
                    var current_volume = current_weight_ratio*full_vol;
                    var percentage = round(current_weight_ratio*100);


                    // Set vol calc to what we want.
                    document.querySelectorAll('#vol_calc').forEach(function(element) {
                        element.innerHTML = round(current_volume).toString() + "ml" + ", or " 
                        + round(current_weight_ratio) + " of 1 bottle.";
                        element.style.display = "block";
                    });
                }
            }
        </script>
    </head>

    <body>
        <h1>Stocktake App</h1>

        <p>Welcome to the stocktaking app for [insert your bar name here]!</p>
        
        <section>
            <h2 id="start_text">Start a Stocktake</h2>
            <form method="post" enctype="aplication/x-www-form-urlencoded" action="scripts/submit_stocktake.php">
                <fieldset id="stocktake">
                    <!-- <legend>Spirits</legend> -->
                    <p>Product Name</p>
                    <p>Desired Quantity</p>
                    <p>Current Quantity</p>
                    <?php
 
                        # Loop through the tables displaying each item with current_count input as an option next to each
                        $tables = array("Spirits", "Wine", "Beer", "NonAlc");
                        foreach($tables as $table) {
                            $sql = "SELECT * FROM $table";
                            $q = $pdo->query($sql);
                            while($row = $q->fetch()){
                                echo "<p>" . $row["name"] . "</p>\n
                                    <p>" . $row["desired_quantity"] . "</p>\n";
                                if ($table == "Spirits" || $table == "Wine") {
                                    echo "<input type='number' min='0' max='1000' name=" . $table ."[" . $row['id'] . "] step='any' placeholder='(0.0-1000.0)'' required>\n";
                                } else {
                                    echo "<input type='number' min='0' max='1000' name=" . $table ."[" . $row['id'] . "] step='any' placeholder='(0-1000)'' required>\n";
                                }
                            }
                        }
                    ?>
                    <input id="submit_stocktake" type="submit" value="Submit Stocktake">
                </fieldset>
            </form>
        </section>
        <section>
            <h2>Calculator to convert weight into volume!</h2>
            <form action="#" onsubmit="calculateVolume(event)">
                <fieldset id="calculator">
                    <select name="product" id="converter">
                        <?php

                            # Union spirits and wine as these are the only tables that can be used with the calculator 
                            $sql = "SELECT * FROM Spirits UNION SELECT * FROM Wine";
                            $q = $pdo->query($sql);

                            while ($row = $q->fetch()) {
                                if ($row['empty_weight'] != NULL && $row['full_weight'] != NULL) {
                                    echo "<option value='" . 
                                                            $row['empty_weight'] . " " .
                                                            $row['full_weight'] . " " .
                                                            $row['volume'] . 
                                        "'>" . $row['name'] . "</option>\n";
                                }
                            }
                        ?>
                    </select>
                    <label for="current_weight">Current Weight (g): </label>
                    <input type="number" placeholder="Current Weight" id="current_weight" name="current_weight" min="0">
                    <input type="submit" value="Calculate!">
                    <p id="vol_calc"></p>
                </fieldset>
            </form>
        </section>
        <div>
        <section>
            <h2>Logout</h2>
            <form action="signing/logout.php">
                <input type="submit" value="Logout"/>
            </form>
        </section>
        </div>
    </body>
</html>
