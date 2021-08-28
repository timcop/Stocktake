<?php
    $db_host = '127.0.0.1';
    $db_name = 'stocktake';
    $db_user = 'root';
    $db_passwd = 'insecure_mysqlroot_pw';

    $product_to_delete = explode('|', $_REQUEST['product']);
    $product_name = $product_to_delete[0];
    $product_type = $product_to_delete[1];
    $desired_quantity = $product_to_delete[2];
    
    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    $sql = "DELETE FROM Products WHERE name='$product_name' AND type='$product_type' AND desired_quantity=$desired_quantity";
    echo $sql;
    $pdo->exec($sql)
?>