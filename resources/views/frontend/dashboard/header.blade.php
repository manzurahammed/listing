<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Template</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/et-line.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/plyr.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/jquery.timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/jquery.nstSlider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/wickedpicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/select2-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/dashboard.css') }}" rel="stylesheet">


    <!-- leaflet -->
    <link rel="stylesheet" href="{{ asset('css/frontend/leaflet/css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/leaflet/css/MarkerCluster.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend/leaflet/css/MarkerCluster.Default.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500%7CSignika:400,600,700" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
</head>
<body>

<header>
    <div class="cp-nav nav-3 color-bg">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ '/' }}">
                <img src="{{ asset('images/frontend/logo-white.png') }}" class="img-fluid" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>
            <div class="nav-search">
                <a href="#" class="nav-search-toggle"><i class="fas fa-search"></i></a>
                <form action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Keyword">
                    </div>
                    <div class="form-group">
                        <select class="form-control nav-search-category">
                            <option value="">All Category</option>
                            <option value="">Luxury Hotel</option>
                            <option value="">Food & Drinks</option>
                            <option value="">Beauty & Spa</option>
                            <option value="">Health & Medical</option>
                            <option value="">Real State</option>
                        </select>
                    </div>
                    <button class="button"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="nav-extra">
                <div class="user">
                    <a href="{{url("/profile")}}"><span class="ti-user"></span></a>
                </div>
                <div class="nav-listing">
                    <a href="{{url("/listing/add")}}"><span class="ti-plus"></span><span class="text">Add Listing</span></a>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    
                </ul>
            </div>
        </nav>
    </div>
</header>