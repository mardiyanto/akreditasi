<?php
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='home'){
echo"
 <div class='row'>
                   <div class='col-lg-12'>
			<div class='panel panel-default'>
                            <div class='panel-heading'>
                           Sambutan
                            </div>
                            <div class='panel-body'>                         
				<p>Selamat Datang Di halaman Admin, Silahkan Pilih menu untuk pengaturan data yang di butuhkan guna mendapatkan hasil yang maksimal sesuai keinginan.</p>
                            </div>
			</div>
                   </div>
</div>";
include "grafik.php";
echo"<div class='row'>
                    <div class='col-xs-12'>
              <div class='panel panel-primary'>
			    <div class='box-header'>
				   <h3 class='box-title'>INFORMASI</h3>
                </div>
                <div class='box-header'>
				</div>
     <div class='box-body'>";
     $main=mysqli_query($koneksi,"SELECT * FROM submenu");

     while($r=mysqli_fetch_array($main)){           
     echo"<a href='$r[link_sub]' class='btn btn-app'>
                    <span class='badge bg-yellow'>3</span>
                    <i class='fa $r[icon_sub] fa-5x'></i> $r[nama_sub]
                  </a>";
                }           
                echo "

            </div>
			</div>
 </div>
			</div>
";
}
elseif($_GET['aksi']=='ikon'){
include "../ikon.php";
}
elseif($_GET['aksi']=='kriteriadukumen'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button><br><br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama kriteriadukumen</th>
                                                <th>Status</th>		  
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
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>aksi</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editkriteriadukumen&id_kriteriadukumen=$t[id_kriteriadukumen]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapuskriteriadukumen&id_kriteriadukumen=$t[id_kriteriadukumen]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_kriteriadukumen] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
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
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data </h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputkriteriadukumen'>
                                                <div class='form-group'>
                            <label>Nama kriteriadukumen</label>
                            <input type='text' class='form-control' name='nama_kriteriadukumen'/><br>
                            
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
}
     
/////////////////////////////////////////////////////////////////////////////////////////////////
    
elseif($_GET['aksi']=='editkriteriadukumen'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM kriteriadukumen WHERE id_kriteriadukumen=$_GET[id_kriteriadukumen] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[nama_kriteriadukumen] 
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditkriteriadukumen&id_kriteriadukumen=$t[id_kriteriadukumen]'>
           <div class='form-grup'>
            <label>Nama kriteriadukumen</label>
            <input type='text' class='form-control' value='$t[nama_kriteriadukumen]' name='nama_kriteriadukumen'/><br>
            
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
}
elseif($_GET['aksi']=='buktidokumen'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button><br><br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama buktidokumen</th>
                                                <th>Status</th>		  
                                          </tr></thead>
                        <tbody>
                        ";
                
    $no=0;
    $tebaru=mysqli_query($koneksi," SELECT * FROM buktidokumen ");
    while ($t=mysqli_fetch_array($tebaru)){	
    $no++;
                                        echo"<tr>
                                            <td>$no</td>
                                                <td>$t[nama_buktidokumen]</td>
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>aksi</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editbuktidokumen&id_buktidokumen=$t[id_buktidokumen]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapusbuktidokumen&id_buktidokumen=$t[id_buktidokumen]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_buktidokumen] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
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
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data </h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputbuktidokumen'>
                                                <div class='form-group'>
                            <label>Nama buktidokumen</label>
                            <input type='text' class='form-control' name='nama_buktidokumen'/><br>
                            <label>Pilih kecamatan</label>
            <select class='form-control select2' style='width: 100%;' name='id_kriteriadokumen'>
            <option value='' selected>Pilih kriteriadukumen</option>"; 
             $sql=mysqli_query($koneksi,"SELECT * FROM kriteriadukumen");
             while ($cx=mysqli_fetch_array($sql))
             {
                echo "<option value=$cx[id_kriteriadukumen]>$cx[nama_kriteriadukumen]</option>";
             }
                echo "
            </select><br><br>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
}
     
/////////////////////////////////////////////////////////////////////////////////////////////////
    
elseif($_GET['aksi']=='editbuktidokumen'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM buktidokumen WHERE id_buktidokumen=$_GET[id_buktidokumen] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[nama_buktidokumen] 
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditbuktidokumen&id_buktidokumen=$t[id_buktidokumen]'>
           <div class='form-grup'>
            <label>Nama buktidokumen</label>
            <input type='text' class='form-control' value='$t[nama_buktidokumen]' name='nama_buktidokumen'/><br>
            <select class='form-control select2' style='width: 100%;' name='id_kriteriadokumen'>
            <option value='$t[id_kriteriadokumen]' selected>Pilih kriteriadukumen</option>"; 
             $sql=mysqli_query($koneksi,"SELECT * FROM kriteriadukumen");
             while ($cx=mysqli_fetch_array($sql))
             {
                echo "<option value=$cx[id_kriteriadukumen]>$cx[nama_kriteriadukumen]</option>";
             }
                echo "
            </select><br><br>
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
}
elseif($_GET['aksi']=='uploaddokumen'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data Admin
                            </button>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>nama</th>
                                            <th>keterangan</th>		  
                                        </tr>
                                    </thead>
				    ";
			
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM uploaddokumen ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"<tbody>
                                        <tr>
                                            <td>$t[dokumen]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[keterangan]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editadmin&user_id=$t[user_id]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusadmin&user_id=$t[user_id]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[user_username] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>
                                    </tbody>";
}
                                echo"</table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input</h4>
                                        </div>
                                                  <div class='box-body'>
            <form action='input.php?aksi=prosesupload' method='post' enctype='multipart/form-data'>
              <div class='form-group'>
              <label>Nama id_kriteriadukumen</label>
              <input type='text' class='form-control' name='id_kriteriadukumen' required='required'>
            </div>
              <div class='form-group'>
                <label>Keterangan</label>
                <input type='text' class='form-control' name='keterangan'>
              </div>
              <div class='form-group'>
                <label>Foto</label>
                <input type='file' name='dokumen'>
              </div>
              <div class='form-group'>
                <input type='submit' class='btn btn-sm btn-primary' value='Simpan'>
              </div>
            </form>
          </div>
									
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='kecamatan'){
    echo"
    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                Data kecamatan
                            </div>
                            <div class='panel-body'>
                                <ul class='nav nav-pills'>
                                    <li class='active'><a href='#home-pills' data-toggle='tab'>Data kecamatan</a>
                                    </li>
                                    <li><a href='#profile-pills' data-toggle='tab'>Input kecamatan</a>
                                    </li>
                                   
                                </ul>
    
                                <div class='tab-content'>
                                    <div class='tab-pane fade in active' id='home-pills'>
                                        <h4>Data kecamatan </h4>
                                       
                       <div class='panel-body'>
                                <div class='table-responsive'>
                                    <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                            </tr>
                                        </thead>
                        ";
                        $no=0;
                    $tebaru=mysqli_query($koneksi," SELECT * FROM kecamatan ORDER BY id_kecamatan DESC ");
    while ($t=mysqli_fetch_array($tebaru)){
                  
    $no++;    
                                        echo"<tbody>
                                            <tr>
                                                <td>$no</td>
                                                <td>	       <div class='btn-group'>
                          <a href='index.php?aksi=detaildesa&id_kecamatan=$t[id_kecamatan]' class='btn btn-info'>$t[nama_kecamatan]</a>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editkecamatan&id_kecamatan=$t[id_kecamatan]'>edit</a></li>
                            <li><a href='hapus.php?aksi=hapuskecamatan&id_kecamatan=$t[id_kecamatan]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_kecamatan] ?')\">hapus</a></li>
                          </ul>
                        </div></td>
                                            </tr>
                                           
                                        </tbody>";
    }
                                    echo"</table>
                                </div>
                            </div>
                     </div>
                     
                     
                                    <div class='tab-pane fade' id='profile-pills'>
                                        <h4>Input kecamatan</h4>
                                       
    <form id='form1' method='post' enctype='multipart/form-data' action='input.php?aksi=inputkecamatan'>
             <div class='form-grup'>
            <label>Nama kecamatan</label>
            <input type='text' class='form-control'  name='nama_kecamatan'/><br>
            <label>Pilih kecamatan</label>
            <select class='form-control select2' style='width: 100%;' name=id_kab>
            <option value='' selected>Pilih kriteriadukumen</option>"; 
             $sql=mysqli_query($koneksi,"SELECT * FROM kriteriadukumen ORDER BY id_kab");
             while ($c=mysqli_fetch_array($sql))
             {
                echo "<option value=$c[id_kab]>$c[nama_kriteriadukumen]</option>";
             }
                echo "
            </select><br><br>
            
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> 
        </form>  
    
                    </div></div>
                                </div>
                            </div>
                        </div>
               
    ";}
    
elseif($_GET['aksi']=='editkecamatan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM kecamatan WHERE id_kecamatan=$_GET[id_kecamatan] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' enctype='multipart/form-data' action='edit.php?aksi=proseseditkecamatan&id_kecamatan=$_GET[id_kecamatan]'>
           <div class='form-grup'>
            <label>Nama kecamatan</label>
            <input type='text' class='form-control' value='$t[nama_kecamatan]' name='nama_kecamatan'/><br>
            <label>Pilih kecamatan</label>
            <select class='form-control select2' style='width: 100%;' name=id_kab>
            <option value='' selected>Pilih kriteriadukumen $t[id_kab]</option>"; 
             $sql=mysqli_query($koneksi,"SELECT * FROM kriteriadukumen ORDER BY id_kab");
             while ($c=mysqli_fetch_array($sql))
             {
                echo "<option value=$c[id_kab]>$c[nama_kriteriadukumen]</option>";
             }
                echo "
            </select><br><br>
            <a href='index.php?aksi=kecamatan' class='btn btn-default' data-dismiss='modal'>kembali</a>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div> 
    ";	
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='desa'){
    echo"
    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                Data desa
                            </div>
                            <div class='panel-body'>
                                <ul class='nav nav-pills'>
                                    <li class='active'><a href='#home-pills' data-toggle='tab'>Data desa</a>
                                    </li>
                                    <li><a href='#profile-pills' data-toggle='tab'>Input desa</a>
                                    </li>
                                   
                                </ul>
    
                                <div class='tab-content'>
                                    <div class='tab-pane fade in active' id='home-pills'>
                                        <h4>Data desa </h4>
                                       
                       <div class='panel-body'>
                                <div class='table-responsive'>
                                    <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>kecamatan</th>
                                                <th>desa</th>
                                            </tr>
                                        </thead><tbody>
                        ";
                        $no=0;
                    $tebaru=mysqli_query($koneksi," SELECT * FROM desa,kecamatan WHERE desa.id_kecamatan=kecamatan.id_kecamatan  ORDER BY desa.id_desa DESC ");
    while ($t=mysqli_fetch_array($tebaru)){
                  
    $no++;    
                                        echo"
                                            <tr>
                                                <td>$no</td>
                                                <td>$t[nama_kecamatan]</td>
                                                <td>	       <div class='btn-group'>
                          <button type='button' class='btn btn-info'>$t[nama_desa]</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editdesa&id_desa=$t[id_desa]'>edit</a></li>
                            <li><a href='hapus.php?aksi=hapusdesa&id_desa=$t[id_desa]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_desa] ?')\">hapus</a></li>
                          </ul>
                        </div></td>
                                            </tr>
                                           
                                        ";
    }
                                    echo"</tbody></table>
                                </div>
                            </div>
                     </div>
                     
                     
                                    <div class='tab-pane fade' id='profile-pills'>
                                        <h4>Input desa</h4>
                                       
    <form id='form1' method='post' enctype='multipart/form-data' action='input.php?aksi=inputdesa'>
             <div class='form-grup'>
             <label>Pilih kecamatan</label>
             <select class='form-control select2' style='width: 100%;' name=id_kecamatan>
             <option value='' selected>Pilih kecamatan</option>"; 
              $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY id_kecamatan");
              while ($c=mysqli_fetch_array($sql))
              {
                 echo "<option value=$c[id_kecamatan]>$c[nama_kecamatan]</option>";
              }
                 echo "
             </select><br><br>
            <label>Nama desa</label>
            <input type='text' class='form-control'  name='nama_desa'/><br>
            
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> 
        </form>  
    
                    </div></div>
                                </div>
                            </div>
                        </div>
               
    ";}
    
