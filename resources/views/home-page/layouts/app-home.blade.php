
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Menu Star Steak</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
        <!-- Bootstrap icons-->
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>

        <style>
            body {
                padding-top: 56px; /* Sesuaikan nilai ini dengan tinggi navbar */
            }
            .navbar-expand {
                background-color: #FF0009; 
                color: white;
            }
            .navbar-expand .btn-outline-dark {
                color: #033800;
                border-color: #033800;
            }
            .navbar-expand .btn-outline-dark:hover {
                background-color: #033800;
                color: #842029;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <!-- Navigation-->
        <!-- <nav class="navbar custom-navbar fixed-top"> -->
        <nav class="sb-topnav navbar navbar-expand fixed-top">
            <div class="container px-4 px-lg-5">
                <h4 class="fw-bolder" style="margin-bottom:0">Star Steak Menu</h4>
            </div>
        </nav>
        
        <!-- Section-->
        @yield('content')
        
        <!-- Footer-->
        <footer class="py-5 bg-dark" style="background-color: #FF0009 !important;">
            <div class="container"><p class="m-0 text-center">Copyright &copy; Star Steak 2024</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="{{ asset('frontend-vendor/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
