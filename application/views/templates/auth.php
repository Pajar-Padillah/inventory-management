<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login | Aplikasi Inventory Barang KPU Bandar Lampung</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>assets/login/img/kpu-logo.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Modal -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <!-- Sweetalert2 CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/sweetalert2/sweetalert2.min.css'); ?>">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/select2/select2.min.css'); ?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url(); ?>assets/login/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/login/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Template Main CSS File -->
    <link href="<?php echo base_url(); ?>assets/login/css/style.css" rel="stylesheet">


    <!-- =======================================================
  * Template Name: BizLand - v3.6.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-search d-flex align-items-center"><a href="https://kota-bandarlampung.kpu.go.id" target="_blank">kpu.go.id</a></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span>
                        <div id="clock"></div>
                    </span></i>
            </div>
        </div>
    </section>

    <?= $contents; ?>


    <!-- Sweet Alert 2 -->
    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <div class="flashdata-success" data-flashdata="<?= $this->session->flashdata('message-success'); ?>"></div>
    <div class="flashdata-failed" data-flashdata="<?= $this->session->flashdata('message-failed'); ?>"></div>
    <!-- ./Sweet Alert 2 -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/vendor/jquery/jquery-3.4.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/sweetalert2/sweetalert2.all.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/select2/select2.min.js'); ?>"></script>

    <!-- Config JavaScript -->
    <script src="<?= base_url('assets/js/config-fancybox.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config-sweetalert2.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config-sidebar.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config-select2.js'); ?>"></script>


    <!-- Vendor JS Files -->
    <script src="<?php echo base_url(); ?>assets/login/vendor/aos/aos.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/purecounter/purecounter.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Template Main JS File -->
    <script src="<?php echo base_url(); ?>assets/login/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/modal.js"></script>
    <script>
        $(document).ready(function() {
            $('.zoom').hover(function() {
                $(this).addClass('transisi');
            }, function() {
                $(this).removeClass('transisi');
            });
        });
    </script>
    <script>
        setInterval(() => {
            let date = new Date()
            let clock = document.getElementById('clock')
            clock.innerHTML =
                date.getHours() + ":" +
                date.getMinutes() + ":" +
                date.getSeconds()
        }, 1000);
    </script>
    <!-- <script>
    $('#alert').modal('show'); 
</script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type', 'text');
                } else {
                    $('.form-password').attr('type', 'password');
                }
            });
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Toastr -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Add Records -->
    <script>
        $(document).on("click", "#login", function(e) {
            e.preventDefault();

            var username = $("#username").val();
            var password = $("#password").val();

            if (username == "" || password == "") {
                alert("Both field is required");
            } else {
                $.ajax({
                    url: "<?php echo base_url(); ?>insert",
                    type: "post",
                    dataType: "json",
                    data: {
                        username: username,
                        password: password
                    },
                    success: function(data) {
                        if (data.responce == "success") {
                            $('#records').DataTable().destroy();
                            fetch();
                            $('#exampleModal').modal('hide');
                            toastr["success"](data.message);
                        } else {
                            toastr["error"](data.message);
                        }

                    }
                });

                $("#form")[0].reset();

            }

        });
    </script>

</body>

</html>