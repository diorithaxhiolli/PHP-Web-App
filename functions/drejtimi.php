<?php

require '../functions/connect.php';

$query = mysqli_query($connect, "SELECT emri FROM drejtimi");

while($row = mysqli_fetch_assoc($query)) {
	$dept = $row['emri'];
	
	echo "<option value='$dept'>$dept</option>";
}

?>