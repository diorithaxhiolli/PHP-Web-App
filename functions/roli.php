<?php

require '../functions/connect.php';

$query = mysqli_query($connect, "SELECT emri FROM roli");

while($row = mysqli_fetch_assoc($query)) {
	$roli = $row['emri'];
	
	echo "<option value='$roli'>$roli</option>";
}

?>