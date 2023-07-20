
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
					
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                require "../functions/login.php";
            }
        
        ?>

    <div class="main">
        <div class="foms">

            <div class="header-txt">
                        <h3>Login Forma</h3>
                </div>
                <?php
                    echo $error;
                ?>

                <form class="forma" action="" method="POST">
                    <div class="first">
                        <input type="text" class="Inputet" id="user" name="loginUser">
                        <label for="user">Username</label>
                    </div>
                    <div class="first">
                        <input type="password" class="Inputet"  name="loginPass">
                        <label for="pass">Password</label>
                    </div>
                    <div class="first">
                        <input type="submit" class="Inputet1" id="loginSubmit" name="loginSubmit">
                    </div>
                    <div class="first txt">
                        <h3>Nuk keni llogari ? <a href="../main/singupform.php">Regjistrohu Tani</a></h3>
                    </div>
                
                </form>
        </div>
        
    </div>



</body>

</html>