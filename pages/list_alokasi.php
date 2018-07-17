<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Entri</a></li>
	  <li class="active">Daftar Permintaan</li>
	</ol>
  </section>
  <!-- Main content -->
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		mysql_query("update proyek set approve='2',status='2', alasan='".$_POST['alasan']."' where tiket='".$_POST['id']."' ");
		//email
		    $query_email=mysql_query("SELECT u.email FROM proyek p left join user u on u.username=p.user where tiket ='".$_POST['id']."'");
		    $email=mysql_fetch_array($query_email);
            require 'PHPMailer-master/src/Exception.php';
            require 'PHPMailer-master/src/PHPMailer.php';
            require 'PHPMailer-master/src/SMTP.php';
            
            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
                //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.bps.go.id'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'ricomarten@bps.go.id';                 // SMTP username
                $mail->Password = '86879385';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                //Recipients
                $mail->setFrom('support@bps.go.id', 'SIPA(Sistem Permintaan Aplikasi)');
                $mail->addAddress( $email[0]);     // Add a recipient
             
                $kata="<br>Permintaan Anda dengan tiket ".$_POST['id']." ditunda konfirmasinya dengan alasan ".$_POST['alasan']."<br><br><br><br>Terima Kasih.<br>Admin SIPA";
                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Tiket #'.$_POST['id'];
                $mail->Body    = $kata;
                $mail->AltBody = $kata;
            
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }

		 echo " <script>window.history.back();</script>";   
	}
	if($var['aksi']=='delete'){
	    mysql_query("delete from proyek where tiket='".$var['id']."'");
	    mysql_query("delete from subproyek where tiket='".$var['id']."'");
	    mysql_query("delete from dokumen where tiket='".$var['id']."'");
	    mysql_query("delete from chat where tiket='".$var['id']."'");
	    $dir    = 'upload';
        $files = scandir($dir, 1);
        foreach($files as $f){
            $pecah=explode('-',$f);
            if($var['id']==$pecah[0]){
                unlink( 'upload/'.$f);
            }
        }
	}
