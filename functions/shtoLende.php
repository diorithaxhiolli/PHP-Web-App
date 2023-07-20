<?php
    
    require "../functions/connect.php";


    if(!isset($_POST['shtoSubmit'])){
        die();
    }
    else{
        $emri = mysqli_real_escape_string($connect, $_POST['lendeEmri']);
        $autori = mysqli_real_escape_string($connect, $_POST['lendeAutori']);
        $kredite= mysqli_real_escape_string($connect, $_POST['lendeKredite']);
        $drejtimi = mysqli_real_escape_string($connect, $_POST['lendetSelect']);
    }


    if(empty($emri) || empty($autori) || empty($kredite) || $drejtimi == "Zgjidh drejtimin e lendes" ){
        $error = "  <h3 class='error'>Te gjitha fushat duhet te plotesohen !</h3>";
    }
    else{
        $query = mysqli_query($connect, "SELECT * FROM drejtimi WHERE emri = '$drejtimi';");
        $query1 = mysqli_fetch_assoc($query);
        $drejt = $query1['drejtimi'];

        $insert = mysqli_query($connect, "INSERT INTO lenda (emri, autori, kredite, drejtim) VALUES ('$emri', '$autori', '$kredite', '$drejt')");
        $errorplus = "  <h3 class='errorplus'>Shtimi u realizua me sukses !</h3>";
    }