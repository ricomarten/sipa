<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include ("../../koneksinya.php");
include "../../plugins/AES/function.php";
//print_r($_POST);
		    //email
		    $query_email=mysql_query("SELECT u.email FROM proyek p left join user u on u.username=p.user where tiket ='".$_POST['tiket']."'");
		    $email=mysql_fetch_array($query_email);
            require '../../PHPMailer-master/src/Exception.php';
            require '../../PHPMailer-master/src/PHPMailer.php';
            require '../../PHPMailer-master/src/SMTP.php';
            
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
                $mail->addAddress( $email[0]);     // Add a recipient
             
                $kata="<br>Telah dialokasikan dan sedang dalam proses pembangunan. Untuk melihat progres pembangunan dapat dilihat pada aplikasi SIPA.<br><br>Aplikasi SIPA dapat diakses melalui link berikut: https://halosis.bps.go.id/sipa/ <br><br>Terima Kasih.<br>Admin SIPA";
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiket #'.$_POST['tiket'];
                $mail->Body    = $_POST['kata'].$kata;
                $mail->AltBody = $_POST['kata'].$kata;;
            
                $mail->send();
                //echo 'Message has been sent';
            } catch (Exception $e) {
                //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
		    //
			for($i=0;$i<count($_POST['fitur']);$i++){
				//echo "<br>";
				$mulai="awal".$_POST['fitur'][$i]."";
				$selesai="akhir".$_POST['fitur'][$i]."";
				$durasi="durasi".$_POST['fitur'][$i]."";
				$programer="developer".$_POST['fitur'][$i]."";
				$programer_ipd="";
				$fpermintaan="";
				$fpermintaan.=$_POST['fitur'][$i].",";
				for($j=0;$j<count($_POST[$programer]);$j++){
					$programer_ipd.=$_POST[$programer][$j]." ";
				}
				$programer_ipd=substr($programer_ipd,0,-1);
				if(strlen($_POST['fitur'][$i])>3){
				    $_POST['fitur'][$i]=str_replace("--"," ", $_POST['fitur'][$i]);
				    $query="update subproyek set mulai='".$_POST[$mulai]."',
														  selesai='".$_POST[$selesai]."',
														  durasi='".$_POST[$durasi]."',
														  developer='".$programer_ipd."'
									where tiket='".$_POST['tiket']."' and fitur='".$_POST['fitur'][$i]."'";
    				//echo $query;
    				mysql_query($query);
				}else{
				    $query="update subproyek set mulai='".$_POST[$mulai]."',
														  selesai='".$_POST[$selesai]."',
														  durasi='".$_POST[$durasi]."',
														  developer='".$programer_ipd."'
									where tiket='".$_POST['tiket']."' and fitur='".$_POST['fitur'][$i]."'";
    				//echo $query;
    				mysql_query($query);
				}
				

			}
			$developer=mysql_query("SELECT distinct(developer),u.email FROM `subproyek` s left join user u on u.nip=s.developer WHERE tiket='".$_POST['tiket']."'");
			while($data_developer=mysql_fetch_array($developer)){
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
                    $mail->addAddress( $data_developer['email']);     // Add a recipient
                 
                    $kata="<br>Anda telah dialokasikan untuk mengerjakan permintaan tersebut. Untuk melihat detail dapat dilihat pada aplikasi SIPA.<br><br>Aplikasi SIPA dapat diakses melalui link berikut: https://halosis.bps.go.id/sipa/ <br><br>Terima Kasih.<br>Admin SIPA";
                    //Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Tiket #'.$_POST['tiket'];
                    $mail->Body    = $_POST['kata'].$kata;
                    $mail->AltBody = $_POST['kata'].$kata;;
                
                    $mail->send();
                    //echo 'Message has been sent';
                } catch (Exception $e) {
                    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
			}
			$fpermintaan=substr($fpermintaan, 0, -1);
			$query="update proyek set approve='1',alokasi='1',status='3',developer='".$_POST['leader']."',fitur_fix='".$fpermintaan."' where tiket='".$_POST['tiket']."'";
			if (!$result = mysql_query($query)) {
				exit(mysql_error());
				 //echo "Username sudah pernah ada";
			}
			else{
				echo "Berhasil alokasi";
				//echo paramEncrypt('page=alokasi&id='.$_POST['tiket'].'');
			}
?>