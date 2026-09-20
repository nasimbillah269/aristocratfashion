<!-- =========================
     TOP NOTICE
========================= -->

<!--<div class="top-notice">-->
<!--    <div class="">-->
        
<!--    <div class="notice-content">-->

<!--        <div class="notice-item">-->
<!--            <span>-->
<!--                যার প্রতিনিধির ফোন দিয়ে আপনার অর্ডারটি কনফার্ম করবেন (শুক্রবার ব্যতীত)-->
<!--            </span>-->
<!--        </div>-->

<!--        <div class="notice-item">-->
<!--            <span class="notice-arrow">➤</span>-->
<!--            <span>-->
<!--                ফোন কনফার্ম হওয়ার ২৪-৪৮ ঘণ্টার মধ্যে আপনার অর্ডারটি হাতে পেয়ে যাবেন।-->
<!--            </span>-->
<!--        </div>-->

<!--        <div class="notice-item">-->
<!--            <span class="notice-arrow">➤</span>-->
<!--            <span>-->
<!--                আমাদের অফিসিয়াল পেজে পেমেন্ট মাধ্যমে-->
<!--            </span>-->
<!--        </div>-->

<!--    </div>-->
<!--    </div>-->

<!--</div>-->


       @if(offerNotes()->count() > 0)
                    <div class="topText text-center headerTopPart">
                        <marquee behavior="scroll" direction="left" scrollamount="5" onmouseover="this.stop();" onmouseout="this.start();">
                        @foreach(offerNotes() as $note)
                        <p>{!!$note->content!!}</p>
                        @endforeach
                        </marquee>
                    </div>
                    @endif

<!-- =========================
     MAIN HEADER
========================= -->

<header class="main-header">

    <div class="container">

        <div class="header-main-inner">

            <!-- Logo -->

            <a href="{{route('index')}}" class="logo">

              <img src="{{asset(general()->logo())}}" alt="{{general()->title}}" />
                <div>
                        <span class="logo-text">
                           Aristocrat Fashion
                        </span>
                        <div class="brand-tagline">
                            <span>Lifestyle</span>
                            <i></i>
                            <span>Beauty</span>
                            <i></i>
                            <span>Baby Care</span>
                        </div>
                </div>
            
  
                
                

            </a>


            <!-- Search -->

            <!--<div class="search-wrapper" id="searchHeaderInput">-->

            <!--    <input-->
            <!--        type="text"-->
            <!--        class="search-input"-->
            <!--        placeholder="Search for products"-->
            <!--    >-->

            <!--    <button class="search-button">-->
            <!--        <i class="fa-solid fa-magnifying-glass"></i>-->
            <!--    </button>-->

            <!--</div>-->
            
            <div class="search-wrapper position-relative" id="searchHeaderInput">
                <input
                    type="text"
                    class="search-input"
                    placeholder="Search for products"
                    autocomplete="off"
                >
            
                <button class="search-button">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            
                <!-- AJAX Search Result Dropdown Container -->
                <div class="searchResultAjax position-absolute w-100 bg-white shadow-lg rounded-bottom p-3" 
                     style="top: 100%; left: 0; z-index: 9999; display: none; max-height: 400px; overflow-y: auto;">
                </div>
            </div>


            <!-- Header Information -->

            <div class="header-info">

                <div class="info-item">

                    <div class="info-icon">
                        <i class="fa-solid fa-headset"></i>
                    </div>

                    <div>
                        <div class="info-title">
                            Support
                        </div>

                        <div class="info-text">
                         {{ general()->mobile }}
                        </div>
                    </div>

                </div>


                <div class="info-item">

                    <div class="info-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>

                    <div>
                        <div class="info-title">
                            Bangladesh
                        </div>

                        <div class="info-text">
                            Conditionally Free Shipping
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</header>


<!-- =========================
     NAVIGATION
========================= -->