elseif($_GET['aksi']=='editdesa'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM desa,kecamatan WHERE desa.id_kecamatan=kecamatan.id_kecamatan and  desa.id_desa=$_GET[id_desa] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' enctype='multipart/form-data' action='edit.php?aksi=proseseditdesa&id_desa=$_GET[id_desa]'>
           <div class='form-grup'>
           <label>Pilih kecamatan</label>
             <select class='form-control select2' style='width: 100%;' name=id_kecamatan>
             <option value='$t[id_kecamatan]' selected>$t[nama_kecamatan]</option>"; 
              $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY id_kecamatan");
              while ($c=mysqli_fetch_array($sql))
              {
                 echo "<option value=$c[id_kecamatan]>$c[nama_kecamatan]</option>";
              }
                 echo "
             </select><br><br>
            <label>Nama desa</label>
            <input type='text' class='form-control' value='$t[nama_desa]' name='nama_desa'/><br>
            <a href='index.php?aksi=desa' class='btn btn-default' data-dismiss='modal'>kembali</a>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div> 
    ";	
}

elseif($_GET['aksi']=='tps'){
            echo"<div class='row'>
                            <div class='col-lg-12'>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>INFORMASI DATA TPS
                                    </div>
                                    <div class='panel-body'>	
                            
                                        <a href='index.php?aksi=iputtps'  class='btn btn-info' >Tambah Data</a>  
                                        <a href='index.php?aksi=kecamatan'  class='btn btn-info' >kecamatan</a> 
                                        <a href='index.php?aksi=desa' class='btn btn-info' >desa</a>
                                        <a href='laporan.php?aksi=tps' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a></br></br>
                                           <div class='table-responsive'>		
                 <table id='example1' class='table table-bordered table-striped'>
                                                <thead>
                                                    <tr> <th>No</th>
                                                        <th>Kecamatan</th>
                                                        <th>Desa</th>
                                                        <th>No TPS</th>	 	 
                                                        <th>Aksi</th>	
                                                         
                                                    </tr>
                                                </thead><tbody>
                                ";
                        
            $no=0;
            $sql=mysqli_query($koneksi," SELECT * FROM tps,kecamatan,desa WHERE tps.id_kecamatan=kecamatan.id_kecamatan and tps.status='belum' and tps.id_desa=desa.id_desa  ORDER BY tps.id_tps ASC");
            while ($t=mysqli_fetch_array($sql)){	
            $no++;
                                                echo"
                                                    <tr><td>$no</td>
                                                        <td>$t[nama_kecamatan]</td>
                                                        <td><a href='index.php?aksi=inputsuara&id_tps=$t[id_tps]'>$t[nama_desa]</a></td> 
                                                        <td>TPS $t[no_tps]</td> 
                                        <td><div class='btn-group'>
                                  <button type='button' class='btn btn-info'>ubah</button>
                                  <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                                    <span class='caret'></span>
                                    <span class='sr-only'>Toggle Dropdown</span>
                                  </button>
                                  <ul class='dropdown-menu' role='menu'>
                                    <li><a href='index.php?aksi=edittps&id_tps=$t[id_tps]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                                    <li><a href='hapus.php?aksi=hapustps&id_tps=$t[id_tps]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[kecamatan] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                                    </ul>
                                </div></td>
                                                    </tr>";
            }
                                            echo"
                                                </tbody></table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           </div>";			
            
            ////////////////input admin			
            
            echo"			
            <div class='col-lg-12'>
                                    <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                        <h4 class='modal-title' id='H3'>Input Data</h4>
                                                    </div>
                                                    <div class='modal-body'>
                                                       <form role='form' method='post' action='input.php?aksi=inputtps'>
                                                        <div class='form-group'>
                                                        <label>Pilih kecamatan</label>
                                                        <select class='form-control select2' style='width: 100%;' name=id_kecamatan>
                                                        <option value='' selected>Pilih Kecamatan</option>"; 
                                                         $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY id_kecamatan");
                                                         while ($c=mysqli_fetch_array($sql))
                                                         {
                                                            echo "<option value=$c[id_kecamatan]>$c[nama_kecamatan]</option>";
                                                         }
                                                            echo "
                                                        </select><br><br>
                                                        <label>Pilih desa/Keluarahan</label>
                                                        <select class='form-control select2' style='width: 100%;' name=id_desa>
                                                        <option value='' selected>Pilih  desa/Keluarahan</option>"; 
                                                         $sql=mysqli_query($koneksi,"SELECT * FROM desa ORDER BY id_desa");
                                                         while ($c=mysqli_fetch_array($sql))
                                                         {
                                                            echo "<option value=$c[id_desa]>$c[nama_desa]</option>";
                                                         }
                                                            echo "
                                                        </select><br><br>
                                                        <label>no tps</label>
                                                        <input type='text' class='form-control' name='no_tps'/><br>
                                                      
                                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                        <button type='submit' class='btn btn-primary'>Save </button>
                                                    </div>
                                </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>			
            "; 
}
elseif($_GET['aksi']=='iputtps'){
    include "inputtps.php";
}
    /////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='edittps'){
            $tebaru=mysqli_query($koneksi," SELECT * FROM tps,kecamatan,desa WHERE tps.id_kecamatan=kecamatan.id_kecamatan and tps.id_desa=desa.id_desa and tps.id_tps=$_GET[id_tps] ");
            $t=mysqli_fetch_array($tebaru);
            echo"
            <div class='row'>
                            <div class='col-lg-12'>
                                <div class='panel panel-default'>
                                    <div class='panel-heading'>EDIT  $t[nama_kecamatan] $t[id_tps]
                                    </div>
                                    <div class='panel-body'>
            <form id='form1'  method='post' action='edit.php?aksi=prosesedittps&id_tps=$t[id_tps]'>
            <div class='form-group'>
                                         
            <label>Pilih kecamatan</label>
            <select class='form-control select2' style='width: 100%;' name=id_kecamatan>
            <option value='$t[id_kecamatan]' selected>$t[nama_kecamatan] </option>"; 
             $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY id_kecamatan");
             while ($c=mysqli_fetch_array($sql))
             {
                echo "<option value=$c[id_kecamatan]>$c[nama_kecamatan]</option>";
             }
                echo "
            </select><br><br>
            <label>Pilih desa/Keluarahan</label>
            <select class='form-control select2' style='width: 100%;' name=id_desa>
            <option value='$t[id_desa]'' selected>$t[nama_desa]</option>"; 
             $sql=mysqli_query($koneksi,"SELECT * FROM desa ORDER BY id_desa");
             while ($c=mysqli_fetch_array($sql))
             {
                echo "<option value=$c[id_desa]>$c[nama_desa]</option>";
             }
                echo "
            </select><br><br>
            <label>no tps</label>
            <input type='text' class='form-control' value='$t[no_tps]' name='no_tps'/><br>
                                                        
                                          
                    
                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                        <button type='submit' class='btn btn-primary'>Save </button>
                                                    </div> </div>
                </form></div> </div></div></div>
            ";
}
elseif($_GET['aksi']=='detaildesa'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI DATA TPS
                            </div>
                            <div class='panel-body'>	
                            <a href='index.php?aksi=iputtps'  class='btn btn-info' >Tambah Data</a>  
                             <a href='index.php?aksi=kecamatan'  class='btn btn-info' >kecamatan</a> 
                                <a href='index.php?aksi=desa' class='btn btn-info' >desa</a>
                                <a href='laporan.php?aksi=tps' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a></br></br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr> <th>No</th>
                                                <th>Kecamatan</th>
                                                <th>Desa</th>
                                                <th>tps</th>	 
                                                <th>Aksi</th>	
                                                 
                                            </tr>
                                        </thead><tbody>
                        ";  
    $no=0;
    $sql=mysqli_query($koneksi," SELECT * FROM tps,kecamatan,desa WHERE tps.id_kecamatan=kecamatan.id_kecamatan and tps.status='belum' and  tps.id_desa=desa.id_desa and  kecamatan.id_kecamatan=$_GET[id_kecamatan] ");
    while ($t=mysqli_fetch_array($sql)){	
    $no++;
                                        echo"
                                            <tr><td>$no</td>
                                                <td>$t[nama_kecamatan]</td>
                                                <td><a href='index.php?aksi=inputsuara&id_tps=$t[id_tps]'>$t[nama_desa]</a></td> 
                                                <td>TPS $t[no_tps]</td> 
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>ubah</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=edittps&id_tps=$t[id_tps]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapustps&id_tps=$t[id_tps]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[kecamatan] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>";
    }
                                    echo"
                                        </tbody></table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>";		
   ////////////////input admin			
            
   echo"			
   <div class='col-lg-12'>
                           <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                   <div class='modal-dialog'>
                                       <div class='modal-content'>
                                           <div class='modal-header'>
                                               <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                               <h4 class='modal-title' id='H3'>Input Data</h4>
                                           </div>
                                           <div class='modal-body'>
                                              <form role='form' method='post' action='input.php?aksi=inputtps'>
                                               <div class='form-group'>
                                               <label>Pilih kecamatan</label>
                                               <select class='form-control select2' style='width: 100%;' name=id_kecamatan>
                                               <option value='' selected>Pilih Kecamatan</option>"; 
                                                $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY id_kecamatan");
                                                while ($c=mysqli_fetch_array($sql))
                                                {
                                                   echo "<option value=$c[id_kecamatan]>$c[nama_kecamatan]</option>";
                                                }
                                                   echo "
                                               </select><br><br>
                                               <label>Pilih desa/Keluarahan</label>
                                               <select class='form-control select2' style='width: 100%;' name=id_desa>
                                               <option value='' selected>Pilih  desa/Keluarahan</option>"; 
                                                $sql=mysqli_query($koneksi,"SELECT * FROM desa ORDER BY id_desa");
                                                while ($c=mysqli_fetch_array($sql))
                                                {
                                                   echo "<option value=$c[id_desa]>$c[nama_desa]</option>";
                                                }
                                                   echo "
                                               </select><br><br>
                                               <label>no tps</label>
                                               <input type='text' class='form-control' name='no_tps'/><br>
                                             
                                               <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                               <button type='submit' class='btn btn-primary'>Save </button>
                                           </div>
                       </form>
                                       </div>
                                   </div>
                               </div>
                       </div>
               </div>			
   "; 
}                 	

