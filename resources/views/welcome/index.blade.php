@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle()}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{general()->meta_title}}" />
<meta name="description" property="og:description" content="{!!general()->meta_description!!}" />
<meta name="keyword" property="og:keyword" content="{{general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset(general()->logo())}}" />
<meta name="url" property="og:url" content="{{route('index')}}" />
<link rel="canonical" href="{{route('index')}}" />
@endsection 
@push('css') 


<style>
.btn-add-cart {
    background: #fff;
    border: 1.5px solid var(--pink);
    color: var(--pink);
}
.btn-buy-now {
    background: var(--pink);
    border: 1.5px solid var(--pink);
    color: #fff;
}
</style>
@endpush 
@section('contents')


  

<div class="homeHeroUI">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                 <!--Slider Part Include Start-->
                @include(general()->theme.'.layouts.slider')
            </div>
            <div class="col-md-6">
<section class="brand-section">
    <div class="row">

        @foreach($specialOffers as $key=>$data)

            @php
                $height = $key < 2 ? 277 : 163;
            @endphp

            <div class="col-md-6">

                <div class="brand-card" style="height: {{ $height }}px">

                    <div class="brandwraper">

                        <div class="content">

                            <!--<h3 class="brand-title">-->
                            <!--    {{ $data->name }}-->
                            <!--</h3>-->
                            <!--@if($data->sub_title)-->
                            <!--<p class="brand-subtitle">-->
                            <!--    {!!$data->sub_title!!}-->
                            <!--</p>-->
                            <!--@endif-->
                            <!--@if($data->image_link)-->
                            <!--<a href="{{$data->image_link}}" class="buy-btn">-->
                            <!--    Buy Now-->
                            <!--    <i class="bi bi-arrow-right-circle-fill"></i>-->
                            <!--</a>-->
                            <!--@endif-->

                        </div>
                        
                        <a href="{{$data->image_link}}">
                             <img
                                class="product-image"
                                src="{{ asset($data->image()) }}"
                                alt="{{ $data->name }}"
                            >
                            
                        </a>
                       

                    </div>

                </div>

            </div>

        @endforeach

    </div>
</section>
              
            </div>
        </div>
    </div>
</div>


<div class="freeDeliveryBanner">
    <div class="container">
        <div class="freeBnImg">
            <img src="{{asset('welcome/assets/images/aristo/HOME-PAGE-2ND-BANNER-PC--2048x213.jpg')}}" alt="Personal Care">
        </div>
    </div>
</div>


  <!-- ===================== HERO ===================== -->
  {{--<section class="section pb-0">
    <div class="row g-3">
      <div class="col-12 col-lg-7">
        <div class="hero-main">
          <img src="https://loremflickr.com/900/500/cosmetics,skincare?lock=11" class="hero-bg" alt="Cosmetics promotion">
          <div class="hero-overlay"></div>
          <div class="hero-copy">
            <div class="discount-sub">লিমিটেড স্টকে চলছে</div>
            <div class="discount-text">৬০% পর্যন্ত<br>ছাড়!</div>
            <button class="btn-shop">Shop Now <i class="fa-solid fa-arrow-right ms-1"></i></button>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-2-5">
        <div class="row g-3 h-100">
          <div class="col-12">
            <div class="mini-banner">
              <img src="https://loremflickr.com/300/220/skincare,green?lock=21" class="mb-bg" alt="Nature Skin">
              <div class="mb-tint"></div>
              <div class="mb-copy">
                <h6>Nature Skin</h6>
                <small>Authorized distributor</small>
              </div>
              <button class="btn-buy">Buy Now</button>
            </div>
          </div>
          <div class="col-12">
            <div class="mini-banner">
              <img src="https://loremflickr.com/300/220/moisturizer,jar?lock=22" class="mb-bg" alt="Dabo">
              <div class="mb-tint"></div>
              <div class="mb-copy">
                <h6>Dabo</h6>
                <small>Authorized distributor</small>
              </div>
              <button class="btn-buy">Buy Now</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-2-5">
        <div class="row g-3 h-100">
          <div class="col-12">
            <div class="mini-banner">
              <img src="https://loremflickr.com/300/220/sunscreen,bottle?lock=23" class="mb-bg" alt="ForRest">
              <div class="mb-tint"></div>
              <div class="mb-copy">
                <h6>ForRest</h6>
                <small>Authorized distributor</small>
              </div>
              <button class="btn-buy">Buy Now</button>
            </div>
          </div>
          <div class="col-12">
            <div class="mini-banner">
              <img src="https://loremflickr.com/300/220/perfume,bottle?lock=24" class="mb-bg" alt="Phytotree">
              <div class="mb-tint"></div>
              <div class="mb-copy">
                <h6>Phytotree</h6>
                <small>Authorized distributor</small>
              </div>
              <button class="btn-buy">Buy Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>--}}