?>
  <section class="content">
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Daftar Permintaan Aplikasi</h3><div id="result"></div>
	  </div>
		<div class="box-body">
		<!-- modal -->
		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alasan Menunda</h4>
              </div>
			<form name="modul" action="?<?php echo paramEncrypt('page=list_alokasi'); ?>" class="form-horizontal"  method="post">
              <div class="modal-body">         
				<div class="box-body">
					<div class="form-group">
					  <label class="col-sm-2 control-label">ID Tiket</label>
						
					  <div class="col-sm-4">       
						<input type="text" class="form-control" id="id" name="id" readonly required>			  
					  </div>
					</div>
					<div class="form-group">
					  <label  class="col-sm-2 control-label">Alasan</label>
					  <div class="col-sm-10">
						<textarea class="form-control" rows="3" name="alasan" required></textarea>
					  </div>
					</div>
				</div>	
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
			</form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
		<table id="example1" class="table table-bordered table-striped table-hover">
		   <thead>
				<tr>
					<th>Tiket</th>
					<th><center>Nama</center></th>
					<th><center>Detail</center></th>
					<th><center>Progress</center></th>
					<th><center>Developer</center></th>
					<th><center>Alokasi</center></th>
					<th><center>Hubungi User</center></th>
					<th><center>Status</center></th>
					<th><center>Tanggal Entri</center></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$queery=mysql_query("select p.*,b.nama as bag,a.nama as app,k.nama as kebth,u.nama as lvl,d.nama as namadev,us.nama as namauser from proyek p 
					left join kebutuhan k on p.kebutuhan=k.kode 
					left join bagian b on p.bagian=b.kode 
					left join aplikasi a on p.aplikasi=a.kode
					left join userlevel u on p.level=u.kode
					left join developer d on d.nip=p.developer
					left join user us on us.username=p.user
					where p.status<>'4'");
					$query_dev=mysql_query("select * from developer");
					while($data_dev=mysql_fetch_array($query_dev)){
						$developer[]=$data_dev;
					}
					while ($data=mysql_fetch_array($queery)){
						echo "<tr>";
						$page="edit&id=".$data['tiket'];
						$del="list_alokasi&aksi=delete&id=".$data['tiket'];
						
						echo "<td>";
						echo $data['tiket']." ";
						if($_SESSION['level']=='0' || $_SESSION['level']=='1'){
						   echo " <a href='?".paramEncrypt('page='.$page.'')."' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>";
					    	echo " <a href='?".paramEncrypt('page='.$del.'')."' class='btn btn-xs btn-danger' onClick=\"return confirm('Apakah yakin akan menghapus tiket ".$data['tiket']."?');\"><i class='fa fa-trash'></i></a>";
						 
						}
						echo "</td>";
						echo "<td>".$data['nama']."</td>";
						echo "<td><button onclick='Detail(\"".$data['tiket']."\")' class='btn btn-sm btn-success'><i class='fa fa-search'></i> Lihat Detail</button></td>";
						//modal detail
						echo "<div class=\"modal fade\" id=\"modal-default".$data['tiket']."\">
						  <div class=\"modal-dialog\">
							<div class=\"modal-content\">
							  <div class=\"modal-header\">
								<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
								  <span aria-hidden=\"true\">&times;</span></button>
								<h4 class=\"modal-title\">".$data['nama']."</h4>
							  </div>
							  <div class=\"modal-body\">         
								<div class=\"box-body\">								
								   <dl class=\"dl-horizontal\">
								    <dt>User</dt><dd>".$data['namauser']."</dd>
									<dt>Subdirektorat</dt><dd>".$data['bag']."</dd>
									<dt>Jenis Kebutuhan</dt><dd>".$data['kebth']."</dd>";
									$sql_pengembangan=mysql_query("select tiket,nama,tahun from proyek where tiket='".$data['pengembangan']."'");
                					    while($data_pengembangan=mysql_fetch_array($sql_pengembangan)){
                					        echo "<dt>Pengembangan dari</dt><dd>".$data_pengembangan['nama']." (".$data_pengembangan['tahun'].") </dd>";
                					    }
									echo "
									<dt>Jenis Aplikasi</dt><dd>".$data['app']."</dd>
									<dt>Level Pengguna Akhir</dt><dd>".$data['lvl']."</dd>
									<dt>Tujuan</dt><dd>".$data['tujuan']."</dd>
									<dt>Waktu Pembangunan</dt><dd>".Tanggal($data['mulai'])." Sampai dengan ".Tanggal($data['selesai'])." (".$data['durasi']." hari)</dd>";
									echo "<dt>Fitur</dt><dd><ol>";
									unset($dev); 
									$dev = array();
									$query_fitur=mysql_query("select s.*,f.nama as nama_fitur from subproyek s 
													left join fitur f on f.kode=s.fitur
													
													where tiket='".$data['tiket']."'");
									while($dataFitur=mysql_fetch_array($query_fitur)){
										echo "<li>".$dataFitur['nama_fitur']."</li>";
										$dev[]=$dataFitur;
									}
									echo "</ol></dd>";
									echo "<dt>Kelengkapan</dt><dd><ol>";
										//if($data['bp']==1) echo "<li>Bussiness Process <a href='upload/".$data['dokbp']."' target='_blank'> ".Icon($data['dokbp'])."</a></li>";
										//if($data['kue']==1) echo "<li>Draft Kuesioner <a href='upload/".$data['dokkue']."' target='_blank'> ".Icon($data['dokkue'])."</i></a></li>";
										//if($data['rv']==1) echo "<li>Rule Validasi <a href='upload/".$data['dokrv']."' target='_blank'> ".Icon($data['dokrv'])."</i></a></li>";
										//if($data['rt']==1) echo "<li>Rencana Tabulasi <a href='upload/".$data['dokrt']."' target='_blank'> ".Icon($data['dokrt'])."</i></a></li>";
										$dokumen=mysql_query("select * from dokumen where tiket='".$data['tiket']."'");
										while($dok=mysql_fetch_array($dokumen)){
											echo "<li><a href='upload/".$dok['nama']."' target='_blank'>".$dok['nama']." ".Icon($dok['nama'])."</a></li>";
										}
									echo "</ol></dd>";
									if($data['status']=='1') echo "<dt>Status</dt><dd>Menunggu Konfirmasi</dd>";
            						else if($data['status']=='2') echo "<dt>Status</dt><dd>Tunda Konfirmasi (".$data['alasan'].")</dd>";
            						else echo "<dt>Status</dt><dd>Sudah Terkonfirmasi</dd>";
									//if($data['alokasi']=='1') echo "<dt>Status</dt><dd>Sudah Terkonfirmasi</dd>";
									//else echo "<dt>Status</dt><dd>Menunggu Konfirmasi</dd>";
									echo "<dt>Tanggal Entri</dt><dd>".$data['tgl_entri']."</dd>";
									echo"</dl>									
								</div>	
							  </div>
							  <div class=\"modal-footer\">
								<button type=\"button\" class=\"btn btn-default pull-left\" data-dismiss=\"modal\">Tutup</button>
							  </div>
							</div>
						  </div>
						</div>";
						echo "<td>     
							<span class='progress-number'><b>".$data['progres']."</b> persen</span>
							<div class='progress sm'>";
							if($data['progres']<=50) echo "<div class='progress-bar progress-bar-red' style='width: ".$data['progres']."%'></div>";
							if($data['progres']<=80 && $data['progres']>50) echo "<div class='progress-bar progress-bar-yellow' style='width: ".$data['progres']."%'></div>";
							if($data['progres']>=80) echo "<div class='progress-bar progress-bar-green' style='width: ".$data['progres']."%'></div>";
						echo"</div>
							</td>";
						
						echo "<td>Leader: ".NickName($data['namadev'])."<ol>";
							foreach($developer as $data_dev){
								foreach($dev as $prog){
									//if($prog['developer']!='') echo "<li>".$prog['developer']."</li>";
									if( strpos($prog['developer'],$data_dev['nip']) !== false ){
										echo "<li>".NickName($data_dev['nama'])."</li>";
										break;
									}
								}
							}
							
						echo "</ol></td>";
						
						echo "<td>";
								$page=$data['tiket'];
								echo "<a href='?".paramEncrypt('page=alokasi&id='.$page.'')."' class='btn btn-sm btn-primary'><i class='fa fa-edit'></i> Alokasi</a>";
								if($data['status']=='1'){
									echo "<br><br>";
									echo "<button onclick='Tolak(\"".$data['tiket']."\")' class='btn btn-sm btn-warning'><i class='fa fa-remove'></i> Tunda</button>";
								}
							    /* if($data['alokasi']=='1'){
									echo "<br><br>";
									echo "<a href='?".paramEncrypt('page=unalokasi&id='.$page.'')."' class='btn btn-danger'><i class='fa fa-eraser'></i> Unalokasi</a>";
								
								} */
						echo "</td>";
						$chat="chat&tiket=".$data['tiket'];
						echo "<td>";
								$page=$data['tiket'];
								echo "<a href='?".paramEncrypt('page='.$chat.'')."' class='btn btn-sm btn-primary'><i class='fa fa-phone'></i> Chat</a>";
						echo "</td>";
						if($data['status']=='1') echo "<td>Menunggu Konfirmasi</td>";
						else if($data['status']=='2') echo "<td>Tunda Konfirmasi</td>";
						else echo "<td>Sudah Terkonfirmasi</td>";
						echo "<td>".$data['tgl_entri']."</td>";
						echo "</tr>";
					}
				?>
			</tbody>
			<script>
			function Detail(tiket){
				var tiket="#modal-default"+tiket;
				// Open modal popup
				$(tiket).modal("show");
				
			}
			</script>
		  </table>
		</div>
	</div>
	<!-- /.box -->
  </section>
  <!-- /.content -->  
</div>
<!-- /.container -->
</div>
<script>
    
	 $(document).ready(function() {
		$('#example1').DataTable( {
			scrollX:        true,
			scrollCollapse: true,
			ordering: 		true,
			paging:         true,
			order: [[ 8, 'desc' ]],
			columnDefs: [
				{ width: '15%', targets: 0 },
				{ width: '25%', targets: 1 },
				{ width: '10%', targets: 2 },
				{ width: '15%', targets: 3 },
				{ width: '15%', targets: 4 },
				{ width: '10%', targets: 5 },
				{ width: '15%', targets: 6 },
				<?php
				if($_SESSION['level']=='2'){
				    echo '{
					     "targets": [ 5 ],
					     "visible": false
				        },
				        {
					     "targets": [ 6 ],
					     "visible": false
				        },';
				}
				?>
				{
					 "targets": [ 8 ],
					 "visible": true
				},
			],
			fixedColumns: true,
			createdRow: function( row, data, dataIndex ) {
                if ( data[6] == "Sudah Terkonfirmasi" ) {
                   //$( row ).css( "background-color", "#8DD3C7" );
                   $( row ).addClass( "success" );
                }
                if ( data[7] == "Tunda Konfirmasi" ) {
                   //$( row ).css( "background-color", "#8DD3C7" );
                   $( row ).addClass( "warning" );
                }
            },
			} );
	});
function Tolak(id) {
	$("#id").val(id);
    // Open modal popup
    $("#modal-default").modal("show");
	
}

</script>
