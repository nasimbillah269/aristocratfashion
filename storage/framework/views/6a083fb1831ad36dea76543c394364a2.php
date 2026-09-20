 <?php $__env->startSection('title'); ?>
<title><?php echo e(websiteTitle()); ?></title>
<?php $__env->stopSection(); ?> <?php $__env->startSection('SEO'); ?>
<meta name="title" property="og:title" content="<?php echo e(general()->meta_title); ?>" />
<meta name="description" property="og:description" content="<?php echo general()->meta_description; ?>" />
<meta name="keyword" property="og:keyword" content="<?php echo e(general()->meta_keyword); ?>" />
<meta name="image" property="og:image" content="<?php echo e(asset(general()->logo())); ?>" />
<meta name="url" property="og:url" content="<?php echo e(route('index')); ?>" />
<link rel="canonical" href="<?php echo e(route('index')); ?>" />
<?php $__env->stopSection(); ?> 
<?php $__env->startPush('css'); ?> 


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
<?php $__env->stopPush(); ?> 
<?php $__env->startSection('contents'); ?>


  

<div class="homeHeroUI">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                 <!--Slider Part Include Start-->
                <?php echo $__env->make(general()->theme.'.layouts.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-6">
<section class="brand-section">
    <div class="row">

        <?php $__currentLoopData = $specialOffers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php
                $height = $key < 2 ? 277 : 163;
            ?>

            <div class="col-md-6">

                <div class="brand-card" style="height: <?php echo e($height); ?>px">

                    <div class="brandwraper">

                        <div class="content">

                            <!--<h3 class="brand-title">-->
                            <!--    <?php echo e($data->name); ?>-->
                            <!--</h3>-->
                            <!--<?php if($data->sub_title): ?>-->
                            <!--<p class="brand-subtitle">-->
                            <!--    <?php echo $data->sub_title; ?>-->
                            <!--</p>-->
                            <!--<?php endif; ?>-->
                            <!--<?php if($data->image_link): ?>-->
                            <!--<a href="<?php echo e($data->image_link); ?>" class="buy-btn">-->
                            <!--    Buy Now-->
                            <!--    <i class="bi bi-arrow-right-circle-fill"></i>-->
                            <!--</a>-->
                            <!--<?php endif; ?>-->

                        </div>
                        
                        <a href="<?php echo e($data->image_link); ?>">
                             <img
                                class="product-image"
                                src="<?php echo e(asset($data->image())); ?>"
                                alt="<?php echo e($data->name); ?>"
                            >
                            
                        </a>
                       

                    </div>

                </div>

            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>
              
            </div>
        </div>
    </div>
</div>


<div class="freeDeliveryBanner">
    <div class="container">
        <div class="freeBnImg">
            <img src="<?php echo e(asset('welcome/assets/images/aristo/HOME-PAGE-2ND-BANNER-PC--2048x213.jpg')); ?>" alt="Personal Care">
        </div>
    </div>
</div>


  <!-- ===================== HERO ===================== -->
  





<section class="cat-section">
    
    <div class="container">
        

  <div class="cat-title">Top Categories</div>

<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">

    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($loop->iteration <= 4): ?>
            <?php continue; ?>
        <?php endif; ?>
        
        <div class="col">
          <a href="<?php echo e(route('productCategory',$ctg->slug?:'no-title')); ?>" class="cat-item">
            <div class="cat-thumb"><img src="<?php echo e(asset($ctg->image())); ?>" alt="Skin Care"></div>
            <div class="cat-label"><?php echo e($ctg->name); ?></div>
          </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
      </div>
</section>





<div class="homeOffer">
    <div class="container">
        <div class="row">
             <?php $__currentLoopData = $bannerGroupOne; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <a href="<?php echo e($data->image_link); ?>" class="homeOfferGrid">
                     <img src="<?php echo e(asset($data->image())); ?>" alt="<?php echo e($data->name); ?>">
                </a>
            </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           
        </div>
    </div>
</div>


<div class="explorLatestProduct ">
    <div class="container">
        <h4>Explore Latest Products</h4>
          <div class="row">
                    <?php $__currentLoopData = $latestProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <div class="product-item"><?php echo $__env->make(welcomeTheme().'products.includes.productCard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        
        
     <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-6 col-md-3 brand-cell">  <img src="<?php echo e(asset($brand->image())); ?>" alt="<?php echo e($brand->name); ?>"></div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
  




<?php $__env->stopSection(); ?> 
<?php $__env->startPush('js'); ?> 

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

<?php $__env->stopPush(); ?>
<?php echo $__env->make(welcomeTheme().'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome/index.blade.php ENDPATH**/ ?>