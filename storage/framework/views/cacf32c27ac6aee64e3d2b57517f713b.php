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


       <?php if(offerNotes()->count() > 0): ?>
                    <div class="topText text-center headerTopPart">
                        <marquee behavior="scroll" direction="left" scrollamount="5" onmouseover="this.stop();" onmouseout="this.start();">
                        <?php $__currentLoopData = offerNotes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo $note->content; ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </marquee>
                    </div>
                    <?php endif; ?>

<!-- =========================
     MAIN HEADER
========================= -->

<header class="main-header">

    <div class="container">

        <div class="header-main-inner">

            <!-- Logo -->

            <a href="<?php echo e(route('index')); ?>" class="logo">

              <img src="<?php echo e(asset(general()->logo())); ?>" alt="<?php echo e(general()->title); ?>" />
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
                         <?php echo e(general()->mobile); ?>

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

    <!--            <?php if(Auth::check()): ?>-->

    <!--                <li style="width: 100%;">-->
    <!--                    <a href="<?php echo e(route('customer.dashboard')); ?>">-->
    <!--                        Dashboard-->
    <!--                    </a>-->
    <!--                </li>-->

    <!--            <?php else: ?>-->

    <!--                <li style="width: 100%;" >-->
    <!--                    <a href="<?php echo e(route('login')); ?>">-->
    <!--                        Login-->
    <!--                    </a>-->
    <!--                </li>-->

    <!--                <li style="width: 100%;" >-->
    <!--                    <a href="<?php echo e(route('register')); ?>">-->
    <!--                        Register-->
    <!--                    </a>-->
    <!--                </li>-->

    <!--            <?php endif; ?>-->

    <!--        </ul>-->
    <!--    </div>-->

    <!--</li>-->
    
    
<li class="custom-user-menu">

    <?php if(Auth::check()): ?>

        <a href="<?php echo e(route('customer.dashboard')); ?>" class="custom-user-link">
            <i class="fa-regular fa-user"></i>
            <span>Dashboard</span>
        </a>

    <?php else: ?>

        <a href="<?php echo e(route('login')); ?>" class="custom-user-link" style="margin-right: 5px;">
            <i class="fa-regular fa-user"></i>
            <span>Login</span>
        </a>
        /
        <a href="<?php echo e(route('register')); ?>" class="custom-user-link" style="margin-left: 5px;">
            <span>Register</span>
        </a>

    <?php endif; ?>

