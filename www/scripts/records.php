<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Stocktake Record #<?php echo $_REQUEST['id']?></title>
        <link rel="stylesheet" href="../style.css" type="text/css">
    </head>

    <body>
        <?php
            $db_host = '127.0.0.1';
            $db_name = 'stocktake';
            $db_user = 'root';
            $db_passwd = 'insecure_mysqlroot_pw';
            $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
            $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

            $stock_num = $_REQUEST['id'];
            $q = $pdo->query("SELECT * FROM StocktakeProds WHERE stocktake_num=$stock_num");
            echo "<h1>Stocktake Record #$stock_num</h1>\n
                    <table>\n
                    <tr>\n
                    <th>Name</th>
                    <th>Type</th>
                    <th>Desired Quantity</th>
                    <th>Current Quantity</th>
                    </tr>";

            while ($row = $q->fetch()) {
                echo '<tr><td>';
                echo $row['name'];
                echo '</td><td>';
                echo $row['type'];
                echo '</td><td>';
                echo $row['desired_quantity'];
                echo '</td><td>';
                if ($row["current_quantityInt"] == NULL) {
                    echo $row["current_quantityDec"];
                } else {
                    echo $row["current_quantityInt"];
                }
                echo '</td></tr>';
            }
            echo "</table>\n";
        ?>
    </body>
</html>

