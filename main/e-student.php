<?php
    session_start();
    require "../functions/connect.php";
    

    if(isset($_SESSION['userS'])){
        $user = $_SESSION['userS'];

        $query1 = mysqli_query($connect, "SELECT * FROM perdoruesi WHERE userName = '$user';");
        $q1 = mysqli_fetch_assoc($query1);
        $emri = $q1['emri'];
        $mbiemri = $q1['mbiemri'];
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
    <title>E-Studenti</title>
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
        <h1> E-Studenti </h1>
    </section>




    <div class="user-info">
        <div class="drejt-name">
            <h3><?php echo $drejt;?></h3>
        </div>
        <div class="user-information">
            <div class="user-name">
                <h3><?php echo $emri."&nbsp".$mbiemri;?></h3>
            </div>
            <div class="user-type">
                <h4><?php echo $roli;?></h4>
            </div>
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


    <div class="orari-banner">
        <div class="orari-titull">
            <h3>Orari i ligjeratave</h3>
        </div>
        <div class="orari">
            <div class="orari-section">
                <div class="orari-txt">
                    <h4>Dita :</h4>
                    <h3>E Hene</h3>
                </div>
                <div class="orari-btn">
                    <a class="orari-more">Shiko Orarin</a>
                </div>
            </div>
            <div class="orari-section">
                <div class="orari-txt">
                    <h4>Dita :</h4>
                    <h3>E Marte</h3>
                </div>
                <div class="orari-btn">
                    <a class="orari-more">Shiko Orarin</a>
                </div>
            </div>
            <div class="orari-section">
                <div class="orari-txt">
                    <h4>Dita :</h4>
                    <h3>E Merkure</h3>
                </div>
                <div class="orari-btn">
                    <a class="orari-more">Shiko Orarin</a>
                </div>
            </div>
            <div class="orari-section">
                <div class="orari-txt">
                    <h4>Dita :</h4>
                    <h3>E Enjete</h3>
                </div>
                <div class="orari-btn">
                    <a class="orari-more">Shiko Orarin</a>
                </div>
            </div>
            <div class="orari-section">
                <div class="orari-txt">
                    <h4>Dita :</h4>
                    <h3>E Premte</h3>
                </div>
                <div class="orari-btn">
                    <a class="orari-more">Shiko Orarin</a>
                </div>
            </div>
        </div>
    </div>

    <div class="orari-perditshem">
        <div class="o-leave">
            <a><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="o-titull">
            <h3>Orari i ligjeratave</h3>
            <h4>E Hene</h4>
        </div>
        <div class="o-banner">
            <div class="orari-kolona">
                <div class="orar-titulli">
                    <h5>Ora</h5>
                </div>
                <div class="orar-kolona-ora kolona1">
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                </div>
            </div>
            <div class="orari-kolona  kol2">
                <div class="orar-titulli titulli2">
                    <h5>Lenda</h5>
                </div>
                <div class="orar-kolona-ora kolona2">
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                </div>
            </div>
            <div class="orari-kolona kol3">
                <div class="orar-titulli titulli3">
                    <h5>Salla</h5>
                </div>
                <div class="orar-kolona-ora kolona3">
                    <h4>Salla1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="orari-perditshem">
        <div class="o-leave">
            <a><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="o-titull">
            <h3>Orari i ligjeratave</h3>
            <h4>E marte</h4>
        </div>
        <div class="o-banner">
            <div class="orari-kolona">
                <div class="orar-titulli">
                    <h5>Ora</h5>
                </div>
                <div class="orar-kolona-ora kolona1">
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                </div>
            </div>
            <div class="orari-kolona kol2">
                <div class="orar-titulli titulli2">
                    <h5>Lenda</h5>
                </div>
                <div class="orar-kolona-ora kolona2">
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                </div>
            </div>
            <div class="orari-kolona kol3">
                <div class="orar-titulli titulli3">
                    <h5>Salla</h5>
                </div>
                <div class="orar-kolona-ora kolona3">
                    <h4>Salla1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="orari-perditshem">
        <div class="o-leave">
            <a><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="o-titull">
            <h3>Orari i ligjeratave</h3>
            <h4>E Merkure</h4>
        </div>
        <div class="o-banner">
            <div class="orari-kolona">
                <div class="orar-titulli">
                    <h5>Ora</h5>
                </div>
                <div class="orar-kolona-ora kolona1">
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                </div>
            </div>
            <div class="orari-kolona kol2">
                <div class="orar-titulli titulli2">
                    <h5>Lenda</h5>
                </div>
                <div class="orar-kolona-ora kolona2">
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                </div>
            </div>
            <div class="orari-kolona kol3">
                <div class="orar-titulli titulli3">
                    <h5>Salla</h5>
                </div>
                <div class="orar-kolona-ora kolona3">
                    <h4>Salla1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="orari-perditshem">
        <div class="o-leave">
            <a><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="o-titull">
            <h3>Orari i ligjeratave</h3>
            <h4>E Enjete</h4>
        </div>
        <div class="o-banner">
            <div class="orari-kolona">
                <div class="orar-titulli">
                    <h5>Ora</h5>
                </div>
                <div class="orar-kolona-ora kolona1">
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                </div>
            </div>
            <div class="orari-kolona kol2">
                <div class="orar-titulli titulli2">
                    <h5>Lenda</h5>
                </div>
                <div class="orar-kolona-ora kolona2">
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                </div>
            </div>
            <div class="orari-kolona kol3">
                <div class="orar-titulli titulli3">
                    <h5>Salla</h5>
                </div>
                <div class="orar-kolona-ora kolona3">
                    <h4>Salla1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="orari-perditshem">
        <div class="o-leave">
            <a><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="o-titull">
            <h3>Orari i ligjeratave</h3>
            <h4>E Premte</h4>
        </div>
        <div class="o-banner">
            <div class="orari-kolona">
                <div class="orar-titulli">
                    <h5>Ora</h5>
                </div>
                <div class="orar-kolona-ora kolona1">
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                    <h4>10 : 30</h4>
                </div>
            </div>
            <div class="orari-kolona kol2">
                <div class="orar-titulli titulli2">
                    <h5>Lenda</h5>
                </div>
                <div class="orar-kolona-ora kolona2">
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                    <h4>Matematika</h4>
                </div>
            </div>
            <div class="orari-kolona kol3">
                <div class="orar-titulli titulli3">
                    <h5>Salla</h5>
                </div>
                <div class="orar-kolona-ora kolona3">
                    <h4>Salla1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                    <h4>Salla 1</h4>
                </div>
            </div>
        </div>
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


    <script>
        let btn = document.querySelectorAll(".orari-more");
        let slides = document.querySelectorAll(".orari-perditshem");
        let leave = document.querySelectorAll(".o-leave");

        btn[0].addEventListener("click", function() {
            slides[0].classList.add('active')
        })
        btn[1].addEventListener("click", function() {
            slides[1].classList.add('active')
        })
        btn[2].addEventListener("click", function() {
            slides[2].classList.add('active')
        })
        btn[3].addEventListener("click", function() {
            slides[3].classList.add('active')
        })
        btn[4].addEventListener("click", function() {
            slides[4].classList.add('active')
        })

        leave.forEach(leav => {
            leav.addEventListener("click", function() {
                for (let i = 0; i < slides.length; i++) {
                    slides[i].classList.remove("active")
                }
            })
        })
    </script>

</body>

</html>