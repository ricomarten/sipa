<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Entri</a></li>
	  <li class="active">Daftar Permintaan Aplikasi</li>
	</ol>
  </section>
  <!-- Main content -->
  <section class="content">
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Daftar Permintaan Aplikasi</h3><div id="result"></div>
	  </div>
		<div class="box-body">
		  <table id="example" class="table table-bordered table-striped table-hover">
		   <thead>
				<tr >
					<th>Tiket</th>
					<th><center>Nama Aplikasi</center></th>
					<th><center>Progress</center></th>
					<th><center>Status</center></th>
					<th><center>Hubungi Admin</center></th>
					<th><center>Keterangan</center></th>
					<th><center>Waktu</center></th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($_SESSION['level']=='3'){
						$queery=mysql_query("select p.*,b.nama as bag,a.nama as app,k.nama as kebth,u.nama as lvl from proyek p 
						left join kebutuhan k on p.kebutuhan=k.kode 
						left join bagian b on p.bagian=b.kode 
						left join aplikasi a on p.aplikasi=a.kode
						left join userlevel u on p.level=u.kode
						where p.user='".$_SESSION['username']."'
						");
					}else{
						$queery=mysql_query("select p.*,b.nama as bag,a.nama as app,k.nama as kebth,u.nama as lvl from proyek p 
						left join kebutuhan k on p.kebutuhan=k.kode 
						left join bagian b on p.bagian=b.kode 
						left join aplikasi a on p.aplikasi=a.kode
						left join userlevel u on p.level=u.kode
						
						");
					}
					
					while ($data=mysql_fetch_array($queery)){
						echo "<tr>";
						echo "<td>".$data['tiket']."</td>";
						echo "<td>".$data['nama']."</td>";
						echo "<td>     
							<span class='progress-number'><b>".$data['progres']."</b> persen</span>
							<div class='progress sm'>";
							if($data['progres']<=50) echo "<div class='progress-bar progress-bar-red' style='width: ".$data['progres']."%'></div>";
							if($data['progres']<=80 && $data['progres']>50) echo "<div class='progress-bar progress-bar-yellow' style='width: ".$data['progres']."%'></div>";
							if($data['progres']>=80) echo "<div class='progress-bar progress-bar-green' style='width: ".$data['progres']."%'></div>";
						echo"</div>
							</td>";
						echo "<td>";
							if($data['status']==1){
								$page="edit&id=".$data['tiket'];
								echo "<p class='btn btn-sm btn-warning'>Antrian</p> <a href='?".paramEncrypt('page='.$page.'')."' class='btn btn-sm btn-primary'><i class='fa fa-edit'></i> Update</a>";
							}elseif($data['approve']==2){
								$page="edit&id=".$data['tiket'];
								echo "<button onClick='alert(\"".$data['alasan']."\")' class='btn btn-sm btn-danger'>Ditunda</button> <a href='?".paramEncrypt('page='.$page.'')."' class='btn btn-sm btn-primary'><i class='fa fa-edit'></i> Update</a>";
							}else{
								echo "<p class='btn btn-sm btn-success'>Terkonfirmasi</p>";
							}
						echo "</td>";
						$chat="chat&tiket=".$data['tiket'];
						echo "<td>";
								$page=$data['tiket'];
								echo "<a href='?".paramEncrypt('page='.$chat.'')."' class='btn btn-sm btn-primary'><i class='fa fa-phone'></i> Chat</a>";
						echo "</td>";
						echo "<td><button onclick='Detail(\"".$data['tiket']."\")' class='btn btn-sm btn-success'><i class='fa fa-search'></i> Lihat Detail</button>";
						if($data['status']==2){
						        //echo $data['alasan'];
						        echo "<br>Silahkan edit permintaan anda untuk mengubah status ke antrian";
						}
						echo "</td>";
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
									<dt>Subdirektorat</dt><dd>".$data['bag']."</dd>
									<dt>Jenis Kebutuhan</dt><dd>".$data['kebth']."</dd>";
									$sql_pengembangan=mysql_query("select tiket,nama,tahun from proyek where tiket='".$data['pengembangan']."'");
                					    while($data_pengembangan=mysql_fetch_array($sql_pengembangan)){
                					        echo "<dt>Pengembangan dari</dt><dd>".$data_pengembangan['nama']." (".$data_pengembangan['tahun'].") </dd>";
                					    }
									echo "<dt>Jenis Aplikasi</dt><dd>".$data['app']."</dd>
									<dt>Level Pengguna Akhir</dt><dd>".$data['lvl']." ".$data['ketlain']."</dd>
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
										$dokumen=mysql_query("select * from dokumen where tiket='".$data['tiket']."'");
										while($dok=mysql_fetch_array($dokumen)){
											echo "<li><a href='upload/".$dok['nama']."' target='_blank'>".$dok['nama']." ".Icon($dok['nama'])."</a></li>";
										}
									echo "</ol></dd>";
									if($data['status']=='1') echo "<dt>Status</dt><dd>Menunggu Konfirmasi</dd>";
									else if($data['status']=='2') echo "<dt>Status</dt><dd>Tunda Konfirmasi alasan: (".$data['alasan'].")</dd>";
									else echo "<dt>Status</dt><dd>Sudah Terkonfirmasi</dd>";
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
						echo "<td>".$data['tgl_entri']."</td>";
						echo "</tr>";
					}
				?>
			</tbody>			
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
			$('#example').DataTable( {
				scrollX:        true,
				scrollCollapse: true,
				ordering: 		true,
				paging:         true,
				order: [[ 6, 'desc' ]],
				columnDefs: [
					{ width: '10%', targets: 0 },
					{ width: '25%', targets: 1 },
					{ width: '15%', targets: 2 },
					{ width: '15%', targets: 3 },
					{ width: '15%', targets: 4 },
					{ width: '20%', targets: 5 },
					{
					 "targets": [ 6 ],
					 "visible": false
				    },
				],
				fixedColumns: true
				} );
		});
function Detail(tiket){
	var tiket="#modal-default"+tiket;
	$(tiket).modal("show");
	
}
</script>