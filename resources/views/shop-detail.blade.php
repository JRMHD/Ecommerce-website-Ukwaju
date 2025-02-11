<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ $product->name }} | Authentic Kenyan Products | Ukwaju Market USA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Media City">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;display=swap"
        rel="stylesheet"> <!-- google fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/flaticon/flaticon_ecommerce.css') }}">
    <!-- flaticons css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/css/slick-theme.css') }}">
    <!-- slick theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/drift/css/drift-basic.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    @include('header') <!-- breadcrumb start -->
    <div class="breadcrumb-main-block">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/shop">shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->category }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- checkbox two start -->
    <div class="container" style="padding: 20px; max-width: 1350px; margin: 0 auto;">
        <div class="product-detail"
            style="display: flex; flex-wrap: wrap; gap: 40px; background: white; border-radius: 24px; padding: 30px; box-shadow: 0 2px 15px rgba(0,0,0,0.08);">
            <!-- Image Gallery Section -->
            <div class="gallery-section" style="flex: 1; min-width: 300px;">
                <!-- Main Image -->
                <div id="mainImageContainer"
                    style="position: relative; width: 100%; padding-top: 75%; overflow: hidden; border-radius: 16px; margin-bottom: 20px; background: #f8f9fa;">
                    <img id="mainImage" src="{{ asset('storage/' . json_decode($product->images)[0]) }}"
                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: opacity 0.3s ease;"
                        alt="{{ $product->name }}">
                </div>

                <!-- Thumbnail Navigation -->
                <div class="thumbnail-container"
                    style="display: flex; gap: 10px; overflow-x: auto; padding: 10px 0; scrollbar-width: none; -ms-overflow-style: none;">
                    <style>
                        .thumbnail-container::-webkit-scrollbar {
                            display: none;
                        }

                        .thumbnail {
                            transition: all 0.3s ease;
                        }

                        .thumbnail:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                        }

                        .thumbnail.active {
                            border: 2px solid #00b894;
                        }
                    </style>
                    @foreach (json_decode($product->images) as $index => $image)
                        <div class="thumbnail" onclick="changeMainImage('{{ asset('storage/' . $image) }}', this)"
                            style="flex: 0 0 80px; height: 80px; border-radius: 12px; overflow: hidden; cursor: pointer; border: 2px solid transparent;">
                            <img src="{{ asset('storage/' . $image) }}"
                                style="width: 100%; height: 100%; object-fit: cover;"
                                alt="{{ $product->name }} - Image {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Product Information Section -->
            <div class="product-info" style="flex: 1; min-width: 300px;">
                <div style="border-bottom: 1px solid #eee; padding-bottom: 20px; margin-bottom: 20px;">
                    <h1 style="margin: 0 0 15px 0; font-size: 28px; color: #2d3436; font-weight: 600;">
                        {{ $product->name }}
                    </h1>

                    <!-- Category Badge -->
                    <span
                        style="display: inline-block; background: #f1f2f6; color: #2d3436; padding: 6px 12px; border-radius: 20px; font-size: 14px; margin-bottom: 15px;">
                        {{ $product->category }}
                    </span>

                    <!-- Rating -->
                    <div style="margin-bottom: 20px;">
                        <div style="color: #ffd700; font-size: 20px;">
                            ★★★★★
                            <span style="font-size: 14px; color: #718093; margin-left: 8px;">
                                (4.8 / 5)
                            </span>
                        </div>
                    </div>

                    <!-- Price Section -->
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
                        <span style="font-size: 32px; font-weight: 700; color: #2d3436;">
                            ${{ number_format($product->price, 2) }}
                        </span>
                        @if ($product->slashed_price)
                            <span style="font-size: 20px; color: #e74c3c; text-decoration: line-through;">
                                ${{ number_format($product->slashed_price, 2) }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Product Details -->
                <div style="margin-bottom: 30px;">
                    <h3 style="margin: 0 0 15px 0; font-size: 18px; color: #2d3436;">Product Details</h3>
                    <p style="color: #636e72; line-height: 1.6; margin-bottom: 20px;">
                        {{ $product->description }}
                    </p>

                    <!-- Specifications -->
                    <div style="display: grid; grid-template-columns: auto 1fr; gap: 12px; font-size: 14px;">
                        <div style="color: #718093;">Weight/Quantity:</div>
                        <div style="color: #2d3436; font-weight: 500;">{{ $product->weight_quantity }}</div>

                        <div style="color: #718093;">Availability:</div>
                        <div
                            style="color: {{ $product->stock_availability > 0 ? '#00b894' : '#ff7675' }}; font-weight: 500;">
                            <span
                                style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: {{ $product->stock_availability > 0 ? '#00b894' : '#ff7675' }}; margin-right: 5px;"></span>
                            {{ $product->stock_availability > 0 ? 'In Stock' : 'Out of Stock' }}
                            @if ($product->stock_availability > 0)
                                ({{ $product->stock_availability }} units)
                            @endif
                        </div>
                    </div>
                </div>

                <button onclick="addToCart({{ $product->id }})"
                    style="width: 100%; background: linear-gradient(135deg, #00b894, #00d1a0); color: white; border: none; padding: 16px; border-radius: 16px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(0,184,148,0.2); display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 16px;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(0,184,148,0.3)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,184,148,0.2)'">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    Add to Cart
                </button>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <script>
                    let isLoggedIn = @json(auth()->check()); // Get login status from Laravel

                    function addToCart(productId) {
                        if (!isLoggedIn) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Not Logged In',
                                text: 'You need to log in to add items to your cart.',
                                confirmButtonText: 'Login',
                                showCancelButton: true,
                                cancelButtonText: 'Cancel'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('login') }}"; // Redirect to login page
                                }
                            });
                            return;
                        }

                        fetch(`/cart/add/${productId}`, {
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
                                    title: 'Success!',
                                    text: 'Item added to cart',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            })
                            .catch(error => console.error("Error:", error));
                    }
                </script>

                <!-- Secondary Actions Grid -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                    <!-- Wishlist Button -->
                    <button onclick="addToWishlist({{ $product->id }})"
                        style="background: linear-gradient(135deg, #ff6b6b, #ff8787); color: white; border: none; padding: 14px; border-radius: 16px; font-size: 15px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(255,107,107,0.2); display: flex; align-items: center; justify-content: center; gap: 8px;"
                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(255,107,107,0.3)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(255,107,107,0.2)'">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg>
                        Wishlist
                    </button>

                    <!-- SweetAlert2 -->
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    <script>
                        function addToWishlist(productId) {
                            fetch(`/wishlist/add/${productId}`, {
                                    method: 'POST',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire({
                                        title: "Added!",
                                        text: data.message,
                                        icon: "success",
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                })
                                .catch(error => {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "Something went wrong. Please try again.",
                                        icon: "error",
                                        confirmButtonText: "OK"
                                    });
                                    console.error('Error:', error);
                                });
                        }
                    </script>



                    <!-- View Cart Link -->
                    <a href="{{ url('cart') }}"
                        style="background: linear-gradient(135deg, #4834d4, #686de0); color: white; text-decoration: none; padding: 14px; border-radius: 16px; font-size: 15px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(72,52,212,0.2); display: flex; align-items: center; justify-content: center; gap: 8px;"
                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(72,52,212,0.3)'"
                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(72,52,212,0.2)'">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        View Cart
                    </a>
                </div>

                <!-- View Wishlist Link -->
                <a href="{{ url('wishlist') }}"
                    style="display: block; text-align: center; margin-top: 16px; color: #718096; text-decoration: none; font-size: 14px; font-weight: 500; transition: all 0.3s ease; padding: 8px;"
                    onmouseover="this.style.color='#4a5568'; this.style.transform='translateY(-1px)'"
                    onmouseout="this.style.color='#718096'; this.style.transform='translateY(0)'">
                    View Wishlist →
                </a>
            </div>



        </div>
    </div>
    </div>

    {{-- <section id="related-products" class="related-products-section mt-5">
        <div class="container">
            <h2 class="section-title">Products You Might Like</h2>
            <div class="row">
                @foreach ($relatedProducts as $related)
                    <div class="col-md-3">
                        <div class="product-card text-center">
                            <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->name }}"
                                class="img-fluid">
                            <h3 class="product-name">{{ $related->name }}</h3>
                            <p class="product-price">${{ number_format($related->price, 2) }}</p>
                            <a href="{{ URL('shop.show', $related->id) }}" class="btn btn-outline-primary">View
                                Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}

    <div class="container" style="padding: 20px; max-width: 1350px; margin: 0 auto;">
        <!-- Section Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2
                style="margin: 0; font-size: 28px; font-weight: 700; background: linear-gradient(45deg, #6c5ce7, #a8a4e3); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Related Products
            </h2>
        </div>

        @if (count($relatedProducts) > 0)
            <div class="row" style="display: flex; flex-wrap: wrap; margin: -10px;">
                @foreach ($relatedProducts as $related)
                    <div class="col-6 col-lg-4" style="padding: 10px; box-sizing: border-box;">
                        <a href="{{ route('shop.detail', $related->id) }}"
                            style="text-decoration: none; color: inherit; display: block;">
                            <div style="background: white; border-radius: 16px; box-shadow: 0 2px 15px rgba(0,0,0,0.08); transition: all 0.3s ease; height: 100%; overflow: hidden; position: relative; transform: translateY(0); cursor: pointer;"
                                onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.12)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 15px rgba(0,0,0,0.08)'">
                                <!-- Image Container -->
                                <div
                                    style="position: relative; width: 100%; padding-top: 75%; overflow: hidden; background: #f8f9fa; border-radius: 16px 16px 0 0;">
                                    @php
                                        $images = $related->images ? json_decode($related->images) : [];
                                    @endphp
                                    <img src="{{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('images/no-image.png') }}"
                                        alt="{{ $related->name }}"
                                        style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                </div>

                                <!-- Content Container -->
                                <div style="padding: 14px;">
                                    <!-- Product Name -->
                                    <h5
                                        style="margin: 0 0 8px 0; font-size: 16px; font-weight: 600; color: #2d3436; line-height: 1.4; height: 44px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                        {{ $related->name }}
                                    </h5>

                                    <!-- Star Rating -->
                                    <div style="margin-bottom: 8px;">
                                        <div style="color: #ffd700;">
                                            ★★★★★
                                            <span style="font-size: 12px; color: #718093; margin-left: 5px;">
                                                (4.8)
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Price Section -->
                                    <div style="margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                                        <span style="font-size: 18px; font-weight: 700; color: #2d3436;">
                                            ${{ number_format($related->price, 2) }}
                                        </span>
                                        @if ($related->slashed_price)
                                            <span
                                                style="font-size: 14px; color: #e74c3c; text-decoration: line-through;">
                                                ${{ number_format($related->slashed_price, 2) }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Stock Status -->
                                    <div
                                        style="font-size: 12px; color: #718093; display: flex; justify-content: space-between; align-items: center;">
                                        <span>
                                            <span
                                                style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: {{ $related->stock_availability > 0 ? '#00b894' : '#ff7675' }}; margin-right: 5px;"></span>
                                            {{ $related->stock_availability > 0 ? 'In Stock' : 'Out of Stock' }}
                                        </span>
                                        <span
                                            style="background-color: #00b894; color: white; padding: 4px 8px; border-radius: 12px; font-size: 11px;">
                                            View Details
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State Message -->
            <div
                style="background: white; border-radius: 16px; box-shadow: 0 2px 15px rgba(0,0,0,0.08); padding: 40px 20px; text-align: center; margin-bottom: 40px;">
                <div style="margin-bottom: 20px;">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#a8a4e3"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                </div>
                <h3 style="margin: 0 0 10px 0; font-size: 20px; color: #2d3436;">No Related Products Found</h3>
                <p style="margin: 0 0 20px 0; color: #718093;">Explore our shop to discover more amazing products!</p>
            </div>
        @endif

        <!-- Shop More Button -->
        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ url('/shop') }}"
                style="display: inline-block; padding: 12px 30px; background: linear-gradient(45deg, #6c5ce7, #a8a4e3); color: white; text-decoration: none; border-radius: 25px; font-weight: 600; transition: transform 0.3s ease;"
                onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                Shop More
            </a>
        </div>
    </div>

    <script>
        function changeMainImage(newSrc, thumbnailElement) {
            // Update main image
            const mainImage = document.getElementById('mainImage');
            mainImage.style.opacity = '0';

            setTimeout(() => {
                mainImage.src = newSrc;
                mainImage.style.opacity = '1';
            }, 300);

            // Update thumbnail active state
            document.querySelectorAll('.thumbnail').forEach(thumb => {
                thumb.classList.remove('active');
            });
            thumbnailElement.classList.add('active');
        }

        // Set first thumbnail as active on load
        document.addEventListener('DOMContentLoaded', function() {
            const firstThumbnail = document.querySelector('.thumbnail');
            if (firstThumbnail) {
                firstThumbnail.classList.add('active');
            }
        });
    </script>


    <!-- end comment -->
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
    <script src="vendor/drift/js/Drift.min.js"></script> <!-- drift js -->
    <script src="assets/js/theme_one.js"></script> <!-- theme js -->
    <script>
        // Select all elements with the class `demo-trigger`
        var demoTriggers = document.querySelectorAll('.demo-trigger');
        var paneContainer = document.querySelector('.product-detail-block');

        // Loop through each element and apply Drift
        demoTriggers.forEach(function(trigger) {
            new Drift(trigger, {
                paneContainer: paneContainer,
                inlinePane: false,
                zoomFactor: 3,
            });
        });
    </script>

    <!-- end jquery -->
</body>

</html>
