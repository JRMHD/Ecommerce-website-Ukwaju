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
    <!-- cart start -->
    <div style="padding: 20px; max-width: 1400px; margin: 0 auto;">
        @if (session('success'))
            <div
                style="background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Page Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 style="color: #2d3748; font-size: 1.875rem; font-weight: 600; margin: 0;">
                <i class="fas fa-shopping-cart" style="margin-right: 0.5rem;"></i> Shopping Cart
            </h2>
            <a href="{{ route('shop') }}"
                style="background-color: #4299e1; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; display: inline-flex; align-items: center; transition: background-color 0.2s;">
                <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i> Continue Shopping
            </a>
        </div>

        @if (session('cart') && count(session('cart')) > 0)
            <!-- Cart Table -->
            <div
                style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; min-width: 600px;">
                    <thead>
                        <tr style="background-color: #f7fafc;">
                            <th
                                style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-box" style="margin-right: 0.5rem;"></i> Product
                            </th>
                            <th
                                style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-dollar-sign" style="margin-right: 0.5rem;"></i> Price
                            </th>
                            <th
                                style="padding: 1rem; text-align: center; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-sort-amount-up" style="margin-right: 0.5rem;"></i> Quantity
                            </th>
                            <th
                                style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-calculator" style="margin-right: 0.5rem;"></i> Total
                            </th>
                            <th
                                style="padding: 1rem; text-align: left; color: #4a5568; font-weight: 600; border-bottom: 1px solid #e2e8f0;">
                                <i class="fas fa-cog" style="margin-right: 0.5rem;"></i> Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody id="cart-items">
                        @php $total = 0; @endphp
                        @foreach (session('cart') as $id => $item)
                            @php $total += $item['price'] * $item['quantity']; @endphp
                            <tr data-id="{{ $id }}" style="transition: background-color 0.2s;">
                                <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                    <div style="display: flex; align-items: center;">
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                                            style="width: 80px; height: 80px; object-fit: cover; border-radius: 0.375rem; margin-right: 1rem;">
                                        <span style="color: #2d3748; font-weight: 500;">{{ $item['name'] }}</span>
                                    </div>
                                </td>
                                <td
                                    style="padding: 1rem; border-bottom: 1px solid #e2e8f0; color: #2d3748; font-weight: 600;">
                                    ${{ number_format($item['price'], 2) }}
                                </td>
                                <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0; text-align: center;">
                                    <div style="display: inline-flex; align-items: center; gap: 0.5rem;">
                                        <button onclick="updateCart({{ $id }}, -1)"
                                            style="background-color: #e2e8f0; color: #4a5568; width: 30px; height: 30px; border-radius: 0.375rem; border: none; cursor: pointer; transition: background-color 0.2s;">
                                            -
                                        </button>
                                        <input type="number" value="{{ $item['quantity'] }}" min="1"
                                            style="width: 60px; text-align: center; padding: 0.25rem; border: 1px solid #e2e8f0; border-radius: 0.375rem;"
                                            class="cart-qty"
                                            onchange="updateCart({{ $id }}, this.value, true)">
                                        <button onclick="updateCart({{ $id }}, 1)"
                                            style="background-color: #e2e8f0; color: #4a5568; width: 30px; height: 30px; border-radius: 0.375rem; border: none; cursor: pointer; transition: background-color 0.2s;">
                                            +
                                        </button>
                                    </div>
                                </td>
                                <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0; color: #2d3748; font-weight: 600;"
                                    class="cart-total">
                                    ${{ number_format($item['price'] * $item['quantity'], 2) }}
                                </td>
                                <td style="padding: 1rem; border-bottom: 1px solid #e2e8f0;">
                                    <button onclick="removeFromCart({{ $id }})"
                                        style="background-color: #f56565; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer; font-size: 0.875rem; transition: background-color 0.2s;">
                                        <i class="fas fa-trash-alt" style="margin-right: 0.5rem;"></i> Remove
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Cart Summary -->
            <div
                style="margin-top: 2rem; display: flex; justify-content: space-between; align-items: center; background-color: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
                <div style="color: #2d3748; font-size: 1.25rem; font-weight: 600;">
                    Total: $<span id="cart-total">{{ number_format($total, 2) }}</span>
                </div>
                <a href="{{ route('checkout') }}"
                    style="background-color: #48bb78; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; display: inline-flex; align-items: center; transition: background-color 0.2s;">
                    <i class="fas fa-credit-card" style="margin-right: 0.5rem;"></i> Proceed to Checkout
                </a>
            </div>
        @else
            <div
                style="background-color: white; padding: 3rem; text-align: center; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
                <i class="fas fa-shopping-cart" style="font-size: 3rem; color: #a0aec0; margin-bottom: 1rem;"></i>
                <p style="color: #4a5568; margin-bottom: 1rem;">Your cart is empty.</p>
                <a href="{{ route('shop') }}"
                    style="background-color: #4299e1; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; text-decoration: none; display: inline-flex; align-items: center; transition: background-color 0.2s;">
                    <i class="fas fa-store" style="margin-right: 0.5rem;"></i> Continue Shopping
                </a>
            </div>
        @endif
    </div>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @endpush

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function updateCart(productId, quantity, isInput = false) {
            let row = document.querySelector(`tr[data-id='${productId}']`);
            let input = row.querySelector('.cart-qty');
            let price = parseFloat(row.children[1].textContent.replace('$', ''));
            let totalCell = row.querySelector('.cart-total');

            let newQuantity = isInput ? quantity : parseInt(input.value) + quantity;
            if (newQuantity < 1) return;

            input.value = newQuantity;

            fetch(`/cart/update/${productId}`, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        quantity: newQuantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    totalCell.textContent = `$${(price * newQuantity).toFixed(2)}`;
                    document.getElementById('cart-total').textContent = data.newTotal.toFixed(2);
                })
                .catch(error => console.error("Error:", error));
        }

        function removeFromCart(productId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This item will be removed from your cart.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f56565',
                cancelButtonColor: '#718096',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/cart/remove/${productId}`, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({})
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Removed!',
                                text: data.message,
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => location.reload());
                        })
                        .catch(error => console.error("Error:", error));
                }
            });
        }
    </script>
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


</body>

</html>
