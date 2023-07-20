<?php

    $connect = mysqli_connect("localhost", "root", "", "riti");

    if(!$connect){
        die(mysqli_connect_error());
    }