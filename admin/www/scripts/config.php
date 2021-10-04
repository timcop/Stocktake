<?php
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */

    $db_host   = 'database-1.crx8snaug9em.us-east-1.rds.amazonaws.com'; # Change this to RDS instance endpoint.
    $db_name   = 'stocktake';
    $db_user   = 'database1';
    $db_passwd = 'database-1'; # Change this too.

    $pdo_dsn = "mysql:host=$db_host;port=3306;dbname=$db_name";

    /* Attempt to connect to MySQL database */
    try{
        // $pdo_dsn = "mysql:host=" . DB_HOST . ";port=3306;dbname=" . DB_NAME;
        $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }
?>