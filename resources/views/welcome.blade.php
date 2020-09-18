<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home</title>


    <!-- Custom Css -->
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500%7CSignika:400,600,700" rel="stylesheet">


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


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500%7CSignika:400,600,700" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">

</head>
<body>

<header class="header-bg-1">
    <div class="cp-nav nav-2 nav-absolute nav-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav class="navbar navbar-expand-xl">
                        <a class="navbar-brand" href="{{ '/' }}">
                            <img src="{{ asset('images/frontend/logo-white.png') }}" class="img-fluid" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="ti-menu"></span>
                        </button>

                        <div class="nav-extra">
                            <div class="user">
                                <a href="#"><span class="ti-user"></span></a>
                            </div>
                            <div class="nav-listing">
                                <a href="post-listing.html"><span class="ti-plus"></span><span class="text">Add Listing</span></a>
                            </div>
                        </div>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto mr-auto">
                                <li class="menu-item">
                                    <a title="" href="{{ '/' }}" >Home</a>
                                </li>
                                <li class="menu-item">
                                    <a title="" href="{{ '/search' }}" aria-haspopup="true" aria-expanded="false">Listing</a>
                                </li>
                                <li class="menu-item dropdown">
                                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">User Panel</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item"><a href="dashboard.html">Dashboard</a></li>
                                        <li class="menu-item"><a href="edit-profile.html">Edit Profile</a></li>
                                        <li class="menu-item"><a href="all-listing.html">My Listing</a></li>
                                        <li class="menu-item"><a href="dashboard-add-listing.html">Add Listing</a></li>
                                        <li class="menu-item"><a href="bookmarked.html">Bookmarked</a></li>
                                        <li class="menu-item"><a href="message.html">Message</a></li>
                                        <li class="menu-item"><a href="dashboard-pricing.html">Pricing</a></li>
                                        <li class="menu-item"><a href="review.html">Review</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item dropdown">
                                    <a title="" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">Pages</a>
                                    <ul class="dropdown-menu">
                                        <li class="menu-item"><a href="about.html">About Us</a></li>
                                        <li class="menu-item"><a href="contact.html">Contact</a></li>
                                        <li class="menu-item"><a href="blog-list.html">Blog</a></li>
                                        <li class="menu-item"><a href="blog-grid.html">Blog Grid</a></li>
                                        <li class="menu-item"><a href="blog-details.html">Blog Details</a></li>
                                        <li class="menu-item"><a href="pricing.html">Pricing</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="header-banner text-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1><span>Explore</span> Your City</h1>
                    <p>Easy way to find great place to stay, eat, shop or visite</p>

                </div>
            </div>
        </div>
    </div>
    <div class="header-category-slider">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-category-slider-wrap owl-carousel">
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $key=> $item)
                                @php ($image = '/upload/default.gif')
                                @if($item->image !='')
                                    @php ($image = 'upload/cat_image/'.$item->image)
                                @endif
                                <a href="{{'/search'}}" class="category-item">
                                    {{Html::image($image,'profile picture',array('class' => 'img-fluid'))}}
                                    <span>{{$item->name}}</span>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Popular City -->
<div class="section-padding padding-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-header">
                    <h2>Happening Cities</h2>
                    <p>Exploring culture, eating and drinking and religion in popular location</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="citys">
                    <div class="grid-sizer col-md-6 col-12 col-lg-3"></div>
                    <a href="#" class="city-item item-one width-2">
                        <img src="images/city/1.jpg" class="img-fluid" alt="">
                        <div class="text">
                            <h3>Los Angeles</h3>
                            <span>13 Listings</span>
                        </div>
                    </a>
                    <a href="#" class="city-item item-two width-2 height-1">
                        <img src="images/city/2.jpg" class="img-fluid" alt="">
                        <div class="text">
                            <h3>Chicago</h3>
                            <span>9 Listings</span>
                        </div>
                    </a>
                    <a href="#" class="city-item item-three width-2">
                        <img src="images/city/3.jpg" class="img-fluid" alt="">
                        <div class="text">
                            <h3>San Francisco</h3>
                            <span>8 Listings</span>
                        </div>
                    </a>
                    <a href="#" class="city-item item-four width-1 height-1">
                        <img src="images/city/5.jpg" class="img-fluid" alt="">
                        <div class="text">
                            <h3>California</h3>
                            <span>15 Listings</span>
                        </div>
                    </a>
                    <a href="#" class="city-item item-five width-1 height-1">
                        <img src="images/city/4.jpg" class="img-fluid" alt="">
                        <div class="text">
                            <h3>New York</h3>
                            <span>24 Listings</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Popular City End -->

