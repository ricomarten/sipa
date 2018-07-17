<?php
include ("../../koneksinya.php");
function Icon($dokumen){
	$explode	= explode('.',$dokumen);
	$extensi	= $explode[count($explode)-1];
	if($extensi=='pdf') $tulis= "<i class='fa fa-file-pdf-o'></i>"; 
	else if($extensi=='xls' || $extensi=='xlsx' || $extensi=='XLS' || $extensi=='XLSX' ) $tulis= "<i class='fa fa-file-excel-o'></i>"; 
	else if($extensi=='doc' || $extensi=='docx' || $extensi=='DOC' || $extensi=='DOCX' ) $tulis= "<i class='fa fa-file-word-o'></i>"; 
	else if($extensi=='jpg' || $extensi=='jpeg' || $extensi=='JPG' || $extensi=='JPEG' ) $tulis= "<i class='fa fa-file-image-o'></i>";
	else if($extensi=='pdf' || $extensi=='PDF' ) $tulis= "<i class='fa fa-file-pdf-o'></i>"; 
	else if($extensi=='png' || $extensi=='gif' || $extensi=='PNG' || $extensi=='GIF' ) $tulis= "<i class='fa fa-file-image-o'></i>"; 
		
	else $tulis= "<i class='fa fa-file'></i>"; 
	return $tulis;
}	

$sql_fitur=mysql_query("select * from fitur");
while($data_fitur=mysql_fetch_array($sql_fitur)){
	$nama_fitur[]=$data_fitur['nama'];
}
$query=mysql_query("select p.*,jp.nama as nama_perubahan,py.nama as nama_proyek from request p 
					left join jenis_perubahan jp on p.jenis=jp.kode 
					left join proyek py on p.tiket=py.tiket 
					where p.tiket='".$_GET['tiket']."' and p.perubahan='".$_GET['perubahan']."'");

while ($data=mysql_fetch_array($query)){
	$data['jenis']=substr_replace($data['jenis'] ,"",-1);
	$pisah=explode(" ",$data['jenis']);
	for($k=0;$k<count($pisah);$k++){
		echo "<tr>";
		//echo "<td>".$data['tiket']."</td>";					
		//echo "<td>".$data['nama_proyek']."</td>";
		//echo "<td>".$data['perubahan']."</td>";		
		switch($pisah[$k]){
			case "0":
				echo "<td>Fitur</td>";
				echo "<td><ol>";
				$fiturlama=explode(" ",$data['fitur_awal']);
				for($i=0;$i<count($fiturlama)-1;$i++){
					$indek=$fiturlama[$i]-1;
					echo "<li>".$nama_fitur[$indek]."</li>";
				}
				echo "</ol></td>";
				
				echo "<td><ol>";
				$fiturlama=explode(" ",$data['fitur_awal']);
				for($i=0;$i<count($fiturlama)-1;$i++){
					$indek=$fiturlama[$i]-1;
					echo "<li>".$nama_fitur[$indek]."</li>";
				}
				$fiturbaru=explode(" ",$data['fitur_baru']);								
				for($i=0;$i<count($fiturbaru)-1;$i++){
					$indek=$fiturbaru[$i]-1;
					echo "<li>".$nama_fitur[$indek]."</li>";
				}
				echo "</ol></td>";
				break;
			case "1":
				echo "<td>Fitur</td>";
				echo "<td><ol>";
				$fiturlama=explode(" ",$data['fitur_awal']);
				for($i=0;$i<count($fiturlama)-1;$i++){
					$indek=$fiturlama[$i]-1;
					echo "<li>".$nama_fitur[$indek]."</li>";
				}
				echo "</ol></td>";
				
				echo "<td><ol>";
				$fiturbaru=explode(" ",$data['fitur_baru']);								
				for($i=0;$i<count($fiturbaru)-1;$i++){
					$indek=$fiturbaru[$i]-1;
					echo "<li>".$nama_fitur[$indek]."</li>";
				}
				echo "</ol></td>";
				break;
			case "2":
				echo "<td>Kelengkapan Dokumen</td>";
				$sqldok=mysql_query("select * from perubahan_dokumen where tiket=".$data['tiket']." and perubahan=".$data['perubahan']."");
				while($dokumen=mysql_fetch_array($sqldok)){
					$dokumen_awal[]=$dokumen['dokumen_awal'];
					$dokumen_baru[]=$dokumen['dokumen_baru'];
					//echo "<td><a href='upload/".$dokumen['dokumen_awal']."' target='_blank'>".$dokumen['dokumen_awal']." ".Icon($dokumen['dokumen_awal'])."</a> </td>";
					//echo "<td><a href='upload/".$dokumen['dokumen_baru']."' target='_blank'>".$dokumen['dokumen_baru']." ".Icon($dokumen['dokumen_baru'])."</a> </td>";
				}
				echo "<td><ol>";
				foreach($dokumen_awal as $dok_awal){
					echo "<li><a href='upload/".$dok_awal."' target='_blank'>".$dok_awal." ".Icon($dok_awal)."</a></li>";
				}
				echo "</ol></td>";
				echo "<td><ol>";
				foreach($dokumen_baru as $dok_baru){
					echo "<li><a href='upload/".$dok_baru."' target='_blank'>".$dok_baru." ".Icon($dok_baru)."</a></li>";
				}
				echo "</ol></td>";
				break;
			case "3":
				echo "<td>Kuesioner</td>";
				echo "<td><a href='upload/".$data['kuesioner_lama']."' target='_blank'>".$data['kuesioner_lama']." ".Icon($data['kuesioner_lama'])."</a> </td>";
				echo "<td><a href='upload/".$data['kuesioner_baru']."' target='_blank'>".$data['kuesioner_baru']." ".Icon($data['kuesioner_baru'])."</a> </td>";
				break;
			case "4":
				echo "<td>Rule Validasi</td>";
				echo "<td><a href='upload/".$data['rule_lama']."' target='_blank'>".$data['rule_lama']." ".Icon($data['rule_lama'])."</a> </td>";
				echo "<td><a href='upload/".$data['rule_baru']."' target='_blank'>".$data['rule_baru']." ".Icon($data['rule_baru'])."</a> </td>";
				break;
			case "5":
				echo "<td>Tabulasi</td>";
				echo "<td><a href='upload/".$data['tabulasi_lama']."' target='_blank'>".$data['tabulasi_lama']." ".Icon($data['tabulasi_lama'])."</a> </td>";
				echo "<td><a href='upload/".$data['tabulasi_baru']."' target='_blank'>".$data['tabulasi_baru']." ".Icon($data['tabulasi_baru'])."</a> </td>";
				break;
		} 
	echo "</tr>";
	}												
	

}
?>