<section class="cat-section">
    
    <div class="container">
        

  <div class="cat-title">Top Categories</div>

<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">

    @foreach($categories as $ctg)
        @if($loop->iteration <= 4)
            @continue
        @endif
        
        <div class="col">
          <a href="{{route('productCategory',$ctg->slug?:'no-title')}}" class="cat-item">
            <div class="cat-thumb"><img src="{{asset($ctg->image())}}" alt="Skin Care"></div>
            <div class="cat-label">{{$ctg->name}}</div>
          </a>
        </div>
    @endforeach

</div>
      </div>
</section>





<div class="homeOffer">
    <div class="container">
        <div class="row">
             @foreach($bannerGroupOne as $i=>$data)
            <div class="col-md-4">
                <a href="{{$data->image_link}}" class="homeOfferGrid">
                     <img src="{{asset($data->image())}}" alt="{{$data->name}}">
                </a>
            </div>
              @endforeach
           
        </div>
    </div>
</div>


<div class="explorLatestProduct ">
    <div class="container">
        <h4>Explore Latest Products</h4>
          <div class="row">
                    @foreach($latestProducts as $product )
                    <div class="col-md-3">
                        <div class="product-item">@include(welcomeTheme().'products.includes.productCard')</div>
                    </div>

                    @endforeach
                </div>
    </div>
</div>


  <!-- ===================== TOP BRANDS ===================== -->
  <section class="section">
       <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="section-title mb-0">Top Brands</h2>
      <a href="https://aristocratfashion.com/brands" class="btn btn-sm rounded-pill px-3" style="background:var(--pink-light);color:var(--pink);font-weight:600;">All Brands <i class="fa-solid fa-chevron-right ms-1"></i></a>
    </div>
    <div class="row g-0 brand-strip">
        
        
     @foreach($brands as $brand )
      <div class="col-6 col-md-3 brand-cell">  <img src="{{asset($brand->image())}}" alt="{{$brand->name}}"></div>
      @endforeach
      <!--<div class="col-6 col-md-3 brand-cell">Anua</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">A X I S - Y</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">COSRX</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">DABO</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">NATURE SKIN</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">ILLIYOON</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">MISSHA</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">RYO</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">BEAUTY OF JOSEON</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">THE FACE SHOP</div>-->
      <!--<div class="col-6 col-md-3 brand-cell">TONYMOLY</div>-->
    </div>
    </div>
  </section>

  <!-- ===================== SHIPPING & DELIVERY ===================== -->
  {{--<section class="section">
       <div class="container">
    <div class="shipping-banner">
      <img src="https://loremflickr.com/1200/500/warehouse,delivery?lock=81" class="ship-bg" alt="Shipping and delivery">
      <div class="ship-tint"></div>
      <div class="ship-body">
        <div class="row">
          <div class="col-md-8">
            <h4 class="fw-bold mb-2">Shipping &amp; Delivery</h4>
            <p class="mb-3" style="color:#ddd; max-width:520px;">সারা বাংলাদেশে ৪৮-৭২ ঘণ্টার মধ্যে হোম ডেলিভারি সুবিধা। যেকোনো সমস্যায় সরাসরি কল করে আমাদের হটলাইন নাম্বারে যোগাযোগ করুন (সকাল ১০:০০ থেকে রাত ৮:০০ পর্যন্ত)।</p>
            <button class="btn-call"><i class="fa-solid fa-phone"></i> 09613660321</button>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>--}}




@endsection 
@push('js') 

<script>

window.dataLayer = window.dataLayer || [];

