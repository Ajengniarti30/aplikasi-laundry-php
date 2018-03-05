<?php
require_once('database.php');
$db=new Database();
$id = $_GET['id'];

$db->delete('karyawan',"id=$id");
$res = $db->getResult();
  if($res){
      ?>
    <meta http-equiv="refresh" content="0; url=index.php?module=kariyawan">
<?php   
}else{
    echo "Upss Something wrong..";
   }
  
?>