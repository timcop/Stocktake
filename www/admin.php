<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stocktake App Admin Page</title>
        <link rel="stylesheet" href="style.css" type="text/css">

        <script>
            function showOptions(element) {
                var selectedValue = element.options[element.selectedIndex].value;
                if (selectedValue == "each") {
                    document.querySelectorAll('.liquid').forEach(function(element) {
                    element.style.display = "none";
                });
                } else {
                    document.querySelectorAll('.liquid').forEach(function(element) {
                    element.style.display = "inline-block";
                });
                }
            }
        </script>
    </head>

    <body>
        <h1>Stocktake App Admin Page</h1>

        <p>Welcome to the Admin page for Super Bartenders.</p>

        <h2>Previous Stocktakes:</h2>

        <table id="prev_stocktakes">
            <tr><th>Date</th><th>Stocktake ID #</th><th>Go to stocktake</th></tr>

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
            <h3> Spirits </h3>
                <table class="current">
                    <tr><th>Product Name</th><th>Volume (ml)</th><th>Full Weight (g)</th><th>Empty Weight (g)</th><th>Desired Quantity</th></tr>
                    <?php

                        $db_host   = '127.0.0.1';
                        $db_name   = 'stocktake';
                        $db_user   = 'root';
                        $db_passwd = 'insecure_mysqlroot_pw';

                        $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                        $q = $pdo->query("SELECT * FROM Spirits");

                        while($row = $q->fetch()){
                            echo '<tr><td>';
                            echo $row["name"];
                            echo '</td><td>';
                            echo $row["volume"];
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
                <h3> Wine </h3>
                <table class="current">
                    <tr><th>Product Name</th><th>Volume (ml)</th><th>Full Weight (g)</th><th>Empty Weight (g)</th><th>Desired Quantity</th></tr>
                    <?php

                        $db_host   = '127.0.0.1';
                        $db_name   = 'stocktake';
                        $db_user   = 'root';
                        $db_passwd = 'insecure_mysqlroot_pw';

                        $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                        $q = $pdo->query("SELECT * FROM Wine");

                        while($row = $q->fetch()){
                            echo '<tr><td>';
                            echo $row["name"];
                            echo '</td><td>';
                            echo $row["volume"];
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
                <h3> Beer </h3>
                <table class="current">
                    <tr><th>Product Name</th><th>Desired Quantity</th></tr>
                    <?php

                        $db_host   = '127.0.0.1';
                        $db_name   = 'stocktake';
                        $db_user   = 'root';
                        $db_passwd = 'insecure_mysqlroot_pw';

                        $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                        $q = $pdo->query("SELECT * FROM Beer");

                        while($row = $q->fetch()){
                            echo '<tr><td>';
                            echo $row["name"];
                            echo '</td><td>';
                            echo $row["desired_quantity"];
                            echo '</td></tr>';
                        }  
                    ?>
                </table>
                <h3> Non-Alcholic </h3>
                <table class="current">
                    <tr><th>Product Name</th><th>Desired Quantity</th></tr>
                    <?php

                        $db_host   = '127.0.0.1';
                        $db_name   = 'stocktake';
                        $db_user   = 'root';
                        $db_passwd = 'insecure_mysqlroot_pw';

                        $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                        $q = $pdo->query("SELECT * FROM NonAlc");

                        while($row = $q->fetch()){
                            echo '<tr><td>';
                            echo $row["name"];
                            echo '</td><td>';
                            echo $row["desired_quantity"];
                            echo '</td></tr>';
                        }  
                    ?>
                </table>
        <section class="admin_section">
            <h2>Add a new Product.</h2>
            <form method="post" enctype="aplication/x-www-form-urlencoded" action="scripts/insert_product.php">
                <fieldset id="add_product">
                    <label for="name">Name of Product: </label><input type="text" placeholder="Product Name" id="name" name="name" maxlength="50" required>
                    <label for="type">Product Type: </label>
                    <select name="type" id="type">
                        <option value="Spirit">Spirit</option>
                        <option value="Wine">Wine</option>
                        <option value="Beer">Beer</option>
                        <option value="NonAlc">NonAlc</option>
                    </select>
                    <!-- <label for="unit">Unit: </label>
                    <select name="unit" id ="unit" onchange="showOptions(this)">
                        <option value="ml">ml</option>
                        <option value="L">L</option>
                        <option value="each">each</option>
                    </select> -->
                    <label for="volume" class="liquid">Volume: </label><input type="number" placeholder="Volume" id="volume" class="liquid" name="volume" min="0">
                    <label for="full_weight" class="liquid">Full Weight (g): </label><input type="number" placeholder="Full Weight" id="full_weight" class="liquid" name="full_weight" min="0">
                    <label for="empty_weight" class="liquid">Empty Weight (g): </label><input type="number" placeholder="Empty Weight" id="empty_weight" class="liquid" name="empty_weight" min="0">
                    <label for="dq">Desired Quantity:</label><input type="number" id="dq" name="dq" min="1" max="1000" placeholder="(1-1000)"required>
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

                            $sql = "SELECT name, desired_quantity FROM Spirits
                             UNION SELECT name, desired_quantity FROM Wine
                             UNION SELECT * FROM Beer
                             UNION SELECT * FROM NonAlc";
                            $q = $pdo->query($sql);

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