<?php
$module = empty($_GET['module']) ? '/' : $_GET['module'];

switch($module){
    case "/" :
    case "home" :
    include 'dashboard.php';
    break;

    case "karyawan":
    include 'modul/karyawan/karyawan-index.php';
    break;
    case "karyawan-edit":
    include 'modul/karyawan/karyawan-edit.php';
    break;
    case "karyawan-create":
    include 'modul/karyawan/karyawan-create.php';
    break;
    case "karyawan-show":
    include 'modul/karyawan/karyawan-show.php';
    break;
    case "karyawan-hapus":
    include 'modul/karyawan/karyawan-hapus.php';
    break;

    default :
    include 'dashboard.php';
}
?>