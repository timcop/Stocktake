<?php
    $db_host = '127.0.0.1';
    $db_name = 'stocktake';
    $db_user = 'root';
    $db_passwd = 'insecure_mysqlroot_pw';

    // foreach ($_REQUEST['curr_count'] as $prod) {
    //     echo $prod . "<br>";
    // }
    // echo $nums;

    function isEmpty($table) {
        $q = $pdo->query("SELECT * FROM $table");
        if (!$q->fetch()) {
            return true;
        }
        return false;
    }

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    // Debug stuff 
    // $pdo->exec("INSERT INTO StocktakeProds VALUES ('b', 'b', 10, 10, 2)");
    // $pdo->exec("DELETE FROM StocktakeProds");

    // Find the max stocktake_num and set new num to max+1
    $max = $pdo->query("SELECT MAX(stocktake_num) FROM StocktakeProds")->fetch()[0];
    $stock_num = 0;
    if ($max == NULL) {
        $stock_num = 1;
    } else {
        $stock_num = $max + 1;
    }


    // print_r($_REQUEST);
    // Insert prods with their current counts 
    $tables = array("Spirits", "Wine", "Beer", "NonAlc");
    foreach ($tables as $table) {
        $values = $_REQUEST[$table];

        foreach ($values as $id => $count) {
            $rec = $pdo->query("SELECT * FROM $table WHERE id=$id")->fetch();
            if ($table == "Spirits" || $table == "Wine") {
                $insert = "INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES ('$rec[name]', '$rec[desired_quantity]', '$count', '$stock_num')";
                $pdo->exec($insert);
            } else {
                $insert = "INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES ('$rec[name]', '$rec[desired_quantity]', '$count', '$stock_num')";
                $pdo->exec($insert);
            }
        }
    }
    $count = 0;
    

    ### Add the reference to stocktake_refs
    date_default_timezone_set('Pacific/Auckland');
    $date = date('y-n-d H:i:s');
    // echo $date;

    $pdo->exec("INSERT INTO StocktakeRefs VALUES ('$date', $stock_num)");

    echo "<script>location.href='../.'</script>";

?>





    
