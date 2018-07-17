<?php
if($_GET['act']=='read'){
	include ("../../koneksinya.php");
	
	$query=mysql_query("select * from dokumen where tiket='".$_GET['tiket']."'");
	while($dokumen=mysql_fetch_array($query)){
		//echo "<option value ='".$dokumen['nama']."'>".$dokumen['nama']."</option>";
		
		echo "<tr>";
		echo "<td> <a href='upload/".$dokumen['nama']."' target='_blank'>".$dokumen['nama']." </a></td>";
		$dir    = '../../upload';
		$files = scandir($dir, 1);
		$tiket=$_GET['tiket'];
		$rev=$_GET['perubahan'];
		$namfile=explode('.',$dokumen['nama']);
		$nama_rev=$namfile[0]."-rev-".$rev;
		foreach($files as $f){
			$pecah=explode('.',$f);
			if($nama_rev==$pecah[0]){
				echo "<input type='hidden' class='form-control' id='dokumen_lama[]' name='dokumen_lama[]' value='".$dokumen['nama']."'>";
				echo "<td><input type='text' class='form-control' id='dokumen_baru[]' name='dokumen_baru[]' value='".$f."'>";			
				echo "<br><a href='upload/".$f."' class='btn btn-danger' target='_blank'><span class='fa fa-download'></a>&nbsp;";
				echo "<button class='btn btn-danger' type='button' onclick='hapusFile(\"".$f."\");'><span class='fa fa-close'></button></td>";
			}
		}	
		echo "</tr>";
	}
}
?>