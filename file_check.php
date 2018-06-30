<?php
	if(isset($_GET['reg_no'])) {
		$reg_no=$_GET['reg_no'];
		$type=$_GET['type'];
		$flag=0;

		if(file_exists("up/".$type."_".$reg_no.".pdf")) {
			echo "1";
		}
		else 
			echo 0;
	}
?>
