<?php
if(isset($_GET['val'])) {
	$val=$_GET['val'];
	require('connect_db.php');
	
	$q="select id,name from subject where name like '%$val[0]%' ";
	for($i=1;$i<count($val);$i++) 
		$q = $q."and name like '%$val[$i]%' ";
		
	$r=mysqli_query($dbc,$q);
	while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
		echo "<option value='".$row['name']."'>%%$row[id]";
	}
	mysqli_close($dbc);
}
?>
