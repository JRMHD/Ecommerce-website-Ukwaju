<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Page Not Found | Return to Ukwaju Market | Kenyan Products USA</title>
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
    <!-- smallscreen navigation end -->
    <!-- breadcrumb start -->
    <div class="breadcrumb-main-block">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">404</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- error start -->
    <section id="error" class="error-main-block">
        <div class="container">
            <div class="row">
                <div class="error-block">
                    <div class="error-img text-center">
                        <img src="assets/images/home_page_4/error/01.png" class="img-fluid" alt="">
                        <div class="error-dtls">
                            <h1 class="error-title">Oops... Page Not Found!</h1>
                            <p>Sorry! This Page Is Not Available!</p>
                            <div id="countdown" class="countdown-timer">10</div>
                        </div>
                        <a href="/" title="" class="btn btn-primary">Go Back To Home Page <i
                                class="flaticon-right-arrows"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let countdown = 10;
        const countdownElement = document.getElementById("countdown");

        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown;
            countdownElement.style.fontSize = "2rem";
            countdownElement.style.fontWeight = "bold";
            countdownElement.style.color = "#ff5733";

            if (countdown <= 0) {
                clearInterval(interval);
                window.location.href = "/";
            }
        }, 1000);
    </script>

    <!-- error end -->
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
