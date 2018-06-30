<html>
<head>
	<title>Entry</title>
	<style>
		#main {
			top: 100px;
			left: 100px;
			position: absolute;
		height: 500px;
		width: 900px;
		display: flex;
		}
		.sub {
		height: 500px;
		width: 300px;
		border: 1px solid;
		}
	</style>
	        <!-- Bootstrap css -->
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <!--jquery declaration --->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- javascript dec-->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
         
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top weight">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                  <!-- <a class="navbar-brand" href="index.html">INFO</a> -->
                  <a class="navbar-brand"><span class="glyphicon glyphicon-home"></span></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href='index.php'>Info</a></li>
                        <li><a href="send.php"> Synopsis</a></li>
                        <li><a href="status.html"> Thesis Dispatch</a></li>
                        <li class="active"><a href=''> Data Capture</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class=""><a href="goodbye.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
	<div id="main">

	<div class="sub" id="one">
			<h2>Examiner</h2>
			<div class="cont" id="one_cont">
				<form method="post" action="entry_action.php">
<input type='text' name='name' placeholder='Name'>
<input type='text' name='email' placeholder='email'>
<input type='text' name='country' placeholder='country'>
<input type='text' name='phone' placeholder='phone'>
<input type='text' name='age' placeholder='age'>
<input type='text' name='address' placeholder='address'>
<input type='text' name='affiliation' placeholder='affiliation'>
<input type='text' name='designation' placeholder='designation'>
<input type='text' name='university' placeholder='university'>
<input type='hidden' name='type' value='1'>
<input type='submit' value='Enter'>
				</form>
			</div>
	</div>
	
	<div class="sub" id="two">
			<h2>Scholar</h2>
			<div class="cont" id="two_cont">
				<form method="post" action="entry_action.php">
<input type='text' name='reg_no' placeholder='Register Number'>
<input type='text' name='name' placeholder='Name'>
<input type='text' name='email' placeholder='email'>
<input type='text' name='instr_name' placeholder='Instructor Name'>
<input type='text' name='title' placeholder='title'>
<input type='hidden' name='type' value='2'>
<input type='submit' value='Enter'>
				</form>
			</div>
	</div>
			
	</div>


</form></body></html>
