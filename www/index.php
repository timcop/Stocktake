<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Stocktake App</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script>
            function calculateVolume(element) {
                var values = document.getElementById('converter').selectedOptions[0].value

                var current_weight = document.getElementById('current_weight').value;
                console.log(current_weight);
                var current_int = parseInt(current_weight);

                if (Number.isNaN(current_int)) {
                    document.querySelectorAll('#vol_calc').forEach(function(element) {
                        element.innerHTML = "Please enter a current weight.";
                        element.style.display = "block";
                    });
                } else {
                    // Everything is still a string.
                    var vol_array = values.split(" ");
                    var unit = vol_array[0];
                    var empty_weight = vol_array[1];
                    var full_vol = vol_array[2];
                    var vol = current_int - parseInt(empty_weight);
                    var percentage = vol / full_vol;
                    percentage = Math.round(percentage*100);
                    // Set vol calc to what we want.
                    document.querySelectorAll('#vol_calc').forEach(function(element) {
                        element.innerHTML = vol.toString() + unit + ", or " 
                        + percentage + "% of 1 bottle.";
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
        <h2>Current Products</h2>
            <table class="current">
                <tr><th>Product Name</th><th>Product Type</th><th>Unit</th><th>Volume</th><th>Desired Quantity</th></tr>
                <?php

                    $db_host   = '127.0.0.1';
                    $db_name   = 'stocktake';
                    $db_user   = 'root';
                    $db_passwd = 'insecure_mysqlroot_pw';

                    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                    $q = $pdo->query("SELECT * FROM Products");

                    while($row = $q->fetch()){
                    echo '<tr><td>';
                    echo $row["name"];
                    echo '</td><td>';
                    echo $row["type"];
                    echo '</td><td>';
                    echo $row["unit"];
                    echo '</td>';
                    if ($row['vol'] != NULL) {
                        echo '<td>' . $row["vol"];
                    } else {
                        echo "<td id='blank_cell'>-";
                    }
                    echo '</td><td>';
                    echo $row["desired_quantity"];
                    echo '</td></tr>';
                    }
                    
                ?>
            </table>
        </section>
        <section>
            <h2 id="start_text">Start a Stocktake</h2>
            <form method="post" enctype="aplication/x-www-form-urlencoded" action="scripts/submit_stocktake.php">
                <fieldset id="stocktake">
                    <p>Product Name</p>
                    <p>Product Type</p>
                    <p>Desired Quantity</p>
                    <p>Current Quantity</p>
                    <?php
                        
                    $db_host   = '127.0.0.1';
                    $db_name   = 'stocktake';
                    $db_user   = 'user';
                    $db_passwd = 'insecure_db_pw';

                    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                    $q = $pdo->query("SELECT * FROM Products");
                    $product_num = 0;
                    while($row = $q->fetch()){
                        $product_num++;
                        echo "<p>" . $row["name"] . "</p>\n
                              <p>" . $row["type"] . "</p>\n
                              <p>" . $row["desired_quantity"] . "</p>\n";
                        if($row["unit"] == "each") {
                            echo "<input type='number' min='0' max='1000' name='curr_count[]' placeholder='(0-1000)' required>\n";
                        } else {
                            echo "<input type='number' min='0' max='1000' name='curr_count[]' step='any' placeholder='(0.0-1000.0)'' required>\n";
                        }
                    }
                    ?>
                    <input id="submit_stocktake" type="submit" value="Submit Stocktake">
                </fieldset>
            </form>
        </section>
        <section>
            <h2>Calculator to convert weight into volume!</h2>
            <form>
                <fieldset id="calculator">
                    <select name="product" id="converter">
                        <?php
                            $db_host   = '127.0.0.1';
                            $db_name   = 'stocktake';
                            $db_user   = 'user';
                            $db_passwd = 'insecure_db_pw';
        
                            $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
        
                            $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                            $sql = "SELECT * FROM Products";
                            $q = $pdo->query($sql);

                            while ($row = $q->fetch()) {
                                if ($row['unit'] != 'each') {
                                    echo "<option value='" . $row['unit'] . " " .
                                                             $row['empty_weight'] . " " .
                                                             $row['vol'] . 
                                        "'>" . $row['name'] . "</option>\n";
                                }
                            }
                        ?>
                    </select>
                    <label for="current_weight">Current Weight (g): </label>
                    <input type="number" placeholder="Current Weight" id="current_weight" name="current_weight" min="0">
                    <input type="button" value="Calculate!" onclick="calculateVolume(this)">
                    <p id="vol_calc"></p>
                </fieldset>
            </form>
        </section>
    </body>
</html>
