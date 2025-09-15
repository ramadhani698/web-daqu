<?php
include __DIR__ . '/../admin/config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $nisn = $_POST['nisn'];
    $kip = $_POST['kip'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $anak_ke = $_POST['anak_ke'];
    $jumlah_saudara = $_POST['jumlah_saudara'];
    $cita_cita = $_POST['cita_cita'];
    $hobi = $_POST['hobi'];
    $pembiaya_sekolah = $_POST['pembiaya_sekolah'];

    $no_kk = $_POST['no_kk'];
    $nama_kepala_keluarga = $_POST['nama_kepala_keluarga'];
    $nama_ayah = $_POST['nama_ayah'];
    $status_ayah = $_POST['status_ayah'];
    $nik_ayah = $_POST['nik_ayah'];
    $tempat_lahir_ayah = $_POST['tempat_lahir_ayah'];
    $tanggal_lahir_ayah = $_POST['tanggal_lahir_ayah'];
    $pendidikan_ayah = $_POST['pendidikan_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $penghasilan_ayah = $_POST['penghasilan_ayah'];
    $hp_ayah = $_POST['hp_ayah'];

    $nama_ibu = $_POST['nama_ibu'];
    $status_ibu = $_POST['status_ibu'];
    $nik_ibu = $_POST['nik_ibu'];
    $tempat_lahir_ibu = $_POST['tempat_lahir_ibu'];
    $tanggal_lahir_ibu = $_POST['tanggal_lahir_ibu'];
    $pendidikan_ibu = $_POST['pendidikan_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $penghasilan_ibu = $_POST['penghasilan_ibu'];
    $hp_ibu = $_POST['hp_ibu'];

    $provinsi = $_POST['provinsi'];
    $kabupaten = $_POST['kabupaten'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $rt_rw = $_POST['rt_rw'];
    $alamat = $_POST['alamat'];

    // Upload file KK
    $file_kk = "";
        if (!empty($_FILES['upload_kk']['name'])) {
            $targetDir = __DIR__ . '/../admin/modules/pendaftaran/uploads/';
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $kk_filename = time() . "_kk_" . basename($_FILES['upload_kk']['name']);
            $file_kk_path = $targetDir . $kk_filename;
            move_uploaded_file($_FILES['upload_kk']['tmp_name'], $file_kk_path);
            // Simpan hanya nama file ke DB
            $file_kk = $kk_filename;
        }

        $file_ijazah = "";
        if (!empty($_FILES['upload_ijazah']['name'])) {
            $targetDir = __DIR__ . '/../admin/modules/pendaftaran/uploads/';
            if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
            $ijazah_filename = time() . "_ijazah_" . basename($_FILES['upload_ijazah']['name']);
            $file_ijazah_path = $targetDir . $ijazah_filename;
            move_uploaded_file($_FILES['upload_ijazah']['tmp_name'], $file_ijazah_path);
            // Simpan hanya nama file ke DB
            $file_ijazah = $ijazah_filename;
        }

    // Simpan ke DB
    $sql = "INSERT INTO pendaftaran_santri 
    (nama_lengkap, nik, nisn, kip, tempat_lahir, tanggal_lahir, anak_ke, jumlah_saudara, cita_cita, hobi, pembiaya_sekolah,
    no_kk, nama_kepala_keluarga, nama_ayah, status_ayah, nik_ayah, tempat_lahir_ayah, tanggal_lahir_ayah, pendidikan_ayah, pekerjaan_ayah, penghasilan_ayah, hp_ayah,
    nama_ibu, status_ibu, nik_ibu, tempat_lahir_ibu, tanggal_lahir_ibu, pendidikan_ibu, pekerjaan_ibu, penghasilan_ibu, hp_ibu,
    provinsi, kabupaten, kecamatan, kelurahan, rt_rw, alamat, file_kk, file_ijazah) 
    VALUES 
    ('$nama_lengkap', '$nik', '$nisn', '$kip', '$tempat_lahir', '$tanggal_lahir', '$anak_ke', '$jumlah_saudara', '$cita_cita', '$hobi', '$pembiaya_sekolah',
    '$no_kk', '$nama_kepala_keluarga', '$nama_ayah', '$status_ayah', '$nik_ayah', '$tempat_lahir_ayah', '$tanggal_lahir_ayah', '$pendidikan_ayah', '$pekerjaan_ayah', '$penghasilan_ayah', '$hp_ayah',
    '$nama_ibu', '$status_ibu', '$nik_ibu', '$tempat_lahir_ibu', '$tanggal_lahir_ibu', '$pendidikan_ibu', '$pekerjaan_ibu', '$penghasilan_ibu', '$hp_ibu',
    '$provinsi', '$kabupaten', '$kecamatan', '$kelurahan', '$rt_rw', '$alamat', '$file_kk', '$file_ijazah')";

    if ($conn->query($sql) === TRUE) {
        echo "Pendaftaran berhasil disimpan!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
