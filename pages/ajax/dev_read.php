<?php
include ("../../koneksinya.php");

$query=mysql_query("select * from developer");
while($data=mysql_fetch_array($query)){
echo "<tr>";
	echo "<td>".$data['nip']."</td>";
	echo "<td>".$data['nama']."</td>";
	echo "<td>";
	$nama=explode(" ",$data['expert']);
	$cetak="";
	for($i=0;$i<=count($nama)-1;$i++){	
		$Query_nama=mysql_query("select nama from program where kode='".$nama[$i]."'");
		$Hasil=mysql_fetch_array($Query_nama);
		$cetak.=$Hasil['nama'].", ";
	}
	echo substr($cetak,0,-4);
	echo"</td>";
	echo "<td>".$data['beban']."</td>";
	echo "<td>
		<button onclick='GetDetails(\"".$data['nip']."\")' class='btn btn-warning'><i class='fa fa-edit'></i></button>
		<button onclick='Delete(".$data['nip'].",\"".$data['nama']."\")' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>";
echo "</tr>";
} 

 
?>
