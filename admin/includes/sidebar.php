<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/daqu-al-jannah/admin/dashboard.php" class="brand-link">
        <i class="fas fa-mosque brand-image img-circle elevation-3" style="opacity: .8"></i>
        <span class="brand-text font-weight-light">Dashboard Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false" role="menu">
                <!-- HOME -->
                <li class="nav-item has-treeview <?php echo in_array($current_page, [
                    'carousel.php', 'benefit.php', 'pendidikan.php', 'ekskul.php', 'karakter.php', 'stats.php', 'organisasi.php'
                ]) ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?php echo in_array($current_page, [
                        'carousel.php', 'benefit.php', 'pendidikan.php', 'ekskul.php', 'karakter.php', 'stats.php', 'organisasi.php'
                    ]) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/carousel/carousel.php" class="nav-link <?php echo $current_page == 'carousel.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Carousel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/benefit/benefit.php" class="nav-link <?php echo $current_page == 'benefit.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Benefit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/pendidikan/pendidikan.php" class="nav-link <?php echo $current_page == 'pendidikan.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendidikan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/ekskul/ekskul.php" class="nav-link <?php echo $current_page == 'ekskul.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ekstrakurikuler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/karakter/karakter.php" class="nav-link <?php echo $current_page == 'karakter.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Karakter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/stats/stats.php" class="nav-link <?php echo $current_page == 'stats.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statistik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/organisasi/organisasi.php" class="nav-link <?php echo $current_page == 'organisasi.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Organisasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- PROFIL -->
                <li class="nav-item has-treeview <?php echo $current_page == 'sejarah.php' ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?php echo $current_page == 'sejarah.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/sejarah/sejarah.php" class="nav-link <?php echo $current_page == 'sejarah.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sejarah</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- NEWS -->
                <li class="nav-item has-treeview <?php echo in_array($current_page, [
                    'berita.php', 'akademik.php', 'santri.php', 'alumni.php'
                ]) ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?php echo in_array($current_page, [
                        'berita.php', 'akademik.php', 'santri.php', 'alumni.php'
                    ]) ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            News
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/berita/berita.php" class="nav-link <?php echo $current_page == 'berita.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berita Pilihan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/akademik/akademik.php" class="nav-link <?php echo $current_page == 'akademik.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Info Akademik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/santri/santri.php" class="nav-link <?php echo $current_page == 'santri.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Info Santri</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/alumni/alumni.php" class="nav-link <?php echo $current_page == 'alumni.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Info Alumni</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- GALERI -->
                <li class="nav-item">
                    <a href="/daqu-al-jannah/admin/modules/galeri/galeri.php" class="nav-link <?php echo $current_page == 'galeri.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Galeri</p>
                    </a>
                </li>
                <!-- PRODUK -->
                <li class="nav-item">
                    <a href="/daqu-al-jannah/admin/modules/dec/dec.php" class="nav-link <?php echo $current_page == 'dec.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-store"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <!-- PENDAFTARAN -->
                <li class="nav-item">
                    <a href="/daqu-al-jannah/admin/modules/pendaftaran/pendaftaran.php" class="nav-link <?php echo $current_page == 'pendaftaran.php' ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>Pendaftaran</p>
                    </a>
                </li>
                <!-- DONASI -->
                <li class="nav-item has-treeview <?php echo ($current_page == 'donasi.php' || $current_page == 'carousel_donasi.php' || $current_page == 'data_donasi.php') ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link <?php echo ($current_page == 'donasi.php' || $current_page == 'carousel_donasi.php' || $current_page == 'data_donasi.php') ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-hand-holding-heart"></i>
                        <p>
                            Donasi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/donasi/carousel_donasi.php" class="nav-link <?php echo $current_page == 'carousel_donasi.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Carousel Donasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/donasi/donasi.php" class="nav-link <?php echo $current_page == 'donasi.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Program Donasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daqu-al-jannah/admin/modules/donasi/data_donasi.php" class="nav-link <?php echo $current_page == 'data_donasi.php' ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Donasi Masuk</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>