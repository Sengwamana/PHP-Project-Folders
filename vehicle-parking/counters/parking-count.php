<?php

    include './includes/dbconn.php';

    $query3=mysqli_query($con,"SELECT ID from vehicle_info");
    $count_parkings=mysqli_num_rows($query3);

    echo $count_parkings
 ?>