<?php
    $con=mysqli_connect("localhost", "root", "12345", "vehicle-parking-db");
    if(mysqli_connect_errno()){
    echo "Connection Fail".mysqli_connect_error();
    }
  ?>