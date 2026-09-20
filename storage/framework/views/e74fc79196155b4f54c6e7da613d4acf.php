<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

        <?php echo $__env->yieldContent('title'); ?>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset(general()->favicon())); ?>" />
        <?php echo $__env->yieldContent('SEO'); ?>


       
     <!-- Google Font Outfit-->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
     <link href="../../../fonts.googleapis.com/css2_d6b0264.css" rel="stylesheet" />
     <!-- Font Awesome-->
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('welcome/assets/css/vendors/fontawesome.css')); ?>" />
     <!-- Iconsax icon-->
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('welcome/assets/css/vendors/iconsax.css')); ?>" />
     <!-- Bootstrap css-->
     <link rel="stylesheet" type="text/css" id="rtl-link" href="<?php echo e(asset('welcome/assets/css/vendors/bootstrap.css')); ?>" />
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('welcome/assets/css/vendors/swiper-slider/swiper-bundle.min.css')); ?>" />
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('welcome/assets/css/vendors/toastify.css')); ?>" />
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('welcome/assets/css/style.css')); ?>" />
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('welcome/assets/css/asStyle.css')); ?>" />
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('welcome/assets/css/newStyle.css')); ?>" />
     <link rel="stylesheet" type="text/css" href="<?php echo e(asset('welcome/assets/css/productsdeta.css')); ?>" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
       
        
        <style>
        
        .topText {
    background: #fcf3f7;
    padding: 8px 0;
}

.topText p {
    margin: 0;
    color: #000;
}

.topText p span {
    color: #000;
    font-weight: 500;
}
        
        body {
    background: #f7f7f7 !important;
}

/* Container Position & Limits */
.searchResultAjax {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    width: 100%;
    background: #ffffff;
    z-index: 9999;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    border-radius: 0 0 10px 10px;
    max-height: 380px;
    overflow-y: auto;
    overflow-x: hidden;
}

/* Hover Effect for Search List */
.search-result-item a {
    transition: background 0.2s ease;
}

.search-result-item a:hover {
    background-color: #f8f9fa;
}

/* Scrollbar Customization */
.searchResultAjax::-webkit-scrollbar {
    width: 5px;
}
.searchResultAjax::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 4px;
}

.carousel-item  {

    height: 460px;

}
.logo img {
    width: 85px;
    height: 85px;
    display: block;
    border-radius: 50%;
}
.carousel-item img {
    width: 100%;
    height: 100%;
    display: block !important;
}
        
        .offcanvas-body {
    flex-grow: unset !important
        }
        .offcanvas {
    z-index: 999999;
}
        
        .header-utility-link {
            font-size: 13px;
            text-transform: unset;
        }
        
        
        header .header-1 .main-menu .brand-logo img {
    max-width: 200px !important;
}
        
        
        .nav-menu li {
    position: relative;
}

.nav-submenu {
    display: none;
    position: absolute;
    left: 0;
    top: 100%;
    background: #fff;
    min-width: 200px;
    padding: 0;
}

.site-footer ul li {
    display: block;
}

.shopping-details .offcanvas-body>ul {
    margin: 0;
    padding: 0;
}
.cartUpdate {
    background: #e69c9c70;
    width: 25px;
    height: 25px;
    padding: 10px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.cart-button a.btn.btn_outline {
    background: #e84682;
    color: #fff;
}

.nav-submenu-child {
    display: none;
    position: absolute;
    left: 100%;
    top: 0;
    background: #fff;
    min-width: 200px;
    padding: 0;
}

/* Show on Hover */
.nav-menu li:hover > .nav-submenu {
    display: block;
}

.nav-submenu li:hover > .nav-submenu-child {
    display: block;
}
        
        .mobile-fix-option ul li button {
    border: none;
    background: unset;
}
        
.countPosiMobile span {
    display: block;
}
        
        
        
 .pageContents ul {
    margin-bottom: 20px;
}

.pageContents ul li {
    margin-bottom: 10px;
}

.pageContents {
    padding: 20px 0;
}   
        .pageContents p {
    margin-bottom: 20px;
}
.pageContents ol li {
    display: block;
}
.pageContents ul li {
    display: block;
}
        
        .socialLinks li {
            display: inline-block;
            margin-right: 20px;
        }
        .payment-card-bottom ul li img {
            width: 250px;
        }
        .footer-end {
            display: flex;
            align-items: center;
            height: 100%;
        }
        footer .sub-footer {
            padding: 10px !important;
        }
        .socialLinks {
            
        }
        .footer-end h6 span {
            color: #ff1493;
            font-weight: bold;
            font-size: 17px;
        }
        .footer-end h6 a {
            color: #00d0ff;
            font-weight: bold;
        }
        .home-section-3 ul li a {
           text-align: left;
        }
        
        .home-section-3 ul li a:before {
                background-color: rgba(var(--theme-default));
    content: "";
    height: 1px;
    position: absolute;
    bottom: 15px;
    transition: all .4s ease-in-out;
    width: 0;
        }
        
      .home-section-3 ul li a:hover:before {
            width: 100%;   /* expand to full width on hover */
            left: 0;       /* make it start from left */
        }
        .home-section-3 ul li {
        position: relative;
    }
        
        
        
        
        
        
        
        
        .service-block {
    position: relative;
    padding: 20px;
    background-color: #fff;
    overflow: hidden;
    border: 1px solid transparent;
    transition: all 0.4s ease-in-out;
}

/* top & bottom borders */
.service-block::before,
.service-block::after {
    content: '';
    position: absolute;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #ff1493; /* border color */
    transform: scaleX(0);
    transition: transform 0.4s ease-in-out;
}

.service-block::before {
    top: 0;
    transform-origin: left;
}

.service-block::after {
    bottom: 0;
    transform-origin: right;
}

/* left & right borders */
.service-block span::before,
.service-block span::after {
    content: '';
    position: absolute;
    top: 0;
    height: 100%;
    width: 2px;
    background-color: #007bff; /* border color */
    transform: scaleY(0);
    transition: transform 0.4s ease-in-out;
}

.service-block span::before {
    left: 0;
    transform-origin: top;
}

.service-block span::after {
    right: 0;
    transform-origin: bottom;
}

/* wrap inner content in span for left/right borders */
.service-block span {
    position: relative;
    display: block;
}

/* Hover Animation */
.service-block:hover::before,
.service-block:hover::after {
    transform: scaleX(1);
}

.service-block:hover span::before,
.service-block:hover span::after {
    transform: scaleY(1);
}

footer .footer-content .footer-title h5:before{
    display: none;
}



.category-dropdown select {
    padding-right: 25px;
}






/* Overlay */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    display: none;
    z-index: 9;
}

