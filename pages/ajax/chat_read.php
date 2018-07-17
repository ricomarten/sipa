<?php
include ("../../koneksinya.php");
include ("../../nusoap.php");

$query=mysql_query("select * from chat where tiket='".$_GET['id']."'");
while($data=mysql_fetch_array($query)){
    if($data['level']=='3'){
	echo "<div class='direct-chat-msg right'>
    		<div class='direct-chat-info clearfix'>
    			<span class='direct-chat-name pull-right'>".$data['username']."</span>
    			<span class='direct-chat-timestamp pull-left'>".$data['waktu']."</span>
    		</div>";
    echo '<img src="../../sipa/dist/img/avatar0.png" class="direct-chat-img" alt="User Image">';
    }else{
    	echo "<div class='direct-chat-msg left'>
		<div class='direct-chat-info clearfix'>
			<span class='direct-chat-name pull-left'>".$data['username']."</span>
			<span class='direct-chat-timestamp pull-right'>".$data['waktu']."</span>
		</div>";
         echo '<img src="../../sipa/dist/img/avatar0.png" class="direct-chat-img" alt="User Image">';   
    }	   
		
echo"<div class='direct-chat-text'>
			".$data['pesan']."
		</div>
	</div>";
}

?>
