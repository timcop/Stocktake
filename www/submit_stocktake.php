<?php
    $db_host = '127.0.0.1';
    $db_name = 'stocktake';
    $db_user = 'root';
    $db_passwd = 'insecure_mysqlroot_pw';

    // foreach ($_REQUEST['curr_count'] as $prod) {
    //     echo $prod . "<br>";
    // }
    // echo $nums;
    $curr_counts = $_REQUEST['curr_count'];

    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    $q = $pdo->query("SELECT * FROM Products");
    
    $count = 0;
    while ($row = $q->fetch()) {
        $sql = "INSERT INTO StocktakeProds VALUES ('$row[name]', '$row[type]', $row[desired_quantity], $curr_counts[$count])";
        $pdo->exec($sql);
        $count++;
    }
?>





    
