<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
  <ul class="nav navbar-nav">
  <?php
	$query=mysql_query("select * from user where username='".$_SESSION['username']."'");
	$data=mysql_fetch_array($query);
  ?>
	<li><a href="?<?php echo paramEncrypt('page=main'); ?>">Home <span class="sr-only">(current)</span></a></li>
	<?php if($_SESSION['level']!=9) {?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Permintaan <span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
			<?php if($_SESSION['level']==3) {?><li><a href="?<?php echo paramEncrypt('page=list'); ?>">Daftar Permintaan</a></li><?php } ?>
			<?php if($_SESSION['level']==0 || $_SESSION['level']==1 ) {?><li><a href="?<?php echo paramEncrypt('page=entri_admin'); ?>">Entri Permintaan</a></li><?php } ?>
			<?php if($_SESSION['level']==0 || $_SESSION['level']==1 || $_SESSION['level']==2) {?><li><a href="?<?php echo paramEncrypt('page=list_alokasi'); ?>">Status Permintaan</a></li><?php } ?>
			<?php if($_SESSION['level']==0 || $_SESSION['level']==1 || $_SESSION['level']==2) {?><li class="divider"></li><?php } ?>
			<?php if($_SESSION['level']==0 || $_SESSION['level']==1 || $_SESSION['level']==2) {?><li><a href="?<?php echo paramEncrypt('page=progres'); ?>">Entri Progres</a></li><?php } ?>
			<?php if($_SESSION['level']==0 || $_SESSION['level']==1 ) {?><li class="divider"></li><?php } ?>
			<?php if($_SESSION['level']==0 || $_SESSION['level']==1 ) {?><li><a href="?<?php echo paramEncrypt('page=modul'); ?>">Kelola Fitur</a></li><?php } ?>
			<?php if($_SESSION['level']==0 || $_SESSION['level']==1 ) {?><li><a href="?<?php echo paramEncrypt('page=keahlian'); ?>">Kelola Keahlian</a></li><?php } ?>
		</ul>
	</li>
	<?php } ?>
	<?php if($_SESSION['level']==0) {?>
	<li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manajemen User <span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
		<li><a href="?<?php echo paramEncrypt('page=developer'); ?>">Developer</a></li>
		<li class="divider"></li>
		<li><a href="?<?php echo paramEncrypt('page=user'); ?>">User</a></li>
	  </ul>
	</li>
	<?php } ?>
	<?php if($_SESSION['level']!=9) {?>
	<li class="dropdown">
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Perubahan Permintaan<span class="caret"></span></a>
	  <ul class="dropdown-menu" role="menu">
		<?php if($_SESSION['level']==3) {?><li><a href="?<?php echo paramEncrypt('page=request'); ?>">Entri Perubahan</a></li><?php } ?>
		<?php if($_SESSION['level']==3 || $_SESSION['level']==0 || $_SESSION['level']==1 || $_SESSION['level']==2 ) {?><li><a href="?<?php echo paramEncrypt('page=list_request'); ?>">Daftar Perubahan</a></li><?php } ?>
		<?php if($_SESSION['level']==0 || $_SESSION['level']==1 ) {?><li class="divider"></li><?php } ?>
		<?php if($_SESSION['level']==0 || $_SESSION['level']==1 ) {?><li><a href="?<?php echo paramEncrypt('page=konfirmasi'); ?>">Konfirmasi Perubahan</a></li><?php } ?>
	  </ul>
	</li>
	<?php } ?>
  </ul>
 
</div>
<!-- /.navbar-collapse -->
<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
  <ul class="nav navbar-nav">
	<!-- Messages: style can be found in dropdown.less-->
	<!-- User Account Menu -->
	<li class="dropdown user user-menu">
	  <!-- Menu Toggle Button -->
	  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<!-- The user image in the navbar-->
		
		<?php
		  if($_SESSION['url_foto']!=""){
		     echo '<img src="'.$_SESSION['url_foto'].'" class="user-image" alt="User Image">';
		  }
		   else{
		    echo '<img src="dist/img/avatar0.png" class="user-image" alt="User Image">';
		   }
        ?>
		<!-- hidden-xs hides the username on small devices so only the image appears. -->
		<span class="hidden-xs"><?php echo $_SESSION['nama']; ?></span>
	  </a>
	  <ul class="dropdown-menu">
		<!-- The user image in the menu -->
		<li class="user-header">
		 <?php
		  if($_SESSION['url_foto']!=""){
		     echo '<img src="'.$_SESSION['url_foto'].'" class="img-circle" alt="User Image">';
		  }
		   else{
		    echo '<img src="dist/img/avatar0.png" class="img-circle" alt="User Image">';
		   }
        ?>
		  <p>
			<?php echo $_SESSION['nama']; ?>
			<small>	<?php echo $_SESSION['unitkerja']; ?></small>
		  </p>
		</li>
		<!-- Menu Footer-->
		<li class="user-footer">
		  <div class="pull-left">
			<a href="?<?php echo paramEncrypt('page=chat'); ?>" class="btn btn-default btn-flat">Chat</a>
		  </div>
		  <div class="pull-right">
			<a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
		  </div>
		</li>
	  </ul>
	</li>
  </ul>
</div>
