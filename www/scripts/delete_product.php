<?php
    $db_host = '127.0.0.1';
    $db_name = 'stocktake';
    $db_user = 'root';
    $db_passwd = 'insecure_mysqlroot_pw';

    $product_to_delete = explode('|', $_REQUEST['product']);
    $product_name = $product_to_delete[0];
    $desired_quantity = $product_to_delete[1];
    echo $product_name;
    echo $desired_quantity;
    
    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    $tables = array("Spirits", "Wine", "Beer", "NonAlc");
    foreach($tables as $table) {
        $query = "DELETE FROM $table WHERE name='$product_name' AND desired_quantity=$desired_quantity";
        $pdo->exec($query);
    }

    echo "<script>location.href='../admin.php'</script>";
?>