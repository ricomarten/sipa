<?php 
require_once('../koneksinya.php');

//Ajax call for state where values are going to be fetch by country_id
if(isset($_POST['kddep'])&&!empty($_POST['kddep'])){

$dep=substr($_POST['kddep'], 0, 1);
if($dep =='8'){
	$sql=mysql_query("select * from bagian where kode like '%000' and SUBSTRING(kode, 1, 1)='".$dep."' and kode<>'80000'");
}else{
	$sql=mysql_query("select * from bagian where kode like '%000' and SUBSTRING(kode, 1, 1)='".$dep."' and SUBSTRING(kode, 2, 1)!='0'");
}

$rowCount=mysql_num_rows($sql);
if($rowCount>0){
	echo '<option value="">Pilih Biro/Direktorat</option>';
		while($row=mysql_fetch_array($sql)){
			echo '<option value="'.$row['kode'].'">'.$row['nama'].'</option>';
		}
	}
	else{
		echo '<option value"">Not Available</option>';
	}
}



//Ajax call for city where values are going to be fetch by dirID
if(isset($_POST['dirID'])&&!empty($_POST['dirID'])){
	$dep=substr($_POST['dirID'], 0, 1);
	$dir=substr($_POST['dirID'], 0, 2);
	if($dep =='8'){
		$sql=mysql_query("select * from bagian where kode like '%00' and SUBSTRING(kode, 1, 1)='".$dep."' and kode<>'80000'");
	}
	else{
		$sql=mysql_query("select * from bagian where kode like '%00' and SUBSTRING(kode, 1, 2)='".$dir."' and SUBSTRING(kode, 3, 1)!='0'");
	}
	$rowCount=mysql_num_rows($sql);
	if($rowCount>0){
		echo '<option value="">Pilih Bagian/Subdir</option>';
		while($row=mysql_fetch_array($sql)){
			echo '<option value="'.$row['kode'].'">'.$row['nama'].'</option>';
		}
	}
	else{
		echo '<option value""> Not Available</option>';
	}
}

//Ajax call for city where values are going to be fetch by dirID
if(isset($_POST['subdirID'])&&!empty($_POST['subdirID'])){
	$dep=substr($_POST['subdirID'], 0, 1);
	$dir=substr($_POST['subdirID'], 0, 3);
	if($dep =='8'){
		$sql=mysql_query("select * from bagian where kode like '%00' and SUBSTRING(kode, 1, 1)='".$dep."' and kode<>'80000'");
	}
	else{
		$sql=mysql_query("select * from bagian where kode like '%0' and SUBSTRING(kode, 1, 3)='".$dir."' and SUBSTRING(kode, 4, 1)!='0'");
	}
	$rowCount=mysql_num_rows($sql);
	if($rowCount>0){
		echo '<option value="">Pilih Subbagian/Seksi</option>';
		while($row=mysql_fetch_array($sql)){
			echo '<option value="'.$row['kode'].'">'.$row['nama'].'</option>';
		}
	}
	else{
		echo '<option value""> Not Available</option>';
	}
}  
?>