<nav class="navigation">

    <div class="container">

        <div class="navigation-inner">

            <!-- Menu -->

            <button class="menu-button">

                <span class="menu-circle" id="openSidebar">
                    <i class="fa-solid fa-bars"></i>
                </span>

            </button>


            <!-- Navigation -->

            <ul class="nav-list">

                <li class="nav-item-custom">
                    <a href="https://aristocratfashion.com/products-all" class="nav-link-custom">
                        Shop
                    </a>
                </li>


                <li class="nav-item-custom">
                    <a href="https://aristocratfashion.com/new-arrival" class="nav-link-custom">
                        New Arrival
                    </a>
                </li>




                <li class="nav-item-custom">

                    <span class="nav-badge badge-sale">
                        SALE
                    </span>

                    <a href="https://aristocratfashion.com/best-selling" class="nav-link-custom">
                        Best Selling
                    </a>

                </li>


         


                <li class="nav-item-custom">

                    <span class="nav-badge badge-details">
                        DETAILS
                    </span>

                    <a href="https://aristocratfashion.com/offers" class="nav-link-custom">
                        Offers
                    </a>

                </li>


                <li class="nav-item-custom">
                    <a href="https://aristocratfashion.com/brands" class="nav-link-custom">
                        Brands
                    </a>
                </li>
                
                <li class="nav-item-custom">
                    <a href="https://aristocratfashion.com/pre-order" class="nav-link-custom">
                        Pre-Order
                    </a>
                </li>
                <li class="nav-item-custom">
                    <a href="https://aristocratfashion.com/blogs" class="nav-link-custom">
                        Blogs
                    </a>
                </li>




           

            </ul>


            <!-- Right Actions -->

            <div class="nav-actions">

                <!--<a href="#" class="action-icon">-->
                <!--    <i class="fa-regular fa-user"></i>-->
                <!--</a>-->


                <!--<div class="cart-action">-->

                <!--    <i class="fa-solid fa-bag-shopping action-icon"></i>-->

                <!--    <span class="cart-count">-->
                <!--        4-->
                <!--    </span>-->

                <!--    <span class="cart-price">-->
                <!--        ৳ 10,300-->
                <!--    </span>-->

                <!--</div>-->
                
             <ul class="header-action-list">

    <!--<li class="header-action-item user-action onhover-div mobileLogin">-->

    <!--    <a href="#" class="header-action-btn user-btn">-->
    <!--        <i class="fa-regular fa-user"></i>-->
    <!--    </a>-->

    <!--    <div class="onhover-show-div user-dropdown">-->
    <!--        <ul>-->

    <!--            @if(Auth::check())-->

    <!--                <li style="width: 100%;">-->
    <!--                    <a href="{{ route('customer.dashboard') }}">-->
    <!--                        Dashboard-->
    <!--                    </a>-->
    <!--                </li>-->

    <!--            @else-->

    <!--                <li style="width: 100%;" >-->
    <!--                    <a href="{{ route('login') }}">-->
    <!--                        Login-->
    <!--                    </a>-->
    <!--                </li>-->

    <!--                <li style="width: 100%;" >-->
    <!--                    <a href="{{ route('register') }}">-->
    <!--                        Register-->
    <!--                    </a>-->
    <!--                </li>-->

    <!--            @endif-->

    <!--        </ul>-->
    <!--    </div>-->

    <!--</li>-->
    
    
<li class="custom-user-menu">

    @if(Auth::check())

        <a href="{{ route('customer.dashboard') }}" class="custom-user-link">
            <i class="fa-regular fa-user"></i>
            <span>Dashboard</span>
        </a>

    @else

        <a href="{{ route('login') }}" class="custom-user-link" style="margin-right: 5px;">
            <i class="fa-regular fa-user"></i>
            <span>Login</span>
        </a>
        /
        <a href="{{ route('register') }}" class="custom-user-link" style="margin-left: 5px;">
            <span>Register</span>
        </a>

    @endif

</li>
    
    
    {{-- Wishlist --}}
    <li class="header-action-item wishlist-action">
        <a href="{{ route('myWishlist') }}" class="header-action-btn">

            <i class="fa-regular fa-heart"></i>

            <span class="header-count wlcounter">
                @isset($wlCount)
                    {{ $wlCount }}
                @else
                    0
                @endisset
            </span>

        </a>
    </li>


    {{-- Shopping Cart --}}
    <li class="header-action-item cart-action onhover-div shopping-cart">

        <a
            href="#"
            class="cart-header-link"
            data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight"
            aria-controls="offcanvasRight"
        >

            <div class="cart-icon-wrapper">

               <i class="fa-solid fa-bag-shopping action-icon"></i>

                <span class="cartCounter cart-count">
                    @isset($cartsCount)
                        {{ $cartsCount }}
                    @else
                        0
                    @endisset
                </span>

            </div>

            <span class="cart-total">
                <span class="cart-total-value cartTotal">
                   
                       @isset($cartTotalPrice) {{priceFullFormat($cartTotalPrice)}}@endisset 
                  
                </span>
            </span>

        </a>

    </li>

