<?php 
  include 'koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Morris.js Charts</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="sys/bootstrap/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Morris charts -->
    <link rel="stylesheet" href="sys/bootstrap/plugins/morris/morris.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="sys/bootstrap/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="sys/bootstrap/dist/css/skins/_all-skins.min.css">
    <style>
    /* Style untuk tabel div */
    .tablediv {
      display: table;
      width: 100%;
    }
    .tablediv-row {
      display: table-row;
    }
    .tablediv-header {
      display: table-header-group;
      font-weight: bold;
    }
    .tablediv-cell {
      display: table-cell;
      padding: 8px;
      border: 1px solid #ccc;
    }
  </style> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="index.php" class="navbar-brand"><b>Admin</b>LTE</a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                </div>
              </form>
            </div><!-- /.navbar-collapse -->
 
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              APLIKASI AKREDITASI LAMEMBA
              <small>V 1.0</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li><a href="#">Layout</a></li>
              <li class="active">Top Navigation</li>
            </ol>
          </section>

          <!-- Main content -->
          <section class="content">
          <?php
          echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
              
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama kriteriadukumen</th>
                                                <th>Bukti & Dokumen</th>
	  
                                          </tr></thead>
                        <tbody>
                        ";
                
    $no=0;
    $tebaru=mysqli_query($koneksi," SELECT * FROM kriteriadukumen ");
    while ($t=mysqli_fetch_array($tebaru)){	
    $no++;
                                        echo"<tr>
                                            <td>$no</td>
                                                <td>$t[nama_kriteriadukumen]</td>
                                                <td><button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#myModal$t[id_kriteriadukumen]'>Bukti</button></td>
                                
	
                <!-- Modal -->
    <div class='modal fade' id='myModal$t[id_kriteriadukumen]'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <!-- Bagian header modal -->
          <div class='modal-header'>
            <h4 class='modal-title'>Data Dokumen</h4>
            <button type='button' class='close' data-dismiss='modal'>&times;</button>
        
          </div>

          <!-- Bagian body modal -->
          <div class='modal-body'>
                <div class='tablediv'>
                <div class='tablediv-row tablediv-header'>
                    <div class='tablediv-cell'>ID</div>
                    <div class='tablediv-cell'>Nama Dokumen</div>
                    <div class='tablediv-cell'>litah</div>
                </div>";
                
                $xo=0;
                $data=mysqli_query($koneksi," SELECT * FROM buktidokumen WHERE id_kriteriadokumen=$t[id_kriteriadukumen]");
                while ($tj=mysqli_fetch_array($data)){	
                $xo++;
                                                    echo"

                <div class='tablediv-row'>
                    <div class='tablediv-cell'>$xo</div>
                    <div class='tablediv-cell'>$tj[nama_buktidokumen]</div>
                    <div class='tablediv-cell'>
           
                    <button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#ui$tj[id_buktidokumen]'>Lihat</button>
                    </div>
                </div>
                <!-- Bagian body modal 2 -->
                <div class='col-lg-12'>
                               <div class='modal fade' id='ui$tj[id_buktidokumen]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                           
                                            <h4 class='modal-title' id='H3'>Lihat Data upload </h4>
                                        </div>
                                        <!-- Bagian body modal -->
          <div class='modal-body'>
                <div class='tablediv'>
                <div class='tablediv-row tablediv-header'>
                    <div class='tablediv-cell'>ID</div>
                    <div class='tablediv-cell'>Nama Dokumen</div>
                    
                </div>
               
                ";
			
                $do=0;
                $teb=mysqli_query($koneksi," SELECT * FROM uploaddokumen WHERE id_buktidokumen=$tj[id_buktidokumen]");
                while ($tx=mysqli_fetch_array($teb)){	
                $do++;
                                                    echo" <div class='tablediv-row'>
                                                           <div class='tablediv-cell'>$do</div>
                    <div class='tablediv-cell'><a href='../dokumen/$tx[dokumen]' target='_blank'>$tx[keterangan]</a></div>
                    </div>";
                }
                                                         echo"
                
                
                </div>
          </div>
         
                                    </div>
                                 </div>
                                </div>
                        </div>	
                        <!-- tutup body modal 2 -->
                ";
                
    }
                                      echo"
                <!-- Menambahkan baris data lainnya -->
                </div>
          </div>
         

          <!-- Bagian footer modal -->
          <div class='modal-footer'>
            <button type='button' class='btn btn-danger' data-dismiss='modal'>Tutup</button>
          </div>
        </div>
      </div>
    </div>
                                            </tr>";
    }
                                      echo"  </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>		
        
          ";			
    
    ////////////////input 		
     ?>
          </section><!-- /.content -->
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
          </div>
          <strong>Copyright &copy; 2014-2015 <a href="http://sukait.com">mardybest</a>.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->


    <!-- jQuery 2.1.4 -->
    <script src="sys/bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="sys/bootstrap/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="sys/bootstrap/plugins/morris/morris.min.js"></script>
    <!-- FastClick -->
    <script src="sys/bootstrap/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="sys/bootstrap/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="sys/bootstrap/dist/js/demo.js"></script>
    <!-- page script -->
	<script>
      
      $(function () {
        "use strict";
        //DONUT CHART
  
        var donutData = <?php // Query SQL dengan JOIN dan GROUP BY
$sql = "SELECT p.id_paslon,p.nama_paslon, SUM(s.suara_sah) AS total_suara_sah
        FROM paslon p
        JOIN suara s ON p.id_paslon = s.id_paslon
        GROUP BY p.id_paslon";

$result = $koneksi->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        "label" =>  $row["nama_paslon"],
        "value" => $row["total_suara_sah"]
    );
}

echo json_encode($data);
?>;

var donut = new Morris.Donut({
    element: 'sales-chart',
    resize: true,
    colors: ["#3c8dbc", "#f56954", "#00a65a"],
    data: donutData,
    hideHover: 'auto'
});
        //BAR CHART
        var barData = <?php
// Query SQL dengan JOIN dan GROUP BY
$sql = "SELECT p.id_paslon,p.nama_paslon, SUM(s.suara_sah) AS total_suara_sah, SUM(s.suara_rusak) AS total_suara_rusak
        FROM paslon p
        JOIN suara s ON p.id_paslon = s.id_paslon
        GROUP BY p.id_paslon";

$result = $koneksi->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        "y" => $row["nama_paslon"],
        "a" => $row["total_suara_sah"],
        "b" => $row["total_suara_rusak"]
    );
}

echo json_encode($data);
?>;

var bar = new Morris.Bar({
    element: 'bar-chart',
    resize: true,
    data: barData,
    barColors: ['#00a65a', '#f56954'],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['Suara Sah', 'Suara Rusak'],
    hideHover: 'auto'
});


     
      
      });
    </script>
  </body>
</html>
