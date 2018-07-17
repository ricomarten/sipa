<style>
table {
    width: 100%;
    display:block;

    height: 700px;
    display: inline-block;
    width: 100%;
    overflow: auto;
}
</style>
<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Manajemen User </a></li>
	  <li class="active">User</li>
	</ol>
  </section>
  <!-- Main content -->
  <section class="content">
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Daftar User</h3><div id="result"></div>
	  </div>
		<div class="box-body">
		
			<div class="pull-right">
				<button class="btn btn-success" data-toggle="modal" data-target="#tambah_dev">Tambah User</button>
				<br/>
				<br/>
			</div>
			<input type="text" id="myInput" onkeyup="Searching()" placeholder="Search for names.." title="Type in a name">
			<table id="user" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th><center>NIP</center></th>
						<th width='20%'><center>Nama</center></th>    
						<th width='20%'><center>Email</center></th>
						<th width='20%'><center>Level</center></th>
						<th width='20%'><center>Satuan Kerja</center></th>
						<th width='20%'><center>Aksi</center></th>
					</tr>
				</thead>
				<tbody class="records_content">
									
				</tbody>
			</table>
        </div>
	</div>
	<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="tambah_dev" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
            </div>
            <div class="modal-body">
            
            <form name="modul" action="?<?php echo paramEncrypt('page=user'); ?>" class="form-horizontal"  method="post" >
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
					
                  <div class="col-sm-4">       
					<input type="text" class="form-control" id="username" name="username" required>			  
                  </div>
                  <div class="col-sm-4">
                  <button type="button" class="btn btn-primary" onclick="Cari()">Cari</button>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">NIP</label>
					
                  <div class="col-sm-4">       
					<input type="text" class="form-control" id="nip" name="nip" required>			  
                  </div>
                </div>
				<div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" required>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
					
                  <div class="col-sm-6">       
					<input type="text" class="form-control" id="email" name="email" required>			  
                  </div>
                </div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Level User</label>
					<div class="col-sm-10">
					<?php
					$query=mysql_query("select * from level where kode<>'2'");
					$i=1;
					while($data=mysql_fetch_array($query)){
						echo "<div class='radio'>
							<label><input type='radio' value ='".$data['kode']."' id='level".$i."' name='level'> ".$data['nama']."</label>
						</div>";
						$i++;
					}
					?>  
					</div>
                </div>
				<div class="form-group">
                   <div class="col-sm-10">
					  <input type="hidden" class="form-control" name="seksi" id="seksi" required>
					</div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Unit Kerja</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="unitkerja" name="unitkerja" required>
                  </div>
                </div>
            </div>
			</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal - Update -->
<div class="modal fade" id="update_dev" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update User</h4>
            </div>
            <div class="modal-body">

            <form name="modul" action="?<?php echo paramEncrypt('page=developer'); ?>" class="form-horizontal"  method="post" >
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
					
                  <div class="col-sm-4">       
					<input type="text" class="form-control" id="u_username" name="u_username" readonly required>			  
                  </div>

                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">NIP</label>
					
                  <div class="col-sm-4">       
					<input type="text" class="form-control" id="u_nip" name="u_nip" readonly required>			  
                  </div>
                </div>
				<div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="u_nama" name="u_nama" readonly required>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
					
                  <div class="col-sm-6">       
					<input type="text" class="form-control" id="u_email" name="u_email" readonly required>			  
                  </div>
                </div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Level User</label>
					<div class="col-sm-10">
					<?php
					$query=mysql_query("select * from level where kode<>'2'");
					$i=1;
					while($data=mysql_fetch_array($query)){
						echo "<div class='radio'>
							<label><input type='radio' value ='".$data['kode']."' id='u_level".$i."' name='u_level'> ".$data['nama']."</label>
						</div>";
						$i++;
					}
					?>  
					</div>
                </div>
				<div class="form-group">
                   <div class="col-sm-10">
					  <input type="hidden" class="form-control" name="u_email" id="u_seksi" readonly required>
					</div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Unit Kerja</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="u_unitkerja" name="u_unitkerja" readonly required>
                  </div>
                </div>
            </div>
			</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateDetails()">Simpan</button>
            </div>
        </div>
    </div>
