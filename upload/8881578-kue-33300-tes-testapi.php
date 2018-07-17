<?php
$conn = @mysql_connect('localhost','root','');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('support_db', $conn);
$query=mysql_query("select * from ost_ticket");
while($data=mysql_fetch_array($query)){
    echo $data['number']."<br>";
}
$jml=mysql_num_rows($query);
echo $jml;
?>