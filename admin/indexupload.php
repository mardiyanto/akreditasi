<?php
if($_GET['aksi']=='upload'){
echo"<div class='row'>
				<div class='col-lg-4'>
					<div class='panel panel-default'>
								<div class='panel-heading'>EDIT
								</div>
						<div class='panel-body'>
								<form id='upload_form'>
                                    <div class='form-group mb-5'>
                                    <label>keterangan</label><br/>
                                    <input type='text' name='keterangan'   id='keterangan' class='form-control'>
                                    <input type='hidden' name='id_buktidokumen'   id='id_buktidokumen' value='1' class='form-control'>
                                </div>
                                <div class='form-group mb-5'>
                                    <label>Pilih File</label><br/>
                                    <input type='file' name='file' id='file' class='form-control'>
                                </div>
                                
                                <div class='form-group mb-5'>
                                    <input type='button' id='upload' value='Upload File' class='btn btn-success'>
                                </div>

                                <progress id='progressBar' value='0' max='100' style='width:100%; display: none;'></progress>
                                <h3 id='status'></h3>
                                <p id='loaded_n_total'></p>
								</form>
							</div> 
					</div>
				</div> 
</div>";
}
elseif($_GET['aksi']=='uploadajax'){
echo"<div class='row'>
       <div class='col-lg-12'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                    EDIT
                    </div>
                            <div class='panel-body'>
                       
                            </div>
                </div>
		</div> 
    </div>
    ";
}
elseif($_GET['aksi']=='uploaddokumen'){

    echo"<div class='row'>
                    <div class='col-lg-12'>
                        <div class='panel panel-default'>
                            <div class='panel-heading'>INFORMASI 
                            </div>
                            <div class='panel-body'>	
                            <button class='btn btn-info' data-toggle='modal' data-target='#uiModal'><i class='fa fa-cloud-upload'></i>Tambah Data</button>
                            <a href='index.php?aksi=kriteriadukumen' class='btn btn-info' ><i class='fa  fa-arrow-circle-left'></i>Kembali</a><br><br>
                                   <div class='table-responsive'>		
         <table id='example1' class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>nama</th>
                                                <th>keterangan</th>		  
                                            </tr>
                                        </thead>
                        ";
                
                        $no=0;
                        $tebaru=mysqli_query($koneksi," SELECT * FROM uploaddokumen WHERE id_buktidokumen=$_GET[id_buktidokumen]");
    while ($t=mysqli_fetch_array($tebaru)){	
    $no++;
                                        echo"<tbody>
                                            <tr>
                                                <td>$no</td>
                                                <td><a href='../dokumen/$t[dokumen]' target='_blank'>$t[keterangan]</a></td>
                                <td><div class='btn-group'>
                          <button type='button' class='btn btn-info'>aksi</button>
                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>
                            <span class='caret'></span>
                            <span class='sr-only'>Toggle Dropdown</span>
                          </button>
                          <ul class='dropdown-menu' role='menu'>
                            <li><a href='index.php?aksi=editadmin&user_id=$t[user_id]' title='Edit'><i class='fa fa-pencil'></i>edit</a></li>
                            <li><a href='hapus.php?aksi=hapusbuktidokumen&id_uploaddokumen=$t[id_uploaddokumen]&id_buktidokumen=$t[id_buktidokumen]' onclick=\"return confirm ('Apakah yakin ingin menghapus $t[user_username] ?')\" title='Hapus'><i class='fa fa-remove'></i>hapus</li>
                            </ul>
                        </div></td>
                                            </tr>
                                        </tbody>
                                        
                                                                 
                                        ";
    }
                                    echo"</table>
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>
                   <div class='col-lg-12'>
                                        <div class='modal fade' id='uiModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                                                                         <h4 class='modal-title' id='H3'>Data upload $_GET[id_buktidokumen]</h4>
                                                    </div>
                                                    <div class='modal-body'>
                                                    <form id='upload_form'>
                                                            <div class='form-group mb-5'>
                                                            <label>keterangan</label><br/>
                                                            <input type='text' name='keterangan'   id='keterangan' class='form-control'>
                                                            <input type='hidden' name='id_buktidokumen'   id='id_buktidokumen' value='$_GET[id_buktidokumen]' class='form-control'>
                                                        </div>
                                                        <div class='form-group mb-5'>
                                                            <label>Pilih File</label><br/>
                                                            <input type='file' name='file' id='file' class='form-control'>
                                                        </div>
                                                        
                                                        <div class='form-group mb-5'>
                                                            <input type='button' id='upload' value='Upload File' class='btn btn-success'>
                                                        </div>
                                                    
                                                        <progress id='progressBar' value='0' max='100' style='width:100%; display: none;'></progress>
                                                        <h3 id='status'></h3>
                                                        <p id='loaded_n_total'></p>
                                                    </form>
                                                    <div class='modal-footer'>
                                                    <a href='upload.php?aksi=uploaddokumen&id_buktidokumen=$_GET[id_buktidokumen]' class='btn btn-info' >Close</a>
                                                  
                                                  </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                   
                   ";			 
    }