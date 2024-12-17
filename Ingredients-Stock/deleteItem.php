<?php

session_start();

include ('connection/mysqli.php');
                                     
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $deleteQuery="DELETE FROM stock_ingredients WHERE Id=$id"; 
    mysqli_query($mysqli, $deleteQuery);

    echo "<script>window.location = 'add_stock.php';</script>";
} else {
    echo "ERROR!";
}

?>