/* Sidebar */
.sidebar {
    position: fixed;
    top: 0;
    right: -300px;
    width: 280px;
    height: 100%;
    background: #fff;
    color: #fff;
    transition: 0.4s;
    overflow-y: auto;
    z-index: 999;
}

.sidebar.active {
    right: 0;
}

/* Menu */
.menu {
    list-style: none;
    padding: 0;
}

.menu li {
    border-bottom: 1px solid rgba(255,255,255,0.1);
    display: block;
}

.menu li a {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 20px;
    color: #000;
    text-decoration: none;
}

.menu li a:hover {
    background: #ece9e9;
}

/* Submenu */
.submenu {
    display: none;
    background: #fff;
}

.submenu li a {
    padding-left: 35px;
}

/* Toggle Icon */
.toggle-icon {
    font-size: 20px;
}




.footer-logo a img {
    background: #fff;
}



.header-1{
    transition: all 0.4s ease;
}

.sticky-header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #fff;
    z-index: 999;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}



.header2 {
        display: none;
    }



.header-dropdown-menu li+li {
    display: block !important;
}

.mgmt-accordion-btn {
    background-color: #F0F0EF !important;
}




.mobile-bottom-nav{
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    background:#fff;
    border-top:1px solid #ddd;
    display:flex;
    justify-content:space-around;
    align-items:center;
    height:60px;
    z-index:9999;
    box-shadow:0 -2px 10px rgba(0,0,0,0.08);
}

.nav-item{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    color:#222;
    font-size:12px;
    position:relative;
    flex:1;
}

.nav-item .icon,
.cart-wrapper{
    font-size:22px;
    line-height:1;
    margin-bottom:3px;
}

.badge{
    position:absolute;
    top:-6px;
    right:-10px;
    background:#b88a00;
    color:#fff;
    font-size:10px;
    min-width:18px;
    height:18px;
    border-radius:50px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    border:2px solid #fff;
}

.cart-wrapper{
    position:relative;
}

.nav-item.active{
    color:#000;
    font-weight:600;
}

.addToSinBtn {
    background: #f04784 !important;
    color: #fff !important;
}






.floating-contact {
    position: fixed;
    right: 20px;
    bottom: 20px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    z-index: 9999;
}

.floating-contact a {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #fff;
    font-size: 24px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: 0.3s;
}

/* WhatsApp buttons */
.whatsapp-btn {
    background: #25D366;
}

/* Call buttons */
.call-btn {
    background: #007bff;
}

/* Hover effect */
.floating-contact a:hover {
    transform: scale(1.1);
}

/* Optional: better spacing feel for multiple buttons */
.floating-contact a:not(:last-child) {
    margin-bottom: 8px;
}

.messenger-btn {
    background: #0084ff;
}









.floating-contact {
    position: fixed;
    right: 20px;
    bottom: 20px;
    z-index: 9999;
}

.contact-toggle,
.contact-items a {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-decoration: none;
    font-size: 22px;
    cursor: pointer;
}

.contact-toggle {
    background: #010a12;
}

.whatsapp-btn {
    background: #25D366;
}

.call-btn {
    background: #087fcb;
}

.contact-items {
    position: absolute;
    bottom: 70px; /* above the toggle button */
    right: 0;
    display: none;
}

.contact-items a {
    margin-bottom: 10px;
}





/* Hide on Desktop */
@media (min-width: 768px){
    .mobile-bottom-nav{
        max-width:400px;
        left:50%;
        transform:translateX(-50%);
        display: none;
    }
    
    .invoice-header img {
    max-width: 85px;
}
  
}











/* Default Desktop */
#main-nav {
    position: relative;
}

/* Mobile View */
@media (max-width: 991px) {

    #main-nav {
        position: fixed;
        top: 0;
        right: -300px; /* Hidden outside screen */
        width: 280px;
        height: 100%;
        background: #fff;
        overflow-y: auto;
        transition: right 0.4s ease-in-out;
        z-index: 9999;
        box-shadow: -5px 0 15px rgba(0,0,0,0.1);
        padding: 20px;
    }

    /* When Active */
    #main-nav.active {
        right: 0;
    }

    /* Optional Overlay */
    .menu-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.4);
        display: none;
        z-index: 9998;
    }

    .menu-overlay.active {
        display: block;
    }

    .toggle-nav {
        cursor: pointer;
        font-size: 22px;
    }

    /* Mobile Menu Style */
    .nav-menu {
        flex-direction: column;
    }

    .nav-menu li {
        display: block;
        margin-bottom: 10px;
    }

    .nav-submenu,
    .nav-submenu-child {
        display: none;
        padding-left: 15px;
    }
}







@media screen and (max-width: 767px) {
      .floating-contact {
         position: fixed;
    right: 20px;
    bottom: 70px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    z-index: 9999;
    }
    .list-view .card-img-wrap {
   width: 100px !important;
        min-width: 100px !important;
}
.list-view .card-desc {
    display: none !important;
}
    header .header-1 .main-menu .brand-logo {
        width: unset;
    }
    .dashboard-left-sidebar.sticky {
        margin-bottom: 20px;
         display: block;
    }
    .site-header {
        display: none;
    }
     .header2 {
        display: block;
    }
    .main-menu {
        padding: 5px 0;
    }
    .title {
        font-size: 15px;
    }
    
    .sidebar.active h4 {
        margin: 0;
        text-align: center;
        background: #c3c3c3;
        padding: 10px;
    }
    
    .cart-total{
        display:none !important;
    }
    
    
}


