<?php include 'theme/header.php'; ?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">KATEGORI</li>
      <li>
        <a href="index.php">
          <i class="fa fa-home"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?php $_SERVER[SCRIPT_NAME]; ?>?page=kriteria">
          <i class="fa fa-edit"></i> <span>Kriteria</span>
        </a>
      </li>
      <li class="active">
        <a href="<?php $_SERVER[SCRIPT_NAME]; ?>?page=anggota">
          <i class="fa fa-user"></i> <span>Data Mahasiswa</span>
        </a>
      </li>
      <li>
        <a href="<?php $_SERVER[SCRIPT_NAME]; ?>?page=ranking">
          <i class="fa fa-pie-chart"></i> <span>Proses Ranking</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Mahasiswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Data Mahasiswa</a></li>
      <li class="active">Mahasiswa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!--Edit Mahasiswa-->
    <?php

    $id = $_GET['id'];
    $sql = "SELECT  * FROM tb_mahasiswa where id='$id' ";

    if (!$result =  mysqli_query($config, $sql)) {
      die('Error:' . mysqli_error($config));
    } else {
      if (mysqli_num_rows($result) > 0) {
        while ($row =  mysqli_fetch_assoc($result)) {
    ?>
          <div class="box">
            <div class="box-header with-border">
              Edit Anggota
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <form action="aksi.php?sender=edit" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label>NIM</label>
                    <input readonly="" type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control" placeholder="Enter..." required="">
                    <input type="number" name="nim" value="<?php echo $row['nim']; ?>" class="form-control" placeholder="Enter..." required="">
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control" placeholder="Enter..." required="">
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Program Studi</label>
                    <input type="text" name="prodi" value="<?php echo $row['prodi']; ?>" class="form-control" placeholder="Enter..." required="">
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Jurusan</label>
                    <b>| Jurusan Saat Ini :</b> <span class="label label-success"><?php echo $row['jurusan']; ?></span>
                    <select name="jurusan" class="form-control" required="" placeholder="Enter ...">
                      <option value="<?php echo $row['jurusan']; ?>"> - Pilih - </option>
                      <option value="Teknik Informatika dan Komputer">Teknik Informatika dan Komputer</option>
                      <option value="Teknik Mesin">Teknik Mesin</option>
                      <option value="Teknik Elektro">Teknik Elektro</option>
                      <option value="Teknik Sipil">Teknik Sipil</option>
                      <option value="Teknik Grafika dan Penerbitan">Teknik Grafika dan Penerbitan</option>
                      <option value="Akuntansi">Akuntansi</option>
                      <option value="Administrasi Niaga">Administrasi Niaga</option>
                    </select>
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Semester</label>
                    <b>| Semester Saat Ini :</b> <span class="label label-success"><?php echo $row['semester']; ?></span>
                    <select name="semester" class="form-control" required="" placeholder="Enter ...">
                      <option value=""> - Pilih - </option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                    </select>
                  </div>
                  <div class="col-md-12 form-group">
                    <label>IPK</label>
                    <input type="text" name="ipk" value="<?php echo $row['ipk']; ?>" class="form-control" placeholder="Enter..." required="">
                  </div>
                  <div class="col-md-12 form-group">
                    <label>KTI</label>
                    <input type="number" name="kti" value="<?php echo $row['kti']; ?>" class="form-control" placeholder="Enter..." required="">
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Bahasa Asing</label>
                    <input type="number" name="bahasa_asing" value="<?php echo $row['bahasa_asing']; ?>" class="form-control" placeholder="Enter..." required="">
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Prestasi</label>
                    <input type="number" name="prestasi" value="<?php echo $row['prestasi']; ?>" class="form-control" placeholder="Enter..." required="">
                  </div>
                  <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-send"></span> Simpan</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
    <?php
        }
      } else {
        echo '';
      }
    } ?>
    <!-- View Table -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info">
            <li class="fa fa-plus"></li> Tambah
          </a></h3>
        <div class="box-tools pull-right">
        </div>
      </div>
      <div class="box-body">
        <table id="example1" class="table table-striped dataTable no-footer">
          <thead>
            <tr>
              <th>No</th>
              <th>NIM</th>
              <th>Nama</th>
              <th>Semester</th>
              <th>IPK</th>
              <th>KTI</th>
              <th>Bahasa Asing</th>
              <th>Prestasi</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT  * FROM tb_mahasiswa";
            $no = 1;
            if (!$result =  mysqli_query($config, $sql)) {
              die('Error:' . mysqli_error($config));
            } else {
              if (mysqli_num_rows($result) > 0) {
                while ($row =  mysqli_fetch_assoc($result)) {
            ?>

                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['semester']; ?></td>
                    <td><?php echo $row['ipk']; ?></td>
                    <td><?php echo $row['kti']; ?></td>
                    <td><?php echo $row['bahasa_asing']; ?></td>
                    <td><?php echo $row['prestasi']; ?></td>
                    <td>
                      <a href="<?php $_SERVER[SCRIPT_NAME]; ?>?page=anggota&id=<?php echo $row['id']; ?>" class="btn btn-info">
                        <li class="fa fa-pencil"></li> Edit
                      </a>
                      <!--Hapus Mahasiswa-->
                      <a href="aksi.php?sender=hapus&id=<?php echo $row['id']; ?>" class="btn btn-danger">
                        <li class="fa fa-trash-o"></li> Hapus
                      </a>
                    </td>
                  </tr>
            <?php
                  $no++;
                }
              } else {
                echo '';
              }
            } ?>
          </tbody>


        </table>
      </div><!-- /.box-body -->

    </div><!-- /.box -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<!-- Modal -->
