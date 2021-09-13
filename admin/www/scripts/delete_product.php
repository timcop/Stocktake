<?php

    ## DB LOGIN
    $db_host = '192.168.2.12';
    $db_name = 'stocktake';
    $db_user = 'admin';
    $db_passwd = 'insecure_db_admin_pw';
    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    # Get the product to be deleted from the HTML POST
    $product_to_delete = explode('|', $_REQUEST['product']);
    $product_name = $product_to_delete[0];
    $desired_quantity = $product_to_delete[1];
    

    # Loops through all tables and deletes the product that matches.
    # Note this method depends on there being a unique name and desired_quantity for each product
    # across all tables, so if there are multiple records with the same attributes in seperate tables
    # they will all be deleted.
    $tables = array("Spirits", "Wine", "Beer", "NonAlc"); # Tables in the database
    foreach($tables as $table) { 
        $query = "DELETE FROM $table WHERE name='$product_name' AND desired_quantity=$desired_quantity";
        $pdo->exec($query);
    }

    echo "<script>location.href='../index.php'</script>"; # Return to admin page 
?>