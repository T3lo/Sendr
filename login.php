<?php
	session_start();
	require('login_tools.php');

	if(isset($_SESSION['reg_no'])) {	
		load('index.php');
	}

	echo "
<!DOCTYPE html>
<html>
       <head>
        <title>LOGIN</title>
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' >
        <!--jQuery library--> 
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
        <!--Latest compiled and minified JavaScript--> 
        <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css' type='text/css'>
        <style>
        body{
                width: 100%;
                height: 100%;
                background:url(images/second.jpg)no-repeat center;
                background-size: cover;
            }
        .form-group{
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body class='bodystyle'>
    <div>
        <div class='container'>
            <center>
            <div class='row'>
                <div class='col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-3'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'>
                            <center><h2 style='font-weight: bolder;'>Login</h2></center>
                        </div>
                        <div class='panel-body'>
                            <form action='login_action.php' method='post' class='form_padding'>
                                <div class='form-group'>
                                    <input type='text' required name='reg_no' placeholder=' Enter Name' class='form-control input-lg'>
                                </div>
                                <div class='form-group'>
                                    <input type='password' required name='pass' placeholder='Enter password' class='form-control input-lg'>                                    
                                </div>
                                <br>
                                <div>
                                    <center>
                                        <button type='submit' class='btn btn-primary btn-block'>
                                            Submit
                                        </button>
                                    </center>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </center>
        </div>
    </div>
    </body>
</html>

	";
?>

