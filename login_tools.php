<?php 
function load($page='login.php') {
	$url = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
	$url .= '/'.$page;
	header("location: $url");
}
function validate($dbc,$reg_no ="", $pwd= "") {
	$errors = array();
	if(empty($reg_no)) {
		$errors[] = "Enter your Name";
	}
	else {
		$e = mysqli_real_escape_string($dbc,trim($reg_no));
	}
	if(empty($pwd)) {
		$errors[] = "Enter Password";
	}
	else {
		$p = mysqli_real_escape_string($dbc,trim($pwd));
	}

	if(empty($errors)) {
		$q = "SELECT * FROM user WHERE name='$e' AND password=SHA1('$p')";
		$r = mysqli_query($dbc,$q);
		if(mysqli_num_rows($r) == 1) {
			$row = mysqli_fetch_array($r,MYSQLI_ASSOC);
			return array(true,$row);
		}
		else {
			$errors[] = "Reg_no & Pwd not found";
		}
	}
	
	return array(false,$errors);
}
?>

