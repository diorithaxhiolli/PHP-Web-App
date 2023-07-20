<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/login.css" />
    <title> Regjistrimi </title>
</head>

<body>

        <?php
            $error = "";
            $dept = "Zgjidh drejtimin";
					
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                require "../functions/singnup.php";
            }
        
        ?>

    <div class="main">
        <div class="foms foms2">

            <div class="header-txt">
                        <h3>Sign Up Forma</h3>
                </div>
                <?php
                    echo $error;
                ?>
                <form class="forma" action="" method="POST">
                    <div class="first">
                        <input type="text" class="Inputet" id="user" name="registerEmri">
                        <label for="user">Emri</label>
                    </div>
                    <div class="first">
                        <input type="text" class="Inputet"  name="registerMbiemri">
                        <label for="pass">Mbiemri</label>
                    </div>
                    <div class="first">
                        <select name="ZDrejtimi" id="drejtimi">
                            <option value = "<?php echo $dept;?>"><?php echo $dept;?></option>
                            <?php include "../functions/drejtimi.php";?>

                        </select>
                    </div>
                    <div class="first">
                        <input type="text" class="Inputet"  name="registerEmail">
                        <label for="pass">Email</label>
                    </div>
                    <div class="first">
                        <input type="text" class="Inputet"  name="registerUser">
                        <label for="pass">Username</label>
                    </div>
                    <div class="first">
                        <input type="password" class="Inputet"  name="registerPass">
                        <label for="pass">Password</label>
                    </div>
                    <div class="first">
                        <input type="submit" class="Inputet1" id="registerSubmit" name="registerSubmit">
                    </div>
                    <div class="first txt">
                        <h3>Tashme keni llogari? <a href="../main/loginform.php">Kyqu</a></h3>
                    </div>
                
                </form>
        </div>
        
    </div>



</body>

</html>