<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="utf-8">
    <title>Your Wishlist | Save Your Favorite Kenyan Products | Ukwaju Market</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- wishlist start -->
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
                <i class="fas fa-heart" style="margin-right: 0.5rem;"></i> My Wishlist
            </h2>
            <a href="{{ route('shop') }}"
                style="background-color: #4299e1; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; display: inline-flex; align-items: center; transition: background-color 0.2s;">
                <i class="fas fa-arrow-left" style="margin-right: 0.5rem;"></i> Continue Shopping
            </a>
        </div>

        @if (session('wishlist') && count(session('wishlist')) > 0)
            <!-- Move All to Cart Button -->
            <div style="margin-bottom: 1.5rem;">
                <button onclick="moveAllToCart()"
                    style="background-color: #48bb78; color: white; padding: 0.75rem 1.5rem; border-radius: 0.375rem; border: none; cursor: pointer; display: inline-flex; align-items: center; transition: background-color 0.2s;">
                    <i class="fas fa-shopping-cart" style="margin-right: 0.5rem;"></i> Move All to Cart
                </button>
            </div>

            <!-- Wishlist Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 1.5rem;">
                @foreach (session('wishlist') as $id => $item)
                    <div
                        style="background-color: white; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1); overflow: hidden;">
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}"
                            style="width: 100%; height: 200px; object-fit: cover;">

                        <div style="padding: 1.5rem;">
                            <h3 style="color: #2d3748; font-size: 1.25rem; font-weight: 600; margin: 0 0 0.5rem;">
                                {{ $item['name'] }}
                            </h3>
                            <p style="color: #4a5568; font-size: 1.25rem; font-weight: 600; margin: 0 0 1rem;">
                                ${{ number_format($item['price'], 2) }}
                            </p>

                            <div style="display: flex; gap: 0.5rem;">
                                <button onclick="moveToCart({{ $id }})"
                                    style="background-color: #4299e1; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer; flex: 1; display: inline-flex; align-items: center; justify-content: center; transition: background-color 0.2s;">
                                    <i class="fas fa-cart-plus" style="margin-right: 0.5rem;"></i> Move to Cart
                                </button>
                                <button onclick="removeFromWishlist({{ $id }})"
                                    style="background-color: #f56565; color: white; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; cursor: pointer; flex: 1; display: inline-flex; align-items: center; justify-content: center; transition: background-color 0.2s;">
                                    <i class="fas fa-trash-alt" style="margin-right: 0.5rem;"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Wishlist Summary -->
        @else
            <div
                style="background-color: white; padding: 3rem; text-align: center; border-radius: 0.5rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);">
                <i class="fas fa-heart" style="font-size: 3rem; color: #a0aec0; margin-bottom: 1rem;"></i>
                <p style="color: #4a5568; margin-bottom: 1rem;">Your wishlist is empty.</p>
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

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function removeFromWishlist(productId) {
            Swal.fire({
                title: "Are you sure?",
                text: "This item will be removed from your wishlist!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes, remove it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/wishlist/remove/${productId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire({
                                title: "Removed!",
                                text: data.message,
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });
                            setTimeout(() => location.reload(), 1600);
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        }

        function moveToCart(productId) {
            fetch(`/wishlist/move-to-cart/${productId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: "Success!",
                        text: data.message,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    setTimeout(() => location.reload(), 1600);
                })
                .catch(error => console.error('Error:', error));
        }

        function moveAllToCart() {
            Swal.fire({
                title: "Move all items to cart?",
                text: "All wishlist items will be moved to your cart.",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, move all!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('/wishlist/move-all-to-cart', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire({
                                title: "Moved!",
                                text: data.message,
                                icon: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });
                            setTimeout(() => location.reload(), 1600);
                        })
                        .catch(error => console.error('Error:', error));
                }
            });
        }
    </script>

    <!-- wishlist end -->
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
<!-- body end -->


</html>
