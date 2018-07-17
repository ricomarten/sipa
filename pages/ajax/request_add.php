<?php
include ("../../koneksinya.php");
include ("../../plugins/AES/function.php");
$simpan=false;
//echo "<pre>";
//print_r($_POST);
$jenis_perubahan="";
$fitur_baru="";
foreach($_POST['jenis'] as $jenis ){
	if($jenis=='2'){
		if(empty($_POST['dokumen_baru'])){
			print "dokumen baru harus ada";
			$simpan2=false;
		}
		else $simpan2=true;
	}
	if($jenis=='1'){
		if(empty($_POST['fitur'])){
			print "fitur harus terpilih";
			$simpan1=false;
		}
		else{
			foreach($_POST['fitur'] as $fitur ){
				$fitur_baru=$fitur_baru.$fitur." ";
			}
			$simpan1=true;
		}
	}
	$jenis_perubahan=$jenis_perubahan.$jenis." ";
}
$fitur_baru=$_POST['fitur_awal'].$fitur_baru;
if($simpan1 && $simpan2){
	$result="Berhasil";
	$sql="INSERT INTO request(tiket, perubahan, jenis, fitur_awal, fitur_baru, ket_fitur, alasan_fitur, id_perubahan_dok, ket_dok, alasan_dok,tanggal,konfirmasi)
	VALUES (".$_POST['tiket'].",".$_POST['perubahan'].",'".$jenis_perubahan."','".$_POST['fitur_awal']."','".$fitur_baru."','".$_POST['ket_fitur']."',
			'".$_POST['alasan_fitur']."','".$_POST['tiket']."-".$_POST['perubahan']."','".$_POST['ket_dokumen']."','".$_POST['alasan_dokumen']."','".date("Y:m:d h:m:s")."','0')";
	$hasil=mysql_query($sql);
	if($hasil){
		$i=0;	
		foreach($_POST['dokumen_baru'] as $dokumen){
			//echo $dokumen."\n";
			$id=$_POST['tiket']."-".$_POST['perubahan']."-".$i;
			$id_perubahan=$_POST['tiket']."-".$_POST['perubahan'];
			$sql_dok="INSERT INTO perubahan_dokumen(id,id_perubahan, tiket, perubahan, dokumen_awal, dokumen_baru) 
				VALUES ('".$id."','".$id_perubahan."',".$_POST['tiket'].",".$_POST['perubahan'].",'".$_POST['dokumen_lama'][$i]."','".$dokumen."')\n";
			//echo $sql_dok;
			$hasil2=mysql_query($sql_dok);
			if(!$hasil2) $result="Gagal";
			$i++;
		}
	}else{
		$result="Gagal";
	}
	if($result=="Gagal"){
		echo "Gagal menambahkan perubahan permintaan";
	}else{
		//echo "Berhasil";
		echo "Berhasil menambahkan perubahan permintaan#";
		echo paramEncrypt('page=request');
	}
}

//echo $sql;
//echo "</pre>";
?>
