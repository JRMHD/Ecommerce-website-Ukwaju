<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Your Shopping Cart | Ukwaju Market | African & Kenyan Products</title>
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
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- wishlist start -->
    <section id="wishlist" class="wishlist-main-block cart-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered cart-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Subtotal</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="wishlist-product-block">
                                            <div class="wishlist-product-img">
                                                <a href="#" title=""><img
                                                        src="assets/images/home_page_4/cart/01.png" class="img-fluid"
                                                        alt=""></a>
                                            </div>
                                            <div class="wishlist-product-dtl">
                                                <a href="#" title="">
                                                    <h4 class="wishlist-product-title">Internal Operations Administrator
                                                    </h4>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="rate"><a href="#" title="">$33.00</a></td>
                                    <td>
                                        <div class="qty-input">
                                            <button class="qty-count qty-count--minus" data-action="minus"
                                                type="button">-</button>
                                            <input class="product-qty" type="number" name="product-qty" min="0"
                                                max="10" value="1">
                                            <button class="qty-count qty-count--add" data-action="add"
                                                type="button">+</button>
                                        </div>
                                    </td>
                                    <td class="rate"><a href="#" title="">$33.00</a></td>
                                    <td>
                                        <div class="wishlist-delete-icon">
                                            <i class="flaticon-close"></i>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- wishlist end -->
    <!-- cart start-->
    <section id="cart" class="cart-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="cart-shipping-block">
                        <form>
                            <div class="form-group coupon-form">
                                <input type="text" class="form-control" id="text" placeholder="Coupon code">
                                <button type="button" class="btn btn-primary">Apply</button>
                            </div>
                        </form>
                        <div class="calculate-shipping-block">
                            <h4 class="shipping-heading">Calculate Shipping</h4>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="country"
                                        placeholder="United States (US)">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="state"
                                        placeholder="California">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="city" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="'pin"
                                        placeholder="Postcode / ZIP">
                                </div>
                                <button type="button" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cart-total-amt-block">
                        <h4 class="total-heading">Cart Total</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="">Subtotal</td>
                                        <td class="price text-end">$33.00</td>
                                    </tr>
                                    <tr>
                                        <td class="">Shipping</td>
                                        <td class="float-end">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="flexRadioDefault1" id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Flat rate: <strong>$5.00</strong>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio"
                                                    name="flexRadioDefault1" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Free shipping
                                                </label>
                                            </div>
                                            Shipping to <strong>CA.</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="total-head">Total</td>
                                        <td class="price text-end">$38.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="checkout.html" title="" class="btn btn-primary">Proceed to checkout</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="cart-button">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="continue-btn">
                                    <a href="shop-filter.html" title="" class="btn btn-primary">Continue
                                        Shopping <i class="flaticon-right-arrows"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="update-btn">
                                    <button class="btn btn-primary" type="button"><i class="flaticon-reload"></i>
                                        Update Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cart end -->
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
    <!-- quantity count start -->
    <script>
        var QtyInput = (function() {
            var $qtyInputs = $(".qty-input");

            if (!$qtyInputs.length) {
                return;
            }

            var $inputs = $qtyInputs.find(".product-qty");
            var $countBtn = $qtyInputs.find(".qty-count");
            var qtyMin = parseInt($inputs.attr("min"));
            var qtyMax = parseInt($inputs.attr("max"));

            $inputs.change(function() {
                var $this = $(this);
                var $minusBtn = $this.siblings(".qty-count--minus");
                var $addBtn = $this.siblings(".qty-count--add");
                var qty = parseInt($this.val());

                if (isNaN(qty) || qty <= qtyMin) {
                    $this.val(qtyMin);
                    $minusBtn.attr("disabled", true);
                } else {
                    $minusBtn.attr("disabled", false);

                    if (qty >= qtyMax) {
                        $this.val(qtyMax);
                        $addBtn.attr('disabled', true);
                    } else {
                        $this.val(qty);
                        $addBtn.attr('disabled', false);
                    }
                }
            });

            $countBtn.click(function() {
                var operator = this.dataset.action;
                var $this = $(this);
                var $input = $this.siblings(".product-qty");
                var qty = parseInt($input.val());

                if (operator == "add") {
                    qty += 1;
                    if (qty >= qtyMin + 1) {
                        $this.siblings(".qty-count--minus").attr("disabled", false);
                    }

                    if (qty >= qtyMax) {
                        $this.attr("disabled", true);
                    }
                } else {
                    qty = qty <= qtyMin ? qtyMin : (qty -= 1);

                    if (qty == qtyMin) {
                        $this.attr("disabled", true);
                    }

                    if (qty < qtyMax) {
                        $this.siblings(".qty-count--add").attr("disabled", false);
                    }
                }

                $input.val(qty);
            });
        })();
    </script>

</body>

</html>
