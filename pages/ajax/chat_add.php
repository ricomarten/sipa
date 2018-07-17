<?php
require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

	if(isset($_POST['username']) && isset($_POST['tiket']) && isset($_POST['pesan']) && trim($_POST['pesan'])!='')
	{
		// include Database connection file 
		include ("../../koneksinya.php");

		$query = "INSERT INTO chat (tiket,username,pesan,waktu,level) 
			VALUES ('".$_POST['tiket']."','".$_POST['username']."','".$_POST['pesan']."','".$_POST['waktu']."','".$_POST['level']."')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    else{
	        $query_email=mysql_query("SELECT u.email FROM proyek p left join user u on u.username=p.user where tiket ='".$_POST['tiket']."'");
		    $email=mysql_fetch_array($query_email);
		    $email_user=$_POST['username']."@bps.go.id";
	        if($email_user<>$email[0]){
	            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                try {
                    //Server settings
                    //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'smtp.bps.go.id'; // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'ricomarten@bps.go.id';                 // SMTP username
                    $mail->Password = '86879385';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to
                
                    //Recipients
                    $mail->setFrom('support@bps.go.id', 'SIPA(Sistem Permintaan Aplikasi)');
                    $mail->addAddress($email[0]);     // Add a recipient
                 
                    $kata="<br>Anda mendapatkan pesan terkait tiket ".$_POST['tiket'].". Silahkan cek aplikasi SIPA <br><br><br><br>Terima Kasih.<br>Admin SIPA";
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Pesan Tiket #'.$_POST['tiket'];
                    $mail->Body    = $kata;
                    $mail->AltBody = $kata;
                
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }  
	        }
	        
	    }
	    echo "<script> alert(1 Record Added!); </script>";
	}
?>