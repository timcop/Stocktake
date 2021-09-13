<?php

    ## DB LOGIN
    $db_host = '192.168.2.12';
    $db_name = 'stocktake';
    $db_user = 'admin';
    $db_passwd = 'insecure_db_admin_pw';
    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    # Returns true if the table is empty
    function isEmpty($table) {
        $q = $pdo->query("SELECT * FROM $table");
        if (!$q->fetch()) {
            return true;
        }
        return false;
    }

    # Find the max stocktake_num and set new num to max+1 
    $max = $pdo->query("SELECT MAX(stocktake_num) FROM StocktakeProds")->fetch()[0];
    $stock_num = 0;
    if ($max == NULL) {
        $stock_num = 1;
    } else {
        $stock_num = $max + 1;
    }

    # Inserts into stocktake prods the current counts that were recorded from stocktake.
    # $_REQUEST is an associative array with keys for each table,
    # within these is an array of keys for the product id for it's table,
    # which has it's current count recorded in the stocktake.
    # 
    # e.g $_REQUEST['Spirits']['id'] = current_count for that id in Spirits
    $tables = array("Spirits", "Wine", "Beer", "NonAlc"); # Product tables 
    foreach ($tables as $table) {
        $values = $_REQUEST[$table]; # an associative array with keys = "id", values = current_counts

        foreach ($values as $id => $count) { #$id = product id for that table, $count = current_count 
            $rec = $pdo->query("SELECT * FROM $table WHERE id=$id")->fetch();

            # Enter a decimal current count for spirits/wine
            if ($table == "Spirits" || $table == "Wine") {
                $insert = "INSERT INTO StocktakeProds (name, desired_quantity, current_quantityDec, stocktake_num) VALUES ('$rec[name]', '$rec[desired_quantity]', '$count', '$stock_num')";
                $pdo->exec($insert);
            } else { # Either Beer or NonAlc, in both cases we want an integer current count 
                $insert = "INSERT INTO StocktakeProds (name, desired_quantity, current_quantityInt, stocktake_num) VALUES ('$rec[name]', '$rec[desired_quantity]', '$count', '$stock_num')";
                $pdo->exec($insert);
            }
        }
    }
    
    ### Add the reference to stocktake_refs
    # This can be changed dependent on where the user is / their date-time preference
    date_default_timezone_set('Pacific/Auckland');
    $date = date('y-n-d H:i:s');

    # This references the products we just inserted into StocktakeProds with the same $stock_num
    $pdo->exec("INSERT INTO StocktakeRefs VALUES ('$date', $stock_num)");

    # Return to stocktake page
    echo "<script>location.href='../.'</script>";
?>





    
