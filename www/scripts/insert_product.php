<?php
    $db_host = '127.0.0.1';
    $db_name = 'stocktake';
    $db_user = 'root';
    $db_passwd = 'insecure_mysqlroot_pw';

    ## Must have these
    $product_name = $_REQUEST['name'];
    $product_type = $_REQUEST['type'];
    $product_unit = $_REQUEST['unit'];
    $desired_quantity = $_REQUEST['dq'];

    ## Optional
    $product_volume = $_REQUEST['volume'];
    $product_fullWeight = $_REQUEST['full_weight'];
    $product_emptyWeight = $_REQUEST['empty_weight'];


    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    $sql = "INSERT INTO Products (name, type, unit, desired_quantity) VALUES ('$product_name', '$product_type', '$product_unit', $desired_quantity)";
    $pdo->exec($sql);

    if (!empty($product_volume)) {
        $sql = "UPDATE Products SET vol=$product_volume WHERE name='$product_name'";
        $pdo->exec($sql);
    }
    if (!empty($product_fullWeight)) {
        $sql = "UPDATE Products SET full_weight=$product_fullWeight WHERE name='$product_name'";
        $pdo->exec($sql);
    }
    if (!empty($product_emptyWeight)) {
        $sql = "UPDATE Products SET empty_weight=$product_emptyWeight WHERE name='$product_name'";
        $pdo->exec($sql);
    }
?>