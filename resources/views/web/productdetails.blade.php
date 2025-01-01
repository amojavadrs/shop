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
                            <a href="#" class="nav-link text-dark hovered">{{ $menuu->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-0">
                    <input type="search" class="form-control" placeholder="Search...">
                </div>


                {{--                href="{{ route('cart.index') --}}
                <a class="btn btn-outline-success" }}">
                <i class="fas fa-shopping-cart"></i>
                </a>
                <!-- Login Button -->
                <a class="btn btn-light ms-2" >
                    <i class="fas fa-user"></i> Login
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->




<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>



<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="assets/img/product_single_10.jpg" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_01.jpg" alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_02.jpg" alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_03.jpg" alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_04.jpg" alt="Product Image 4">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_05.jpg" alt="Product Image 5">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_06.jpg" alt="Product Image 6">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->

                            <!--Third slide-->
                            <div class="carousel-item">//////////////////////////////////////////////////////////////////////
                                <div class="row">
                                    @foreach($product_this as $prd)
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{route('product.show',['id'=>$prd->id])}}" alt="Product Image 7">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!--/.Third slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            @foreach($product_this as $prd)
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{$prd->title}}</h1>
                            <p class="h3 py-2">{{$prd->price}}</p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>Easy Wear</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse. Donec condimentum elementum convallis. Nunc sed orci a diam ultrices aliquet interdum quis nulla.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Avaliable Color :</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>White / Black</strong></p>
                                </li>
                            </ul>

                            <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                <li>Lorem ipsum dolor sit</li>
                                <li>Amet, consectetur</li>
                                <li>Adipiscing elit,set</li>
                                <li>Duis aute irure</li>
                                <li>Ut enim ad minim</li>
                                <li>Dolore magna aliqua</li>
                                <li>Excepteur sint</li>
                            </ul>

                            <form action="" method="GET">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">Size :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">S</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">M</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">L</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><a class="btn btn-success" id="btn-minus" href="{{route('cart.destroy',['productId'=>$prd->id])}}">-</a></li>
                                            <?php $cartItems=session()->get('cart',[]) ;;?>
                                            @foreach($cartItems as $item)
                                                <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">{{$item['quantity']}}</span></li>
                                            @endforeach
                                            <li class="list-inline-item"><a class="btn btn-success" id="btn-plus" href="{{route('cart.update',['productId'=>$prd->id])}}">+</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                    </div>
                                    <form action="{{route('cart.add')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $prd->id }}">
                                        <input type="number" name="quantity" min="1" value="1">
                                        <button type="submit">Add to Cart</button>
                                    </form>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Close Content -->




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
                        <i class ="fab fa-twitter fa-2x"></i>twitter
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

<!-- Start Script -->
<script src="assets/js/jquery-1.11.0.min.js"></script>
<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/templatemo.js"></script>
<script src="assets/js/custom.js"></script>
<!-- End Script -->

<!-- Start Slider Script -->
<script src="assets/js/slick.min.js"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
        ]
    });
</script>
<!-- End Slider Script -->

</body>
</html>