/////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='inputsuara'){
                $tebaru=mysqli_query($koneksi," SELECT * FROM tps,kecamatan,desa WHERE tps.id_kecamatan=kecamatan.id_kecamatan and tps.id_desa=desa.id_desa and tps.id_tps=$_GET[id_tps] ");
                $t=mysqli_fetch_array($tebaru);
                echo"
                <div class='row'>
                                <div class='col-lg-12'>
                                    <div class='panel panel-default'>
                                        <div class='panel-heading'>  $t[nama_kecamatan] TPS $t[no_tps]
                                        </div>
                                        <div class='panel-body'>
                <form id='form1'  method='post' action='input.php?aksi=inputsuarapaslon'>
                <div class='form-group'>
                                             
                <label>Pilih kecamatan</label>
                <select class='form-control select2' style='width: 100%;' name=id_kecamatan>
                <option value='$t[id_kecamatan]' selected>$t[nama_kecamatan] </option>"; 
                 $sql=mysqli_query($koneksi,"SELECT * FROM kecamatan ORDER BY id_kecamatan");
                 while ($c=mysqli_fetch_array($sql))
                 {
                    echo "<option value=$c[id_kecamatan]>$c[nama_kecamatan]</option>";
                 }
                    echo "
                </select><br><br>
                <label>Pilih desa/Keluarahan</label>
                <select class='form-control select2' style='width: 100%;' name=id_desa>
                <option value='$t[id_desa]' selected>$t[nama_desa]</option>"; 
                 $sql=mysqli_query($koneksi,"SELECT * FROM desa ORDER BY id_desa");
                 while ($c=mysqli_fetch_array($sql))
                 {
                    echo "<option value=$c[id_desa]>$c[nama_desa]</option>";
                 }
                    echo "
                </select><br><br>
                <label>Pilih Paslon</label>
                <select class='form-control select2' style='width: 100%;' name=id_paslon>
                "; 
                 $sql=mysqli_query($koneksi,"SELECT * FROM paslon ORDER BY id_paslon");
                 while ($c=mysqli_fetch_array($sql))
                 {
                    echo "<option value=$c[id_paslon]>$c[nama_paslon]</option>";
                 }
                    echo "
                </select><br><br>
                <input type='hidden' class='form-control' value='$t[id_tps]' name='id_tps'/><br>
                <label>Suara Sah</label>
                <input type='number' class='form-control' name='suara_sah'/><br>
                <label>Suara tidak Sah</label>
                <input type='number' class='form-control' value='0' name='suara_rusak'/><br>
                                                            
                                              
                        
                        <div class='modal-footer'>
                                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                            <button type='submit' class='btn btn-primary'>Save </button>
                                                        </div> </div>
                    </form></div> </div></div></div>
                ";
}
elseif($_GET['aksi']=='inputsuaratps'){
 include"kecamatan.php"; 
}   
elseif($_GET['aksi']=='inputdata'){
    echo"
    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                Data suara
                            </div>
                            <div class='panel-body'>
                                <div class='tab-content'>
                                    <div class='tab-pane fade in active' id='home-pills'>
                                        <h4>Data suara </h4>
                                        <a href='index.php?aksi=tps' class='btn btn-info' >DATA TPS</a>
                                        <a href='index.php?aksi=inputsuaratps' class='btn btn-info' >TAMBAH DATA SUARA PASLON</a>
                       <div class='panel-body'>
                                <div class='table-responsive'>
                                    <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>TPS</th>
                                                <th>Suara sah</th>
                                                <th>Suara rusak</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead><tbody>
                        ";
                        $no=0;
                    $tebaru=mysqli_query($koneksi," SELECT * FROM suara,paslon,tps,desa,kecamatan WHERE suara.id_paslon=paslon.id_paslon 
                    and suara.id_tps=tps.id_tps 
                    and tps.id_desa=desa.id_desa
                    and tps.id_kecamatan=kecamatan.id_kecamatan
                    ORDER BY suara.id_suara DESC ");
    while ($t=mysqli_fetch_array($tebaru)){
                  
    $no++;  
   $status= $t['status'];  
    $warna_tombol = ($status == 'sudah') ? 'btn-success' : 'btn-danger';
                                        echo"
                                            <tr>
                                                <td>$no</td>
                                                <td>$t[nama_paslon]</td>
                                                <td>$t[nama_kecamatan], $t[nama_desa] TPS $t[no_tps]</td>
                                                <td>$t[suara_sah]</td>
                                                <td>$t[suara_rusak]</td>
                                                <td><a href='edit.php?aksi=prosesupdatesuara&id_tps=$t[id_tps]' class='btn $warna_tombol'>status</a> 
                                                <a href='index.php?aksi=editsuara&id_suara=$t[id_suara]' class='btn $warna_tombol'>EDIT</a> 
                                                <a href='hapus.php?aksi=hapussuara&id_suara=$t[id_suara]' class='btn btn-danger' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_desa] $t[no_tps] ?')\">hapus</a></td>
                                            </tr>
                                           
                                        ";
    }
                                    echo"</tbody></table>
                                </div>
                            </div>
                     </div>
                     
       </div>
                                </div>
                            </div>
                        </div>
               
    ";}

elseif($_GET['aksi']=='editsuara'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM suara WHERE id_suara=$_GET[id_suara] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'> suara $t[id_suara]
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditsuara&id_suara=$t[id_suara]'>
    <div class='form-group'>
    <input type='hidden' class='form-control' value='$t[id_tps]' name='id_tps'/><br>
    <label>Suara Sah</label>
    <input type='number' class='form-control' value='$t[suara_sah]' name='suara_sah'/><br>
    <label>Suara tidak Sah</label>
    <input type='number' class='form-control' value='0' name='suara_rusak'/><br>
                                                
                                  
            
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
}
elseif($_GET['aksi']=='profil'){
echo"			
	<div class='row'>
	 <div class='col-xs-12'>
              <div class='panel panel-primary'>
			    <div class='box-header'>
				   <h3 class='box-title'>INFORMASI PROFIL</h3>
                </div>
                <div class='box-header'>
				</div>
                             <div class='box-body'>
		<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
	 <thead> 
	 <tr>
                                            <th>No</th>
                                            <th>Profil</th>
                                        </tr>
                                    </thead>
				   <tbody> ";
				$no=0;   
				$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil ='1'");
while ($t=mysqli_fetch_array($tebaru)){
                $isi_berita = strip_tags($t['isi']); 
                $isi = substr($isi_berita,0,70); 
                $isi = substr($isi_berita,0,strrpos($isi," ")); 
$no++;    
                                    echo"
                                        <tr>
                                            <td>$no</td>
                                            <td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[nama]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editprofil&id_p=$t[id_profil]'>edit</a></li>
						<li><a href='index.php?aksi=viewprofil&id_p=$t[id_profil]' >view</a></li>
                        </ul>
                    </div></td>
                                       </tr>                                      
                                    ";
}
                                echo"</tbody></table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>	
	";
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editprofil'){
$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT PROFIL
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' enctype='multipart/form-data' action='master/profil.php?act=editpro&id_p=$_GET[id_p]'>
       <div class='form-grup'>
        <label>Nama Aplikasi</label>
        <input type='text' class='form-control' value='$t[nama_app]' name='nama_app'/><br>
        <label>Nama</label>
        <input type='text' class='form-control' value='$t[nama]' name='jd'/><br>
		<label>Alias</label>
        <input type='text' class='form-control' value='$t[alias]' name='alias'/><br>
		<label>Tahun</label>
        <input type='text' class='form-control' value='$t[tahun]' name='tahun'/><br>
		<label>Alamat</label>
        <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
        <label>Gambar Begroud Aplikasi</label>
        <input type='file' class='smallInput'  name='gambar'/><br>
		<label>Isi</label>
        <textarea id='text-ckeditor' class='form-control' name='isi'>$t[isi]</textarea></br>
		<script>CKEDITOR.replace('text-ckeditor');</script>
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div> </div>
";
}



elseif($_GET['aksi']=='viewprofil'){

$tebaru=mysqli_query($koneksi," SELECT * FROM profil WHERE id_profil=$_GET[id_p] ");

$t=mysqli_fetch_array($tebaru);

echo"<div class='row'>

                <div class='col-lg-12'>

                    <div class='panel panel-default'>

                        <div class='panel-heading'>$t[nama]

                        </div>

                        <div class='panel-body'>

		

<a href='javascript:history.go(-1)' class='btn btn-info'> Kembali</a></div>

";

echo"$t[isi] </div></div></div></div></div>";

}



elseif($_GET['aksi']=='admin'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data Admin
                            </button>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
                                            <th>nama</th>
                                            <th>User</th>		  
                                        </tr>
                                    </thead>
				    ";
			
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM user ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"<tbody>
                                        <tr>
                                            <td>$t[user_nama]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[user_username]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editadmin&user_id=$t[user_id]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusadmin&user_id=$t[user_id]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[user_username] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
                                        </tr>
                                    </tbody>";
}
                                echo"</table>
                            </div>
                        </div>
                    </div>
                </div>
               </div>";			

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input</h4>
                                        </div>
                                                  <div class='box-body'>
            <form action='input.php?aksi=inputadmin' method='post' enctype='multipart/form-data'>
              <div class='form-group'>
                <label>Nama</label>
                <input type='text' class='form-control' name='nama' required='required' placeholder='Masukkan Nama ..'>
              </div>
              <div class='form-group'>
                <label>Username</label>
                <input type='text' class='form-control' name='username' required='required' placeholder='Masukkan Username ..'>
              </div>
              <div class='form-group'>
                <label>Password</label>
                <input type='password' class='form-control' name='password' required='required' min='5' placeholder='Masukkan Password ..'>
              </div>
              <div class='form-group'>
                <label>Foto</label>
                <input type='file' name='foto'>
              </div>
              <div class='form-group'>
                <input type='submit' class='btn btn-sm btn-primary' value='Simpan'>
              </div>
            </form>
          </div>
									
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editadmin'){
$tebaru=mysqli_query($koneksi," SELECT * FROM user WHERE user_id=$_GET[user_id]");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[user_nama] $t[user_id]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditadmin&user_id=$t[user_id]'  enctype='multipart/form-data'>
    	<label>Nama Lengkap</label>
        <input type='text' class='form-control'  name='nama' value='$t[user_nama]'/>
	<label>User Name</label>
        <input type='text' class='form-control'  name='username' value='$t[user_username]'/>     
	<label>Password</label>
        <input type='text' class='form-control'  name='password'/> </br>
		 <label>Foto</label>
                  <input type='file' name='foto'></br>
	 <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
          <button type='submit' class='btn btn-primary'>Save </button>
    </form>  
</div> </div></div></div>
";
}


