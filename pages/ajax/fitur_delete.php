<?php
// check request
if(isset($_POST['fitur']) && isset($_POST['tiket']) && isset($_POST['fitur']) != "")
{
    // include Database connection file
	include ("../../koneksinya.php");

    // delete tiket
    $query = "DELETE from subproyek WHERE tiket = '".$_POST['tiket']."' and fitur='".$_POST['fitur']."'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
	else
		echo "Berhasil hapus";
}
?>