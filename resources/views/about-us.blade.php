<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Offex - eCommerce Multipurpose HTML Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Media City">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" type="image/png" href="assets/images/favicon.png"> <!-- favicon -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"> <!-- bootstrap css -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;display=swap"
        rel="stylesheet"> <!-- google fonts -->
    <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon/flaticon_ecommerce.css"> <!-- flaticons css -->
    <link rel="stylesheet" type="text/css" href="vendor/slick/css/slick.css"><!-- slick css -->
    <link rel="stylesheet" type="text/css" href="vendor/slick/css/slick-theme.css"><!-- slick theme css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"> <!-- style css -->
</head>

<body>
    @include('header')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main-block">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- about start -->
    <section id="about-us" class="about-us-main-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-img">
                        <img src="assets/images/home_page_4/about/01.png" class="img-fluid" alt="Ukwaju Market">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-block">
                        <h6 class="about-sub-heading hr-lines">Ukwaju Market</h6>
                        <h1 class="about-main-heading">Bringing Kenya Closer to You</h1>
                        <p>They say, east or west, home is best. At Ukwaju Market, we are dedicated to creating a home
                            away from home for Kenyans in the USA. We understand the longing for familiar tastes,
                            scents, and cultural items that make home special.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="about-title">Your Favorite Kenyan Products</h3>
                                <p class="mb-0">From foodstuffs to handcrafted items, we bring you the essentials you
                                    miss the most, right to your doorstep.</p>
                            </div>
                            <div class="col-lg-6">
                                <h3 class="about-title">A Touch of Home</h3>
                                <p class="mb-0">What reminds you of home? We curate and deliver those special products
                                    that bring a piece of Kenya into your daily life.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about end -->
    <!-- justice start -->
    <section id="why-choose-us" class="why-choose-us-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-block">
                        <h6 class="about-sub-heading hr-lines">Why Choose Ukwaju</h6>
                        <h1 class="about-main-heading">A Taste of Home, Wherever You Are</h1>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>01</span>Authentic Kenyan Products
                                    </button>
                                </h3>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        We bring you the most authentic Kenyan products, from foodstuffs to cultural
                                        artifacts, ensuring you always feel connected to home.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>02</span>Convenient & Reliable Delivery
                                    </button>
                                </h3>
                                <div id="collapseTwo" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        We make sure your favorite Kenyan products reach you on time, no matter where
                                        you are in the USA.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <span>03</span>Supporting Kenyan Businesses
                                    </button>
                                </h3>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        By shopping with us, you not only get a taste of home but also support local
                                        Kenyan businesses and artisans.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-img">
                        <img src="assets/images/home_page_4/about/02.png" class="img-fluid" alt="Why Choose Ukwaju">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- justice end -->
    <!-- dreams start -->
    <section id="dreams-section" class="dreams-main-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-img">
                        <img src="assets/images/home_page_4/about/03.png" class="img-fluid" alt="Ukwaju Dreams">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-us-block">
                        <h6 class="about-sub-heading hr-lines">Ukwaju Market</h6>
                        <h1 class="about-main-heading">Keeping Traditions Alive, One Product at a Time</h1>
                        <p>At Ukwaju Market, we believe in making your dreams of staying connected to home a reality.
                            Whether it’s the food, the culture, or the little things that remind you of Kenya, we bring
                            them closer to you in the USA.</p>
                        <ul class="about-list-block">
                            <li><i class="flaticon-check-mark"></i>Authentic Kenyan products, handpicked for you</li>
                            <li><i class="flaticon-check-mark"></i>Fast and reliable shipping across the USA</li>
                            <li><i class="flaticon-check-mark"></i>Supporting Kenyan artisans and businesses</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- dreams end -->
    <!-- footer start -->
    @include('footer')
    <!-- footer end -->

    <!-- jquery -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery.min.js"></script> <!-- jquery library js -->
    <script src="assets/js/popper.min.js"></script> <!-- popper js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script> <!-- bootstrap bundle js -->
    <script src="vendor/slick/js/slick.js"></script> <!-- slick js -->
    <script src="vendor/range_slider/js/jquery-ui.min.js"></script> <!-- rang slider js -->
    <script src="assets/js/theme_one.js"></script> <!-- theme js -->
    <!-- end jquery -->
</body>

</html>
