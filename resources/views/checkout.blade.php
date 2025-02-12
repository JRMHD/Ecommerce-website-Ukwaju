<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Secure Checkout | Ukwaju Market | Kenyan Groceries USA</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->
    <section
        style="background-color: #f8f9fa; padding: 20px 0; min-height: 100vh; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
        <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 15px;">
            <h2 style="color: #2d3748; font-size: 1.75rem; margin-bottom: 25px; font-weight: 600; text-align: center;">
                Checkout</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Success/Error Alert Placeholder -->
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 3000
                    });
                </script>
            @endif

            @if (session('error'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops!',
                        text: '{{ session('error') }}',
                        showConfirmButton: false,
                        timer: 3000
                    });
                </script>
            @endif

            <div style="background-color: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                @php $total = 0; @endphp
                @foreach ($cart as $id => $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp
                    <!-- Mobile-friendly card layout for each product -->
                    <div style="padding: 16px; border-bottom: 1px solid #e2e8f0;">
                        <div style="display: flex; gap: 12px; margin-bottom: 12px;">
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                            <div style="flex-grow: 1;">
                                <div style="font-weight: 600; color: #2d3748; margin-bottom: 4px;">{{ $item['name'] }}
                                </div>
                                <div style="display: flex; flex-wrap: wrap; gap: 12px; color: #64748b;">
                                    <div>
                                        <span style="font-size: 0.875rem;">Price:</span>
                                        <span style="color: #2d3748;">${{ number_format($item['price'], 2) }}</span>
                                    </div>
                                    <div>
                                        <span style="font-size: 0.875rem;">Qty:</span>
                                        <span
                                            style="background-color: #f1f5f9; padding: 2px 8px; border-radius: 4px; color: #2d3748;">
                                            {{ $item['quantity'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <div style="font-size: 0.875rem; color: #64748b;">Subtotal</div>
                                <div style="font-weight: 600; color: #2d3748;">${{ number_format($subtotal, 2) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Total section -->
                <div
                    style="padding: 20px; background-color: #f8fafc; border-top: 2px solid #e2e8f0; border-radius: 0 0 12px 12px;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div style="font-weight: 600; color: #2d3748; font-size: 1.125rem;">Total Amount:</div>
                        <div style="font-weight: 700; color: #2d3748; font-size: 1.25rem;">
                            ${{ number_format($total, 2) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            style="background-color: #f8f9fa; padding: 20px 0; font-family: 'Inter', system-ui, -apple-system, sans-serif;">
            <div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 15px;">
                <!-- Shipping Address Form -->
                <div
                    style="background-color: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 24px; margin-bottom: 24px;">
                    <h3 style="color: #2d3748; font-size: 1.5rem; margin-bottom: 24px; font-weight: 600;">
                        Billing/Shipping
                        Address</h3>

                    <form action="{{ route('save.address') }}" method="POST" id="addressForm">
                        @csrf
                        <div
                            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                            <!-- Name Fields -->
                            <div style="display: flex; flex-direction: column;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">First
                                    Name</label>
                                <input type="text" name="first_name" placeholder="Enter first name"
                                    value="{{ $shippingAddress->first_name ?? '' }}" required
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <div style="display: flex; flex-direction: column;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">Last
                                    Name</label>
                                <input type="text" name="last_name" placeholder="Enter last name"
                                    value="{{ $shippingAddress->last_name ?? '' }}" required
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <!-- Address Fields -->
                            <div style="display: flex; flex-direction: column; grid-column: 1 / -1;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">Address</label>
                                <input type="text" name="address" placeholder="Enter street address"
                                    value="{{ $shippingAddress->address ?? '' }}" required
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <div style="display: flex; flex-direction: column; grid-column: 1 / -1;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">Apartment,
                                    Suite (Optional)</label>
                                <input type="text" name="apartment" placeholder="Enter apartment number"
                                    value="{{ $shippingAddress->apartment ?? '' }}"
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <!-- Location Fields -->
                            <div style="display: flex; flex-direction: column;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">Country</label>
                                <input type="text" name="country" placeholder="Enter country"
                                    value="{{ $shippingAddress->country ?? '' }}" required
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <div style="display: flex; flex-direction: column;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">City</label>
                                <input type="text" name="city" placeholder="Enter city"
                                    value="{{ $shippingAddress->city ?? '' }}" required
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <div style="display: flex; flex-direction: column;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">State</label>
                                <input type="text" name="state" placeholder="Enter state"
                                    value="{{ $shippingAddress->state ?? '' }}" required
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <div style="display: flex; flex-direction: column;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">ZIP
                                    Code</label>
                                <input type="text" name="zip_code" placeholder="Enter ZIP code"
                                    value="{{ $shippingAddress->zip_code ?? '' }}" required
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <!-- Contact Fields -->
                            <div style="display: flex; flex-direction: column;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">Phone</label>
                                <input type="text" name="phone" placeholder="Enter phone number"
                                    value="{{ $shippingAddress->phone ?? '' }}" required
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <div style="display: flex; flex-direction: column;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">Email</label>
                                <input type="email" name="email" placeholder="Enter email address"
                                    value="{{ $shippingAddress->email ?? '' }}" required
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%;">
                            </div>

                            <!-- Additional Information -->
                            <div style="display: flex; flex-direction: column; grid-column: 1 / -1;">
                                <label
                                    style="font-size: 0.875rem; color: #4a5568; margin-bottom: 6px; font-weight: 500;">Additional
                                    Information</label>
                                <textarea name="additional_info" placeholder="Enter any additional information"
                                    style="padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; outline: none; transition: border-color 0.2s; width: 100%; min-height: 100px; resize: vertical;">{{ $shippingAddress->additional_info ?? '' }}</textarea>
                            </div>
                        </div>

                        <button type="submit"
                            style="background-color: #4f46e5; color: white; padding: 12px 24px; border: none; border-radius: 6px; font-weight: 500; margin-top: 24px; cursor: pointer; transition: background-color 0.2s; width: 100%;">
                            Save Address
                        </button>
                    </form>
                </div>

                <!-- Payment Method Selection -->
                <div
                    style="background-color: white; border-radius: 12px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 24px; margin-bottom: 24px;">
                    <h3 style="color: #2d3748; font-size: 1.5rem; margin-bottom: 24px; font-weight: 600;">Select
                        Payment
                        Method</h3>
                    <select id="paymentMethod"
                        style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; color: #4a5568; background-color: white; cursor: pointer; margin-bottom: 24px;">
                        <option value="Paypal">Paypal</option>
                        <option value="Venmo">Venmo</option>
                        <option value="Cashapp">Cashapp</option>
                    </select>

                    <!-- Checkout Form -->
                    <form id="checkoutForm" action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <input type="hidden" name="payment_method" id="selectedPaymentMethod">
                        <button type="submit" id="completeOrder"
                            style="background-color: #059669; color: white; padding: 14px 28px; border: none; border-radius: 6px; font-weight: 500; width: 100%; cursor: pointer; transition: background-color 0.2s;">
                            Complete Order
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.getElementById('completeOrder').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Confirm Order',
                text: "Are you sure you want to place this order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Place Order'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Set selected payment method
                    document.getElementById('selectedPaymentMethod').value = document.getElementById(
                        'paymentMethod').value;

                    // Submit the form
                    document.getElementById('checkoutForm').submit();
                }
            });
        });

        document.getElementById('addressForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            Swal.fire({
                title: 'Saving Address...',
                text: 'Please wait while we save your address.',
                icon: 'info',
                showConfirmButton: false,
                allowOutsideClick: false
            });

            this.submit(); // Submit form after showing alert
        });
    </script>

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