@media screen and (max-width: 577px) {
    .notice-content {
    align-items: unset !important;
    gap: unset !important;
    padding-left: unset !important;
            justify-content: unset !important;
}
    .dashboard-left-sidebar.sticky {
    margin-bottom: 20px;
     display: block;
}
    .left-dashboard-show {
    display: none;
}
.dashboard-left-sidebar-close {
    display: none !important;
}
    .sub_header ul li {
    margin-right: 10px;
}
    .moboleSearch {
    display: block;
}
.mobileLogin {
    display: none;
}
    header .header-1 .main-menu .brand-logo img {
    max-width: 75px !important;
}
    header .header-1 .main-menu .sub_header ul {
        display: flex !important;
    }
    
    header .header-1 .main-menu .sub_header ul li .iconsax {
    --Iconsax-Size: 18px;
    --Iconsax-Color: rgba(var(--theme-font-color), 1);
    vertical-align: sub;
}

header .sub_header ul li .cart_qty_cls {
    background: rgba(var(--theme-default));
    border-radius: 20px;
    color: rgba(var(--white), 1);
    font-size: 11px;
    font-weight: 500;
    height: 13px;
    line-height: 12px;
    padding: 0px;
    position: absolute;
    right: -3px;
    text-align: center;
    top: 0px;
    width: 11px;
}
header .sub_header ul .onhover-div .shoping-prize, header .sub_header ul li .shoping-prize {
    font-size: 15px !important;
}


.menu-toggle {
    display: block;
}







}

@media screen and (max-width: 480px) {
    .jficc .ai-agent-chat-avatar-container {
        bottom: 80px !important;
    }
}







.socialLinks{
    list-style: none;
    padding: 0;
    margin: 0;

    display: flex;
    justify-content: center;
    align-items: center;

    gap: 18px;
    flex-wrap: wrap;
}

/* LI RESET */
.socialLinks li{
    margin: 0;
    padding: 0;
}

/* LINK STYLE */
.socialLinks li a{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    text-decoration: none;
    color: white;
    font-size: 14px;
    font-weight: 500;
    gap: 6px;
}

/* ICON BOX */
.socialLinks li a i{
    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 20px;
    line-height: 1;   /* ðŸ”¥ fixes youtube alignment */
    color: white;

    border-radius: 50%;
    transition: 0.3s;
}

/* TEXT */
.socialLinks li a span{
    color: white;
    font-size: 13px;
}

/* HOVER EFFECT */
.socialLinks li a:hover i{
    transform: scale(1.1);
}

/* BRAND COLORS */
.fb1 a i{
    background: #1877F2;
}

.socialLinks li:nth-child(2) a i{
    background: #4a4e52;
}

.socialLinks li:nth-child(3) a i{
    background: #797e83;
}

.socialLinks li:nth-child(4) a i{
    background: #E4405F;
}

.socialLinks li:nth-child(5) a i{
    background: #FF0000;
    margin-top: -14px;
}

/* =========================
   MOBILE RESPONSIVE
========================= */
@media (max-width: 768px) {
    .socialLinks {
    display: flex;
    justify-content: start;
}

    .socialLinks li a i {
    width: 40px;
    height: 40px;
        
    }
}






.product-title a {
    color: #000;
    text-decoration: none;
}


.brand-logo img {
    max-width: 90px;
}
.site-footer {
    background: #000000;
}

.category-item {
    text-decoration: none;
}
.site-footer ul li a {
    color: #fff;
    text-decoration: none;
}

.site-footer p {
    color: #fff;
}




.section-title {
    font-size: 20px;
    font-weight: 500;
}




label.form-check-label {
    margin-top: 10px;}
    
    
    
    
    

    .submenu-back {
    border-bottom: 1px solid #ddd;
    }
    
    .submenu-header span {
    padding: 0 20px;
}



/* ==========================================
   HEADER ACTION AREA
========================================== */

.header-action-list {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 18px;
    margin: 0;
    padding: 0;
    list-style: none;
}


/* ==========================================
   COMMON ACTION
========================================== */

.header-action-item {
    position: relative;
    display: flex;
    align-items: center;
}

.header-action-btn {
    position: relative;

    display: flex;
    align-items: center;
    justify-content: center;

    width: 38px;
    height: 38px;

    padding: 0;

    color: #222;
    background: transparent;

    border: 0;
    text-decoration: none;

    transition: all 0.25s ease;
}

.header-action-btn i {
    font-size: 22px;
    line-height: 1;
}

.header-action-btn:hover {
    color: #e54b83;
}


/* ==========================================
   SEARCH
========================================== */

.mobile-search button {
    cursor: pointer;
}


/* ==========================================
   USER ICON
========================================== */

.user-btn i {
    font-size: 22px;
}


/* ==========================================
   WISHLIST COUNT
========================================== */

.header-count {
    position: absolute;

    top: -2px;
    right: -3px;

    min-width: 17px;
    height: 17px;

    padding: 0 4px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #e84b83;
    color: #fff;

    font-size: 10px;
    font-weight: 600;

    line-height: 1;
}


/* ==========================================
   CART
========================================== */

.cart-header-link {
    display: flex;
    align-items: center;
    gap: 8px;

    color: #222;
    text-decoration: none;

    transition: all 0.25s ease;
}

.cart-header-link:hover {
    color: #222;
}


/* ==========================================
   CART ICON
========================================== */

.cart-icon-wrapper {
    position: relative;

    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;
}

.cart-bag-icon {
    font-size: 22px;
}


/* ==========================================
   CART COUNT
========================================== */

.cart-count {
    position: absolute;

    top: -3px;
    right: -2px;

    min-width: 19px;
    height: 19px;

    padding: 0 5px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #e84b83;
    color: #fff;

    font-size: 10px;
    font-weight: 600;

    line-height: 1;
}


/* ==========================================
   CART TOTAL
========================================== */

.cart-total {
    display: flex;
    align-items: center;

    white-space: nowrap;

    font-size: 14px;
    font-weight: 600;

    color: #333;
}

.cart-total-value {
    margin-left: 3px;
}


/* ==========================================
   USER DROPDOWN
========================================== */

.user-dropdown {
    position: absolute;

    top: calc(100% + 12px);
    right: 0;

    min-width: 150px;

    padding: 8px 0;

    background: #fff;

    border-radius: 8px;

    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);

    z-index: 999;
    display: none;
}

