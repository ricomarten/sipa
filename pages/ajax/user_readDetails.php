<?php
// include Database connection file
include ("../../koneksinya.php");
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $kode = $_POST['id'];

    // Get User Details
    $query = "select u.*,l.nama as nama_level,b.nama as nama_bagian from user u 
                    left join level l on l.kode=u.level left join bagian b on b.kode=u.bagian  WHERE nip = '$kode'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
    $response = array();
    if(mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}