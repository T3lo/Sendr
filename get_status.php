<?php
	session_start();
	require('login_tools.php');
	
	if(!isset($_SESSION['reg_no'])) {
		load();
	}

	if($_SERVER['REQUEST_METHOD']=='GET') {
		$reg_no = $_GET['reg_no'];
		require('connect_db.php');
		include('status.html');

		$q = "select * from trans where sc_id=$reg_no order by date desc";
		$r = mysqli_query($dbc,$q);
		
		echo "
		<script>
			function _req(n,p) {
				var file_chk=document.getElementById('file_chk'+n);
				var upld=document.getElementById('i'+n).style;

				var req=new XMLHttpRequest();
				req.open('GET','file_check.php?reg_no='+p+'&type=Thesis',true);
				req.onreadystatechange=function() {
					if(this.readyState==4) {
						if(this.status==200) {
							if(this.responseText != null) {	
								console.log(this.responseText);
								if(this.responseText==1) {
									upld.display='none';
									file_chk.value='1';
								}
								else {
									upld.display='block';
									file_chk.value='0';
								}
							}
							else console.log('No data received');
						}
						else console.log('Ajax err : '+this.statusText);
					}	
				}
	
			req.send(null);
			}

		</script>
			<hr>
			<div class='cintainer-fluid' id='cintents'>
			    <div class='row deco-bg'>
				<div class='container-fluid'>
				<div class='col-md-6 col-md-offset-3'>  
				    <table class='table table-responsive table-bordered table-hover table-striped'>
					<thead>
					    <tr>
					        <th>Date</th>
					        <th>Name</th>
					        <th>Status</th>
					        <th>Option</th>
					        <th>Reminder(s)</th>
					    </tr>
					</thead>
					<tbody>
		";

		
		while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
			$qr = "select name from examiner where id=$row[ex_id]";
			$res = mysqli_query($dbc,$qr);
			if($rw=mysqli_fetch_array($res,MYSQLI_ASSOC))
				$ename=$rw['name'];

			echo "
		    <tr>
		        <td>
			";
			echo date("d/m/y",strtotime($row['date']));
			echo "
			</td>
			<td>$ename</td>
			<td>
			    <form action='change.php' method='get'>
				<input type='hidden' name='trans_id' value=$row[id]>
				<input type='hidden' name='status' value='$row[status]'>
			    	<input type='submit' value='$row[status]' class='btn btn-primary btn-";

			if($row['status']=='NO') 
				echo "danger";
			else 
				echo "success";

			echo "'>
		            </form>
		        </td>
		        <td>
			";

			if($row['status']=='NO') {					
					echo "
					    <form action='action3.php' method='POST'>
						<input type='submit' value='RESEND' class='btn btn-primary'>
						<input type='hidden' name='$row[sc_id]'>					
						<input type='hidden' name='title' value='$row[title]'>
						<input type='hidden' name='e' value='$ename'>
						<input type='hidden' name='trans_id' value=$row[id]>	
						<input type='hidden' name='reg_no' value='$reg_no'>	
					    </form>
					";
				
			}
			else {
				echo "
					<form method='post' action='action2.php' enctype='multipart/form-data'>
						<input type='hidden' name='e' value='$row[ex_id]'>
						<input type='hidden' name='title' value='$row[title]'>
						<input type='hidden' name='reg_no' value='$reg_no'>
						<input type='hidden'  name='check' value='0' id='file_chk$row[id]'>	
						<input type='file' name='file' id='i$row[id]'>
						<input type='submit' value='SEND' class='btn btn-primary' id='inp$row[id]'>
						<input type='hidden' value=_req($row[id],$row[sc_id])>
					</form>
				<script>
document.getElementById('inp$row[id]').onload = _req($row[id],$row[sc_id]);
				</script>
				";
			}

			echo "
				</td>
				<td>$row[reminder]</td>
			    </tr>                                                    					
			";
		}
		echo "
		</tbody>
				
			    </table>
			</div>       
		    </div>
		    </div>
		</div>

		";
	
		mysqli_close($dbc);
	}
?>