<!--Tambah Mahasiswa-->
<form action="aksi.php?sender=anggota" method="POST">
  <div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title" id="myModalLabel">Tambah Data Mahasiswa</h4>
        </div>

        <div class="modal-body center">
          <!--Content-->

          <div class="form-group">
            <label>NIM</label>
            <input type="number" name="nim" class="form-control" required="" placeholder="Masukan NIM Mahasiswa">
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required="" placeholder="Masukkan Nama Lengkap Mahasiswa"></input>
          </div>
          <div class="form-group">
            <label>Program Studi</label>
            <input type="text" name="prodi" class="form-control" required="" placeholder="Masukkan Nama Program Studi">
          </div>

          <div class="form-group">
            <label>Jurusan</label>
            <select name="jurusan" class="form-control" required="" placeholder="Masukkan Nama Jurusan">
              <option value=""> - Pilih - </option>
              <option value="Teknik Informatika dan Komputer">Teknik Informatika dan Komputer</option>
              <option value="Teknik Mesin">Teknik Mesin</option>
              <option value="Teknik Elektro">Teknik Elektro</option>
              <option value="Teknik Sipil">Teknik Sipil</option>
              <option value="Teknik Grafika dan Penerbitan">Teknik Grafika dan Penerbitan</option>
              <option value="Akuntansi">Akuntansi</option>
              <option value="Administrasi Niaga">Administrasi Niaga</option>
            </select>
          </div>
          <div class="form-group">
            <label>Semester</label>
            <select name="semester" class="form-control" required="" placeholder="Masukkan Semester">
              <option value=""> - Pilih - </option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
            </select>
          </div>

          <div class="form-group">
            <label>IPK</label>
            <input type="text" name="ipk" class="form-control" required="" placeholder="Masukkan IPK"></input>
          </div>
          <div class="form-group">
            <label>KTI</label>
            <input type="number" name="kti" class="form-control" required="" placeholder="Masukkan Total Nilai KTI">
          </div>

          <div class="form-group">
            <label>Bahasa Asing</label>
            <input type="number" name="bahasa_asing" class="form-control" required="" placeholder="Masukkan Nilai Bahasa Asing"></input>
          </div>
          <div class="form-group">
            <label>Prestasi</label>
            <input type="number" name="prestasi" class="form-control" required="" placeholder="Masukkan Jumlah Prestasi"></input>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
          <button type="submit" class="btn btn-info"> Simpan</button>

        </div>

      </div>
    </div>
  </div>
</form>

<!-- Content Wrapper. Contains page content -->


<?php include 'theme/footer.php'; ?>