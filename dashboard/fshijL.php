<?php

require "../functions/connect.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($connect, "DELETE FROM lenda WHERE lendaID = '$id'; ");
    header("Location: ../dashboard/lendet.php");
}