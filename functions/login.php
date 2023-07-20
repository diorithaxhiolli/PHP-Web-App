<?php


require "../functions/connect.php";

$login = true;

if(!isset($_POST['loginSubmit'])){
  $login = false;
  exit();
}
else{
    $username = mysqli_real_escape_string($connect, $_POST['loginUser']);
    $pass = mysqli_real_escape_string($connect, $_POST['loginPass']);

}


if(empty($username) && empty($pass)) {
    $login = false;
    $error =  "<h3 class='error'>Te gjitha te dhenat duhet te plotesohen !</h3>";
}

else{
    if(empty($username)) {
        $error =  "<h3 class='error'>Fusha e username duhet te plotesohet !</h3>";
		$login = false;
	}

    else {
		$query1 = mysqli_query($connect, "SELECT userName FROM perdoruesi WHERE userName='$username';");
		$numro = mysqli_num_rows($query1);
				//e kthen numrin e rreshtav nga query i dhene si parameter

		if($numro == 0) {
            $error =  "<h3 class='error'>Ky perdorues nuk ekziston !</h3>";
			$login = false;
		}
	}

    if(empty($pass)) {
        $error =  "<h3 class='error'>Fusha e passwordit duhet te plotesohet !</h3>";
		$login = false;
	}
	
	else {
		
		$query = "SELECT passwordi FROM perdoruesi WHERE userName = '$username';";
        $query2 = mysqli_query($connect, $query);
		$queryPass = mysqli_fetch_assoc($query2);
		$passw = $queryPass['passwordi'];
		
		if(md5($pass) != $passw) {
            $error =  "<h3 class='error'>Passwordi nuk eshte i sakte !</h3>";	
			$login = false;
		}
	}
}

if($login) {
	
	$query3 = mysqli_query($connect, "SELECT roli FROM perdoruesi WHERE userName='$username';");
	$queryRoli = mysqli_fetch_assoc($query3);
	$roli = $queryRoli['roli'];

	$query4 = mysqli_query($connect, "SELECT * FROM perdoruesi WHERE userName='$username';");
	$queryinfo = mysqli_fetch_assoc($query4);
	$uemri = $queryinfo['emri'];
	$umbiemri = $queryinfo['mbiemri'];
	$username1 = $queryinfo['userName'];
	$passwordii = $queryinfo['passwordi'];

	if($roli == "student"){
		session_start();
		$_SESSION['userS'] =$username;
		$_SESSION['studentEmri'] =$queryinfo['emri'] ;
		$_SESSION['studentMbiemri'] = $queryinfo['mbiemri'];
		$_SESSION['studentName'] = $username1 ;
		$_SESSION['studentPass'] = $passwordii;
		header("Location: ../main/e-student.php");
	}
    else if($roli == "profesor"){
		session_start();
		$_SESSION['userP'] = $username;
		$_SESSION['profesorEmri'] =$queryinfo['emri'] ;
		$_SESSION['profesorMbiemri'] = $queryinfo['mbiemri'];
		$_SESSION['profesorName'] = $username1 ;
		$_SESSION['profesorPass'] = $passwordii;
		header("Location: ../main/e-profesor.php");
	}
	
    else{
		session_start();
		$_SESSION['admin'] = $username;
		header("location: ../dashboard/dashboard.php");
	}


}