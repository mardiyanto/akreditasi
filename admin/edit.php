<?php
  include '../koneksi.php';
  date_default_timezone_set('Asia/Jakarta');
  session_start();
  if($_SESSION['status'] != "administrator_logedin"){
    header("location:../login.php?alert=belum_login");
  }
///////////////////////////lihat/////////////////////////////////////////////
if($_GET['aksi']=='proseseditaset'){
mysqli_query($koneksi,"UPDATE aset SET id_kategori='$_POST[id_kategori]',id_ruang='$_POST[id_ruang]',nama_aset='$_POST[nama_aset]',
spek='$_POST[spek]',jumlah='$_POST[jumlah]',tgl_beli='$_POST[tgl_beli]',kondisi='$_POST[kondisi]' WHERE id_aset='$_GET[id_aset]'");
echo "<script>window.location=('index.php?aksi=aset')</script>";
}
elseif($_GET['aksi']=='proseseditsuara'){
	mysqli_query($koneksi,"UPDATE suara SET suara_sah='$_POST[suara_sah]' WHERE id_suara='$_GET[id_suara]'");
echo "<script>window.location=('index.php?aksi=inputdata')</script>";
}
elseif($_GET['aksi']=='proseseditpaslon'){
	mysqli_query($koneksi,"UPDATE paslon SET nama_paslon='$_POST[nama_paslon]',dapil='$_POST[dapil]' WHERE id_paslon='$_GET[id_paslon]'");
	echo "<script>window.location=('index.php?aksi=paslon')</script>";
}
elseif($_GET['aksi']=='proseseditbuktidokumen'){
	mysqli_query($koneksi,"UPDATE buktidokumen SET nama_buktidokumen='$_POST[nama_buktidokumen]',id_kriteriadukumen='$_POST[id_kriteriadukumen]' WHERE id_buktidokumen='$_GET[id_buktidokumen]'");
echo "<script>window.location=('index.php?aksi=buktidokumen')</script>";
}
elseif($_GET['aksi']=='proseseditkriteriadukumen'){
	mysqli_query($koneksi,"UPDATE kriteriadukumen SET nama_kriteriadukumen='$_POST[nama_kriteriadukumen]' WHERE id_kriteriadukumen='$_GET[id_kriteriadukumen]'");
echo "<script>window.location=('index.php?aksi=kriteriadukumen')</script>";
}
elseif($_GET['aksi']=='prosesedittemuan'){
	mysqli_query($koneksi,"UPDATE temuan SET url='$_POST[url]' WHERE id_temuan='$_GET[id_temuan]'");
echo "<script>window.location=('index.php?aksi=kabupaten')</script>";
}
elseif($_GET['aksi']=='proseseditdesa'){
	mysqli_query($koneksi,"UPDATE desa SET nama_desa='$_POST[nama_desa]',id_kecamatan='$_POST[id_kecamatan]' WHERE id_desa='$_GET[id_desa]'");
echo "<script>window.location=('index.php?aksi=desa')</script>";
}
////////////////////////////////////edit tps///////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='prosesedittps'){
	mysqli_query($koneksi,"UPDATE tps SET id_kecamatan='$_POST[id_kecamatan]',id_desa='$_POST[id_desa]',no_tps='$_POST[no_tps]' WHERE id_tps='$_GET[id_tps]'");
echo "<script>window.location=('index.php?aksi=tps')</script>";
}
elseif($_GET['aksi']=='prosesupdatesuara'){
	mysqli_query($koneksi,"UPDATE tps SET status='sudah' WHERE id_tps='$_GET[id_tps]'");
echo "<script>window.location=('index.php?aksi=inputdata')</script>";
}
///////////////////////////////////////////////////////////////////////////////////////////////////
elseif($_GET['aksi']=='proseseditmenu'){
	mysqli_query($koneksi,"UPDATE menu SET nama_menu='$_POST[nama_menu]',link='$_POST[link]',link_b='$_POST[link_b]',status='$_POST[status]',icon_menu='$_POST[icon_menu]',aktif='$_POST[aktif]' WHERE id_menu='$_GET[id_menu]'");
echo "<script>window.location=('index.php?aksi=menu')</script>";
}
elseif($_GET['aksi']=='proseseditsubmenu'){
	mysqli_query($koneksi,"UPDATE submenu SET nama_sub='$_POST[nama_sub]',link_sub='$_POST[link_sub]',icon_sub='$_POST[icon_sub]' WHERE id_sub='$_GET[id_sub]'");
echo "<script>window.location=('index.php?aksi=submenu')</script>";
}

