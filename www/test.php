<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin Database test page</title>
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
        <h1>Welcome to the admin website for super bartenders.</h1>

        <h2>Previous Stocktakes:</h2>

        <table border="1">
            <tr><th>Stocktake#</th><th>Date</th></tr>

            <?php
            
                $db_host   = '127.0.0.1';
                $db_name   = 'owner';
                $db_user   = 'root';
                $db_passwd = 'insecure_mysqlroot_pw';

                $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                $q = $pdo->query("SELECT * FROM Stocktakes");

                while($row = $q->fetch()){
                echo "<tr><td>".$row["uid"]."</td><td>".$row["date"]."</td></tr>\n";
                }
                
            ?>
        </table>

        <h2>Current Stocktake Products</h2>
        <table border="1">
            <tr><th>Product Name</th><th>Product Type</th></tr>
            <?php

                $db_host   = '127.0.0.1';
                $db_name   = 'stocktake';
                $db_user   = 'root';
                $db_passwd = 'insecure_mysqlroot_pw';

                $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                $q = $pdo->query("SELECT * FROM Products");

                while($row = $q->fetch()){
                echo "<tr><td>".$row["name"]."</td><td>".$row["type"]."</td></tr>\n";
                }
                
            ?>
        </table>

        <section>
            <h2>Add a new Product to the stocktaking list.</h2>
            <form method="post" enctype="aplication/x-www-form-urlencoded" action="insert_product.php">
                <fieldset>
                <label for="name">Name of Product: </label><input type="text" placeholder="Product Name" id="name" name="name" maxlength="50" required>
                <label for="type">Type of Product: </label>
                <select name="type" id="type">
                    <option value="Spirit">Spirit</option>
                    <option value="Beer">Beer</option>
                </select>    
                <input type="submit" value="Submit">
                </fieldset>
            </form>
        </section>
        
    </body>
</html>