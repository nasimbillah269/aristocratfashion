@extends(welcomeTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Cart Items')}}</title>
@endsection 
@section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle('Cart Items')}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('carts')}}" />
<link rel="canonical" href="{{route('carts')}}">
@endsection 
@push('css')

<style>
    /* ===== GLOBAL OVERFLOW SAFEGUARD ===== */
    html, body {
        overflow-x: hidden !important;
        max-width: 100vw;
    }

    * {
        box-sizing: border-box;
    }

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    textarea:focus, input:focus{
    outline: none;
    }
    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
    .section {
        background-color: #f9f9f9;
    }

    .table-responsive.shop_cart_table {
        background-color: #ffff;
        padding: 30px;
    }
    .cartItemsList {
        padding: 50px 0;
    }
    .shop_cart_table tr {
        vertical-align: middle;
    }
    .shop_cart_table tr td.product-thumbnail {
        padding: 20px 0;
    }
    .shop_cart_table tr td.product-name a {
        color: #292b2c;
        transition: all .3s ease-in-out;
        font-size: 15px;
    }
    .shop_cart_table tr td.product-price {
        font-weight: 600;
    }
    .shop_cart_table tr td.product-subtotal {
        font-weight: 600;
    }
    .quantity .plus {
        background-color: #eee;
        border-radius: 50px;
        cursor: pointer;
        border: 0;
        padding: 0;
        width: 37px;
        font-size: 24px;
        height: 37px;
    }
    .quantity .minus  {
        background-color: #eee;
        border-radius: 50px;
        cursor: pointer;
        border: 0;
        padding: 0;
        width: 37px;
        font-size: 24px;
        height: 37px;
    }
    .quantity .qty {
        width: 55px;
        height: 36px;
        border: 1px solid #ddd;
        background-color: transparent;
        text-align: center;
        font-size: 18px;
    }
    .cartItemsList .form-control:focus {
        box-shadow: none;
    }
    .coupon input {
        padding: 10px 0;
        margin: 0;
        border-right: 0;
    }
    .coupon button {
        padding: 11px 25px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        background-color: #e92734;
        color: #fff;
        border: 1px solid #e92734 ;
    }
    .coupon button:hover {
        background-color: #fff;
        color: #e92734;
        
    }
    
    .shipping_calculator {
        border: 1px solid lightgrey;
        padding: 30px;
        background-color: #fff;
    }
    .cart-total {
        padding: 30px;
        background-color: #fff;
    }
    .shipping_calculator h6 {
        font-weight: bold;
    }
    .shipping_calculator button {
        background-color: #e92734;
        color: #fff;
        padding: 8px 32px;
        border: 1px solid #e92734;
    }
    .shipping_calculator button:hover {
        background-color: #fff;
        color: #e92734;
    }
    .btn-chekout {
        background-color: #3ca549;
        padding: 9px 34px;
        border: 1px solid #3ca549;
    }
    .btn-chekout:hover {
        background-color: #fff;
        color: #e92734;
    }
    
    .cart_empty {
        width: 40%;
        margin: 0 auto;
        text-align: center;
        background-color: #fff;
        padding: 56px 0;
        box-shadow: 0px 0px 0px 2px #f5f5f5;
        
    }
    .cart_empty h4 {
        margin-bottom: 20px;
        font-weight: bold;
    }
.cart-items {
    background-color: rgb(255 255 255);
}
.cart-body ul {
    margin: 0;
    padding: 0;
}

.coupon-box ul {
    margin: 0;
    padding: 0;
}

.checkout-steps-bar {
    background-color: #e6518b; /* ছবির মতো হুবহু পিঙ্ক শেড */
    border-radius: 8px; /* কর্নারগুলো রাউন্ড করার জন্য */
    padding: 22px 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 12px;
    width: 100%;
    box-sizing: border-box;
}

.step-item {
    color: #ffffff;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.step-arrow {
    color: #ffffff;
    font-size: 16px;
    font-weight: 400;
    opacity: 0.9;
}
.table thead tr th {
    background-color: rgb(255 255 255);
}
.cart-box a {
    color: #000;
    font-weight: 200;
    text-decoration: none;
    font-size: 15px;
    display: block;
}

