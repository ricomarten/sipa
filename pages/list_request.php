<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Permintaan Perubahan</a></li>
	  <li class="active">Riwayat Perubahan</li>
	</ol>
  </section>
  <!-- Main content -->
  <section class="content">
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Daftar Perubahan</h3><div id="result"></div>
	  </div>
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped table-hover">
		   <thead>
				<tr >
					<th>Tiket</th>
					<th><center>Nama Proyek</center></th>
					<th><center>Perubahan ke</center></th>
					<th><center>Jenis Perubahan</center></th>
					<th><center>Kondisi Awal</center></th>
					<th><center>Kondisi Perubahan</center></th>
					<th><center>Status</center></th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($data['level']==0){
						$queery=mysql_query("select p.*,jp.nama as nama_perubahan,py.nama as nama_proyek from request p 
						left join jenis_perubahan jp on p.jenis=jp.kode 
						left join proyek py on p.tiket=py.tiket 
						
						");
					}else{
						$queery=mysql_query("select p.*,jp.nama as nama_perubahan,py.nama as nama_proyek from request p 
						left join jenis_perubahan jp on p.jenis=jp.kode 
						left join proyek py on p.tiket=py.tiket 
						where py.user='".$_SESSION['username']."'
						");
					}
					
					$sql_fitur=mysql_query("select * from fitur");
					while($data_fitur=mysql_fetch_array($sql_fitur)){
						$nama_fitur[]=$data_fitur['nama'];
					}
					while ($data=mysql_fetch_array($queery)){
						$data['jenis']=substr_replace($data['jenis'] ,"",-1);
						$pisah=explode(" ",$data['jenis']);
						echo "<tr>";
						echo "<td rowspan='".(count($pisah))."'>".$data['tiket']."</td>";					
						echo "<td rowspan='".(count($pisah))."'>".$data['nama_proyek']."</td>";
						echo "<td rowspan='".(count($pisah))."'>".$data['perubahan']."</td>";
						for($k=0;$k<count($pisah);$k++){		
							switch($pisah[$k]){
								case "3":
									echo "<td>Jadwal</td>";
									echo "<td><a href='#'>".TanggalLengkap($data['mulai_awal'])."</a> - <a href='#'>".TanggalLengkap($data['selesai_awal'])."</a> (".$data['durasi_awal']." hari)</td>";
									echo "<td><a href='#'>".TanggalLengkap($data['mulai_baru'])."</a> - <a href='#'>".TanggalLengkap($data['selesai_baru'])."</a> (".$data['durasi_baru']." hari)</td>";
									break;
								case "1":
									echo "<td>Fitur</td>";
									echo "<td><ol>";
									$fiturlama=explode(" ",$data['fitur_awal']);
									for($i=0;$i<count($fiturlama)-1;$i++){
										$indek=$fiturlama[$i]-1;
										echo "<li>".$nama_fitur[$indek]."</li>";
									}
									echo "</ol></td>";
									
									echo "<td><ol>";
									$fiturbaru=explode(" ",$data['fitur_baru']);								
									for($i=0;$i<count($fiturbaru)-1;$i++){
										$indek=$fiturbaru[$i]-1;
										echo "<li>".$nama_fitur[$indek]."</li>";
									}
									echo "</ol></td>";
									break;
								case "2":
									unset($dokumen_awal);
									unset($dokumen_baru);
									echo "<td>Kelengkapan Dokumen</td>";
									$sqldok=mysql_query("select * from perubahan_dokumen where tiket='".$data['tiket']."' and perubahan='".$data['perubahan']."'");
									while($dokumen=mysql_fetch_array($sqldok)){
										$dokumen_awal[]=$dokumen['dokumen_awal'];
										$dokumen_baru[]=$dokumen['dokumen_baru'];
										//echo "<td><a href='upload/".$dokumen['dokumen_awal']."' target='_blank'>".$dokumen['dokumen_awal']." ".Icon($dokumen['dokumen_awal'])."</a> </td>";
										//echo "<td><a href='upload/".$dokumen['dokumen_baru']."' target='_blank'>".$dokumen['dokumen_baru']." ".Icon($dokumen['dokumen_baru'])."</a> </td>";
									}
									echo "<td><ol>";
									foreach($dokumen_awal as $dok_awal){
										echo "<li><a href='upload/".$dok_awal."' target='_blank'>".$dok_awal." ".Icon($dok_awal)."</a></li>";
									}
									echo "</ol></td>";
									echo "<td><ol>";
									foreach($dokumen_baru as $dok_baru){
										echo "<li><a href='upload/".$dok_baru."' target='_blank'>".$dok_baru." ".Icon($dok_baru)."</a></li>";
									}
									echo "</ol></td>";
									break;
								case "4":
									echo "<td>Rule Validasi</td>";
									echo "<td><a href='upload/".$data['rule_lama']."' target='_blank'>".$data['rule_lama']." ".Icon($data['rule_lama'])."</a> </td>";
									echo "<td><a href='upload/".$data['rule_baru']."' target='_blank'>".$data['rule_baru']." ".Icon($data['rule_baru'])."</a> </td>";
									break;
								case "5":
									echo "<td>Tabulasi</td>";
									echo "<td><a href='upload/".$data['tabulasi_lama']."' target='_blank'>".$data['tabulasi_lama']." ".Icon($data['tabulasi_lama'])."</a> </td>";
									echo "<td><a href='upload/".$data['tabulasi_baru']."' target='_blank'>".$data['tabulasi_baru']." ".Icon($data['tabulasi_baru'])."</a> </td>";
									break;
							}
						if($data['konfirmasi']==0){
							echo "<td>Menunggu Konfirmasi</td>";
						}else echo "<td>Terkonfirmasi</td>";											
						echo "</tr>";
						}
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
			$('#example1').DataTable( {
				scrollX:        true,
				scrollCollapse: true,
				ordering: 		false,
				paging:         true,
				columnDefs: [
					{ width: '80', targets: 0 },
					{ width: '150', targets: 1 },
					{ width: '100', targets: 2 },
					{ width: '150', targets: 3 },
					{ width: '150', targets: 4 },
					{ width: '150', targets: 5 }
				],
				fixedColumns: true
				} );
		});
</script>