</ul>
                
                

            </div>

        </div>

    </div>

</nav>

















<!-- =========================================
     OVERLAY
========================================= -->

<div class="sidebar-overlay" id="sidebarOverlay"></div>


<!-- =========================================
     MOBILE SIDEBAR
========================================= -->

<aside class="mobile-sidebar" id="mobileSidebar">

    <!-- CLOSE -->
    <button class="sidebar-close" id="closeSidebar">
        <i class="bi bi-x"></i>
    </button>


    <!-- TOP TABS -->
    <div class="sidebar-tabs">

        <div class="sidebar-tab active"
             data-tab="categories">

            CATEGORIES

        </div>

        <div class="sidebar-tab"
             data-tab="menu">
            MENU
        </div>

    </div>


    <!-- CONTENT -->
    <div class="sidebar-content">


        <!-- =================================
             CATEGORIES
        ================================== -->

        {{--<div class="sidebar-panel active"
             id="categoriesPanel">


            <!-- SHOP NOW -->

            <div class="shop-now">

                <i class="bi bi-truck shop-now-icon"></i>

                <span class="shop-now-text">
                    Shop Now
                </span>

                <span class="shop-now-badge">
                    সরাসরি শপিং ক্রেডিট নেন
                </span>

            </div>




            <div class="category-item"
                 data-submenu="skin-care">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Skin Care
                    </span>

                </div>

                <div class="category-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

            </div>



            <div class="category-item"
                 data-submenu="body-care">

                <div class="category-main">

                    <span class="category-icon">
                        ♧
                    </span>

                    <span class="category-name">
                        Body, Hand & Foot Care
                    </span>

                </div>

                <div class="category-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

            </div>




            <div class="category-item"
                 data-submenu="hair-care">

                <div class="category-main">

                    <span class="category-icon">
                        ♧
                    </span>

                    <span class="category-name">
                        Hair, Eye, Lip & Teeth Care
                    </span>

                </div>

                <div class="category-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

            </div>




            <div class="category-item"
                 data-submenu="baby-product">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Baby Product
                    </span>

                </div>

                <div class="category-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

            </div>




            <div class="category-item"
                 data-submenu="lifestyle">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Lifestyle
                    </span>

                </div>

                <div class="category-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

            </div>




            <div class="category-item"
                 data-submenu="food">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Food & Supplement
                    </span>

                </div>

                <div class="category-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

            </div>




            <div class="category-item">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Student Pack
                    </span>

                </div>

            </div>



            <div class="category-item">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Combo
                    </span>

                    <span class="offer-badge">
                        OFFER
                    </span>

                </div>

            </div>




            <div class="category-item">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Trial Version
                    </span>

                </div>

            </div>




            <div class="category-item">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Sheet Mask
                    </span>

                </div>

            </div>




            <div class="category-item"
                 data-submenu="makeup">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Makeup
                    </span>

                </div>

                <div class="category-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

            </div>




            <div class="category-item"
                 data-submenu="personal-care">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Personal Care
                    </span>

                </div>

                <div class="category-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

            </div>




            <div class="category-item"
                 data-submenu="accessories">

                <div class="category-main">

                    <span class="category-icon">
                        ♡
                    </span>

                    <span class="category-name">
                        Accessories
                    </span>

                </div>

                <div class="category-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

            </div>


        </div>--}}
        
        
