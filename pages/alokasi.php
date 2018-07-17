<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!-- Full Width Column -->
<!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header)  -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Entri</a></li>
	  <li class="active">Alokasi Permintaan</li>
	</ol>
  </section>
<style>
.progress-green {
    background-color: #00a65a;
}
</style> 
<style>
    .load {
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -50px 0px 0px -50px;
    }
	</style>
	<?php 
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
		    //print_r($_POST);
		}
	?>
  <!-- Main content -->
  <section class="content">	
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Alokasi Permintaan ke Developer</h3><div id="result"></div>
	  </div>
		<form name="alokasi" id="alokasi" action="?<?php echo paramEncrypt('page=alokasi&id='.$var['id'].''); ?>" class="form-horizontal"  method="post" onsubmit="return submitForm()">
		<div class="box-body">
			
			<div class="row">
				<div class="col-sm-6">
					<blockquote>
					<dl class="dl-horizontal">              
					<?php
					$q=mysql_query("select p.*,b.nama as subdir,a.nama as app, k.nama as keb from proyek p 
									left join bagian b on p.bagian=b.kode 
									left join aplikasi a on p.aplikasi=a.kode 
									left join kebutuhan k on p.kebutuhan=k.kode 
									where tiket='".$var['id']."'");
					$d=mysql_fetch_array($q);
					//echo "<input type='hidden' name='nfitur' value='".$d['fitur']."'>";
					$query_dev=mysql_query("select * from developer");
					while($data_dev=mysql_fetch_array($query_dev)){
						$developer[]=$data_dev;
					}
					$query_bahasa=mysql_query("select * from program");
					while($data_bahasa=mysql_fetch_array($query_bahasa)){
						$prog[]=$data_bahasa;
					}
					$query_fitur=mysql_query("select * from fitur");
					while($data_fitur=mysql_fetch_array($query_fitur)){
						$ftr[]=$data_fitur;
					}
					$pecah_fitur=explode(',',$d['fitur_permintaan']);
					$ini=0;$nama_fitur="";
					foreach($ftr as $f){
						if($pecah_fitur[$ini]==$f['kode'])
							$nama_fitur.= $f['nama'].", ";
						$ini++;
					}
					$nama_fitur=substr($nama_fitur, 0, -2);
					$text="";
					$text.= "<dt>ID Tiket:</dt><dd><b>". $var['id']."</b></dd>";
					$text.= "<dt>Subdir/Bagian:</dt><dd>".$d['subdir']."</dd>";
					$text.= "<dt>Nama Aplikasi:</dt><dd>".$d['nama']."</dd>";
					//$text.= "<dt>Keterangan:</dt><dd>".$d['tujuan']."</dd>";
					$text.= "<dt>Jenis Aplikasi:</dt><dd><u>".$d['app']."</u> (".$d['keb'].")</dd>";
					$text.= "<dt>Waktu:</dt><dd>".TanggalLengkap($d['mulai'])." s.d. ".TanggalLengkap($d['selesai'])."</dd>";
					$text.= "<dt>Fitur Permintaan:</dt><dd>".$nama_fitur."</dd>";
					echo $text;
					echo "<dt>Developer Leader:</dt><dd>";
					echo "<select class='form-control select2' style='width: 100%;' name='leader' required>
						  <option value=''>Pilih Developer</option>";
						 foreach($developer as $dev){
									echo "<option value='".$dev['nip']."'";
									if ($_SERVER['REQUEST_METHOD'] == 'POST'){
										if($_POST['leader']==$dev['nip']){ 
											echo "selected"; 
											}
										}
									else if($d['developer']==$dev['nip']) echo "selected"; 
									echo">".NickName($dev['nama'])." (";
									$kemampuan="";
									$nama=explode(" ",$dev['expert']);
									for($j=0;$j<count($nama)-1;$j++){				
										foreach($prog as $bhs){
											if($bhs['kode']==$nama[$j]){
												$kemampuan.= $bhs['nama'].", " ;
												break;
											}
										}
									}									
									echo substr($kemampuan,0,-2);
									echo ")</option>";
								}
						
					echo "</select>";
					echo "</dd>";
					
					
					?>
					</dl>
					</blockquote>
				</div>
			
				<div class="col-sm-6">
					<h4>Daftar Beban Developer</h4>
					<table id="tabel" class="table table-bordered table-striped table-hover" width="100%">
					<thead>
						<tr >
							<!--<th><center>NIP</center></th>-->
							<th><center>Nama</center></th>
							<th><center>Beban</center></th>							
							<th><center>Jumlah Proyek</center></th>
							<th><center>Jumlah Fitur</center></th>
							<th><center>Maksimal Beban</center></th>
						</tr>
					</thead>
					<tbody>
						<?php				
							$queery=mysql_query("SELECT d.*, (select count(distinct(tiket)) from subproyek s where LOCATE(d.nip,s.developer) <> 0 ) as proyek, (select count(tiket) from subproyek s where LOCATE(d.nip,s.developer) <> 0 ) as subproyek from developer d order by proyek,subproyek asc");
							while ($data=mysql_fetch_array($queery)){
							    if($data['beban']==0)$data['beban']=1;
								echo "<tr>";
								echo "<td>".$data['nama']."</td>";
								echo "<td>";
								$persen=round(($data['proyek']/$data['beban'])*100);
								$persen2=($data['proyek']/$data['beban'])*100;
								if($persen2>100)$persen2=100;
								if($persen2<40)$warna='aqua';
								if($persen2>=40 && $persen2<=70)$warna='yellow';
								if($persen2>70)$warna='red';
								echo "<div class='progress progress-green'>
											<div class='progress-bar progress-bar-".$warna."' role='progressbar' aria-valuenow='".$persen2."' aria-valuemin='0' aria-valuemax='100' style='width: ".$persen2."%'>
											<span class='sr'>".$persen."%</span>
											</div>
										</div>";
								
								echo "</td>";
								/* echo "<td>";
								$kemampuan="";
								for($j=1;$j<=$data['keahlian'];$j++){				
									$judul="expert".$j;
									foreach($prog as $bhs){
										if($bhs['kode']==$data[$judul]){
											$kemampuan.= $bhs['nama'].", " ;
											break;
										}
									}
								}
								echo substr($kemampuan,0,-2); */
								echo "</td>";								
								echo "<td><center>".$data['proyek']."</center></td>";
								echo "<td><center>".$data['subproyek']."</center></td>";
								echo "<td><center>".$data['beban']."</center></td>";
								echo "</tr>";
							}
						?>
					</tbody>			
				</table>
				</div>
			</div>
			<h4 class="box-title">Alokasi Fitur ke Developer</h4>
			<?php
	
	$query=mysql_query("select s.*,f.nama as nama from subproyek s left join fitur f on f.kode=s.fitur where tiket='".$var['id']."'");
	while($data=mysql_fetch_array($query)){
	    if(strlen($data['fitur'])>3){
	        $namasubfitur=explode("_",$data['fitur']);
	        $data['fitur']=str_replace(" ","--",$data['fitur']);
	        echo "<div class='row' id='divfitur".$data['fitur']."'>
				<label class='col-sm-2 control-label'>". $namasubfitur[1]."<br><button class='btn btn-danger btn-sm btn-add' type='button' onclick='hapusFitur(".$var['id'].",".$data['fitur'].",\"".$data['nama']."\");'> <span class='fa fa-remove'></span></button></label>
				<div class='col-sm-6'>
					<input type='hidden' id='awal".$data['fitur']."' name='awal".$data['fitur']."' class='form-control'>
					<input type='hidden' id='akhir".$data['fitur']."' name='akhir".$data['fitur']."' class='form-control'>
					<input type='hidden' name='fitur[]' value='".$data['fitur']."'>
					<div class='input-group'>
						<span class='input-group-addon'>durasi</span>
						<input type='text' class='form-control' name='durasi".$data['fitur']."' id='durasi".$data['fitur']."' readonly>
						<span class='input-group-addon'>hari</span>
					</div>
					<div id='slider".$data['fitur']."'></div>
				</div>
				
				<label class='col-sm-1 control-label'>Developer</label>
				<div class='col-sm-3'>	
					<select name='developer".$data['fitur']."[]' class='form-control select2' multiple='yes' data-placeholder='Pilih Developer' style='width: 100%;' required>
						<option value=''>Pilih Developer</option>";
						$k=0;
						foreach($developer as $dev){
							$indek="developer".$data['fitur'];
							$jmldev=count($_POST[$indek]);
							echo "<option value='".$dev['nip']."'";
							if ($_SERVER['REQUEST_METHOD'] == 'POST'){
								if($_POST[$indek][$k]==$dev['nip']){ 
									echo "selected"; 
									if($k<$jmldev-1) $k++;
									}
								}
							else if(strpos($data['developer'],$dev['nip']) !== false){ 
								echo "selected";
								} 
							echo">".NickName($dev['nama'])." (";
							$kemampuan="";
							$nama=explode(" ",$dev['expert']);
							for($j=0;$j<count($nama)-1;$j++){				
								foreach($prog as $bhs){
									if($bhs['kode']==$nama[$j]){
										$kemampuan.= $bhs['nama'].", " ;
										break;
									}
								}
							}									
							echo substr($kemampuan,0,-2);
							echo ")</option>";
						}
		echo"</select>
				</div>						
			</div><br>";
	    }
	    else{
	        echo "<div class='row' id='divfitur".$data['fitur']."'>
				<label class='col-sm-2 control-label'>".$data['nama']."<br><button class='btn btn-danger btn-sm btn-add' type='button' onclick='hapusFitur(".$var['id'].",".$data['fitur'].",\"".$data['nama']."\");'> <span class='fa fa-remove'></span></button></label>
				<div class='col-sm-6'>
					<input type='hidden' id='awal".$data['fitur']."' name='awal".$data['fitur']."' class='form-control'>
					<input type='hidden' id='akhir".$data['fitur']."' name='akhir".$data['fitur']."' class='form-control'>
					<input type='hidden' name='fitur[]' value='".$data['fitur']."'>
					<div class='input-group'>
						<span class='input-group-addon'>durasi</span>
						<input type='text' class='form-control' name='durasi".$data['fitur']."' id='durasi".$data['fitur']."' readonly>
						<span class='input-group-addon'>hari</span>
					</div>
					<div id='slider".$data['fitur']."'></div>
				</div>
				
				<label class='col-sm-1 control-label'>Developer</label>
				<div class='col-sm-3'>	
					<select name='developer".$data['fitur']."[]' class='form-control select2' multiple='yes' data-placeholder='Pilih Developer' style='width: 100%;' required>
						<option value=''>Pilih Developer</option>";
						$k=0;
						foreach($developer as $dev){
							$indek="developer".$data['fitur'];
							$jmldev=count($_POST[$indek]);
							echo "<option value='".$dev['nip']."'";
							if ($_SERVER['REQUEST_METHOD'] == 'POST'){
								if($_POST[$indek][$k]==$dev['nip']){ 
									echo "selected"; 
									if($k<$jmldev-1) $k++;
									}
								}
							else if(strpos($data['developer'],$dev['nip']) !== false){ 
								echo "selected";
								} 
							echo">".NickName($dev['nama'])." (";
							$kemampuan="";
							$nama=explode(" ",$dev['expert']);
							for($j=0;$j<count($nama)-1;$j++){				
								foreach($prog as $bhs){
									if($bhs['kode']==$nama[$j]){
										$kemampuan.= $bhs['nama'].", " ;
										break;
									}
								}
							}									
							echo substr($kemampuan,0,-2);
							echo ")</option>";
						}
		echo"</select>
				</div>						
			</div><br>";
	    }
		
	}
	?> 
		<div id="tambahFitur"></div>
		<br>Tambah Fitur <select id="newfitur">
			<option value="">Pilih Fitur</option>
			<?php
				$sql_cari=mysql_query("SELECT * FROM fitur where kode not in (select fitur from subproyek where tiket='".$var['id']."')");
				while($data_cari=mysql_fetch_array($sql_cari)){
					echo "<option value='".$data_cari['kode']."'>".$data_cari['nama']."</option>";
				}
			?>
		</select>
		<button class='btn btn-primary btn-add' type='button' onclick='tambahFitur();'> <span class='fa fa-plus'></span></button>
		<br>Tambah Sub Fitur <select id="fiturawal">
			<option value="">Pilih Fitur</option>
			<?php
				$sql_cari=mysql_query("SELECT * FROM fitur where kode in (select fitur from subproyek where tiket='".$var['id']."')");
				while($data_cari=mysql_fetch_array($sql_cari)){
					echo "<option value='".$data_cari['kode']."'>".$data_cari['nama']."</option>";
				}
			?>
		</select>
		<input type="text" name="namasub" id="namasub">
		<button class='btn btn-primary btn-add' type='button' onclick='tambahSubFitur();'> <span class='fa fa-plus'></span></button>
		<input type="hidden" name="kata" value="<?php echo $text; ?>">
		<input type="hidden" name="tiket" id="tiket" value="<?php echo $var['id']; ?>">
        </div>
		<div class="load center" id="loadingImage" style="display: none">
		  <img src="loading.gif"/>
		</div>
		<div class="box-footer">
			<a href="?<?php echo paramEncrypt('page=list_alokasi'); ?>" class="btn btn-default">Kembali</a>
				<!-- <button type="submit" class="btn btn-primary pull-right"><span class='fa fa-save'></span> Simpan</button> -->
			<button type="button" class="btn btn-success pull-right" onclick="submitForm();"><i class='fa fa-save'></i> Simpan</button>
        </div>
		</form>
	</div>
	<!-- /.box -->
  </section>
  <!-- /.content -->  
</div>
<!-- /.container -->
</div>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<script> 
$(document).ready(function() {
	slidebar();
	$('.select2').select2()
	$('#tabel').DataTable( {
		scrollX:        true,
		scrollCollapse: true,
		scrollY:        250,
		ordering: 		true,
		paging:         false,
		searching: 		false,
		
		columnDefs: [
			{ width: '150', targets: 1 },
			{ width: '100', targets: 0 },
		],
		fixedColumns: true,
		createdRow: function( row, data, dataIndex ) {
                if ( data[1] == "0" ) {
                    //$( row ).css( "background-color", "Orange" );
                    $( row ).addClass( "info" );
                }
            },

		} );
});
</script>
<script>
function slidebar(){
	var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
<?php 
$query=mysql_query("select s.*,f.nama as nama from subproyek s left join fitur f on f.kode=s.fitur where tiket='".$var['id']."'");
while($data=mysql_fetch_array($query)){
$data['fitur']=str_replace(" ","--",$data['fitur']);
$div="'#slider".$data['fitur']."'";
$awal="'#awal".$data['fitur']."'";
$akhir="'#akhir".$data['fitur']."'";
$durasi="'#durasi".$data['fitur']."'";
$mulai=explode('-',$data['mulai']);
$selesai=explode('-',$data['selesai']);
$start=explode('-',$d['mulai']);
$end=explode('-',$d['selesai']);

echo '$('.$div.').dateRangeSlider({
	  defaultValues:{
		min: new Date('.$mulai[0].','.($mulai[1]-1).','.$mulai[2].'),
		max: new Date('.$selesai[0].','.($selesai[1]-1).','.$selesai[2].')
	  },
	  bounds:{
		min: new Date('.$start[0].','.($start[1]-1).','.$start[2].'),
		max: new Date('.$end[0].','.($end[1]-1).','.$end[2].')
	  },
	  formatter:function(val){
        var days = val.getDate(),
        month = val.getMonth(),
        year = val.getFullYear();
        return days + " " + months[month] + " " + year;
      }
	  });
	$('.$div.').on("valuesChanging", function(e, data){	
		$('.$awal.').val(data.values.min.getFullYear()+"-"+(data.values.min.getMonth()+1)+"-"+data.values.min.getDate());	
		$('.$akhir.').val(data.values.max.getFullYear()+"-"+(data.values.max.getMonth()+1)+"-"+data.values.max.getDate());
		
		var count = 0;
		var startDate=new Date((data.values.min.getMonth()+1)+"//"+data.values.min.getDate()+"//"+data.values.min.getFullYear());
		var endDate=new Date((data.values.max.getMonth()+1)+"//"+data.values.max.getDate()+"//"+data.values.max.getFullYear());
		var curDate = startDate;
		while (curDate <= endDate) {
			var dayOfWeek = curDate.getDay();
			if(!((dayOfWeek == 6) || (dayOfWeek == 0)))
				count++;
			curDate.setDate(curDate.getDate() + 1);
		}
		$('.$durasi.').val(count);
	});';
}
?>

}
function tambahFitur(){
	var fitur=$("#newfitur").val();
	var tiket=$("#tiket").val();
    if(fitur!=""){
		$.post("pages/ajax/fitur_add.php", {
                tiket: tiket,
				fitur: fitur
            },
            function (returndata, status) {
                var pesan=returndata.split("#");
				if(pesan[0]=="Berhasil menambahkan fitur"){
                  alert(pesan[0]);
                  location.href='index.php?'+pesan[1];
				}else{
                  alert(returndata);
				}
            }
        );
    }else{
        alert("Isikan fitur");
    }
}
function tambahSubFitur(){
	var fitur=$("#fiturawal").val();
	var tiket=$("#tiket").val();
	var nama=$("#namasub").val();
    if(fitur!="" && nama!=""){
		$.post("pages/ajax/subfitur_add.php", {
                tiket: tiket,
				fitur: fitur,
				nama: nama,
            },
            function (returndata, status) {
                var pesan=returndata.split("#");
				if(pesan[0]=="Berhasil menambahkan subfitur"){
                  alert(pesan[0]);
                  location.href='index.php?'+pesan[1];
				}else{
                  alert(returndata);
				}
            }
        );
    }else{
        alert("Isikan fitur dan nama subfitur");
    }
}
function hapusFitur(tiket,fitur,nama){
	var conf = confirm("Apakah yakin akan menghapus fitur "+nama+"?");
	var div="#divfitur"+fitur;
    if (conf == true) {
        $(div).remove();
		$.post("pages/ajax/fitur_delete.php", {
                tiket: tiket,
				fitur: fitur
            },
            function (data, status) {
                alert(data);
            }
        );
    }
}
function submitForm(){
<?php 
$query=mysql_query("select s.*,f.nama as nama from subproyek s left join fitur f on f.kode=s.fitur where tiket='".$var['id']."'");
while($data=mysql_fetch_array($query)){
	$awal="'#awal".$data['fitur']."'";
	$akhir="'#akhir".$data['fitur']."'";
	echo "if($(".$awal.").val()==''){		 
			alert('Anda belum mengubah tanggal awal dan tanggal akhir pada fitur ".$data['nama']."');
			return false;
			}
		";
}
?>
else{
	$("#loadingImage").show();
            var myForm = document.getElementById('alokasi');
            formData = new FormData(myForm);
          
          //disable the default form submission
			//event.preventDefault();
         
          $.ajax({
            url: 'pages/ajax/entri_alokasi.php',
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var pesan=returndata.split("#");
              if(pesan[0]=="Berhasil menambahkan permintaan"){
                  alert(pesan[0]);
                  location.href='index.php?'+pesan[1];
              }else{
                  alert(returndata);
              }
              $("#loadingImage").hide();
            }
          });
	}
}
</script>