<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Database test page</title>
        <style>

            table {
                margin: auto;
            }

            h1, h2, p {
                text-align: center;
            }

            #blank_cell {
                text-align: center;
            }

            #stocktake {
                margin: auto;
                width: 60%;
                display: grid;
                grid-template-columns: 1fr 1fr 1fr 1fr;
            }

            #stocktake p:nth-child(-n+4) {
                border: 1px solid;
            }

            #stocktake p + input {
                height: 1em;
                width: 8em;
                margin: auto;
            }

            #submit_stocktake {
                margin: auto;
                width: 10em;
                grid-column: span 4;
            }

            th { 
                text-align: left; 
            }

            table, th, td, fieldset {
            border: 2px solid grey;
            border-collapse: collapse;
            }

            th, td {
                padding: 0.2em;
            }

            form { 
                margin: auto;
                text-align: center;
            }

        </style>
    </head>

    <body>
        <h1>Database test page</h1>

        <p>Welcome to the stocktaking site!</p>
        <section>
        <h2>Current Products</h2>
            <table>
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
                    if ($row['volume'] > 0) {
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
                    <p>Current Quantity (0-1000)</p>
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
                              <p>" . $row["desired_quantity"] . "</p>\n
                              <input type='number' min='0' max='1000' name='curr_count[]' required>\n";
                    }
                    ?>
                    <input id="submit_stocktake" type="submit" value="Submit Stocktake">
                </fieldset>
            </form>
        </section>
        <section>
            <h2 id="converter">Calculator to convert weight into volume!</h2>
            <form method="post" enctype="aplication/x-www-form-urlencoded" action="scripts/calculate.php" text-align="left">
                <fieldset>
                    <select name="product" id="name">
                        <?php
                            $db_host   = '127.0.0.1';
                            $db_name   = 'stocktake';
                            $db_user   = 'user';
                            $db_passwd = 'insecure_db_pw';
        
                            $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
        
                            $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                            $sql = "SELECT name FROM Products";
                            $q = $pdo->query($sql);

                            while ($row = $q->fetch()) {
                                ?>
                                <option value="name1"><?php echo $row['name']; ?> </option>
                                <?php
                            }
                            ?>
                    </select>
                    <label for="current_weight">Current Weight (g): </label>
                    <input type="number" placeholder="Current Weight" id="current_weight" name="current_weight" min="0">
                    <input type="submit" value="Calculate!">
                </fieldset>
            </form>
        </section>
    </body>
</html>
