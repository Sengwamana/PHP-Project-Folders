<?php

    include './includes/dbconn.php';
    //Total Vehicle Entries
    $query=mysqli_query($con,"SELECT ID from vehicle_info where date(InTime)=CURDATE();");
    $count_parkings=mysqli_num_rows($query);

    echo $count_parkings
 ?>