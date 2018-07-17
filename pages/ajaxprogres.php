<?php
require_once('../koneksinya.php');
//print_r($_POST);
if(strlen($_POST['fitur'])>3){
    $subfitur=explode("_", $_POST['fitur']);
    $_POST['fitur']=str_replace("--"," ", $_POST['fitur']);
    $query=mysql_query("SELECT avg(progres) as progres FROM subproyek WHERE tiket='".$_POST['tiket']."' and fitur like '".$subfitur[0]."_%'");
    echo $subfitur[0];
    $data=mysql_fetch_array($query);
    $update2=mysql_query("update proyek set progres='".$data['progres']."' where tiket='".$_POST['tiket']."'");
}
else{
    $update=mysql_query("update subproyek set progres='".$_POST['nilai']."' where tiket='".$_POST['tiket']."' and fitur='".$_POST['fitur']."'");
    if(!$update){
    	echo mysql_error();
    }
    $query=mysql_query("SELECT avg(progres) as progres FROM subproyek WHERE tiket='".$_POST['tiket']."'");
    $data=mysql_fetch_array($query);
    $update2=mysql_query("update proyek set progres='".$data['progres']."' where tiket='".$_POST['tiket']."'");
    if(!$update2){
    	echo mysql_error();
    }
    
    echo "<span class='progress-number'><b>".(int)$data['progres']."</b></div> persen</span>
    <div class='progress sm'>";
    	if($data['progres']<=50) echo "<div class='progress-bar progress-bar-red' style='width: ".(int)$data['progres']."%'></div>";
    	if($data['progres']<=80 && $data['progres']>50) echo "<div class='progress-bar progress-bar-yellow' style='width: ".(int)$data['progres']."%'></div>";
    	if($data['progres']>=80) echo "<div class='progress-bar progress-bar-green' style='width: ".(int)$data['progres']."%'></div>";
    echo"</div>";  
}

?>