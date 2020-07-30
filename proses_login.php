<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// die();

// $sql   = mysql_query("SELECT * FROM tb_admin WHERE username = '$username' AND password = '$password'") or die(mysql_error());
$sql = "SELECT * FROM tb_admin WHERE username = '".$username."' AND password = '".$password."' LIMIT 1";
$result = mysqli_query($config, $sql);
$cek = mysqli_num_rows($result);

// echo "<pre>";
// print_r(mysqli_fetch_array($result));
// echo "</pre>";
// die();


if ($cek > 0) {
    session_start();
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION['name'] = $row['username'];
        $_SESSION['id'] = $row['id'];
    }
    ?>
        <script>
            alert("Selamat Datang <?= $row['username']; ?> Kamu Telah Login Ke Halaman Admin !!!");
            window.location.href = "index.php"
        </script>
    <?php
    }
    else {
    echo '<script>alert("Masukan Username dan Password dengan Benar !!!");
    window.location.href="login.php"</script>';
}
?>