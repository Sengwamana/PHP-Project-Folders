<?php

    $dsn = 'mysql:host=localhost; dbname=expenseman';
    $user = 'root';
    $pass = '12345';

    try {
        $pdo = new PDO($dsn, $user, $pass);
    }
    catch(PDOException $e){
        echo "Connection Error! ". $e->getMessage();
    }
?>

