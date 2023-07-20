<?php
    
    require "../functions/connect.php";


    if(!isset($_POST['shtoSubmit1'])){
        die();
    }
    else{
        $emri = mysqli_real_escape_string($connect, $_POST['shtoName']);
        $mbiemri= mysqli_real_escape_string($connect, $_POST['shtoMbiemri']);
        $email= mysqli_real_escape_string($connect, $_POST['shtoEmail']);
        $user = mysqli_real_escape_string($connect, $_POST['shtoUser']);
        $pass = mysqli_real_escape_string($connect, $_POST['shtoPass']);
        $drejtimi = mysqli_real_escape_string($connect, $_POST['shtoSelect']);
        $roli = mysqli_real_escape_string($connect, $_POST['shtoSelect1']);
    }


    if(empty($emri) || empty($mbiemri) || empty($email) || empty($user) || empty($pass) || $drejtimi == "Zgjidh drejtimin" || $roli== "Zgjidh rolin"  ){
        $error = "  <h3 class='error'>Te gjitha fushat duhet te plotesohen !</h3>";
    }
    else{
        $query = mysqli_query($connect, "SELECT * FROM drejtimi WHERE emri = '$drejtimi';");
        $query1 = mysqli_fetch_assoc($query);
        $drejt = $query1['drejtimi'];

        if($roli == "student"){
            $insert = mysqli_query($connect, "INSERT INTO perdoruesi (emri, mbiemri, email, userName, passwordi, drejtimi) VALUES ('$emri', '$mbiemri', '$email','$user',md5('$pass'), '$drejt')");
            $errorplus = "  <h3 class='errorplus'>Shtimi i studentit u realizua me sukses !</h3>";
        }

        else if($roli == "profesor"){
            $insert = mysqli_query($connect, "INSERT INTO perdoruesi (emri, mbiemri, email, userName, passwordi, drejtimi) VALUES ('$emri', '$mbiemri', '$email','$user',md5('$pass'), '$drejt')");
            $update = mysqli_query($connect, "UPDATE perdoruesi SET roli = '$roli' WHERE userName = '$user';");
            $errorplus = "  <h3 class='errorplus'>Shtimi i profesorit u realizua me sukses !</h3>";
        }
    }