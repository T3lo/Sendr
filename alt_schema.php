<?php
if(isset($_GET['SCHEMA'])) {
	echo "
	<style>
	table {
	    font-family: arial, sans-serif;
	    border-collapse: collapse;
	    width: 100%;
	}

	td, th {
	    border: 1px solid #dddddd;
	    text-align: left;
	    padding: 8px;
	}

	tr:nth-child(even) {
	    background-color: #dddddd;
	}
	</style>
	";

	echo "SCHEMA CHANGE";
	require('connect_db.php');
	$tbl=$_GET['FIELD'];
	$q="desc $tbl";

	$r=mysqli_query($dbc,$q);
	echo "<br>";
	echo "
	<table style='width:100%'>
		<tr>
			<th>Field</th>
			<th>Type</th>
			<th>Null</th>
			<th>Key</th>
			<th>Default</th>
			<th>Extra</th>
		</tr>
	";
	while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
		echo "<tr>";
		foreach($row as $item){
			echo "<td>";
			if($item==NULL)
				echo "NULL\t";
			else
				echo "$item\t";
			echo "</td>";
		}
		echo "<tr>";
	}

	echo "
	</table>
	";

	mysqli_close($dbc);
echo "
<form method='GET' action=''>
	<input type='button' name='ADD' value='ADD'>
</form>
<form method='GET' action=''>
	<input type='button' name='DEL' value='DEL'>
</form>
<form method='GET' action=''>
	<input type='button' name='UPD' value='UPD'>
</form>

";
}
?>
