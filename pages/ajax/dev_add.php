<?php
	if(isset($_POST['nip']) && isset($_POST['nama']) && isset($_POST['beban']) )
	{
		// include Database connection file 
		include ("../../koneksinya.php");
		
		$data= $_POST['data'];
		$count = count($data);
		$keahlian="";
		for($i=0;$i<$count;$i++){
			if($data[$i]==0) $expert[$i]=0;
			else $expert[$i]=$data[$i];
			$keahlian.=$data[$i]." ";
		}
		$query = "INSERT INTO developer (nip,nama,keahlian,expert,beban) 
			VALUES ('".$_POST['nip']."','".$_POST['nama']."','".$count."','".$keahlian."','".$_POST['beban']."')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }else{
	        echo "Berhasil menambah developer ".$_POST['nama'];
	    }
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