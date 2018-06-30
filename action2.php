<?php
	session_start();
	require('login_tools.php');
	
	if(!isset($_SESSION['reg_no'])) {
		load();
	}

if($_SERVER['REQUEST_METHOD']=='POST') {
	$ex = $_POST['e'];
	$sub = $_POST['title'];
print_r($_POST);
echo "<br><br>";
	if($_POST['check']==0) {
		if(isset($_FILES['file']['size'])) {
			$file=$_FILES['file'];
			$file_tmp=$file['tmp_name'];
			$file_err=$file['error'];
	print_r($file);
			if($file_err === 0) {
				$file_dest='up/Thesis_'.$_POST['reg_no'].'.pdf';
				if(move_uploaded_file($file_tmp,$file_dest)) echo $file_dest;
			}
		}
	}
	else {
		$file_dest='up/Thesis_'.$_POST['reg_no'].'.pdf';
		echo "<br>File in database : $file_dest";	
	}
echo "<br>";
	require('connect_db.php');

	$q = "select *from examiner where id=$ex";
	$r = mysqli_query($dbc,$q);
	while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)) {
		$em=$row['email'];
	}

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

	$mail->addAttachment($file_dest);

	$mail->Subject = $sub; 
	$mail->Body = "Hi! \n\n This is my first e-mail sent through PHPMailer.".$ex[0]; 
	$mail->WordWrap = 50;

	$to = "ritwik97bhattacharya@gmail.com;";

/*
	if(!$mail->Send()) { 
		echo 'Message was not sent.'; 
		echo 'Mailer error: ' . $mail->ErrorInfo; 
	} else { 
		echo 'Message has been sent.'; 
	} 
*/
	mysqli_close($dbc);
}
?>

