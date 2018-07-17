<?php
error_reporting(0);
session_start();
include "koneksinya.php";
include "plugins/AES/function.php";
include ("nusoap.php");

function NickName($nama){
	$nick=explode(" ",$nama);
	if(count($nick)>1)
		return $nick[1]." ".substr($nick[2],0,1);
	else 
		return $nick[0];
    
}
function getWorkingDays($startDate, $endDate){
	$begin = strtotime($startDate);
	$end   = strtotime($endDate);
	if ($begin > $end) {
		echo "hari mulai harus lebih dahulu! <br />";
		return 0;
	} else {
		$no_days  = 0;
		$weekends = 0;
		while ($begin <= $end) {
			$no_days++; // no of days in the given interval
			$what_day = date("N", $begin);
			if ($what_day > 5) { // 6 and 7 are weekend days
				$weekends++;
			};
			$begin += 86400; // +1 day
		};
		$working_days = $no_days - $weekends;
		return $working_days;
	}
} 
function selisihHari($awal,$akhir){
	$begin = strtotime($awal);
	$end   = strtotime($akhir);
	
	return ($begin-$end)/86400;
}	
function TanggalLengkap($tgl){
	$bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
	$pisah=explode("-",$tgl);
	$bln=(int)$pisah[1]-1;
	return $pisah[2]." ".$bulan[$bln]." ".$pisah[0];
}
function Tanggal($waktu){
	$tanggal=explode("-",$waktu);
	$awal=$tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
	return $awal;
}
function Icon($dokumen){
	$explode	= explode('.',$dokumen);
	$extensi	= $explode[count($explode)-1];
	if($extensi=='pdf') $tulis= "<i class='fa fa-file-pdf-o'></i>"; 
	else if($extensi=='xls' || $extensi=='xlsx' || $extensi=='XLS' || $extensi=='XLSX' ) $tulis= "<i class='fa fa-file-excel-o'></i>"; 
	else if($extensi=='doc' || $extensi=='docx' || $extensi=='DOC' || $extensi=='DOCX' ) $tulis= "<i class='fa fa-file-word-o'></i>"; 
	else if($extensi=='jpg' || $extensi=='jpeg' || $extensi=='JPG' || $extensi=='JPEG' ) $tulis= "<i class='fa fa-file-image-o'></i>"; 
	else $tulis= "<i class='fa fa-file'></i>"; 
	return $tulis;
}
function Login($username, $password){
	$remote_ip = $_SERVER['REMOTE_ADDR'];
	$key = "568d8e5dab9835b2de71237df24f20d3";
	$wsdl = "http://api.bps.go.id/community/index.php?wsdl";
	$username = strtolower($username);
	
	$client = new nusoap_client($wsdl, true);
	$err = $client->getError();

	if ($err) {
		die('gagal login');
		return false; //gagal login
	} else {
		$result = $client->call('login', array('username' => $username, 'password' => $password, 'remote_ip' => $remote_ip, 'key' => $key));
		if ($result['kode'] == "1") {
		   return true; 
		} else {
			return false;
		}
	}
	unset($client);
	/* end login using ldap */
}
function Data($username){
	$remote_ip = $_SERVER['REMOTE_ADDR'];
	$key = "568d8e5dab9835b2de71237df24f20d3";
	$wsdl = "http://api.bps.go.id/community/index.php?wsdl";
	$username = strtolower($username);
	
	$client = new nusoap_client($wsdl, true);
	$err = $client->getError();
	if ($err) {
		die('gagal login');
		return false; //gagal login
	} else {
		$jenisinput = 'email';
		$input = $username;
		$info = $client->call('pegawai_data', array('jenisinput' => $jenisinput, 'input' => $input, 'key' => $key));
		$ldap = NULL;

		if (isset($info['error'])) {
			die('gagal login2');
			$ldap = NULL;
		} else if ($info['kode'] != "1") {
			die('gagal login3');
			$ldap = NULL;
		} else {
			$ldap = array(
				'id' => $username,
				'email' => $info['email'],
				'nama' => $info['nama'],
				'niplama' => $info['niplama'],
				'nipbaru' => $info['nipbaru'],
				'url_foto' => $info['url_foto'],
				'unitkerja_id' => $info['unitkerja_id'],
				'unitkerja' => $info['unitkerja'],
				'wilayah' => $info['wilayah'],
				'jabatan' => $info['jabatan'],
			);
			//die(var_dump($ldap));

			return $ldap;
		}
	}
unset($client);
	/* end login using ldap */
}
if (isset($_SESSION['username']) && (isset($_SESSION['password']))){	
	if(isset($_GET['tiket']) && $_GET['tiket']!=$_SESSION['tiket']){
		// remove all session variables
		session_unset(); 
		// destroy the session 
		session_destroy(); 
		header("Location:index.php?page=entri&tiket=".$_GET['tiket']."&username=".$_GET['username']."");
	}
	$pURI = explode('?', $_SERVER['REQUEST_URI']);
	if((count($pURI)==1) || ((count($pURI)==2) && (strlen($pURI[1])<32))){
		$page="main";
		$halaman="pages/$page.php";
	}
	else{
		$var=decode($_SERVER['REQUEST_URI']);
		$page=$var['page'];
		$halaman="pages/$page.php";
	}
	include "pages/header.php";
	//jika file yang diinclude tidak ada.
	if(!file_exists($halaman) || empty($page)){		
		include "pages/main.php";	
	}else{
		include "$halaman";
	}
	include "pages/footer.php";
}
else
{
	if($_GET['page']=='entri' && !empty($_GET['tiket']) && !empty($_GET['username'])){
	    $conn2 = @mysql_connect('localhost','root','');
        if (!$conn2) {
        	die('Could not connect: ' . mysql_error());
        }
        mysql_select_db('support_db', $conn2);
        $query=mysql_query("select * from ost_ticket where number='".$_GET['tiket']."'", $conn2);
        $jml_data=mysql_num_rows($query);
        if($jml_data>=1){
            mysql_close($conn2);
            $_SESSION['username']=$_GET['username'];
		
    		//$pegawai 	= $client->call('pegawai_data', array('jenisinput'=>$jenisinput, 'input'=>$input, 'key'=>$key) );
    			/* $pegawai 	= $client->call('pegawai_data', array('jenisinput'=>$jenisinput, 'input'=>$input, 'remote_ip'=>$remote_ip, 'key'=>$key) );
    			$c_nama		= $pegawai['nama'];
    			$c_email	= $pegawai['email'];
    			$c_nip		= $pegawai['nipbaru'];
    			$c_jabatan	= $pegawai['jabatan'];
    			$c_unitkerja= $pegawai['unitkerja'];
    			$c_wilayah	= $pegawai['wilayah'];
    			$c_unitkerja_id= $pegawai['unitkerja_id'];
    			$c_wilayah_id	= $pegawai['wilayah_id']; */
    		$data=Data($_GET['username']);
    		$_SESSION["email"]= $data['email'];
    		$_SESSION["nama"]= $data['nama'];
    		$_SESSION["niplama"]= $data['niplama'];
    		$_SESSION["nipbaru"]= $data['nipbaru'];
    		$_SESSION["url_foto"]= $data['url_foto'];
    		$_SESSION["unitkerja_id"]= $data['unitkerja_id'];
    		$_SESSION["unitkerja"]= $data['unitkerja'];
    		$_SESSION["wilayah"]= $data['wilayah'];
    		$_SESSION["jabatan"]= $data['jabatan'];
    		include "koneksinya.php";
    		include "pages/header.php";
    		include "pages/entri.php";	
    		include "pages/footer.php";
        }else{
            echo "<script> alert('Nomer tiket tidak terdaftar di halosis');window.location.href ='pages/login.php'</script>";
            //header('Location: pages/login.php');
        }
		
	}
	else{
		header('Location: pages/login.php');
	}	
}

?>