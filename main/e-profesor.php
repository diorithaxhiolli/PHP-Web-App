<?php
    session_start();
    require "../functions/connect.php";
    

    if(isset($_SESSION['userP'])){
        $user = $_SESSION['userP'];

        $query1 = mysqli_query($connect, "SELECT * FROM perdoruesi WHERE userName = '$user';");
        $q1 = mysqli_fetch_assoc($query1);
        $emri = $q1['emri'];
        $mbiemri = $q1['mbiemri'];
        $email = $q1['email'];
        $user = $q1['userName'];
        $roli = $q1['roli'];
        $drejtimi= $q1['drejtimi'];

        $query2 = mysqli_query($connect, "SELECT * FROM drejtimi WHERE drejtimi = '$drejtimi';");
        $q2 = mysqli_fetch_assoc($query2);
        $drejt = $q2['emri'];
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
    <title>E-Profesori</title>
    <link rel="stylesheet" href="../style/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
</head>

<body>
    <section class="lajmet-header">
        <?php include "../extensions/header.php"; ?>
        <h1> E-Profesori </h1>
    </section>

    


    <div class="user-info">
        <div class="drejt-name">
            <h3><?php echo $drejt;?></h3>
        </div>
        <div class="user-information">
            <div class="user-type">
                <h4><?php echo $roli;?></h4>
            </div>
        </div>
    </div>

    <div id="shtoMaini" >
            <div class="shtoTitle profiliii">
            </div>
            <div class="profilee">
                <div class="infoo">
                    <div class="bashk">
                        <div class="imgg"><i class="bi bi-people"></i></div>
                        <div class="txtt">
                            <h3><?php echo $emri."&nbsp".$mbiemri;?></h3>
                        </div>
                    </div>
                    <div class="vet">
                        <h3>Active <i class="bi bi-check-all"></i></h3>
                    </div>
                    
                </div>
                <form action="" class="forma" method="POST">
                    <div class="next nec">
                        <input type="text" name="lendeEmri" id="email" required disabled>
                        <label for="email"><?php echo "Emri profesorit: &nbsp&nbsp&nbsp".$emri;?></label>
                    </div>
                    <div class="next nec">
                        <input type="text" name="lendeAutori" id="user" required disabled>
                        <label for="user"><?php echo  "Mbiemri profesorit: &nbsp&nbsp&nbsp".$mbiemri;?></label>
                    </div>
                    <div class="next nec">
                        <input type="text" name="lendeKredite" id="pass" required disabled>
                        <label for="pass"><?php echo  "Email profesorit: &nbsp&nbsp&nbsp".$email;?></label>
                    </div>
                    <div class="next nec">
                        <input type="text" name="lendeKredite" id="pass" required disabled>
                        <label for="pass"><?php echo  "Username i profesorit: &nbsp&nbsp&nbsp".$user;?></label>
                    </div>
            
                </form>
            </div>
        </div>

       

    <div class="lendet">
        <div id='leTitle'>
                    <h3>Lendet</h3>
                </div>
        <?php
            
            $querys =mysqli_query($connect, "SELECT * FROM lenda WHERE drejtim = '$drejtimi';");

            while($fetch = mysqli_fetch_assoc($querys)){
                $demri = $fetch['drejtim'];
                $lemri = $fetch['emri'];
                $author = $fetch['autori'];
                $kredite = $fetch['kredite'];
            $querys1 =mysqli_query($connect, "SELECT * FROM drejtimi WHERE drejtimi = '$demri';");
            $fetch1 = mysqli_fetch_assoc($querys1);
            $drejtimy = $fetch['emri'];


                echo "
                <div class='lendaa'>
                    <div id='lendaaInfo'>
                        <h3>$lemri</h3>
                        <h4>$author</h4>
                        <h4>E dedikuar per $drejtimy</h4>
                    </div>
                    <div class='lendaKredi'>
                        <h3>Kredite</h3>
                        <h2>$kredite</h2>
                    </div>
                </div>
                ";
            }
    ?>
       

    </div>


   









    <section class="footer">
        <div class="footer-logo">
            <img class="logo" src="../fotot/logo.png">
        </div>
        <div class="text">
            <p> Made by Diorit & Egzon</p>
            <div class="social">
                <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="twiter"><i class="fab fa-twitter"></i></a>
            </div>
        </div>

        <div class="top-btn">
            <a href="#"><i class="fas fa-chevron-up"></i></a>
        </div>

    </section>

    <script>
        let topbtn = document.querySelector(".top-btn");
        topbtn.onclick = function() {
            window.scrollTop({
                top: 0
            })
        }
    </script>

    <!--Script per menun(show/hide) kur faqja eshte me ni ekran me te vogel(responsive)-->
    <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu() {
            navLinks.style.right = "0";
        }

        function hideMenu() {
            navLinks.style.right = "-200px";
        }
    </script>



</body>

</html>