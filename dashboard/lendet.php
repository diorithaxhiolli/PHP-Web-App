<?php
    session_start();
    require "../functions/connect.php";


    if(isset($_SESSION['admin'])){
        $user = $_SESSION['admin'];
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
    <link rel="stylesheet" href="../style/dashstyle1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <title>Dashboard/Lendet</title>
</head>
<body>
        <?php include "../extensions/dashheader.php";?>
        <div class="headertwo">
                <div class="largo"><h3><i class="bi bi-x"></i></h3></div>
                <ul>
                    <li ><a href="../dashboard/dashboard.php"  >Studentët</a></li>
                    <li><a href="../dashboard/profesoret.php">Profesorët</a></li>
                    <li style="background-color:rgb(219, 145, 145); " ><a href="../dashboard/lendet.php" style="color:whitesmoke;">Lëndët</a></li>
                    <li><a href="../dashboard/shtoP-S.php">Shto Student/Profesor</a></li>
                    <li><a href="../dashboard/shtoLende.php">Shto Lëndë</a></li>
                </ul>
        </div>
       <?php
        $queryy = mysqli_query($connect, "SELECT * FROM lenda;");
        $count = mysqli_num_rows($queryy);
    ?>

        <div class="studentet">
            <div class="gjithsej">
                <h5>Gjithesej jane:</h5>
                <h1><?php echo $count;?></h1>
                <h6>Lende</h6>
            </div>
        </div>


        <div class="main"  style="overflow-x:auto;">
            <div class="mTitle">
                <h3>Lendet</h3>
            </div>
            

            <table class="tabela">
                <tr>
                    <th>Emri lendes</th>
                    <th>Kredite</th>
                    <th></th>
                </tr>
                               <?php
                        $query1 = mysqli_query($connect, "SELECT * FROM lenda;");
                        $fetch1 = mysqli_fetch_assoc($query1);                       
                        $drejt = $fetch1['drejtim'];
                        $query2 = mysqli_query($connect, "SELECT emri FROM drejtimi WHERE drejtimi = '$drejt';");
                        $fetch2 = mysqli_fetch_assoc($query2);
                        $drejtim = $fetch2['emri'];

                    while($fetch1 = mysqli_fetch_assoc($query1)){
                        $drejt = $fetch1['drejtim'];
                        $query2 = mysqli_query($connect, "SELECT emri FROM drejtimi WHERE drejtimi = '$drejt';");
                        $fetch2 = mysqli_fetch_assoc($query2);
                        $drejtim = $fetch2['emri'];
                        $autori = $fetch1['autori'];
                        $emrii = $fetch1['emri'];
                        $IDd = $fetch1['lendaID'];
                        $kredite = $fetch1['kredite'];
                        echo "
                        <tr class='rowi' >
                        <td>
                            <div class='info'>
                                <h3>$emrii</h3>
                                <h4>$autori</h4>
                                <h4 class='fakulteti'>$drejtim</h4>
                            </div>
                        </td>
                        <td>
                            <div class='username'>
                                <h3>$kredite</h3>
                            </div>
                        </td>
                        <td>
                            <div class='ndrysho'>
                                <a href='../dashboard/ndryshoLende.php?id=$IDd'><i class='bi bi-arrow-repeat'></i> Ndrysho</a>
                                <a href='../dashboard/fshijL.php?id=$IDd'><i class='bi bi-trash3'></i> Fshij</a>
                            </div>
                        </td>
                    </tr>";
                    }
                
                
                ?>
            </table>
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