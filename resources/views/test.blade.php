<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Maduretno - Portal Layanan Pengajuan Surat</title>
    <link rel="icon" href="{{ asset('assets/img/kaiadmin/logo-provinsi-jawa-timur.ico') }}" type="image/x-icon" />
    <style>
        :root {
            --primary-color: #2c355f;
            --secondary-color: #11bebe;
            --accent-color: #7ac8ff;
            --dark-color: #333333;
            --light-color: #F5F5F5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light-color);
            color: var(--dark-color);
            line-height: 1.6;
        }

        header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--accent-color);
        }

        .btn {
            display: inline-block;
            background-color: var(--secondary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: var(--accent-color);
            color: var(--dark-color);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--secondary-color);
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('assets/img/kantor.jpg') }}') center/cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: white;
            margin-top: 70px;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 4px;
            background-color: var(--secondary-color);
            bottom: -10px;
            left: 25%;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .feature-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .feature-card h3 {
            margin-bottom: 15px;
            color: var(--primary-color);
        }

        .about {
            background-color: rgba(151, 190, 17, 0.1);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .about-image {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }

        .about-text h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 15px;
        }

        .services {
            background-color: white;
        }

        .service-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .service-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            transition: transform 0.3s;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .service-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-card p {
            margin-bottom: 20px;
        }

        .stats {
            background: linear-gradient(rgba(44, 95, 93, 0.9), rgba(44, 95, 94, 0.9)), url('/api/placeholder/1200/400') center/cover fixed no-repeat;
            color: white;
            text-align: center;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .stat-item h3 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .testimonials {
            background-color: var(--light-color);
        }

        .testimonial-slider {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .testimonial {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .testimonial p {
            font-style: italic;
            margin-bottom: 20px;
        }

        .testimonial-author {
            font-weight: bold;
            color: var(--primary-color);
        }

        .testimonial-role {
            font-size: 0.9rem;
            color: #666;
        }

        .cta {
            background-color: var(--primary-color);
            color: white;
            text-align: center;
        }

        .cta h2 {
            margin-bottom: 20px;
        }

        .cta p {
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 50px 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .footer-links h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: var(--accent-color);
        }

        .footer-links ul {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--accent-color);
        }

        .footer-contact p {
            margin-bottom: 10px;
        }

        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .footer-social a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-color: #444;
            border-radius: 50%;
            color: white;
            text-align: center;
            line-height: 40px;
            transition: background-color 0.3s;
        }

        .footer-social a:hover {
            background-color: var(--secondary-color);
        }

        .copyright {
            margin-top: 30px;
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #444;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
            }

            .nav-links {
                margin-top: 20px;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .about-content {
                grid-template-columns: 1fr;
            }

            .feature-card, .service-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container">
            <nav class="navbar">
                <div class="logo">
                    {{-- <img src="/api/placeholder/50/50" alt="Logo Desa Sejahtera"> --}}
                    <span>Desa Maduretno</span>
                </div>
                <ul class="nav-links">
                    <li><a href="#beranda" class="center">Beranda</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#statistik">Statistik</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                    <li><a href="/login" >Masuk</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="beranda" class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Selamat Datang di Desa Maduretno</h1>
                <p>Portal layanan pengajuan surat online untuk memudahkan warga desa dalam mengurus administrasi kependudukan</p>
                <a href="/register" class="btn">Daftar Sekarang</a>
                <a href="#layanan" class="btn btn-outline">Pelajari Layanan</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Keunggulan Layanan Kami</h2>
            </div>
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">⏱️</div>
                    <h3>Cepat & Efisien</h3>
                    <p>Proses pengajuan surat yang cepat tanpa perlu antri di kantor desa. Hemat waktu dan tenaga Anda.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Aman & Terpercaya</h3>
                    <p>Data pribadi Anda terlindungi dengan sistem keamanan yang terjamin. Kerahasiaan data adalah prioritas kami.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Akses Dimana Saja</h3>
                    <p>Akses layanan kapan saja dan dimana saja melalui perangkat digital Anda, baik komputer maupun smartphone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="section about">
        <div class="container">
            <div class="section-title">
                <h2>Tentang Desa Maduretno</h2>
            </div>
            <div class="about-content">
                <div class="about-image">
                    <img src="{{ asset('assets/img/peta.png') }}" alt="Foto Desa Sejahtera">
                </div>
                <div class="about-text">
                    <h2>Desa yang Mengutamakan Kemajuan dan Kesejahteraan Warga</h2>
                    <p>Desa Maduretno merupakan desa yang terletak di Kecamatan Papar, Kabupaten Kediri. Dengan luas wilayah sekitar 1,51 km² dan jumlah penduduk sebanyak 2.139 jiwa, Desa Maduretno terus berkomitmen untuk meningkatkan kualitas hidup warganya.</p>
<p>Desa kami memiliki potensi unggulan di bidang pertanian dengan lahan sawah yang luas, serta kegiatan pemberdayaan masyarakat melalui pelatihan kerajinan tangan. Berbagai prestasi juga telah diraih, seperti desa bebas demam berdarah, juara Taman Posyandu, dan pelaksana program ODF terbaik. Didukung oleh lembaga pendidikan dan partisipasi masyarakat yang tinggi, kami terus mengembangkan program-program inovatif demi kemajuan desa.</p>
<p>Portal layanan pengajuan surat online ini adalah salah satu bentuk inovasi kami dalam meningkatkan pelayanan publik yang efektif, efisien, dan transparan. Kami berkomitmen untuk terus memberikan pelayanan terbaik bagi seluruh warga Desa Maduretno.</p>

                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="section services">
        <div class="container">
            <div class="section-title">
                <h2>Layanan Pengajuan Surat</h2>
            </div>
            <div class="service-cards">
                <div class="service-card">
                    <h3>Surat Keterangan Domisili</h3>
                    <p>Surat yang menerangkan tempat tinggal atau domisili seseorang di wilayah desa.</p>
                    <a href="/layanan/domisili" class="btn">Ajukan Sekarang</a>
                </div>
                <div class="service-card">
                    <h3>Surat Keterangan Tidak Mampu</h3>
                    <p>Surat keterangan untuk keluarga kurang mampu yang dapat digunakan untuk berbagai keperluan.</p>
                    <a href="/layanan/sktm" class="btn">Ajukan Sekarang</a>
                </div>
                <div class="service-card">
                    <h3>Surat Pengantar KTP</h3>
                    <p>Surat pengantar dari desa untuk pembuatan atau perpanjangan KTP di kecamatan.</p>
                    <a href="/layanan/ktp" class="btn">Ajukan Sekarang</a>
                </div>
                <div class="service-card">
                    <h3>Surat Keterangan Usaha</h3>
                    <p>Surat yang menerangkan bahwa seseorang memiliki usaha tertentu di wilayah desa.</p>
                    <a href="/layanan/sku" class="btn">Ajukan Sekarang</a>
                </div>
                <div class="service-card">
                    <h3>Surat Keterangan Kelahiran</h3>
                    <p>Surat pengantar dari desa untuk pengurusan akta kelahiran anak.</p>
                    <a href="/layanan/kelahiran" class="btn">Ajukan Sekarang</a>
                </div>
                <div class="service-card">
                    <h3>Surat Keterangan Kematian</h3>
                    <p>Surat keterangan dari desa mengenai peristiwa kematian warga desa.</p>
                    <a href="/layanan/kematian" class="btn">Ajukan Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="statistik" class="section stats">
        <div class="container">
            <div class="section-title">
                <h2>Statistik Desa Maduretno</h2>
            </div>
            <div class="stats-container">
                <div class="stat-item">
                    <h3>5,000+</h3>
                    <p>Jumlah Penduduk</p>
                </div>
                <div class="stat-item">
                    <h3>1,200+</h3>
                    <p>Kepala Keluarga</p>
                </div>
                <div class="stat-item">
                    <h3>500+</h3>
                    <p>Layanan Surat per Bulan</p>
                </div>
                <div class="stat-item">
                    <h3>15+</h3>
                    <p>Staf Pelayanan</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="section testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Apa Kata Warga Kami</h2>
            </div>
            <div class="testimonial-slider">
                <div class="testimonial">
                    <p>"Layanan pengajuan surat online ini sangat membantu saya yang sibuk bekerja. Tidak perlu lagi meluangkan waktu khusus ke kantor desa. Prosesnya cepat dan mudah!"</p>
                    <div class="testimonial-author">Ahmad Supriyadi</div>
                    <div class="testimonial-role">Warga Desa Maduretno</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section cta">
        <div class="container">
            <h2>Siap Menggunakan Layanan Kami?</h2>
            <p>Daftarkan diri Anda sekarang dan nikmati kemudahan dalam pengajuan surat kependudukan secara online. Kami siap melayani kebutuhan administrasi Anda dengan cepat dan efisien.</p>
            <a href="/register" class="btn">Daftar Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer id="kontak">
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <div class="footer-logo">Desa Maduretno</div>
                    <p>Portal layanan pengajuan surat desa online untuk memudahkan warga dalam mengurus administrasi kependudukan.</p>
                </div>
                <div class="footer-links">
                    <h3>Tautan Cepat</h3>
                    <ul>
                        <li><a href="#beranda">Beranda</a></li>
                        <li><a href="#tentang">Tentang Kami</a></li>
                        <li><a href="#layanan">Layanan</a></li>
                        <li><a href="#statistik">Statistik</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h3>Layanan</h3>
                    <ul>
                        <li><a href="/layanan/domisili">Surat Domisili</a></li>
                        <li><a href="/layanan/sktm">Surat Tidak Mampu</a></li>
                        <li><a href="/layanan/ktp">Pengantar KTP</a></li>
                        <li><a href="/layanan/sku">Keterangan Usaha</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Kontak Kami</h3>
                    <p>Jl. Maduretno No. 123, Desa Maduretno</p>
                    <p>Kecamatan Makmur, Kabupaten Bahagia</p>
                    <p>Email: info@desasejahtera.desa.id</p>
                    <p>Telepon: (021) 1234-5678</p>
                    <div class="footer-social">
                        <a href="#">FB</a>
                        <a href="#">IG</a>
                        <a href="#">TW</a>
                        <a href="#">YT</a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Desa Maduretno. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scroll untuk navigasi
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>