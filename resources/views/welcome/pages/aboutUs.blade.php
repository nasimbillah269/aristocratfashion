@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$page->seo_title?:websiteTitle($page->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title?:websiteTitle($page->name)}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
<meta name="url" property="og:url" content="{{route('pageView',$page->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('pageView',$page->slug?:'no-title')}}">
@endsection
@push('css')
<style>

</style>
@endpush 

@section('contents')

{{--<div class="singleProHead">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$page->name}}</li>
            </ol>
        </nav>
    </div>
</div>--}}

{{--<div class="aboutUsPage">
    <div class="container">
        <h1>{{$page->name}}</h1><br>
        <div class="pageContents">
       
        </div>
    </div>
</div>--}}



    <section class="section-b-space pt-0"> 
       <div class="heading-banner">
         <div class="custom-container container">
           <div class="row align-items-center">
             <div class="col-sm-6">
               <h4>About Us  </h4>
             </div>
             <div class="col-sm-6">
               <ul class="breadcrumb float-end">
                 <li class="breadcrumb-item">  <a href="#">Home  </a></li>
                 <li class="breadcrumb-item active">  <a href="#">About Us  </a></li>
               </ul>
             </div>
           </div>
         </div>
       </div>
     </section>
     <section class="section-b-space pt-0">
       <div class="custom-container container"> 
         <div class="row align-items-center gy-4">
           <div class="col-lg-6 order-1 order-lg-1 ratio_55">
             <div class="about-img">  <img class="bg-img img-fluid" src="{{asset('welcome/assets/images/about/7.jpg')}}" alt="" />
               <div class="about-tag">  <a href="@"> 
                   <h5>Women </h5><i class="fa-solid fa-arrow-right"></i></a></div>
             </div>
           </div>
           <div class="col-lg-6 order-2 order-lg-2"> 
             <div class="about-content"> 
               <div class="sidebar-title">
                 <div class="loader-line"></div>
                 <h3>Here's the newest fashion.  </h3>
               </div>
               <p>With increased awareness about issues, sustainable fashion has  traction. Women are embracing - materials, upcycling, and supporting  with transparent supply chains.  isn't just about staying â€”'_ a styling technique that  depth and dimension to . Lightweight cardigans, duster coats,  scarves are essential layering  that can easily transition  day to night. </p>
               <ul> 
                 <li><i class="iconsax" data-icon="cloud"></i>
                   <div> 
                     <h6>Soft Fabric </h6>
                     <p>Get complimentary ground shipping  every order.Donâ€™t love it?  it back, on us. </p>
                   </div>
                 </li>
                 <li>  <i class="iconsax" data-icon="clock"></i>
                   <div>
                     <h6>All Day Comfort </h6>
                     <p>We believe getting dressed  be the easiest part  your day. </p>
                   </div>
                 </li>
               </ul>
             </div>
           </div>
           <div class="col-lg-6 order-4 order-lg-3">
             <div class="about-content about-content-1"> 
               <div class="sidebar-title">
                 <div class="loader-line"></div>
                 <h3>Mastering Men's Fashion </h3>
               </div>
               <p>Start with foundational pieces  well-fitted jeans, classic white , and versatile jackets. These  form the backbone of  wardrobe, allowing for endless -- possibilities.Whether it's a suit  a simple button-down shirt,  tailoring can elevate your  from average to exceptional.  in alterations to ensure  clothes fit impeccably, enhancing  silhouette and boosting your . </p>
               <ul> 
                 <li><i class="iconsax" data-icon="cloud"></i>
                   <div> 
                     <h6>Soft Fabric </h6>
                     <p>Get complimentary ground shipping  every order.Donâ€™t love it?  it back, on us. </p>
                   </div>
                 </li>
                 <li>  <i class="iconsax" data-icon="clock"></i>
                   <div>
                     <h6>All Day Comfort </h6>
                     <p>We believe getting dressed  be the easiest part  your day. </p>
                   </div>
                 </li>
               </ul>
             </div>
           </div>
           <div class="col-lg-6 order-3 order-lg-4 ratio_55">
             <div class="about-img about-img-1">  <img class="bg-img img-fluid" src="{{asset('welcome/assets/images/about/8.jpg')}}" alt="" />
               <div class="about-tag">  <a href="#"> 
                   <h5>Men </h5><i class="fa-solid fa-arrow-right"></i></a></div>
             </div>
           </div>
         </div>
       </div>
     </section>
     <section class="section-b-space layout-light">
       <div class="custom-container container"> 
         <div class="row gy-4">
           <div class="col-12">
             <div class="title-1">
               <p>Our Excellence <span></span></p>
               <h3>Superiority is our first . </h3>
             </div>
           </div>
           <div class="col-md-4">
             <div class="about-icon">  <i class="iconsax" data-icon="blur"></i>
               <h5>Superior Substances </h5>
               <p>Our sportswear is precisely  to provide unparalleled comfort  durability, using quality fabrics  its expert construction. </p>
             </div>
           </div>
           <div class="col-md-4">
             <div class="about-icon">  <i class="iconsax" data-icon="diamonds"></i>
               <h5>Simple Style </h5>
               <p>Elegant simplicity. Our sportswear  effortless flair that communicates , embodying the essence of  design. </p>
             </div>
           </div>
           <div class="col-md-4">
             <div class="about-icon">  <i class="iconsax" data-icon="media-sliders-3"></i>
               <h5>Different Dimensions </h5>
               <p>With a broad selection  sizes and shapes, our  encourages diversity and celebrates  beauty of individuality, catering  all body types. </p>
             </div>
           </div>
         </div>
       </div>
     </section>
     <section class="section-b-space pb-0 fashion-girl">
       <div class="custom-container container">
         <div class="row gy-4 align-items-end"> 
           <div class="col-12">
             <div class="title-1 mb-0">
               <p>Our Fashion Style <span></span></p>
               <h3>Salutations from the New  Era </h3>
             </div>
           </div>
           <div class="col-md-4">
             <div class="fashion-box-1"> 
               <p>Quisquemos sodales suscipit tortor  condimentum de cosmo lacus  menean diverra loremous. Nullam  amet orci rutrum risus  semper vel non magna.  vel sem a lectus  ultricies. Etiam semper sollicitudin  indous scelerisque... </p><a href="product.html">Let's Check this out  <i class="fa-solid fa-arrow-right-long"></i></a><img class="img-fluid" src="../assets/images/about/fashion-1.jpg" alt="" />
             </div>
           </div>
           <div class="col-md-4 d-none d-md-block"> 
             <div class="product-img"><img class="img-fluid" src="{{asset('welcome/assets/images/about/1.png')}}" alt="" /></div>
           </div>
           <div class="col-md-4">
             <div class="fashion-box-1 fashion-item">  <img class="img-fluid" src="../assets/images/about/fashion-2.jpg" alt="" /><a href="product.html">Let's Check this out  <i class="fa-solid fa-arrow-right-long"></i></a>
               <p>Quisquemos sodales suscipit tortor  condimentum de cosmo lacus  menean diverra loremous. Nullam  amet orci rutrum risus  semper vel non magna.  vel sem a lectus  ultricies. Etiam semper sollicitudin  indous scelerisque... </p>
             </div>
           </div>
         </div>
       </div>
     </section>
     <section class="section-b-space layout-light">   
       <div class="custom-container container"> 
         <div class="row"> 
           <div class="col-12">
             <div class="title-1">
               <p>Our Creative Team <span></span></p>
               <h3>Katie Team Member </h3>
             </div>
           </div>
           <div class="col-12"> 
             <div class="swiper our-team">
               <div class="swiper-wrapper">
                 <div class="swiper-slide">
                   <div class="our-team-content">
                     <div class="team-img"><img class="img-fluid" src="../assets/images/about/1.jpg" alt="" />
                       <ul class="social-group">
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-instagram">  </i></a></li>
                         <li>  <a href="https://www.pinterest.com/" target="_blank"><i class="fa-brands fa-pinterest"></i></a></li>
                         <li>  <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                       </ul>
                     </div>
                     <div class="team-content"> 
                       <h5>Edward Lindgren </h5>
                       <p>Marketing </p>
                     </div>
                   </div>
                 </div>
                 <div class="swiper-slide">
                   <div class="our-team-content">
                     <div class="team-img"><img class="img-fluid" src="../assets/images/about/2.jpg" alt="" />
                       <ul class="social-group">
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-instagram">  </i></a></li>
                         <li>  <a href="https://www.pinterest.com/" target="_blank"><i class="fa-brands fa-pinterest"></i></a></li>
                         <li>  <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                       </ul>
                     </div>
                     <div class="team-content"> 
                       <h5>Lisa John </h5>
                       <p>Chief Operating Officer </p>
                     </div>
                   </div>
                 </div>
                 <div class="swiper-slide">
                   <div class="our-team-content">
                     <div class="team-img"><img class="img-fluid" src="../assets/images/about/3.jpg" alt="" />
                       <ul class="social-group"> 
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-instagram">  </i></a></li>
                         <li>  <a href="https://www.pinterest.com/" target="_blank"><i class="fa-brands fa-pinterest"></i></a></li>
                         <li>  <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                       </ul>
                     </div>
                     <div class="team-content"> 
                       <h5>Chineze Afamefuna </h5>
                       <p>Marketing </p>
                     </div>
                   </div>
                 </div>
                 <div class="swiper-slide">
                   <div class="our-team-content">
                     <div class="team-img"><img class="img-fluid" src="../assets/images/about/4.jpg" alt="" />
                       <ul class="social-group"> 
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-instagram">  </i></a></li>
                         <li>  <a href="https://www.pinterest.com/" target="_blank"><i class="fa-brands fa-pinterest"></i></a></li>
                         <li>  <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                       </ul>
                     </div>
                     <div class="team-content"> 
                       <h5>Nado Husa </h5>
                       <p>Marketing Director </p>
                     </div>
                   </div>
                 </div>
                 <div class="swiper-slide">
                   <div class="our-team-content">
                     <div class="team-img"><img class="img-fluid" src="../assets/images/about/5.jpg" alt="" />
                       <ul class="social-group"> 
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-instagram">  </i></a></li>
                         <li>  <a href="https://www.pinterest.com/" target="_blank"><i class="fa-brands fa-pinterest"></i></a></li>
                         <li>  <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                       </ul>
                     </div>
                     <div class="team-content"> 
                       <h5>Cartherin Forres </h5>
                       <p>Co-Founder </p>
                     </div>
                   </div>
                 </div>
                 <div class="swiper-slide">
                   <div class="our-team-content">
                     <div class="team-img"><img class="img-fluid" src="../assets/images/about/6.jpg" alt="" />
                       <ul class="social-group"> 
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                         <li>  <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-instagram">  </i></a></li>
                         <li>  <a href="https://www.pinterest.com/" target="_blank"><i class="fa-brands fa-pinterest"></i></a></li>
                         <li>  <a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                       </ul>
                     </div>
                     <div class="team-content"> 
                       <h5>Jane Doe </h5>
                       <p>Marketing Director </p>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>
     <section class="section-b-space">
       <div class="custom-container container"> 
         <div class="row"> 
           <div class="col-12">
             <div class="title-1">
               <p>Latest Testimonials <span></span></p>
               <h3>Our customerâ€™s reviews </h3>
             </div>
           </div>
           <div class="col-12"> 
             <div class="swiper our-testimonials">
               <div class="swiper-wrapper">
                 <div class="swiper-slide testimonials-box"> 
                   <div class="customer-item"><i class="fa-solid fa-quote-left"></i>
                     <div class="customer-box">
                       <p> Customers have been _positive about our new . One satisfied customer mentioned, '_' been using this for _ week now, and I'm  at the results! It's  easy to use and  exceeded my expectations.' </p>
                     </div>
                   </div>
                   <div class="customer-img"><img class="img-fluid" src="../assets/images/user/1.jpg" alt="" />
                     <div> 
                       <h5> Jimmy C. Bash </h5>
                       <p>@instagram </p>
                     </div>
                   </div>
                 </div>
                 <div class="swiper-slide testimonials-box"> 
                   <div class="customer-item"><i class="fa-solid fa-quote-left"></i>
                     <div class="customer-box">
                       <p>  Another customer , 'This product has truly  a difference in my  routine. I love how  it is and how  has simplified my life.' , a long-time user shared, '_' tried similar products in  past </p>
                     </div>
                   </div>
                   <div class="customer-img"><img class="img-fluid" src="../assets/images/user/2.jpg" alt="" />
                     <div> 
                       <h5> Jimmy C. Bash </h5>
                       <p>@instagram </p>
                     </div>
                   </div>
                 </div>
                 <div class="swiper-slide testimonials-box"> 
                   <div class="customer-item"><i class="fa-solid fa-quote-left"></i>
                     <div class="customer-box">
                       <p> The quality is , and the customer service  has been very responsive  any questions I've had.' , the feedback has been , with customers praising both  effectiveness of the product  the excellent support provided  our team." </p>
                     </div>
                   </div>
                   <div class="customer-img"><img class="img-fluid" src="../assets/images/user/3.jpg" alt="" />
                     <div> 
                       <h5> Jimmy C. Bash </h5>
                       <p>@instagram </p>
                     </div>
                   </div>
                 </div>
                 <div class="swiper-slide testimonials-box"> 
                   <div class="customer-item"><i class="fa-solid fa-quote-left"></i>
                     <div class="customer-box">
                       <p> Structured chic panels  party flattering ultimate trim  pencil silhouette perfect look.  lining hemline above knee  satin finish concealed zip  buttons rayon 'I've tried  products in the past,  none compare to this  </p>
                     </div>
                   </div>
                   <div class="customer-img"><img class="img-fluid" src="../assets/images/user/8.jpg" alt="" />
                     <div> 
                       <h5> Jimmy C. Bash </h5>
                       <p>@instagram </p>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>












@endsection @push('js') @endpush