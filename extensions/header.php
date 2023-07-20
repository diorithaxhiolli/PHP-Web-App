

<nav>
    <a href="index.php"> <img class="logo" src="../fotot/logo.png"> </a>
    <div class="nav-links" id="navLinks">
        <i class="fa fa-times" onclick="hideMenu()"></i>
        <ul>
            <li> <a href="../main/index.php">Ballina</a> </li>
            <li> <a href="../main/perne.php">Per Ne</a> </li>
            <li> <a href="../main/lajmet.php">Lajmet</a> </li>
            <li> <a href="../main/nakontakto.php">Na Kontakto</a> </li>
            <?php
                if(isset($_SESSION['userP'])){
                    echo "<li> <a href='../main/e-profesor.php'>Profili</a> </li>";
                    echo " <li> <a style='font-size: 34px;' href='../functions/logout.php'><i class='fas fa-sign-out-alt'></i></a></li>";
                }
                else if(isset($_SESSION['userS'])){
                    echo "<li> <a href='../main/e-student.php'>E-Studenti</a> </li>";
                    echo " <li> <a style='font-size: 34px;' href='../functions/logout.php'><i class='fas fa-sign-out-alt'></i></a></li>";
                }
                else{
                   echo  "<li> <a style='font-size: 34px;' href='loginform.php'><i class='fas fa-sign-in-alt'></i></a></li>";
                }
            
            ?>
         
        </ul>
    </div>
    <i class="fa fa-bars" style="color: #800020; font-size: 30px;" onclick="showMenu()"></i>
</nav>