elseif($_GET['aksi']=='menu'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama Menu</th>
                                            <th>Link</th>	
                                            <th>Status</th>		  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM menu ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                        <td>$t[nama_menu]</td>
                                        <td>$t[link]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[status]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editmenu&id_menu=$t[id_menu]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusmenu&id_menu=$t[id_menu]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_menu] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
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

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputmenu'>
                                            <div class='form-group'>
                                            <label>Nama Menu</label>
						 <input type='text' class='form-control' name='nama_menu'/><br>
					<label>Link Menu</label>
						<input type='text' class='form-control' name='link'/><br>
                        <label>Link Dasbord</label>
						<input type='text' class='form-control' name='link_b'/><br>
						<label>Status Menu</label>
						<input type='text' class='form-control' name='status'/><br>
                        <label>Icon</label>
                        <input type='text' class='form-control' name='icon_menu'/><br>
                        <label>Status Aktif</label>
                        <select class='form-control select2' style='width: 100%;' name=aktif>
                        <option value='1' selected>Pilih</option> 
                        <option value='Y'>Y</option>
                        <option value='N'>N</option>
                    </select><br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}



/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editmenu'){
$tebaru=mysqli_query($koneksi," SELECT * FROM menu WHERE id_menu=$_GET[id_menu] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_menu] $t[id_menu]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditmenu&id_menu=$t[id_menu]'>
       <div class='form-grup'>
        <label>Nama Menu</label>
        <input type='text' class='form-control' value='$t[nama_menu]' name='nama_menu'/><br>
		<label>Link</label>
        <input type='text' class='form-control' value='$t[link]' name='link'/><br>
        <label>Link Dasbord</label>
		<input type='text' class='form-control' value='$t[link_b]' name='link_b'/><br>
		<label>Status</label>
        <input type='text' class='form-control' value='$t[status]' name='status'/><br>
        <label>Icon</label>
        <input type='text' class='form-control' value='$t[icon_menu]' name='icon_menu'/><br>
        <label>Status</label>
        <select class='form-control select2' style='width: 100%;' name=aktif>
		<option value='$t[aktif]' selected>$t[aktif]</option> 
		<option value='Y'>Y</option>
        <option value='N'>N</option>
	</select><br>
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='submenu'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button><br><br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama submenu</th>
                                                <th>Status</th>		  
                                          </tr></thead>
                        <tbody>
                        ";
                
    $no=0;
    $tebaru=mysqli_query($koneksi," SELECT * FROM submenu ");
    while ($t=mysqli_fetch_array($tebaru)){	
    $no++;
                                        echo"<tr>
                                            <td>$no</td>
                                                <td>$t[nama_sub]</td>
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>$t[nama_sub]</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editsubmenu&id_sub=$t[id_sub]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapussubmenu&id_sub=$t[id_sub]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_sub] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
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
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data </h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputsubmenu'>
                                                <div class='form-group'>
                            <label>Nama submenu</label>
                            <input type='text' class='form-control' name='nama_sub'/><br>
                            <label>Link</label>
                            <input type='text' class='form-control' name='link_sub'/><br>
                            <label>Pilih Menu</label>
            <select class='form-control select2' style='width: 100%;' name=id_menu>
            <option value='' selected>Pilih Menu Utama</option>"; 
            $sql=mysqli_query($koneksi,"SELECT * FROM menu ORDER BY id_menu");
            while ($c=mysqli_fetch_array($sql))
            {
                echo "<option value=$c[id_menu]>$c[nama_menu]</option>";
            }
        echo "
        </select><br>
                            <label>Icon submenu</label>
                            <input type='text' class='form-control' name='icon_sub'/><br>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
    }
    
    
    
    /////////////////////////////////////////////////////////////////////////////////////////////////
    
    elseif($_GET['aksi']=='editsubmenu'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM menu,submenu WHERE menu.id_menu=submenu.id_menu AND id_sub=$_GET[id_sub] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[nama_submenu] $t[id_sub]
                            </div>
                            <div class='panel-body'>
    <form id='form1'  method='post' action='edit.php?aksi=proseseditsubmenu&id_sub=$t[id_sub]'>
           <div class='form-grup'>
            <label>Nama submenu</label>
            <input type='text' class='form-control' value='$t[nama_sub]' name='nama_sub'/><br>
            <label>Link</label>
            <input type='text' class='form-control' value='$t[link_sub]' name='link_sub'/><br>
                <label>Pilih Menu</label>
            <select class='form-control select2' style='width: 100%;' name=id_menu>
            <option value='$t[id_menu]' selected>$t[id_menu]</option>"; 
            $sql=mysqli_query($koneksi,"SELECT * FROM menu ORDER BY id_menu");
            while ($c=mysqli_fetch_array($sql))
            {
                echo "<option value=$c[id_menu]>$c[nama_menu]</option>";
            }
        echo "
        </select><br>
                            <label>Icon submenu</label>
                            <input type='text' class='form-control' value='$t[icon_sub]' name='icon_sub'/><br>
            
            <div class='modal-footer'>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div> </div>
        </form></div> </div></div></div>
    ";
    }
elseif($_GET['aksi']=='golongan'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> <a href='laporan.php?aksi=golongan' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama golongan</th>
                                            <th>Jumlah</th>	
                                            <th>Status</th>		  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.gol) as jlh,golongan.id_gol,golongan.nama_gol FROM golongan LEFT JOIN pegawai ON pegawai.gol = golongan.id_gol GROUP BY golongan.id_gol ORDER BY id_gol ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_gol]</td>
                                            <td>$t[jlh]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>edit</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editgolongan&id_gol=$t[id_gol]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusgolongan&id_gol=$t[id_gol]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_gol] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
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

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputgolongan'>
                                            <div class='form-group'>
                                            <label>Nama Golongan</label>
						 <input type='text' class='form-control' name='nama_gol'/><br>
					</br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editgolongan'){
$tebaru=mysqli_query($koneksi," SELECT * FROM golongan WHERE id_gol=$_GET[id_gol] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_gol]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditgolongan&id_gol=$t[id_gol]'>
       <div class='form-grup'>
        <label>Nama Golongan</label>
        <input type='text' class='form-control' value='$t[nama_gol]' name='nama_gol'/><br>
	
		
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='jabatan'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> <a href='laporan.php?aksi=jabatan' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama jabatan</th>
                                            <th>Jumlah</th>
                                            <th></th>			  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.jabatan) as jlh,jabatan.id_jabatan,jabatan.nama_jabatan FROM jabatan LEFT JOIN pegawai ON pegawai.jabatan = jabatan.id_jabatan GROUP BY jabatan.id_jabatan ORDER BY id_jabatan ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_jabatan]</td>
                                            <td>$t[jlh]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>edit</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editjabatan&id_jabatan=$t[id_jabatan]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusjabatan&id_jabatan=$t[id_jabatan]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_jabatan] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
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

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputjabatan'>
                                            <div class='form-group'>
                                            <label>Nama jabatan</label>
						 <input type='text' class='form-control' name='nama_jabatan'/><br>
					</br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editjabatan'){
$tebaru=mysqli_query($koneksi," SELECT * FROM jabatan WHERE id_jabatan=$_GET[id_jabatan] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_jabatan]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditjabatan&id_jabatan=$t[id_jabatan]'>
       <div class='form-grup'>
        <label>Nama jabatan</label>
        <input type='text' class='form-control' value='$t[nama_jabatan]' name='nama_jabatan'/><br>
	
		
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='profesi'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> <a href='laporan.php?aksi=profesi' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama profesi</th>
                                            <th>Jumlah</th>	
                                            <th>Status</th>		  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$sql=mysqli_query($koneksi,"SELECT COUNT(pegawai.jurusan) as jlh,profesi.id_profesi,profesi.nama_profesi FROM profesi LEFT JOIN pegawai ON pegawai.jurusan = profesi.id_profesi GROUP BY profesi.id_profesi ORDER BY id_profesi ASC");
while ($t=mysqli_fetch_array($sql)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_profesi]</td>
                                            <td>$t[jlh]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>edit</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editprofesi&id_profesi=$t[id_profesi]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
						<li><a href='hapus.php?aksi=hapusprofesi&id_profesi=$t[id_profesi]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_gol] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
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

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputprofesi'>
                                            <div class='form-group'>
                                            <label>Nama profesi</label>
						 <input type='text' class='form-control' name='nama_profesi'/><br>
					</br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editprofesi'){
$tebaru=mysqli_query($koneksi," SELECT * FROM profesi WHERE id_profesi=$_GET[id_profesi] ");
$t=mysqli_fetch_array($tebaru);
echo"
<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_profesi]
                        </div>
                        <div class='panel-body'>
<form id='form1'  method='post' action='edit.php?aksi=proseseditprofesi&id_profesi=$t[id_profesi]'>
       <div class='form-grup'>
        <label>Nama profesi</label>
        <input type='text' class='form-control' value='$t[nama_profesi]' name='nama_profesi'/><br>
	
		
    	<div class='modal-footer'>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </div>
    </form></div> </div></div></div>
