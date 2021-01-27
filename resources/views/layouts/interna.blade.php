<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Observatorio de Turismo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../vendor/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="../vendor/fontawesome-free/css/all.min.css">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: BizPage - v3.2.0
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @yield('header')

    @yield('contenido')
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-info">
                        <img id="logo" class="logoFooter" src="img/logo.PNG">
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Mapa del Sitio</h4>
                        <ul>
                            <li><i class="ion-ios-arrow-right"></i> <a href="{{ url('/') }}">Home</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#">Estadísticas</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#">Lugares Turísticos</a></li>
                            <li><i class="ion-ios-arrow-right"></i> <a href="#">Contactos</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Contactos</h4>
                        <strong>Dirección:</strong> Marcelino Champagnat s/n<br><br>
                        <strong>Email:</strong> apludena@utpl.edu.ec<br><br>
                        <strong>Teléfono:</strong> +593 3701444<br><br>
                        <strong>Email:</strong> resanchez@utpl.edu.ec<br>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Redes Sociales</h4>
                        <div class="social-links">
                            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="fab fa-google-plus"></i></a>
                            <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>BizPage</strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
              -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    @yield('js')
    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="../vendor/adminlte/dist/js/adminlte.min.js"></script>


</body>

</html>
