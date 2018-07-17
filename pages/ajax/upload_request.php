<?php
print_r($_FILES);
print_r($_POST);
$namadokumen=explode(".",$_POST['dokumenlama']);
echo $namadokumen[(count($namadokumen)-2)];
echo $_GET['perubahan'];

//echo $nama_dokumen;
include ("../../koneksinya.php");
$explode	= explode('.',$_FILES['datafile']['name']);
$extensi	= $explode[count($explode)-1];
$trimmed = trim(str_replace($extensi, '', $_FILES['datafile']['name']));
$nama_dokumen=$namadokumen[(count($namadokumen)-2)]."-rev-1.".$extensi;
$dok=trim($_GET['tiket'])."-".$_POST['tipe']."-".$_GET['subdir']."-".substr($_GET['nama'],0,39)."-".$trimmed.$extensi;
$dok=str_replace(" ","",$dok);
$dok=str_replace("/","",$dok);

// baca nama file
$fileName = $_FILES["datafile"]["name"];
// baca file temporary upload
$fileTemp = $_FILES["datafile"]["tmp_name"];
// baca tipe file
$fileType = $_FILES["datafile"]["type"];
// baca filesize
$fileSize = $_FILES["datafile"]["size"];
if($fileSize>2097152){
    echo "ukuran file terlalu besar";
}else{
    // proses upload file ke folder /upload
    if (move_uploaded_file($fileTemp, '../../upload/'.$nama_dokumen)){
        echo "Upload $fileName selesai";
        //$query = "insert into dokumen(tiket,nama) values ('".$_GET['tiket']."','".$dok."')";
        //if (!$result = mysql_query($query)) {
        //    exit(mysql_error());
        //}
    }
}  
?>