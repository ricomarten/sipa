<?php
include ("../../koneksinya.php");
$query=mysql_query("select * from program");
$jml=mysql_num_rows($query);
$i=1;
while($data=mysql_fetch_array($query)){
echo "<tr>";
	echo "<td>".$data['kode']."</td>";
	echo "<td>".$data['nama']."</td>";
	$id=$data['kode'];
	echo "<td>";
	if($i!=$jml){
		echo "<button onclick='GetModulDetails(".$data['kode'].")' class='btn btn-warning'><i class='fa fa-edit'></i> Update</button>";
	}else{
		echo "
		<button onclick='GetModulDetails(".$data['kode'].")' class='btn btn-warning'><i class='fa fa-edit'></i> Update</button>
		<button onclick='DeleteModul(".$data['kode'].",\"".$data['nama']."\")' class='btn btn-danger'><i class='fa fa-trash'></i> Hapus</button>";
	}
	echo"</td>";
echo "</tr>";
$i++;
}
?>
