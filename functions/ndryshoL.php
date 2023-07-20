<?php
    
    require "../functions/connect.php";
    if(!isset($_GET['id'])){
        die();
        header("Location: ../dashboard/ndryshoStudent.php");
    }

    else{
        if(!isset($_POST['pSubmit1'])){
            die();
        }
        else{
            $id = $_GET['id'];
    
            $emri = mysqli_real_escape_string($connect, $_POST['pName']);
            $autori= mysqli_real_escape_string($connect, $_POST['pAutori']);
            $kredite= mysqli_real_escape_string($connect, $_POST['pKredite']);
            $drejtimi= mysqli_real_escape_string($connect, $_POST['pSelect']);

        }
    
    
        if(empty($emri) || empty($autori) || empty($kredite) ||  $drejtimi == "Zgjidh drejtimin e lendes" ){
            $error = "  <h3 class='error'>Te gjitha fushat duhet te plotesohen !</h3>";
        }
        else{
            $query = mysqli_query($connect, "SELECT * FROM drejtimi WHERE emri = '$drejtimi';");
            $query1 = mysqli_fetch_assoc($query);
            $drejt = $query1['drejtimi'];
                $insert = mysqli_query($connect, "UPDATE lenda SET emri = '$emri', autori= '$autori', kredite='$kredite',  drejtim = '$drejt' WHERE lendaID = '$id';");
                    $errorplus = "  <h3 class='errorplus'>Ndryshimi i lendes u realizua me sukses !</h3>";
    
        }
    }

  