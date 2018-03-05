<?php
ob_start();
?>
<div class="content">
   <div class="container-fluid">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header card-header-icon" data-background-color="rose">
                       <i class="material-icons">assignment</i>
                 </div>
                 <div class="card-content">
                       <h4 class="card-title">Simple Table</h4>
                     <div class="table-responsive">
<?php require_once("database.php"); ?>
<nav aria-label="You are here:" role="navigation">
</nav>
<form action="" method="post">

<!-- field NIK -->
<div class="grid-x grid-padding-x">
  <div class="small-6 cell">
  <?php
    $db = new Database();
    $db->selectMax('karyawan','id');
    $res = $db->getResult();
    $nik = $res[0]['max'] < 1 ? $res[0]['max']+1  : $res[0]['max']+1;
    $value = 'KR000'.$nik;
    echo "<input type='text' name='nik' value='$value' placeholder='NIK' readonly>";
  ?>
  </div>
</div>
<!-- field nik -->
<br>
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nik" class="text-right middle">Nik Karyawan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nik" placeholder="Nik Karyawan" required>
  </div>
  <br>
<!-- field nama -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle">Nama Karyawan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="nama" placeholder="Nama Karyawan" required>
  </div>
</div>
<br>
<!-- field alamat -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">

    <label for="alamat" class="text-right middle">Alamat Karyawan</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="alamat" placeholder="Alamat Karyawan" required>
  </div>
</div>
<br>
<!-- field telp -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="telp" class="text-right middle">No Telepon</label>
  </div>
  <div class="small-6 cell">
    <input type="text" name="telp" placeholder="No Telepon" required>
  </div>
</div>
<br>
<!-- field gender -->
<div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="gender" class="text-right middle">Gender</label>
    </div>
    <div class="small-6 cell">    
      <input type="radio" name="gender" value="L" placeholder="Gender" required>L
      <input type="radio" name="gender" value="P" placeholder="Gender" required>P
    </div>
  </div>
<!-- Aksi -->
<div class="grid-x grid-padding-x">
  <div class="small-3 cell">
    <label for="nama" class="text-right middle"></label>
  </div>
  <div class="small-6 cell">
      <div class="small button-group">
    <button class="btn" type="submit" name="submit">Simpan</button>
    <button class="btn" type="reset">Reset</button>
    <a class="btn" href='javascript:self.history.back();'>Kembali</a>
  </div>
  </div>
</div>
</form>

<?php 

// check action submit
if(isset($_POST['submit'])){
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$gender = $_POST['gender'];
  $db=new Database();
  $db->insert('karyawan',array( 'Nik'=>$nik, 'Nama_karyawan'=>$nama, 'Almt_karyawan'=>$alamat, 'Telp_karyawan'=>$telp,'Gender_karyawan'=>$gender));
  $res=$db->getResult();
  // redirect to list
  ?>
  <meta http-equiv="refresh" content="0; url=dashboard.php?module=kariyawan">
<?php
}
?>