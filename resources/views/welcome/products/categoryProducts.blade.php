@extends(welcomeTheme().'layouts.app') @section('title')
<title>{{websiteTitle($category->seo_title?:$category->name)}}</title>
@endsection @section('SEO')
<meta name="title" property="og:title" content="{{websiteTitle($category->seo_title?:$category->name)}}" />
<meta name="description" property="og:description" content="{!!$category->seo_description?:general()->meta_description!!}" />
<meta name="keywords" content="{{$category->seo_keyword?:general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($category->image())}}" />
<meta name="url" property="og:url" content="{{route('productCategory',$category->slug?:'no-title')}}" />
<link rel="canonical" href="{{route('productCategory',$category->slug?:'no-title')}}">
@endsection @push('css')

<style>




 :root{
    --pink:#e6007e;
    --pink-dark:#c4006b;
    --text-dark:#222;
    --text-muted:#777;
    --border-color:#e7e7e7;
    --bg-light:#f7f7f7;
  }
  body{
    font-family: "Segoe UI", Arial, sans-serif;
    color: var(--text-dark);
    background:#fff;
    font-size: 14px;
  }
  a{ text-decoration:none; }

  /* Breadcrumb */
  .breadcrumb-bar{
    background:#fff;
    padding:10px 0;
    font-size:15px;
    margin: 20px 0;
  }
  .breadcrumb-bar a{ color:var(--text-muted); }
  .breadcrumb-bar .current{ color:var(--pink); font-weight:600; }
  .breadcrumb-bar i.fa-chevron-right{ font-size:9px; margin:0 6px; color:#bbb; }

  /* Sidebar */
  .sidebar-card{
    border:1px solid var(--border-color);
    border-radius:6px;
    padding:16px;
    margin-bottom:16px;
    background: #fff;
  }
  .sidebar-title{
    font-weight:700;
    font-size:14px;
    text-transform:uppercase;
    letter-spacing:.3px;
    margin-bottom:14px;
    display:flex;
    justify-content:space-between;
    align-items:center;
  }
  .price-inputs{
    display:flex;
    align-items:center;
    gap:8px;
    margin-bottom:12px;
  }
  .price-inputs input[type="number"]{
    width:100%;
    border:1px solid var(--border-color);
    border-radius:4px;
    padding:6px 8px;
    font-size:13px;
  }
  .price-inputs .dash{ color:#aaa; }
  .btn-pink{
    background-color: var(--pink);
    border-color: var(--pink);
    color:#fff;
    font-weight:600;
    letter-spacing:.3px;
  }
  .btn-pink:hover{
    background-color: var(--pink-dark);
    border-color: var(--pink-dark);
    color:#fff;
  }
  .form-range::-webkit-slider-thumb{ background:var(--pink); }
  .form-range::-moz-range-thumb{ background:var(--pink); }

  .category-list{ list-style:none; padding:0; margin:0; }
  .category-list > li{
    border-bottom:1px solid #f0f0f0;
    display: block;
  }
  .category-list > li:last-child{ border-bottom:none; }
  .category-toggle{
    display:flex;
    align-items:center;
    justify-content:space-between;
    width:100%;
    background:none;
    border:none;
    padding:9px 0;
    font-size:13.5px;
    color:var(--text-dark);
    text-align:left;
  }
  .category-toggle.active{ color:var(--pink); font-weight:600; }
  .category-toggle .toggle-left{
    display:flex;
    align-items:center;
    gap:6px;
  }
  .category-toggle .cat-count{
    font-size:11.5px;
    color:#aaa;
    font-weight:400;
  }
  .category-toggle.active .cat-count{ color:var(--pink); }
  .category-toggle .fa-chevron-down{
    font-size:11px;
    color:#aaa;
    transition:transform .2s;
  }
  .category-toggle[aria-expanded="true"] .fa-chevron-down{ transform:rotate(180deg); }
  .subcategory-list{
    list-style:none;
    padding:0 0 8px 14px;
    margin:0;
  }
  .subcategory-list li a{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:5px 0;
    color:var(--text-muted);
    font-size:13px;
  }
  .subcategory-list li a:hover{ color:var(--pink); }
  .subcategory-list li a .cat-count{
    font-size:11.5px;
    color:#bbb;
  }

  .filter-search{
    position:relative;
    margin-bottom:10px;
  }
  .filter-search input{
    width:100%;
    border:1px solid var(--border-color);
    border-radius:4px;
    padding:6px 30px 6px 10px;
    font-size:13px;
  }
  .filter-search i{
    position:absolute;
    right:10px;
    top:50%;
    transform:translateY(-50%);
    color:#aaa;
    font-size:12px;
  }
  .filter-scroll{
    max-height:180px;
    overflow-y:auto;
    padding-right:4px;
  }
  .filter-scroll::-webkit-scrollbar{ width:5px; }
  .filter-scroll::-webkit-scrollbar-thumb{ background:#ddd; border-radius:4px; }

  .form-check-input:checked{
    background-color:var(--pink);
    border-color:var(--pink);
  }
  label.form-check-label {
    margin-top: 0;
}
  .form-check-label{
    font-size:13px;
    color:#444;
  }
  .form-check-label .count{
    color:#aaa;
    font-size:12px;
  }
  .rating-stars{ color:#f5a623; font-size:12px; margin-left:4px; }

  /* Main header row */
  .listing-header{
    display:flex;
    flex-wrap:wrap;
    align-items:center;
    justify-content:space-between;
    gap:12px;
    margin-bottom:18px;
  }
  .listing-header h1{
    font-size:22px;
    font-weight:700;
    margin:0;
  }
  .show-toggle{
    display:flex;
    border:1px solid var(--border-color);
    border-radius:4px;
    overflow:hidden;
  }
  .show-toggle button{
    border:none;
    background:#fff;
    padding:5px 11px;
    font-size:13px;
    color:#555;
    border-right:1px solid var(--border-color);
  }
  .show-toggle button:last-child{ border-right:none; }
  .show-toggle button.active{
    background:var(--pink);
    color:#fff;
    font-weight:600;
  }
  .result-count{ font-size:13px; color:var(--text-muted); }
  .sort-select{
    border:1px solid var(--border-color);
    border-radius:4px;
    padding:6px 10px;
    font-size:13px;
    color:#444;
    background:#fff;
  }

  /* Product card */
  .product-card{
    border:1px solid var(--border-color);
    border-radius:8px;
    overflow:hidden;
    height:100%;
    display:flex;
    flex-direction:column;
    transition:box-shadow .2s;
    background:#fff;
  }
  .product-card:hover{ box-shadow:0 4px 14px rgba(0,0,0,.08); }
  .product-thumb{
    position:relative;
    background:#fafafa;
    aspect-ratio:1/1;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
  }

  .badge-stock{
    position:absolute;
    top:8px;
    left:8px;
    background:#e9e9e9;
    color:#777;
    font-size:10.5px;
    font-weight:600;
    padding:3px 8px;
    border-radius:3px;
    text-transform:uppercase;
  }
  .badge-stock.out{ background:#f8d7da; color:#b02a37; }
  .badge-stock.in{ background:#d4edda; color:#1e7e34; }

  .thumb-actions{
    position:absolute;
    top:10px;
    right:-40px;
    display:flex;
    flex-direction:column;
    gap:8px;
    opacity:0;
    transition:right .35s ease, opacity .35s ease;
    z-index:2;
  }
  .product-card:hover .thumb-actions{
    right:10px;
    opacity:1;
  }
  .thumb-actions button{
    width:32px;
    height:32px;
    border-radius:50%;
    border:1px solid var(--border-color);
    background:#fff;
    color:#555;
    font-size:13px;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 2px 6px rgba(0,0,0,.08);
    transition:background .2s, color .2s, transform .2s;
  }
  .thumb-actions button:nth-child(1){ transition-delay:.03s; }
  .thumb-actions button:nth-child(2){ transition-delay:.08s; }
  .thumb-actions button:nth-child(3){ transition-delay:.13s; }
  .thumb-actions button:hover{
    background:var(--pink);
    border-color:var(--pink);
    color:#fff;
    transform:scale(1.08);
  }
  .thumb-actions button.active{
    background:var(--pink);
    border-color:var(--pink);
    color:#fff;
  }
  .thumb-actions button{
    position:relative;
  }
  .thumb-actions button::after{
    content:attr(data-tooltip);
    position:absolute;
    right:calc(100% + 10px);
    top:50%;
    transform:translateY(-50%) translateX(6px);
    background:#222;
    color:#fff;
    font-size:11px;
    font-weight:500;
    white-space:nowrap;
    padding:5px 10px;
    border-radius:4px;
    opacity:0;
    pointer-events:none;
    transition:opacity .2s ease, transform .2s ease;
  }
  .thumb-actions button::before{
    content:"";
    position:absolute;
    right:calc(100% + 4px);
    top:50%;
    transform:translateY(-50%) translateX(6px);
    border:5px solid transparent;
    border-left-color:#222;
    opacity:0;
    pointer-events:none;
    transition:opacity .2s ease, transform .2s ease;
  }
  .thumb-actions button:hover::after,
  .thumb-actions button:hover::before{
    opacity:1;
    transform:translateY(-50%) translateX(0);
  }
  .product-body{
    padding:12px 14px 14px;
    display:flex;
    flex-direction:column;
    flex-grow:1;
  }
  .product-brand{
    font-size:11px;
    color:var(--text-muted);
    text-transform:uppercase;
    letter-spacing:.4px;
    margin-bottom:3px;
  }
  .product-title{
    font-size:13.5px;
    font-weight:600;
    color:var(--text-dark);
    line-height:1.35;
    margin-bottom:6px;
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
    min-height:37px;
  }
  .product-rating{
    font-size:12px;
    color:#f5a623;
    margin-bottom:6px;
  }
  .product-rating .rating-count{
    color:var(--text-muted);
    margin-left:4px;
  }
  .product-price{
    font-size:15px;
    font-weight:700;
    color:var(--pink);
    margin-bottom:2px;
  }
  .product-price .old-price{
    font-size:12px;
    font-weight:400;
    color:#aaa;
    text-decoration:line-through;
    margin-left:6px;
  }
  .product-sku{
    font-size:10.5px;
    color:#bbb;
    margin-bottom:10px;
  }
  .product-actions{
    margin-top:auto;
    display:flex;
    gap:6px;
  }
  .btn-add-cart, .btn-buy-now{
    flex:1;
    width:100%;
    font-size:12.5px;
    font-weight:600;
    padding:8px 4px;
    border-radius:4px;
    letter-spacing:.1px;
    white-space:nowrap;
  }
  .btn-add-cart{
    background:#fff;
    border:1.5px solid var(--pink);
    color:var(--pink);
  }
  .btn-add-cart:hover{ background:#fdeaf3; color:var(--pink-dark); border-color:var(--pink-dark); }
  .btn-buy-now{
    background:var(--pink);
    border:1.5px solid var(--pink);
    color:#fff;
  }
  .btn-buy-now:hover{ background:var(--pink-dark); border-color:var(--pink-dark); color:#fff; }
  .btn-add-cart:disabled, .btn-buy-now:disabled{
    background:#e0e0e0;
    border-color:#e0e0e0;
    color:#999;
  }
  .stock-note{
    font-size:11px;
    color:var(--text-muted);
    text-align:center;
    margin-top:6px;
  }

  .mobile-filter-btn{
    display:none;
  }

  @media (max-width: 991.98px){
    .sidebar-col{
      display:none;
    }
    .sidebar-col.show-mobile{
      display:block;
    }
    .mobile-filter-btn{
      display:inline-flex;
    }
    .listing-header h1{ font-size:19px; }
  }

  @media (max-width: 575.98px){
    .listing-header{
      flex-direction:column;
      align-items:flex-start;
    }
    .listing-header .header-right{
      width:100%;
      justify-content:space-between;
    }
    .product-title{ font-size:12.5px; }
    .product-price{ font-size:14px; }
  }

  .offcanvas-header{ border-bottom:1px solid var(--border-color); }

  /* Filters cloned into the mobile offcanvas reuse all sidebar-card
     styling above automatically. A little extra breathing room here. */
  #offcanvasFilterBody .sidebar-card{
    margin-bottom:14px;
  }




/* =========================
   Category Banner
========================= */

.categoryBannerImg {
    width: 100%;
    margin-bottom: 45px;
    overflow: hidden;
}

.categoryBannerImg img {
    width: 100%;
    height: auto;
    display: block;
    object-fit: cover;
}


/* =========================
   Main Category Title
========================= */

.ctgMainTitle {
    font-size: 28px;
    font-weight: 500;
    color: #222;
    margin: 0 0 25px;
}


/* =========================
   Category Grid
========================= */

.category-grid {
    margin-left: -10px;
    margin-right: -10px;
}

.category-grid > [class*="col-"] {
    padding-left: 10px;
    padding-right: 10px;
    margin-bottom: 20px;
}


/* =========================
   Category Card
========================= */

.category-block {
    background: #fff;
    border-radius: 10px;
    min-height: 250px;
    padding: 28px 30px;
    height: 100%;
    transition: all 0.3s ease;
}

.category-block:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
    transform: translateY(-2px);
}


/* =========================
   Category Inner
========================= */

.category-inner {
    display: flex;
    align-items: flex-start;
    gap: 25px;
}


/* =========================
   Category Icon
========================= */

.category-icons {
    width: 115px;
    min-width: 115px;
    height: 130px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.category-icons img {
    max-width: 100%;
    max-height: 115px;
    object-fit: contain;
}

.category-icon i {
    font-size: 75px;
    color: #d51679;
}


/* =========================
   Category Content
========================= */

.category-content {
    flex: 1;
    min-width: 0;
}


/* =========================
   Header
========================= */

.layoutHader {
    margin-bottom: 10px;
}

.ctglayoutHader {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.productCatgroyRow {
    padding-bottom: 40px;
}

.layoutHader h4 {
    margin: 0 0 18px;
    font-size: 14px;
    line-height: 1.4;
    font-weight: 600;
    color: #151515;
    text-transform: uppercase;
}


/* =========================
   View All
========================= */

.viewAll {
    display: inline-block;
    text-decoration: none;
    background-color: #E1EBFF;
    border-color: #E1EBFF;
    color: #1C61E7;
    padding: 8px 35px;
    border-radius: 34px;
    font-size: 20px;
}

/* =========================
   Product / Category Links
========================= */

.category-links {
    display: flex;
    flex-direction: column;
}

.category-links a {
    display: block;
    color: #777;
    font-size: 14px;
    line-height: 1.5;
    text-decoration: none;
    margin-bottom: 12px;
    transition: all 0.2s ease;
}

.category-links a:hover {
    color: #d51679;
    padding-left: 3px;
}


/* =========================
   Body Background
========================= */

.category-page {
    background: #f7f7f7;
}


/* =========================
   Mobile
========================= */

@media (max-width: 767px) {

    .categoryBannerImg {
        margin-bottom: 25px;
    }

    .ctgMainTitle {
        font-size: 23px;
        margin-bottom: 20px;
    }

    .category-grid > [class*="col-"] {
        margin-bottom: 15px;
    }

    .category-block {
        padding: 22px 18px;
        min-height: auto;
    }

    .category-inner {
        gap: 15px;
    }



    .category-icon img {
        max-height: 85px;
    }

    .category-icon i {
        font-size: 55px;
    }

    .layoutHader h4 {
        font-size: 13px;
        margin-bottom: 12px;
    }

    .category-links a {
        font-size: 13px;
        margin-bottom: 9px;
    }
}


/* =========================
   Very Small Mobile
========================= */

@media (max-width: 480px) {

    .category-block {
        padding: 18px 15px;
    }

    .category-inner {
        gap: 10px;
    }



    .category-links a {
        font-size: 12px;
    }
}


.subSubCtg {
    margin: 0;
    padding: 0;
}

.subSubCtg li {list-style: none;}

.subSubCtg li a {
    color: #444;
    display: block;
    margin-bottom: 6px;
}

.subcategory-list li {
    display: block;
}
ul.widget-card {
    margin: 0;
    padding: 0;
}

</style>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "{{ $category->name }}",
  "url": "{{ url()->current() }}",
  "mainEntity": {
    "@type": "ItemList",
    "itemListElement": [
      @foreach($products as $index => $product)
      {
        "@type": "ListItem",
        "position": {{ $index + 1 }},
        "url": "{{route('productView',$product->slug?:Str::slug($product->name))}}"
      }@if(!$loop->last),@endif
      @endforeach
    ]
  }
}
</script>


@endpush 

@section('contents')

<div class="container">

    {{-- =========================================================
        PARENT CATEGORY WITH SUBCATEGORIES GRID VIEW
    ========================================================== --}}
    @if(($subCtg->count() > 0) && is_null(optional($category)->parent_id))
    
        <div class="categoryBannerImg mt-4">
            <img src="{{ asset($category->banner()) }}" alt="{{ $category->name ?? 'Category Banner' }}">
        </div>

        <h4 class="ctgMainTitle text-center">{{ $category->name ?? '' }}</h4>

        <div class="row category-grid">
            @foreach($subCtg as $ctg)
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="category-block">
                        <div class="category-inner">
                            {{-- Category Icon --}}
                            <div class="category-icons">
                                <img src="{{ asset($ctg->image()) }}" alt="{{ $ctg->name }}" />
                            </div>

                            {{-- Category Content --}}
                            <div class="category-content">
                                <div class="layoutHader">
                                    <a href="{{ route('productCategory', $ctg->slug ?: 'no-title') }}" class="ctgTtile">
                                        <h4>{{ $ctg->name }}</h4>
                                    </a>
                                </div>

                                <ul class="subSubCtg">
                                    @foreach($ctg->subctgs()->where('status', 'active')->get() as $sCtg)
                                        <li>
                                            <a href="{{ route('productCategory', $sCtg->slug ?: 'no-title') }}">
                                                {{ $sCtg->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="productCategoryLayout">
            <div class="container">
                @if($category && $subCtg->count() > 0)
                    @foreach($subCtg as $ctg)
                        <div class="productCatgroyRow mt-4">
                            <div class="ctglayoutHader">
                                <h4>{{ $ctg->name }}</h4>
                                <div>
                                    <a href="{{ route('productCategory', $ctg->slug ?: 'no-title') }}" class="viewAll">View All</a>
                                </div>
                            </div>

                            <div class="row">
                                @php
                                    $categoryProducts = \App\Models\Post::whereHas('ctgProducts', function ($q) use ($ctg) {
                                        $q->where('reff_id', $ctg->id);
                                    })
                                    ->where('status', 'active')
                                    ->limit(8)
                                    ->get();
                                @endphp

                                @foreach($categoryProducts as $product)
                                    <div class="col-md-3">
                                        <div class="product-item">
                                            @include(welcomeTheme().'products.includes.productCard')
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

    @else

    {{-- =========================================================
        INNER CATEGORY / LISTING VIEW WITH SIDEBAR FILTERS
    ========================================================== --}}

        <!-- Breadcrumb -->
        <div class="breadcrumb-bar">
            <div class="container">
                <a href="{{ url('/') }}">
                    <i class="fa-solid fa-house"></i> Home
                </a>

                @if($category)
                    <i class="fa-solid fa-chevron-right"></i>
                    <a href="{{ route('productCategory', $category->slug ?: 'no-title') }}">
                        {{ $category->name }}
                    </a>
                @endif

                @if(!empty($ctg))
                    <i class="fa-solid fa-chevron-right"></i>
                    <span class="current">{{ $ctg->name }}</span>
                @endif
            </div>
        </div>

        <div class="row">

            {{-- DESKTOP SIDEBAR — also the single source of truth for the
                 AJAX filter's serialize() call (see the JS at the bottom),
                 hence the "proSideBar" class. The mobile clone below never
                 carries this class, so filter values are always read from
                 here regardless of which panel (desktop or mobile) the
                 customer actually used. --}}
            <aside class="col-lg-3 sidebar-col proSideBar d-none d-lg-block">

                <input type="hidden" value="" class="inputShortBy" name="short_by">

                {{-- PRICE FILTER --}}
                @if($maxPrice > 0)
                    <div class="sidebar-card">
                        <div class="sidebar-title">My Price</div>

                        <div class="price-inputs">
                            <input 
                                type="number" 
                                id="minPrice" 
                                class="filterAction" 
                                name="min_price" 
                                value="{{ $minPrice }}" 
                                min="{{ $minPrice }}" 
                                max="{{ $maxPrice }}"
                            >
                            <span class="dash">—</span>
                            <input 
                                type="number" 
                                id="maxPrice" 
                                class="filterAction" 
                                name="max_price" 
                                value="{{ $maxPrice }}" 
                                min="{{ $minPrice }}" 
                                max="{{ $maxPrice }}"
                            >
                        </div>

                        <input 
                            type="range" 
                            class="form-range mb-3 filterAction" 
                            min="{{ $minPrice }}" 
                            max="{{ $maxPrice }}" 
                            value="{{ $maxPrice }}" 
                            step="100" 
                            name="max_price" 
                            id="priceRange"
                        >

                        <button type="button" class="btn btn-pink w-100 price-filter-btn">
                            Filter
                        </button>
                    </div>
                @endif

                {{-- CATEGORIES FILTER --}}
                @if($categories->count() > 0)
                    <div class="sidebar-card">
                        <div class="sidebar-title">All Categories</div>

                        <ul class="category-list">
                            @foreach($categories as $ctgItem)
                                @php
                                    $subCategories = $ctgItem->subctgs ? $ctgItem->subctgs->where('status', 'active') : collect();
                                    $hasSubCategory = $subCategories->count() > 0;
                                    $isParentActive = isset($category) && $category && $category->id == $ctgItem->id;
                                @endphp

                                <li>
                                    @if($hasSubCategory)
                                        <button 
                                            class="category-toggle {{ $isParentActive ? 'active' : '' }}" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#categoryCollapse{{ $ctgItem->id }}" 
                                            aria-expanded="{{ $isParentActive ? 'true' : 'false' }}"
                                        >
                                            <span class="toggle-left">
                                                <input 
                                                    type="checkbox" 
                                                    class="custom-checkbox filterAction category-checkbox" 
                                                    id="category{{ $ctgItem->id }}" 
                                                    value="{{ $ctgItem->id }}" 
                                                    name="ctgs[]" 
                                                    {{ $isParentActive ? 'checked' : '' }} 
                                                    onclick="event.stopPropagation();"
                                                >
                                                <label for="category{{ $ctgItem->id }}" onclick="event.stopPropagation();">
                                                    {{ $ctgItem->name }}
                                                </label>

                                                @if(method_exists($ctgItem, 'posts'))
                                                    <span class="cat-count">({{ $ctgItem->posts()->count() }})</span>
                                                @endif
                                            </span>
                                            <i class="fa-solid fa-chevron-down"></i>
                                        </button>

                                        <div class="collapse {{ $isParentActive ? 'show' : '' }}" id="categoryCollapse{{ $ctgItem->id }}">
                                            <ul class="subcategory-list">
                                                @foreach($subCategories as $sctg)
                                                    @php
                                                        $subSubCategories = $sctg->subctgs ? $sctg->subctgs->where('status', 'active') : collect();
                                                        $isSubActive = isset($category) && $category && $category->id == $sctg->id;
                                                    @endphp

                                                    <li>
                                                        <div class="subcategory-item">
                                                            <input 
                                                                class="custom-checkbox filterAction category-checkbox" 
                                                                id="category{{ $sctg->id }}" 
                                                                type="checkbox" 
                                                                value="{{ $sctg->id }}" 
                                                                name="ctgs[]" 
                                                                {{ $isSubActive ? 'checked' : '' }}
                                                            >
                                                            <label for="category{{ $sctg->id }}">
                                                                <span>{{ $sctg->name }}</span>
                                                                @if(method_exists($sctg, 'posts'))
                                                                    <span class="cat-count">({{ $sctg->posts()->count() }})</span>
                                                                @endif
                                                            </label>
                                                        </div>

                                                        {{-- LEVEL 3 --}}
                                                        @if($subSubCategories->count() > 0)
                                                            <ul class="subcategory-list sub-level">
                                                                @foreach($subSubCategories as $ssctg)
                                                                    @php
                                                                        $isSubSubActive = isset($category) && $category && $category->id == $ssctg->id;
                                                                    @endphp
                                                                    <li>
                                                                        <div class="subcategory-item">
                                                                            <input 
                                                                                class="custom-checkbox filterAction category-checkbox" 
                                                                                id="category{{ $ssctg->id }}" 
                                                                                type="checkbox" 
                                                                                value="{{ $ssctg->id }}" 
                                                                                name="ctgs[]" 
                                                                                {{ $isSubSubActive ? 'checked' : '' }}
                                                                            >
                                                                            <label for="category{{ $ssctg->id }}">
                                                                                <span>{{ $ssctg->name }}</span>
                                                                                @if(method_exists($ssctg, 'posts'))
                                                                                    <span class="cat-count">({{ $ssctg->posts()->count() }})</span>
                                                                                @endif
                                                                            </label>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <div class="category-simple-item">
                                            <input 
                                                class="custom-checkbox filterAction category-checkbox" 
                                                id="category{{ $ctgItem->id }}" 
                                                type="checkbox" 
                                                value="{{ $ctgItem->id }}" 
                                                name="ctgs[]" 
                                                {{ $isParentActive ? 'checked' : '' }}
                                            >
                                            <label for="category{{ $ctgItem->id }}">
                                                <span>{{ $ctgItem->name }}</span>
                                                @if(method_exists($ctgItem, 'posts'))
                                                    <span class="cat-count">({{ $ctgItem->posts()->count() }})</span>
                                                @endif
                                            </label>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- ATTRIBUTES / COLOR --}}
                @foreach($attributes as $attri)
                    <div class="sidebar-card">
                        <div class="sidebar-title">{{ $attri->name ?? 'Filter' }}</div>
                        <div class="color-box">
                            <ul class="color-variant">
                                @if(isset($attri->values) && count($attri->values) > 0)
                                    @foreach($attri->values as $value)
                                        <li 
                                            class="filterAction" 
                                            data-value="{{ $value->id }}" 
                                            title="{{ $value->name }}" 
                                            style="background-color: {{ $value->color ?? '#ddd' }}; cursor: pointer;"
                                        ></li>
                                    @endforeach
                                @else
                                    <li class="bg-color-purple"></li>
                                    <li class="bg-color-blue"></li>
                                    <li class="bg-color-red"></li>
                                    <li class="bg-color-yellow"></li>
                                    <li class="bg-color-coffee"></li>
                                    <li class="bg-color-chocolate"></li>
                                    <li class="bg-color-brown"></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endforeach

                {{-- SHIPPING & DELIVERY --}}
                <div class="sidebar-card">
                    <div class="sidebar-title">Shipping & Delivery</div>
                    <ul class="widget-card">
                        <li>
                            <i class="iconsax" data-icon="truck-fast"></i>
                            <div>
                                <h6>Free Shipping</h6>
                                <p>Free shipping for all orders</p>
                            </div>
                        </li>
                        <li>
                            <i class="iconsax" data-icon="headphones"></i>
                            <div>
                                <h6>Support 24/7</h6>
                                <p>Contact us anytime</p>
                            </div>
                        </li>
                        <li>
                            <i class="iconsax" data-icon="exchange"></i>
                            <div>
                                <h6>30 Days Return</h6>
                                <p>Easy return policy</p>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- RESET BUTTON --}}
                <div class="mt-3 mb-4">
                    <a href="{{ route('productCategory', optional($category)->slug ?: 'no-title') }}" class="btn btn-danger w-100">
                        Reset All
                    </a>
                </div>

            </aside>

            {{-- MOBILE FILTER OFFCANVAS — body is filled automatically by
                 the script at the bottom of this page (it clones the
                 desktop sidebar above). Leave it empty here. --}}
            <div class="offcanvas offcanvas-start" tabindex="-1" id="filterOffcanvas">
                <div class="offcanvas-header">
                    <h5 class="mb-0">
                        <i class="fa-solid fa-sliders me-2"></i> Filters
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>

                <div class="offcanvas-body" id="offcanvasFilterBody">
                    
                </div>
            </div>

            {{-- MAIN CONTENT PRODUCT LIST --}}
            <main class="col-lg-9">
                <div class="listing-header">
                    <div class="d-flex align-items-center gap-3">
                        <h1>{{ $category->name ?? 'All Products' }}</h1>

                        <button 
                            type="button" 
                            class="btn btn-outline-secondary btn-sm mobile-filter-btn d-lg-none align-items-center gap-2" 
                            data-bs-toggle="offcanvas" 
                            data-bs-target="#filterOffcanvas"
                        >
                            <i class="fa-solid fa-sliders"></i> Filter
                        </button>
                    </div>

                    <div class="d-flex align-items-center gap-3 header-right flex-wrap">
                        {{-- Dynamic Result Count --}}
                        <span class="result-count">
                            Showing 
                            <span class="result-start">1</span> – 
                            <span class="result-end">{{ method_exists($products, 'count') ? $products->count() : 0 }}</span> 
                            of 
                            <span class="result-total">{{ method_exists($products, 'total') ? $products->total() : (method_exists($products, 'count') ? $products->count() : 0) }}</span> 
                            results
                        </span>

                        {{-- Sorting --}}
                        <select class="sort-select form-select shortBy filterAction" name="short_by">
                            <option value="latest">Latest Product</option>
                            <option value="best_selling">Best Selling</option>
                            <option value="featured">Featured</option>
                            <option value="high_to_low">High - Low Price</option>
                            <option value="low_to_high">Low - High Price</option>
                        </select>
                    </div>
                </div>

                {{-- PRODUCT GRID CONTAINER (AJAX REFRETCH TARGET) --}}
                <div class="product-tab-content ratio1_3 ajaxProductList">
                    @include(welcomeTheme().'products.includes.productsAll')
                </div>
            </main>

        </div>

    @endif
</div>


@endsection 
@push('js')

<script>
$(function () {

    // ---------------------------------------------------------------
    // MOBILE FILTER PANEL
    // Clone the desktop sidebar into the offcanvas so mobile users see
    // the exact same filters. Every id / data-bs-target / label[for]
    // inside the clone is renamed with a "mobile-" prefix so there are
    // no duplicate IDs on the page (this is what keeps the category
    // collapse and price slider working correctly inside the panel).
    // The clone never carries the "proSideBar" class — the AJAX filter
    // below always serializes values from the real desktop sidebar,
    // and any change made inside the mobile clone is mirrored onto the
    // matching desktop input, so filtering stays correct no matter
    // which panel (desktop or mobile) the customer actually used.
    // ---------------------------------------------------------------
    var $sidebar    = $('.sidebar-col');
    var $mobileBody = $('#offcanvasFilterBody');

    if ($sidebar.length && $mobileBody.length && !$mobileBody.data('filled')) {

        var $clone = $sidebar.clone();
        $clone.removeClass('d-none d-lg-block col-lg-3 sidebar-col proSideBar');

        // Give every id in the clone a "mobile-" prefix and remember
        // the original id so we can sync values back to it.
        $clone.find('[id]').each(function () {
            var originalId = this.id;
            $(this).attr('data-source-id', originalId);
            this.id = 'mobile-' + originalId;
        });

        // Fix collapse targets so category dropdowns still expand
        // correctly inside the clone.
        $clone.find('[data-bs-target]').each(function () {
            var target = $(this).attr('data-bs-target');
            if (target && target.charAt(0) === '#') {
                $(this).attr('data-bs-target', '#mobile-' + target.substring(1));
            }
        });

        // Fix label "for" attributes to match the renamed ids.
        $clone.find('label[for]').each(function () {
            var forAttr = $(this).attr('for');
            if (forAttr) {
                $(this).attr('for', 'mobile-' + forAttr);
            }
        });

        $mobileBody.append($clone).data('filled', true);

        // Mirror any change made inside the mobile panel onto the
        // matching (hidden) desktop input, then let the existing
        // filterAction handler below pick it up as usual.
        $mobileBody.on('input change', '[data-source-id]', function () {
            var $original = $('#' + $(this).attr('data-source-id'));
            if (!$original.length) return;

            if (this.type === 'checkbox' || this.type === 'radio') {
                if ($original.prop('checked') !== this.checked) {
                    $original.prop('checked', this.checked).trigger('change');
                }
            } else if ($original.val() !== this.value) {
                $original.val(this.value).trigger('input');
            }
        });
    }

    // -------------------------------------------------------------
    // RANGE SLIDER MANAGEMENT
    // -------------------------------------------------------------
    var $parent = $(".range-slider");

    if ($parent.length) {
        var $range = $parent.find("input[type=range]");

        function updateValues() {
            var min = parseInt($range.eq(0).val()) || 0;
            var max = parseInt($range.eq(1).val()) || 0;

            if (min > max) {
                var temp = min;
                min = max;
                max = temp;
            }

            $range.eq(0).val(min);
            $range.eq(1).val(max);
        }

        $range.on("input", updateValues);
        updateValues(); // Initialize on load
    }

    // -------------------------------------------------------------
    // SORTING SYNC
    // -------------------------------------------------------------
    $(document).on('change', '.shortBy', function () {
        $('.inputShortBy').val($(this).val());
    });

    // -------------------------------------------------------------
    // AJAX FILTER WITH DEBOUNCE (Server Safety)
    // -------------------------------------------------------------
    var filterTimer;

    function filterAction() {
        var url = "{{ route('productCategoryFilter') }}";
        var formData = $('.proSideBar').find('select, input').serialize();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            cache: false,
            data: formData,
            beforeSend: function () {
                // optional: add a soft opacity loader
                $('.ajaxProductList').css('opacity', '0.6');
            },
            success: function (data) {
                if (data && data.viewData) {
                    $('.ajaxProductList').html(data.viewData);
                }
            },
            error: function (xhr, status, error) {
                console.error("Filter AJAX Error:", error);
            },
            complete: function () {
                $('.ajaxProductList').css('opacity', '1');
            }
        });
    }

    // Trigger filter with 300ms delay to prevent multiple spam requests
    $(document).on('change input', '.filterAction', function () {
        clearTimeout(filterTimer);
        filterTimer = setTimeout(filterAction, 300);
    });
});
</script>

@endpush