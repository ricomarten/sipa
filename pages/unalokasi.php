<?php
$query=mysql_query("select * from proyek where tiket='".$var['id']."'");
$data=mysql_fetch_array($query);
$update=mysql_query("update subproyek set mulai='".$data['mulai']."',
										selesai='".$data['selesai']."',
										developer='',
										progres=0,
										durasi='".$data['durasi']."'
										where tiket='".$var['id']."'
										");
$update2=mysql_query("update proyek set alokasi='0',approve='0',progres=0, developer='' where tiket='".$var['id']."'");
if(!$update){
	echo "gagal";
}
if(!$update2){
	echo "gagal proyek";
}
echo "<script>window.history.back();</script>"
?>