elseif($_GET['aksi']=='proseseditjabatan'){
	mysqli_query($koneksi,"UPDATE jabatan SET nama_jabatan='$_POST[nama_jabatan]' WHERE id_jabatan='$_GET[id_jabatan]'");
echo "<script>window.location=('index.php?aksi=jabatan')</script>";
}
elseif($_GET['aksi']=='proseseditprofesi'){
	mysqli_query($koneksi,"UPDATE profesi SET nama_profesi='$_POST[nama_profesi]' WHERE id_profesi='$_GET[id_profesi]'");
echo "<script>window.location=('index.php?aksi=profesi')</script>";
}
elseif($_GET['aksi']=='proseseditadmin'){
$nama  = $_POST['nama'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);
// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username' where user_id='$_GET[user_id]'");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
			echo "<script>window.location=('index.php?aksi=admin')</script>";
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../gambar/user/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username', user_foto='$x' where user_id='$_GET[user_id]'");		
			echo "<script>window.location=('index.php?aksi=admin')</script>";
	}
}elseif($filename==""){
	mysqli_query($koneksi, "update user set user_nama='$nama', user_username='$username', user_password='$password' where user_id='$_GET[user_id]'");
	echo "<script>window.location=('index.php?aksi=admin')</script>";
}
}
elseif($_GET['aksi']=='proseseditpegawai'){
	$password = md5($_POST['nik']);
	mysqli_query($koneksi,"UPDATE pegawai SET 
	nama_pegawai='$_POST[nama_pegawai]',
    no_hp='$_POST[no_hp]',
    email='$_POST[email]',
    nip='$_POST[nip]',
    tmp_lahir='$_POST[tmp_lahir]',
    tgl_lahir='$_POST[tgl_lahir]',
	jenis_kelamin='$_POST[jenis_kelamin]',	
	agama='$_POST[agama]',
	alamat='$_POST[alamat]',
	tingkat='$_POST[tingkat]',
	jurusan='$_POST[jurusan]',
	tahun_lulus='$_POST[tahun_lulus]',
	cpns='$_POST[cpns]',
	pns='$_POST[pns]',
	gol='$_POST[gol]',
	tmp='$_POST[tmp]',
	eselon='$_POST[eselon]',
	jabatan='$_POST[jabatan]',
	tmt_jabatan='$_POST[tmt_jabatan]',
	masa_kerja_thn='$_POST[masa_kerja_thn]',
	masa_kerja_bln='$_POST[masa_kerja_bln]',
	username='$_POST[nip]',
	password='$password',
	status='$_POST[status]',
	pesiunan_janda='$_POST[pesiunan_janda]',
	gaji_pns='$_POST[gaji_pns]',
	pekerjaan_lain='$_POST[pekerjaan_lain]',
	penghasilan_lain='$_POST[penghasilan_lain]'
	WHERE id_pegawai='$_GET[id_pegawai]'");
echo "<script>window.location=('index.php?aksi=pegawai')</script>";
}
elseif($_GET['aksi']=='proseseditkeluarga'){
	mysqli_query($koneksi,"UPDATE keluarga SET 
	id_pegawai='$_POST[id_pegawai]',
    nama_keluarga='$_POST[nama_keluarga]',
    jk_keluarga='$_POST[jk_keluarga]',
    tempatlahir_keluarga='$_POST[tempatlahir_keluarga]',
    tgllahir_keluarga='$_POST[tgllahir_keluarga]',
    status_keluarga='$_POST[status_keluarga]',
	pekejaan_keluarga='$_POST[pekejaan_keluarga]',	
	penghasilan_keluarga='$_POST[penghasilan_keluarga]',
	ket_keluarga='$_POST[ket_keluarga]',
	tunjang_status='$_POST[tunjang_status]',
	status_aktif='$_POST[status_aktif]'
	WHERE id_keluarga='$_GET[id_keluarga]'");
echo "<script>window.location=('index.php?aksi=listtunjangan&id_pegawai=$_POST[id_pegawai]')</script>";
}
elseif($_GET['aksi']=='prosesedianak'){
	mysqli_query($koneksi,"UPDATE keluarga SET 
	id_pegawai='$_POST[id_pegawai]',
    nama_keluarga='$_POST[nama_keluarga]',
    jk_keluarga='$_POST[jk_keluarga]',
    tempatlahir_keluarga='$_POST[tempatlahir_keluarga]',
    tgllahir_keluarga='$_POST[tgllahir_keluarga]',
    status_keluarga='$_POST[status_keluarga]',
	pekejaan_keluarga='$_POST[pekejaan_keluarga]',	
	pendidikan_keluarga='$_POST[pendidikan_keluarga]',
	ket_keluarga='$_POST[ket_keluarga]',
	tunjang_status='$_POST[tunjang_status]',
	tgl_mati='$_POST[tgl_mati]',
	status_nikah='$_POST[status_nikah]',
	status_beasiswa='$_POST[status_beasiswa]',
	anak_angkat_status='$_POST[anak_angkat_status]',
	status_sekolah='$_POST[status_sekolah]',
	status_aktif='$_POST[status_aktif]'
	WHERE id_keluarga='$_GET[id_keluarga]'");
echo "<script>window.location=('index.php?aksi=listtunjangan&id_pegawai=$_POST[id_pegawai]')</script>";
}
elseif($_GET['aksi']=='ajukantunjangan'){
	$tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai]");
  $t=mysqli_fetch_array($tebaru);
    mysqli_query($koneksi,"UPDATE keluarga SET 	tunjang_status='pengajuan' WHERE id_keluarga='$_GET[id_keluarga]'"); 
echo "<script>window.location=('index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]')</script>";
}
elseif($_GET['aksi']=='tidakajukantunjangan'){
	$tebaru=mysqli_query($koneksi," SELECT * FROM pegawai WHERE  id_pegawai=$_GET[id_pegawai]");
  $t=mysqli_fetch_array($tebaru);
    mysqli_query($koneksi,"UPDATE keluarga SET 	tunjang_status='tidak' WHERE id_keluarga='$_GET[id_keluarga]'"); 
echo "<script>window.location=('index.php?aksi=listtunjangan&id_pegawai=$t[id_pegawai]')</script>";
}
elseif($_GET['aksi']=='proseseditpangku'){
    mysqli_query($koneksi,"UPDATE pemangku SET 	nama_pkjab='$_POST[nama_pkjab]' WHERE id_pkjab='$_GET[id_pkjab]'"); 
echo "<script>window.location=('index.php?aksi=pangku')</script>";
}
elseif($_GET['aksi']=='proseseditpangkujabatan'){
	mysqli_query($koneksi,"UPDATE pemangkujabatan SET id_pegawai='$_POST[id_pegawai]',id_pkjab='$_POST[id_pkjab]',nomor_surat='$_POST[nomor_surat]',tanggal_surat='$_POST[tanggal_surat]' WHERE id_pangku='$_GET[id_pangku]'"); 
echo "<script>window.location=('index.php?aksi=pangkujabatan')</script>";
}
elseif($_GET['aksi']=='proseseditprofil'){
    mysqli_query($koneksi,"UPDATE profil SET nama='$_POST[nama]',alias='$_POST[alias]' WHERE id_profil ='$_GET[id_profil]'"); 
echo "<script>window.location=('index.php?aksi=kadis')</script>";
}

?>