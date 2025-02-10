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
                               <i class="flaticon-phone"></i>You can contact us 24/7<span> + (212) 935 3811</span>
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
                           <img src="assets/images/logo/01.png" class="img-fluid" alt=""
                               style="max-width: 40%; height: auto;">
                       </a>
                   </div>
               </div>
               <div class="col-xl-7 col-lg-6 col-md-7">
                   <div style="width: 100%; max-width: 600px; margin: 0 auto;">
                       <form action="{{ route('shop') }}" method="GET" style="position: relative;">
                           <input type="text" name="search" placeholder="Search for products..."
                               value="{{ request()->query('search') }}"
                               style="
                    width: 100%;
                    padding: 12px 45px 12px 20px;
                    border: 2px solid #edf2f7;
                    border-radius: 12px;
                    font-size: 14px;
                    color: #2d3748;
                    background: white;
                    transition: all 0.2s ease;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.02);
                "
                               onFocus="this.style.borderColor='#3498db'; this.style.boxShadow='0 2px 15px rgba(0,0,0,0.06)'"
                               onBlur="this.style.borderColor='#edf2f7'; this.style.boxShadow='0 2px 4px rgba(0,0,0,0.02)'">
                           <button type="submit"
                               style="
                    position: absolute;
                    right: 5px;
                    top: 50%;
                    transform: translateY(-50%);
                    border: none;
                    background: none;
                    padding: 8px;
                    cursor: pointer;
                    color: #718096;
                    border-radius: 8px;
                    transition: all 0.2s ease;
                "
                               onmouseover="this.style.color='#3498db'; this.style.background='#f7fafc'"
                               onmouseout="this.style.color='#718096'; this.style.background='transparent'">
                               <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                   stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                   stroke-linejoin="round">
                                   <circle cx="11" cy="11" r="8"></circle>
                                   <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                               </svg>
                           </button>
                       </form>
                   </div>
               </div>

               <div class="col-xl-3 col-lg-4 col-md-3">
                   <div class="header-right-block">
                       <ul>
                           <li>
                               @auth
                                   <a href="{{ route('dashboard') }}" class="user-icon-block">
                                       <div class="user-icon">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                               viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                               stroke-linecap="round" stroke-linejoin="round">
                                               <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                               <circle cx="12" cy="7" r="4"></circle>
                                           </svg>
                                       </div>
                                       <div class="user-dtl">
                                           <span>Welcome</span>
                                           <h6 class="user-title">Dashboard</h6>
                                       </div>
                                   </a>
                               @else
                                   <a href="{{ route('login') }}" class="user-icon-block">
                                       <div class="user-icon"><i class="flaticon-user"></i></div>
                                       <div class="user-dtl">
                                           <span>Sign In</span>
                                           <h6 class="user-title">Account</h6>
                                       </div>
                                   </a>
                               @endauth
                           </li>
                           <li class="wishlist-icon-block">
                               <a href="wishlist.html" title="">
                                   <i class="flaticon-love"></i>
                                   <span class="icon-badge">1</span>
                               </a>
                           </li>
                           <li>
                               <a href="cart.html" title="">
                                   <div class="cart-icon-block">
                                       <div class="cart-icon">
                                           <i class="flaticon-shopping-cart"></i>
                                           <span class="icon-badge">0</span>
                                       </div>
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
                           @foreach ($categories as $category)
                               <li>
                                   <a class="dropdown-item"
                                       href="{{ route('shop', ['search' => $category->category]) }}">
                                       {{ $category->category }}
                                   </a>
                               </li>
                           @endforeach
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
                       @auth
                           <a href="{{ route('dashboard') }}">
                               <div class="user-icon">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                       viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                       stroke-linecap="round" stroke-linejoin="round">
                                       <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                       <circle cx="12" cy="7" r="4"></circle>
                                   </svg>
                               </div>
                           </a>
                       @else
                           <a href="{{ route('login') }}">
                               <div class="user-icon">
                                   <i class="flaticon-user"></i>
                               </div>
                           </a>
                       @endauth
                   </div>
               </div>
           </div>
       </div>
   </div>
