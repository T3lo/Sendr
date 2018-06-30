<?php 
	include('index.php');
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		require('connect_db.php');
		$reg_no = $_POST['reg_no'];
		$q = "SELECT * FROM scholar WHERE reg_no=$reg_no";
		$r = mysqli_query($dbc,$q);

		if(mysqli_num_rows($r) == 1) {
			$row=mysqli_fetch_array($r,MYSQLI_ASSOC);
			echo "
				<div class='container-fluid'>
				    <div class='row'>
					<div class='col-md-4 col-md-offset-3'>
					    <div class='form-group'>
					       <label for='reg_no'><h4 style='font-weight:bold'>Register No : </h4></label>
					       <label for=''><h4 style='font-weight:bold'>$row[reg_no]</h4></label>
					   </div> 
					    <div class='form-group'>
					        <label for='name'><h4 style='font-weight:bold'>Name : </h4></label>
					        <label for=''><h4 style='font-weight:bold'>$row[name]</h4></label>
					    </div>
					    <div class='form-group'>
					        <label for='email'><h4 style='font-weight:bold'>email : </h4></label>
					        <label for=''><h4 style='font-weight:bold'>$row[email]</h4></label>
					    </div>
					    <div class='form-group'>
					       <label for='supervisorname'><h4 style='font-weight:bold'>Supervisor Name : </h4></label>
					       <label for=''><h4 style='font-weight:bold'>$row[instr_name]</h4></label>
					   </div>  
					</div>
				    </div>
				</div>
			";
		}
		else {
			echo '
				Student not found
			';
		}
		mysqli_close($dbc);
	}
?>
