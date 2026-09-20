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
.contactFormGrid .form-control {
    text-align: left;
    margin: 0;
}
.heading-banner h4 {
    background: #e6007e;
    display: block;
    padding: 40px 20px;
    color: #fff;
    border-radius: 20px;
}

.pageContents {
    background: #fff;
    padding: 20px;
    margin-bottom: 40px;
}

.contact-main {
    background: #fff;
    padding: 20px;
    border-radius: 20px;
}


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

{{--<div class="cotactMainDiv">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @include(welcomeTheme().'.alerts')
                <form class="formDiv" action="{{route('contactMail')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contactFormGrid">
                                <div class="mb-3">
                                  <label  class="form-label">Full Name*</label>
                                  <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter Your Name" required="">
                                  @if ($errors->has('name'))
                                <p style="color: red; margin: 0;">{{ $errors->first('name') }}</p>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contactFormGrid">
                                <div class="mb-3">
                                  <label  class="form-label">Mobile No*</label>
                                  <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}" placeholder="Enter Your Mobile Number" required="">
                                  @if ($errors->has('mobile'))
                                <p style="color: red; margin: 0;">{{ $errors->first('mobile') }}</p>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contactFormGrid">
                                <div class="mb-3">
                                  <label class="form-label">Email</label>
                                  <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Enter Your Email" >
                                  @if ($errors->has('email'))
                                <p style="color: red; margin: 0;">{{ $errors->first('email') }}</p>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="textArea">
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control" name="message"  placeholder="Message" rows="3" required="" style="text-align:left;">{{old('message')}}</textarea>
                                    @if ($errors->has('message'))
                                    <p style="color: red; margin: 0;">{{ $errors->first('message') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="contactSubmit">Submit Now</button>
                </form>
            </div>
            <div class="col-md-4">
                <div class="infoBoxContact">
                    <h4>Showroom Address:</h4>
                    <p>
                       {!!general()->address_one!!}
                    </p>
                </div>
                <div class="infoBoxContact">
                    <h4>Head Office:</h4>
                    <p>
                       {!!general()->address_two!!}
                    </p>
                </div>
                
                <div class="infoBoxContact">
                    <h4>Call Us</h4>
                    <p>
                        For any queries call us on<br><a href="tel:{{general()->mobile}}">{{general()->mobile}}</a>
                    </p>
                </div>
                
                <div class="infoBoxContact">
                    <h4>Email Us</h4>
                    <p>
                        For any queries write to us on<br><a href="mailto:{{general()->email}}">{{general()->email}}</a>
                    </p>
                </div>
                
                <div class="infoBoxContact">
                    <h4>Follow Us</h4>
                    <ul class="socalLInk">
                        @if(general()->facebook_link)
                        <li>
                            <a href="{{general()->facebook_link}}" target="_blank"><i class="fa-brands fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        @endif
                        @if(general()->linkedin_link)
                        <li>
                            <a href="{{general()->linkedin_link}}" target="_blank"><i class="fa-brands fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                        @endif
                        @if(general()->twitter_link)
                        <li>
                            <a href="{{general()->twitter_link}}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                        </li>
                        @endif
                        @if(general()->youtube_link)
                        <li>
                            <a href="{{general()->youtube_link}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                        </li>
                        @endif
                        @if(general()->youtube_link)
                        <li>
                            <a href="{{general()->youtube_link}}" target="_blank"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
                        </li>
                        @endif
                     </ul>
                </div>
            </div>
        </div>
        
        <div class="mapLocation mt-5">
            <div class="container-fluid">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.6509247731433!2d90.3913398!3d23.7598244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9b6ccff2ef5%3A0xbd54c1416b136ef!2sBytebliss!5e0!3m2!1sen!2sbd!4v1740310492699!5m2!1sen!2sbd" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>--}}


 <!--<section class="section-b-space pt-0"> -->
 <!--      <div class="heading-banner">-->
 <!--        <div class="custom-container container">-->
 <!--          <div class="row align-items-center">-->
 <!--            <div class="col-sm-6">-->
 <!--              <h4>Contact </h4>-->
 <!--            </div>-->
 <!--            <div class="col-sm-6">-->
 <!--              <ul class="breadcrumb float-end">-->
 <!--                <li class="breadcrumb-item">  <a href="#">Home  </a></li>-->
 <!--                <li class="breadcrumb-item active">  <a href="#">Contact </a></li>-->
 <!--              </ul>-->
 <!--            </div>-->
 <!--          </div>-->
 <!--        </div>-->
 <!--      </div>-->
 <!--    </section>-->
 
  <div class="pageContainer"> 
       <div class="heading-banner">
         <div class="custom-container container">
           <div class="row align-items-center">
             <div class="col-sm-12">
               <h4>{{$page->name}} </h4>
             </div>
             <!--<div class="col-sm-6">-->
             <!--  <ul class="breadcrumb float-end">-->
             <!--    <li class="breadcrumb-item">  <a href="{{route('index')}}">Home  </a></li>-->
             <!--    <li class="breadcrumb-item active">  <a href="#">{{$page->name}} </a></li>-->
             <!--  </ul>-->
             <!--</div>-->
           </div>
         </div>
       </div>
     </div>
     
     <section class="section-b-space pt-0"> 
       <div class="custom-container container">
         <div class="contact-main"> 
           <div class="row gy-3">
             <div class="col-12">
               <div class="title-1 address-content"> 
                 <p class="pb-0">Let's Get In Touch <span></span></p>
               </div>
             </div>
             <div class="col-xl-4 col-sm-6">
               <div class="address-items"> 
                 <div class="icon-box">  <i class="iconsax" data-icon="location"></i></div>
                 <div class="contact-box"> 
                   <h6>Contact Number </h6>
                   <p>{{general()->mobile}}</p>
                 </div>
               </div>
             </div>
             <div class="col-xl-4 col-sm-6">
               <div class="address-items"> 
                 <div class="icon-box">  <i class="iconsax" data-icon="phone-calling"></i></div>
                 <div class="contact-box"> 
                   <h6>Email Address </h6>
                   <p>{{general()->email}}</p>
                 </div>
               </div>
             </div>
             <div class="col-xl-4 col-sm-6">
               <div class="address-items"> 
                 <div class="icon-box">  <i class="iconsax" data-icon="mail"></i></div>
                 <div class="contact-box"> 
                   <h6>Office Address </h6>
                   <p> {!!general()->address_one!!} </p>
                 </div>
               </div>
             </div>
             <!--<div class="col-xl-3 col-sm-6">-->
             <!--  <div class="address-items"> -->
             <!--    <div class="icon-box">  <i class="iconsax" data-icon="map-1"></i></div>-->
             <!--    <div class="contact-box"> -->
             <!--      <h6>Showroom Address </h6>-->
             <!--      <p> {!!general()->address_one!!} </p>-->
             <!--    </div>-->
             <!--  </div>-->
             <!--</div>-->
           </div>
         </div>
       </div>
     </section>
     <section class="section-b-space pt-0"> 
       <div class="custom-container container">
         <div class="contact-main"> 
           <div class="row align-items-center gy-4">
             <div class="col-lg-6 order-lg-1 order-2">
               <div class="contact-box"> 
                 <h4>Contact Us  </h4>
                 <p>If you've got fantastic _or want to collaborate,  out to us.  </p>
                 <div class="contact-form">  
                 @include(welcomeTheme().'.alerts')
                 <form  action="{{route('contactMail')}}" method="post">
                    @csrf
                    <div class="row gy-4">
                     <div class="col-12"> 
                       <label class="form-label" for="inputEmail4">Full Name  </label>
                       <input class="form-control" id="inputEmail4" type="text" name="name" value="" placeholder="Enter Full Name" />
                       @if ($errors->has('name'))
                        <p style="color: red; margin: 0;">{{ $errors->first('name') }}</p>
                        @endif
                     </div>
                     <div class="col-6">
                       <label class="form-label" for="inputEmail5">Email Address </label>
                       <input class="form-control" id="inputEmail5" type="email" name="email" value="" placeholder="Enter Email Address" />
                       @if ($errors->has('email'))
                        <p style="color: red; margin: 0;">{{ $errors->first('email') }}</p>
                        @endif
                     </div>
                     <div class="col-6">
                       <label class="form-label" for="inputEmail6">Phone Number </label>
                       <input class="form-control" id="inputEmail6" type="number" name="mobile" value="" placeholder="Enter Phone Number" />
                       @if ($errors->has('mobile'))
                        <p style="color: red; margin: 0;">{{ $errors->first('mobile') }}</p>
                        @endif
                     </div>
                     <div class="col-12"> 
                       <label class="form-label" for="inputEmail7">Subject </label>
                       <input class="form-control" id="inputEmail7" type="text" name="subject" value="" placeholder="Enter Subject" />
                       @if ($errors->has('subject'))
                        <p style="color: red; margin: 0;">{{ $errors->first('subject') }}</p>
                        @endif
                     </div>
                     <div class="col-12"> 
                       <label class="form-label">Message </label>
                       <textarea class="form-control" id="message" type="text" name="message" value="" rows="6" placeholder="Enter Your Message"></textarea>
                        @if ($errors->has('message'))
                        <p style="color: red; margin: 0;">{{ $errors->first('message') }}</p>
                        @endif
                     </div>
                     <div class="col-12"> 
                       <button class="btn btn_black rounded sm" type="submit"> Send Message  </button>
                     </div>
                   </div>
                   </form>
                 </div>
               </div>
             </div>
             <div class="col-xl-5 col-lg-6 order-lg-2 order-1 offset-xl-1">
               <div class="contact-img">  <img class="img-fluid" src="{{asset('welcome/assets/images/contact/1.svg')}}" alt="" /></div>
             </div>
           </div>
         </div>
       </div>
     </section>


@endsection @push('js') @endpush