<?php
  include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
<link rel="icon" type="image/png" href="https://image.psikolif.com/wp-content/uploads/2018/10/Logo-PNJ-Politeknik-Negeri-Jakarta-Terbaru-Hitam-Putih-PNG.png">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      body,
      html {
        height: 100%;
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
      }

      * {
        box-sizing: border-box;
      }

      .bg-img {
        /* The image used */
        background-image: url("gambar1.jpg");

        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }

      /* Add styles to the form container */
      .container {
        position: absolute;
        right: 0;
        margin: 90px;
        margin-top: 220px;
        max-width: 400px;
        padding: 20px;
        background-color: white;
      }

      /* Full-width input fields */
      input[type=text],
      input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
      }

      input[type=text]:focus,
      input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }

      /* Set a style for the submit button */
      .btn {
        background-color: #000;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;

      }

      .btn:hover {
        opacity: 6;
      }
    </style>
  </head>

<body>
  <div class="bg-img">
    <form action="proses_login.php" method="POST" class="container">
      <h4>Sistem Pemilihan Mahasiswa Berprestasi</h4>

      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit" class="btn">Login</button>
    </form>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>