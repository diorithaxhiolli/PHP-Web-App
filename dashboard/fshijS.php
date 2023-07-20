<?php

require "../functions/connect.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($connect, "DELETE FROM perdoruesi WHERE userID = '$id'; ");
    header("Location: ../dashboard/dashboard.php");
}