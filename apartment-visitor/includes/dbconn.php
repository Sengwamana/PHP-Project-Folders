<?php
    $con=mysqli_connect("localhost", "root", "12345", "apartment-visitor-nb");
    if(mysqli_connect_errno()){
        echo "DB Connection Failed!".mysqli_connect_error();
    }
  ?>