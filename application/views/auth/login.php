<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- <h1 class="logo"><a href="#">s<span></span></a></h1>
                Uncomment below if you prefer to use an image logo -->
        <a href="<?= base_url('auth'); ?>" class="logo"><img src="<?php echo base_url(); ?>assets/login/img/kpu-logo.png" alt="icon" height="70px"></a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                <!-- <li><a class="nav-link scrollto " href="#portfolio">Unit</a></li> -->
                <li><a class="nav-link scrollto" href="#tentang">Tentang</a></li>
                <!-- <li><a class="nav-link scrollto" href="#contact">Kontak</a></li> -->
            </ul>

            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->


<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h1>Selamat Datang Di <span>Aplikasi Inventory Barang</span></h1>
        <h2>Komisi Pemilihan Umum (KPU) Kota Bandar Lampung</h2>
        <div class="d-flex">
            <a class="btn-get-started scrollto modal-button">Login</a>
            <!-- <a href="https://youtu.be/_pg_cKK1oaM" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Lihat Video Profil Penus Disini</span></a> -->
        </div>
    </div>
</section><!-- End Hero -->


<main id="main">
    <!-- ======= Portfolio Section ======= -->


    <!-- ======= Contact Section ======= -->
    <section id="tentang" class="contact">
        <div class="container" data-aos="fade-up">



            <div class="section-title">
                <h2>Tentang</h2>
                <!-- <h3><span>Tentang Kami</span></h3> -->
                <p>Aplikasi Inventory Gudang Berbasis Web ini adalah sebuah sistem informasi persediaan barang gudang yang dibangun dan digunakan untuk memudahkan dalam managemen stok barang digudang. Aplikasi ini dilengkapi dengan fitur login multi user, data barang, data satuan, transaksi keluar masuk barang dan lain sebagainya.</p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-4">
                    <div class="info-box mb-4">
                        <img src="<?php echo base_url() ?>assets/login/img/tentang/system1.png" alt="Norway" style="width:100%" height="200px" class="w3-hover-opacity zoom">
                        <!-- <div class="w3-container w3-white">
                        <p><b>Lorem Ipsum</b></p>
                        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                    </div> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-box mb-4">
                        <img src="<?php echo base_url() ?>assets/login/img/tentang/system2.jpeg" alt="Norway" style="width:100%" height="200px" class="w3-hover-opacity zoom">
                        <!-- <div class="w3-container w3-white">
                        <p><b>Lorem Ipsum</b></p>
                        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                    </div> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info-box mb-4">
                        <img src="<?php echo base_url() ?>assets/login/img/tentang/system3.jpg" style="width:100%" height="200px" class="w3-hover-opacity zoom">
                        <!-- <div class="w3-container w3-white">
                        <p><b>Lorem Ipsum</b></p>
                        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
                    </div> -->
                    </div>
                </div>
            </div>

            <!-- <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
                <div class="info-box mb-4">
                    <i class="bx bx-map"></i>
                    <h3>Alamat</h3>
                    <p>Kantor Direksi : Jalan Teuku Umar No.300 Bandar Lampung - 35141</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Kami</h3>
                    <p>sekretariat@ptpn7.com</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="info-box  mb-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Hubungi Kami</h3>
                    <p>0721-702233</p>
                </div>
            </div>

        </div> -->

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15888.819380195222!2d105.3036294!3d-5.3857166!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x2c9750129b180b90!2sKPU%20Kota%20Bandar%20Lampung!5e0!3m2!1sid!2sid!4v1671019531863!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" style="border:0;"></iframe>
            </div>
        </div>

    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container py-4">
        <div class="copyright">
            <strong>Copyright &copy; <?= date('Y'); ?> <a>Pajar Padillah</a></strong>
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            <b> Tugas Akhir &copy;</b> Manajemen Informatika
        </div>
    </div>
</footer><!-- End Footer -->
<?php if ($this->session->flashdata('password_salah')) { ?>
    <script>
        swal.fire({
            title: "Login Gagal!",
            text: "Password Anda Salah!",
            icon: "error"
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('blm_terdaftar')) { ?>
    <script>
        swal.fire({
            title: "Login Gagal!",
            text: "Akun belum terdaftar!",
            icon: "error"
        });
    </script>
<?php } ?>
<div class="modal">
    <div class="modal-container">
        <div class="modal-left">
            <h1 class="modal-title"><i class="fa-sharp fa-solid fa-right-to-bracket"></i> Login</h1>
            <p class="modal-desc">Silahkan login dengan akun anda untuk masuk ke aplikasi!</p>
            <?= form_open('', ['class' => 'user']); ?>
            <div class="input-block">
                <label for="username" class="input-label"><i class="fa-sharp fa-solid fa-user"></i> Username</label>
                <input required autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="username" name="username" placeholder="Username">
                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="input-block">
                <label for="password" class="input-label"><i class="fa-sharp fa-solid fa-lock"></i> Password</label>
                <input required type="password" name="password" class="form-password" id="password" placeholder="Password">
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <input type="checkbox" class="form-checkbox"> Show password

            <!-- <input type="checkbox" class="form-checkbox"> Show password -->
            <div class="modal-buttons"><br><br>
                <!--  <a href="" class="">Forgot your password?</a> -->
                <br><button type="submit" name="login" class="input-button">Login</button>
            </div>
            <?= form_close(); ?>
            <div class="col-lg-12 text-center mt-3">
                Lupa username/password? Silahkan hubungi admin.
            </div>
            <!--  <p class="sign-up">Don't have an account? <a href="#">Sign up now</a></p> -->
        </div>
        <div class="modal-right">
            <img src="<?php echo base_url() ?>assets/login/img/login.jpg" alt="">
        </div>
        <button class="icon-button close-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50">
                <path d="M 25 3 C 12.86158 3 3 12.86158 3 25 C 3 37.13842 12.86158 47 25 47 C 37.13842 47 47 37.13842 47 25 C 47 12.86158 37.13842 3 25 3 z M 25 5 C 36.05754 5 45 13.94246 45 25 C 45 36.05754 36.05754 45 25 45 C 13.94246 45 5 36.05754 5 25 C 5 13.94246 13.94246 5 25 5 z M 16.990234 15.990234 A 1.0001 1.0001 0 0 0 16.292969 17.707031 L 23.585938 25 L 16.292969 32.292969 A 1.0001 1.0001 0 1 0 17.707031 33.707031 L 25 26.414062 L 32.292969 33.707031 A 1.0001 1.0001 0 1 0 33.707031 32.292969 L 26.414062 25 L 33.707031 17.707031 A 1.0001 1.0001 0 0 0 32.980469 15.990234 A 1.0001 1.0001 0 0 0 32.292969 16.292969 L 25 23.585938 L 17.707031 16.292969 A 1.0001 1.0001 0 0 0 16.990234 15.990234 z"></path>
            </svg>
        </button>
    </div>
</div>