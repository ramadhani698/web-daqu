<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sejarah Pesantren - Daarul Qur'an Al-Jannah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #0369A1;
            --secondary-color: #0C4A6E;
            --accent-color: #F59E0B;
            --light-color: #EFF6FF;
            --dark-color: #1E3A8A;
            --text-color: #1F2937;
            --white: #FFFFFF;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            background-color: #F8FAFC;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            padding: 1rem 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--light-color);
            color: var(--primary-color);
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logo-text {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .logo-subtext {
            font-size: 0.8rem;
            opacity: 0.9;
            margin-top: 2px;
        }

        /* Navigation */
        .nav-menu {
            display: flex;
            gap: 30px;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            color: var(--white);
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
            padding: 8px 0;
        }

        .nav-link:hover {
            color: var(--accent-color);
        }

        .nav-link i {
            font-size: 0.9rem;
        }

        /* Hero Section */
        .hero {
            background: url('https://placehold.co/1920x1080') no-repeat center center/cover;
            height: 300px;
            position: relative;
            display: flex;
            align-items: center;
            color: var(--white);
            margin-bottom: 50px;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        .hero-title {
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        /* Content Section */
        .content-section {
            padding: 50px 0;
        }

        .content-title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: var(--secondary-color);
        }

        .content-text {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1rem;
            line-height: 1.8;
            text-align: justify;
            color: var(--text-color);
        }

        /* Footer */
        .footer {
            background-color: var(--secondary-color);
            color: var(--white);
            padding: 50px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }

        .footer-col h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-col h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 2px;
            background-color: var(--accent-color);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: var(--accent-color);
            padding-left: 5px;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 15px;
        }

        .footer-contact-icon {
            color: var(--accent-color);
            font-size: 1rem;
            margin-top: 3px;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--white);
            transition: var(--transition);
        }

        .social-link:hover {
            background-color: var(--accent-color);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .content-title {
                font-size: 1.5rem;
            }

            .content-text {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container header-container">
            <div class="logo">
                <div class="logo-img">DQ</div>
                <div>
                    <div class="logo-text">Daarul Qur'an</div>
                    <div class="logo-subtext">Al-Jannah</div>
                </div>
            </div>
            <nav class="nav-menu">
                <div class="nav-item">
                    <a href="#" class="nav-link"><i class="fas fa-home"></i> Beranda</a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link"><i class="fas fa-info-circle"></i> Profil</a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link"><i class="fas fa-quran"></i> Program</a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link"><i class="fas fa-newspaper"></i> Berita</a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link"><i class="fas fa-address-book"></i> Kontak</a>
                </div>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container hero-content">
            <h1 class="hero-title">Sejarah Pesantren</h1>
        </div>
    </section>

    <section class="content-section">
        <div class="container">
            <h2 class="content-title">Sejarah Yayasan Al Jannah Daarussalam</h2>
            <p class="content-text">
                Yayasan didirikan dengan tujuan menjadi wadah yang menampung amal sholeh kaum Muslimin dan Muslimat yang menyalurkan zakat, infaq dan sodaqoh untuk membiayai pendidikan anak-anak yatim dan anak-anak dari keluarga yang kurang mampu (dhuafa) khususnya di bidang tahfidz Qur’an dan pendidikan Muadalah setingkat SMU. Pendiri Yayasan terdiri dari Ibu Hj. Siti Hatijah Siregar, Ibu Hj. Herawati, Ibu Hj. Ina Suhaenah, Ibu Hj. Ernawati (alm), Ibu Hj. Umi Kalsum.
            </p>
            <p class="content-text">
                Diawali dari memberikan bea siswa dan bantuan pendidikan kepada anak-anak yatim dan dhuafa di sekitar tempat tinggal para pendiri, dibantu oleh beberapa ibu-ibu relawan dan donatur perorangan untuk mewujudkan visi dan misi tersebut di atas maka dikembangkan hingga mendirikan Pesantren tahfidz Al Qur’an yang program dan standar serta metode pengajarannya menginduk kepada Pondok Pesantren tahfidz Qur’an Daarul Qur’an asuhan Ustadz Yusuf Mansur. Fokus Yayasan Al Jannah Daarussalam adalah untuk membantu anak yatim dan dhuafa agar mendapat pendidikan Muadalah setingkat SMU yang memiliki keistimewaan iman, taqwa dan Hafiz Al Qur’an dengan TIDAK BERBAYAR atau GRATIS.
            </p>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>Tentang Kami</h3>
                    <p style="color: rgba(255, 255, 255, 0.8); margin-bottom: 15px;">
                        Pesantren Tahfidz Daarul Qur'an Al-Jannah berkomitmen untuk mencetak generasi penghafal Al-Qur'an yang berakhlak mulia.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h3>Link Cepat</h3>
                    <ul class="footer-links">
                        <li><a href="#">Kalender Akademik</a></li>
                        <li><a href="#">Daftar Santri Baru</a></li>
                        <li><a href="#">Prestasi Santri</a></li>
                        <li><a href="#">Rekaman Murottal</a></li>
                        <li><a href="#">Donasi & Wakaf</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h3>Kontak Kami</h3>
                    <div class="footer-contact-item">
                        <i class="fas fa-map-marker-alt footer-contact-icon"></i>
                        <span>Jl. Pendidikan No. 123, Cimahi, Jawa Barat</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-phone-alt footer-contact-icon"></i>
                        <span>+62 123 4567 890</span>
                    </div>
                    <div class="footer-contact-item">
                        <i class="fas fa-envelope footer-contact-icon"></i>
                        <span>info@daarulquran-aljannah.id</span>
                    </div>
                </div>
            </div>
            <div class="copyright">
                &copy; 2023 Pesantren Tahfidz Daarul Qur'an Al-Jannah. All Rights Reserved.
            </div>
        </div>
    </footer>
</body>
</html>