";
}
elseif($_GET['aksi']=='pegawai'){
echo"<div class='row'>
                <div class='col-lg-12'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>INFORMASI 
                        </div>
                        <div class='panel-body'>	
			<button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                Tambah Data
                            </button> <a href='laporan.php?aksi=pegawai' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                           	<div class='table-responsive'>		
	 <table id='example1' class='table table-bordered table-striped'>
                                    <thead>
                                        <tr>
										<th>No</th>
                                            <th>Nama pegawai</th>
                                            <th>Umur</th>
                                            <th>NIP</th>		  
                                      </tr></thead>
                    <tbody>
				    ";
			
$no=0;
$sqli = mysqli_query($koneksi,"SELECT id_pegawai, nama_pegawai, nip, tgl_lahir, (YEAR(CURDATE())-YEAR(tgl_lahir)) AS umur FROM pegawai");
while ($t=mysqli_fetch_array($sqli)){	
$no++;
                                    echo"<tr>
										<td>$no</td>
                                            <td>$t[nama_pegawai] </td>
                                            <td>$t[umur]</td>
							<td><div class='btn-group'>
                      <button type='button' class='btn btn-info'>$t[nip]</button>
                      <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                        <span class='caret'></span>
                        <span class='sr-only'>Toggle Dropdown</span>
                      </button>
                      <ul class='dropdown-menu' role='menu'>
                        <li><a href='index.php?aksi=editpegawai&id_pegawai=$t[id_pegawai]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
						<li><a href='hapus.php?aksi=hapuspegawai&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pegawai] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                        </ul>
                    </div></td>
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

////////////////input admin			

echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                                           <form role='form' method='post' action='input.php?aksi=inputpegawai'>
                                            <div class='form-group'>
                                            <label>Nama pegawai</label>
						                    <input type='text' class='form-control' name='nama_pegawai'/><br>
						                    <label>NIP pegawai/Nik</label>
                                            <input type='text' class='form-control' name='nip'/><br>
                                            <label>Tanggal Lahir pegawai</label>
                                            <input type='date' class='form-control' name='tgl_lahir'/><br>
                                            <label>Status Pegawai</label>
                                            <select class='form-control select2' style='width: 100%;' name=status>
                                                <option value='' selected>--Pilih Status Pegawai</option>
                                                <option value='PNS'>PNS</option>
                                                <option value='P3K'>P3K</option>
                                                <option value='TKS'>TKS SK PUSKES</option>
                                                <option value='THLS'>THLS SK DINAS</option>
                                            </select><br><br>
											<label>Jenis Kelamin</label>
											<select class='form-control select2' style='width: 100%;' name=jenis_kelamin>
											<option value='' selected>--Pilih Jenis Kelamin--</option>
											<option value='Laki-Laki'>Laki-Laki</option>
											<option value='Perempuan'>Perempuan</option>
											</select><br></br>
											<label>Tingkat Pendidikan</label>
											<select class='form-control select2' style='width: 100%;' name=tingkat>
											<option value='' selected>--Pilih Tingkat Pendidikan--</option>"; 
											$sql=mysqli_query($koneksi,"SELECT * FROM pendidikan ORDER BY id_pen");
											while ($c=mysqli_fetch_array($sql))
											{
												echo "<option value=$c[id_pen]>$c[jenjang]</option>";
											}
										    echo "</select>
											<br><br>
											<label>Jurusan Pendidikan</label>
											<select class='form-control select2' style='width: 100%;' name=jurusan>
											<option value='' selected>--Pilih Jenis Jurusan--</option>"; 
											$sql=mysqli_query($koneksi,"SELECT * FROM profesi ORDER BY id_profesi");
											while ($c=mysqli_fetch_array($sql))
											{
												echo "<option value=$c[id_profesi]>$c[nama_profesi]</option>";
											}
										    echo "</select><br><br>
												  <label>Golongan PNS</label>
												   <select class='form-control select2' style='width: 100%;' name=gol>
													<option value='' selected>--Pilih Golongan Jika Pns--</option>"; 
													$sql=mysqli_query($koneksi,"SELECT * FROM golongan ORDER BY id_gol");
													while ($c=mysqli_fetch_array($sql))
													{
														echo "<option value=$c[id_gol]>$c[nama_gol]</option>";
													}
												echo "</select><br>
                                             </br>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 
}

/////////////////////////////////////////////////////////////////////////////////////////////////

elseif($_GET['aksi']=='editpegawai'){
$tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE id_pegawai=$_GET[id_pegawai] ");
$t=mysqli_fetch_array($tebaru);
echo"  <div class='row'>
 <form id='form1'  method='post' action='edit.php?aksi=proseseditpegawai&id_pegawai=$t[id_pegawai]'>       <!-- /.col -->
        <div class='col-md-12'>
          <div class='nav-tabs-custom'>
            <ul class='nav nav-tabs'>
              <li class='active'><a href='#activity' data-toggle='tab'>Data Pribadi</a></li>
              <li><a href='#settings' data-toggle='tab'>Data Pendidikan </a></li>
			  <li><a href='#cpns' data-toggle='tab'>Data Jabatan</a></li>
			  
            </ul>
            <div class='tab-content'>
              <div class='active tab-pane' id='activity'>
                <!-- Post -->
			                    <div class='panel panel-default'>
                        <div class='panel-heading'>EDIT  $t[nama_pegawai]
                        </div>
                        <div class='panel-body'>
	<div class='col-md-3'>					
        <label>Nama pegawai</label>
        <input type='text' class='form-control' value='$t[nama_pegawai]' name='nama_pegawai'/><br>
	<label>Nip pegawai</label>
        <input type='text' class='form-control' value='$t[nip]' name='nip'/><br>
        <label>User Name</label>
     <input type='text' class='form-control'  name='username'/><br>
 <label>Password</label>
     <input type='text' class='form-control'  name='password'/><br>
	 </div>
	 	<div class='col-md-3'>					
        <label>Tempat Lahir pegawai</label>
        <input type='text' class='form-control' value='$t[tmp_lahir]' name='tmp_lahir'/><br>
	<label>Tanggal Lahir pegawai</label>
        <input type='date' class='form-control' value='$t[tgl_lahir]' name='tgl_lahir'/><br>
	 </div>
	 <div class='col-md-3'>					
        <label>Jenis Kelamin</label>
		<select class='form-control select2' style='width: 100%;' name=jenis_kelamin>
		<option value=$t[jenis_kelamin] selected>$t[jenis_kelamin]</option>
	<option value='Laki-Laki'>Laki-Laki</option>
	<option value='Perempuan'>Perempuan</option>
	</select><br>
	<label>Nomor HP</label>
        <input type='text' class='form-control' value='$t[no_hp]' name='no_hp'/><br>
	 </div>
	  <div class='col-md-3'>					
        <label>Agama</label>
			<select class='form-control select2' style='width: 100%;' name=agama>
		<option value=$t[agama] selected>$t[agama]</option>
	<option value='Islam'>Islam</option>
			<option value='Kristen Protestan'>Kristen Protestan</option>
			<option value='Kristen Katholik'>Kristen Katholik</option>
			<option value='Hindu'>Hindu</option>
			<option value='Budha'>Budha</option>
	</select>
        <br>
	<label>Alamat Lengkap</label>
        <input type='text' class='form-control' value='$t[alamat]' name='alamat'/><br>
	 </div>
  
  </div> </div>
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <div class='tab-pane' id='settings'>
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form data
                                 </div>
                                
                                <div class='panel-body'>
									<div class='col-md-3'>					
        <label>Tingkat Pendidikan</label>
		<select class='form-control select2' style='width: 100%;' name=tingkat>
		<option value=$t[tingkat] selected>$t[tingkat]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM pendidikan ORDER BY id_pen");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_pen]>$c[jenjang]</option>";
		}
	echo "</select>
        <br>
	<label>Jurusan Pendidikan</label>
		<select class='form-control select2' style='width: 100%;' name=jurusan>
		<option value=$t[jurusan] selected>$t[jurusan]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM profesi ORDER BY id_profesi");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_profesi]>$c[nama_profesi]</option>";
		}
	echo "</select>
        <br>
	 </div>
	 	<div class='col-md-3'>					
        <label>Tahun Lulus</label>
        <input type='text' class='form-control' value='$t[tahun_lulus]' name='tahun_lulus'/><br>
	  <label>Lulus CPNS Tahun</label>
        <input type='date' class='form-control' value='$t[cpns]' name='cpns'/><br>
	 </div>
	  	<div class='col-md-3'>					
        <label>Tahun Pengakatan PNS</label>
        <input type='date' class='form-control' value='$t[pns]' name='pns'/><br>
	  <label>Golongan PNS</label>
       <select class='form-control select2' style='width: 100%;' name=gol>
		<option value=$t[gol] selected>$t[gol]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM golongan ORDER BY id_gol");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_gol]>$c[nama_gol]</option>";
		}
	echo "</select><br>
	 </div>
			<div class='col-md-3'>					
        <label>TMT Golongan</label>
        <input type='date' class='form-control' value='$t[tmp]' name='tmp'/><br>
	  <label>Eselon</label>
        <input type='text' class='form-control' value='$t[eselon]' name='eselon'/><br>
	 </div>						</div>
								</div>
								</div> <!-- /.tab-pane -->

              <div class='tab-pane' id='cpns'>
                                      <div class='panel panel-default'>
                                <div class='panel-heading'>
									Form data
                                 </div>
                                
                                <div class='panel-body'>

  	<div class='col-md-3'>					
        <label>Taggal Jabatan</label>
        <input type='date' class='form-control' value='$t[tmt_jabatan]' name='tmt_jabatan'/><br>
	  <label>Jabatan</label>
       <select class='form-control select2' style='width: 100%;' name=jabatan>
		<option value=$t[jabatan] selected>$t[jabatan]</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM jabatan ORDER BY id_jabatan");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value=$c[id_jabatan]>$c[nama_jabatan]</option>";
		}
	echo "</select><br>
	 </div>
	
     <div class='col-md-3'>					
     <label>Masa Kerja </label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Tahun</div>
     <input type='text' class='form-control' value='$t[masa_kerja_thn]' name='masa_kerja_thn' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div><br>
     <label>Masa Kerja </label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Bulan</div>
     <input type='text' class='form-control' value='$t[masa_kerja_bln]' name='masa_kerja_bln' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div><br>
  </div>
	 	 <div class='col-md-3'>					
        <label>email</label>
        <input type='text' class='form-control' value='$t[email]' name='email'/><br>
	<label>Status</label>
	<select class='form-control select2' style='width: 100%;' name=status>
		<option value=$t[status] selected>$t[status]</option>
		<option value='PNS'>PNS</option>
		<option value='P3K'>P3K</option>
        <option value='TKS'>TKS SK PUSKES</option>
        <option value='THLS'>THLS DINAS</option>
     </select><br><br>
     <label>Mempunyai Pesiunan (janda)</label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Rp</div>
     <input type='text' class='form-control' value='$t[pesiunan_janda]' name='pesiunan_janda' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div>
     <br>
	 </div>
     <div class='col-md-3'>
     <label>Total Gaji PNS (Rp)</label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Rp</div>
                  <input type='text' class='form-control' value='$t[gaji_pns]' name='gaji_pns' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/> 
                </div>					
    <br>
     <label>Pekerjaan Lainya</label>
     <input type='text' class='form-control' value='$t[pekerjaan_lain]' name='pekerjaan_lain'/><br>
     <label>Penghasilan Lain (Rp)</label>
     <div class='input-group'>
     <div class='input-group-addon'>
                  Rp</div>
     <input type='text' class='form-control' value='$t[penghasilan_lain]' name='penghasilan_lain' onKeyUp=\"this.value=this.value.replace(/[^0-9]/g,'')\"/>
     </div>
     <br>

  </div>
