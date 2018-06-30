<?php
	session_start();
	require('login_tools.php');
	
	if(!isset($_SESSION['reg_no'])) {
		load();
	}

function update_mydb($dbc,$trans_id) {
	$q = "update trans set reminder=reminder+1 , date=NOW() where id=$trans_id";
	$r = mysqli_query($dbc,$q);
echo $q;
}

if($_SERVER['REQUEST_METHOD']=='POST') {
	$ex = $_POST['e'];
	$sub = $_POST['title'];
	$trans_id = $_POST['trans_id'];
echo $trans_id;

	$file_dest='up/Synopsis_'.$_POST['reg_no'].'.pdf';
		echo "<br>File in database : $file_dest<br>";
echo "<br>";
	require('connect_db.php');

	$q = "SELECT * FROM examiner WHERE name= '$ex'";
	$r = mysqli_query($dbc,$q);

	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {	
		$em = $row['email'];
	}

echo "<br>";
	

	require("PHPMailer-5.2.4/class.phpmailer.php"); 
	$mail = new PHPMailer(); 
	$mail->IsSMTP();
	$mail->SMTPDebug = 1;
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'ssl';
	$mail->Host = "smtp.gmail.com"; // SMTP server
	$mail->Port = 465;
	$mail->IsHTML(true);
	$mail->Username = "rit97bha@gmail.com";
	$mail->Password = "qwerty123q";
	$mail->SetFrom("ritwik97bhattacharya@gmail.com");

	$mail->AddAddress($em);
	print_r( $em);

$mail->addAttachment($file_dest);

	$mail->Subject = $sub; 
	$mail->Body = "Hi! \n\n This is my first e-mail sent through PHPMailer.".$ex; 
	$mail->WordWrap = 50;

$to = "ritwik97bhattacharya@gmail.com;";

	if(!$mail->Send()) { 
		echo 'Message was not sent.'; 
		echo 'Mailer error: ' . $mail->ErrorInfo; 
	} else { 
		echo 'Message has been sent.'; 
		update_mydb($dbc,$trans_id);	
	} 

	mysqli_close($dbc);
}
?>

