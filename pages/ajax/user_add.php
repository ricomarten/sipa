<?php
	if(isset($_POST['nip']) && isset($_POST['nama']) && isset($_POST['username'])){
		// include Database connection file 
		include ("../../koneksinya.php");
		$_POST['nama']=str_replace("'","",$_POST['nama']);
		$query = "INSERT INTO user (username,nip,nama,email,level,bagian) 
			VALUES ('".$_POST['username']."','".$_POST['nip']."','".$_POST['nama']."','".$_POST['email']."','".$_POST['level']."','".$_POST['bagian']."')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	         //echo "Username sudah pernah ada";
	    }
	    else{
	        echo "Berhasil menambahkan user ".$_POST['nama'];
	    }
	    
	}
?>