.user-dropdown ul {
    margin: 0;
    padding: 0;

    list-style: none;
}

.user-dropdown li {
    margin: 0;
    padding: 0;
}

.user-dropdown li a {
    display: block;

    padding: 9px 16px;

    color: #333;

    font-size: 13px;

    text-decoration: none;

    transition: all 0.2s ease;
}

.user-dropdown li a:hover {
    background: #f8f8f8;
    color: #e84b83;
}


/* ==========================================
   DESKTOP
========================================== */

@media (min-width: 992px) {

    .header-action-list {
        gap: 20px;
    }

}


/* ==========================================
   TABLET
========================================== */

@media (max-width: 991px) {

    .header-action-list {
        gap: 12px;
    }

    .cart-total {
        font-size: 13px;
    }

}


/* ==========================================
   MOBILE
========================================== */

@media (max-width: 575px) {

    .header-action-list {
        gap: 7px;
    }

    .header-action-btn {
        width: 34px;
        height: 34px;
    }

    .header-action-btn i {
        font-size: 20px;
    }

    .cart-icon-wrapper {
        width: 34px;
        height: 34px;
    }

    .cart-total {
        font-size: 13px;
    }

    .header-count,
    .cart-count {
        min-width: 16px;
        height: 16px;

        font-size: 9px;
    }

}




.btn-add-cart:hover {
    background: #000;
    color: #fff;
}



.product-price {
    font-size: 18px;
    margin-bottom: 15px;
}

.buyNow.buyNowSinBtn.btn {
    padding: 5px 2px;
}
    /* মেইন কন্টেইনার ওভারফ্লো হাইড করবে */
.top-notice {
    width: 100%;
    overflow: hidden;

    padding: 10px 0;
    white-space: nowrap; /* লেখাগুলো এক লাইনে রাখবে */
}

/* আইটেমগুলোকে এক লাইনে সাজাবে এবং অ্যানিমেশন তৈরি করবে */
.notice-content {
    display: inline-flex;
    align-items: center;
    gap: 30px; /* আইটেমগুলোর মধ্যবর্তী দূরত্ব */
    padding-left: 100%; /* ডান পাশ থেকে স্ক্রোল শুরু হওয়ার জন্য */
    animation: smoothMarquee 20s linear infinite; /* ২০ সেকেন্ডে একবার স্ক্রোল শেষ হবে */
}

/* যখন মাউস হোভার করা হবে তখন স্ক্রোল থামবে (ইউজার ফ্রেন্ডলি) */
.top-notice:hover .notice-content {
    animation-play-state: paused;
}

/* প্রতিটি নোটিশ আইটেমের স্টাইল */
.notice-item {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 15px;
}

.notice-arrow {
    color: #d4af37; /* অ্যারো আইকনের কালার */
}

/* স্ক্রোলিংয়ের কি-ফ্রেমস (Keyframes) */
@keyframes smoothMarquee {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%);
    }
}
    
    
    .badge-stock.out {
    background-color: #dc3545; /* Red color for Stock Out */
    color: #fff;
    padding: 4px 8px;
    border-radius: 4px;
}

.product-card {
    margin-bottom: 20px;
}

.mobile-sidebar {
    position: absolute;
    height: unset;
}
    
    
    /* WhatsApp Floating Button Container */
.whatsapp-float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 30px;
    right: 30px;
    background-color: #25d366;
    color: #ffffff;
    border-radius: 50px;
    text-align: center;
    box-shadow: 0px 4px 15px rgba(37, 211, 102, 0.4);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    animation: whatsapp-pulse 2s infinite;
}

/* FontAwesome Icon Size */
.whatsapp-icon {
    font-size: 34px;
}

/* Hover Effect */
.whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0px 6px 20px rgba(37, 211, 102, 0.6);
    color: #ffffff;
}

/* Pulse Animation */
@keyframes whatsapp-pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
    }
    70% {
        box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
    }
}

/* Responsive adjustment for small screens */
@media (max-width: 768px) {
    .whatsapp-float {
        width: 50px;
        height: 50px;
        bottom: 20px;
        right: 20px;
    }
    .whatsapp-icon {
        font-size: 28px;
    }
}
    
    
    
    
    .brand-card:hover .product-image {
    transform: scale(1.1);
}
    
    .product-image {
    transition: 0.5s all;
}
    
    
    .homeOfferGrid img {
    transition: 0.5s all;
}
    .homeOfferGrid {
    overflow: hidden;
}
    
    .homeOfferGrid:hover img {
    transform: scale(1.1);
}


.custom-user-menu {
    list-style: none;
    position: relative;
        display: flex;
}

.custom-user-link {
    display: flex;
    align-items: center;
    gap: 7px;
    text-decoration: none !important;
    color: #222;
    cursor: pointer;
}

.custom-user-link i {
    font-size: 20px;
}

.custom-user-link span {
    font-size: 14px;
        font-weight: bold;
    color: #000;
}

.custom-user-link:hover {
    color: #000;
}


.brand-tagline {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 14px;
    margin-top: 10px;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 1.5px;
    color: #555;
    text-transform: uppercase;
}

.brand-tagline i {
    width: 4px;
    height: 4px;
    border-radius: 50%;
    background: currentColor;
    display: inline-block;
}

@media (max-width: 576px) {
    .brand-tagline {
        gap: 5px;
        font-size: 11px;
        letter-spacing: 1px;
    }

    .brand-tagline i {
        width: 3px;
        height: 3px;
    }
}


.messenger-btn {
    width: 64px;
    height: 65px;
    position: fixed;
    right: 33px;
    bottom: 110px;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    border-radius: 50px;
    background: #0084ff;
    color: #fff;
    text-decoration: none;
    font-size: 25px;
    font-weight: 600;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.18);
    transition: all 0.3s ease;
}

.messenger-btn i {
    font-size: 20px;
}

.messenger-btn:hover {
    color: #fff;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
}

@media (max-width: 576px) {
    
    .colorList.attributeItem {
        margin: 0;
        padding: 0;
    }

    .attributeItem .textItem {
        padding: 8px 10px !important;
    }


    .messenger-btn {
        right: 25px;
        bottom: 90px;
        width: 50px;
    height: 50px;
    }

    .messenger-btn span {
        display: none;
    }

    .messenger-btn i {
        font-size: 22px;
    }
}

