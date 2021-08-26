<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
    <head>
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

        <p>Showing contents of papers table:</p>

        <table border="1">
            <tr><th>Paper code</th><th>Paper name</th></tr>

            <?php
            
                $db_host   = '127.0.0.1';
                $db_name   = 'owner';
                $db_user   = 'root';
                $db_passwd = 'insecure_mysqlroot_pw';

                $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

                $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

                $q = $pdo->query("SELECT * FROM Stocktakes");

                while($row = $q->fetch()){
                echo "<tr><td>".$row["date"]."</td><td>".$row["uid"]."</td></tr>\n";
                }
                
            ?>
        </table>
    </body>
</html>