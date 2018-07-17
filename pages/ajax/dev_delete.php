<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
	include ("../../koneksinya.php");

    // get user id
    $kode = $_POST['id'];

    // delete User
    $query = "DELETE FROM developer WHERE nip = '$kode'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>