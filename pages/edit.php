<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Permintaan</a></li>
	  <li class="active">Edit Permintaan</li>
	</ol>
  </section>
 
  <!-- Main content -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css"/>
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
		<h3 class="box-title">Ubah Formulir Kebutuhan Pembangunan dan Pengembangan Aplikasi</h3><div id="result"></div>
	  </div>
		<?php
			$query_data=mysql_query("select p.*,b.nama as subdir from proyek p left join bagian b on b.kode=p.bagian where tiket='".$var['id']."'");
			$data_edit=mysql_fetch_array($query_data);
		?>
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
		<form name="entri" id="entri"  enctype="multipart/form-data" action="?<?php $page="edit&id=".$data_edit['tiket']; echo paramEncrypt('page='.$page.''); ?>" class="form-horizontal"  method="post" onsubmit="return submitForm()">
              <div class="box-body">
                  <div class="row setup-content" id="step-1">
                     <div class="col-xs-12">
                         <div class="col-md-12">
            				<div class="form-group">
                              <label for="tiket" class="col-sm-2 control-label">ID Tiket</label>
                              <div class="col-sm-10" >
                                <input type="text" class="form-control" id="tiket" name="tiket" placeholder="ID Tiket" 
            					value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['tiket']; else echo $var['id']; ?>" readonly>
                              </div>
            				</div>
            				
            				
            				<div class="form-group">
                              <label  class="col-sm-2 control-label">Subdirektorat</label>
                               <div class="col-sm-10">
            					 <input type="text" class="form-control" id="nama_subdir" name="nama_subdir" placeholder="Isikan Nama Aplikasi" 
            						value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['subdir']; else echo $data_edit['subdir'];?>" readonly required>
            					<input type="hidden" id="subdir" name="subdir" value="<?php echo $data_edit['bagian'];?>" readonly required>
            					</div>
                            </div>
            				
                            <div class="form-group">
                              <label for="nama" class="col-sm-2 control-label">Nama Aplikasi</label>
                              <div class="col-sm-10" >
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama Aplikasi" 
            					value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['nama']; else echo $data_edit['nama'] ?>" required>
                              </div>
                            </div>
            				<div class="form-group">
                              <label for="nama" class="col-sm-2 control-label">Tahun Aplikasi</label>
                                <div class="col-sm-10" >
                                    <select class="form-control" name="tahun" id="tahun" required>	
            					        <?php
            					        for($i=0;$i<5;$i++){
            					            if($data_edit['tahun']==(date('Y')+$i)){
            					                $selected="selected";
            					            }else $selected="";
            					            echo "<option value='".(date('Y')+$i)."' $selected>".(date('Y')+$i)."</option>";
            					        }
            					        ?>
            					    </select>                  
            				    </div>
                            </div>
            				<div class="form-group">
            				 <label class="col-sm-2 control-label">Jenis Kebutuhan</label>
            				 <div class="col-sm-10" id="kebutuhan">
            				     <script>
        				            $(document).ready(function() {
        				                <?php if($data_edit['kebutuhan']=='2')
        				                    echo "tampilPengembangan();";
        				                ?>
                                    });
                                    function tampilPengembangan() {
                                	    if($("#tampilPengembangan").length === 0){
                                    		var stre;
                                    		stre="<div id='tampilPengembangan' class=\"form-group\"><label class=\"col-sm-2 control-label\">Pengembangan dari</label><div class=\"col-sm-10\"><select class='form-control select2' name=\"pengembangan\" id=\"pengembangan\" required>";	
                        					    <?php
                        					    echo "stre=stre+\"<option value=''>Pilih aplikasi yang dikembangkan</option>\";";
                        					    $sql_pengembangan=mysql_query("select tiket,nama,tahun from proyek");
                        					    while($data_pengembangan=mysql_fetch_array($sql_pengembangan)){
                        					        if($data_pengembangan['tiket']==$data_edit['pengembangan']){
                        					            echo "stre=stre+\"<option value='".$data_pengembangan['tiket']."' selected>".$data_pengembangan['nama']." (".$data_pengembangan['tahun'].") </option>\";";
                        					        }else{
                        					            echo "stre=stre+\"<option value='".$data_pengembangan['tiket']."'>".$data_pengembangan['nama']." (".$data_pengembangan['tahun'].") </option>\";";    
                        					        }
                        					        
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
            							if($dataApp['kode']=='3') {
            							    $judul="Pembangunan aplikasi monitoring baru";
            							    $click="onclick='hapusPengembangan();'";
            							}
            							else if($dataApp['kode']=='4') {
            							    $judul="Pengembangan dari aplikasi monitoring yang sudah ada, dengan penambahan fungsi fungsi baru";
            							    $click="onclick='tampilPengembangan();'";
            							} 
            							if($dataApp['kode']==$data_edit['kebutuhan']){
            								echo "<div class='radio'><label><input type='radio' name='kebutuhan' value='".$dataApp['kode']."' $click required checked>".$dataApp['nama']." <span class='demo-options-callbacks glyphicon glyphicon-info-sign icon_info' title='".$judul."'></span></label></div>";
            							}else{
            								echo "<div class='radio'><label><input type='radio' name='kebutuhan' value='".$dataApp['kode']."' $click required>".$dataApp['nama']." <span class='demo-options-callbacks glyphicon glyphicon-info-sign icon_info' title='".$judul."'></span></label></div>";
            							}
            						}
            				  ?>
            				  </div>
                            </div>
                            <div id="divPengembangan"></div>
            				<div class="form-group" id="aplikasi">
            				 <label class="col-sm-2 control-label">Jenis Aplikasi</label>
            				  <div class="col-sm-10">	 				  
            					<?php
            						$aplikasi=mysql_query("select * from aplikasi");
            						while($dataApp=mysql_fetch_array($aplikasi)){
            							if($dataApp['kode']==$data_edit['aplikasi'])
            								echo "<label class='radio radio-inline'><input type='radio' name='aplikasi' value='".$dataApp['kode']."' checked>".$dataApp['nama']."</label>";
            							else
            								echo "<label class='radio radio-inline'><input type='radio' name='aplikasi' value='".$dataApp['kode']."'>".$dataApp['nama']."</label>";
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
            							if($dataApp['kode']==$data_edit['level']){
            								if($dataApp['kode']=='4'){
            									echo "<label class='radio radio-inline'><input type='radio'  name='level' value='".$dataApp['kode']."' onclick=\"tampilKet('ketLain','divLain');\" checked> ".$dataApp['nama']."</label>";
            								}else{
            									echo "<label class='radio radio-inline'><input type='radio'  name='level' value='".$dataApp['kode']."' onclick=\"hapusKet('ketLain');\" checked> ".$dataApp['nama']."</label>";
            								}
            							}else{
            								if($dataApp['kode']=='4'){
            									echo "<label class='radio radio-inline'><input type='radio'  name='level' value='".$dataApp['kode']."' onclick=\"tampilKet('ketLain','divLain');\"> ".$dataApp['nama']."</label>";
            								}else{
            									echo "<label class='radio radio-inline'><input type='radio'  name='level' value='".$dataApp['kode']."' onclick=\"hapusKet('ketLain');\"> ".$dataApp['nama']."</label>";
            								}
            							}					
            						}
            					?>	
            					<div id="divLain">
            					<?php
            					if($data_edit['level']=='4'){
            						echo "<input type='text' class='form-control' name='ketLain' id='ketLain'  value='".$data_edit['ketlain']."' required>";
            					}
            					?>
            					</div>
            				  </div>
                            </div>
            				<?php
            				function Waktu($awal,$akhir){
            					$tanggal1=explode("-",$awal);
            					$tanggal2=explode("-",$akhir);
            					$mulai=$tanggal1[2]."//".$tanggal1[1]."//".$tanggal1[0];
            					$selesai=$tanggal2[2]."//".$tanggal2[1]."//".$tanggal2[0];
            					$tanggal=$mulai." - ".$selesai;
            					return $tanggal;
            				}
            				function konfWaktu($awal,$akhir){
            					$tanggal=explode("-",$akhir);
            					$mulai=$tanggal[2]."/".$tanggal[1]."/".$tanggal[0];
            					$tanggal=$mulai;
            					return $tanggal;
            				}
            				?>
            				<div class="form-group">
                              <label class="col-sm-2 control-label">Tujuan dan Ruang Lingkup</label>
                              <div class="col-sm-10" >
            				  <textarea class="form-control" rows="3" id="tujuan" name="tujuan" placeholder="Diskripsi dari aplikasi" required><?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['tujuan']; else echo $data_edit['tujuan']  ?></textarea>
            				  </div>
                            </div>
            				<!-- Date range -->
            				<div class="form-group">
            				<label class="col-sm-2 control-label">Waktu Penggunaan Sistem/Aplikasi</label>
            				<div class="col-sm-7">
            				<div class="input-group">
            				  <div class="input-group-addon">
            					<i class="fa fa-calendar"></i>
            				  </div>
            				  <input type="text" class="form-control pull-right datepicker" id="datepicker" name="waktu" onchange="getBusinessDatesCount(this.value)"
            					value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['waktu']; else echo konfWaktu($data_edit['mulai'],$data_edit['selesai'])?>">
            				</div>
            				</div>
            				<div class="col-sm-3">
            					<div class="input-group">
            						<input type="text" class="form-control" id="durasi" name="durasi" placeholder="Isikan Nama Proyek Sensus/Survei" 
            							value="<?php if ($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['durasi']; else echo $data_edit['durasi']?>" readonly>
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
            					$sql_cari=mysql_query("select * from subproyek where tiket='".$data_edit['tiket']."' and fitur='".$data['kode']."'");
            					$jml=mysql_num_rows($sql_cari);
            					if($jml==1){
            					echo "<div class='checkbox'>
            						<label><input type='checkbox' value = '".$data['kode']."' name='fitur[]' checked> ".$data['nama']."</label>
            					</div>";
            					}
            					else{
            					echo "<div class='checkbox'>
            						<label><input type='checkbox' value = '".$data['kode']."' name='fitur[]'> ".$data['nama']."</label>
            					</div>";
            					}
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
            url: 'pages/ajax/entri_edit.php',
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function (returndata) {
              var pesan=returndata.split("#");
              if(pesan[0]=="Berhasil mengubah permintaan"){
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
		stre="<div class='col-sm-4'><input type='file' class='btn btn-default' name='"+nama+"' id='"+nama+"' accept='.doc,.docx,.xls,.xlsx,.pdf,.jpg,.jpeg' required><p id='"+ket+"' class='help-block'>Upload dokumen (maksimal 2 MB)</p></div>";
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
/* function getBusinessDatesCount(tanggal) {
	var count = 0;
	var pisah=tanggal.split(" - ");
	var awal=pisah[0].split("/");
	var gabung_awal=awal[1]+"/"+awal[0]+"/"+awal[2];
	var akhir=pisah[1].split("/");
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
} */
function getBusinessDatesCount(tanggal) {
	var count = 0;
	var pisah="<?php echo $data_edit['mulai']; ?>";
	var awal=pisah.split("-");
	var gabung_awal=awal[1]+"/"+awal[2]+"/"+awal[0];
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
readRecords();
$(document).ready(function(){  
  //Date picker
	$('.datepicker').datepicker({
		dateFormat: 'dd/mm/yy',
		minDate: new Date(Date.now() + 30*24*60*60*1000),
	});

});



</script>