<!DOCTYPE html>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    @include('header')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main-block">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- contact start -->
    <section id="location" class="map-location-main-block">
        <div class="container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387196.07665879064!2d-74.30914977179596!3d40.69667269554806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2ske!4v1739025620127!5m2!1sen!2ske"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="contact-main-block">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="contact-block">
                            <div class="contact-icon">
                                <i class="flaticon-location"></i>
                            </div>
                            <div class="contact-dtls">
                                <h3 class="contact-title">Address</h3>
                                <p>New York, USA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="contact-block">
                            <div class="contact-icon">
                                <i class="flaticon-telephone"></i>
                            </div>
                            <div class="contact-dtls">
                                <h3 class="contact-title">Lets Talk us</h3>
                                <ul>
                                    <li>Phone number: <a href="tel:+ (212) 935 3811">+ (212) 935 3811</a></li>
                                    {{-- <li>Fax: 1234 -58963 - 007</li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="contact-block">
                            <div class="contact-icon">
                                <i class="flaticon-message"></i>
                            </div>
                            <div class="contact-dtls">
                                <h3 class="contact-title">Send us email</h3>
                                <ul>
                                    <li><a href="">info@Ukwajumarket.com</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact end -->
    <!-- faqs form start -->
    <section id="faqs-form" class="faqs-form-main-block contact-form-main-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-5">
                    <div class="faqs-form-dtls">
                        <h4 class="sub-heading">Contact Us</h4>
                        <h1 class="heading">Have Any Questions?</h1>
                        <p>We’re here to bring you closer to home. Whether it’s about our products, shipping, or special
                            requests, feel free to reach out. Ukwaju Market is always ready to assist you.</p>
                        <ul class="footer-social-icons">
                            <li><a href="#" title=""><i class="flaticon-facebook"></i></a></li>
                            <li><a href="#" title=""><i class="flaticon-twitter"></i></a></li>
                            <li><a href="#" title=""><i class="flaticon-linkedin"></i></a></li>
                            <li><a href="#" title=""><i class="flaticon-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-7">
                    <form id="contactForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name">
                                    <span class="text-danger error-name"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Your Email">
                                    <span class="text-danger error-email"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="phone"
                                        placeholder="Phone Number">
                                    <span class="text-danger error-phone"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                    <span class="text-danger error-subject"></span>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="service" placeholder="Service">
                                    <span class="text-danger error-service"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Your Message" rows="7"></textarea>
                                    <span class="text-danger error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-12 text-center">
                                <button type="submit" class="btn btn-primary faqs-buttons">Submit Now</button>
                                <div class="loader" style="display: none;">
                                    <div class="spinner"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="alert alert-success mt-3" style="display: none;">Your message has been sent
                        successfully!</div>
                </div>
                <style>
                    .spinner {
                        width: 40px;
                        height: 40px;
                        border: 4px solid #f3f3f3;
                        border-top: 4px solid #3498db;
                        border-radius: 50%;
                        animation: spin 1s linear infinite;
                        margin: 20px auto;
                    }

                    @keyframes spin {
                        0% {
                            transform: rotate(0deg);
                        }

                        100% {
                            transform: rotate(360deg);
                        }
                    }
                </style>
                <script>
                    $(document).ready(function() {
                        $('#contactForm').on('submit', function(e) {
                            e.preventDefault();
                            $('.loader').show();
                            $('.text-danger').text('');

                            $.ajax({
                                url: "{{ route('contact.store') }}",
                                method: "POST",
                                data: new FormData(this),
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    $('.loader').hide();
                                    if (response.success) {
                                        $('.alert-success').text(response.message).show();
                                        $('#contactForm')[0].reset();
                                    }
                                },
                                error: function(xhr) {
                                    $('.loader').hide();
                                    var errors = xhr.responseJSON.errors;
                                    if (errors) {
                                        $.each(errors, function(key, value) {
                                            $('.error-' + key).text(value[0]);
                                        });
                                    }
                                }
                            });
                        });
                    });
                </script>

            </div>
        </div>
    </section>
    <!-- faqs form end -->
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
