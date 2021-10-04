<?php

    ## DB LOGIN
    // $referer = $_SERVER['HTTP_REFERER'];
    // echo $referer;
    // $username = $_REQUEST['username'];
    // $password = $_REQUEST['password'];

    // echo $username;
    // echo $password;

    // $db_host   = 'database-1.crx8snaug9em.us-east-1.rds.amazonaws.com'; # Change this to RDS instance endpoint.
    // $db_name   = 'stocktake';
    // $db_user   = 'database1';
    // $db_passwd = 'database-1'; # Change this too.

    // $pdo_dsn = "mysql:host=$db_host;port=3306;dbname=$db_name";
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);

    require_once "config.php";





    $q = $pdo->query("SELECT * FROM Wine");

    while ($row=$q->fetch()) {
        echo $row['name'];
    }

    // $row = $q->fetch();

    // if ($row['num'] == 0) {
    //     echo "<script>location.href='../login.php'</script>"; #Return to index page
    // } else {
    //     echo "<script>location.href='../index.php'</script>"; #Return to index page
    // }

?>