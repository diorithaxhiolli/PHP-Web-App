<?php
    session_start();
    require "../functions/connect.php";


    if(isset($_SESSION['admin'])){
        $user = $_SESSION['admin'];
        $query = mysqli_query($connect, "SELECT * FROM perdoruesi WHERE userName = '$user';");
        $info = mysqli_fetch_assoc($query);
        $emri = $info['emri'];
        $mbiemri = $info['mbiemri'];
        $email = $info['email'];
        $user = $info['userName'];
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
    <title>Dashboard/Profili</title>

    <style>

    </style>
</head>
<body>
        <?php include "../extensions/dashheader.php";?>
        <div class="headertwo">
                <div class="largo"><h3><i class="bi bi-x"></i></h3></div>
                <ul>
                    <li ><a href="../dashboard/dashboard.php"  >Studentët</a></li>
                    <li><a href="../dashboard/profesoret.php">Profesorët</a></li>
                    <li ><a href="../dashboard/lendet.php" >Lëndët</a></li>
                    <li  ><a  href="../dashboard/shtoP-S.php" >Shto Student/Profesor</a></li>
                    <li><a href="../dashboard/shtoLende.php">Shto Lëndë</a></li>
                </ul>
        </div>



        <div id="shtoMaini" >
            <div class="shtoTitle profiliii">
                <h3>Profili i Administratorit</h3>
            </div>
            <div class="profilee">
                <div class="infoo">
                    <div class="bashk">
                        <div class="imgg"><i class="bi bi-people"></i></div>
                        <div class="txtt">
                            <h3><?php echo $emri."&nbsp".$mbiemri;?></h3>
                            <h6>Administrator</h6>
                        </div>
                    </div>
                    <div class="vet">
                        <h3>Active <i class="bi bi-check-all"></i></h3>
                    </div>
                    
                </div>
                <form action="" class="forma" method="POST">
                    <div class="next nec">
                        <input type="text" name="lendeEmri" id="email" required disabled>
                        <label for="email"><?php echo $emri;?></label>
                    </div>
                    <div class="next nec">
                        <input type="text" name="lendeAutori" id="user" required disabled>
                        <label for="user"><?php echo $mbiemri;?></label>
                    </div>
                    <div class="next nec">
                        <input type="text" name="lendeKredite" id="pass" required disabled>
                        <label for="pass"><?php echo $email;?></label>
                    </div>
                    <div class="next nec">
                        <input type="text" name="lendeKredite" id="pass" required disabled>
                        <label for="pass"><?php echo $user;?></label>
                    </div>
            
                </form>
            </div>
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
</html>