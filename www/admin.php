<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Database test page</title>
        <style>

            h1, h2 {
                text-align: center;
            }

            table { 
                margin: auto;
            }

            input, select {
                margin: auto;
                display: inline-block;
                width: 10em;
            }


            #add_product {
                padding-top: 1em;
                display: grid;
                grid-template-columns: 12em 10em;
                row-gap: 0.6em;
            }

            #submit_product {
                margin: auto;
                width: 6em;
                grid-column: span 2;
            }

            #delete_product select, #delete_product input {
                margin-top: 0.8em;
                margin-bottom: 0.8em;
                text-align: center;
                display: block;
                width: 20em;
            }

            th { text-align: left; }

            table, th, td, fieldset {
            border: 2px solid grey;
            border-collapse: collapse;
            }

            section {
                margin: auto;
                width: 23.8em;
            }

            th, td {
            padding: 0.2em;
            }

        </style>
    </head>

    <body>
        <h1>Welcome to the admin website for super bartenders.</h1>

        <h2>Previous Stocktakes:</h2>

        <table>
            <tr><th>Date</th><th>StocktakeID</th><th>Go to stocktake</th></tr>

            <?php
            
                $db_host   = '127.0.0.1';
                $db_name   = 'stocktake';
                $db_user   = 'root';
                $db_passwd = 'insecure_mysqlroot_pw';

                $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                $q = $pdo->query("SELECT * FROM StocktakeRefs");

                while($row = $q->fetch()){
                echo '<tr><td>';
                echo $row['dt'];
                echo '</td><td>';
                echo $row['stock_num'];
                echo '<td><a href="scripts/records.php?id='.$row['stock_num'].'"><input type="submit" name="submit" 
                value="Open" class="Register" /></a></td>';
                }
                
            ?>
        </table>

        <h2>Current Stocktake Products</h2>
        <table>
            <tr><th>Product Name</th><th>Product Type</th><th>Unit</th><th>Volume</th><th>Full Weight (g)</th><th>Empty Weight (g)</th><th>Desired Quantity</th></tr>
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
                echo '</td><td>';
                echo $row["vol"];
                echo '</td><td>';
                echo $row["full_weight"];
                echo '</td><td>';
                echo $row["empty_weight"];
                echo '</td><td>';
                echo $row["desired_quantity"];
                echo '</td></tr>';
                }
                
            ?>
        </table>

        <section>
            <h2>Add a new Product.</h2>
            <form method="post" enctype="aplication/x-www-form-urlencoded" action="scripts/insert_product.php">
                <fieldset id="add_product">
                    <label for="name">Name of Product: </label><input type="text" placeholder="Product Name" id="name" name="name" maxlength="50" required>
                    <label for="type">Product Type: </label>
                    <select name="type" id="type">
                        <option value="Spirit">Spirit</option>
                        <option value="Beer">Beer</option>
                        <option value="Mixers">Mixers</option>
                        <option value="Misc">Misc</option>
                    </select>
                    <label for="unit">Unit: </label>
                    <select name="unit" id ="unit">
                        <option value="ml">ml</option>
                        <option value="L">L</option>
                        <option value="each">each</option>
                    </select>
                    <label for="volume">Volume: </label><input type="number" placeholder="Volume" id="volume" name="volume" min="0">
                    <label for="full_weight">Full Weight (g): </label><input type="number" placeholder="Full Weight" id="full_weight" name="full_weight" min="0">
                    <label for="empty_weight">Empty Weight (g): </label><input type="number" placeholder="Empty Weight" id="empty_weight" name="empty_weight" min="0">
                    <label for="dq">Desired Quantity (1-1000):</label><input type="number" id="dq" name="dq" min="1" max="1000" required>
                    <input type="submit" value="Submit" id="submit_product">
                </fieldset>
            </form>
            
            <h2>Delete a Product</h2>
            <form method="post" enctype="aplication/x-www-form-urlencoded" action="scripts/delete_product.php">
                <fieldset id="delete_product">
                    <select name="product" id="name">
                        <?php
                        
                            $db_host   = '127.0.0.1';
                            $db_name   = 'stocktake';
                            $db_user   = 'root';
                            $db_passwd = 'insecure_mysqlroot_pw';

                            $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                            $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                            $q = $pdo->query("SELECT * FROM Products");

                            while($row = $q->fetch()){
                            echo "<option value='" . $row["name"] . "|" . $row["type"] . "|" . $row["desired_quantity"] . "'>" 
                            . $row["name"] . ", " . $row["type"] . ", " . $row["desired_quantity"] . "</option>";
                            }
                        ?>
                    </select>
                    <input type="submit" value="Delete">
                </fieldset>
            </form>
        </section>
    </body>
</html>