</div></div></div> <!-- /.tab-pane -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
		   	<div class='modal-footer'>
                                            <a href='index.php?aksi=pegawai' class='btn btn-default'>Close</a>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div> </form>
        </div> 
";
}

elseif($_GET['aksi']=='uploadfile'){
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
                                <th>Nama pegawai</th>
                                <th>NIP</th>		  
                          </tr></thead>
        <tbody>
        ";

$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM pegawai ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                                <td>$t[nama_pegawai]</td>
                <td><div class='btn-group'>
                <a class='btn btn-info' href='index.php?aksi=listuploadfile&id_pegawai=$t[id_pegawai]' title='Edit'>$t[nip]</a>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>
            <li><a href='index.php?aksi=editpegawai&id_pegawai=$t[id_pegawai]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
            <li><a href='hapus.php?aksi=hapuspegawai&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pegawai] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
            </ul>
        </div></td>
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
    }
elseif($_GET['aksi']=='listuploadfile'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>Berkas  $t[nama_pegawai]
            </div>
            <div class='panel-body'>
            <a class='btn btn-info' href='index.php?aksi=prosesupload&id_pegawai=$t[id_pegawai]' title='Edit'>Tambah File</a>	<br><br>
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Berkas</th>
                                <th>Download</th>		  
                          </tr></thead>
        <tbody>
        ";

$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM file WHERE  id_pegawai=$_GET[id_pegawai] ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                                <td>$t[nama_file]</td>
                <td><a class='btn btn-info' href='upload/$t[file_name]' title='dowload'><i class='fa  fa-download'></i></a>
                <a class='btn btn-danger' href='hapus.php?aksi=hapusberkas&file_id=$t[file_id]&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_file] ?')\" title='Hapus'><i class='fa  fa-remove '></i></a></td>
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
}
elseif($_GET['aksi']=='prosesupload'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>INFORMASI 
            </div>
            <div class='panel-body'>	
            <div class='form-grup'>
            <form id='upload_form' action='upload.php' method='post' enctype='multipart/form-data'>
            <div class='col-md-12'>					
            <label>Nama pegawai</label>
            <input type='text' class='form-control' value='$t[nama_pegawai]' name='nama_pegawai'/>
                    <input type='hidden' class='form-control' value='$t[id_pegawai]'  name='id_pegawai'/><br>
            <label>Nama File</label>
            <input type='text' class='form-control' name='nama_file'/><br>
           <label>File</label>
          <input  name='upload' id='upload' type='file' class='form-control'/>
          <br>
        <div id='progress-bar'></div>
        <br>
     <div id='targetLayer' style='display:none;'></div><br>
         </div>
    
        
            
            <div class='modal-footer'>
                                                <a class='btn btn-default' data-dismiss='modal'>Close</a>
                                                <button 'btnSubmit' class='btn btn-primary' class='form-control'>Upload</button>
                                            </div> </div>
                                            </form>                 
                </div>
            </div>
        </div>
    </div>		

";	    
    }
elseif($_GET['aksi']=='tunjangan'){
        echo"<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>INFORMASI TUNJANGAN
                </div>
                <div class='panel-body'>	
                       <div class='table-responsive'>		
    <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                <th>No</th>
                                    <th>Nama pegawai</th>
                                    <th>Tunjangan</th>
                                    <th>NIP</th>		  
                              </tr></thead>
            <tbody>
            ";
    
    $no=0;
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai ");
    while ($t=mysqli_fetch_array($tebaru)){	
    $no++;
                            echo"<tr>
                                <td>$no</td>
                                    <td>$t[nama_pegawai]</td>
                                    <td>"; if($t['status_pg']=='baru'){
                                           echo"<a class='btn btn-info' href='index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]'>Tambah keluarga</a>";
                                            }
                                          else if($t['status_pg']=='ada'){
                                            echo"<a class='btn btn-primary' href='input.php?aksi=inputtunjangan&id_pegawai=$t[id_pegawai]' >Ajukan Tunjangan</a>";
                                          } else { 
                                            echo"<a class='btn btn-primary' href='index.php?aksi=lihattunjangan' >Lihat Pengajuan</a>";
                                             }
                                       echo"
                                  </td>
                    <td><div class='btn-group'>
                    <a class='btn btn-info' href='index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]'>data keluarga</a>
              <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                <span class='caret'></span>
                <span class='sr-only'>Toggle Dropdown</span>
              </button>
              <ul class='dropdown-menu' role='menu'>
                <li><a href='index.php?aksi=editpegawai&id_pegawai=$t[id_pegawai]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
                <li><a href='hapus.php?aksi=hapuspegawai&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pegawai] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                </ul>
            </div></td>
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
 }
 elseif($_GET['aksi']=='listtunjangan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>Berkas  $t[nama_pegawai]
            </div>
            <div class='panel-body'>
            <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                               Data Istri/Suami
                            </button>  <button class='btn btn-info' data-toggle='modal' data-target='#uiModal1'>
                            Tambah Data Anak
                        </button>  <br><br>
          
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Keluarga</th>
                                <th>Status Keluarga</th>
                                <th></th>
                                <th></th>		  
                          </tr></thead>
        <tbody>
        ";
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM keluarga WHERE  id_pegawai=$_GET[id_pegawai] ");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                            <td>$t[nama_keluarga]</td>
                <td>$t[status_keluarga]</td>
                <td>"; if($t['tunjang_status']=='pengajuan'){
                    echo"<a class='btn btn-primary' href='edit.php?aksi=tidakajukantunjangan&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin tidak mengajukan tunjangan Untuk  $t[status_keluarga] anda atas nama $t[nama_keluarga]  ?')\" >Di Ajukan</a>";
                     }
                   else if($t['tunjang_status']=='tidak'){
                     echo" <a class='btn btn-primary'href='edit.php?aksi=ajukantunjangan&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin mengajukan tunjangan Untuk  $t[status_keluarga] anda atas nama $t[nama_keluarga]  ?')\"  >Tidak Di Ajukan</a>";
                   } else { 
                     echo"<a class='btn btn-danger' href='edit.php?aksi=ajukantunjangan&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin mengajukan tunjangan Untuk  $t[status_keluarga] anda atas nama $t[nama_keluarga]  ?')\" >Anjukan Tunjangan</a>";
                      }
                echo"</td>
                <td><div class='btn-group'>
                <a class='btn btn-info' href='index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]'>Aksi</a>
          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
            <span class='caret'></span>
            <span class='sr-only'>Toggle Dropdown</span>
          </button>
          <ul class='dropdown-menu' role='menu'>"; if($t['status_aktif']=='anak'){ echo"<li><a href='index.php?aksi=editkeluargaanak&id_keluarga=$t[id_keluarga]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>"; }
            else { echo"<li><a href='index.php?aksi=editkeluarga&id_keluarga=$t[id_keluarga]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>";  }
            echo" <li><a href='hapus.php?aksi=hapuskeluarga&id_keluarga=$t[id_keluarga]&id_pegawai=$_GET[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_keluarga] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
            </ul>
        </div>
                </td>
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
echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data </h4>
                                        </div>
                                        <div class='modal-body'>
                         <form role='form' method='post' action='input.php?aksi=inputkeluarga'>
                                            <div class='form-group'>
                         <label>Nama Suami/Istri</label>
                         <input type='hidden' class='form-control' value='$_GET[id_pegawai]' name='id_pegawai'/> 
                         <input type='hidden' class='form-control' value='istri' name='status_aktif'/>                   
						 <input type='text' class='form-control' name='nama_keluarga'/><br>
                         <label>Jenis Kelamin</label>
	                    <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
		                <option value='' selected>Pilih Jenis Kelamin</option>
		                <option value=Laki-Laki>Laki-Laki</option>
                        <option value=Perempuan>Perempuan</option>
                        </select><br>
                        <label>Tempat Lahir</label>
                        <input type='text' class='form-control' name='tempatlahir_keluarga'/>
                       </br>
                       <label>Tgl Lahir</label>
                       <input type='date' class='form-control' name='tgllahir_keluarga'/>
                      </br>
                         <label>Status</label>
	                    <select class='form-control select2' style='width: 100%;' name=status_keluarga>
		                <option value='' selected>Pilih Status Keluarga</option>
		                <option value=istri>Istri</option>
                        <option value=suami>suami</option>
                        </select><br>
                        <label>Pekerjaan</label>
	                    <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
		                <option value='' selected>Pilih Pekerjaan</option>
		                <option value=bekerja>bekerja</option>
                        <option value=tidakbekerja>tidak bekerja</option>
                        </select><br>
                        <label>Penghasilan (jika bekerja)</label>
						 <input type='text' class='form-control' name='penghasilan_keluarga'/>
					    </br>
                        <label>Keterangan Istri/Suami</label>
                        <input type='text' class='form-control' name='ket_keluarga'/>
                       </br>
                       <label>Status Tunjangan</label>
                       <select class='form-control select2' style='width: 100%;' name=tunjang_status>
                       <option value='' selected>Pilih Tunjangan</option>
                       <option value=pengajuan>ajukan Tunjangan</option>
                       <option value=tidak>tidak di ajukan</option>
                       </select><br
  
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 	
echo"			
<div class='col-lg-12'>
                        <div class='modal fade' id='uiModal1' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                            <h4 class='modal-title' id='H3'>Input Data Anak</h4>
                                        </div>
                                        <div class='modal-body'>
                         <form role='form' method='post' action='input.php?aksi=inputkeluarga'>
                                            <div class='form-group'>
                         <label>Nama Anak</label>
                         <input type='hidden' class='form-control' value='$_GET[id_pegawai]' name='id_pegawai'/>
                         <input type='hidden' class='form-control' value='anak' name='status_aktif'/>                    
						 <input type='text' class='form-control' name='nama_keluarga'/><br>
                         <label>Jenis Kelamin</label>
	                    <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
		                <option value='-' selected>Pilih Jenis Kelamin</option>
		                <option value=Laki-Laki>Laki-Laki</option>
                        <option value=Perempuan>Perempuan</option>
                        </select><br><br>
                        <label>Tempat Lahir</label>
                        <input type='text' class='form-control' name='tempatlahir_keluarga'/>
                       </br>
                       <label>Tgl Lahir</label>
                       <input type='date' class='form-control' name='tgllahir_keluarga'/>
                      </br>
                      <label>Tanggal Meninggal/cerai Ayah/Ibu</label>
                      <input type='date' class='form-control' name='tgl_mati'/>
                     </br>
                      <label>Status Perkawinan Anak</label>
                      <select class='form-control select2' style='width: 100%;' name=status_nikah>
                      <option value='-' selected>Pilih Perkawinan Anak</option>
                      <option value=pernah>pernah nikah</option>
                      <option value=belum>belum nikah</option>
                      </select><br><br>
                      <label>Status Beasiswa</label>
                      <select class='form-control select2' style='width: 100%;' name=status_beasiswa>
                      <option value='-' selected>Pilih Beasiswa</option>
                      <option value=TidakAdaBeasiswa>Tidak Ada Beasiswa</option>
                      <option value=Beasiswa/Darmasiswa>Beasiswa/Darma siswa</option>
                      <option value=Ikatandinas>Ikatan dinas</option>
                      </select><br><br>
                         <label>Status Anak</label>
	                    <select class='form-control select2' style='width: 100%;' name=status_keluarga>
		                <option value='-' selected>Pilih Status Anak</option>
		                <option value=anak>anak</option>
                        <option value=anakangkat>anak angkat</option>
                        <option value=anaktiri>anak tiri</option>
                        </select><br><br>

                        <label>Status Pendidikan Anak</label>
	                    <select class='form-control select2' style='width: 100%;' name=status_sekolah>
		                <option value='-' selected>Pilih Pendidikan Anak</option>		    
                        <option value=BelumSekolah>Belum Sekolah</option>
		                <option value=sekolah>sekolah</option>
                        <option value=kuliah>kuliah</option>
                        </select><br><br>
                        <label>Status Pekerjaan Anak</label>
	                    <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
		                <option value='-' selected>Pilih Pekerjaan</option>
		                <option value=bekerja>bekerja</option>
                        <option value=tidakbekerja>tidak bekerja</option>
                        </select><br>
                        <label>Status Tunjangan</label>
                        <select class='form-control select2' style='width: 100%;' name=tunjang_status>
                        <option value='baru' selected>Pilih Tunjangan</option>
                        <option value=pengajuan>ajukan Tunjangan</option>
                        <option value=tidak>tidak di ajukan</option>
                        </select><br><br>
						  <label>Tempat Sekolah (jika masih sekolah)</label>
						 <input type='text' class='form-control' name='pendidikan_keluarga'/>
					    </br>
                        <label>Status Anak Angkat</label>
	                    <select class='form-control select2' style='width: 100%;' name=anak_angkat_status>
		                <option value='' selected>Pilih Status Anak Angkat</option>		    
                        <option value=negeri>Putusan Pengadilan Negeri</option>
		                <option value=tionghoa>Hukum adopsi bagi keturunan tionghoa</option>
                        </select><br><br>
                        <label>Keterangan Anak</label>
                        <input type='text' class='form-control' name='ket_keluarga'/>
                       </br>
  
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            <button type='submit' class='btn btn-primary'>Save </button>
                                        </div>
					</form>
                                    </div>
                                </div>
                            </div>
                    </div>
		    </div>			
