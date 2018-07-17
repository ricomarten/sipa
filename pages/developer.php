<style>
table{
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
	  <li><a href="#">Manajemen User</a></li>
	  <li class="active">Developer</li>
	</ol>
  </section>
  <!-- Main content -->
  <section class="content">
	<div class="box box-primary">
	  <div class="box-header with-border">
		<h3 class="box-title">Daftar Developer IPD</h3><div id="result"></div>
	  </div>
		<div class="box-body">
		
			<div class="pull-right">
				<button class="btn btn-success" data-toggle="modal" data-target="#tambah_dev">Tambah Developer</button>
				<br/>
				<br/>
			</div>
			<input type="text" id="myInput" onkeyup="Searching()" placeholder="Search for names.." title="Type in a name">
			<table id="developer" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width='20%'><center>NIP</center></th>
						<th width='20%'><center>Nama</center></th>    
						<th width='20%'><center>Kemampuan Pemrograman</center></th>
						<th width='20%'><center>Maksimal Beban Proyek</center></th>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Developer</h4>
            </div>
            <div class="modal-body">

            <form name="modul" action="?<?php echo paramEncrypt('page=developer'); ?>" class="form-horizontal"  method="post" >
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
                  <label for="nama" class="col-sm-2 control-label">NIP</label>
					
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
					<label class="col-sm-2 control-label">Kemampuan Pemrograman</label>
					<div class="col-sm-10">
					<?php
					$query=mysql_query("select * from program");
					$i=1;
					while($data=mysql_fetch_array($query)){
						echo "<div class='checkbox'>
							<label><input type='checkbox' value ='".$data['kode']."' id='expert".$i."' name='expert[]'> ".$data['nama']."</label>
						</div>";
						$i++;
					}
					?>  
					</div>
                </div>
                <!-- hidden -->
                <input type="hidden" class="form-control" name="seksi" id="seksi" required>
                <input type="hidden" class="form-control" id="email" name="email" required>
                <input type="hidden" class="form-control" id="unitkerja" name="unitkerja" required>
				<div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Beban Proyek</label>
					
                  <div class="col-sm-4">       
					<input type="text" class="form-control" id="beban" name="beban" required>			  
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
                <h4 class="modal-title" id="myModalLabel">Update Developer</h4>
            </div>
            <div class="modal-body">

            <form name="modul" action="?<?php echo paramEncrypt('page=developer'); ?>" class="form-horizontal"  method="post" >
            <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">NIP</label>
					
                  <div class="col-sm-4">       
					<input type="text" class="form-control" id="u_nip" name="u_nip" readonly required>			  
                  </div>
                </div>
				<div class="form-group">
                  <label  class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="u_nama" name="u_nama" required>
                  </div>
                </div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Kemampuan Pemrograman</label>
					<div class="col-sm-10">
					<?php
					$i=1;
					$query=mysql_query("select * from program");
					while($data=mysql_fetch_array($query)){
						echo "<div class='checkbox'>
							<label><input type='checkbox' value = '".$data['kode']."' id='u_expert".$i."' name='u_expert[]'> ".$data['nama']."</label>
						</div>";
						$i++;
					}
					?>  
					</div>
                </div>
				<div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Beban Proyek</label>
					
                  <div class="col-sm-4">       
					<input type="text" class="form-control" id="u_beban" name="u_beban" required>			  
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
	$("#beban").keydown(function (e) {
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
	$("#u_beban").keydown(function (e) {
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
//searching
function Searching() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("developer");
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
    $.get("pages/ajax/dev_read.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}

// Add Record
function addRecord(){
	for (var i=1; i<5; i++){
		var div="#u_expert"+i;
		$(div).prop('checked', false);
	}
	// get values
	var username = $("#username").val();
    var nip = $("#nip").val();
    var nama = $("#nama").val();
    var beban = $("#beban").val();
    var email = $("#email").val();
    var bagian = $("#seksi").val();
    var level = "2";
	var array = []
	for(var i=0; i < document.getElementsByName("expert[]").length;i++){
		if(document.getElementsByName("expert[]")[i].checked) array.push(document.getElementsByName("expert[]")[i].value);
	} 

    // Add record
    $.post("pages/ajax/dev_add.php", {
        nip: nip,
        nama: nama,
		beban: beban,
	    username: username,
		email: email,
		level: level,
		bagian: bagian,
		data: array
    }, function (data, status) {
        alert(data);
        // close the popup
        $("#tambah_dev").modal("hide");

        // read records again
        readRecords();

        // clear fields from the popup
        $("#nip").val("");
        $("#nama").val("");
        $("#beban").val("");
		for (var i=1; i<5; i++){
			var div="#expert"+i;
			$(div).prop('checked', false);
		}
    });
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
    var conf = confirm("Apakah yakin akan menghapus "+nama+" sebagai developer?");
    if (conf == true) {
        $.post("pages/ajax/dev_delete.php", {
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
    $.post("pages/ajax/dev_readDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#u_nip").val(user.nip);
            $("#u_nama").val(user.nama);
			var keahlian = user.expert.split(" ");
            $("#u_beban").val(user.beban);
			
			// clear fields from the popup

			for (var i=1; i<=document.getElementsByName('u_expert[]').length; i++){
				var div="#u_expert"+i;
				$(div).prop('checked', false);
			}
			for (var i=1; i<=document.getElementsByName('expert[]').length; i++){
				var div="#expert"+i;
				$(div).prop('checked', false);
			}
			for (var i=0;i<(keahlian.length-1);i++){
				var div="#u_expert"+keahlian[i];
				$(div).prop('checked',true);
			}
        }
    );
    // Open modal popup
    $("#update_dev").modal("show");
	
}
function UpdateDetails() {
    // get values
    var nip = $("#u_nip").val();
    var nama = $("#u_nama").val();
	var beban = $("#u_beban").val();
	var array = [];
	
	for(var i=0; i < document.getElementsByName("u_expert[]").length;i++){
		if(document.getElementsByName("u_expert[]")[i].checked) array.push(document.getElementsByName("u_expert[]")[i].value);
	} 
    
    // Update the details by requesting to the server using ajax
    $.post("pages/ajax/dev_updateDetails.php", {
            nip: nip,
            nama: nama,
			beban: beban,
			data2: array
        },
        function (data, status) {
            // hide modal popup
            $("#update_dev").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}

</script>