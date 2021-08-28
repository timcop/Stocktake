<?php
    $db_host = '127.0.0.1';
    $db_name = 'stocktake';
    $db_user = 'root';
    $db_passwd = 'insecure_mysqlroot_pw';

    $product_name = $_REQUEST['name'];
    $product_type = $_REQUEST['type'];
    $desired_quantity = $_REQUEST['dq'] + 0;

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
    echo "Performed: INSERT INTO Products VALUES ('$product_name', '$product_type', $desired_quantity)";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    $sql = "INSERT INTO Products VALUES ('$product_name', '$product_type', $desired_quantity)";
    $pdo->exec($sql)
?>