"; 	
}
elseif($_GET['aksi']=='editkeluarga'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM keluarga WHERE id_keluarga=$_GET[id_keluarga] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>EDIT  $t[nama_keluarga]
                            </div>
                            <div class='panel-body'>			
                             <form role='form' method='post' action='edit.php?aksi=proseseditkeluarga&id_keluarga=$t[id_keluarga]'>
                                                <div class='form-group'>
                             <label>Nama Keluarga</label>
                             <input type='hidden' class='form-control' value='$t[id_pegawai]' name='id_pegawai'/>    
                             <input type='hidden' class='form-control' value='$t[status_aktif]' name='status_aktif'/>                
                             <input type='text' class='form-control' value='$t[nama_keluarga]' name='nama_keluarga'/><br>
                             <label>Jenis Kelamin</label>
                            <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
                            <option value='$t[jk_keluarga]' selected>$t[jk_keluarga]</option>
                            <option value=Laki-Laki>Laki-Laki</option>
                            <option value=Perempuan>Perempuan</option>
                            </select><br>
                            <label>Tempat Lahir</label>
                            <input type='text' class='form-control' value='$t[tempatlahir_keluarga]' name='tempatlahir_keluarga'/>
                           </br>
                           <label>Tgl Lahir</label>
                           <input type='date' class='form-control' value='$t[tgllahir_keluarga]' name='tgllahir_keluarga'/>
                          </br>
                             <label>Status</label>
                            <select class='form-control select2' style='width: 100%;' name=status_keluarga>
                            <option value='$t[status_keluarga]' selected>$t[status_keluarga]</option>
                            <option value=istri>Istri</option>
                            <option value=suami>suami</option>
                            <option value=anak>anak</option>
                            <option value=anak angkat>anak angkat</option>
                            </select><br>
                            <label>Status Tunjangan</label>
                            <select class='form-control select2' style='width: 100%;' name=tunjang_status>
                            <option value='$t[tunjang_status]' selected>$t[tunjang_status]</option>
                            <option value=pengajuan>ajukan Tunjangan</option>
                            <option value=tidak>tidak di ajukan</option>
                            </select><br><br>
                            <label>Pekerjaan</label>
                            <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
                            <option value='$t[pekejaan_keluarga]' selected>$t[pekejaan_keluarga]</option>
                            <option value=bekerja>bekerja</option>
                            <option value=tidak bekerja>tidak bekerja</option>
        
                            </select><br>
                         
                            <label>Penghasilan (jika bekerja)</label>
                             <input type='text' class='form-control' value='$t[penghasilan_keluarga]' name='penghasilan_keluarga'/>
                            </br>
                            <label>Keterangan Istri/Suami</label>
                            <input type='text' class='form-control' value='$t[ket_keluarga]' name='ket_keluarga'/>
                           </br>
      
                                                <button type='button' class='btn btn-default' onclick=self.history.back()>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                        </div>
                        </div>
                </div>
        </div>	
    "; 	
}
elseif($_GET['aksi']=='editkeluargaanak'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM keluarga WHERE id_keluarga=$_GET[id_keluarga] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>ANAK $t[nama_keluarga]
                            </div>
                            <div class='panel-body'>			
                            <form role='form' method='post' action='edit.php?aksi=prosesedianak&id_keluarga=$t[id_keluarga]'>
                            <div class='form-group'>
         <label>Nama Anak</label>
         <input type='hidden' class='form-control' value='$t[id_pegawai]' name='id_pegawai'/>
         <input type='hidden' class='form-control' value='anak' name='status_aktif'/>                    
         <input type='text' class='form-control' value='$t[nama_keluarga]' name='nama_keluarga'/><br>
         <label>Jenis Kelamin</label>
        <select class='form-control select2' style='width: 100%;' name=jk_keluarga>
        <option value='$t[jk_keluarga]' selected>$t[jk_keluarga]</option>
        <option value=Laki-Laki>Laki-Laki</option>
        <option value=Perempuan>Perempuan</option>
        </select><br><br>
        <label>Tempat Lahir</label>
        <input type='text' class='form-control'  value='$t[tempatlahir_keluarga]' name='tempatlahir_keluarga'/>
       </br>
       <label>Tgl Lahir</label>
       <input type='date' class='form-control' value='$t[tgllahir_keluarga]' name='tgllahir_keluarga'/>
      </br>
      <label>Tanggal Meninggal/cerai Ayah/Ibu</label>
      <input type='date' class='form-control' value='$t[tgl_mati]' name='tgl_mati'/>
     </br>
      <label>Status Perkawinan Anak</label>
      <select class='form-control select2' style='width: 100%;' name=status_nikah>
      <option value='$t[status_nikah]' selected>$t[status_nikah]</option>
      <option value=pernah>pernah nikah</option>
      <option value=belum>belum nikah</option>
      </select><br><br>
      <label>Status Beasiswa</label>
      <select class='form-control select2' style='width: 100%;' name=status_beasiswa>
      <option value='$t[status_beasiswa]' selected>$t[status_beasiswa]</option>
      <option value=TidakAdaBeasiswa>Tidak Ada Beasiswa</option>
      <option value=Beasiswa/Darmasiswa>Beasiswa/Darma siswa</option>
      <option value=Ikatandinas>Ikatan dinas</option>
      </select><br><br>
         <label>Status Anak</label>
        <select class='form-control select2' style='width: 100%;' name=status_keluarga>
        <option value='$t[status_keluarga]' selected>$t[status_keluarga]</option>
        <option value=anak>anak</option>
        <option value=anakangkat>anak angkat</option>
        <option value=anaktiri>anak tiri</option>
        </select><br><br>

        <label>Status Pendidikan Anak</label>
        <select class='form-control select2' style='width: 100%;' name=status_sekolah>
        <option value='$t[status_sekolah]' selected>$t[status_sekolah]</option>		    
        <option value=BelumSekolah>Belum Sekolah</option>
        <option value=sekolah>sekolah</option>
        <option value=kuliah>kuliah</option>
        </select><br><br>
        <label>Status Pekerjaan Anak</label>
        <select class='form-control select2' style='width: 100%;' name=pekejaan_keluarga>
        <option value='$t[pekejaan_keluarga]' selected>$t[pekejaan_keluarga]</option>
        <option value=bekerja>bekerja</option>
        <option value=tidakbekerja>tidak bekerja</option>
        </select><br>
        <label>Status Tunjangan</label>
        <select class='form-control select2' style='width: 100%;' name=tunjang_status>
        <option value='$t[tunjang_status]' selected>$t[tunjang_status]</option>
        <option value=pengajuan>ajukan Tunjangan</option>
        <option value=tidak>tidak di ajukan</option>
        </select><br><br>
          <label>Tempat Sekolah (jika masih sekolah)</label>
         <input type='text' value='$t[pendidikan_keluarga]' class='form-control' name='pendidikan_keluarga'/>
        </br>
        <label>Status Anak Angkat</label>
        <select class='form-control select2' style='width: 100%;' name=anak_angkat_status>
        <option value='$t[anak_angkat_status]' selected>$t[anak_angkat_status]</option>		    
        <option value=negeri>Putusan Pengadilan Negeri</option>
        <option value=tionghoa>Hukum adopsi bagi keturunan tionghoa</option>
        </select><br><br>
        <label>Keterangan Anak</label>
        <input type='text' class='form-control' value='$t[ket_keluarga]' name='ket_keluarga'/>
       </br>

                            <button type='button' class='btn btn-default' onclick=self.history.back()>Close</button>
                            <button type='submit' class='btn btn-primary'>Save </button>
                        </div>
    </form>
                        </div>
                        </div>
                </div>
        </div>	
    "; 	
}
elseif($_GET['aksi']=='postunjangan'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai] ");
    $t=mysqli_fetch_array($tebaru);
    echo"
    <div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>$t[nama_pegawai]
                            </div>
                            <div class='panel-body'>			
            <form role='form' method='post' action='input.php?aksi=inputtunjangan'>
                            <div class='form-group'>
         <label>Pekerjaan Sampingan</label>
         <input type='hidden' class='form-control' value='$t[id_pegawai]' name='id_pegawai'/>                   
         <input type='text' class='form-control'  name='t_pekerjaan'/><br>
         <label>Penghasilan Sampingan Rp</label>                
         <input type='text' class='form-control'  name='t_penghasilan'/><br>
         <label>Mempunyai pensiunan janda Rp</label>
         <input type='text' class='form-control'  name='t_janda'/><br>
         <label>Gaji PNS Rp</label>
         <input type='text' class='form-control'  name='t_gaji'/><br>
         <button type='button' class='btn btn-default'' onclick=self.history.back()>Close</button>
                            <button type='submit' class='btn btn-primary'>Save </button>
                        </div>
          </form>
                             
                        </div>
                        </div>
                </div>
        </div>	
    "; 	
}
elseif($_GET['aksi']=='lihattunjangan'){
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
            </div>
            <div class='panel-body'>
                   <div class='table-responsive'>		
<table id='example1' class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                            <th>No</th>
                                <th>Nama Pegawai</th>
                                <th>Status Tunjangan</th>
                                <th></th>
                                <th></th>		  
                          </tr></thead>
        <tbody>
        ";
$no=0;
$tebaru=mysqli_query($koneksi," SELECT * FROM tunjangan,pegawai WHERE tunjangan.id_pegawai=pegawai.id_pegawai");
while ($t=mysqli_fetch_array($tebaru)){	
$no++;
                        echo"<tr>
                            <td>$no</td>
                            <td>$t[nama_pegawai]</td>
                <td>$t[t_status]</td>
                <td><a class='btn btn-primary' href='cetaksk.php?id_pegawai=$t[id_pegawai]' target='_blank'>Cetak SK</a> 
                <a class='btn btn-primary' href='cetakskanak.php?id_pegawai=$t[id_pegawai]' target='_blank'>Cetak Daftar Anak</a></td>
                <td><a class='btn btn-danger' href='hapus.php?aksi=hapustunjangan&id_tunjangan=$t[id_tunjangan]&id_pegawai=$t[id_pegawai]' onclick=\"return confirm ('Apakah yakin ingin menghapus data ini ?')\" >Hapus</a> </td>
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
}
elseif($_GET['aksi']=='pangku'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button> <a href='laporan.php?aksi=pangku' target='_blank' class='btn btn-info' ><i class='fa fa-print' ></i></span></a><br><br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama Pemangku</th>
                                                <th>Jumlah</th>
                                                <th></th>		  
                                          </tr></thead>
                        <tbody>
                        ";
                
    $no=0;
    $sqli = mysqli_query($koneksi,"SELECT * FROM pemangku");
    while ($t=mysqli_fetch_array($sqli)){	
    $no++;
                                        echo"<tr>
                                            <td>$no</td>
                                                <td>$t[nama_pkjab]</td>
                                                <td>$t[jml]</td>
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>AKSI</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editpangku&id_pkjab=$t[id_pkjab]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
                            <li><a href='hapus.php?aksi=hapuspangku&id_pkjab=$t[id_pkjab]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pkjab] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
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
    
    ////////////////input admin			
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data </h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputpangku'>
                                                <div class='form-group'>
                                                <label>Nama Pemangku</label>
                                                <input type='text' class='form-control' name='nama_pkjab'/><br>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
    }
elseif($_GET['aksi']=='editpangku'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pemangku WHERE  id_pkjab=$_GET[id_pkjab] ");
    $t=mysqli_fetch_array($tebaru);   
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
            </div>
            <div class='panel-body'>
            <form role='form' method='post' action='edit.php?aksi=proseseditpangku&id_pkjab=$t[id_pkjab]'>
            <div class='form-group'>
            <label>Nama Pemangku</label>
            <input type='text' class='form-control' value='$t[nama_pkjab]' name='nama_pkjab'/><br>
            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            <button type='submit' class='btn btn-primary'>Save </button>
            </div>
         </form>
            </div>
        </div>
    </div>
   </div>		
";   
}    
elseif($_GET['aksi']=='pangkujabatan'){
    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'>
                                    Tambah Data
                                </button> <br><br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                                <th>Nama pegawai</th>
                                                <th>Nama Pemangku Jabatan</th>
                                                <th>NIP</th>		  
                                          </tr></thead>
                        <tbody>
                        ";
                
    $no=0;
    $sqli = mysqli_query($koneksi,"SELECT * FROM pemangkujabatan,pemangku,pegawai WHERE pemangkujabatan.id_pegawai=pegawai.id_pegawai AND pemangkujabatan.id_pkjab=pemangku.id_pkjab");
    while ($t=mysqli_fetch_array($sqli)){	
    $no++;
                                        echo"<tr>
                                            <td>$no</td>
                                                <td>$t[nama_pegawai]</td>
                                                <td>$t[nama_pkjab]</td>
                                <td><div class='btn-group'>
                          <a href='laporan.php?aksi=pangkujabatan&id_pangku=$t[id_pangku]' target='_blank' class='btn btn-info'>$t[nip]</a>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editpangkujabatan&id_pangku=$t[id_pangku]' title='Edit'><i class='fa fa-pencil'></i>Lihat</a></li>
                            <li><a href='hapus.php?aksi=hapuspangkujabatan&id_pangku=$t[id_pangku]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[nama_pkjab] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
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
    
    ////////////////input admin			
    
    echo"			
    <div class='col-lg-12'>
                            <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                                <h4 class='modal-title' id='H3'>Input Data </h4>
                                            </div>
                                            <div class='modal-body'>
                                               <form role='form' method='post' action='input.php?aksi=inputpangkujabatan'>
                                                <div class='form-group'>
                                                <label>Nama Pemangku Jabatan</label>
                                                <select class='form-control select2' style='width: 100%;' name='id_pkjab'>
                                                <option value='' selected>--Pilih Nama Pemangku Jabatan--</option>
                                                "; 
		$sql=mysqli_query($koneksi,"SELECT * FROM pemangku ORDER BY id_pkjab");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value='$c[id_pkjab]'>$c[nama_pkjab]</option>";
		}
	                                        echo "
                                            </select><br><br>
                                               
                                                <label>Nama Pegawai</label>
       <select class='form-control select2' style='width: 100%;' name='id_pegawai'>
       <option value='' selected>--Pilih Nama Pegawai--</option>"; 
		$sql=mysqli_query($koneksi,"SELECT * FROM pegawai ORDER BY id_pegawai");
		while ($c=mysqli_fetch_array($sql))
		{
			echo "<option value='$c[id_pegawai]'>$c[nama_pegawai]</option>";
		}
	echo "</select><br><br>
                                                <label>Nomor Surat</label>
                                                <input type='text' class='form-control' name='nomor_surat'/><br>

                                                <label>Tanggal Surat</label>
                                                <input type='date' class='form-control' name='tanggal_surat'/><br>
                                                 </br>
                                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                                <button type='submit' class='btn btn-primary'>Save </button>
                                            </div>
                        </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>			
    "; 
    }
elseif($_GET['aksi']=='editpangkujabatan'){
       $sqli = mysqli_query($koneksi,"SELECT * FROM pemangkujabatan,pemangku,pegawai WHERE pemangkujabatan.id_pegawai=pegawai.id_pegawai AND pemangkujabatan.id_pkjab=pemangku.id_pkjab AND id_pangku=$_GET[id_pangku] ");
        $t=mysqli_fetch_array($sqli);   
        echo"<div class='row'>
        <div class='col-lg-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                </div>
                <div class='panel-body'>
                <form role='form' method='post' action='edit.php?aksi=proseseditpangkujabatan&id_pangku=$t[id_pangku]'>
                <div class='form-group'>
                <label>Nama Pemangku Jabatan</label>
                <select class='form-control select2' style='width: 100%;' name='id_pkjab'>
                <option value='$t[id_pkjab]' selected>$t[nama_pkjab]</option>
                "; 
$sql=mysqli_query($koneksi,"SELECT * FROM pemangku ORDER BY id_pkjab");
while ($c=mysqli_fetch_array($sql))
{
echo "<option value='$c[id_pkjab]'>$c[nama_pkjab]</option>";
}
            echo "
            </select><br><br>
               
                <label>Nama Pegawai</label>
<select class='form-control select2' style='width: 100%;' name='id_pegawai'>
<option value='$t[id_pegawai]' selected>$t[nama_pegawai]</option>"; 
$sql=mysqli_query($koneksi,"SELECT * FROM pegawai ORDER BY id_pegawai");
while ($c=mysqli_fetch_array($sql))
{
echo "<option value='$c[id_pegawai]'>$c[nama_pegawai]</option>";
}
echo "</select><br><br>
                <label>Nomor Surat</label>
                <input type='text' class='form-control' value='$t[nomor_surat]' name='nomor_surat'/><br>

                <label>Tanggal Surat</label>
                <input type='date' class='form-control' value='$t[tanggal_surat]' name='tanggal_surat'/><br>
                 </br>
                <a href='index.php?aksi=pangkujabatan' class='btn btn-default' >Close</a>
                <button type='submit' class='btn btn-primary'>Save </button>
            </div>
</form>
                </div>
            </div>
        </div>
       </div>		
    ";   
} 
elseif($_GET['aksi']=='kadis'){ 
    echo"<div class='row'>
    <div class='col-lg-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
            </div>
            <div class='panel-body'>
            <form role='form' method='post' action='edit.php?aksi=proseseditprofil&id_profil=2'>
            <div class='form-group'>
            <label>Nama Kepala Dinas</label>
            <input type='text' class='form-control' value='$tt[nama]' name='nama'/><br>
			<label>Nip Kepala Dinas</label>
            <input type='text' class='form-control' value='$tt[alias]' name='alias'/><br>
            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            <button type='submit' class='btn btn-primary'>Save </button>
            </div>
         </form>
            </div>
        </div>
    </div>
   </div>		
";   
}  

?>