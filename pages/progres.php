<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
<!-- bootstrap slider -->
<link rel="stylesheet" href="plugins/bootstrap-slider/slider.css">
<link rel="stylesheet" href="plugins/treegrid/jquery.treegrid.css">

<style type='text/css'>
#ex1Slider .slider-selection {
	background: #00c0ef;
}
</style>
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Entri</a></li>
	  <li class="active">Progres</li>
	</ol>
  </section>
  <!-- Main content -->
  <section class="content">
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Progres Aplikasi</h3><div id="result"></div>
	  </div>
		<div class="box-body">

<table  class="tree table table-hover table-bordered">
  <thead>
  <tr>
	<th>Nama Aplikasi</th>
    <th>Progres</th>
    <th>Aksi</th>
  </tr>
  </thead>
  <tbody>
  <?php
	$i=1;
		$query=mysql_query("select s.*,f.nama as namasub,p.nama as nama,p.bagian as bagian from subproyek s left join fitur f on f.kode=s.fitur left join proyek p on p.tiket=s.tiket where s.developer like '%".$_SESSION['niplama']."%' ORDER BY s.tiket,s.fitur ASC");
							//left join proyek p on p.tiket=s.tiket where s.developer='53313'");
		$cek='';
		while($level=mysql_fetch_array($query)){
			if($cek!=$level['tiket']){
				echo "<tr class='treegrid-".$level['tiket']."'>
					<td>[".$level['tiket']."] ".$level['nama']."</td>";
				echo "<td>     
							<div id='persen".$level['tiket']."'>
							
							</td>";
				echo"<td></td>
					</tr>";
				echo "<tr class='treegrid-".$level['tiket'].$level['fitur']." treegrid-parent-".$level['tiket']."' >
					<td>".$level['namasub']."</td>
					<td><input id='ex$i' data-slider-id='ex1Slider' type='text' data-slider-min='0' data-slider-max='100' data-slider-step='10' data-slider-value='".$level['progres']."'/>
						<span id='ex".$i."CurrentSliderValLabel'>Progres: 
						<span id='ex".$i."SliderVal'>".$level['progres']."</span></span>
						<input type='hidden' id='tiket".$i."' value='".$level['tiket']."'>
						<input type='hidden' id='fitur".$i."' value='".$level['fitur']."'>
					</td>
					<td><button type='button' class='btn btn-primary' onclick='addRecord(".$i.")'>Simpan</button></td>
					</tr>";
			}else{
			    if(strlen($level['fitur'])>3){
				    $namasubfitur=explode("_",$level['fitur']);
				    $level['namasub']=$namasubfitur[1];
				    $level['fitur']=str_replace(" ","--", $level['fitur']);
				    $parent=$level['tiket'].$namasubfitur[0];
			    }
			    else{
			        $parent=$level['tiket'];
			    }
				echo "<tr class='treegrid-".$level['tiket'].$level['fitur']." treegrid-parent-".$parent."' >
				<td>".$level['namasub']."</td>
				<td><input id='ex$i' data-slider-id='ex1Slider' type='text' data-slider-min='0' data-slider-max='100' data-slider-step='10' data-slider-value='".$level['progres']."'/>
					<span id='ex".$i."CurrentSliderValLabel'>Progres: 
					<span id='ex".$i."SliderVal'>".$level['progres']."</span></span>
					<input type='hidden' id='tiket".$i."' value='".$level['tiket']."'>
					<input type='hidden' id='fitur".$i."' value='".$level['fitur']."'>
				</td>
					<td><button type='button' class='btn btn-primary' onclick='addRecord(".$i.")'>Simpan</button></td>
				</tr>";
			}
			$cek=$level['tiket'];
			$i++;
		}
  ?>
  </tbody>  
</table>


<div class="box-body"><div class="row margin"><div class="col-sm-6">
</div></div></div>
		</div>
	</div>
	<!-- /.box -->
  </section>
  <!-- /.content -->  
</div>
<!-- /.container -->
</div>
<!-- Bootstrap slider -->
<script src="plugins/bootstrap-slider/bootstrap-slider.js"></script>
<script>
<?php
	for($j=1;$j<$i;$j++){
		$id="'#ex".$j."'";
		$id2="'#ex".$j."SliderVal'";
		echo "
		$($id).slider({
			formatter: function(value) {
				return 'Progres: ' + value;
			}
		});
		$($id).on('slide',function(slideEvt) {
			$($id2).text(slideEvt.value);
		});
	";
	}	
?>
function addRecord(id){
 var nilai="#ex"+id+"SliderVal";
 var tiket="#tiket"+id;
 var fitur="#fitur"+id;
 var persen="#persen"+$(tiket).val();

 $.ajax({
    type: "POST",
    url: "pages/ajaxprogres.php",
    data: "nilai="+$(nilai).text()+"&tiket="+$(tiket).val()+"&fitur="+$(fitur).val() ,
    cache: false,
    success: function(response){
    //check if what response is
    //alert( response );
	$(persen).html(response);
	} 
  });
}
function readRecords() {
    $.get("pages/ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
</script>
<script type="text/javascript" src="plugins/treegrid/jquery.treegrid.js"></script>
<script type="text/javascript" src="plugins/treegrid/jquery.treegrid.bootstrap3.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tree').treegrid({
			'initialState': 'collapsed',
		});		
	<?php		
    for($j=1;$j<$i;$j++){
		echo "addRecord(".$j.");";
	}
	?>
	});
</script>