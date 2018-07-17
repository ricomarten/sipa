<?php
require '../../PHPMailer-master/src/Exception.php';
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(0);
include "../../plugins/AES/function.php";
include ("../../koneksinya.php");
//print_r($_FILES);
//print_r($_POST);
$dir    = '../../upload';
$files = scandir($dir, 1);
$tiket=$_POST['tiket'];
$ketemu=0;
$kue=0;$bp=0;$rv=0;$rt=0;
$dokumen = array();

foreach($files as $f){
    $pecah=explode('-',$f);
    if($tiket==$pecah[0]){
        array_push($dokumen,$f);
        $ketemu++;
        if($pecah[1]=='kue'){
            $kue++;
        }if($pecah[1]=='bp'){
            $bp++;
        }if($pecah[1]=='rv'){
            $rv++;
        }if($pecah[1]=='rt'){
            $rt++;
        }if($pecah[1]=='dk'){
            $dk++;
        }
    }
}
if($ketemu>0){
    //if(($_POST['kebutuhan']=='1' && $kue>0 && $bp>0 && $rv>0) || ($_POST['kebutuhan']=='2' && ($kue>0 || $bp>0 || $rv>0 || $rt>0|| $dk>0))){
    if($kue>0 || $bp>0 || $rv>0 || $rt>0|| $dk>0){
     
    $tanggal=explode("/",$_POST['waktu']);
        $awal=date('Y-m-d');
        $akhir=$tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
        $fitur = $_POST['fitur'];
        $count = count($fitur);
        if($_POST['level']=='4') $ketlain=$_POST['ketLain'];
        else $ketlain="";
        $fpermintaan="";
        for($i=0;$i<$count;$i++){
            $fpermintaan.=$fitur[$i].",";
        }
        $fpermintaan=substr($fpermintaan, 0, -1);
        if($_POST['pengembangan']=="") $pengembangan=0;
        else $pengembangan=$_POST['pengembangan'];
        //$query = "INSERT INTO proyek(tiket, bagian, nama, tujuan, kebutuhan, aplikasi, level, ketlain, mulai, selesai, durasi, durasi_keg, progres, parent, fitur, fitur_permintaan,  approve, alokasi, user, tgl_entri, alasan, tahun, pengembangan)
        //         VALUES ('".$_POST['tiket']."','".$_POST['subdir']."','".$_POST['nama']."','".$_POST['tujuan']."','".$_POST['kebutuhan']."','".$_POST['aplikasi']."','".$_POST['level']."','".$_POST['ketlain']."','".$awal."','".$akhir."','".$_POST['durasi']."','0','0','0','".$count."','".$fpermintaan."','0','0','".$_POST['username']."','".date('Y-m-d H:i:s')."','0','".$_POST['tahun']."','".$pengembangan."')";
        $sql_durasi=mysql_query("select durasi from proyek where tiket='".$tiket."'"); 
		$durasi_lama=mysql_fetch_array($sql_durasi);
		$selisih_durasi=$_POST['durasi']-$durasi_lama[0];
        /* $query= "update proyek set nama='".$_POST['nama']."',
        							tujuan='".$_POST['tujuan']."',
        							kebutuhan='".$_POST['kebutuhan']."',
        							aplikasi='".$_POST['aplikasi']."',
        							level='".$_POST['level']."',
        							ketlain='".$ketlain."',
        							approve='0',
        							mulai='".$awal."',
        							selesai='".$akhir."',
        							durasi='".$_POST['durasi']."',
        							fitur='".$count."',
        							fitur_permintaan='".$fpermintaan."',
        							alasan='',
        							alokasi='0',
        							status='1',
        							tahun='".$_POST['tahun']."',
        							pengembangan='$pengembangan'
        			where tiket='".$_POST['tiket']."'"; */
		$query= "update proyek set nama='".$_POST['nama']."',
        							tujuan='".$_POST['tujuan']."',
        							kebutuhan='".$_POST['kebutuhan']."',
        							aplikasi='".$_POST['aplikasi']."',
        							level='".$_POST['level']."',
        							ketlain='".$ketlain."',
        
        							
        							selesai='".$akhir."',
        							durasi='".$_POST['durasi']."',
        							fitur='".$count."',
        							fitur_permintaan='".$fpermintaan."',
        							alasan='',
        					
        							status='1',
        							tahun='".$_POST['tahun']."',
        							pengembangan='$pengembangan'
        			where tiket='".$_POST['tiket']."'";
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
        else{
			$hapus_fitur=mysql_query("select fitur from subproyek where tiket='".$_POST['tiket']."'");
			while($data_hapus_fitur=mysql_fetch_array($hapus_fitur)){
				if (!(in_array($data_hapus_fitur['fitur'], $fitur))){
					$delete=mysql_query("delete from subproyek where tiket='".$_POST['tiket']."' and fitur='".$data_hapus_fitur['fitur']."'");
				}
			}
            //$delete=mysql_query("delete from subproyek where tiket='".$_POST['tiket']."'");
			for($i=0;$i<$count;$i++){
					$cek_ada_fitur=mysql_query("select * from subproyek where tiket='".$_POST['tiket']."' and fitur='".$fitur[$i]."'");
					$result_fitur=mysql_num_rows($cek_ada_fitur);
					if($result_fitur>0){
						$durasi_fitur=mysql_fetch_array($cek_ada_fitur);
						$darasi_baru=$_POST['durasi']-$durasi_fitur['durasi'];						
						$result2 = mysql_query("update subproyek set durasi='".($_POST['durasi']+$selisih_durasi)."'
												where  tiket='".$_POST['tiket']."' and fitur='".$fitur[$i]."'");
					}
					else{
						$result2 = mysql_query("INSERT INTO subproyek (tiket,fitur,mulai,selesai,durasi,progres,parent ) 
								VALUES ('".$_POST['tiket']."','".$fitur[$i]."','".$awal."','".$akhir."',".$_POST['durasi'].",0,'".$_POST['tiket']."')");
					//echo mysql_error();
					}
				}
				
            //email
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
                $mail->addAddress( $_POST['email']);     // Add a recipient
             
                $kata="<br>Permintaan Anda telah didaftarkan di Sistem Informasi Permintaan Aplikasi (SIPA).<br><br><br><br>Terima Kasih.<br>Admin SIPA";
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiket #'.$_POST['tiket'];
                $mail->Body    = $kata;
                $mail->AltBody = $kata;
            
                $mail->send();
                $pesan= 'Message has been sent';
            } catch (Exception $e) {
                $pesan= 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
            }
			echo "Berhasil mengubah permintaan#";
			echo paramEncrypt('page=list&tiket='.$tiket.'');
        } 
    }
    else{
        echo "Untuk pembangunan aplikasi, semua jenis dokumen harus diupload: Kuesioner Final, Bisnis Proses, Rule Validasi, dan Rancangan Tabulasi\n\nUntuk pengembangan aplikasi paling tidak upload 1 dokumen";
    }
}
else{
    echo "Harus ada dokumen yang diupload";
}

	    
?>