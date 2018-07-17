<!-- Full Width Column -->
<div class="content-wrapper">
<div class="container">
  <!-- Content Header (Page header) -->
  <section class="content-header">
	<ol class="breadcrumb">
	  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Entri</a></li>
	  <li class="active">Fitur</li>
	</ol>
  </section>
 
  <!-- Main content -->
 <!-- DataTables -->
	<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Fitur</h3>	
            </div>
			
            <!-- /.box-header -->
            <div class="box-body">
				<div class="pull-right">
					<button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Tambah Fitur</button>
					<br/>
					<br/>
				</div>
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Kode Fitur</th>
							<th>Nama Fitur</th>    
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody class="records_content">
						<?php
						/* $query=mysql_query("select * from fitur");
							while($data=mysql_fetch_array($query)){
							echo "<tr>";
							echo "<td>".$data['kode']."</td>";
							echo "<td>".$data['nama']."</td>";
							$id=$data['kode'];
							echo "<td><a href='?".paramEncrypt('page=modul&act=edit&kode=$id')."' class='btn btn-warning'><i class='fa fa-edit'></i></a>
							<a href='' class='btn btn-danger'><i class='fa fa-trash'></i></a></td>";
							echo "</tr>"; 
							}*/
						?>
					</tbody>
				</table>
            </div>
            <!-- /.box-body -->
<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah Modul</h4>
            </div>
            <div class="modal-body">

            <form name="modul" action="?<?php echo paramEncrypt('page=modul'); ?>" class="form-horizontal"  method="post" >
            <div class="box-body">
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Kode Fitur</label>
                  <div class="col-sm-4 records_content2">                
                  </div>
                </div>
				<div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama Fitur</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Isikan Nama Fitur"  required>
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
<!-- // Modal -->
 <!-- Modal - Update  -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">

				<form name="modul" action="?<?php echo paramEncrypt('page=modul'); ?>" class="form-horizontal"  method="post" >
				<div class="box-body">
					<div class="form-group">
					  <label for="update_kode" class="col-sm-2 control-label">Kode Fitur</label>
					  <div class="col-sm-4">
						<input type="text" class="form-control" id="update_kode" name="update_kode" placeholder="Isikan Nama Proyek Sensus/Survei" value="" readonly required>
					  </div>
					</div>
					<div class="form-group">
					  <label for="update_nama" class="col-sm-2 control-label">Nama Fitur</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" id="update_nama" name="update_nama" placeholder="Isikan Nama Fitur" required>
					  </div>
					</div>
				</div>
				</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="UpdateModulDetails()" >Save Changes</button>
                <input type="hidden" id="hidden_user_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->          
				
          </div>
          <!-- /.box -->

        
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
 
	<!-- /.box -->
  </section>
  <!-- /.content -->  
   <div class="row">
        <div class="col-md-12">
           
        </div>
    </div>
</div>
<!-- /.container -->
</div>
<script>
$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
    readRecords2(); // calling function
});
// READ records
function readRecords() {
    $.get("pages/ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
function readRecords2() {
    $.get("pages/ajax/readRecords2.php", {}, function (data, status) {
		$(".records_content2").html(data);
    });
}
// Add Record
function addRecord() {
    // get values
    var kode = $("#kode").val();
    var nama = $("#nama").val();


    // Add record
    $.post("pages/ajax/addRecord.php", {
        kode: kode,
        nama: nama
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // read records again
        readRecords();
        readRecords2();

        // clear fields from the popup
        //$("#kode").val("");
        $("#nama").val("");
    });
}
function DeleteModul(id,nama) {
    var conf = confirm("Apakah yakin akan menghapus fitur "+nama+"?");
    if (conf == true) {
        $.post("pages/ajax/deleteModul.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
				readRecords2();
            }
        );
    }
}
function GetModulDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#update_kode").val(id);
    $.post("pages/ajax/readModulDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_kode").val(user.kode);
            $("#update_nama").val(user.nama);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}
function UpdateModulDetails() {
    // get values
    var update_kode = $("#update_kode").val();
    var update_nama = $("#update_nama").val();
    
    // Update the details by requesting to the server using ajax
    $.post("pages/ajax/updateModulDetails.php", {
            kode: update_kode,
            nama: update_nama
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
			readRecords2();
        }
    );
}

</script>