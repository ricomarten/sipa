<?php
include ("../../koneksinya.php");
unlink( '../../upload/'.$_POST['id']);
mysql_query("delete from dokumen where nama='".$_POST['id']."'");
?>