<div class="content">
<div class="container-fluid">
<?php require_once("database.php");

ob_start();
?> 

<div class="grid-x grid-padding-x">
<?php
$id=$_GET['id'];
$db = new Database();
$db->select('karyawan','*','','', "id=$id");
$res= $db->getResult();
// print_r($res);
if(count($res) == 0){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Table Karyawan</h4>
                <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>Data yang anda cari tidak ada atau terhapus</td>
                        </tr>
                      </tbody>
                    </table>
</div>
<?php }else{
  foreach ($res as &$r){ 
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">assignment</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Table Karyawan</h4>
                <div class="table-responsive">
                  <table class="table">
                       <thead class="text-primary">
                       <td>NIK</td>
                       <td>Nama</td>
                       <td>Alamat</td>
                       <td>Telphone</td>
                       <td>Gender</td>
                      </thead>
                      <tbody>
                           <tr>
                           <td><?php echo $r['Nik'] ?></td>
                            <td><?php echo $r['Nama_karyawan'] ?></td>
                            <td><?php echo $r['Almt_karyawan'] ?></td>
                            <td><?php echo $r['Telp_karyawan'] ?></td>
                            <td><?php echo $r['Gender_karyawan'] ?></td>
                            </tr>
                      </tbody>
                  </table>
<a class="btn" href="javascript:printDiv('print-area');" >Print</a>
<a href="index.php?module=karyawan-delete&id=<?php echo $r['id']; ?>"onClick='return confirm("Apakah yakin menghapus?")' class="alert btn">Delete</a>
<a class="btn" href='javascript:self.history.back();'>Kembali</a>
</div>
<?php }}?>

<style>
@media print {
   * { color: black; background: white; }
   table { font-size: 80%; }
}
</style>

<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

<script type="text/javascript">
     
     function printDiv(elementId) {
    var a = document.getElementById('print-area').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
</script>
</div>
</div>