<?php
include ("../../nusoap.php");
include ("../../koneksinya.php");
$key = "568d8e5dab9835b2de71237df24f20d3";
$wsdl = "http://api.bps.go.id/community/index.php?wsdl";
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
			//die('gagal login3');
			$ldap = NULL;
		} else {
		    $bagian =substr($info['unitkerja_id'],0,3)."00";
			$sql=mysql_query("select * from bagian where kode ='".$bagian."'");
            while($row=mysql_fetch_array($sql)){
                $kode_subdir=$row['kode'];
                $subdir=$row['nama'];
            }
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
				'subdir_id' => $kode_subdir,
				'subdir' => $subdir,
			);
			//die(var_dump($ldap));

			return $ldap;
		}
	}
unset($client);
	/* end login using ldap */
}

$pegawai 	= Data($_POST['username']);
echo json_encode($pegawai);

?>