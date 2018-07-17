<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Permintaan </a></li>
	  <li class="active">Formulir Kebutuhan</li>
	</ol>
  </section>
  <!-- Main content -->
	<link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <!-- Select2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
	<script type="text/javascript" src="plugins/tipped/js/tipped/tipped.js"></script>
	<link rel="stylesheet" type="text/css" href="plugins/tipped/css/tipped/tipped.css" />
	<!-- daterange picker -->
	<link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css"/>
	<link rel="stylesheet" href="bower_components/jquery-ui/themes/base/jquery-ui.css"/>  
	<link rel="stylesheet" href="plugins/wizard/wizard.css"/> 
	<script type="text/javascript" src="plugins/wizard/wizard.js"></script>

	<script type='text/javascript'>
		$(document).ready(function() {
		  Tipped.create('.boxes .box');
		});
	</script>

	<style>
    .load {
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -50px 0px 0px -50px;
    }
	</style>
  <section class="content">
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Formulir Kebutuhan Pembangunan dan Pengembangan Aplikasi</h3><div id="result"></div>
	  </div>
	 
    <script type="text/javascript">
      $(document).ready(function() {
        Tipped.create(".demo-options-callbacks", {
          skin: 'light',
          position: 'topleft',
          close: true,
          hideOn: false,
          onShow: function(content, element) {
            $(element).addClass('highlight');
          },
          afterHide: function(content, element) {
            $(element).removeClass('highlight');
          }
        });
      });
    </script>
		<div class="stepwizard">
           <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Keterangan Permintaan</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" id="step2" class="btn btn-default btn-circle">2</a>
                    <p>Kelengkapan Permintaan</p>
                </div>
            </div>
        </div>
		<form name="entri" id="entri" enctype="multipart/form-data" action="?<?php if(isset($_GET['page'])) echo "page=entri&tiket=".$_GET['tiket']."&username=".$_SESSION['username']; else echo paramEncrypt('page=entri'); ?>" class="form-horizontal"  method="post" onsubmit="return SimpanEntri()">
              <div class="box-body">
				<div class="row setup-content" id="step-1">
                     <div class="col-xs-12">
                         <div class="col-md-12">
							<div class="form-group">
							  <label for="tiket" class="col-sm-2 control-label">ID Tiket</label>
							  <div class="col-sm-10">
								<input type="text" class="form-control" id="tiket" name="tiket" placeholder="ID Tiket" 
								value="<?php 
											if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['tiket'];
											else {if (isset($_GET['tiket'])) echo $_GET['tiket'];}
										?>" required <?php if(isset($_GET['tiket'])) echo "readonly"?> onblur="readRecords()">
							  </div>
							</div>
							<div class="form-group">
                              <label for="tiket" class="col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" placeholder="username yang akan didaftarkan" 
            					value="<?php 
            								if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username'];
            								else {if (isset($_GET['username'])) echo $_GET['username'];}
            							?>" required <?php if(isset($_GET['username'])) echo "readonly"?>>
                              </div>
            				</div>
            				<input type="hidden" name="niplama" id="niplama" value="<?php echo $_SESSION["niplama"];?>">
            				<input type="hidden" name="namauser" id="namauser" value="<?php echo $_SESSION["nama"];?>">
            				<input type="hidden" name="email" id="email" value="<?php echo $_SESSION["email"];?>">
            				<input type="hidden" name="seksi" id="seksi" value="<?php echo $_SESSION["unitkerja_id"];?>">
							<div class="form-group">
							  <label  class="col-sm-2 control-label">Subdirektorat</label>
							   <div class="col-sm-10">
								  <select class="form-control" name="subdir" id="subdir" required>	
								  <?php 
									$bagian =substr($_SESSION['unitkerja_id'],0,3)."00";
									echo $bagian;
									$sql=mysql_query("select * from bagian where kode ='".$bagian."'");
										while($row=mysql_fetch_array($sql)){
											echo '<option value="'.$row['kode'].'">'.$row['nama'].'</option>';
										}
								?>
								  </select>
								</div>
							</div>
							
							<div class="form-group">
							  <label for="nama" class="col-sm-2 control-label">Nama Aplikasi</label>
							  <div class="col-sm-10" >
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama Aplikasi" value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['nama'] ?>" required>
							  </div>
							</div>
							<div class="form-group">
                              <label for="nama" class="col-sm-2 control-label">Tahun Aplikasi</label>
                                <div class="col-sm-10" >
                                    <select class="form-control" name="tahun" id="tahun" required>	
            					        <?php
            					        for($i=0;$i<5;$i++){
            					            echo "<option value='".(date('Y')+$i)."'>".(date('Y')+$i)."</option>";
            					        }
            					        ?>
            					    </select>                  
            				    </div>
                            </div>
							<div class="form-group">
            				 <label class="col-sm-2 control-label">Jenis Kebutuhan</label>
            				  <div class="col-sm-10" id="kebutuhan">
            				  <?php
            					$kebutuhan=mysql_query("select * from kebutuhan");
            						while($dataApp=mysql_fetch_array($kebutuhan)){
            							if($dataApp['kode']=='1') {
            							    $judul="Pembangunan aplikasi pengolahan data baru";
            							    $click="onclick='hapusPengembangan();'";
            							}
            							else if($dataApp['kode']=='2') {
            							    $judul="Pengembangan dari aplikasi pengolahan data yang sudah ada, dengan penambahan fungsi fungsi baru";
            							    $click="onclick='tampilPengembangan();'";
            							} 
            							else if($dataApp['kode']=='3') {
            							    $judul="Pembangunan aplikasi monitoring baru";
            							    $click="onclick='hapusPengembangan();'";
            							} 
            							else if($dataApp['kode']=='4') {
            							    $judul="Pengembangan dari aplikasi monitoring yang sudah ada, dengan penambahan fungsi fungsi baru";
            							    $click="onclick='tampilPengembangan();'";
            							} 
            							
            							echo "<div class='radio'><label><input type='radio' name='kebutuhan' value='".$dataApp['kode']."' $click required>".$dataApp['nama']." <span class='demo-options-callbacks glyphicon glyphicon-info-sign icon_info' title='".$judul."'></span></label></div>";
            						}
            				  ?>
            				  </div>
                            </div>
							<script>
                        	function tampilPengembangan() {
                        	    if($("#tampilPengembangan").length === 0){
                            		var stre;
                            		stre="<div id='tampilPengembangan' class=\"form-group\"><label class=\"col-sm-2 control-label\">Pengembangan dari</label><div class=\"col-sm-10\"><select class='form-control select2' name=\"pengembangan\" id=\"pengembangan\" required>";	
                					    <?php
                					    echo "stre=stre+\"<option value=''>Pilih aplikasi yang dikembangkan</option>\";";
                					    $sql_pengembangan=mysql_query("select tiket,nama,tahun from proyek");
                					    while($data_pengembangan=mysql_fetch_array($sql_pengembangan)){
                					        echo "stre=stre+\"<option value='".$data_pengembangan['tiket']."'>".$data_pengembangan['nama']." (".$data_pengembangan['tahun'].") </option>\";";
                					    }
                					    ?>
                					stre=stre+"</select></div></div>";
                            		$("#divPengembangan").append(stre);
                            		$('.select2').select2();
                        	    }

                        	}
                        	function hapusPengembangan() {
                        		$("#tampilPengembangan").remove();
                        	}
                        	</script>
                            <div id="divPengembangan"></div>
							<div class="form-group">
							 <label class="col-sm-2 control-label">Jenis Aplikasi</label>
							  <div class="col-sm-10" id="aplikasi">	 				  
								<?php
									$aplikasi=mysql_query("select * from aplikasi");
									while($dataApp=mysql_fetch_array($aplikasi)){
										echo "<label class='radio radio-inline'><input type='radio' name='aplikasi' value='".$dataApp['kode']."' required>".$dataApp['nama']."</label>";
									}
								?>
									
							  </div>
							</div>
							<div class="form-group">
							 <label class="col-sm-2 control-label">Level Pengguna Akhir</label>
							  <div class="col-sm-10" id="level">	 				
								<?php
									$level=mysql_query("select * from userlevel");
									while($dataApp=mysql_fetch_array($level)){
										if($dataApp['kode']=='4'){
											echo "<label class='radio radio-inline'><input type='radio'  name='level' value='".$dataApp['kode']."' onclick=\"tampilKet('ketLain','divLain');\" required> ".$dataApp['nama']."</label>";
										}else{
											echo "<label class='radio radio-inline'><input type='radio'  name='level' value='".$dataApp['kode']."' onclick=\"hapusKet('ketLain');\" required> ".$dataApp['nama']."</label>";
										}			
									}
								?>	
								<div id="divLain"></div>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="col-sm-2 control-label">Tujuan dan Ruang Lingkup</label>
							  <div class="col-sm-10" >
							  <textarea class="form-control" rows="3" name="tujuan" id="tujuan" placeholder="Diskripsi dari aplikasi" required><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo$_POST['tujuan'] ?></textarea>
							  </div>
							</div>
							
							<div class="form-group">
							<label class="col-sm-2 control-label">Waktu Penggunaan Sistem/Aplikasi</label>
							<div class="col-sm-5">
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" class="form-control pull-right datepicker" id="datepicker" name="waktu" onchange="getBusinessDatesCount(this.value)"
								value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['waktu'] ?> " required>
							</div>
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<span class="input-group-addon">rentang waktu</span>
									<input type="text" class="form-control" id="durasi" name="durasi" readonly required>
									<span class="input-group-addon">hari</span>
								</div>
							</div>
							<!-- /.input group -->
							</div>
						
							<!-- checkbox -->
							<div class="form-group">
							<label class="col-sm-2 control-label">Fitur</label>
							<div class="col-sm-10" id="fitur">
							<?php
							$query=mysql_query("select * from fitur");
							while($data=mysql_fetch_array($query)){
								echo "<div class='checkbox'>
									<label><input type='checkbox' value = '".$data['kode']."' name='fitur[]'> ".$data['nama']."</label>
								</div>";
							}
							?>  
							</div>
							</div>
							<div class="box-footer">               
            				    <button class="btn btn-primary nextBtn pull-right" type="button" onclick="submitForm1()"><i class='fa fa-arrow-right'></i> Next</button>
            				</div>
							</div>
                    </div>
                </div>
				<div class="row setup-content" id="step-2">
                    <div class="col-xs-12">
                        <div class="col-md-12">
							<div class="col-sm-12">
                              <div class="box box-solid">
                                <div class="box-header with-border">
                                  <i class="fa fa-book"></i>
                    
                                  <h3 class="box-title">Daftar Dokumen Kelengkapan</h3>
                                  <button class='btn btn-default' type='button' onclick="readRecords();"><span class='fa fa-refresh'></span></button>
                                  <blockquote>
                                    <small>Silahkan upload dokumen kelengkapan, jika dokumen yang telah terupload tidak muncul, silahkan tekan tombol refresh.</small>
                                  </blockquote>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
									<ul>
										<div id="listdokumen"></div>
									</ul>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div>
            				
            				<div class="form-group" id="uploaddokumen">
            				    <label class="col-sm-2 control-label">Upload Dokumen</label>
            					<div class="col-sm-4">
                                    <div class="input-group">
                						<span class="input-group-addon"><i class="fa fa-book"></i></span>
                                        <select name="tipe" id="tipe" class="form-control" >
                                            <option value =''>Pilih Jenis Dokumen</option>
											<option value ='bp'>Bisnis Proses</option>
                                            <option value ='kue'>Kuesioner Final</option>
                                            <option value ='rv'>Rule Validasi</option>
                                            <option value ='rt'>Rancangan Tabulasi</option>
                                            <option value ='dk'>Daftar Kebutuhan</option>
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
                                                    var tiket       = $("#tiket").val();
                                                    var username    = $("#username").val();
                                                    var subdir      = $("#subdir").val();
                                                    var nama        = $("#nama").val();
                                                    document.getElementById("tipe").closest(".form-group").classList.remove('has-error');
                                                    // membaca data file yg akan diupload, dari komponen 'fileku'
                                                    var file = document.getElementById("file").files[0];
                                                    var tipe = document.getElementById("tipe").value;
                                                    if(tipe=="" || tiket=="" || subdir==null || nama==""){
                                                        document.getElementById("tipe").closest(".form-group").classList.add('has-error');
                                                        if(tiket=="" || subdir==null || nama==""){
                                                            alert("Pastikan isian form halaman 1 terisi");
                                                        }
                                                    }else{
                                                        document.getElementById("tipe").closest(".form-group").classList.remove('has-error');
                                                        var formdata = new FormData();
                                                        formdata.append("datafile", file);
                                                        formdata.append("tipe", tipe);
                                                        // proses upload via AJAX disubmit ke 'upload.php'
                                                        // selama proses upload, akan menjalankan progressHandler()
                                                        if((file.size)<=(2*1024*1024)){
                                                            var ajax = new XMLHttpRequest();
                                                            ajax.upload.addEventListener("progress", progressHandler, false);
                                                            ajax.open("POST", "pages/ajax/upload.php?tiket="+tiket+"&subdir="+subdir+"&nama="+nama, true);
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
                                </div>
                                <progress id="progressBar" value="0" max="100" style="width:100%;"></progress>
                                <h3 id="status"></h3><p id="total"></p>
                            </div>
                                
            				<div class="load center" id="loadingImage" style="display: none">
                              <img src="loading.gif"/>
                            </div>
                            <div class="box-footer">
                				<button type="button" class="btn btn-success pull-right" onclick="SimpanEntri();"><i class='fa fa-save'></i> Simpan</button>             				
            				</div>
						</div>
                    </div>
                </div>
              </div>
        </form>

	</div>
	<!-- /.box -->
  </section>
  <!-- /.content -->  
</div>
<!-- /.container -->
</div>
<script>
function submitForm1(){
	var pesan="";cekFitur=0;cekKebutuhan=0;cekAplikasi=0;cekLevel=0;
	var tiket       = $("#tiket").val();
    var username    = $("#username").val();
    var subdir      = $("#subdir").val();
    var nama        = $("#nama").val();
	var tahun       = $("#tahun").val();
	var pengembangan= $("#pengembangan").val();
	var ketlain     = $("#ketLain").val();
	var tujuan      = $("#tujuan").val();
	var waktu       = $("#datepicker").val();
	var durasi      = $("#durasi").val();
	for(var i=0; i < document.getElementsByName("fitur[]").length;i++){
		if(document.getElementsByName("fitur[]")[i].checked) cekFitur++;
	} 
	for(var i=0; i < document.getElementsByName('kebutuhan').length; i++){
        if(document.getElementsByName('kebutuhan')[i].checked) cekKebutuhan=(i+1);
    }
	for(var i=0; i < document.getElementsByName('aplikasi').length; i++){
        if(document.getElementsByName('aplikasi')[i].checked) cekAplikasi=1;
    }
	for(var i=0; i < document.getElementsByName('level').length; i++){
        if(document.getElementsByName('level')[i].checked) cekLevel=(i+1);
    }
    $(".form-group").removeClass("has-error");
	if(tiket=="" || username=="" || subdir==null || nama=="" || tahun=="" || cekFitur==0 || cekKebutuhan==0 || cekAplikasi==0 || cekLevel==0 || (cekKebutuhan==2 && pengembangan=="") || (cekLevel==4 && ketlain=="") || waktu=="" || durasi=="" || fitur.length==0){
		if(tiket==""){
		    document.getElementById("tiket").closest(".form-group").classList.add('has-error');
		}if(username==""){
		    document.getElementById("username").closest(".form-group").classList.add('has-error');
		}if(subdir==null){
		    document.getElementById("subdir").closest(".form-group").classList.add('has-error');
		}if(nama==""){
		    document.getElementById("nama").closest(".form-group").classList.add('has-error');
		}if(cekKebutuhan==0){
			document.getElementById("kebutuhan").closest(".form-group").classList.add('has-error');
		}if(cekKebutuhan==2 && pengembangan==""){
		    document.getElementById("pengembangan").closest(".form-group").classList.add('has-error');
		}if(cekAplikasi==0){
			document.getElementById("aplikasi").closest(".form-group").classList.add('has-error');
		}if(cekLevel==0){
			document.getElementById("level").closest(".form-group").classList.add('has-error');
		}if(cekLevel==4 && ketlain==""){
		    document.getElementById("ketLain").closest(".form-group").classList.add('has-error');
		}if(tujuan==""){
		    pesan+="\nTujuan harus terisi";
		    document.getElementById("tujuan").closest(".form-group").classList.add('has-error');
		}if(waktu==""){
		    document.getElementById("datepicker").closest(".form-group").classList.add('has-error');
		}if(durasi==""){
		    document.getElementById("durasi").closest(".form-group").classList.add('has-error');
		}if(cekFitur==0){
        	document.getElementById("fitur").closest(".form-group").classList.add('has-error');
		}
		//return false;
	}else{
	    document.getElementById('step2').click();
		//return true;
	}
}

function SimpanEntri(){
     $(".form-group").removeClass("has-error");
   	// get values
    var tiket       = $("#tiket").val();
    var username    = $("#username").val();
    var subdir      = $("#subdir").val();
    var nama        = $("#nama").val();
	var tahun       = $("#tahun").val();
    var kebutuhan = "";
	var radios = document.getElementsByName('kebutuhan');
	for (var i = 0, panjang = radios.length; i < panjang; i++) {
		if (radios[i].checked) {
		   kebutuhan =radios[i].value;
		}
	}
	var pengembangan = $("#pengembangan").val();
	var aplikasi="";
	var radios2 = document.getElementsByName('aplikasi');
	for (var i = 0; i < radios2.length; i++) {
		if (radios2[i].checked) {
		    aplikasi=radios2[i].value;
		}
	}
	var level="";
	var radios3 = document.getElementsByName('level');
	for (var i = 0; i < radios3.length; i++) {
		if (radios3[i].checked) {
		    level=radios3[i].value;
		}
	}
	var ketlain     = $("#ketLain").val();
	var tujuan      = $("#tujuan").val();
	var waktu       = $("#datepicker").val();
	var durasi      = $("#durasi").val();
	var fitur = [];
	for(var i=0; i < document.getElementsByName("fitur[]").length;i++){
		if(document.getElementsByName("fitur[]")[i].checked) fitur.push(document.getElementsByName("fitur[]")[i].value);
	} 

	//alert(tiket+"\n"+username+"\n"+subdir+"\n"+nama+"\n"+tahun+"\n"+kebutuhan+"\n"+pengembangan+"\n"+aplikasi+"\n"+level+"\n"+tujuan+"\n"+waktu+"\n"+durasi+"\n"+fitur[0]+"\n"+dokKue+"\n");
	if(tiket=="" || username=="" || subdir=="" || nama=="" || tahun=="" || kebutuhan=="" || aplikasi=="" || level=="" || tujuan=="" || waktu=="" || durasi=="" || fitur.length==0 ){
	    alert("Semua isian harus terisi")
	}else{
	    $("#loadingImage").show();
            var myForm = document.getElementById('entri');
            formData = new FormData(myForm);
          
          //disable the default form submission
          //event.preventDefault();
         
          $.ajax({
            url: 'pages/ajax/entri.php',
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
function tampil(nama,div,ket) {
		var div="#"+div;
		var stre;
		if(nama=='dokRV'){
			stre="<div class='col-sm-4'><input type='file' class='btn btn-default' name='"+nama+"' id='"+nama+"' accept='.xls,.xlsx' required><p id='"+ket+"' class='help-block'>Upload dokumen (maksimal 2 MB)</p></div>";
		}else{
			stre="<div class='col-sm-4'><input type='file' class='btn btn-default' name='"+nama+"' id='"+nama+"' accept='.doc,.docx,.xls,.xlsx,.pdf,.jpg,.jpeg,.pdf' required><p id='"+ket+"' class='help-block'>Upload dokumen (maksimal 2 MB)</p></div>";
		}
		$(div).append(stre);	
}

function hapus(nama,ket) {
	var nama="#"+nama;
	var ket="#"+ket;
	$(nama).remove();
	$(ket).remove();
}
function tampilKet(nama,div) {
		var div="#"+div;
		var stre;
		stre="<input type='text' class='form-control' name='"+nama+"' id='"+nama+"'  placeholder='Isikan level pengguna lainnya' required>";
		$(div).append(stre);	
}
function hapusKet(nama) {
	var nama="#"+nama;
	$(nama).remove();
}
function getBusinessDatesCount(tanggal) {
	var count = 0;
	var gabung_awal=<?php echo date("m");?>+"/"+<?php echo date("d"); ?>+"/"+<?php echo date("Y"); ?>;
	var akhir=tanggal.split("/");
	var gabung_akhir=akhir[1]+"/"+akhir[0]+"/"+akhir[2];
	var startDate=new Date(gabung_awal);
	var endDate=new Date(gabung_akhir);
	var curDate = startDate;
    while (curDate <= endDate) {
        var dayOfWeek = curDate.getDay();
        if(!((dayOfWeek == 6) || (dayOfWeek == 0)))
           count++;
        curDate.setDate(curDate.getDate() + 1);
    }
	document.getElementById('durasi').value=count;
	if(count<60){
		alert("Minimum pembuatan aplikasi adalah 3 bulan/ 60 hari kerja");
	}
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
function readRecords() {
    tiket=$("#tiket").val();
    $.get("pages/ajax/dokumen_read.php?tiket="+tiket, {}, function (data, status) {
        $("#listdokumen").html(data);
    });
}
</script>
<script type="text/javascript">
$(document).ready(function(){ 
	readRecords();
	Cari();
  //Date picker
	$('.datepicker').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: new Date(Date.now() + 30*24*60*60*1000),
	});
	$('#deputi').on('change',function(){
		var kddep =$(this).val();
		if(kddep){
			$.ajax
			({
				type:'POST',
				url:'pages/ajax.php',
				data:'kddep='+kddep,
				success:function(html)
				{
					$('#direktur').html(html);
					$('#subdir').html('<option value="">Pilih Bagian/Subdir</option>');
				}
			});
		}else{
			$('#direktur').html('<option value="">Pilih Kedeputian Dahulu</option>');
			$('#subdir').html('<option value="">Pilih Bagian/Subdir Dahulu</option>');
		}

	});
	
	$('#direktur').on('change',function(){
		var dirID =$(this).val();
		if(dirID){
			$.ajax
			({
				type:'POST',
				url:'pages/ajax.php',
				data:'dirID='+dirID,
				success:function(html)
				{	
					$('#subdir').html(html);
				}
				});
		}else{
		$('#subdir').html('<option value="">Pilih Bagian/Subdir Dahulu</option>');
		}
	});
	
	$("#tiket").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

});
function Cari() {
	// get values
    var username = $("#username").val();
	$.post("pages/ajax/user_cari.php", {
            username: username
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            if(user==null) {
                alert("Username tidak ditemukan");
    			$("#subdir").val("");
            }else{
                // Assing existing values to the modal popup fields
    			var x = document.getElementById("subdir");
    			for (var i=0; i<x.length;i++){
    			    x.remove(i);
    			}
                var option = document.createElement("option");
                option.value = user.subdir_id;
                option.text = user.subdir;
                x.add(option);
                $("#niplama").val(user.niplama);
                $("#namauser").val(user.nama);
                $("#email").val(user.email);
                $("#seksi").val(user.unitkerja_id);
            }
        }
    );
   
}
</script>