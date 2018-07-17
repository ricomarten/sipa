<?php
// include Database connection file
include ("../../koneksinya.php");

// check request
if(isset($_POST))
{
    // get values
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $beban = $_POST['beban'];
	$data= $_POST['data2'];
	$keahlian="";
		$count = count($data);
		for($i=0;$i<$count;$i++){
			if($data[$i]==0) $expert[$i]=0;
			else $expert[$i]=$data[$i];
			$keahlian.=$data[$i]." ";
		}
		
    // Updaste User details
    $query = "UPDATE developer SET 	nama	= '$nama', 
									beban	= $beban,
									keahlian= $count,
									expert  ='".$keahlian."'
									
									WHERE nip = '$nip'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}