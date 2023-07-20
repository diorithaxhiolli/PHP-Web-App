<?php

    require "../functions/connect.php";

    $register = true;
    if(!isset($_POST['registerSubmit'])){
        die();
    }
    else{
        $emri = mysqli_real_escape_string($connect, $_POST['registerEmri']);
        $mbiemri = mysqli_real_escape_string($connect, $_POST['registerMbiemri']);
        $drejtimi = mysqli_real_escape_string($connect, $_POST['ZDrejtimi']);
        $email = mysqli_real_escape_string($connect, $_POST['registerEmail']);
        $user = mysqli_real_escape_string($connect, $_POST['registerUser']);
        $pass = mysqli_real_escape_string($connect, $_POST['registerPass']);
    }
    $userExist = mysqli_query($connect, "SELECT userName FROM perdoruesi WHERE userName = '$user';");
    $numro = mysqli_num_rows($userExist);

    if(empty($emri) || empty($mbiemri) || $drejtimi == "Zgjidh drejtimin" || empty($email) ||empty($user) || empty($pass) ){
        $error =  "<h3 class='error'>Te gjitha fushat duhet te plotesohen !</h3>";
        $register = false;
    }   

    else{
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $register = false;
                $error =  "<h3 class='error'>Emaili nuk eshte valid !</h3>";
            }
            if($numro != 0){
                $register = false;
                $error =  "<h3 class='error'>Ky email ekziston !</h3>";
            }

    
            $number = preg_match('@[0-9]@', $pass);
            $specialChars = preg_match('@[^\w]@', $pass);
    
            if(!$number || !$specialChars){
                $register = false;
                $error =  "<h3 class='error'>passwordi duhet te filloje me shkronje te madhe dhe te kete nje karakter !</h3>";
            }

    }

    if($register == true){
        $query2 = "SELECT * FROM drejtimi WHERE emri = '$drejtimi'; ";
        $sql = mysqli_query($connect, $query2);
        $drejtmi = mysqli_fetch_assoc($sql);
        $drejtimii = $drejtmi['drejtimi'];
        $query1 = "INSERT INTO perdoruesi (emri, mbiemri, email, userName , passwordi, drejtimi) VALUES ('$emri', '$mbiemri', '$email','$user', md5('$pass'), '$drejtimii');";
        $myqsli = mysqli_query($connect, $query1);
        
        header("Location: ../main/loginform.php");
    }