<?php
    $db_host = '127.0.0.1';
    $db_name = 'stocktake';
    $db_user = 'root';
    $db_passwd = 'insecure_mysqlroot_pw';

    ## Must have these
    $product_name = $_REQUEST['name'];
    $product_type = $_REQUEST['type'];
    $desired_quantity = $_REQUEST['dq'];

    ## Optional
    $product_volume = $_REQUEST['volume'];
    $product_fullWeight = $_REQUEST['full_weight'];
    $product_emptyWeight = $_REQUEST['empty_weight'];


    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    // echo $product_type;

    if ($product_type == 'Spirit') {
        $sql = "INSERT INTO Spirits (name, desired_quantity) VALUES ('$product_name', $desired_quantity)";
        $pdo->exec($sql);

        if (!empty($product_volume)) {
            $sql = "UPDATE Spirits SET volume=$product_volume WHERE name='$product_name'";
            $pdo->exec($sql);
        }
        if (!empty($product_fullWeight)) {
            $sql = "UPDATE Spirits SET full_weight=$product_fullWeight WHERE name='$product_name'";
            $pdo->exec($sql);
        }
        if (!empty($product_emptyWeight)) {
            $sql = "UPDATE Spirits SET empty_weight=$product_emptyWeight WHERE name='$product_name'";
            $pdo->exec($sql);
        }
    }

    elseif ($product_type == 'Wine') {
        $sql = "INSERT INTO Wine (name, desired_quantity) VALUES ('$product_name', $desired_quantity)";
        $pdo->exec($sql);

        if (!empty($product_volume)) {
            $sql = "UPDATE Wine SET volume=$product_volume WHERE name='$product_name'";
            $pdo->exec($sql);
        }
        if (!empty($product_fullWeight)) {
            $sql = "UPDATE Wine SET full_weight=$product_fullWeight WHERE name='$product_name'";
            $pdo->exec($sql);
        }
        if (!empty($product_emptyWeight)) {
            $sql = "UPDATE Wine SET empty_weight=$product_emptyWeight WHERE name='$product_name'";
            $pdo->exec($sql);
        }
    }
    elseif ($product_type == 'Beer') {
        $sql = "INSERT INTO Beer VALUES ('$product_name', $desired_quantity)";
        $pdo->exec($sql);
    }
    elseif ($product_type == 'NonAlc') {
        $sql = "INSERT INTO NonAlc VALUES ('$product_name', $desired_quantity)";
        $pdo->exec($sql);
    }

    echo "<script>location.href='../admin.php'</script>";
?>