   <!-- top bar start -->
   <div id="top-bar" class="top-bar-main-block">
       <div class="container">
           <div class="row">
               <div class="col-lg-4 col-md-4">
                   <ul class="top-bar-dtls">
                       <li><a href="/contact" title="">Track Order</a></li>
                       <li><a href="/about-us" title="">About Us</a></li>
                       <li><a href="/contact" title="">Contact</a></li>
                       <li><a href="/faqs" title="">FAQ</a></li>
                   </ul>
               </div>
               <div class="col-lg-8 col-md-8">
                   <ul class="top-bar-info-block">
                       <li class="top-bar-contact">
                           <a href="#" class="contact" title="">
                               <i class="flaticon-phone"></i>You can contact us 24/7<span>0 800 300-353</span>
                           </a>
                       </li>
                       <li class="dropdown top-bar-dropdown">
                           <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                               English <i class="flaticon-down-arrow"></i>
                           </button>
                           <ul class="dropdown-menu">
                               <li><a class="dropdown-item" href="#">English</a></li>

                           </ul>
                       </li>
                       <li class="dropdown top-bar-dropdown">
                           <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                               USD <i class="flaticon-down-arrow"></i>
                           </button>
                           <ul class="dropdown-menu">
                               <li><a class="dropdown-item" href="#">USD</a></li>

                           </ul>
                       </li>
                       <li class="dark-mode"><a href="#" title=""><i class="flaticon-brightness"></i>Dark
                               Theme</a></li>
                   </ul>
               </div>
           </div>
       </div>
   </div>
   <!-- top bar end -->
   <!-- header start -->
   <section id="header" class="header-main-block">
       <div class="container">
           <div class="row">
               <div class="col-xl-2 col-lg-2 col-md-2">
                   <div class="header-logo">
                       <a href="/" title="">
                           <img src="assets/images/logo/01.png" class="img-fluid" alt="">
                       </a>
                   </div>
               </div>
               <div class="col-xl-7 col-lg-6 col-md-7">
                   <div class="header-search-block">
                       <div class="input-group">
                           <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                               All<i class="flaticon-down-arrow"></i>
                           </button>
                           <ul class="dropdown-menu">
                               <li><a class="dropdown-item" href="#" title="">Fashion</a></li>
                               <li><a class="dropdown-item" href="#" title="">Accessories</a></li>
                               <li><a class="dropdown-item" href="#" title="">Electronics</a></li>
                           </ul>
                           <input type="text" class="form-control" placeholder="Search for products...">
                           <a href="#" title="" class="search-icon"><i
                                   class="flaticon-search-interface-symbol"></i></a>
                       </div>
                   </div>
               </div>
               <div class="col-xl-3 col-lg-4 col-md-3">
                   <div class="header-right-block">
                       <ul>
                           <li>
                               <div class="user-icon-block">
                                   <div class="user-icon"><i class="flaticon-user"></i></div>
                                   <div class="user-dtl">
                                       <span>Sign In</span>
                                       <h6 class="user-title">Account</h6>
                                   </div>
                               </div>
                           </li>
                           <li class="wishlist-icon-block"><a href="wishlist.html" title=""><i
                                       class="flaticon-love"></i><span class="icon-badge">1</span></a></li>
                           <li>
                               <a href="cart.html" title="">
                                   <div class="cart-icon-block">
                                       <div class="cart-icon"><i class="flaticon-shopping-cart"></i><span
                                               class="icon-badge">0</span></div>
                                       <div class="cart-dtl">
                                           <span>Total</span>
                                           <h6 class="cart-price">$0.00</h6>
                                       </div>
                                   </div>
                               </a>
                           </li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- header end -->

   <div id="navigation" class="navigation-main-block">
       <div class="container">
           <div class="row">
               <div class="col-lg-3 col-md-5">
                   <div class="dropdown category-dropdown">
                       <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                           aria-expanded="false">
                           <i class="flaticon-hamburger"></i> All Categories <i class="flaticon-down-arrow"></i>
                       </button>
                       <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="#" title="">Smartphones</a></li>
                           <li><a class="dropdown-item" href="#" title="">Tablets</a></li>

                           <li><a class="dropdown-item" href="#" title="">Bluetooth earphones</a></li>
                       </ul>
                   </div>
               </div>
               <div class="col-lg-7 col-md-3">
                   <nav class="navbar navbar-expand-lg bg-body-tertiary">
                       <div class="navbar-collapse" id="navbarNavAltMarkup">
                           <ul class="navbar-nav">
                               <li class="nav-item">
                                   <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                                       href="{{ url('/') }}" aria-current="page">Home</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link {{ Request::is('shop*') ? 'active' : '' }}"
                                       href="{{ route('shop') }}">Shop</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link {{ Request::is('about') ? 'active' : '' }}"
                                       href="{{ route('about') }}">About Us</a>
                               </li>
                               <li class="nav-item">
                                   <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
                                       href="{{ route('contact') }}">Contact Us</a>
                               </li>
                           </ul>
                       </div>
                   </nav>
               </div>


               <div class="col-lg-2 col-md-4">
                   <div class="navigation-discount-block">
                       <a href="#" title=""><i class="flaticon-discount"></i>Best Discounts</a>
                   </div>
               </div>
               <div class="col-md-12">
                   <div class="tabscreen-navigation">
                       <nav class="navbar navbar-expand-lg">
                           <a class="navbar-brand" href="#">Menu</a>
                           <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                               data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                               aria-expanded="false" aria-label="Toggle navigation">
                               <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="navbar-collapse collapse" id="navbarNavDropdown">
                               <ul class="navbar-nav">
                                   <li class="nav-item">
                                       <a class="nav-link {{ Request::is('/') ? 'active' : '' }}"
                                           href="{{ url('/') }}" aria-current="page">Home</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link {{ Request::is('shop*') ? 'active' : '' }}"
                                           href="{{ route('shop') }}">Shop</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link {{ Request::is('about') ? 'active' : '' }}"
                                           href="{{ route('about') }}">About Us</a>
                                   </li>
                                   <li class="nav-item">
                                       <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
                                           href="{{ route('contact') }}">Contact Us</a>
                                   </li>
                               </ul>
                           </div>

                       </nav>

                   </div>
               </div>
           </div>
       </div>
   </div>

   <!-- smallscreen navigation start -->
   <div id="smallscreen-navigation" class="smallscreen-navigation-main-block">
       <div class="container">
           <nav class="navbar navbar-expand-lg">
               <a class="navbar-brand" href="#">Menu</a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                   data-bs-target="#navbarNavDropdownOne" aria-controls="navbarNavDropdownOne" aria-expanded="false"
                   aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>
               <div class="navbar-collapse collapse" id="navbarNavDropdownOne">
                   <ul class="navbar-nav">
                       <li class="nav-item">
                           <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}"
                               aria-current="page">Home</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link {{ Request::is('shop*') ? 'active' : '' }}"
                               href="{{ route('shop') }}">Shop</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link {{ Request::is('about') ? 'active' : '' }}"
                               href="{{ route('about') }}">About Us</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}"
                               href="{{ route('contact') }}">Contact Us</a>
                       </li>
                   </ul>
               </div>
           </nav>

           <div class="smallscreen-bottom-bar">
               <div class="row">
                   <div class="col">
                       <div class="dropdown category-dropdown">
                           <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                               <i class="flaticon-hamburger"></i>
                           </button>
                           <ul class="dropdown-menu">
                               <li><a class="dropdown-item" href="#" title="">Smartphones</a></li>

                           </ul>
                       </div>
                   </div>
                   <div class="col">
                       <div class="wishlist-icon-block">
                           <a href="wishlist.html" title=""><i class="flaticon-love"></i><span
                                   class="icon-badge">1</span></a>
                       </div>
                   </div>
                   <div class="col">
                       <a href="/" title=""><i class="flaticon-home"></i></a>
                   </div>
                   <div class="col">
                       <div class="cart-icon-block">
                           <div class="cart-icon">
                               <a href="cart.html" title=""><i class="flaticon-shopping-cart"></i><span
                                       class="icon-badge">0</span></a>
                           </div>
                       </div>
                   </div>
                   <div class="col">
                       <div class="user-icon"><i class="flaticon-user"></i></div>
                   </div>
               </div>
           </div>
       </div>
   </div>
