@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$page->seo_title?:websiteTitle($page->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title?:general()->meta_title}}" />
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

  <!-- ===================== TOP BRANDS ===================== -->
  <section class="section">
       <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="section-title mb-0">{{$page->name}}</h2>
      <!--<a href="#" class="btn btn-sm rounded-pill px-3" style="background:var(--pink-light);color:var(--pink);font-weight:600;">All Brands <i class="fa-solid fa-chevron-right ms-1"></i></a>-->
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


@endsection @push('js') @endpush