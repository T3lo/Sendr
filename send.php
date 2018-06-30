<?php
	session_start();
	require('login_tools.php');
	
	if(!isset($_SESSION['reg_no'])) {
		load();
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>SEND</title>
        
        <!-- Bootstrap css -->
        <link rel='stylesheet' type='text/css' href='bootstrap/css/bootstrap.min.css'>
        <!--jquery declaration --->
        <script type='text/javascript' src='bootstrap/js/jquery-3.2.1.min.js'></script>
        <!-- javascript dec-->
        <script type='text/javascript' src='bootstrap/js/bootstrap.min.js'></script>
        
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' >
        <!--jQuery library--> 
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css' type='text/css'>
    </head>
    <body style='padding-top:120px'>
        
        <nav class='navbar navbar-inverse navbar-fixed-top weight'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>
                        <span class='icon-bar'></span>                        
                    </button>
                  <!-- <a class='navbar-brand' href='index.html'>INFO</a> -->
                  <a class='navbar-brand'><span class='glyphicon glyphicon-home'></span></a>
                </div>
                <div class='collapse navbar-collapse' id='myNavbar'>
                   
                    <ul class='nav navbar-nav navbar-left'>
                        <li><a href='index.php'>Info</a></li>
                        <li class='active'><a href='send.php'> Synopsis</a></li>
                        <li><a href='status.html'> Thesis Dispatch</a></li>
                        <li><a href='entry.php'> Data Capture</a></li>
                    </ul>
                     <ul class='nav navbar-nav navbar-right'>
                        <li class=''><a href='goodbye.php'>Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class='container-fluid'>
            <div class='row'>
                <div class='container'>
                    <div class='col-lg-4 col-md-6'>
                        <form name='joe' action='action.php' method='POST' enctype='multipart/form-data'>
                            <div class='form-group'>
                                <label for='regno'><h4 style='font-weight:bold'>Register No:</h4></label>
                                <input id='reg_no'type='text' name='reg_no' placeholder='Register Number' class='form-control' required>
                            </div>
                            <div class='checkbox'>
                                <h4 style='font-weight: bold'>Choose Examiner:</h4>
                                
<?php
require('connect_db.php');
$q='select * from examiner order by rand() limit 6';
$r=mysqli_query($dbc,$q);
$i=1;
while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
	echo "
	<label>
	<input id='i$i' type='checkbox' name='e[]' value='$row[name]' onClick='return KeepCount()'>$row[name] ($row[university], $row[email], $row[designation])
	</label>
	<br>	
	";
	$i++;
}
?>									
                            </div>
                            <div class='form-group'>
                             <h4 style='font-weight:bold'>Upload File:</h4>
                             <input type='button' id='file' value='check'>
                             <input type='hidden'  name='check' value='0' id='file_chk'>
                             <span id='file_check'></span>
                             <input type='file' id='myFile' name='file'>                             
                            </div>
                            <div class='form-group'>
                                <input type='submit' value='Next' class='btn btn-primary'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </div>        
    </body>
<script language='javascript'>
	function KeepCount() {
		var NewCount = 0;
		
		var dog=document.getElementById('i1');
		if (dog.checked){
			NewCount = NewCount + 1;
		}
console.log(dog);

		dog=document.getElementById('i2');
		if (dog.checked){
			NewCount = NewCount + 1;
		}
console.log(dog);

		dog=document.getElementById('i3');
		if (dog.checked){
			NewCount = NewCount + 1;
		}
console.log(dog);

		dog=document.getElementById('i4');
		if (dog.checked){
			NewCount = NewCount + 1;
		}
console.log(dog);

		dog=document.getElementById('i5');
		if (dog.checked){
			NewCount = NewCount + 1
		}
console.log(dog);

		dog=document.getElementById('i6');
		if (dog.checked){
			NewCount = NewCount + 1;
		}
console.log(dog);

		if (NewCount == 3){
			alert('Pick Just Two Please');
			document.joe; 
			return false;
		}
	}
</script> 
<script>
	var reg_no=document.getElementById('reg_no');
	var file=document.getElementById('file');
	
	file.addEventListener('click',function() {
		var req=new XMLHttpRequest();
		var file_check=document.getElementById('file_check');
		
		req.open('GET',"file_check.php?reg_no="+reg_no.value+"&type=Synopsis",true);
		req.onreadystatechange=function() {
			if(this.readyState==4) {
				if(this.status==200) {
					if(this.responseText != null) {	
						console.log(this.responseText);
						if(this.responseText==1) {
							file_check.innerHTML="file is already present";
							document.getElementById('file_chk').value='1';
						}
						else {
							file_check.innerHTML="file is not present";
							document.getElementById('file_chk').value='0';
						}
					}
					else console.log('No data received');
				}
				else console.log('Ajax err : '+this.statusText);
			}	
		}
	
		req.send(null);

	});
	
	document.getElementById('myFile').addEventListener('change',function() {
		document.getElementById('file_chk').value='0';
	});
</script>
</html>


