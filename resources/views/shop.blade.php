<!DOCTYPE html>


<html lang="en">



<head>
    <meta charset="utf-8">
    <title>Shop Kenyan Products Online | African Groceries & Foods | Ukwaju Market USA</title>

    <!-- Primary Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Buy authentic Kenyan groceries, spices, snacks, and cultural items online. Browse our wide selection of East African products with nationwide USA delivery. Fresh African foods and ingredients.">
    <meta name="keywords"
        content="buy Kenyan food online, African grocery store USA, Kenyan spices, East African snacks, African cooking ingredients, Kenyan tea USA, African food store online">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.ukwajumarket.com/shop">
    <meta property="og:title" content="Shop Authentic Kenyan Products | Ukwaju Market USA">
    <meta property="og:description"
        content="Browse and buy authentic Kenyan groceries, spices, snacks, and cultural items. Quality East African products delivered across USA.">
    <meta property="og:image" content="assets/images/ukwaju-market-shop-og.jpg">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.ukwajumarket.com/shop">
    <meta property="twitter:title" content="Shop Kenyan Products | Ukwaju Market USA">
    <meta property="twitter:description"
        content="Browse authentic Kenyan groceries, spices, snacks & cultural items. Quality East African products delivered USA-wide.">
    <meta property="twitter:image" content="assets/images/ukwaju-market-shop-og.jpg">

    <!-- Additional Meta -->
    <meta name="author" content="Ukwaju Market">
    <meta name="MobileOptimized" content="320">
    <link rel="canonical" href="https://www.ukwajumarket.com/shop">

    <!-- E-commerce Specific Meta Tags -->
    <meta name="robots" content="index, follow">
    <meta property="og:availability" content="instock">
    <meta property="og:price:currency" content="USD">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon/flaticon_ecommerce.css">
    <link rel="stylesheet" type="text/css" href="vendor/slick/css/slick.css">
    <link rel="stylesheet" type="text/css" href="vendor/slick/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    @include('header')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main-block">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shop</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- breadcrumb image start -->
    <section class="breadcrumb-image-main-block">
        <div class="container">
            <div class="breadcrumb-image-block">
                <div class="row">
                    <div class="col-xl-4 col-lg-6">
                        <div class="advertise-block">
                            <h6 class="advertise-sub-heading">Weekend Special</h6>
                            <h2 class="advertise-heading">Authentic Kenyan Delicacies</h2>
                            <p>Bringing you the taste of home, fresh and authentic.</p>
                            <a title="" class="btn btn-primary">Shop Now<i class="flaticon-right-arrows"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-6">
                        <ul class="discount-img">
                            <li class="image-one"><img src="assets/images/home_page_4/breadcrumb/01.png"
                                    class="img-fluid" alt="Kenyan Spices"></li>
                            <li class="image-two"><img src="assets/images/home_page_4/breadcrumb/02.png"
                                    class="img-fluid" alt="Tea & Coffee"></li>
                            <li class="image-three"><img src="assets/images/home_page_4/breadcrumb/03.png"
                                    class="img-fluid" alt="Traditional Snacks"></li>
                        </ul>
                    </div>
                </div>
                <div class="breadcrumb-image-bg"></div>
            </div>
        </div>
    </section>
    <!-- breadcrumb image end -->
    <!-- shop filter start -->
    <section style="padding: 20px 0; background: white; border-bottom: 1px solid #f0f0f0;">
        <div class="container" style="max-width: 1200px; margin: 0 auto;">
            <div class="row" style="display: flex; flex-wrap: wrap; align-items: center;">
                <!-- Results Counter -->
                <div class="col-xl-5 col-lg-4 col-md-12" style="margin-bottom: 15px;">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <h3 style="font-size: 15px; color: #718096; font-weight: 500; margin: 0;">
                            Showing Results
                        </h3>
                        <p
                            style="margin: 0; font-size: 14px; color: #2d3748; background: #f7fafc; padding: 6px 12px; border-radius: 8px;">
                            <span style="font-weight: 600;">{{ $products->count() }}</span>
                            <span style="color: #718096;"> of </span>
                            <span style="font-weight: 600;">{{ $products->total() }}</span>
                            <span style="color: #718096;"> items</span>
                        </p>
                    </div>
                </div>

                <!-- Filters Section -->
                <div class="col-xl-7 col-lg-8 col-md-12">
                    <div
                        style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: flex-end; align-items: center;">
                        <!-- Sort Dropdown -->
                        <div style="min-width: 200px;">
                            <label style="font-size: 13px; color: #718096; display: block; margin-bottom: 5px;">Sort
                                by</label>
                            <select id="sort-products"
                                style="width: 100%; padding: 8px 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; color: #2d3748; background-color: white; cursor: pointer; appearance: none; background-image: url('data:image/svg+xml;charset=US-ASCII,<svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 10l5 5 5-5z\" fill=\"%23718096\"/></svg>'); background-repeat: no-repeat; background-position: right 8px center;">
                                <option value="latest">Latest</option>
                                <option value="price_low_high">Price: Low to High</option>
                                <option value="price_high_low">Price: High to Low</option>
                            </select>
                        </div>

                        <!-- Items Per Page -->
                        <div style="min-width: 100px;">
                            <label
                                style="font-size: 13px; color: #718096; display: block; margin-bottom: 5px;">Show</label>
                            <select id="items-per-page"
                                style="width: 100%; padding: 8px 12px; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 14px; color: #2d3748; background-color: white; cursor: pointer; appearance: none; background-image: url('data:image/svg+xml;charset=US-ASCII,<svg width=\"24\" height=\"24\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M7 10l5 5 5-5z\" fill=\"%23718096\"/></svg>'); background-repeat: no-repeat; background-position: right 8px center;">
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                            </select>
                        </div>

                        <!-- View Toggle -->
                        <div style="display: flex; align-items: flex-end; gap: 8px;">
                            <button id="grid-view"
                                style="padding: 8px; border: 1px solid #e2e8f0; border-radius: 8px; background: white; cursor: pointer; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; transition: all 0.2s;"
                                onmouseover="this.style.background='#f7fafc'"
                                onmouseout="this.style.background='white'">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                </svg>
                            </button>
                            <button id="list-view"
                                style="padding: 8px; border: 1px solid #e2e8f0; border-radius: 8px; background: white; cursor: pointer; display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; transition: all 0.2s;"
                                onmouseover="this.style.background='#f7fafc'"
                                onmouseout="this.style.background='white'">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="3" y1="6" x2="21" y2="6"></line>
                                    <line x1="3" y1="12" x2="21" y2="12"></line>
                                    <line x1="3" y1="18" x2="21" y2="18"></line>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product List -->
    <div class="row" id="product-list">
        @include('partials.product-card', ['products' => $products])
    </div>

    <!-- Load More Button -->
    <div class="text-center mt-4">
        @if ($products->hasMorePages())
            <button id="load-more" class="btn btn-primary" data-url="{{ $products->nextPageUrl() }}">Load
                More</button>
        @endif
    </div>

    {{-- <div class="row">
        @if ($products->count() > 0)
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @php
                            $images = $product->images ? json_decode($product->images) : [];
                        @endphp
                        <img src="{{ isset($images[0]) ? asset('storage/' . $images[0]) : asset('images/no-image.png') }}"
                            class="card-img-top" alt="{{ $product->name }}">

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text">
                                <strong>Price:</strong> ${{ number_format($product->price, 2) }}
                                @if ($product->slashed_price)
                                    <span
                                        class="text-danger"><s>${{ number_format($product->slashed_price, 2) }}</s></span>
                                @endif
                            </p>
                            <p class="card-text">
                                <strong>Stock:</strong> {{ $product->stock_availability }}
                            </p>
                            <a href="{{ route('shop.detail', $product->id) }}" class="btn btn-primary">View
                                Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center">No products available.</p>
        @endif
    </div> --}}



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let loadMoreBtn = document.getElementById("load-more");
            let sortSelect = document.getElementById("sort-products");
            let itemsPerPageSelect = document.getElementById("items-per-page");
            let productList = document.getElementById("product-list");

            function fetchProducts(url) {
                fetch(url, {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.products) {
                            productList.innerHTML = data.products;
                            updateLoadMoreButton(data.next_page);
                            updateProductCount();
                        }
                    })
                    .catch(error => console.error("Error fetching products:", error));
            }

            function updateLoadMoreButton(nextPage) {
                if (loadMoreBtn) {
                    if (nextPage) {
                        loadMoreBtn.setAttribute("data-url", nextPage);
                        loadMoreBtn.style.display = "block";
                    } else {
                        loadMoreBtn.style.display = "none";
                    }
                }
            }

            function updateProductCount() {
                let currentCount = document.getElementById("current-count");
                let totalCount = document.getElementById("total-count");
                currentCount.innerText = document.querySelectorAll("#product-list .product-card").length;
            }

            if (loadMoreBtn) {
                loadMoreBtn.addEventListener("click", function() {
                    let url = loadMoreBtn.getAttribute("data-url");
                    if (url) {
                        fetch(url, {
                                headers: {
                                    "X-Requested-With": "XMLHttpRequest"
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.products) {
                                    productList.insertAdjacentHTML("beforeend", data.products);
                                    updateLoadMoreButton(data.next_page);
                                    updateProductCount();
                                }
                            })
                            .catch(error => console.error("Error loading more products:", error));
                    }
                });
            }

            sortSelect.addEventListener("change", function() {
                let url = `?sort=${sortSelect.value}&per_page=${itemsPerPageSelect.value}`;
                fetchProducts(url);
            });

            itemsPerPageSelect.addEventListener("change", function() {
                let url = `?sort=${sortSelect.value}&per_page=${itemsPerPageSelect.value}`;
                fetchProducts(url);
            });
        });
    </script>

    <!-- footer start -->
    @include('footer')
    <!-- footer end -->

    <!-- jquery -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/jquery.min.js"></script> <!-- jquery library js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script> <!-- bootstrap bundle js -->
    <script src="vendor/slick/js/slick.js"></script> <!-- slick js -->
    <script src="assets/js/theme_one.js"></script> <!-- theme js -->
    <!-- end jquery -->
</body>

</html>
