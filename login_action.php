<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	require('connect_db.php');
	require('login_tools.php');
	list($check,$data) = validate($dbc,$_POST['reg_no'],$_POST['pass']);
	if($check) {
		session_start();
		$_SESSION['reg_no'] = $data['name'];
		load('index.php');
	}
	else{
		$errors = $data;
	}
	mysqli_close($dbc);
	load();
}
?>
