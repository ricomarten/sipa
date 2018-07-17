<?php
// include Database connection file
include ("../../koneksinya.php");

// check request
if(isset($_POST))
{
    // get values
    $username = $_POST['username'];
    $level = $_POST['level'];

    // Updaste User details
    $query = "UPDATE user SET 	level	= '".$level."'
								WHERE username = '$username'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    else{
        echo "Berhasil update";
    }
}