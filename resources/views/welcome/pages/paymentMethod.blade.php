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




    body {
            margin: 0;
            padding: 0;
            background: #fff;
            color: #333;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 11px;
        }



        /* =========================
           HEADER
        ========================= */

        .payment-title {
            text-align: center;
            margin-bottom: 4px;
        }

        .payment-title h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 700;
            color: #162d42;
        }

        .intro-text {
            font-size: 9px;
            line-height: 1.45;
            margin-bottom: 10px;
            color: #555;
        }

        /* =========================
           PAYMENT METHOD
        ========================= */

        .payment-method-box {
            background: #f1f1f1;
            padding: 10px;
            margin-bottom: 28px;
        }

        .payment-method-item {
            padding: 0 10px;
        }

        .payment-method-item:not(:last-child) {
            border-right: 1px solid #ccc;
        }

        .payment-method-item h4 {
            font-size: 12px;
            font-weight: 700;
            text-decoration: underline;
            margin: 0 0 5px;
            color: #162d42;
        }

        .payment-image-box {
            height: 62px;
            border: 1px dotted #222;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .payment-image-box img {
            max-width: 95%;
            max-height: 58px;
            object-fit: contain;
        }

        /* =========================
           BANK DETAILS TITLE
        ========================= */

        .details-title {
            text-align: center;
            margin-bottom: 12px;
        }

        .details-title h3 {
            font-size: 16px;
            font-weight: 700;
            color: #162d42;
            margin: 0;
        }

        /* =========================
           BANK TOP ROW
        ========================= */

        .bank-top-item {
            min-height: 105px;
            padding: 0 8px;
        }

        .bank-logo {
            height: 170px;
            border: 1px dotted #222;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 7px;
            background: #fff;
        }

        .bank-logo img {
            max-width: 95%;
            max-height: 80px;
            object-fit: contain;
        }

        .bank-info {
            font-size: 8px;
            line-height: 1.55;
            color: #555;
        }

        .bank-info strong {
            color: #333;
        }

        .routing {
            margin-top: 8px;
            font-size: 8px;
        }

        /* =========================
           SEPARATOR
        ========================= */

        .section-divider {
            border-top: 1px solid #ddd;
            margin: 12px 0 10px;
        }

        /* =========================
           LOWER DETAILS
        ========================= */

        .payment-detail {
            padding: 0 8px 15px;
        }

        .detail-logo {
            width: 140px;
            height: 50px;
            border: 1px dotted #222;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 7px;
        }

        .detail-logo img {
            max-width: 96%;
            max-height: 47px;
            object-fit: contain;
        }

        .detail-content {
            font-size: 8px;
            line-height: 1.55;
            color: #555;
        }

        .detail-content strong {
            color: #333;
        }

        .detail-content p {
            margin: 0;
        }

        .instruction {
            margin-top: 4px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 767px) {

            .payment-page {
                margin: 20px auto;
            }

            .payment-title h2 {
                font-size: 18px;
            }

            .payment-method-item {
                margin-bottom: 15px;
            }

            .payment-method-item:not(:last-child) {
                border-right: 0;
                border-bottom: 1px solid #ccc;
                padding-bottom: 15px;
            }

            .bank-top-item {
                margin-bottom: 18px;
            }

            .payment-detail {
                margin-bottom: 15px;
            }
        }






.bank-info h5 {
    color: #000;
    font-size: 20px;
}

.bank-info {
    font-size: 18px;
    color: #000;
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

  <div class="payment-page">

        <!-- =========================
             TITLE
        ========================== -->

       
<div class="container">
    


        <!-- =========================
             PAYMENT METHODS
        ========================== -->

        {{--<div class="payment-method-box">

            <div class="row g-0">

                <!-- DBBL -->
                <div class="col-md-4 payment-method-item">

                    <h4>DBBL</h4>

                    <div class="payment-image-box">
                        <img src="{{asset('welcome/assets/images/aristo/payment/dach-bangla.png')}}" alt="DBBL">
                    </div>

                </div>


                <!-- BKASH -->
                <div class="col-md-4 payment-method-item">

                    <h4>BKASH</h4>

                    <div class="payment-image-box">
                        <img src="{{asset('welcome/assets/images/aristo/payment/bkash.png')}}" alt="bKash">
                    </div>

                </div>


                <!-- WESTERN UNION -->
                <div class="col-md-4 payment-method-item">

                    <h4>City Bank</h4>

                    <div class="payment-image-box">
                        <img src="{{asset('welcome/assets/images/aristo/payment/citybank_logo.jpg')}}" alt="Western Union">
                    </div>

                </div>

            </div>

        </div>--}}


        <!-- =========================
             BANK DETAILS TITLE
        ========================== -->

        <div class="details-title">
            <h3>Payment Details Information</h3>
        </div>


        <!-- =========================
             TOP BANK DETAILS
        ========================== -->

        <div class="row">

            <!-- DBBL -->
            <div class="col-md-4 bank-top-item">

                <div class="bank-logo">
                    <img src="{{asset('welcome/assets/images/aristo/payment/dach-bangla.png')}}" alt="DBBL">
                </div>

                <div class="bank-info">
                  <h5> Dutch Bangla Bank PLC</h5>
                <b>Account No:</b> 1801510132151
                </div>

                <div class="routing">
    
                </div>

            </div>


            <!-- BANK ASIA -->
            <div class="col-md-4 bank-top-item">

                <div class="bank-logo">
                    <img src="{{asset('welcome/assets/images/aristo/payment/bkash.png')}}" alt="Bank Asia">
                </div>

                <div class="bank-info">
                   <h5>Bkash</h5>
                  <b>Account No:</b> 01736353101
                </div>

            </div>


            <!-- PAYMENT QR -->
            <div class="col-md-4 bank-top-item">

                <div class="bank-logo">
                    <img src="{{asset('welcome/assets/images/aristo/payment/citybank_logo.jpg')}}" alt="Payment QR">
                </div>
                
                 <div class="bank-info">
                  <h5> City Bank PLC</h5>
                <b>Account No:</b> 2304670933001
                </div>

            </div>

        </div>


        <!-- =========================
             DIVIDER
        ========================== -->

        <div class="section-divider"></div>




        </div>
        
        
</div>

    </div>



@endsection @push('js') @endpush