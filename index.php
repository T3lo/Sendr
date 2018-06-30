<?php
	session_start();
	require('login_tools.php');
	
	if(!isset($_SESSION['reg_no'])) {
		load();
	}

	echo "
<!DOCTYPE html>

<html>
    <head>
        <title>INFORMATION</title>
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
                  <a class='navbar-brand'><span class='glyphicon glyphicon-home'></span></a>
                </div>
                
                <div class='collapse navbar-collapse' id='myNavbar'>
                    
                    <ul class='nav navbar-nav navbar-left'>
                        <li class='active'><a href='index.php'>Info</a></li>
                        <li class='style'><a href='send.php'> Synopsis</a></li>
                        <li class='style'><a href='status.html'> Thesis dispatch</a></li>
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
                    <div class='col-lg-12 col-lg-offset-3 col-md-6'>
                        <form action='get_info.php' method='post' class='form-inline'>
                            <div class='form-group'>
                        <!--        <label for='regno'><h3 style='font-weight:bold'>Register No:</h3></label> -->
                                <input type='text' name='reg_no' placeholder='Register Number' class='form-control input-lg' required>
                            </div>
                            &nbsp;
                            <div class='form-group'>
                                 <input type='submit' value='Submit' class='btn btn-primary input-lg '>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>  
        </div>
        <hr>
    </body>
</html>	";
?>
