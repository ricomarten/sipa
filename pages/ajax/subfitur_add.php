<?php
include ("../../koneksinya.php");
include "../../plugins/AES/function.php";
//print_r($_POST);
$cari_fitur=mysql_query("select * from subproyek where tiket='".$_POST['tiket']."' and fitur='".$_POST['fitur']."'");
if(mysql_num_rows($cari_fitur)>0){
    $cari=mysql_query("select mulai,selesai,durasi from proyek where tiket='".$_POST['tiket']."'");
    $hasil=mysql_fetch_array($cari);
    $query = "INSERT INTO subproyek (tiket,fitur,mulai,selesai,durasi,progres,parent,aktiv) 
    	VALUES ('".$_POST['tiket']."','".$_POST['fitur']."_".$_POST['nama']."','".$hasil['mulai']."','".$hasil['selesai']."','".$hasil['durasi']."',0,'".$_POST['tiket'].$_POST['fitur']."',0)";
    if (!$result = mysql_query($query)) {
    	exit(mysql_error());
    	 //echo "Username sudah pernah ada";
    }
    else{
    	echo "Berhasil menambahkan subfitur#";
    	echo paramEncrypt('page=alokasi&id='.$_POST['tiket'].'');
    }
}else{
    echo "Fitur tidak ditemukan";
}


?> 