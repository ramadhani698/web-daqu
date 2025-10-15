<?php
// ... existing code ...
include 'config/config.php'; // pastikan koneksi database sudah ada

// Query ringkasan data
$jumlah_santri = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM prestasi"))[0];
$jumlah_berita = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM berita"))[0];
$jumlah_alumni = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM alumni"))[0];

// Query galeri
$jumlah_galeri = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM galeri"))[0];
$galeri_preview = mysqli_query($conn, "SELECT gambar FROM galeri ORDER BY id DESC LIMIT 4");

// Query stats pesantren
$jumlah_stats = mysqli_fetch_row(mysqli_query($conn, "SELECT COUNT(*) FROM stats"))[0];
?>

<?php include 'includes/header.php'; ?>

<div class="wrapper">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        
        <!-- Header Content -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Dashboard Admin</h1>
                <p>Selamat datang di Dashboard Admin Pesantren Daarul Qur'an Al-Jannah</p>
            </div>
        </div>

        <!-- Main Content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Ringkasan Data -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $jumlah_santri; ?></h3>
                                <p>Prestasi Santri</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <a href="modules/santri/santri.php" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $jumlah_berita; ?></h3>
                                <p>Berita</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <a href="modules/berita/berita.php" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $jumlah_alumni; ?></h3>
                                <p>Alumni</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <a href="modules/alumni/alumni.php" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?php echo $jumlah_galeri; ?></h3>
                                <p>Foto Galeri</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-images"></i>
                            </div>
                            <a href="modules/galeri/galeri.php" class="small-box-footer">Lihat Semua <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                <!-- End Ringkasan Data -->

                <!-- Ringkasan Galeri -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Preview Galeri Terbaru</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php while($foto = mysqli_fetch_assoc($galeri_preview)): ?>
                                        <div class="col-6 col-md-3 mb-2">
                                            <img src="/daqu-al-jannah/img/<?php echo htmlspecialchars($foto['gambar']); ?>" class="img-fluid rounded shadow" alt="Galeri">
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Ringkasan Galeri -->

                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Quick Access</h3>
                    </div>
                    <div class="card-body">
                        <p>Pilih menu di sidebar untuk mengelola konten.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</div>