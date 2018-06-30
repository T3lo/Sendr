<?php
session_start();
if( isset($_SESSION['reg_no']) ) {
	$page_title = 'Goodbye';
	$_SESSION = array();
	session_destroy();
	echo '<h1>Goodbye</h1><br>Logged out ';

	require('login_tools.php');
	load();
}
?>