@if($menu = menu('Category Menus'))
    <div class="sidebar-panel active" id="categoriesPanel">

        {{-- SHOP NOW --}}
        <div class="shop-now">
            <i class="bi bi-truck shop-now-icon"></i>
            <span class="shop-now-text">Shop Now</span>
            <span class="shop-now-badge">সরাসরি শপিং ক্রেডিট নেন</span>
        </div>

        {{-- LEVEL 1 ITEMS --}}
        @foreach($menu->subMenus as $item)
            @php
                $level2 = $item->subMenus;
                $hasLevel2 = $level2 && $level2->count() > 0;
                $submenuId = 'submenu-' . $item->id;
            @endphp

            @if($hasLevel2)
                <div class="category-item has-submenu" data-submenu="{{ $submenuId }}">
                    <div class="category-main">
                        <span class="category-icon">
                            <img src="{{ asset($item->image()) }}" loading="lazy">
                        </span>
                        <span class="category-name">{{ $item->menuName() }}</span>
                        @if(isset($item->is_offer) && $item->is_offer)
                            <span class="offer-badge">OFFER</span>
                        @endif
                    </div>
                    <div class="category-arrow">
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </div>
            @else
                <a href="{{ asset($item->menuLink()) }}" class="category-item category-link">
                    <div class="category-main">
                        
                        <span class="category-name">{{ $item->menuName() }}</span>
                        @if(isset($item->is_offer) && $item->is_offer)
                            <span class="offer-badge">OFFER</span>
                        @endif
                    </div>
                </a>
            @endif
        @endforeach
    </div>

    {{-- LEVEL 2 & 3 SIDEBAR PANELS (DOM-এ আলাদা লেভেলে রাখা হয়েছে) --}}
    @foreach($menu->subMenus as $item)
        @php
            $level2 = $item->subMenus;
            $hasLevel2 = $level2 && $level2->count() > 0;
            $submenuId = 'submenu-' . $item->id;
        @endphp

        @if($hasLevel2)
            {{-- LEVEL 2 PANEL --}}
            <div class="sidebar-panel submenu-panel" id="{{ $submenuId }}">
                <div class="submenu-header">
                    <button type="button" class="submenu-back">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                        <span>{{ $item->menuName() }}</span>
                </div>

                @foreach($level2 as $subItem)
                    @php
                        $level3 = $subItem->subMenus;
                        $hasLevel3 = $level3 && $level3->count() > 0;
                        $submenuId3 = 'submenu-' . $item->id . '-' . $subItem->id;
                    @endphp

                    @if($hasLevel3)
                        <div class="category-item has-submenu" data-submenu="{{ $submenuId3 }}">
                            <div class="category-main">
                               
                                <span class="category-name">{{ $subItem->menuName() }}</span>
                                @if(isset($subItem->is_offer) && $subItem->is_offer)
                                    <span class="offer-badge">OFFER</span>
                                @endif
                            </div>
                            <div class="category-arrow">
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </div>
                    @else
                        <a href="{{ asset($subItem->menuLink()) }}" class="category-item category-link">
                            <div class="category-main">
                               
                                <span class="category-name">{{ $subItem->menuName() }}</span>
                                @if(isset($subItem->is_offer) && $subItem->is_offer)
                                    <span class="offer-badge">OFFER</span>
                                @endif
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>

            {{-- LEVEL 3 PANELS --}}
            @foreach($level2 as $subItem)
                @php
                    $level3 = $subItem->subMenus;
                    $hasLevel3 = $level3 && $level3->count() > 0;
                    $submenuId3 = 'submenu-' . $item->id . '-' . $subItem->id;
                @endphp

                @if($hasLevel3)
                    <div class="sidebar-panel submenu-panel" id="{{ $submenuId3 }}">
                        <div class="submenu-header">
                            <button type="button" class="submenu-back">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                                <span>{{ $subItem->menuName() }}</span>
                        </div>

                        @foreach($level3 as $lastItem)
                            <a href="{{ asset($lastItem->menuLink()) }}" class="category-item category-link">
                                <div class="category-main">
                                    
                                    <span class="category-name">{{ $lastItem->menuName() }}</span>
                                    @if(isset($lastItem->is_offer) && $lastItem->is_offer)
                                        <span class="offer-badge">OFFER</span>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
@endif

        <!-- =================================
             MENU PANEL
        ================================== -->

        <div class="sidebar-panel"
             id="menuPanel">

        <div class="menu-panel">

    @if($menu = menu('Header Menus'))

        @foreach($menu->subMenus as $mainMenu)

            <a href="{{ asset($mainMenu->menuLink()) }}">
                {{ $mainMenu->menuName() }}
            </a>

        @endforeach

    @endif

</div>

        </div>


        <!-- =================================
             SUBMENU
        ================================== -->

        <div class="submenu-panel"
             id="submenuPanel">

            <div class="submenu-header">

                <button class="submenu-back"
                        id="submenuBack">

                    <i class="bi bi-arrow-left"></i>

                </button>

                <div class="submenu-title"
                     id="submenuTitle">

                    Skin Care

                </div>

            </div>


            <div id="submenuItems"></div>

        </div>


    </div>

</aside>



