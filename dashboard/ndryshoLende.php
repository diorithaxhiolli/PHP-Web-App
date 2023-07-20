<?php
    session_start();
    require "../functions/connect.php";


    if(isset($_SESSION['admin'])){
        
            $user = $_SESSION['admin'];
            $id = $_GET['id'];
            $query = mysqli_query($connect, "SELECT * FROM perdoruesi WHERE userName = '$user';");
            $info = mysqli_fetch_assoc($query);
            $emri = $info['emri'];
            $mbiemri = $info['mbiemri'];
        
    }


    else{
       header("Location: ../main/loginform.php");
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/dashi.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Dashboard/Ndrysho Lende</title>

</head>
<body>
        <?php include "../extensions/dashheader.php";?>
        <div class="headertwo">
                <div class="largo"><h3><i class="bi bi-x"></i></h3></div>
                <ul>
                    <li ><a href="../dashboard/dashboard.php"  >Studentët</a></li>
                    <li><a href="../dashboard/profesoret.php">Profesorët</a></li>
                    <li ><a href="../dashboard/lendet.php" >Lëndët</a></li>
                    <li><a  href="../dashboard/shtoP-S.php" >Shto Student/Profesor</a></li>
                    <li><a href="../dashboard/shtoLende.php">Shto Lëndë</a></li>
                </ul>
        </div>

        <?php

        if(isset($_GET['id'])){
            $error = $errorplus =  "";
            $dept = "Zgjidh drejtimin e lendes";
					
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                require "../functions/ndryshoL.php";
            }

            $query = mysqli_query($connect, "SELECT * FROM lenda WHERE lendaID = '$id';");
            $elem = mysqli_fetch_assoc($query);
            $emri = $elem['emri'];
            $autori = $elem['autori'];
            $kredite = $elem['kredite'];
            $drejtimi= $elem['drejtim'];
        }
        else{
            header("Location: ../dashboard/lendet.php");
        }
           

        
        ?>
        <div id="shtoMaini" >
            <div class="shtoTitle">
                <h3>Forma e Ndryshimit</h3>
                <h6>Ketu mund te ndryshoni lende!</h6>
            </div>
            <?php
                echo $error, $errorplus;
            
            ?>
            <form action="" class="forma" method="POST">
                <div class="first-row">
                    <div class="one">
                        <input type="text" name="pName" id="emri"  required>
                        <label for="emri"><?php echo $emri;?></label>
                    </div>
                    <div class="one">
                        <input type="text" name="pAutori" id="mbiemri" required>
                        <label for="mbiemri"><?php echo $autori;?></label>
                    </div>
                </div>
                <div class="next">
                    <input type="text" name="pKredite" id="email" required>
                    <label for="email"><?php echo $kredite;?></label>
                </div>
                <div class="next">
                    <select name="pSelect" id="select">
                    <option value = "<?php echo $dept;?>"><?php echo $dept;?></option>
                            <?php include "../functions/drejtimi.php";?>
                    </select>
                </div>

                <div class="nextbtn">
                    <input type="Submit" name="pSubmit1" id="sub" value="Perfundo">
                </div>
            </form>
        </div>




        <script>

            var btn = document.querySelector(".profile");
            var sec = document.querySelector(".down");
            var arrow = document.querySelector(".slide");

            btn.addEventListener("click", function(){
                sec.classList.toggle("active");
                arrow.classList.toggle("active");

                if(arrow.classList.contains("active")){
                    arrow.innerHTML = '<i class="bi bi-chevron-up"></i>';
                }
                else{
                    arrow.innerHTML = '<i class="bi bi-chevron-down"></i>';
                }
                btn.classList.toggle("active");
            })
        </script>

          <script>

            var header = document.querySelector(".headertwo");
            var btn2 = document.querySelector(".shto");
            var largo = document.querySelector(".largo");


            btn2.addEventListener("click", function(){
               header.classList.add("active");
            })
            largo.addEventListener("click", function(){
               header.classList.remove("active");
            })
        </script>
    
</body>
</htmlp