/* ===== MOBILE RESPONSIVE CART TABLE ===== */
@media (max-width: 767px) {

    .container.cartItemsList,
    .custom-container.cartItemsList {
        padding-left: 10px !important;
        padding-right: 10px !important;
        overflow-x: hidden;
        max-width: 100%;
    }

    .table-responsive.theme-scrollbar {
        overflow-x: hidden !important;
        width: 100%;
    }

    #cart-table {
        width: 100% !important;
        table-layout: fixed;
    }

    #cart-table thead {
        display: none;
    }

    #cart-table tbody tr {
        display: block;
        width: 100%;
        max-width: 100%;
        border: 1px solid #eee;
        border-radius: 8px;
        margin-bottom: 15px;
        padding: 10px;
        box-sizing: border-box;
        background: #fff;
        overflow: hidden;
    }

    #cart-table tbody td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-align: right;
        padding: 6px 0;
        border: none;
        border-bottom: 1px solid #f5f5f5;
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        font-size: 13px;
    }

    #cart-table tbody td:last-child {
        border-bottom: none;
    }

    #cart-table tbody td[data-label]:not([data-label="Product"]):not([data-label=""])::before {
        content: attr(data-label);
        font-weight: 600;
        color: #333;
        text-align: left;
        flex: 0 0 auto;
        font-size: 13px;
    }

    #cart-table tbody td[data-label="Product"] {
        display: block;
        text-align: left;
        border-bottom: 1px solid #f5f5f5;
        width: 100%;
        overflow: hidden;
    }

    .cart-box {
        display: flex;
        align-items: center;
        gap: 8px;
        width: 100%;
        max-width: 100%;
    }

    .cart-box img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        flex-shrink: 0;
    }

    .cart-box div {
        min-width: 0;
        overflow: hidden;
    }

    .cart-box h5 {
        font-size: 13px;
        margin-bottom: 2px;
        white-space: normal;
        word-break: break-word;
    }

    /* Price cell — allow value to wrap instead of overflowing */
    #cart-table tbody td[data-label="Price"],
    #cart-table tbody td[data-label="Total"] {
        flex-wrap: wrap;
    }

    #cart-table tbody td[data-label="Price"] > *:not(:first-child),
    #cart-table tbody td[data-label="Total"] {
        text-align: right;
        word-break: break-word;
    }

    .offer-btn {
        font-size: 10px;
        white-space: nowrap;
    }

    /* Quantity controls — shrink to guaranteed fit */
    #cart-table .quantity {
        display: flex;
        align-items: center;
        gap: 4px;
        flex-shrink: 0;
    }

    #cart-table .quantity .plus,
    #cart-table .quantity .minus {
        width: 26px;
        height: 26px;
        min-width: 26px;
        font-size: 14px;
        flex-shrink: 0;
    }

    #cart-table .quantity input {
        width: 32px;
        height: 26px;
        min-width: 32px;
        font-size: 13px;
        padding: 0;
        flex-shrink: 0;
    }

    #cart-table tbody td[data-label=""] {
        justify-content: flex-end;
    }

    .deleteButton {
        font-size: 15px;
    }

    /* Sidebar cart summary */
    .cart-items {
        margin-top: 20px;
        padding: 15px;
        width: 100%;
        max-width: 100%;
        overflow: hidden;
    }

    .checkout-steps-bar {
        padding: 12px 8px;
        gap: 4px;
        flex-wrap: nowrap;
        max-width: 100%;
        overflow: hidden;
    }

    .step-item {
        font-size: 9px;
        letter-spacing: 0px;
    }

    .step-arrow {
        font-size: 11px;
    }

    .row.g-4 {
        margin-left: 0;
        margin-right: 0;
        max-width: 100%;
    }

    .col-xxl-9, .col-xl-8,
    .col-xxl-3, .col-xl-4 {
        padding-left: 5px;
        padding-right: 5px;
        max-width: 100%;
    }
}
</style>

@endpush 

@section('contents')
{{--<div class="singleProHead">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </nav>
    </div>
</div>--}}
<!-- START SECTION SHOP -->
{{--<div class="section">
    <div class="container cartItemsList">
      @include(welcomeTheme().'.carts.includes.cartItems')
    </div>
</div>--}}
<!-- END SECTION SHOP -->


<div class="container mt-4">
    
   <div class="checkout-steps-bar">
    <span class="step-item active">SHOPPING CART</span>
    <span class="step-arrow">&rarr;</span>
    <span class="step-item">CHECKOUT</span>
    <span class="step-arrow">&rarr;</span>
    <span class="step-item">ORDER COMPLETE</span>
</div>
</div>


<section class="section-b-space pt-0"> 
       <!--<div class="heading-banner">-->
       <!--  <div class="custom-container container">-->
       <!--    <div class="row align-items-center">-->
       <!--      <div class="col-sm-6">-->
       <!--        <h4>Cart </h4>-->
       <!--      </div>-->
       <!--      <div class="col-sm-6">-->
       <!--        <ul class="breadcrumb float-end">-->
       <!--          <li class="breadcrumb-item">  <a href="{{route('index')}}">Home  </a></li>-->
       <!--          <li class="breadcrumb-item active">  <a href="javascript:void(0)">Cart </a></li>-->
       <!--        </ul>-->
       <!--      </div>-->
       <!--    </div>-->
       <!--  </div>-->
       <!--</div>-->
     </section>
     <section class="section-b-space pt-0">
       <div class="custom-container cartItemsList container">
            @include(welcomeTheme().'.carts.includes.cartItems')
       </div>
     </section>



@endsection 
@push('js') 

<script>
    $(document).ready(function(){
        
            $(document).on('change','.cartQtyChange',function(){

                  var url = $(this).data('url');
                  var qty = $(this).val();
                  var Dcharge =parseInt($('.cartDeliveryCharge').text());

                  if (isNaN(Dcharge)){
                    Dcharge =0;
                  }
                
                if(qty==''){
                    qty=1;
                }
                
                $.ajax({
                  url: url,
                  type: 'GET',
                  dataType: 'json',
                  cache: false,
                  data: {'qty':qty},
                })
                .done(function(data) {
                    $(".cartItemsList").empty().append(data.cartItems);
                    $(".headerCartItem").empty().append(data.headerCartItems);
                })
                .fail(function() {
                  // alert("error");
                });


            });
    });
</script>

@endpush