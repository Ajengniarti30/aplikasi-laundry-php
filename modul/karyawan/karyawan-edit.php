<?php require_once("database.php");

ob_start();
$id=$_GET['id'];
$db = new Database();
$db->select('karyawan','*','','', "id=$id");
$res= $db->getResult();
if(count($res) == 0){
  echo "<b>Tidak ada data yang tersedia</b>";
}else{
  foreach ($res as &$r){?> 

<nav aria-label="You are here:" role="navigation">
<ul class="breadcrumbs">
  <li>
    <a href="?module=edit?">Home</a></li>
  <li class="disabled">Data Edit Karyawan</li>
</ul>
</nav>
<form action="" method="post">
 <!-- field nik -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nik" class="text-right middle">NIK</label>
    </div>
    <div class="small-6 cell">
      <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
      <input type="text" name="nik" placeholder="NIK" value="<?php echo $r['nik']; ?>" required>
    </div>
  </div>
  <!-- field nama -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle">Nama</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="nama" placeholder="Nama" value="<?php echo $r['nama']; ?>" required>
    </div>
  </div>
  <!-- field alamat -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="alamat" class="text-right middle">Alamat</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="alamat" placeholder="Alamat" value="<?php echo $r['alamat']; ?>" required>
    </div>
  </div>
  <!-- field telp -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="telp" class="text-right middle">Telphone</label>
    </div>
    <div class="small-6 cell">
      <input type="text" name="telp" placeholder="Telphone" value="<?php echo $r['telp']; ?>" required>
    </div>
  </div>
  <!-- field gender -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="gender" class="text-right middle">Gender</label>
    </div>
    <div class="small-6 cell">    
    <input type="radio" name="gender" <?php echo $r['gender'] == "L" ? "checked": "" ;?> value="L" />L
    <input type="radio" name="gender" <?php echo $r['gender'] == "P" ? "checked": "" ;?> value="P"/>P
    </div>
  </div>
  <!-- Aksi -->
  <div class="grid-x grid-padding-x">
    <div class="small-3 cell">
      <label for="nama" class="text-right middle"></label>
    </div>
    <div class="small-6 cell">
		<div class="small button-group">
  <button class="button" type="submit" name="submit">Simpan</button>
  <a class="button" href='javascript:self.history.back();'>Kembali</a>
</div>
    </div>
  </div>
</form>
<?php
              }
          }
          ?>
<?php 
// check action submit
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $nik = $_POST['nik'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $gender = $_POST['gender'];
  $db = new Database();
  $db->update('karyawan',array(
    'nik'=>$nik,
    'nama'=>$nama,
    'alamat'=>$alamat,
    'telp'=>$telp,
    'gender'=>$gender,
  ),
    "id=$id"
  );
  $res = $db->getResult();
  // print_r($res);
  header('Location: /laundry2/index.php?module=kariyawan');
}

?>