<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='hapuspaslon'){
mysqli_query($koneksi,"DELETE FROM paslon  WHERE id_paslon='$_GET[id_paslon]'");
echo "<script>window.location=('index.php?aksi=paslon')</script>";
}
elseif ($_GET['aksi'] == 'hapusbuktidokumen') {
      $id_uploaddokumen_hapus = $_GET['id_uploaddokumen'];
      $id_buktidokumen_hapus = $_GET['id_buktidokumen'];  
      // Ambil informasi file terkait
      $query_select = "SELECT dokumen FROM uploaddokumen WHERE id_uploaddokumen = '$id_uploaddokumen_hapus'";
      $result_select = mysqli_query($koneksi, $query_select);

      if ($result_select) {
          $row = mysqli_fetch_assoc($result_select);
          $nama_file_hapus = $row['dokumen'];
          $path_file_hapus = "../dokumen/" . $nama_file_hapus;

          // Hapus file dari direktori
          if (unlink($path_file_hapus)) {
              // Hapus data dari tabel database
              $query_delete = "DELETE FROM uploaddokumen WHERE id_uploaddokumen = '$id_uploaddokumen_hapus'";
              $result_delete = mysqli_query($koneksi, $query_delete);

              if ($result_delete) {
                  echo "<script>window.alert('Berhasil hapus'); window.location=('upload.php?aksi=uploaddokumen&id_buktidokumen=$id_buktidokumen_hapus')</script>";
              } else {
                  echo "<script>window.alert('Gagal menghapus data dari database'); window.location=('upload.php?aksi=uploaddokumen&id_buktidokumen=$id_buktidokumen_hapus')</script>";
              }
          } else {
              echo "<script>window.alert('Gagal menghapus file tidak terdapat di database'); window.location=('upload.php?aksi=uploaddokumen&id_buktidokumen=$id_buktidokumen_hapus')</script>";
          }
      } else {
          echo "<script>window.alert('Gagal mengambil informasi file'); window.location=('upload.php?aksi=uploaddokumen&id_buktidokumen=$id_buktidokumen_hapus')</script>";
      }

}


elseif($_GET['aksi']=='hapuskecamatan'){
  mysqli_query($koneksi,"DELETE FROM kecamatan  WHERE id_kecamatan='$_GET[id_kecamatan]'");
  echo "<script>window.location=('index.php?aksi=kecamatan')</script>";
}
elseif($_GET['aksi']=='hapusdesa'){
  mysqli_query($koneksi,"DELETE FROM desa  WHERE id_desa='$_GET[id_desa]'");
  echo "<script>window.location=('index.php?aksi=desa')</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='hapusmenu'){
mysqli_query($koneksi,"DELETE FROM menu  WHERE id_menu='$_GET[id_menu]'");
echo "<script>window.location=('index.php?aksi=menu')</script>";
}

elseif($_GET['aksi']=='hapussubmenu'){
  mysqli_query($koneksi,"DELETE FROM submenu  WHERE id_sub='$_GET[id_sub]'");
  echo "<script>window.location=('index.php?aksi=submenu')</script>";
  }
elseif($_GET['aksi']=='hapussuara'){
mysqli_query($koneksi,"DELETE FROM suara  WHERE id_suara='$_GET[id_suara]'");
echo "<script>window.location=('index.php?aksi=inputdata')</script>";
}
elseif($_GET['aksi']=='hapusjabatan'){
mysqli_query($koneksi,"DELETE FROM jabatan  WHERE id_jabatan='$_GET[id_jabatan]'");
echo "<script>window.location=('index.php?aksi=jabatan')</script>";
}
elseif($_GET['aksi']=='hapusadmin'){
$data = mysqli_query($koneksi, "select * from user where user_id='$_GET[user_id]'");
$d = mysqli_fetch_assoc($data);
$foto = $d['user_foto'];
unlink("../gambar/user/$foto");
mysqli_query($koneksi, "delete from user where user_id='$_GET[user_id]'");
echo "<script>window.location=('index.php?aksi=admin')</script>";
}
elseif($_GET['aksi']=='hapuspegawai'){
  mysqli_query($koneksi,"DELETE FROM pegawai  WHERE id_pegawai='$_GET[id_pegawai]'");
  echo "<script>window.location=('index.php?aksi=pegawai')</script>";
  }
elseif($_GET['aksi']=='hapusberkas'){
    $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai]");
    $t=mysqli_fetch_array($tebaru);
    $data = mysqli_query($koneksi, "select * from file where file_id='$_GET[file_id]'");
    $d = mysqli_fetch_assoc($data);
    $file = $d['file_name'];
    unlink("upload/$file");
    mysqli_query($koneksi, "delete from file where file_id='$_GET[file_id]'");
    echo "<script>window.location=('index.php?aksi=listuploadfile&id_pegawai=$t[id_pegawai]')</script>";
}
elseif($_GET['aksi']=='hapuskeluarga'){
  $tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai]");
  $t=mysqli_fetch_array($tebaru);
  mysqli_query($koneksi,"DELETE FROM keluarga  WHERE id_keluarga='$_GET[id_keluarga]'");
  echo "<script>window.location=('index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]')</script>";
  }
  elseif($_GET['aksi']=='hapustunjangan'){
    mysqli_query($koneksi,"DELETE FROM tunjangan  WHERE id_tunjangan='$_GET[id_tunjangan]'");
    mysqli_query($koneksi,"UPDATE pegawai SET status_pg='ada' WHERE id_pegawai='$_GET[id_pegawai]'"); 
    echo "<script>window.location=('index.php?aksi=tunjangan')</script>";
    } 
elseif($_GET['aksi']=='hapuspangku'){
      mysqli_query($koneksi,"DELETE FROM pemangku  WHERE 	id_pkjab='$_GET[id_pkjab]'");
      echo "<script>window.location=('index.php?aksi=pangku')</script>";
 }    
 

?>