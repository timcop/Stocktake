<?php

    ## DB LOGIN
    $db_host = '192.168.2.12';
    $db_name = 'stocktake';
    $db_user = 'admin';
    $db_passwd = 'insecure_db_admin_pw';   
    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    ## Must have these
    $product_name = $_REQUEST['name'];
    $desired_quantity = $_REQUEST['dq'];
    $product_category = $_REQUEST['category'];

    ## Optional
    $product_volume = $_REQUEST['volume'];
    $product_fullWeight = $_REQUEST['full_weight'];
    $product_emptyWeight = $_REQUEST['empty_weight'];

    # First insert record into the respective table with the must have values
    $sql = "INSERT INTO $product_category (name, desired_quantity) VALUES ('$product_name', $desired_quantity)";
    $pdo->exec($sql);

    # Then check for the optional values existing, if so update the record created in the previous step
    if (!empty($product_volume)) { 
        $sql = "UPDATE $product_category SET volume=$product_volume WHERE name='$product_name'";
        $pdo->exec($sql);
    }
    if (!empty($product_fullWeight)) {
        $sql = "UPDATE $product_category SET full_weight=$product_fullWeight WHERE name='$product_name'";
        $pdo->exec($sql);
    }
    if (!empty($product_emptyWeight)) {
        $sql = "UPDATE $product_category SET empty_weight=$product_emptyWeight WHERE name='$product_name'";
        $pdo->exec($sql);
    }

    echo "<script>location.href='../index.php'</script>"; #Return to index page
?>