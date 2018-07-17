<?php
// include Database connection file
include ("../../koneksinya.php");

// check request
if(isset($_POST))
{
    // get values
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];

    // Updaste User details
    $query = "UPDATE fitur SET nama = '$nama' WHERE kode = '$kode'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}