window.dataLayer.push({
    event: "page_view",

    page: {
        page_title: document.title,
        page_location: window.location.href,
        page_type: "home"
    }
    
});




</script>

<script>
    (function ($) {

    $.fn.lazyObserver = function (callback) {

        let observer = new IntersectionObserver(function (entries, obs) {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    let el = $(entry.target);
                    callback.call(entry.target, el);

                    obs.unobserve(entry.target);
                }

            });

        }, {
            threshold: 0.2
        });

        return this.each(function () {
            observer.observe(this);
        });

    };

})(jQuery);
</script>

<script>
  $(".homeCtg").lazyObserver(function (wrapper) {

    wrapper.find(".skeleton-category").fadeOut(200);
    wrapper.find(".real-category")
        .removeClass("d-none")
        .hide()
        .fadeIn(300);

});
</script>



<script>
(function ($) {

    $.fn.lazyObserver = function (callback) {

        let observer = new IntersectionObserver((entries, obs) => {

            entries.forEach(entry => {

                if (entry.isIntersecting) {

                    callback.call(entry.target, entry);

                    // STOP observing properly
                    obs.unobserve(entry.target);
                }

            });

        }, {
            threshold: 0.2
        });

        return this.each(function () {
            observer.observe(this);
        });

    };

})(jQuery);


</script>


<script>
    $(".product-wrapper").lazyObserver(function () {

    let wrapper = $(this);

    wrapper.find(".skeleton-container").fadeOut(200);
    wrapper.find(".real-products").removeClass("d-none").hide().fadeIn(300);

});
</script>

<script type="text/javascript">
    $(document).ready(function () {
        
        
        
        // $('.hero-sectionClick').on('click', function(e){
        //     e.preventDefault(); // prevent default behavior
    
        //     // scroll target
        //     var target = $('#hero-section'); // your section class
        //     if(target.length){
        //         // calculate offset top minus 140px
        //         var scrollTo = target.offset().top - 240;
    
        //         // smooth scroll
        //         $('html, body').animate({
        //             scrollTop: scrollTo
        //         }, 100); // 800ms animation
        //     }
        // });
        

        if ($('#OfferModal').length > 0) {
    
            let today = new Date().toISOString().split('T')[0]; // YYYY-MM-DD
            let lastShownDate = localStorage.getItem('offerModalShownDate');
    
            if (lastShownDate !== today) {
    
                setTimeout(function () {
                    $('#OfferModal').modal('show');
                    localStorage.setItem('offerModalShownDate', today);
                }, 1000);
    
            }
        }
        
        
        const second = 1000,
              minute = second * 60,
              hour = minute * 60,
              day = hour * 24;

        // Get the date from the data attribute (d/m/Y format from Carbon)
        let birthday = $('.mainOfferq').data('date');

        // Split the date (d/m/Y) into day, month, year
        let dateParts = birthday.split('/');
        let dayOfMonth = dateParts[0];
        let month = dateParts[1] - 1; // Month is 0-based in JavaScript (0 = January)
        let year = dateParts[2];

        // Create a JavaScript Date object in MM/DD/YYYY format
        let formattedBirthday = new Date(year, month, dayOfMonth).getTime();

        // Get today's date in MM/DD/YYYY format
        let today = new Date(),
            dd = String(today.getDate()).padStart(2, '0'),
            mm = String(today.getMonth() + 1).padStart(2, '0'),
            yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;

        // If today's date is greater than the birthday, set the birthday to the next year
        if (today > birthday) {
            formattedBirthday = new Date(yyyy + 1, month, dayOfMonth).getTime();
        }

        // Countdown target date
        const countDown = formattedBirthday;

        // Update the countdown every second
        const x = setInterval(function () {
            const now = new Date().getTime(),
                  distance = countDown - now;

            $('#days').text(Math.floor(distance / day));
            $('#hours').text(Math.floor((distance % day) / hour));
            $('#minutes').text(Math.floor((distance % hour) / minute));
            $('#seconds').text(Math.floor((distance % minute) / second));

            // If the countdown reaches 0, display the message and hide countdown
            if (distance < 0) {
                $('#headline').text("Today is the Day!");
                $('#countdown').hide();
                $('#content').show();
                clearInterval(x);
            }
        }, 1000);
    });
</script>

@endpush