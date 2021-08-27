<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Database test page</title>
        <style>
            th { text-align: left; }

            table, th, td {
            border: 2px solid grey;
            border-collapse: collapse;
            }

            th, td {
            padding: 0.2em;
            }
        </style>
    </head>

    <body>
        <h1>Database test page</h1>

        <p>Welcome to the stocktaking site!</p>

        <table border="1">
            <tr><th>Product Name</th><th>Product Type</th></tr>

            <?php
            
                $db_host   = '127.0.0.1';
                $db_name   = 'stocktake';
                $db_user   = 'user';
                $db_passwd = 'insecure_db_pw';

                $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                $q = $pdo->query("SELECT * FROM Products");

                while($row = $q->fetch()){
                echo "<tr><td>".$row["name"]."</td><td>".$row["type"]."</td></tr>\n";
                }
                
            ?>
        </table>
    </body>
</html>
