<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    More Templates Visit ==> Free-Template.co
    -->
    <title>Social Media</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Free Template by Free-Template.co" />
    <meta name="keywords" content="free bootstrap 4, free bootstrap 4 template, free website templates, free html5, free template, free website template, html5, css3, mobile first, responsive" />
    <meta name="author" content="Free-Template.co" />

    <link rel="stylesheet" href="{{ asset('main/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body data-spy="scroll" data-target="#ftco-navbar" data-offset="200">

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Social media</a>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<section class="ftco-cover" style="background-image: url({{ asset('main/img/bg.jpg') }});" id="section-home">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center ftco-vh-100">

            @if (session('notAccepted'))
                <div class="alert alert-danger col-md-3">
                    <i class="bi bi-exclamation-triangle-fill"></i> {{ session('notAccepted') }}
                </div>
            @endif

                @if (session('registered'))
                    <div class="alert alert-success col-md-6">
                        <i class="bi bi-check-circle-fill"></i> {{ session('registered') }}
                    </div>
                @endif

            <div class="col-md-12">
                <h1 class="ftco-heading ftco-animate mb-3">Welcome To our Social media</h1>
                <h2 class="h5 ftco-subheading mb-5 ftco-animate">We wish enjoy by this app </h2>
            </div>
        </div>
    </div>
</section>
<!-- END section -->


<script src="{{ asset('main/js/jquery.min.js') }}"></script>
<script src="{{ asset('main/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('main/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('main/js/main.js') }}"></script>


</body>
</html>
