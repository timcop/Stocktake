<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Database test page</title>
        <style>

            #start_text {
                text-align: center;
            }

            #submit_stocktake {
                margin: auto;
                width: 10em;
                display: block;
            }

            th { 
                text-align: left; 
            }

            table, th, td {
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

            form fieldset > div {
                margin: auto;
                width: 60%;
            }

            form fieldset div p, div {
                width: 20%;
                display: inline-block;
            }

            form fieldset div input {
                width: 3.8em;
                display: inline-block;
            }

            form fieldset div:first-of-type p {
                border: 1px solid;
            }
        </style>
    </head>

    <body>
        <h1>Database test page</h1>

        <p>Welcome to the stocktaking site!</p>
        <section>
        <h2>Current Products</h2>
            <table>
                <tr><th>Product Name</th><th>Product Type</th><th>Desired Quantity</th></tr>

                <?php
                
                    $db_host   = '127.0.0.1';
                    $db_name   = 'stocktake';
                    $db_user   = 'user';
                    $db_passwd = 'insecure_db_pw';

                    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                    $q = $pdo->query("SELECT * FROM Products");

                    while($row = $q->fetch()){
                        echo "<tr><td>".$row["name"]."</td><td>".$row["type"]."</td><td>".$row["desired_quantity"]."</td></tr>\n";
                    }
                    
                ?>
            </table>
        </section>
        <section>
            <h2 id="start_text">Start a Stocktake</h2>
            <form method="post" enctype="aplication/x-www-form-urlencoded" action="">
                <fieldset>
                    <div>
                        <p>Product Name</p>
                        <p>Product Type</p>
                        <p>Desired Quantity</p>
                        <p>Current Quantity (0-1000)</p>
                    </div>
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
                        echo "<div>\n
                                <p>" . $row["name"] . "</p>\n
                                <p>" . $row["type"] . "</p>\n
                                <p>" . $row["desired_quantity"] . "</p>\n
                                <div>\n
                                    <input type='number' min='0' max='1000' name='product" . $productnum . "' required>\n
                                </div>\n
                              </div>\n";
                    }
                    ?>
                    <input id="submit_stocktake" type="submit" value="Submit Stocktake">
                </fieldset>
            </form>
        </section>
    </body>
</html>
