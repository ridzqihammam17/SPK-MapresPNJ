<?php
include 'koneksi.php';
//Update Kriteria
//Start Aksi Anggota
$g=$_GET['sender'];
if($g=='kriteria')
    {
        mysqli_query($config,"UPDATE tb_kriteria SET
            nama_kriteria='$_POST[nama_kriteria]',
            bobot='$_POST[bobot]' WHERE id='$_POST[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Kriteria :('.$_POST[nama_kriteria].') Di Update")
            window.location.href="index.php?page=kriteria";
            </script>';
    } 
//End Aksi Anggota
?>
