<!-- Full Width Column -->
<style>
  .my-legend2 .legend-title {
    text-align: left;
    margin-bottom: 5px;
    font-weight: bold;
    font-size: 90%;
    }
  .my-legend2 .legend-scale ul {
    margin: 0;
    margin-bottom: 5px;
    padding: 0;
    float: left;
    list-style: none;
    }
  .my-legend2 .legend-scale ul li {
    font-size: 80%;
    list-style: none;
    margin-left: 0;
    line-height: 18px;
    margin-bottom: 2px;
    }
  .my-legend2 ul.legend-labels li span {
    display: block;
    float: left;
    height: 16px;
    width: 30px;
    margin-right: 5px;
    margin-left: 0;
    border: 1px solid #999;
    }
  .my-legend2 .legend-source {
    font-size: 70%;
    color: #999;
    clear: both;
    }
  .my-legend2 a {
    color: #777;
    }
	.progress-green {
    background-color: #00a65a;
}
</style>
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header)-->
  <section class="content-header">
	 <ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li class="active">Dashboard</li>
	</ol>
  </section>
 
  <!-- Main content -->
  <section class="content">
	 <?php
	  if(isset($_SESSION['tiket'])){
		  $queery=mysql_query("select p.*,b.nama as bag,a.nama as app,k.nama as kebth,u.nama as lvl from proyek p 
					left join kebutuhan k on p.kebutuhan=k.kode 
					left join bagian b on p.bagian=b.kode 
					left join aplikasi a on p.aplikasi=a.kode
					left join userlevel u on p.level=u.kode
					where p.tiket='".$_SESSION['tiket']."'
					");
			$dataa=mysql_fetch_array($queery);
			$page="edit&id=".$dataa['tiket'];
			$chat="chat&tiket=".$dataa['tiket'];
		  echo " <div class='callout callout-info'><p>
			Anda berhasil mendaftarkan tiket <b>".$_SESSION['tiket']."</b> pada sistem kami.
			Sistem/Aplikasi <b>".$dataa['nama']."</b> dijadwalkan pada ".TanggalLengkap($dataa['mulai'])." sampai dengan ".TanggalLengkap($dataa['selesai'])." (".$dataa['durasi']." hari).
			Mohon cek kepadatan kegiatan IPD saat menentukan waktu pembangunan sistem/aplikasi.</p>";
			if($dataa['alokasi']==0){
			echo"<a href='?".paramEncrypt('page='.$page.'')."' class='btn btn-warning'><i class='fa fa-edit'></i> Update</a>";
			}
			
			echo"<a href='?".paramEncrypt('page='.$chat.'')."' class='btn btn-success'><i class='fa fa-phone'></i> Hubungi Admin</a>
			</div>";
	  }
	  ?>
	   
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Progres Proyek IPD</h3>
	  </div>
	<div class="box-body">
	<script src="plugins/dhtmlxgantt/dhtmlxgantt.js"></script>
	<link href="plugins/dhtmlxgantt/dhtmlxgantt.css" rel="stylesheet">
	<script src="plugins/dhtmlxgantt/ext/dhtmlxgantt_tooltip.js"></script>
	
	<label class="radio-inline">Pilih Tampilan :</label>
	<label class="radio-inline"><input type="radio" id="scale1" name="scale" value="1" />Quarter</label>
	<label class="radio-inline"><input type="radio" id="scale4" name="scale" value="4" checked />Bulanan</label>
	<label class="radio-inline"><input type="radio" id="scale2" name="scale" value="2" />Mingguan</label>
	<label class="radio-inline"><input type="radio" id="scale3" name="scale" value="3" />Harian</label><br><br>
	<div id="gantt_here" style='width:100%; height:500px;'></div>
	<div class='my-legend2 col-md-12 col-sm-12'>
		<div class='legend-title'>Keterangan</div>
		<div class='legend-scale'>
		  <ul class='legend-labels'>										
			<li><span style='background:#FB8072;'></span>Sudah Terkonfirmasi</li>
			<li><span style='background:#8DD3C7;'></span>Progres Pengerjaan</li>
			<li><span style='background:#c2c4c3;'></span>Belum Terkonfirmasi</li>
		  </ul>
		 
		</div>
	</div>
	
	<script type="text/javascript">
		function setScaleConfig(value){
			switch (value) {
				case "1":
					function quarterLabel(date){
						var month = date.getMonth();
						var q_num;
					 
						if(month >= 9){ 
							q_num = 4;
						}else if(month >= 6){
							q_num = 3;
						}else if(month >= 3){
							q_num = 2;
						}else{
							q_num = 1;
						}
						return "Q" + q_num;
					}
				
					gantt.config.scale_unit = "year";
					gantt.config.step = 1;
					gantt.config.date_scale = "%Y";
					gantt.config.subscales = [
						{unit:"quarter", step:1, template:quarterLabel}
					];
					gantt.config.scale_height = 50;
					gantt.templates.date_scale = null;
					break;
				case "2":
					var weekScaleTemplate = function(date){
						var dateToStr = gantt.date.date_to_str("%d");
						var weekNum = gantt.date.date_to_str("(week %W)");
						var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
						return dateToStr(date) + "-" + dateToStr(endDate) + " ";// + weekNum(date);
					};
					gantt.config.scale_unit = "month";
					gantt.config.date_scale = "%F %Y ";
					gantt.config.step = 1;
					gantt.templates.date_scale = null;
					gantt.config.subscales = [
						{unit:"week", step:1, template:weekScaleTemplate}
					];
					gantt.config.scale_height = 50;
					break;
				case "3":
					gantt.config.scale_unit = "month";
					gantt.config.date_scale = "%F, %Y";
					gantt.config.step = 1;
					gantt.config.subscales = [
						{unit:"day", step:1, date:"%j, %D" }
					];
					gantt.config.scale_height = 50;
					gantt.templates.date_scale = null;
					break;
				case "4":
					gantt.config.scale_unit = "year";
					gantt.config.step = 1;
					gantt.config.date_scale = "%Y";
					gantt.config.min_column_width = 50;

					gantt.config.scale_height = 50;
					gantt.templates.date_scale = null;

					
					gantt.config.subscales = [
						{unit:"month", step:1, date:"%M" }
					];
					gantt.ignore_time = function(date){
					   if(date.getDay() == 0 || date.getDay() == 6)
						  return true;
					  return false;
					};
					break;
			}
		}

	setScaleConfig('4');
        var tasks =  {
            data:[
			<?php
			$query_dev=mysql_query("select * from developer");
			while($data_dev=mysql_fetch_array($query_dev)){
				$developer[]=$data_dev;
			}
			$query=mysql_query("select p.*,d.nama as nama_dev from proyek p left join developer d on d.nip=p.developer where approve<>2 and status <> 4 order by tgl_entri ASC");
			
			while($data=mysql_fetch_array($query)){
				$tanggal=explode("-",$data['mulai']);
				$awal=$tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
				if($data['approve']=='1')$warna='#FB8072'; else  $warna='#c2c4c3';
				if($_SESSION['level']==3 || $_SESSION['level']==9){
				    echo "{id:'".$data['tiket']."', text:'".$data['nama']."', start_date:'".$awal."', duration:".$data['durasi'].",
                    progress:".($data['progres']/100).", parent:".$data['parent'].", color:'$warna', progressColor:'#8DD3C7'}, ";
				}else{
				    echo "{id:'".$data['tiket']."', text:'".$data['nama']."', start_date:'".$awal."', duration:".$data['durasi'].",
                    progress:".($data['progres']/100).", users: '".NickName($data['nama_dev'])."',parent:".$data['parent'].", color:'$warna', progressColor:'#8DD3C7'}, ";
				}
				
				//fitur
				$query_sub=mysql_query("select s.*,f.nama as nama,d.nama as develop from subproyek s 
											left join fitur f on f.kode=s.fitur 
											left join developer d on d.nip=s.developer 
											where tiket='".$data['tiket']."'");
				while($data_sub=mysql_fetch_array($query_sub)){
					if($data_sub['developer']!='')$warna='#FB8072'; else  $warna='#c2c4c3';
					$tanggal=explode("-",$data_sub['mulai']);
					$awal=$tanggal[2]."-".$tanggal[1]."-".$tanggal[0];
					$dev=explode(" ",$data_sub['developer']);
					$namadepeloper="";
					for($i=0;$i<count($dev);$i++){
						foreach($developer as $develop){
							if($develop['nip']==$dev[$i]){
								$namadepeloper.= NickName($develop['nama']).", ";
							}
						}
					$namadepeloper2=substr($namadepeloper,0,-2);					
					}
					if(strlen($data_sub['fitur'])<3){
					    echo "{id:'".$data_sub['tiket'].$data_sub['fitur']."', text:'".$data_sub['nama']."', start_date:'".$awal."', duration:".$data_sub['durasi'].",
                        progress:".($data_sub['progres']/100).", users: '".$namadepeloper2."',parent:".$data_sub['parent'].", color:'$warna', progressColor:'#8DD3C7'}, ";
					}
					else{
					    					    $namasub=explode("_",$data_sub['fitur']);
					    echo "{id:'".$data_sub['tiket'].$data_sub['fitur']."', text:'".$namasub[1]."', start_date:'".$awal."', duration:".$data_sub['durasi'].",
                        progress:".($data_sub['progres']/100).", users: '".$namadepeloper2."',parent:".$data_sub['parent'].", color:'$warna', progressColor:'#8DD3C7'}, ";
					}
					
				}
			}
			?>
			],
                   
        };
		gantt.templates.tooltip_text = function(start,end,task){
		    <?php
		    if($_SESSION['level']==3 || $_SESSION['level']==9){
		    ?>
			return "<b>Nama:</b> "+task.text+"<br/><b>Durasi:</b> " + task.duration+" hari<br/><b>Progres:</b> " + task.progress*100 + "%";
		    <?php } else{ ?>
		    return "<b>Nama:</b> "+task.text+"<br/><b>Durasi:</b> " + task.duration+" hari<br/><b>Developer:</b> " + task.users +"<br/><b>Progres:</b> " + task.progress*100 + "%";
		    <?php } ?>
		    };
		
		gantt.config.date_grid = "%d %F %Y";
		gantt.config.work_time = true;
		gantt.templates.task_cell_class = function(task, date){
			if(!gantt.isWorkTime(date))
				return "week_end";
			return "";
		};
		
		gantt.config.readonly = true;
		gantt.config.columns = [
			{name:"text",       label:"Nama",  width:"*", tree:true },
			//{name:"start_date", label:"Mulai", width:"*", align: "center" },
			{name:"duration",   label:"Durasi (hari)",   align: "center" }
		];
		<?php if($_SESSION['level']!='3' && $_SESSION['level']!='9') {?>
		gantt.templates.rightside_text = function(start, end, task){
			return "<b>Developer: </b>" + task.users;
		};
		<?php } ?>
		gantt.init("gantt_here");
		gantt.parse(tasks);
		//gantt.load("data.php");
		var func = function(e) {
			e = e || window.event;
			var el = e.target || e.srcElement;
			var value = el.value;
			setScaleConfig(value);
			gantt.render();
		};

		var els = document.getElementsByName("scale");
		for (var i = 0; i < els.length; i++) {
			els[i].onclick = func;
		}
	</script>  
	 
	</div>
	<!-- /.box-body -->
	</div>
	
	
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Beban Developer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  
  </section>
  <!-- /.content -->
</div>
<!-- /.container -->
</div>
<script>
$(document).ready(function() {
	$('#tabel').DataTable( {
		scrollX:        true,
		scrollCollapse: true,
		scrollY:        250,
		ordering: 		true,
		paging:         false,
		searching: 		false,
		
		columnDefs: [
			{ width: '250', targets: 1 },
			{ width: '200', targets: 0 },
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
