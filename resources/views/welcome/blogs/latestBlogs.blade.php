@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{$page->seo_title?:websiteTitle($page->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title?:websiteTitle($page->name)}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
<meta name="url" property="og:url" content="{{route('pageView',$page->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('pageView',$page->slug?:'no-title')}}">
@endsection @push('css')
<style>
	.heading-banner h4 {
    background: #e6007e;
    display: block;
    padding: 40px 20px;
    color: #fff;
    border-radius: 20px;
}


/* =====================================
   BLOG CARD
===================================== */

.blogGrid {
    background: #fff;
    border: 1px solid #eeeeee;
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.3s ease;
    height: 100%;
}

.blogGrid:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
}


/* =====================================
   IMAGE
===================================== */

.blogGrid .image {
    position: relative;
    height: 230px;
    overflow: hidden;
}

.blogGrid .image > a:first-child {
    display: block;
    width: 100%;
    height: 100%;
}

.blogGrid .image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s ease;
}

.blogGrid:hover .image img {
    transform: scale(1.05);
}


/* =====================================
   CATEGORY
===================================== */

.blogGrid .ctg {
    position: absolute;
    left: 15px;
    bottom: 15px;

    display: inline-block;

    background: #0ba350;
    color: #fff;

    padding: 6px 12px;
    border-radius: 4px;

    font-size: 12px;
    font-weight: 500;

    text-decoration: none;
}

.blogGrid .ctg:hover {
    background: #078942;
    color: #fff;
}


/* =====================================
   TITLE
===================================== */

.blogGrid .title {
    padding: 16px 15px 10px;
}

.blogGrid .title a {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;

    color: #222;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.45;

    text-decoration: none;

    transition: color 0.3s ease;
}

.blogGrid .title a:hover {
    color: #0ba350;
}


/* =====================================
   AUTHOR / DATE
===================================== */

.blogGrid .author {
    border-top: 1px solid #eeeeee;
    padding: 11px 15px 13px;

    color: #888;
    font-size: 13px;
}

.blogGrid .author i {
    color: #0ba350;
    margin-right: 4px;
}

.blogGrid .author a {
    color: #555;
    text-decoration: none;
    margin-left: 2px;
}

.blogGrid .author a:hover {
    color: #0ba350;
}


/* =====================================
   MOBILE
===================================== */

@media (max-width: 767px) {

    .blogGrid .image {
        height: 210px;
    }

    .blogGrid .title {
        padding: 14px 12px 9px;
    }

    .blogGrid .title a {
        font-size: 16px;
    }

    .blogGrid .author {
        padding: 10px 12px;
        font-size: 12px;
    }

}
.blogname a {
    color: #000;
    text-decoration: none;
    font-size: 20px;
    text-align: center;
    display: block;
    padding: 20px;
}
.blogCompany {
    margin: 50px 0;
}
</style>
@endpush 
@section('contents')



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

<div class="blogCompany">
    <div class="container">
		<div class="row">
            @foreach($posts as $post)
            <div class="col-md-3">
                @include(welcomeTheme().'blogs.includes.blogGrid')
            </div>
            @endforeach
        </div>
		<!-- pagination -->
		{{$posts->links(welcomeTheme().'blogs.pagination')}}
	</div>
</div>











@endsection @push('js') @endpush