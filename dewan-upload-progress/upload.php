<?php
$fileName = $_FILES["file"]["name"]; // Nama File asli
$fileTmp = $_FILES["file"]["tmp_name"]; // File di folder tmp PHP

// Generate nama file unik dengan menambahkan timestamp
$unikFileName = time() . '_' . $fileName;

// Jika belum ada folder upload, maka buat folder upload
$temp = "upload/";
if (!file_exists($temp)) {
    mkdir($temp);
}

if (move_uploaded_file($fileTmp, $temp . $unikFileName)) {
    echo "$unikFileName berhasil diupload";

    // Simpan data ke dalam database
    $koneksi = mysqli_connect("localhost", "root", "", "db_akreditasi");

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

?>
