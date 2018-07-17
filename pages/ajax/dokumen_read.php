<?php
$dir    = '../../upload';
$files = scandir($dir, 1);
$tiket=$_GET['tiket'];
foreach($files as $f){
    $pecah=explode('-',$f);
    if($tiket==$pecah[0])
        echo "<li><button class='btn btn-default' type='button' onclick='hapusFile(\"".$f."\");'><span class='fa fa-close'></span></button> <a href='upload/".$f."' target='_blank'>".$f." </a></li>";
    //echo $pecah[0]."<br>";
}
?>