.mobileLogin.active .user-dropdown {
    display: block;
}


            
        </style>
        
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "WebSite",
              "name": "<?php echo e(websiteTitle()); ?>",
              "url": "<?php echo e(url('/')); ?>",
              "potentialAction": {
                "@type": "SearchAction",
                "target": "https://shoukhincloset.com/search?search={search_term_string}",
                "query-input": "required name=search_term_string"
              }
            }
            </script>
        
        <?php echo $__env->yieldPushContent('css'); ?>
        
        
        <?php echo general()->script_head; ?>

        
        
    </head>
    
    <body class="">
        
        <?php echo general()->script_body; ?>

        
        
        <!--<span class="cursor"><span class="cursor-move-inner"><span class="cursor-inner"></span></span><span class="cursor-move-outer"><span class="cursor-outer"></span></span></span>-->
        
        <div class="offcanvas offcanvas-top search-details" id="offcanvasTop" tabindex="-1" aria-labelledby="offcanvasTopLabel">
       <div class="offcanvas-header">
         <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
       </div>
       <div class="offcanvas-body theme-scrollbar">
         <div class="container">
           <h3>What are you trying  find? </h3>
           <form action="<?php echo e(route('search')); ?>" class="searchHeaderArea">
               
           <div class="search-box" id="searchHeaderInput"> 
             <input type="search" name="text" name="search" value="<?php echo e(request()->search); ?>" placeholder="I'm looking for" /><i class="iconsax" data-icon="search-normal-2"></i>
           </div>
           </form>
           <h4>Your Search Result </h4>
           <div class="searchResultAjax"></div>
         </div>
       </div>
     </div>
        
        
        
<!--    <div class="floating-contact">-->
        
       
 
<!--    <a href="https://wa.me/8801326245535" class="whatsapp-btn" target="_blank">-->
<!--        <i class="fab fa-whatsapp"></i>-->
<!--    </a>-->

   
<!--    <a href="https://wa.me/8801886600049" class="whatsapp-btn" target="_blank">-->
<!--        <i class="fab fa-whatsapp"></i>-->
<!--    </a>-->


<!--    <a href="tel:+8801326245535" class="call-btn">-->
<!--        <i class="fas fa-phone-alt"></i>-->
<!--    </a>-->


<!--    <a href="tel:+8801886600049" class="call-btn">-->
<!--        <i class="fas fa-phone-alt"></i>-->
<!--    </a>-->

<!--</div>-->


<a href="https://wa.me/8801826814260" class="whatsapp-float" target="_blank" aria-label="Chat on WhatsApp">
    <i class="fa-brands fa-whatsapp whatsapp-icon"></i>
</a>
        
        
        <a href="https://m.me/832727093254907"
   target="_blank"
   rel="noopener noreferrer"
   class="messenger-btn">
    <i class="fa-brands fa-facebook-messenger"></i>
