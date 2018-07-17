<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Sistem Permintaan Aplikasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="../dist/css/font_google.css">
    <!-- FAVICONS -->
  <link rel="icon" href="../dist/img/favicon_bps.ico" type="image/x-icon">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
	 <div class="row"><img src="../dist/img/icon-selfServicePortal.png" height="70px"> </div>
	 <a href="../index.php">Sistem Permintaan Aplikasi</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan masukkan username dan password</p>
	
    <form name="loginform" action="login.php" class="form-horizontal" method="post" onSubmit="return validateForm();">
      <div id="error"> 
	 
		<?php
		    error_reporting(0);
			include ("../nusoap.php");
			include "../plugins/AES/function.php";
			include "../koneksinya.php";
			session_start();

			function Login($username, $password){
				$remote_ip = $_SERVER['REMOTE_ADDR'];
				$key = "568d8e5dab9835b2de71237df24f20d3";
				$wsdl = "http://api.bps.go.id/community/index.php?wsdl";
				$username = strtolower($username);
				
				$client = new nusoap_client($wsdl, true);
				$err = $client->getError();

				if ($err) {
					die('gagal login');
					return false; //gagal login
				} else {
					$result = $client->call('login', array('username' => $username, 'password' => $password, 'remote_ip' => $remote_ip, 'key' => $key));
					if ($result['kode'] == "1") {
					   return true; 
					} else {
						return false;
					}
				}
				unset($client);
				/* end login using ldap */
			}
			function Data($username){
				$remote_ip = $_SERVER['REMOTE_ADDR'];
				$key = "568d8e5dab9835b2de71237df24f20d3";
				$wsdl = "http://api.bps.go.id/community/index.php?wsdl";
				$username = strtolower($username);
				
				$client = new nusoap_client($wsdl, true);
				$err = $client->getError();
				if ($err) {
					die('gagal login');
					return false; //gagal login
				} else {
					$jenisinput = 'email';
					$input = $username;
					$info = $client->call('pegawai_data', array('jenisinput' => $jenisinput, 'input' => $input, 'key' => $key));
					$ldap = NULL;

					if (isset($info['error'])) {
						die('gagal login2');
						$ldap = NULL;
					} else if ($info['kode'] != "1") {
						die('gagal login3');
						$ldap = NULL;
					} else {
						$ldap = array(
							'id' => $username,
							'email' => $info['email'],
							'nama' => $info['nama'],
							'niplama' => $info['niplama'],
							'nipbaru' => $info['nipbaru'],
							'url_foto' => $info['url_foto'],
							'unitkerja_id' => $info['unitkerja_id'],
							'unitkerja' => $info['unitkerja'],
							'wilayah' => $info['wilayah'],
							'jabatan' => $info['jabatan'],
						);
						//die(var_dump($ldap));

						return $ldap;
					}
				}
			unset($client);
				/* end login using ldap */
			}
			/* if(Login("ricomarten","86879385")){
				$data=Data("ricomarten");
				echo $data['email'];
				echo $data['nama'];
				echo $data['niplama'];
				echo $data['nipbaru'];
				echo $data['url_foto'];
				echo $data['unitkerja_id'];
				echo $data['unitkerja'];
				echo $data['wilayah'];
				echo $data['jabatan'];
			}else{
				echo "Gagal Login";
			} */
			

			if(isset($_POST['username']) || isset($_POST['password'] )){
			    if(Login($_POST['username'],$_POST['password'])){
    			    $query=mysql_query("select * from user where username='".$_POST['username']."'");
    				$cek=mysql_num_rows($query);
    				$level=mysql_fetch_array($query);
    				if($cek>=1){
    					$_SESSION["level"]=$level['level'];
    				}
    				else{
    				    $_SESSION["level"]='9';
    				}
					$_SESSION["username"]=$_POST['username'];
					$_SESSION["password"]=$_POST['password'];
					$data=Data($_POST['username']);
					$_SESSION["email"]= $data['email'];
    				$_SESSION["nama"]= $data['nama'];
    				$_SESSION["niplama"]= $data['niplama'];
    				$_SESSION["nipbaru"]= $data['nipbaru'];
    				$_SESSION["url_foto"]= $data['url_foto'];
    				$_SESSION["unitkerja_id"]= $data['unitkerja_id'];
    				$_SESSION["unitkerja"]= $data['unitkerja'];
    				$_SESSION["wilayah"]= $data['wilayah'];
    				$_SESSION["jabatan"]= $data['jabatan'];
					//$_SESSION["level"]=$_POST['level'];
					//header('Location: ../index.php');
					echo'<script>window.location="../index.php?'.paramEncrypt('page=main').'";</script>';
				}
				else{
				    $query=mysql_query("select * from user where username='".$_POST['username']."' and password='".$_POST['password']."'");
				    $cek=mysql_num_rows($query);
    				$level=mysql_fetch_array($query);
    				if($cek>=1){
    					$_SESSION["level"]=$level['level'];
    					$_SESSION["username"]=$_POST['username'];
    					$_SESSION["password"]=$_POST['password'];
    					$data=Data($_POST['username']);
    					$_SESSION["email"]= $data['email'];
        				$_SESSION["nama"]= $data['nama'];
        				$_SESSION["niplama"]= $data['niplama'];
        				$_SESSION["nipbaru"]= $data['nipbaru'];
        				$_SESSION["url_foto"]= $data['url_foto'];
        				$_SESSION["unitkerja_id"]= $data['unitkerja_id'];
        				$_SESSION["unitkerja"]= $data['unitkerja'];
        				$_SESSION["wilayah"]= $data['wilayah'];
        				$_SESSION["jabatan"]= $data['jabatan'];
    					//$_SESSION["level"]=$_POST['level'];
    					//header('Location: ../index.php');
    					echo'<script>window.location="../index.php?'.paramEncrypt('page=main').'";</script>';
				    }else{
				        echo"<div class='callout callout-danger'>Username atau password tidak ditemukan</div>";
				    }
				}
				
			}			
		?>
	  </div>
	  <div class="form-group nameInput has-feedback">
	  	<label for="username">Username</label>
        <input type="username" class="form-control" placeholder="username" name="username" id="username">
       
      </div>
      <div class="form-group passInput has-feedback">
	  	<label for="password">Password</label>
        <input type="password" class="form-control" placeholder="password" name="password" id="password">
       
      </div>
      <div class="row">
        <div class="col-xs-8">
          &nbsp;
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In </button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../dist/js/validation.min.js"></script>
<script>
function validateForm() {
	var name = document.loginform.username.value;
	var password = document.loginform.password.value;
		if(name == "" || name == null){
			$(".nameInput").removeClass("has-success");
			$(".nameInput .glyphicon-ok").remove();
			$(".nameInput").addClass("has-error").append(" <span class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>");
			var flag1 = ("false");
		}
		else{
			$(".nameInput").removeClass("has-error");
			$(".nameInput .glyphicon-remove").remove();
			$(".nameInput").addClass("has-success").append(" <span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>");
			var flag1 = ("true");
		};
		if(password == "" || password == null){
			$(".passInput").removeClass("has-success");
			$(".passInput .glyphicon-ok").remove();
			$(".passInput").addClass("has-error").append(" <span class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>");
			var flag2 = ("false");
		}
		else{
			$(".passInput").removeClass("has-error");
			$(".passInput .glyphicon-remove").remove();
			$(".passInput").addClass("has-success").append(" <span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>");
			var flag2 = ("true");
		};
		if(flag1 == "true"){
			if(flag2 == "true"){
				return true;
			}
			else{
				return false;
			};
		}
		else{
			return false;
		};
}

</script>
</body>
</html>
