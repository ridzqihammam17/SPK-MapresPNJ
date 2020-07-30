<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

error_reporting(0);
session_start();
include 'koneksi.php';
if(isset($_SESSION['id'])==0){
  echo '<script>alert("Anda Harus Login Terlebih Dahulu !!!");
  window.location.href="login.php"</script>';
  }else{
$get=$_GET['page'];
 
if ( empty($get))
{
   include ('master/dashboard.php');	
}

elseif ($get=='anggota')
{
  include ('master/anggota.php');
}

elseif ($get=='kriteria')
{
  include ('master/kriteria.php');
}

elseif ($get=='ranking')
{
  include ('master/ranking.php');
}
elseif ($get=='hitung')
{
  include ('master/hitung.php');
}
?>
<?php } ?>