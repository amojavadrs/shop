<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    {{-- Slider --}}
    <link rel="stylesheet" href="{{ asset('package slider/swiper-bundle.min.css') }}" />
    <script src="{{ asset('package slider/swiper-bundle.min.js') }}"></script>
    {{-- Fullpage --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('fullPage.js-master/dist/fullpage.css') }}">
    <script src="{{ asset('fullPage.js-master/dist/fullpage.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fullPage.js-master/dist/fullpage.min.js') }}"></script>
    {{-- WOW.js --}}
    <script src="{{ asset('WOW-master/dist/wow.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('WOW-master/css/libs/animate.css') }}">
    {{-- Bootstrap and Custom Styles --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('style/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('A-Iranian-Sans/Iranian Sans.ttf') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/brands.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style/style.css') }}">

    <script src="{{ asset('style/jquery.min.js') }}"></script>
    <script src="{{ asset('style/bootstrap.bundle.min.js') }}"></script>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand text-success logo h1 align-self-center" href="{{ route('firstpage') }}">
            myShop
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    @foreach($menus as $menuu)
                        @if($menuu->status == 0) @continue @endif
                        <li class="nav-item">
                            <a href="" class="nav-link text-dark hovered">{{ $menuu->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-0">
                    <input type="search" class="form-control" placeholder="Search...">
                </div>

                <!-- Cart Button -->
                <a class="btn btn-outline-success" href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge bg-danger">{{ count(session('cart', [])) }}</span>
                </a>

                <!-- Login Button -->
                <a class="btn btn-light ms-2" href="{{ route('login') }}">
                    <i class="fas fa-user"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="col-md-8 col-lg-6 mx-auto order-lg-last">
                        <img class="img-fluid rounded shadow" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&q=60&w=600" alt="Proident occaecat" style="height: 400px; object-fit: cover;">
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="display-4">Proident occaecat</h1>
                            <h3 class="h2 text-primary">First</h3>
                            <p class="lead">You are going to shop from me!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="col-md-8 col-lg-6 mx-auto order-lg-last">
                        <img class="img-fluid rounded shadow" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&q=60&w=600" alt="Proident occaecat" style="height: 400px; object-fit: cover;">
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="display-4">Proident occaecat</h1>
                            <h3 class="h2 text-primary">Middle</h3>
                            <p class="lead">You are going to shop from me!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="col-md-8 col-lg-6 mx-auto order-lg-last">
                        <img class="img-fluid rounded shadow" src="https://images.unsplash.com/photo-1521747116042-5a810fda9664?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&q=60&w=600" alt="Proident occaecat" style="height: 400px; object-fit: cover;">
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="display-4">Proident occaecat</h1>
                            <h3 class="h2 text-primary">Last</h3>
                            <p class="lead">You are going to shop from me!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left fa-2x text-dark"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right fa-2x text-dark"></i>
    </a>
</div>
<!-- End Banner Hero -->

<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categories of The Month</h1>
            <p>
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                deserunt mollit anim id est laborum.
            </p>
        </div>
    </div>
    <div class="row">
        @foreach($cat as $c)
            <div class="col-12 col-md-4 p-5 mt-3">
                <h5 class="text-center mt-3 mb-3">{{ $c->title }}</h5>
                <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
            </div>
        @endforeach
    </div>
</section>
<!-- End Categories of The Month -->

<!-- Featured Product -->
<section class="bg-light">
    @foreach($cat as $cats)
        @if($cats->status == 0) @continue @endif
        <div class="fs-5 my-3 p-3 border border-bottom-0 border-top-0 border-end-0 border-start-0 border-warning border-3" style="max-width: fit-content;">{{ $cats->title }}</div>

        <div class="swiper mySwiperr rounded-5">
            <div class="swiper-wrapper">
                @foreach($products as $prd)
                    @if($prd->category_id == $cats->id && $prd->status == 1)
                        <div class="swiper-slide">
                            <div class="card mx-2" style="border: none; min-height: 50vh;">
                                <!-- Product Image and Text Link to Product Details -->
                                <a href="{{ route('product.details', ['id' => $prd->id]) }}">
                                    <div class="bg-light rounded-top-5">
                                        <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                            <img src="{{ route('product.show', ['id' => $prd->id]) }}" class="img-fluid rounded" alt="{{ $prd->title }}" style="max-height: 100%; width: auto; object-fit: contain;">
                                        </div>
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $prd->title }}</h5>
                                        <p class="card-text">{{ $prd->description }}</p>
                                        <p class="card-text text-success">
                                                <?php
                                                $txt2 = null;
                                                $txt = intval(($prd->price) - ($prd->price) * ($prd->discount / 100));
                                                $txt = $txt . '';
                                                $txt2 = number_format($txt);
                                                echo $txt2 . ' تومان';
                                                ?>
                                        </p>
                                    </div>
                                </a>

                                <!-- Add to Cart Button -->
                                <form action="{{ route('cart.add') }}" method="POST" class="text-center mt-3">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $prd->id }}">
                                    <input type="number" name="quantity" value="1" min="1" class="form-control d-inline-block w-auto mb-2">
                                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next" style="color: black;"></div>
            <div class="swiper-button-prev" style="color: black;"></div>
        </div>
    @endforeach
</section>

<!-- Start Footer -->
<footer class="bg-dark text-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase mb-3">About Us</h5>
                <p class="text-muted">
                    We are a team of passionate individuals dedicated to providing the best online shopping experience. Our mission is to offer quality products at competitive prices.
                </p>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase mb-3">Contact Us</h5>
                <p class="text-muted">Email: <a href="mailto:support@myshop.com" class="text-light">support@myShop.com</a></p>
                <p class="text-muted">Phone: <a href="tel:+1234567890" class="text-light">+1 234 567 890</a></p>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="text-uppercase text-center mb-3">Follow Us</h5>
                <div class="d-flex justify-content-center">
                    <a href="https://twitter.com" class="text-light me-3" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-twitter fa-2x"></i>twitter
                    </a>
                    <a href="https://facebook.com" class="text-light me-3" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-facebook-f fa-2x"></i>facebook
                    </a>
                    <a href="https://instagram.com" class="text-light" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram fa-2x"></i>instagram
                    </a>
                </div>
            </div>
        </div>
        <hr class="bg-light my-4">
        <div class="text-center">
            <p class="mb-0">&copy; 2023 myShop. All rights reserved.</p>
            <p class="mb-0">
                <a href="#" class="text-light">Privacy Policy</a> |
                <a href="#" class="text-light">Terms of Service</a>
            </p>
        </div>
    </div>
</footer>
<!-- End Footer -->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swipers = document.querySelectorAll('.mySwiperr');
        swipers.forEach(swiperElement => {
            new Swiper(swiperElement, {
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: 3, // Adjust based on your design
                spaceBetween: 10, // Space between slides
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
            });
        });
    });
</script>
</body>
</html>