</div>

	<!-- /.box -->
  </section>
  <!-- /.content -->  
</div>
<!-- /.container -->
</div>
<script>
$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
	$("#nip").keydown(function (e) {
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
					$('#seksi').html('<option value="">Pilih Subbagian/Seksi</option>');
				}
				});
		}else{
		$('#subdir').html('<option value="">Pilih Bagian/Subdir Dahulu</option>');
		}
	});
	
	$('#subdir').on('change',function(){
		var subdirID =$(this).val();
		if(subdirID){
			$.ajax
			({
				type:'POST',
				url:'pages/ajax.php',
				data:'subdirID='+subdirID,
				success:function(html)
				{	
					$('#seksi').html(html);
				}
				});
		}else{
		$('#seksi').html('<option value="">Pilih Subbgian/Seksi Dahulu</option>');
		}
	});

});
//searching
function Searching() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("user");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
// READ records
function readRecords() {
    $.get("pages/ajax/user_read.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

// Add Record
function addRecord() {
	// get values
    var nip = $("#nip").val();
    var nama = $("#nama").val();
    var username = $("#username").val();
    var email = $("#email").val();
	var booking_email = $("#email").val();
    var bagian = $("#seksi").val();
    var level = "";
	var radios = document.getElementsByName('level');
	for (var i = 0, length = radios.length; i < length; i++) {
		if (radios[i].checked) {
			var level=radios[i].value;
		}
	}
	if(nip=='' || nama=='' || username=='' || email=='' || bagian=='' || level==''){
		alert("semua isian harus terisi");
	}else{
		if( /(.+)@(.+){2,}\.(.+){2,}/.test(booking_email) ){
			// valid email
			
			// Add record
			$.post("pages/ajax/user_add.php", {
			nip: nip,
			nama: nama,
			username: username,
			email: email,
			level: level,
			bagian: bagian
		}, function (data, status) {
		    alert(data);
			// close the popup
			$("#tambah_dev").modal("hide");

			// read records again
			readRecords();

			// clear fields from the popup
			$("#username").val("");
			$("#nip").val("");
			$("#nama").val("");
			$("#email").val("");
			$("#level").val("");
			$("#seksi").val("");
			$("#unitkerja").val("");
			
		});
		} else {
			alert("Format email salah");
		}    
	}
}
// Add Record
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
                $("#nip").val("");
    			$("#nama").val("");
    			$("#email").val("");
    			$("#seksi").val("");
    			$("#unitkerja").val("");
            }else{
                // Assing existing values to the modal popup fields
    			$("#nip").val(user.niplama);
    			$("#nama").val(user.nama);
    			$("#email").val(user.email);
    			$("#seksi").val(user.unitkerja_id);
    			$("#unitkerja").val(user.unitkerja);
            }
            
        }
    );
   
}
function Delete(id,nama) {
    var conf = confirm("Apakah yakin akan menghapus user "+nama+"?");
    if (conf == true) {
        $.post("pages/ajax/user_delete.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}
function GetDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#u_nip").val(id);
    $.post("pages/ajax/user_readDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#u_username").val(user.username);
            $("#u_nip").val(user.nip);
            $("#u_nama").val(user.nama);
            $("#u_email").val(user.email);
			$("#u_unitkerja").val(user.nama_bagian);
        }
    );
    // Open modal popup
    $("#update_dev").modal("show");
	
}
function UpdateDetails() {
    // get values
    var nip = $("#u_nip").val();
    var nama = $("#u_nama").val();
    var username = $("#u_username").val();
    var email = $("#u_email").val();
	var level = "";
	var radios = document.getElementsByName('u_level');
	for (var i = 0, length = radios.length; i < length; i++) {
		if (radios[i].checked) {
			var level=radios[i].value;
		}
	}
    if(nip=='' || nama=='' || username=='' || email=='' || level==''){
		alert("semua isian harus terisi");
	}else{
        // Update the details by requesting to the server using ajax
        $.post("pages/ajax/user_updateDetails.php", {
                nip: nip,
    			nama: nama,
    			username: username,
    			email: email,
    			level: level
            },
            function (data, status) {
                // hide modal popup
                alert(data);
                $("#update_dev").modal("hide");
                // reload Users by using readRecords();
                readRecords();
            }
        );
	}
}

</script>