</a>
        
        <div class="offcanvas offcanvas-end shopping-details" id="offcanvasRight" tabindex="-1" aria-labelledby="offcanvasRightLabel">
            <?php echo $__env->make(welcomeTheme().'carts.includes.headerCartBox', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        
        <!--Header Part Include Start-->
        <?php echo $__env->make(general()->theme.'.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!--Main Section Start-->
        <div class="mainContentArea" style="min-height:500px;">
        <?php echo $__env->yieldContent('contents'); ?>
        </div>
        <!--Main Section End-->
        
        
        
         <!--Footer Part Include Start-->
        <?php echo $__env->make(general()->theme.'.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        
        <!-- Global Quick View Modal -->
        <div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="quickViewModalLabel">Product Preview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="quickViewModalBody">
                        <div class="text-center py-5">
                            <div class="spinner-border text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
<!-- jQuery FIRST -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap js-->
     <script src="<?php echo e(asset('welcome/assets/js/bootstrap/bootstrap.bundle.min.js')); ?>"></script>
     <!-- iconsax js -->
     <script src="<?php echo e(asset('welcome/assets/js/iconsax.js')); ?>"> </script>
     <!-- cursor js-->
     <script src="<?php echo e(asset('welcome/assets/js/stats.min.js')); ?>"> </script>
     <!--<script src="<?php echo e(asset('welcome/assets/js/cursor.js')); ?>"> </script>-->
     <script src="<?php echo e(asset('welcome/assets/js/swiper-slider/swiper-bundle.min.js')); ?>"></script>
     <script src="<?php echo e(asset('welcome/assets/js/swiper-slider/swiper-custom.js')); ?>"></script>
     <script src="<?php echo e(asset('welcome/assets/js/countdown.js')); ?>"></script>
     <script src="<?php echo e(asset('welcome/assets/js/newsletter.js')); ?>"></script>
     <script src="<?php echo e(asset('welcome/assets/js/skeleton-loader.js')); ?>"></script>
     <!-- touchspin-->
     <script src="<?php echo e(asset('welcome/assets/js/touchspin.js')); ?>"></script>
     <!-- cookie js-->
     <script src="<?php echo e(asset('welcome/assets/js/cookie.js')); ?>"></script>
     <!-- tost js -->
     <script src="<?php echo e(asset('welcome/assets/js/toastify.js')); ?>"></script>
     <script src="<?php echo e(asset('welcome/assets/js/theme-setting.js')); ?>"></script>
     <!-- Theme js-->
     <script src="<?php echo e(asset('welcome/assets/js/script.js')); ?>"></script>
     
     
     
     
     
     
     
     
     
     <script>

// $(document).ready(function () {



//     const submenuData = {

//         "skin-care": {
//             title: "Skin Care",
//             items: [
//                 "Face Wash",
//                 "Cleanser",
//                 "Toner",
//                 "Serum",
//                 "Moisturizer",
//                 "Sunscreen",
//                 "Face Cream",
//                 "Eye Care"
//             ]
//         },

//         "body-care": {
//             title: "Body, Hand & Foot Care",
//             items: [
//                 "Body Wash",
//                 "Body Lotion",
//                 "Hand Care",
//                 "Foot Care",
//                 "Body Scrub",
//                 "Body Cream"
//             ]
//         },

//         "hair-care": {
//             title: "Hair, Eye, Lip & Teeth Care",
//             items: [
//                 "Shampoo",
//                 "Conditioner",
//                 "Hair Oil",
//                 "Hair Treatment",
//                 "Lip Care",
//                 "Eye Care",
//                 "Teeth Care"
//             ]
//         },

//         "baby-product": {
//             title: "Baby Product",
//             items: [
//                 "Baby Shampoo",
//                 "Baby Lotion",
//                 "Baby Cream",
//                 "Baby Wash",
//                 "Baby Care"
//             ]
//         },

//         "lifestyle": {
//             title: "Lifestyle",
//             items: [
//                 "Health",
//                 "Beauty",
//                 "Wellness",
//                 "Daily Essentials"
//             ]
//         },

//         "food": {
//             title: "Food & Supplement",
//             items: [
//                 "Vitamin",
//                 "Supplement",
//                 "Healthy Food",
//                 "Protein",
//                 "Nutrition"
//             ]
//         },

//         "makeup": {
//             title: "Makeup",
//             items: [
//                 "Foundation",
//                 "Concealer",
//                 "Lipstick",
//                 "Mascara",
//                 "Eyeliner",
//                 "Blush"
//             ]
//         },

//         "personal-care": {
//             title: "Personal Care",
//             items: [
//                 "Deodorant",
//                 "Feminine Care",
//                 "Oral Care",
//                 "Shaving",
//                 "Bath & Body"
//             ]
//         },

//         "accessories": {
//             title: "Accessories",
//             items: [
//                 "Beauty Tools",
//                 "Hair Accessories",
//                 "Makeup Accessories",
//                 "Travel Accessories"
//             ]
//         }

//     };




//     $("#openSidebar").on("click", function () {

//         $("#mobileSidebar").addClass("active");

//         $("#sidebarOverlay").fadeIn(250);

//         $("body").css("overflow", "hidden");

//     });




//     function closeSidebar() {

//         $("#mobileSidebar").removeClass("active");

//         $("#sidebarOverlay").fadeOut(250);

//         $("body").css("overflow", "");

//         // Reset submenu
//         $("#submenuPanel").removeClass("active");

//     }


//     $("#closeSidebar").on("click", function () {

//         closeSidebar();

//     });


//     $("#sidebarOverlay").on("click", function () {

//         closeSidebar();

//     });




//     $(".sidebar-tab").on("click", function () {

//         let tab = $(this).data("tab");

//         $(".sidebar-tab").removeClass("active");

//         $(this).addClass("active");


//         if (tab === "categories") {

//             $("#categoriesPanel").addClass("active");

//             $("#menuPanel").removeClass("active");

//         }


//         if (tab === "menu") {

//             $("#menuPanel").addClass("active");

//             $("#categoriesPanel").removeClass("active");

//         }

//     });



//     $(".category-item[data-submenu]").on("click", function () {

//         let submenuId = $(this).data("submenu");

//         let submenu = submenuData[submenuId];

//         if (!submenu) {
//             return;
//         }




//         $("#submenuTitle").text(submenu.title);




//         $("#submenuItems").html("");




//         $.each(submenu.items, function (index, item) {

//             $("#submenuItems").append(`

//                 <div class="submenu-item">

//                     <span>${item}</span>

//                     <i class="bi bi-chevron-right"></i>

//                 </div>

//             `);

//         });




//         $("#submenuPanel").addClass("active");

//     });




//     $("#submenuBack").on("click", function () {

//         $("#submenuPanel").removeClass("active");

//     });


// });

</script>


     
     
     
     <script>
$(document).ready(function () {
    
    
    $('.user-action .user-btn').on('click', function(e) {
        e.preventDefault(); // লিঙ্ক রিফ্রেশ হওয়া বন্ধ করবে
        $(this).closest('.user-action').toggleClass('active');
    });

    // স্ক্রিনের অন্য কোথাও ক্লিক করলে ড্রপডাউন বন্ধ করার জন্য
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.user-action').length) {
            $('.user-action').removeClass('active');
        }
    });
    
    
    // Open Mobile Sidebar
    $("#openSidebar").on("click", function () {
        $("#mobileSidebar").addClass("active");
        $("#sidebarOverlay").fadeIn(250);
        $("body").css("overflow", "hidden");
    });

    // Close Mobile Sidebar
    function closeSidebar() {
        $("#mobileSidebar").removeClass("active");
        $("#sidebarOverlay").fadeOut(250);
        $("body").css("overflow", "");
        $(".submenu-panel").removeClass("active");
        $("#categoriesPanel").addClass("active");
        $(".sidebar-tab").removeClass("active");
        $('.sidebar-tab[data-tab="categories"]').addClass("active");
    }

    $("#closeSidebar, #sidebarOverlay").on("click", closeSidebar);

    // Top Tabs Toggle
    $(document).on("click", ".sidebar-tab", function () {
        let tab = $(this).data("tab");
        $(".sidebar-tab").removeClass("active");
        $(this).addClass("active");

        $(".sidebar-panel").removeClass("active");
        if (tab === "categories") {
            $("#categoriesPanel").addClass("active");
        } else if (tab === "menu") {
            $("#menuPanel").addClass("active");
        }
    });

    // Open Submenu (Level 2 & 3)
    $(document).on("click", ".category-item.has-submenu", function (e) {
        e.preventDefault();
        e.stopPropagation();

        let submenuId = $(this).attr("data-submenu");
        if (!submenuId) return;

        let $submenu = $("#" + $.escapeSelector(submenuId));
        if ($submenu.length) {
            $(".sidebar-panel").removeClass("active");
            $submenu.addClass("active");
        }
    });

    // Back Button Logic
    $(document).on("click", ".submenu-back", function (e) {
        e.preventDefault();
        e.stopPropagation();

        let $currentPanel = $(this).closest(".submenu-panel");
        let currentId = $currentPanel.attr("id");
        $currentPanel.removeClass("active");

        let $parentItem = $('.category-item[data-submenu="' + $.escapeSelector(currentId) + '"]');
        if ($parentItem.length) {
            $parentItem.closest(".sidebar-panel").addClass("active");
        } else {
            $("#categoriesPanel").addClass("active");
        }
    });

    // Direct Links Navigation
    $(document).on("click", ".category-link", function (e) {
        e.stopPropagation();
    });
});
</script>
     
     


