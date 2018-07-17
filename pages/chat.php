<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	 
	  <li class="active">Chat</li>
	</ol>
  </section>
  <!-- Main content -->
  <section class="content">
  <?php 
  if(empty($var['tiket'])){
	echo'<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Daftar Permintaan Sistem/Aplikasi</h3><div id="result"></div>
		</div>
		<div class="box-body">
		<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Tiket</th>
							<th>Nama Aplikasi</th>    
						</tr>
					</thead>
					<tbody>
						<tr>';
						if($_SESSION['level']==3 || $_SESSION['level']==9)
						    $sql=mysql_query("select * from proyek where user='".$_SESSION['username']."' status<>'4'");
						else
						    $sql=mysql_query("select * from proyek");
						while($data=mysql_fetch_array($sql)){
							$chat="chat&tiket=".$data['tiket'];
							echo "<tr>";
							echo "<td><a href='?".paramEncrypt('page='.$chat.'')."'>".$data['tiket']."</a></td>";
							echo "<td>".$data['nama']."</td>";
							echo "</tr>";
						}
						echo'</tr>
					</tbody>
				</table>
		</div>
	</div>';
  }else{
  ?>
	
	<!-- chat -->
	<div class="row"> 
	<div class="col-md-2 col-xs-2"> </div>
    <div class="col-md-8 col-xs-8">
	  <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pesan</h3>

              <div class="box-tools pull-right">
                <!--  <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span> -->
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Administrator</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo date('Y-m-d H:i:s'); ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                  <img class="direct-chat-img" src="dist/img/avatar0.png" alt="Message User Image"><!-- /.direct-chat-img -->
                  <div class="direct-chat-text">
                    Silahkan tinggalkan pesan disini
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
     
                <!-- /.direct-chat-msg -->
				<div class="records_content"></div>
              </div>
              <!--/.direct-chat-messages-->
         
              <!-- /.direct-chat-pane -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form  name="chat" action="#" class="form-horizontal"  method="post" onsubmit="addRecord()">
                <div class="input-group">
						<span class="input-group-btn">
							<a href="javascript: history.go(-1)" class="btn btn-default btn-flat">Back </a>
							
						</span>
					<input type="hidden" id="id" value="<?php echo $var['tiket']; ?>">
					<input type="hidden" id="username" value="<?php echo $_SESSION['username']; ?>">
					<input type="hidden" id="tiket" value="<?php echo $var['tiket']; ?>">
					<input type="hidden" id="level" value="<?php echo $_SESSION['level']; ?>">
					<input type="hidden" id="waktu" value="<?php echo date('Y-m-d H:i:s'); ?>">
					<input type="text" id="pesan" name="pesan" placeholder="Type Message ..." class="form-control" onkeydown="return (event.keyCode!=13);">
						<span class="input-group-btn">
							<button type="button" class="btn btn-primary btn-flat" onclick="addRecord()">Send</button>
						</span>
                </div>
              </form>
            </div>
            <!-- /.box-footer-->
          </div>   
 </div>   
 </div>
<?php } ?> 
	<!-- /.box -->
  </section>
  <!-- /.content -->  
</div>
<!-- /.container -->
</div>
<script>
setInterval(readRecords, 3000,'<?php echo $var['tiket']; ?>');
$(document).ready(function () {
    // READ recods on page load
	 var id = $("#id").val();
    readRecords(id); // calling fun
});
// READ records
function readRecords(tiket) {
    $.get("pages/ajax/chat_read.php", {id: tiket}, function (data, status) {
        $(".records_content").html(data);
    });
}
function addRecord() {
	// get values
    var username = $("#username").val();
    var tiket = $("#tiket").val();
    var pesan = $("#pesan").val();
    var level = $("#level").val();
    var d = new Date();
	var waktu = d.getFullYear()+"-"+d.getMonth()+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();

    // Add record
    $.post("pages/ajax/chat_add.php", {
        username: username,
        tiket: tiket,
		pesan: pesan,
		level: level,
		waktu: waktu
    }, function (data, status) {
        // close the popup
        //$("#tambah_dev").modal("hide");

        // read records again
        readRecords(tiket);

        // clear fields from the popup
        $("#pesan").val("");
		
    });
}
</script>