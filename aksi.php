<?php
include 'koneksi.php';

//Start Aksi Anggota
//Buat Anggota Mhs
$g=$_GET['sender'];
    if($g=='anggota')
    {
        $sql="INSERT INTO tb_mahasiswa (nim, nama, jurusan, prodi, semester, ipk, kti, bahasa_asing, prestasi)
            VALUES
            ('$_POST[nim]',
            '$_POST[nama]',
            '$_POST[jurusan]',
            '$_POST[prodi]',
            '$_POST[semester]',
            '$_POST[ipk]',
            '$_POST[kti]',
            '$_POST[bahasa_asing]',
            '$_POST[prestasi]')";   
            if (mysqli_query($config, $sql)){ 
            echo '<script LANGUAGE="JavaScript">
                alert("Anggota baru dengan nama :('.$_POST[nama].') Tersimpan")
                window.location.href="index.php?page=anggota";
                </script>'; 
        }
        else{
            echo "Error : ".$sql.". ".mysqli_error($config);
        }
    } //Edit Anggota Mhs
    else 
    if($g=='edit')
    {
        $sql = "UPDATE tb_mahasiswa SET 
        nim ='$_POST[nim]',
        nama ='$_POST[nama]',
        jurusan = '$_POST[jurusan]',
        prodi = '$_POST[prodi]',
        semester= '$_POST[semester]',
        ipk = $_POST[ipk],
        kti = $_POST[kti],
        bahasa_asing = $_POST[bahasa_asing],
        prestasi=$_POST[prestasi] WHERE id=$_POST[id]";
        echo $sql;
        if(mysqli_query($config,$sql)){
            echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan nama :('.$_POST[nama].') Di Update")
            window.location.href="index.php?page=anggota";
            </script>';   
        }
         
    } //Hapus Anggota Mhs 
    else 
    if($g=='hapus')
    {
        mysqli_query($config,"DELETE FROM tb_mahasiswa where id='$_GET[id]'");
         echo '<script LANGUAGE="JavaScript">
            alert("Anggota dengan nama :('.$_GET[id].') Di Terhapus")
            window.location.href="index.php?page=anggota";
            </script>';
    }

//End Aksi Anggota Mahasiswa
?>
