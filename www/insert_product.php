<?php
    $db_host = '127.0.0.1';
    $db_name = 'stocktake';
    $db_user = 'root';
    $db_passwd = 'insecure_mysqlroot_pw';

    $product_name = $_REQUEST['name'];
    $product_type = $_REQUEST['type'];

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    $sql = "INSERT INTO Products (name, type) VALUES ('" . $product_name . "','" . $product_type . "')";
    $pdo->exec($sql)
?>