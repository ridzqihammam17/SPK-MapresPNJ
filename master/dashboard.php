<?php include 'theme/header.php'; ?>

     
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
       
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
           <ul class="sidebar-menu">
            <li class="header">Kategori</li>
            <li class="active">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>index.php">  
                 <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>

            <li>
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=kriteria">
                <i class="fa fa-edit"></i> <span>Kriteria</span>  
              </a>
            </li>


            <li>
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=anggota">
                <i class="fa fa-user"></i> <span>Data Mahasiswa</span>  
              </a>
            </li>
           
            <li>
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=ranking">
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
            Dashboard
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          
          <div class="row">
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>4</h3>
                  <p>Kriteria</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="index.php?page=kriteria" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>3<sup style="font-size: 20px"></sup></h3>
                  <p>Alternatif</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="index.php?page=ranking" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>7</h3>
                  <p>Data Mahasiswa</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="index.php?page=anggota" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
           
          </div><!-- /.row -->
         

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
<?php include 'theme/footer.php'; ?>