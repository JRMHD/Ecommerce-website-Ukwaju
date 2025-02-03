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
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- contact-info start -->
    <section id="checkout" class="checkout-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="checkout-block">
                        <h4 class="checkout-title">Contact information</h4>
                        <p>We'll use this email to send you details and updates about your order.</p>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail" placeholder="Email address">
                            <label for="floatingEmail">Email address</label>
                        </div>
                    </div>
                    <div class="checkout-block">
                        <h4 class="checkout-title">Billing address</h4>
                        <p>Enter the billing address that matches your payment method.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingFirstName"
                                        placeholder="First name">
                                    <label for="floatingFirstName">First name</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingLastName"
                                        placeholder="Last name">
                                    <label for="floatingLastName">Last name</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingAddress"
                                        placeholder="Address">
                                    <label for="floatingAddress">Address</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingAddress1"
                                        placeholder="Apartment, suite, etc. (optional)">
                                    <label for="floatingAddress1">Apartment, suite, etc. (optional)</label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingCountry"
                                        placeholder="Country/Region">
                                    <label for="floatingCountry">Country/Region</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingCity" placeholder="City">
                                    <label for="floatingCity">City</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingState"
                                        placeholder="State">
                                    <label for="floatingState">State</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingZip"
                                        placeholder="ZIP Code">
                                    <label for="floatingZip">ZIP Code</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingPhone"
                                        placeholder="Phone (optional)">
                                    <label for="floatingPhone">Phone (optional)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-block">
                        <h4 class="checkout-title">Payment options</h4>
                        <div class="checkout-form-check-block">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                    id="bankTransfer" checked>
                                <label class="form-check-label" for="bankTransfer">
                                    Direct bank transfer
                                </label>
                                <p>Make your payment directly into our bank account. Please use your Order ID as the
                                    payment reference. Your order will not be shipped until the funds have cleared in
                                    our account.</p>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                    id="checkPayments">
                                <label class="form-check-label" for="checkPayments">
                                    Check payments
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="paymentMethod"
                                    id="cashOnDelivery">
                                <label class="form-check-label" for="cashOnDelivery">
                                    Cash on delivery
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-block">
                        <div class="form-check checkout-checkbox-block">
                            <input class="form-check-input" type="checkbox" id="addNote">
                            <label class="form-check-label" for="addNote">Add a note to your order</label>
                            <p>By proceeding with your purchase you agree to our Terms and Conditions and Privacy Policy
                            </p>
                        </div>
                    </div>
                    <div class="checkout-block-button">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-6">
                                <a href="cart.html" title="reset" class="btn btn-secondary return"><i
                                        class="flaticon-left-arrow"></i>Return to Cart</a>
                            </div>
                            <div class="col-lg-8 col-md-8 col-6 text-end">
                                <button type="submit" class="btn btn-primary order">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="cart-order-summary">
                        <div class="order-block">
                            <h4 class="cart-order-title">Order summary</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-2">
                                    <div class="cart-order-img">
                                        <a href="#" title=""><img
                                                src="assets/images/contact-info/01.html" class="img-fluid"
                                                alt=""></a>
                                        <span class="badge text-bg-secondary">1</span>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-10">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-8">
                                            <h6 class="order-title"><a href="#" title="">Racking
                                                    Chair</a></h6>
                                            <div class="rate">$39.90</div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-4">
                                            <div class="price text-end">$39.90</div>
                                        </div>
                                    </div>
                                    <p>Cras mattis consectetur purus sit amet fermentum. Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit…</p>
                                </div>
                            </div>
                        </div>
                        <div class="coupon">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#couponModal">Add a coupon</button>
                            <!-- Modal -->
                            <div class="modal fade" id="couponModal" tabindex="-1"
                                aria-labelledby="couponModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Coupon</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingCoupon"
                                                        placeholder="Coupon">
                                                    <label for="floatingCoupon">Code</label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="subtotal-block">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-6">
                                    <h4 class="cart-order-title">Subtotal</h4>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="price text-end">$39.90</div>
                                </div>
                            </div>
                        </div>
                        <div class="total-block">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="total">Total</div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="amount text-end">$39.90</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info end -->
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
