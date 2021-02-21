<?php
// Apabila user belum login
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    echo  "<script>window.alert('Untuk mengakses modul, Anda harus login dulu.');
        window.location = 'index.php'</script>";  
}
// Apabila user sudah login dengan benar, maka terbentuklah session

else{
  include "../config/db.php";
  $tampil = mysqli_query($connect, "SELECT * FROM users WHERE username='$_SESSION[namauser]'");
  $r      = mysqli_fetch_array($tampil);
?>

<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../dist/img/<?php echo $r['foto'];?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $r['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <a href="?module=dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li>
            <a href="?module=pendaftaran">
                <i class="fa fa-users"></i> <span>Pendaftaran</span>
            </a>
        </li>
        <li class="header">Manajemen User</li>
        <li>
            <a href="?module=user">
                <i class="fa fa-user-plus"></i> <span>Manajemen User</span>
            </a>
        </li>
        <li class="header">LABELS</li>
        <li><a href="../index.php" target="blank"><i class="fa fa-circle-o text-green"></i> <span>View Website</span></a></li>
        <li><a href="logout.php"><i class="fa fa-circle-o text-red"></i> <span>Logout</span></a></li>
    </ul>
</section>
<?php
}
?>