<?php
include ("../../koneksinya.php");

?>
<input type="text" class="form-control" id="kode" name="kode" placeholder="Isikan Nama Proyek Sensus/Survei" 
value="<?php 
	//if ($_SERVER['REQUEST_METHOD'] == 'POST') echo  str_replace(" ","",$_POST['kode']);
	
	$cari=mysql_query("select max(kode) from program");	
	$hasil=mysql_fetch_array($cari);
	if ($hasil[0]=="") echo "1";
	else echo $hasil[0]+1;
?>" readonly required>