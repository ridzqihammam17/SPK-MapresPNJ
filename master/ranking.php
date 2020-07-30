<?php include 'theme/header.php'; ?>

<!-- hitung -->

<?php
function getMax($column)
{
    include 'koneksi.php';
    $sql = "SELECT  * FROM tb_mahasiswa ORDER BY ".$column." DESC limit 1 ";
    $result =  mysqli_query($config, $sql);
    while ($row =  mysqli_fetch_assoc($result)) {
        $max = $row[$column];
    }  
    return $max;
}

function getWeight()
{
    include 'koneksi.php';
    $bobot = array();
    $sql = "SELECT  * FROM tb_kriteria";
    $result =  mysqli_query($config, $sql);
    while ($row =  mysqli_fetch_assoc($result)) {
        $bobot[] = $row['bobot'];
    }  
    return $bobot;
}

function getMahasiswa()
{
    include 'koneksi.php';
    $data = array();
    $sql = "SELECT  * FROM tb_mahasiswa";
    $result =  mysqli_query($config, $sql);
    while ($row =  mysqli_fetch_assoc($result)) {
        $data[] = [
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'jurusan' => $row['jurusan'],
            'prodi' => $row['prodi'],
            'semester' => $row['semester'],
            'ipk' => $row['ipk'],
            'kti' => $row['kti'],
            'bahasa_asing' => $row['bahasa_asing'],
            'prestasi' => $row['prestasi']
        ];
    }
    return $data;
}

    $data = getMahasiswa();

    //Maximum Nilai
    $c1max = getMax("ipk");
    $c2max = getMax("kti");
    $c3max = getMax("bahasa_asing");
    $c4max = getMax("prestasi");
    
    
    //Normalisasi
    foreach ($data as $key => $row) {
        $data_normal[] = [
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'c1_n' => ($row['ipk']/$c1max),
            'c2_n' => ($row['kti']/$c2max),
            'c3_n' => ($row['bahasa_asing']/$c3max),
            'c4_n' => ($row['prestasi']/$c4max)
        ];
    }

    //Perkalian Bobot
    $bobot = getWeight();
    foreach ($data_normal as $key => $row) {
        $data_perkalian[] = [
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'c1_f' => ($row['c1_n']*$bobot[0]),
            'c2_f' => ($row['c2_n']*$bobot[1]),
            'c3_f' => ($row['c3_n']*$bobot[2]),
            'c4_f' => ($row['c4_n']*$bobot[3]),
        ];
    }

    //Final
    foreach ($data_perkalian as $key => $row) {
        $data_final[] = [
            'nim' => $row['nim'],
            'nama' => $row['nama'],
            'ipk_hit' => $row['c1_f'],
            'kti_hit' => $row['c2_f'],
            'bahasa_hit' => $row['c3_f'] ,
            'pres_hit' => $row['c4_f'] ,
            'score' => $row['c1_f']+$row['c2_f']+$row['c3_f']+$row['c4_f']
        ];
    }
    ?>

    <!-- end hitung  -->


     
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
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=kriteria">
                <i class="fa fa-edit"></i> <span>Kriteria</span>  
              </a>
            </li>
            <li>
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=anggota">
                <i class="fa fa-user"></i> <span>Data Mahasiswa</span>  
              </a>
            </li> 
            <li class="active">
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
             Hasil Perangkingan
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Proses Ranking</a></li>
            <li class="active">Hasil</li>
            
          </ol>
        </section>
        <!-- Main content -->
        <!-- Normalisasi -->
        <section class="content">
        <h3>Normalisasi</h3>
        
        <div class="box">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
                <table id="" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    if (count($data_normal) > 0){
                      foreach ($data_normal as $key => $row) {
                    ?>           
                        <tr>
                        <td><?php echo $no ;?></td>
                        <td><?php echo $row['nim'];?></td>
                        <td><?php echo $row['nama'];?></td>
                        <td><?php echo $row['c1_n'];?></td>
                        <td><?php echo $row['c2_n'];?></td>
                        <td><?php echo $row['c3_n'];?></td>
                        <td><?php echo $row['c4_n'];?></td>
                        </tr>
                        <?php    
                    $no++;                    
                        }
                    }  else {
                    echo '';    
                    }
                    ?>
                    </tbody>
                  </table>
            </div><!-- /.box-body -->
        </section><!-- /.content -->

        <!-- Main content -->
        <!-- Perkalian Bobot -->
        <section class="content">
        <h3>Perkalian Bobot</h3>
        
        <div class="box">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
              </div>
            </div>
            <div class="box-body">
                <table id="" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    if (count($data_perkalian) > 0){
                      foreach ($data_perkalian as $key => $row) {
                    ?>           
                        <tr>
                        <td><?php echo $no ;?></td>
                        <td><?php echo $row['nim'];?></td>
                        <td><?php echo $row['nama'];?></td>
                        <td><?php echo $row['c1_f'];?></td>
                        <td><?php echo $row['c2_f'];?></td>
                        <td><?php echo $row['c3_f'];?></td>
                        <td><?php echo $row['c4_f'];?></td>
                        </tr>
                        <?php    
                    $no++;                    
                        }
                    }  else {
                    echo '';    
                    }
                    ?>
                    </tbody>
                  </table>
            </div><!-- /.box-body -->
        </section><!-- /.content -->

        <!-- Main content -->
        <!-- Final -->
        <section class="content">
        <h3>Final</h3>
        
        <div class="box">
            <div class="box-header with-border">
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
                        <th>IPK</th>
                        <th>KTI/th>
                        <th>Bahasa Asing</th>
                        <th>Prestasi</th>
                        <th>Final Score</th>                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    if (count($data_final) > 0){
                      foreach ($data_final as $key => $row) {
                    ?>           
                        <tr>
                        <td><?php echo $no ;?></td>
                        <td><?php echo $row['nim'];?></td>
                        <td><?php echo $row['nama'];?></td>
                        <td><?php echo $row['ipk_hit'];?></td>
                        <td><?php echo $row['kti_hit'];?></td>
                        <td><?php echo $row['bahasa_hit'];?></td>
                        <td><?php echo $row['pres_hit'];?></td>
                        <td><?php echo $row['score'];?></td>
                        </tr>
                        <?php    
                    $no++;                    
                        }
                    }  else {
                    echo '';    
                    }
                    ?>
                    </tbody>
                  </table>
            </div><!-- /.box-body -->
        </section><!-- /.content -->

      </div><!-- /.content-wrapper -->
      
      
      
      <!-- Bootstrap Modal - To Add New Record -->
   
     
<?php include 'theme/footer.php'; ?>