<script>
$(document).ready(function () {
    $('.contact-toggle').click(function () {
        $('.contact-items').fadeToggle(300);
        $(this).find('i').toggleClass('fa-comments fa-times');
    });
});
</script>

<script>

    $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
        $('.headerMain').addClass('sticky-header');
    } else {
        $('.headerMain').removeClass('sticky-header');
    }
});

</script>


<script>
    $(document).ready(function(){

    // Open Sidebar
    $(".menu-toggle").click(function(){
        $(".sidebar").addClass("active");
        $(".overlay").fadeIn();
    });

    // Close Sidebar
    $(".overlay").click(function(){
        $(".sidebar").removeClass("active");
        $(".overlay").fadeOut();
    });

    // Submenu Toggle
    $(".has-sub > a").click(function(e){
        e.preventDefault();

        var submenu = $(this).next(".submenu");
        var icon = $(this).find(".toggle-icon");

        submenu.slideToggle(300);

        icon.text(icon.text() == "+" ? "-" : "+");
    });

});
</script>


<script>
    $(document).ready(function(){

    $(".filter-button").click(function(e){
        e.preventDefault();
        e.stopPropagation();

        $(".custom-accordion.theme-scrollbar.left-box")
            .toggleClass("open");
    });

    $(document).click(function(){
        $(".custom-accordion.theme-scrollbar.left-box")
            .removeClass("open");
    });

    $(".custom-accordion").click(function(e){
        e.stopPropagation();
    });

});
</script>


    <script>
    $(document).ready(function(){
    
        $('#toggle-nav').click(function(){
            $('#sm-horizontal').toggleClass('open');
            $('#menu-overlay').toggleClass('open');
        });
    
        $('#menu-overlay').click(function(){
            $('#sm-horizontal').removeClass('open');
            $(this).removeClass('open');
        });
    
    });
</script>


        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.quickview-trigger', function(e) {
                    e.preventDefault();
                    
                    let url = $(this).data('url');
                    let modalBody = $('#quickViewModalBody');
            
                    // Reset with Spinner Loader
                    modalBody.html('<div class="text-center py-5"><div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div></div>');
            
                    // Fetch Product Data via AJAX
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "html",
                        success: function(response) {
                            modalBody.html(response);
                        },
                        error: function() {
                            modalBody.html('<p class="text-center text-danger py-4">Failed to load product details. Please try again.</p>');
                        }
                    });
                });
            });
            
            $('.hero-sectionClick').on('click', function (e) {
                e.preventDefault();
            
                var homeUrl = '/'; // or "<?php echo e(url('/')); ?>"
                var targetId = 'offers';
                if (window.location.pathname === '/' || window.location.pathname === '/home') {
            
                    var target = $('#' + targetId);
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 240
                        }, 300);
                    }
                } else {
                    window.location.href = homeUrl + '#' + targetId;
                }
            });
        
            (function () {
                
                $('.hamburger-menu').on('click', function() {
                    $('.bar').toggleClass('animate');
                $('.mobile-menu').toggleClass('active');
                return false;
                });
                
                $('.countPosiMobile.Bar').on('click', function() {
                    $('.bar').toggleClass('animate');
                $('.mobile-menu').toggleClass('active');
                return false;
                });
                
              $('.has-children').on ('click', function() {
                       $(this).children('ul').slideToggle('slow', 'swing');
                   $('.icon-arrow').toggleClass('open');
                });
                
             
        $(document).on('click', function(event) {
        if (!$(event.target).closest('.searchHeaderArea').length) {
            $('.searchResultAjax').empty();
            }
        });
                
                
            })();
        </script>
     
     
     <script>
//  Fixed style null issue
const scrollTopBtn = document.getElementById("scrollTop");

