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
      <li class="active">
        <a href="<?php $_SERVER[SCRIPT_NAME]; ?>?page=kriteria">
          <i class="fa fa-edit"></i> <span>Kriteria</span>
        </a>
      </li>
      <li>
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
      Kriteria
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Kriteria</a></li>
      <li class="active">Edit Kriteria</li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!--Edit Kriteria-->
    <?php

    $id = $_GET['id'];
    $sql = "SELECT  * FROM tb_kriteria where id='$id' ";

    if (!$result =  mysqli_query($config, $sql)) {
      die('Error:' . mysqli_error($config));
    } else {
      if (mysqli_num_rows($result) > 0) {
        while ($row =  mysqli_fetch_assoc($result)) {
    ?>
          <div class="box">
            <div class="box-header with-border">
              Edit Kriteria
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <form action="aksi1.php?sender=kriteria" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12 form-group">
                    <label>Kriteria</label>
                    <input readonly="" type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control" required="">
                    <input type="text" readonly="" name="nama_kriteria" value="<?php echo $row['nama_kriteria']; ?>" class="form-control" required="">
                  </div>
                  <div class="col-md-12 form-group">
                    <label>Bobot</label>
                    <input readonly="" type="hidden" name="id" value="<?php echo $row['id']; ?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="bobot" value="<?php echo $row['bobot']; ?>" class="form-control" placeholder="Masukan Bobot" required="">
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

    <!--Table Kriteria-->
    <div class="box">
      <div class="box-body">
        <table id="example1" class="table table-striped dataTable no-footer">
          <thead>
            <tr>
              <th>Nomor</th>
              <th>Kriteria</th>
              <th>Bobot</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT  * FROM tb_kriteria";
            $no = 1;
            if (!$result =  mysqli_query($config, $sql)) {
              die('Error:' . mysqli_error($config));
            } else {
              if (mysqli_num_rows($result) > 0) {
                while ($row =  mysqli_fetch_assoc($result)) {
            ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nama_kriteria']; ?></td>
                    <td><?php echo $row['bobot']; ?></td>
                    <td>
                      <a href="<?php $_SERVER[SCRIPT_NAME]; ?>?page=kriteria&id=<?php echo $row['id']; ?>" class="btn btn-info">
                        <li class="fa fa-pencil"></li> Edit
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






<?php include 'theme/footer.php'; ?>