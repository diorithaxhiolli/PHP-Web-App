<?php
    
    require "../functions/connect.php";
    if(!isset($_GET['id'])){
        die();
        header("Location: ../dashboard/ndryshoStudent.php");
    }

    else{
        if(!isset($_POST['sSubmit1'])){
            die();
        }
        else{
            $id = $_GET['id'];
    
            $emri = mysqli_real_escape_string($connect, $_POST['sName']);
            $mbiemri= mysqli_real_escape_string($connect, $_POST['sMbiemri']);
            $email= mysqli_real_escape_string($connect, $_POST['sEmail']);
            $user = mysqli_real_escape_string($connect, $_POST['sUser']);
            $pass = mysqli_real_escape_string($connect, $_POST['sPass']);
            $drejtimi = mysqli_real_escape_string($connect, $_POST['ssSelect']);
        }
    
    
        if(empty($emri) || empty($mbiemri) || empty($email) || empty($user) || empty($pass) || $drejtimi == "Zgjidh drejtimin" ){
            $error = "  <h3 class='error'>Te gjitha fushat duhet te plotesohen !</h3>";
        }
        else{
            $query = mysqli_query($connect, "SELECT * FROM drejtimi WHERE emri = '$drejtimi';");
            $query1 = mysqli_fetch_assoc($query);
            $drejt = $query1['drejtimi'];
                $queryy = mysqli_query($connect, "SELECT * FROM perdoruesi WHERE userID = '$id';");
                $roli = mysqli_fetch_assoc($queryy);
                $roli1 = $roli['roli'];
                $insert = mysqli_query($connect, "UPDATE perdoruesi SET emri = '$emri', mbiemri= '$mbiemri', email='$email', userName = '$user', passwordi = md5('$pass'), drejtimi = '$drejt' WHERE userID = '$id';");
                if($roli1 == "student"){
                    $errorplus = "  <h3 class='errorplus'>Ndryshimi i studentit u realizua me sukses !</h3>";
                }
                else{
                    $errorplus = "  <h3 class='errorplus'>Ndryshimi i profesorit u realizua me sukses !</h3>";
                }
    
        }
    }

  