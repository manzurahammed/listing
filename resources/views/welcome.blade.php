<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Home</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500%7CSignika:400,600,700" rel="stylesheet">


    <link href="{{ asset('css/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/frontend/css/plyr.css') }}" rel="stylesheet">
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
                    @if ($city->isNotEmpty())
                        @foreach ($city as $key => $item)
                            @php ($image = '/upload/default.gif')
                            @if($item->image !='')
                                @php ($image = 'upload/city_image/'.$item->image)
                            @endif

                            <?php
                                $width = ($key==3 || $key==4)?"width-1" :'width-2';
                                $arr = [
                                    'item-one',
                                    'item-two',
                                    'item-three',
                                    'item-four',
                                    'item-five',
                                ];
                            $height = ( $key == 0 || $key == 2)?'': 'height-1';

                            ?>
                            <a href="{{"/search"}}" class="city-item {{$arr[$key]}} {{$width}} {{$height}}">
                                {{Html::image($image,'profile picture',array('class' => 'img-fluid'))}}
                                <div class="text">
                                    <h3>{{$item->name}}</h3>
                                    <span>{{$item->total}} Listings</span>
                                </div>
                            </a>
                        @endforeach
                    @endif
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
                            <img src="{{ asset('images/frontend/footer-logo.png') }}" class="img-fluid" alt="">
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

</footer>
<!-- Footer End -->


<!-- Modal -->

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


<script src="{{ asset('css/frontend/custom.js') }}"></script>



</body>
</html>