if (scrollTopBtn) {

    window.addEventListener("scroll", function () {
        if (window.scrollY > 200) {
            scrollTopBtn.style.display = "flex";
        } else {
            scrollTopBtn.style.display = "none";
        }
    });

    scrollTopBtn.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

}
</script>
        

        <script>
            function openSearch() {
                document.getElementById("myOverlay").style.display = "block";
            }

            function closeSearch() {
                document.getElementById("myOverlay").style.display = "none";
            }
        </script>

        <script type="text/javascript">
        /** CSRF Token Header Set **/
            $.ajaxSetup({
        	    headers: {
        	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	    }
        	});
        	
        // home page banner slider script start
        // Fix applied for missing property
        const headerTopPart = document.querySelector(".headerTopPart")
            if(headerTopPart){
            
              $(".headerTopPart").slick({
                dots: false,
                autoplay: true,
                autoplaySpeed: 5000,
                infinite: true,
                speed: 1500,
                prevArrow: '',
                nextArrow: '',
                slidesToShow: 1,
                slidesToScroll: 1,
                
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        },
                    },
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ],
            });
            }
            
            
          // Fix applied for missing property
          const feaCtgSlick = document.querySelector(".feaCtgSlick")
          
          if(feaCtgSlick){
          
            $(".feaCtgSlick").slick({
                autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                infinite: true,
                speed: 300,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                slidesToShow: 8,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ],
            });
          }
        </script>

        <script type="text/javascript">
        // Fix applied for missing property
        const brandSlick = document.querySelector(".brandSlick")
        
        if(brandSlick){
            
        
            $(".brandSlick").slick({
                autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                infinite: true,
                speed: 300,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                slidesToShow: 8,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true,
                        },
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ],
            });
        }
        </script>

        <script>
            $(document).ready(function(){
                
                var searchTimer;

                $(document).on("input", "#searchHeaderInput input", function () {
                    var search = $(this).val().trim();
                    var $resultBox = $(".searchResultAjax");
                
                    clearTimeout(searchTimer);
                
                    if (search.length >= 2) {
                        searchTimer = setTimeout(function () {
                            $.ajax({
                                url: "<?php echo e(route('search')); ?>",
                                type: 'GET',
                                dataType: 'json',
                                data: { 'search': search },
                                beforeSend: function () {
                                    $resultBox.css('opacity', '0.6');
                                },
                                success: function (data) {
                                    $resultBox.html(data.searchProducts).css('opacity', '1').show();
                                },
                                error: function (xhr) {
                                    console.error("Search error:", xhr);
                                    $resultBox.css('opacity', '1');
                                }
                            });
                        }, 300); // 300ms Delay
                    } else {
                        $resultBox.empty().hide();
                    }
                });
                
                $(document).on("click", function (e) {
                    if (!$(e.target).closest("#searchHeaderInput, .searchResultAjax").length) {
                        $(".searchResultAjax").hide();
                    }
                });
                
                
                 $("#district").on("change", function(){
                    var id = $(this).val();
                      if(id==''){
                       $('#city').empty().append('<option value="">No City</option>');
                      }
                      var url ='<?php echo e(url('geo/filter')); ?>' + '/'+id;
                      $.get(url,function(data){
                        $('#city').empty().append(data.geoData);  
                      });   
                });
                
                $(document).on("click", ".ajaxaddToCart", function () {
                  var that = $( this );
                  var url = that.data('url');
                    that.addClass('loading');
                    $.ajax({
                      url: url,
                      type: 'GET',
                      dataType: 'json',
                      cache: false,
                    })
                    .done(function(data) {
                        that.removeClass('loading');
                        if(data.success){
                            $(".cartCounter").empty().append(data.cartCount);
                            $(".cartTotal").empty().append(data.cartTotal);
                            $(".shopping-details").empty().append(data.cartViews);
                        }
                        that.empty().append('Cart Added');
                        setTimeout(function() {
                            that.empty().append('Add to Cart');
                        }, 2000);
                        
                    })
                    .fail(function() {
                      // alert("error");
                      that.removeClass('loading');
                    });
                    
                });
                
                 $(document).on('click','.cartUpdate',function(){
    
                      var url = $(this).data('url');
                      var Dcharge =parseInt($('.cartDeliveryCharge').text());
        
                      if (isNaN(Dcharge)){
                        Dcharge =0;
                      }
        
                        $.ajax({
                          url: url,
                          type: 'GET',
                          dataType: 'json',
                          cache: false,
                        })
                        .done(function(data) {
                            $(".cartItemsList").empty().append(data.cartItems);
                            $(".shopping-details").empty().append(data.cartViews);
                            $(".cartCounter").empty().append(data.cartCount);
                            $(".cartTotal").empty().append(data.cartTotal);
                        })
                        .fail(function() {
                          // alert("error");
                        });
                    
                });
                
                
                $(document).on('click','.wishlistCompareUpdate',function(){
                  var that = $( this );
                  var url = that.data('url');
                  that.addClass('loading');
                  $.ajax({
                      url: url,
                      type: 'GET',
                      dataType: 'json',
                      cache: false,
                    })
                    .done(function(data) {
                        that.removeClass('loading');
                        if(data.success)
                           {
                            $(".viewItemsLists").empty().append(data.itemsView);
    
                            if(data.status==true){
                              that.find('.fa-heart').toggleClass('fa-regular fa-solid');
                            }else{
                              that.find('.fa-heart').toggleClass('fa-solid fa-regular');
                            }
                            if(data.statusType==0){
                              $(".wlcounter").empty().append(data.count);
                              if(data.alert==true){
                                alert('Wishlist Are Full. Cannot Added Over 48 Items.');
                              }
                            }else{
                              $(".cpcounter").empty().append(data.count);
                              if(data.alert==true){
                                alert('Compare Are Full. Cannot Added Over 20 Items.');
                              }
                            }
    
                           }
                    })
                    .fail(function() {
                      // alert("error");
                      that.removeClass('loading');
                    });
    
                });
                
                
            
                $(".categoryListMain").hide();
                $(".navCtg").click(function(){
                    $(".categoryListMain").toggle("slow");
                });
                
            });
        </script>
        
        <script>
            $(document).on('click','.subsriberbtm',function(e){
              e.preventDefault();
               var url = $('#subscirbeForm').data('url');
               var subscribeEmail =$('#subscribeEmail').val();
                    $.ajax({
                      url: url,
                      type: 'POST',
                      dataType: 'json',
                      data: {email : subscribeEmail},
                      cache: false,
                    })
                    .done(function(data) {
                        if(data.success)
                          {
                            $("#subscribeemailMsg").html("<span style='color: #339642;padding: 5px 15px;margin-bottom: 10px;display: inline-block;'>"+ data.message +"</span>");
                            $("#subscribeEmail").css("border","");
                            $("#subscirbeForm")[0].reset();
                          }else{
                            $("#subscribeemailMsg").html("<span style='color: #e52734;padding: 5px 15px;margin-bottom: 10px;display: inline-block;'>"+ data.message +"</span>");
                          }
                    })
                    .fail(function() {
                      // alert("error");
                    });
        
            });
        
            $("#subscribeEmail").keyup(function(){
                  if(validateEmail()){
                      $("#subscribeEmail").css("border","2px solid #339642");
                      //$("#subscribeemailMsg").html("<span style='background: #339642;padding: 5px 15px;'>Validated Email</span>");
                  }else{
                        var subscribeEmail=$("#subscribeEmail").val();
                       if(subscribeEmail==''||subscribeEmail==null || subscribeEmail=='undefined'){
                            //$("#subscribeemailMsg").html("<span style='background: #e52734;padding: 5px 15px;'>Please Get a Verified Email</span>");
                        }else{
                          $("#subscribeEmail").css("border","2px solid #e52734");
                          $("#subscribeemailMsg").html("");
                        }
                  }
              });
        
            function validateEmail(){
                  var subscribeEmail=$("#subscribeEmail").val();
        
                   var reg =/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                   if(reg.test(subscribeEmail)){
                      return true;
                   }else{
                      return false;
              }
        
            }
        </script>
        
        <?php echo $__env->yieldPushContent('js'); ?>
        
    </body>
</html>
<?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome/layouts/app.blade.php ENDPATH**/ ?>