</li>
    
    
    
    <li class="header-action-item wishlist-action">
        <a href="<?php echo e(route('myWishlist')); ?>" class="header-action-btn">

            <i class="fa-regular fa-heart"></i>

            <span class="header-count wlcounter">
                <?php if(isset($wlCount)): ?>
                    <?php echo e($wlCount); ?>

                <?php else: ?>
                    0
                <?php endif; ?>
            </span>

        </a>
    </li>


    
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
                    <?php if(isset($cartsCount)): ?>
                        <?php echo e($cartsCount); ?>

                    <?php else: ?>
                        0
                    <?php endif; ?>
                </span>

            </div>

            <span class="cart-total">
                <span class="cart-total-value cartTotal">
                   
                       <?php if(isset($cartTotalPrice)): ?> <?php echo e(priceFullFormat($cartTotalPrice)); ?><?php endif; ?> 
                  
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

        
        
        
<?php if($menu = menu('Category Menus')): ?>
    <div class="sidebar-panel active" id="categoriesPanel">

        
        <div class="shop-now">
            <i class="bi bi-truck shop-now-icon"></i>
            <span class="shop-now-text">Shop Now</span>
            <span class="shop-now-badge">সরাসরি শপিং ক্রেডিট নেন</span>
        </div>

        
        <?php $__currentLoopData = $menu->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $level2 = $item->subMenus;
                $hasLevel2 = $level2 && $level2->count() > 0;
                $submenuId = 'submenu-' . $item->id;
            ?>

            <?php if($hasLevel2): ?>
                <div class="category-item has-submenu" data-submenu="<?php echo e($submenuId); ?>">
                    <div class="category-main">
                        <span class="category-icon">
                            <img src="<?php echo e(asset($item->image())); ?>" loading="lazy">
                        </span>
                        <span class="category-name"><?php echo e($item->menuName()); ?></span>
                        <?php if(isset($item->is_offer) && $item->is_offer): ?>
                            <span class="offer-badge">OFFER</span>
                        <?php endif; ?>
                    </div>
                    <div class="category-arrow">
                        <i class="bi bi-chevron-right"></i>
                    </div>
                </div>
            <?php else: ?>
                <a href="<?php echo e(asset($item->menuLink())); ?>" class="category-item category-link">
                    <div class="category-main">
                        
                        <span class="category-name"><?php echo e($item->menuName()); ?></span>
                        <?php if(isset($item->is_offer) && $item->is_offer): ?>
                            <span class="offer-badge">OFFER</span>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <?php $__currentLoopData = $menu->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $level2 = $item->subMenus;
            $hasLevel2 = $level2 && $level2->count() > 0;
            $submenuId = 'submenu-' . $item->id;
        ?>

        <?php if($hasLevel2): ?>
            
            <div class="sidebar-panel submenu-panel" id="<?php echo e($submenuId); ?>">
                <div class="submenu-header">
                    <button type="button" class="submenu-back">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                        <span><?php echo e($item->menuName()); ?></span>
                </div>

                <?php $__currentLoopData = $level2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $level3 = $subItem->subMenus;
                        $hasLevel3 = $level3 && $level3->count() > 0;
                        $submenuId3 = 'submenu-' . $item->id . '-' . $subItem->id;
                    ?>

                    <?php if($hasLevel3): ?>
                        <div class="category-item has-submenu" data-submenu="<?php echo e($submenuId3); ?>">
                            <div class="category-main">
                               
                                <span class="category-name"><?php echo e($subItem->menuName()); ?></span>
                                <?php if(isset($subItem->is_offer) && $subItem->is_offer): ?>
                                    <span class="offer-badge">OFFER</span>
                                <?php endif; ?>
                            </div>
                            <div class="category-arrow">
                                <i class="bi bi-chevron-right"></i>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?php echo e(asset($subItem->menuLink())); ?>" class="category-item category-link">
                            <div class="category-main">
                               
                                <span class="category-name"><?php echo e($subItem->menuName()); ?></span>
                                <?php if(isset($subItem->is_offer) && $subItem->is_offer): ?>
                                    <span class="offer-badge">OFFER</span>
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <?php $__currentLoopData = $level2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $level3 = $subItem->subMenus;
                    $hasLevel3 = $level3 && $level3->count() > 0;
                    $submenuId3 = 'submenu-' . $item->id . '-' . $subItem->id;
                ?>

                <?php if($hasLevel3): ?>
                    <div class="sidebar-panel submenu-panel" id="<?php echo e($submenuId3); ?>">
                        <div class="submenu-header">
                            <button type="button" class="submenu-back">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                                <span><?php echo e($subItem->menuName()); ?></span>
                        </div>

                        <?php $__currentLoopData = $level3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(asset($lastItem->menuLink())); ?>" class="category-item category-link">
                                <div class="category-main">
                                    
                                    <span class="category-name"><?php echo e($lastItem->menuName()); ?></span>
                                    <?php if(isset($lastItem->is_offer) && $lastItem->is_offer): ?>
                                        <span class="offer-badge">OFFER</span>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

        <!-- =================================
             MENU PANEL
        ================================== -->

        <div class="sidebar-panel"
             id="menuPanel">

        <div class="menu-panel">

    <?php if($menu = menu('Header Menus')): ?>

        <?php $__currentLoopData = $menu->subMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mainMenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <a href="<?php echo e(asset($mainMenu->menuLink())); ?>">
                <?php echo e($mainMenu->menuName()); ?>

            </a>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>

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



<?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome/layouts/header.blade.php ENDPATH**/ ?>