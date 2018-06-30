<?php 
	if(isset($_POST)) {
		require('connect_db.php');
		$type=$_POST['type'];
		$name=$_POST['name'];
		
		switch($type) {
			case 1: 
					$email=$_POST['email'];
					$phone=$_POST['phone'];
					$country=$_POST['country'];
					$age=$_POST['age'];
					$address=$_POST['address'];
					$affiliation=$_POST['affiliation'];
					$university=$_POST['university'];
					$designation=$_POST['designation'];
					
					$q="insert into examiner (name,email,country,phone,age,address,affiliation,designation,university)
						values
						('$name','$email','$country','$phone','$age','$address','$affiliation','$designation','$university')";

					$r=mysqli_query($dbc,$q);	
					
					break;
			case 2: 
					$reg_no=$_POST['reg_no'];
					$email=$_POST['email'];
					$instr_name=$_POST['instr_name'];
					$title=$_POST['title'];
					
					$q="insert into scholar 
						values 
						($reg_no,'$name','$email','$instr_name','$title')
						";
					$r=mysqli_query($dbc,$q);
					
					break;			
			default:
		}
	}
?>
