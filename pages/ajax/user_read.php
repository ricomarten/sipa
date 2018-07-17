<?php
include ("../../koneksinya.php");

$query=mysql_query("select u.*,l.nama as nama_level,b.nama as nama_bagian from user u 
                    left join level l on l.kode=u.level left join bagian b on b.kode=u.bagian ");
while($data=mysql_fetch_array($query)){
echo "<tr>";
	echo "<td>".$data['nip']."</td>";
	echo "<td>".$data['nama']."</td>";
	echo "<td>".$data['email']."</td>";
	echo "<td>".$data['nama_level']."</td>";
	echo "<td>".$data['nama_bagian']."</td>";
	echo "<td>";
	echo "<button onclick='GetDetails(".$data['nip'].")' class='btn btn-warning'><i class='fa fa-edit'></i></button> ";
	echo "<button onclick='Delete(".$data['nip'].",\"".$data['nama']."\")' class='btn btn-danger'><i class='fa fa-trash'></i></button></td>";
echo "</tr>";
}
?>