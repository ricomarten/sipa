<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Permintaan Perubahan</a></li>
	  <li class="active">Entri Permintaan</li>
	</ol>
  </section>
  <!-- Main content -->
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="dist/css/fileinput.min.css">
  <section class="content">
  
  <?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	  //print_r($_POST);
	  //echo "jumlah perubahan".count($_POST['jenis'])."<br>";
	  $folder	= 'upload/';
	  $jenis="";
	  for($i=0;$i<count($_POST['jenis']);$i++){
		  $jenis.=$_POST['jenis'][$i]." ";
	  }
	  $jenisPerubahan=substr($jenis,0,-1);
	  mysql_query("insert into perubahan (tiket,perubahan,jenis, tanggal) values ('".$var['tiket']."','".$_POST['perubahan']."','".$jenisPerubahan."','".date("Y:m:d h:m:s")."')");
	  for($i=0;$i<count($_POST['jenis']);$i++){
		  //echo $_POST['jenis'][$i];
		  switch ($_POST['jenis'][$i]){
			  case "2":
				$fitur="";
				$checked_arr = $_POST['fitur'];
				for($j=0;$j<count($checked_arr);$j++){
					$fitur.=$checked_arr[$j]." ";
				}
				$hasil=mysql_query("update perubahan set 	fitur_baru='".$fitur."',
															fitur_awal='".$_POST['fitur_awal']."',
															ket_fitur='".$_POST['ket_fitur']."',
															alasan_fitur='".$_POST['alasan_fitur']."'
									where tiket='".$var['tiket']."' and perubahan='".$_POST['perubahan']."' ");
				if($hasil){
					$pesan="<div class='callout callout-success'><h4>Berhasil menyimpan perubahan silahkan lihat data perubahan di <a href='?".paramEncrypt('page=list_request')."'>Sini</a></h4></div>";
					break;
				}else{
					$pesan= "<div class='callout callout-warning'><h4>Gagal menyimpan perubahan</h4></div>";
					break;
				}
			case "3":
				if($_FILES['kuesioner_baru']['size']>2097152 || empty($_FILES['kuesioner_baru']['size']) ){
					echo "<script>alert('File tidak boleh lebih besar 2 MB')</script>";
					mysql_query("DELETE FROM perubahan WHERE tiket='".$var['tiket']."' and perubahan='".$_POST['perubahan']."'");
					echo "<script> window.history.back(); </script>";
					break;
				}
				$explode	= explode('.',$_FILES['kuesioner_baru']['name']);
				$extensi	= $explode[count($explode)-1];
				$explode2	= explode('.',$_POST['kuesioner_lama']);
				$namabaru= $explode2[0]."-rev".$_POST['perubahan'].".".$extensi;
				$uploadKuesioner=move_uploaded_file($_FILES['kuesioner_baru']['tmp_name'], $folder.$namabaru);
				if($uploadKuesioner){
					$hasil=mysql_query("update perubahan set 	kuesioner_lama='".$_POST['kuesioner_lama']."',
																kuesioner_baru='".$namabaru."',
																ket_kuesioner='".$_POST['ket_kuesioner']."',
																alasan_kuesioner='".$_POST['alasan_kuesioner']."'
									where tiket='".$var['tiket']."'");
					if($hasil){
						$pesan= "<div class='callout callout-success'><h4>Berhasil menyimpan perubahan silahkan lihat data perubahan di <a href='?".paramEncrypt('page=list_request')."'>Sini</a></h4></div>";
						break;
					}else{
						$pesan= "<div class='callout callout-warning'><h4>Gagal menyimpan perubahan</h4></div>";
						break;
					}
				}else{
					$pesan= "<div class='callout callout-warning'><h4>Gagal upload file</h4></div>";
					break;
				}
			case "4":
				if($_FILES['rule_baru']['size']>2097152 || empty($_FILES['rule_baru']['size']) ){
					echo "<script>alert('File tidak boleh lebih besar 2 MB')</script>";
					mysql_query("DELETE FROM perubahan WHERE tiket='".$var['tiket']."' and perubahan='".$_POST['perubahan']."'");
					echo "<script> window.history.back(); </script>";
					break;
				}
				$explode	= explode('.',$_FILES['rule_baru']['name']);
				$extensi	= $explode[count($explode)-1];
				$explode2	= explode('.',$_POST['rule_lama']);
				$namabaru= $explode2[0]."-rev".$_POST['perubahan'].".".$extensi;
				$upload=move_uploaded_file($_FILES['rule_baru']['tmp_name'], $folder.$namabaru);
				if($upload){
					// $hasil=mysql_query("INSERT INTO perubahan(tiket, perubahan, jenis, keterangan, alasan, rule_lama, rule_baru, tanggal) 
										// VALUES ('".$var['tiket']."','".$_POST['perubahan']."','".$_POST['jenis']."','".$_POST['keterangan']."','".$_POST['alasan']."'
										// ,'".$_POST['rule_lama']."','".$namabaru."','".date("Y:m:d h:m:s")."')");	
					$hasil=mysql_query("update perubahan set 	rule_lama='".$_POST['rule_lama']."',
																rule_baru='".$namabaru."',
																ket_rule='".$_POST['ket_rule']."',
																alasan_rule='".$_POST['alasan_rule']."'
									where tiket='".$var['tiket']."'");
					if($hasil){
						$pesan= "<div class='callout callout-success'><h4>Berhasil menyimpan perubahan silahkan lihat data perubahan di <a href='?".paramEncrypt('page=list_request')."'>Sini</a></h4></div>";
						break;
					}else{
						$pesan= "<div class='callout callout-warning'><h4>Gagal menyimpan perubahan</h4></div>";
						break;
					}
				}else{
					$pesan= "<div class='callout callout-warning'><h4>Gagal upload file</h4></div>";
					break;
				}
			case "5":
				if($_FILES['tabulasi_baru']['size']>2097152 || empty($_FILES['tabulasi_baru']['size']) ){
					echo "<script>alert('File tidak boleh lebih besar 2 MB')</script>";
					mysql_query("DELETE FROM perubahan WHERE tiket='".$var['tiket']."' and perubahan='".$_POST['perubahan']."'");
					echo "<script> window.history.back(); </script>";
					break;
				}
				$explode	= explode('.',$_FILES['tabulasi_baru']['name']);
				$extensi	= $explode[count($explode)-1];
				$explode2	= explode('.',$_POST['tabulasi_lama']);
				$namabaru= $explode2[0]."-rev".$_POST['perubahan'].".".$extensi;
				$upload=move_uploaded_file($_FILES['tabulasi_baru']['tmp_name'], $folder.$namabaru);
				if($upload){
					// $hasil=mysql_query("INSERT INTO perubahan(tiket, perubahan, jenis, keterangan, alasan, tabulasi_lama, tabulasi_baru, tanggal) 
										// VALUES ('".$var['tiket']."','".$_POST['perubahan']."','".$_POST['jenis']."','".$_POST['keterangan']."','".$_POST['alasan']."'
										// ,'".$_POST['tabulasi_lama']."','".$namabaru."','".date("Y:m:d h:m:s")."')");
					$hasil=mysql_query("update perubahan set 	tabulasi_lama='".$_POST['tabulasi_lama']."',
																tabulasi_baru='".$namabaru."',
																ket_tabulasi='".$_POST['ket_tabulasi']."',
																alasan_tabulasi='".$_POST['alasan_tabulasi']."'
									where tiket='".$var['tiket']."'");
					if($hasil){
						$pesan= "<div class='callout callout-success'><h4>Berhasil menyimpan perubahan silahkan lihat data perubahan di <a href='?".paramEncrypt('page=list_request')."'>Sini</a></h4></div>";
						break;
					}else{
						$pesan= "<div class='callout callout-warning'><h4>Gagal menyimpan perubahan</h4></div>";
						break;
					}
				}else{
					$pesan= "<div class='callout callout-warning'><h4>Gagal upload file</h4></div>";
					break;
				}
			}
	  }
		echo $pesan;
  }
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
							<th>Jumlah Perubahan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>';
						$sql2=mysql_query("select * from proyek where user='".$_SESSION['username']."'");
						while($list=mysql_fetch_array($sql2)){
							$sql_jml_perubahan=mysql_query("select max(perubahan),konfirmasi from perubahan where tiket='".$list['tiket']."'");
							$jml_perubahan=mysql_fetch_array($sql_jml_perubahan);
							if(empty($jml_perubahan[0]))$perubahan=0;
							else $perubahan=$jml_perubahan[0];
							$request="request&tiket=".$list['tiket']."&perubahan=".$perubahan;
							echo "<tr>";
							echo "<td><a href='#'>".$list['tiket']."</a></td>";
							echo "<td>".$list['nama']."</td>";					
							echo "<td>".$perubahan."</td>";
							if($perubahan>0 && $jml_perubahan['konfirmasi']=='1')
								echo "<td><a href='?".paramEncrypt('page='.$request.'')."' class='btn btn-success'><i class='fa fa-edit'></i> Entri</a></td>";
							else if($perubahan==0 && empty($jml_perubahan['konfirmasi']))
								echo "<td><a href='?".paramEncrypt('page='.$request.'')."' class='btn btn-success'><i class='fa fa-edit'></i> Entri</a></td>";
							else echo "<td><a href='#' class='btn btn-warning'><i class='fa fa-warning'></i> Belum Dikonfirmasi</a></td>";
							echo "</tr>";
						}
						echo'</tr>
					</tbody>
				</table>
		</div>
	</div>';
  }else{
	  $querysub=mysql_query("select * from subproyek where tiket='".$var['tiket']."'");
	  while($sub=mysql_fetch_array($querysub)){
		$subproyek[]=$sub;
	  }
  ?>

	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Formulir Permintaan Perubahan Pembangunan dan Pengembangan Aplikasi</h3><div id="result"></div>
	  </div>
		<?php
			$query_data=mysql_query("select p.*,b.nama as subdir from proyek p left join bagian b on b.kode=p.bagian where tiket='".$var['tiket']."'");
			$data=mysql_fetch_array($query_data);
		?>
		<form name="entri"  enctype="multipart/form-data" action="?<?php $request="request&tiket=".$var['tiket']; echo paramEncrypt('page='.$request.''); ?>" class="form-horizontal"  method="post" onsubmit="return submitForm()">
			<div class="box-body">
				<div class="form-group">
                  <label for="tiket" class="col-sm-2 control-label">ID Tiket</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tiket" name="tiket" placeholder="ID Tiket" 
					value="<?php echo $var['tiket'];?>"  readonly required>
                  </div>
				</div>
				
				
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Aplikasi</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama Aplikasi" 
					value="<?php echo $data['nama'] ?>" readonly required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Perubahan ke</label>
                  <div class="col-sm-10" >
                    <input type="text" class="form-control" id="perubahan" name="perubahan" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['perubahan']; else echo ($var['perubahan']+1); ?>" readonly required>
                  </div>
                </div>
				
				
				<div class="form-group">
				 <label class="col-sm-2 control-label">Jenis Perubahan</label>
				  <div class="col-sm-10" >
				  <div class='checkbox'><label><input type='checkbox' id='cekfitur' name='jenis[]' value='1'>Fitur</label></div>
				  <div class='checkbox'><label><input type='checkbox' id='cekdok' name='jenis[]' value='2'>Kelengkapan Dokumen</label></div>         
				  </div>
                </div>
							
				
				<!-- checkbox -->
				<div id="divFitur">				
					<div class="form-group">
						<label class="col-sm-2 control-label">Fitur</label>
							<div class="col-sm-4">
							<?php
							$fitur_lama="";
							$query_fitur=mysql_query("select * from fitur");
							while($data_fitur=mysql_fetch_array($query_fitur)){
								foreach($subproyek as $dataSub){
									if($dataSub['fitur']==$data_fitur['kode']){
										$cek="checked disabled";
										$fitur_lama.=$dataSub['fitur']." ";
										break;
									}	
									else{
										$cek="";
									}									
								}	
								echo "<div class='checkbox'>
										<label><input type='checkbox' value = '".$data_fitur['kode']."' name='fitur[]' ".$cek."> ".$data_fitur['nama']."</label>
									</div>";
							}
							echo "<input type='hidden' name='fitur_awal' value='".$fitur_lama."'>";
							?>  
							</div>
								
						  <div class="col-sm-6">
						  <label class="control-label">Keterangan perubahan</label>
						  <textarea class="form-control" rows="2" name="ket_fitur" id="ket_fitur" placeholder="Isikan keterangan..." ><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['keterangan'] ?></textarea>
						   <label class="control-label">Alasan perubahan</label>
						  <textarea class="form-control" rows="2" name="alasan_fitur" id="alasan_fitur" placeholder="Isikan alasan..." ><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['alasan'] ?></textarea>					
						  </div>
					</div>
					
				</div>
				
				<div id="divDokumen">
					<div class="form-group">					
						<label class="col-sm-2 control-label">Perubahan Dokumen</label>
						<div class="col-sm-10">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th><center>Dokumen</center></th>
										<th width='50%'><center>Perubahan Dokumen</center></th>    
									</tr>
								</thead>
								<tbody id="listdokumen">													
								</tbody>							
							</table>
								
						</div>
					</div>				
					<div class="form-group" id="uploaddokumen">
						<label class="col-sm-2 control-label">Upload Perubahan Dokumen</label>
						<div class="col-sm-4">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-book"></i></span>
								<select name="tipe" id="tipe" class="form-control">							
									<option value =''>Pilih Dokumen yang dirubah</option>
									<?php
										$query=mysql_query("select * from dokumen where tiket='".$var['tiket']."' and perubahan='".$var['perubahan']."'");
										while($dokumen=mysql_fetch_array($query)){
											echo "<option value ='".$dokumen['nama']."'>".$dokumen['nama']."</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="input-group">
							<input type="file" id="file" name="datafile">
								<span class="input-group-btn">
									<button class="btn btn-primary btn-add" type="button" onclick="uploadFile();">
									<span class="fa fa-upload"></span> Upload
									</button>
									<script>
										function uploadFile() {
											var dokumen		= document.getElementById("tipe").value;
											var pecah=dokumen.split("-");
											var tiket       = $("#tiket").val();
											var username    = $("#username").val();
											var subdir      = pecah[2];
											var nama        = $("#nama").val();											
											var perubahan   = $("#perubahan").val();											
											document.getElementById("tipe").closest(".form-group").classList.remove('has-error');
											// membaca data file yg akan diupload, dari komponen 'fileku'
											var file = document.getElementById("file").files[0];
											var tipe = document.getElementById("tipe").value;
											if(tipe=="" || tiket=="" || subdir==null || nama==""){
												document.getElementById("tipe").closest(".form-group").classList.add('has-error');
												if(tiket=="" || subdir==null || nama==""){
													alert("Pastikan dokumen yang akan dirubah terisi");
												}
											}else{
												document.getElementById("tipe").closest(".form-group").classList.remove('has-error');
												var formdata = new FormData();
												formdata.append("datafile", file);
												formdata.append("dokumenlama", tipe);
												// proses upload via AJAX disubmit ke 'upload.php'
												// selama proses upload, akan menjalankan progressHandler()
												if((file.size)<=(2*1024*1024)){
													var ajax = new XMLHttpRequest();
													ajax.upload.addEventListener("progress", progressHandler, false);
													ajax.open("POST", "pages/ajax/upload_request.php?tiket="+tiket+"&subdir="+subdir+"&nama="+nama+"&perubahan="+perubahan, true);
													ajax.send(formdata);											
												}   
												else{
													document.getElementById("progressBar").value = 0;
													document.getElementById("total").innerHTML ="Ukuran file: " +(file.size/1024/1024)+" MB terlalu besar";
													document.getElementById("status").innerHTML ="";
												}	
											}										
										}
										
										function progressHandler(event){
											// hitung prosentase
											if(event.loaded<=2097152){
												var percent = (event.loaded / event.total) * 100;
												// menampilkan prosentase ke komponen id 'progressBar'
												document.getElementById("progressBar").value = Math.round(percent);
												// menampilkan prosentase ke komponen id 'status'
												document.getElementById("status").innerHTML = Math.round(percent)+"% telah terupload";
												// menampilkan file size yg tlh terupload dan totalnya ke komponen id 'total'
												document.getElementById("total").innerHTML = "Telah terupload "+event.loaded+" bytes dari "+event.total;
												if(percent==100){
													readRecords();
												}
											}else{
												document.getElementById("status").innerHTML = "Ukuran file terlalu besar";
											}											
										}
									</script>
								</span>
							</div>
							<p lass='help-block'>Upload dokumen (maksimal 2 MB)</p>
							<progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
						<h3 id="status"></h3><p id="total"></p>
						</div>
						
					</div>
                            
				</div>
				<div id="divKuesioner">
					<div class="form-group">
					
					  <label class="col-sm-2 control-label">Perubahan Kuesioner</label>
						<div class="col-sm-4">
							<input type="file" id="kuesioner" name="kuesioner_baru" accept='.doc,.docx,.xls,.xlsx,.pdf,.jpg,.jpeg,.pdf'>
							<p class="help-block">Upload Kuesioner (maksimal 2 MB)</p>	   
					   </div>
						<div class="col-sm-6">
							<label class="control-label">Keterangan perubahan</label>
							<textarea class="form-control" rows="2" name="ket_kuesioner" id="ket_kuesioner" placeholder="Isikan keterangan..."><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['keterangan'] ?></textarea>
							<label class="control-label">Alasan perubahan</label>
							<textarea class="form-control" rows="2" name="alasan_kuesioner" id="alasan_kuesioner" placeholder="Isikan alasan..."><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['alasan'] ?></textarea>	  
						</div>
					</div>
					<input type="hidden" name="kuesioner_lama" value="<?php echo $data['dokkue']?>">
				</div>
				<div id="divRule">
					<div class="form-group">
					  <label class="col-sm-2 control-label">Perubahan Rule Validasi</label>
					  <div class="col-sm-4" >
					  <input type="file" id="rule" name="rule_baru" accept='.doc,.docx,.xls,.xlsx,.pdf,.jpg,.jpeg,.pdf'>
					  <p class="help-block">Upload Rule Validasi (maksimal 2 MB)</p>
					  </div>
						<div class="col-sm-6">
							<label class="control-label">Keterangan perubahan</label>
							<textarea class="form-control" rows="2" name="ket_rule"  id="ket_rule" placeholder="Isikan keterangan..."><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['keterangan'] ?></textarea>
							<label class="control-label">Alasan perubahan</label>
							<textarea class="form-control" rows="2" name="alasan_rule" id="alasan_rule" placeholder="Isikan alasan..."><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['alasan'] ?></textarea>
						</div>  
					</div>
					<input type="hidden" name="rule_lama" value="<?php echo $data['dokrv']?>">
				</div>
				<div id="divTabulasi">
					<div class="form-group">
					  <label class="col-sm-2 control-label">Perubahan Tabulasi</label>
					  <div class="col-sm-4" >
					  <input type="file" id="tabulasi" name="tabulasi_baru" accept='.doc,.docx,.xls,.xlsx,.pdf,.jpg,.jpeg,.pdf'>
					  <p class="help-block">Upload Tabulasi (maksimal 2 MB)</p>
					  </div>
						<div class="col-sm-6">
							<label class="control-label">Keterangan perubahan</label>
							<textarea class="form-control" rows="2" name="ket_tabulasi" id="ket_tabulasi" placeholder="Isikan keterangan..."><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['keterangan'] ?></textarea>
							<label class="control-label">Alasan perubahan</label>
							<textarea class="form-control" rows="2" name="alasan_tabulasi" id="alasan_tabulasi" placeholder="Isikan alasan..."><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['alasan'] ?></textarea>
						</div>
					</div>
					<input type="hidden" name="tabulasi_lama" value="<?php echo $data['dokrt']?>">
				</div>
				
							
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-default" onclick="window.history.back();">Kembali</button>
                <button type="submit" class="btn btn-info pull-right">Simpan</button>
              </div>		  
              <!-- /.box-footer -->
        </form>
	</div>
<?php } ?> 
	<!-- /.box -->
  </section>
  <!-- /.content -->  
</div>
<!-- /.container -->
</div>
<script>
$(document).ready(function () {
	$("#divTanggal").hide();
	$("#divFitur").hide();
	$("#divKuesioner").hide();
	$("#divRule").hide();
	$("#divTabulasi").hide();
	$("#divDokumen").hide();
	$("#cekfitur").change(function() {
		if($(this).prop('checked') == true) {
			//alert("Checked Box Selected");
			$("#divFitur").show();
			$("#ket_fitur").attr('required', '');
			$("#alasan_fitur").attr('required', '');
		} else {
			//alert("Checked Box deselect");
			$("#divFitur").hide();
			$("#ket_fitur").removeAttr('required');
			$("#alasan_fitur").removeAttr('required');
		}
	});
	$("#cekdok").change(function() {
		if($(this).prop('checked') == true) {
			readRecords();
			$("#divDokumen").show();
			/* $("#divKuesioner").show();
			$("#kuesioner").attr('required', '');
			$("#ket_kuesioner").attr('required', '');
			$("#alasan_kuesioner").attr('required', ''); */
		} else {
			$("#divDokumen").hide();
			/* $("#divKuesioner").hide();
			$("#kuesioner").removeAttr('required');
			$("#ket_kuesioner").removeAttr('required');
			$("#alasan_kuesioner").removeAttr('required'); */
		}
	});
	$("#cekkuesioner").change(function() {
		if($(this).prop('checked') == true) {
			readRecords();
			$("#listdokumen").show();
			$("#divKuesioner").show();
			$("#kuesioner").attr('required', '');
			$("#ket_kuesioner").attr('required', '');
			$("#alasan_kuesioner").attr('required', '');
		} else {
			$("#listdokumen").hide();
			$("#divKuesioner").hide();
			$("#kuesioner").removeAttr('required');
			$("#ket_kuesioner").removeAttr('required');
			$("#alasan_kuesioner").removeAttr('required');
		}
	});
	$("#cekrule").change(function() {
		if($(this).prop('checked') == true) {
			$("#divRule").show();
			$("#rule").attr('required', '');
			$("#ket_rule").attr('required', '');
			$("#alasan_rule").attr('required', '');
		} else {
			$("#divRule").hide();
			$("#rule").removeAttr('required');
			$("#ket_rule").removeAttr('required');
			$("#alasan_rule").removeAttr('required');
		}
	});
	$("#cektabulasi").change(function() {
		if($(this).prop('checked') == true) {
			$("#divTabulasi").show();
			$("#tabulasi").attr('required', '');
			$("#ket_tabulasi").attr('required', '');
			$("#alasan_tabulasi").attr('required', '');
		} else {
			$("#divTabulasi").hide();
			$("#tabulasi").removeAttr('required');
			$("#ket_tabulasi").removeAttr('required');
			$("#alasan_tabulasi").removeAttr('required');
		}
	});
});

function submitForm(){
	cekFitur=0;cekJenis=0;pesan="";
	for(var i=0; i < document.getElementsByName("fitur[]").length;i++){
		if(document.getElementsByName("fitur[]")[i].checked) cekFitur++;
	} 
	for(var i=0; i < document.getElementsByName("jenis[]").length;i++){
		if(document.getElementsByName("jenis[]")[i].checked) cekJenis++;
	} 
	if((cekFitur==0 && cekJenis!=0) || cekJenis==0){	
		if(cekFitur==0 )
			pesan+="\nFitur harus ada yang terplih";		
		if(cekJenis==0 )
			pesan+="\nJenis Perubahan harus ada yang terplih";	
		alert(pesan);
		return false;
	}else{
		return true;
	}

}
function readRecords() {
    tiket=$("#tiket").val();
    perubahan=$("#perubahan").val();
    $.get("pages/ajax/dokumen_request.php?act=read&tiket="+tiket+"&perubahan="+perubahan, {}, function (data, status) {
        $("#listdokumen").html(data);
    });
}
function hapusFile(id) {
    var conf = confirm("Apakah yakin akan menghapus dokumen "+id+"?");
    if (conf == true) {
        $.post("pages/ajax/dokumen_delete.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}
</script>