<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Permintaan Perubahan</a></li>
	  <li class="active">Konfirmasi Perubahan</li>
	</ol>
  </section>
  <!-- Main content -->
  <section class="content">
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Daftar Perubahan</h3><div id="result"></div>
	  </div>
	  <?php
	  if(isset($var['tiket'])){
		$query=mysql_query("select * from perubahan where tiket='".$var['tiket']."' and perubahan='".$var['perubahan']."'");
		$data=mysql_fetch_array($query);
		$query_proyek=mysql_query("select * from proyek where tiket='".$var['tiket']."'");
		$data_proyek=mysql_fetch_array($query_proyek);
		$pisah_jenis=explode("_",$var['jenis']);
		for($k=0;$k<count($pisah_jenis);$k++){
		switch($pisah_jenis[$k]){
			case "1":
				$hasil=mysql_query("update proyek set mulai='".$data['mulai_baru']."',selesai='".$data['selesai_baru']."'
									,durasi='".$data['durasi_baru']."' where tiket ='".$var['tiket']."'");
				$hasil2=mysql_query("update perubahan set konfirmasi='1' where tiket ='".$var['tiket']."' and perubahan='".$var['perubahan']."'");	
				$sql_sub=mysql_query("select * from subproyek where tiket='".$var['tiket']."'");
				while($data_sub=mysql_fetch_array($sql_sub)){
					//ubah hari awal dan durasi
					$selisih_awal=selisihHari($data_sub['mulai'],$data['mulai_baru']);
					$selisih_akhir=selisihHari($data['selesai_baru'],$data_sub['selesai']);
					if($selisih_awal<0){
						$selisih=getWorkingDays($data['mulai_baru'],$data_sub['mulai']);
						$hasil3=mysql_query("update subproyek set mulai='".$data['mulai_baru']."',durasi=".($data_sub['durasi']-$selisih)." 
							 where tiket='".$data_sub['tiket']."' and fitur='".$data_sub['fitur']."'");
					}
					//ubah hari akhir dan durasi
					//echo $selisih_awal."<br>";
					if($selisih_akhir<0){					
						$selisih=getWorkingDays($data['selesai_baru'],$data_sub['selesai']);
						//echo $selisih;
						 $hasil3=mysql_query("update subproyek set selesai='".$data['selesai_baru']."',durasi=".($data_sub['durasi']-$selisih)."
							 where tiket='".$data_sub['tiket']."' and fitur='".$data_sub['fitur']."'");
					}
				}
				break;
			case "2":
				echo "<ol>";
				$fiturlama=explode(" ",$data['fitur_awal']);
				$fiturbaru=explode(" ",$data['fitur_baru']);
				//cek jika ada fitur baru insert di subproyek
				for($j=0;$j<count($fiturbaru)-1;$j++){
					if(!in_array($fiturbaru[$j],$fiturlama)){
						$hasil=mysql_query("update proyek set fitur='".(count($fiturbaru)-1)."',progres='".($data_proyek['progres']*(count($fiturbaru)-2)/(count($fiturbaru)-1))."' where tiket ='".$var['tiket']."'");
						$hasil2=mysql_query("INSERT INTO subproyek (tiket,fitur,mulai,selesai,durasi,progres,parent ) 
										VALUES ('".$var['tiket']."','".$fiturbaru[$j]."','".$data_proyek['mulai']."','".$data_proyek['selesai']."',".$data_proyek['durasi'].",0,'".$var['tiket']."')");
						$hasil3=mysql_query("update perubahan set konfirmasi='1' where tiket ='".$var['tiket']."' and perubahan='".$var['perubahan']."'");
					}
				}
				break;
				
			case "3":
				$hasil=mysql_query("update proyek set dokkue='".$data['kuesioner_baru']."' where tiket ='".$var['tiket']."'");
				$hasil2=mysql_query("update perubahan set konfirmasi='1' where tiket ='".$var['tiket']."' and perubahan='".$var['perubahan']."'");	
				if($hasil){
					//echo "<div class='callout callout-success'><h4>Berhasil konfirmasi perubahan silahkan lihat data perubahan di <a href='?".paramEncrypt('page=list_alokasi')."'>Sini</a></h4></div>";
					break;
				}else{
					//echo "<div class='callout callout-warning'><h4>Gagal konfirmasi</h4></div>";
					break;
				}
			case "4":
				$hasil=mysql_query("update proyek set dokrv='".$data['rule_baru']."' where tiket ='".$var['tiket']."'");
				$hasil2=mysql_query("update perubahan set konfirmasi='1' where tiket ='".$var['tiket']."' and perubahan='".$var['perubahan']."'");
				
				if($hasil){
					//echo "<div class='callout callout-success'><h4>Berhasil konfirmasi perubahan silahkan lihat data perubahan di <a href='?".paramEncrypt('page=list_alokasi')."'>Sini</a></h4></div>";
					break;
				}else{
					//echo "<div class='callout callout-warning'><h4>Gagal konfirmasi</h4></div>";
					break;
				}			
			case "5":
				$hasil=mysql_query("update proyek set dokrt='".$data['tabulasi_baru']."' where tiket ='".$var['tiket']."'");
				$hasil2=mysql_query("update perubahan set konfirmasi='1' where tiket ='".$var['tiket']."' and perubahan='".$var['perubahan']."'");
				
				if($hasil){
					//echo "<div class='callout callout-success'><h4>Berhasil konfirmasi perubahan silahkan lihat data perubahan di <a href='?".paramEncrypt('page=list_alokasi')."'>Sini</a></h4></div>";
					break;
				}else{
					//echo "<div class='callout callout-warning'><h4>Gagal konfirmasi</h4></div>";
					break;
				}
		}
		}
	  }
	  ?>
		<div class="box-body">
		<!-- modal -->
		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Perubahan</h4>
              </div>
			  <div class="modal-body">         
				<div class="box-body records_content">
				</div>	
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Kembali</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
		  <table id="example1" class="table table-bordered table-striped table-hover">
		   <thead>
				<tr >
					<th>Tiket</th>
					<th><center>Nama Proyek</center></th>
					<th><center>Perubahan ke</center></th>
					<th><center>Jenis Perubahan</center></th>
					<th><center>Detail</center></th>
					<th><center>Status</center></th>
				</tr>
			</thead>
			<tbody>
				<?php
					$queery=mysql_query("select p.*,jp.nama as nama_perubahan,py.nama as nama_proyek from request p 
					left join jenis_perubahan jp on p.jenis=jp.kode 
					left join proyek py on p.tiket=py.tiket group by p.tiket,p.perubahan");
					$sql_fitur=mysql_query("select * from fitur");
					while($data_fitur=mysql_fetch_array($sql_fitur)){
						$nama_fitur[]=$data_fitur['nama'];
					}
					$sql_perubahan=mysql_query("select * from jenis_perubahan");
					while($data_perubahan=mysql_fetch_array($sql_perubahan)){
						$nama_perubahan[]=$data_perubahan['nama'];
					}
					while ($data=mysql_fetch_array($queery)){
						
						echo "<tr>";
						echo "<td>".$data['tiket']."</td>";					
						echo "<td>".$data['nama_proyek']."</td>";
						echo "<td>".$data['perubahan']."</td>";
						echo "<td><ol>";
						$data['jenis']=substr_replace($data['jenis'] ,"",-1);
						$pisah=explode(" ",$data['jenis']);
						for($k=0;$k<count($pisah);$k++){
							$indek=$pisah[$k]-1;
							echo "<li>".$nama_perubahan[$indek]."</li>";
								
						}
						echo "</ol></td>";
						echo "<td><button onclick='Detail(\"".$data['tiket']."\",\"".$data['perubahan']."\",\"".$data['nama_proyek']."\")' class='btn btn-warning'><i class='fa fa-search'></i> Lihat Detail</button></td>";
						if($data['konfirmasi']==0){
							$jenis = str_replace(' ', '_', $data['jenis']);
							echo "<td><a href='?".paramEncrypt('page=konfirmasi&tiket='.$data['tiket'].'&jenis='.$jenis.'&perubahan='.$data['perubahan'].'')."' class='btn btn-info' onclick='return Konfirmasi();'><i class='fa fa-check-circle'></i> Konfirmasi</a></td>";
						}else echo "<td>Terkonfirmasi</td>";											
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
			$('#example1').DataTable( {
				/* scrollX:        true,
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
				fixedColumns: true */
				} );
		});
function Konfirmasi(){
	var conf = confirm("Apakah yakin akan mengkonfirmasi perubahan ini?");
	if(conf) return true;
	else return false;
}
function readRecords(tiket,perubahan) {
    $.get("pages/ajax/konfirmasi_read.php?tiket="+tiket+"&perubahan="+perubahan+"", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
function Detail(id,perubahan,nama) {
	$("#tiket").val(id);
	var isi=nama+" (perubahan ke-"+perubahan+")";
	$("#nama").val(isi);
	readRecords(id,perubahan);
    // Open modal popup
    $("#modal-default").modal("show");
	
}
</script>