<!-- Listing -->
<div class="section-padding padding-bottom-90 grey-bg section-border-top section-border-bottom listing-slider-wrap">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-header">
                    <h2>Popular listings</h2>
                    <p>Some popular & exclusive listings in our directory</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row listing-slider">

                    @if ($listing->isNotEmpty())
                        @foreach ($listing as $key=> $item)
                            @php ($image = '/upload/default.gif')
                            @if($item->feature_image !='')
                                @php ($image = 'feature_image/'.$item->feature_image)
                            @endif

                            <div class="col-lg-4">
                                <div class="lrn-listing-wrap">
                                    <div class="listing-thumb">
                                        {{Html::image($image,'profile picture',array('class' => 'img-fluid'))}}
                                    </div>
                                    <div class="listing-body">
                                        <div class="meta">
                                            <a href="{{'/search'}}" class="avater">
                                                <img src="{{ asset('images/frontend/avater-1.jpg') }}" class="img-fluid" alt="">
                                            </a>
                                            <a href="#" class="favourite"><span class="ti-heart"></span></a>
                                            <a href="#" class="preview" data-toggle="modal" data-target="#listingModal"><span class="ti-eye"></span></a>
                                        </div>
                                        <h3 class="varified"><a href="#">{{$item->title}}</a></h3>
                                        <div class="reviews">
                                            <div class="rating">3.9</div>
                                            <span>13 Reviews</span>
                                        </div>
                                        <div class="listing-location">
                                            <div class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <span>{{$item->website}}</span>
                                        </div>
                                        <div class="listing-category">
                                            <div class="icon"><i class="fas fa-coffee"></i></div>
                                            <span><a href="#">{{$item->catname->name}}</a></span>
                                        </div>
                                        <div class="listing-bottom">
                                            <span><i class="fas fa-phone"></i>{{$item->phone}}</span>
                                            <span class="status open"><i class="far fa-clock"></i>Open Now</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Listing End -->

<!-- Call to Action -->
<div class="section-padding-100 call-to-action-bg">
    <div class="container">
        <div class="call-to-action-wrap">
            <div class="call-to-action-content">
                <h3>Join our Community!</h3>
                <p>Marketing with us and be happy with your business</p>
            </div>
            <div class="call-to-action-button">
                <a href="#"><span class="ti-plus"></span>Add Listing</a>
            </div>
            <div class="call-to-action-shape">
                <img src="{{ asset('images/frontend/cta-shape.png') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->

<!-- Footer -->
<footer class="padding-top-100 footer-bg">
    <div class="footer-widget-wrap padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget footer-about">
                        <div class="logo">
                            <img src="images/footer-logo.png" class="img-fluid" alt="">
                        </div>
                        <p class="copyright-text">© 2019 <a href="#">Listereon</a>. By <a href="#">CodePassergers</a> All Rights Reserved</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget footer-widget-links">
                        <h5 class="footer-widget-title">Quick Links</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Pricing Table</a></li>
                            <li><a href="#">Recent Events</a></li>
                            <li><a href="#">Latest News & Tops</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget footer-widget-links">
                        <h5 class="footer-widget-title">My Account</h5>
                        <ul>
                            <li><a href="#">Dashboad</a></li>
                            <li><a href="#">Listings</a></li>
                            <li><a href="#">Favorites Listings</a></li>
                            <li><a href="#">My Cart</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget footer-widget-contact">
                        <h5 class="footer-widget-title">Contact Us</h5>
                        <p class="office-address">9000 Regency Parkway, Suite 400 Cary, NC 27518</p>
                        <p><span>E:</span> supportsaasapp@gmail.com <br> <span>P:</span> +000 1456 6978 111</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 order-lg-2">
                    <div class="apps-download">
                        <a href="#" class="app-download apple">
                            <img src="images/app/apple.png" class="img-fluid" alt="">
                        </a>
                        <a href="#" class="app-download android">
                            <img src="images/app/android.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 order-lg-1">
                    <ul class="footer-nav">
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-5 order-lg-3">
                    <div class="backtotop">
                        <a href="#">Back to Top<i class="fas fa-angle-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->


<!-- Modal -->
<div class="modal fade listing-modal" id="listingModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="listing-side">
                    <div class="lrn-listing-wrap">
                        <div class="listing-thumb">
                            <img src="images/listing/3.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="listing-body">
                            <div class="meta">
                                <a href="#" class="avater">
                                    <img src="images/listing/avater-3.jpg" class="img-fluid" alt="">
                                </a>
                                <a href="#" class="favourite"><span class="ti-heart"></span></a>
                            </div>
                            <h3><a href="#">Sam’s Property</a></h3>
                            <div class="reviews">
                                <div class="rating">3.9</div>
                                <span>8 Reviews</span>
                            </div>
                            <div class="listing-location">
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <span>1178 Winifred Way, Indianapolis, IN 46254</span>
                            </div>
                            <div class="listing-category">
                                <div class="icon"><i class="fab fa-pagelines"></i></div>
                                <span><a href="#">Real Estate</a></span>
                            </div>
                            <div class="listing-bottom">
                                <span><i class="fas fa-phone"></i>+50 125 145601</span>
                                <span class="status open"><i class="far fa-clock"></i>Open Now</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="listing-location-side">
                    <div class="cp-map listing-modal-map" id="location" data-lat="40.713355" data-lng="-74.005535" data-zoom="10"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('css/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/bootstrap.min.js') }}"></script>


<script src="{{ asset('css/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/plyr.js') }}"></script>
<script src="{{ asset('css/frontend/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('css/frontend/js/visible.js') }}"></script>
<script src="{{ asset('css/frontend/js/datepicker.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/select2.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/datepicker.en.js') }}"></script>
<script src="{{ asset('css/frontend/js/tinymce.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/jquery.nstSlider.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/wickedpicker.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('css/frontend/js/chart.js') }}"></script>

<script src="{{ asset('css/frontend/custom.js') }}"></script>



</body>
</html>