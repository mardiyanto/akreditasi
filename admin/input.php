<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }

///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='inputpaslon'){
	mysqli_query($koneksi,"insert into paslon (nama_paslon,dapil) values ('$_POST[nama_paslon]','$_POST[dapil]')");  
	echo "<script>window.location=('index.php?aksi=paslon')</script>";
}
elseif($_GET['aksi']=='inputdesa'){
	mysqli_query($koneksi,"insert into desa (nama_desa,id_kecamatan) values ('$_POST[nama_desa]','$_POST[id_kecamatan]')");  
echo "<script>window.location=('index.php?aksi=desa')</script>";
}
elseif($_GET['aksi']=='inputbuktidokumen'){
	mysqli_query($koneksi,"insert into buktidokumen (nama_buktidokumen,id_kriteriadokumen) values ('$_POST[nama_buktidokumen]','$_POST[id_kriteriadokumen]')");  
echo "<script>window.location=('index.php?aksi=buktidokumen&id_kriteriadokumen=$_POST[id_kriteriadokumen]')</script>";
}
elseif($_GET['aksi']=='inputkriteriadukumen'){
	mysqli_query($koneksi,"insert into kriteriadukumen (nama_kriteriadukumen) values ('$_POST[nama_kriteriadukumen]')");  
echo "<script>window.location=('index.php?aksi=kriteriadukumen')</script>";
}
elseif ($_GET['aksi'] == 'prosesuploadbar') {
$fileName = $_FILES["file"]["name"]; // Nama File asli
$fileTmp = $_FILES["file"]["tmp_name"]; // File di folder tmp PHP

// Generate nama file unik dengan menambahkan timestamp
$unikFileName = time() . '_' . $fileName;

// Jika belum ada folder upload, maka buat folder upload
$temp = "../dokumen/";
if (!file_exists($temp)) {
    mkdir($temp);
}

if (move_uploaded_file($fileTmp, $temp . $unikFileName)) {
    echo "$unikFileName berhasil diupload";

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
	$id_buktidokumen = mysqli_real_escape_string($koneksi, $_POST['id_buktidokumen']);

    $query = "INSERT INTO uploaddokumen (id_buktidokumen,dokumen, keterangan) VALUES ('$id_buktidokumen','$unikFileName', '$keterangan')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo " dan data berhasil disimpan ke database.";
    } else {
        echo " dan terjadi kesalahan dalam menyimpan data ke database: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
} else {
    echo "Upload gagal";
}
}
elseif ($_GET['aksi'] == 'prosesupload') {
    $id_buktidokumen = $_POST["id_buktidokumen"];
    $nama_file = $_FILES["dokumen"]["name"];
    $ukuran_file = $_FILES["dokumen"]["size"];
    $tmp_file = $_FILES["dokumen"]["tmp_name"];
    $keterangan = $_POST["keterangan"];
	// Cek jika file dan keterangan tidak kosong
	if (empty($nama_file) || empty($keterangan)) {
		echo "<script>window.alert('File atau keterangan tidak boleh kosong'); window.location=('index.php?aksi=uploaddokumen&id_buktidokumen=$id_buktidokumen')</script>";
		exit();
	}
    // Generate nama acak untuk file
    $nama_acak = uniqid().'_'.$nama_file;

    // Pindahkan file yang diunggah ke direktori yang diinginkan
    $tujuan_upload = "../dokumen/" . $nama_acak;
    move_uploaded_file($tmp_file, $tujuan_upload);

    // Masukkan data ke dalam tabel database
    $query = "INSERT INTO uploaddokumen (id_buktidokumen, dokumen, keterangan) VALUES ('$id_buktidokumen', '$nama_acak', '$keterangan')";
    $result = mysqli_query($koneksi, $query);

    if($result){
        echo "<script>window.alert('berhasil upload'); window.location=('index.php?aksi=uploaddokumen&id_buktidokumen=$id_buktidokumen')</script>";
    } else{
        echo "<script>window.alert('Gagal'); window.location=('index.php?aksi=uploaddokumen&id_buktidokumen=$id_buktidokumen')</script>";
    }
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='inputmenu'){
	mysqli_query($koneksi,"insert into menu (nama_menu,link,link_b,status,icon_menu,aktif) values ('$_POST[nama_menu]','$_POST[link]','$_POST[link_b]','$_POST[status]','$_POST[icon_menu]','$_POST[aktif]')");  
echo "<script>window.location=('index.php?aksi=menu')</script>";
}
elseif($_GET['aksi']=='inputsubmenu'){
	mysqli_query($koneksi,"insert into submenu (id_menu,nama_sub,link_sub,icon_sub) values ('$_POST[id_menu]','$_POST[nama_sub]','$_POST[link_sub]','$_POST[icon_sub]')");  
echo "<script>window.location=('index.php?aksi=submenu')</script>";
}
elseif($_GET['aksi']=='inputgolongan'){
	mysqli_query($koneksi,"insert into golongan (nama_gol) values ('$_POST[nama_gol]')");  
echo "<script>window.location=('index.php?aksi=golongan')</script>";
}
elseif($_GET['aksi']=='inputjabatan'){
	mysqli_query($koneksi,"insert into jabatan (nama_jabatan) values ('$_POST[nama_jabatan]')");  
echo "<script>window.location=('index.php?aksi=jabatan')</script>";
}
elseif($_GET['aksi']=='inputprofesi'){
	mysqli_query($koneksi,"insert into profesi (nama_profesi) values ('$_POST[nama_profesi]')");  
echo "<script>window.location=('index.php?aksi=profesi')</script>";
}
elseif($_GET['aksi']=='inputadmin'){
$nama  = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($koneksi, "insert into user values (NULL,'$nama','$username','$password','')");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}else{
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) {
		echo "<script>alert('Gagal ');</script>";
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$file_gambar = $rand.'_'.$filename;
		mysqli_query($koneksi, "insert into user values (NULL,'$nama','$username','$password','$file_gambar')");
		echo "<script>window.location=('index.php?aksi=admin')</script>";
	}
}
}
if($_GET['aksi']=='inputpegawai'){
	$kalimat = $_POST['nip'];
    $sub_kalimat = substr($kalimat,0,8);
	$username = $sub_kalimat;
    $password = md5($sub_kalimat);	
mysqli_query($koneksi,"insert into pegawai (nama_pegawai,nip,tgl_lahir,status,tingkat,jenis_kelamin,jurusan,gol,username,password,status_pg,status_kk) 
values ('$_POST[nama_pegawai]','$_POST[nip]','$_POST[tgl_lahir]','$_POST[status]','$_POST[tingkat]','$_POST[jenis_kelamin]','$_POST[jurusan]','$_POST[gol]','$username','$password','baru','baru')");  
echo "<script>window.location=('index.php?aksi=pegawai')</script>";
}
elseif($_GET['aksi']=='inputkeluarga'){
	mysqli_query($koneksi,"insert into keluarga (id_pegawai,nama_keluarga,jk_keluarga,tempatlahir_keluarga,tgllahir_keluarga,status_keluarga,pekejaan_keluarga,pendidikan_keluarga,penghasilan_keluarga,ket_keluarga,tunjang_status,tgl_mati,status_nikah,status_beasiswa,anak_angkat_status,status_sekolah,status_aktif) 
	values ('$_POST[id_pegawai]','$_POST[nama_keluarga]','$_POST[jk_keluarga]','$_POST[tempatlahir_keluarga]','$_POST[tgllahir_keluarga]','$_POST[status_keluarga]','$_POST[pekejaan_keluarga]','$_POST[pendidikan_keluarga]','$_POST[penghasilan_keluarga]','$_POST[ket_keluarga]','$_POST[tunjang_status]','$_POST[tgl_mati]','$_POST[status_nikah]','$_POST[status_beasiswa]','$_POST[anak_angkat_status]','$_POST[status_sekolah]','$_POST[status_aktif]')");  
	mysqli_query($koneksi,"UPDATE pegawai SET status_pg='ada' WHERE id_pegawai='$_POST[id_pegawai]'");
	echo "<script>window.location=('index.php?aksi=listtunjangan&id_pegawai=$_POST[id_pegawai]')</script>";
}
elseif($_GET['aksi']=='inputtunjangan'){
	mysqli_query($koneksi,"insert into tunjangan (id_pegawai,t_status) 
	values ('$_GET[id_pegawai]','baru')");
	mysqli_query($koneksi,"UPDATE pegawai SET status_pg='kk ada' WHERE id_pegawai='$_GET[id_pegawai]'"); 
echo "<script>window.location=('index.php?aksi=tunjangan')</script>";
}
elseif($_GET['aksi']=='inputpangku'){
	mysqli_query($koneksi,"insert into pemangku (nama_pkjab) 
	values ('$_POST[nama_pkjab]')");
echo "<script>window.location=('index.php?aksi=pangku')</script>";
}
elseif($_GET['aksi']=='inputpangkujabatan'){
	mysqli_query($koneksi,"insert into pemangkujabatan (id_pegawai,id_pkjab,nomor_surat,tanggal_surat) 
	values ('$_POST[id_pegawai]','$_POST[id_pkjab]','$_POST[nomor_surat]','$_POST[tanggal_surat]')");
echo "<script>window.location=('index.php?aksi=pangkujabatan')</script>";
}
?>