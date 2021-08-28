<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Stocktake Record</title>
        <style>
            th { text-align: left; }

            table, th, td, fieldset {
            border: 2px solid grey;
            border-collapse: collapse;
            }

            th, td {
            padding: 0.2em;
            }

            fieldset {
                width: 40%;
            }
        </style>
    </head>

    <body>
        <h1>Stocktake Record</h1>

        <h2>Record</h2>

        <table border='1'>
            <tr><th>Name</th><th>Type</th><th>Derired quantity</th><th>Current quantity</th><th>Stocktake #</th></tr>

            <?php
                $db_host = '127.0.0.1';
                $db_name = 'stocktake';
                $db_user = 'root';
                $db_passwd = 'insecure_mysqlroot_pw';
                $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
                $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                $stock_num = $_REQUEST['id'];
                $q = $pdo->query("SELECT * FROM StocktakeProds WHERE stocktake_num=$stock_num");

                while ($row = $q->fetch()) {
                    echo '<tr><td>';
                    echo $row['name'];
                    echo '</td><td>';
                    echo $row['type'];
                    echo '</td><td>';
                    echo $row['desired_quantity'];
                    echo '</td><td>';
                    echo $row['current_quantity'];
                    echo '</td><td>';
                    echo $row['stocktake_num'];
                    echo '</td><td>';
                }
            ?>
        </table>
    </body>
</html>

