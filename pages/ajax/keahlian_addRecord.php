<?php
	if(isset($_POST['nama']) && isset($_POST['kode']) )
	{
		// include Database connection file 
		include ("../../koneksinya.php");

		// get values 
		$nama = $_POST['nama'];
		$kode = $_POST['kode'];
		
		$query = "INSERT INTO program (kode,nama) 
								VALUES ('".$_POST['kode']."','".$_POST['nama']."')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>