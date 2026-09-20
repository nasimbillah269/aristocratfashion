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


.breadcrumb-section{
    padding: 20px 0;
    background: #7f1979;
}

.breadcrumb-content{
    text-align: center;
}

.breadcrumb-content h2{
       margin-bottom: 0px;
    font-size: 20px;
    font-weight: 600;
    color: #fff;
}

.breadcrumb{
    background: transparent;
    padding: 0;
    margin: 0;
}

.breadcrumb-item a{
    color: #fff;
    text-decoration: none;
}

.breadcrumb-item.active{
    color: #fff;
    font-weight: 500;
}

.categryProductLaout {
    padding: 30px 0;
}

.toolbar-wrap {
    background: #fff;
    padding: 10px 0;
    margin-bottom: 20px;
}

.layout-btn{
    width:42px;
    height:42px;
    border:1px solid #ddd;
    background:#fff;
    border-radius:8px;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
}

.layout-list-icon{
    width:18px;
    height:14px;
    position:relative;
}

.layout-list-icon:before,
.layout-list-icon:after,
.layout-list-icon{
    background-image:
    linear-gradient(#555,#555),
    linear-gradient(#555,#555),
    linear-gradient(#555,#555);
    background-repeat:no-repeat;
    background-size:100% 2px;
    background-position:0 0,0 6px,0 12px;
}

.view-icon{
    display:grid;
    gap:2px;
    width:18px;
    height:18px;
}

.view-icon span{
    background:#666;
    border-radius:2px;
    width:100%;
    height:100%;
}

/* 2 BOX */
.view-2{
    grid-template-columns:repeat(2,1fr);
}

/* 3 BOX */
.view-3{
    grid-template-columns:repeat(3,1fr);
}

/* 4 BOX (2x2 grid) */
.view-4{
    grid-template-columns:repeat(2,1fr);
    grid-template-rows:repeat(2,1fr);
}

/* 5 BOX */
.view-5{
    grid-template-columns:repeat(5,1fr);
}

/* 6 BOX (3x2 grid) */
.view-6{
    grid-template-columns:repeat(3,1fr);
    grid-template-rows:repeat(2,1fr);
}

/* ACTIVE STYLE */
.layout-btn.active,
.layout-btn:hover{
    background:#000;
}

.layout-btn.active .view-icon span,
.layout-btn:hover .view-icon span{
    background:#fff;
}
    
    
    

    /* ---- CARD STYLES ---- */
    .product-card {
        background: #fff;
        overflow: hidden;
        transition: box-shadow .2s;
        height: 100%;
    }
    .product-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,.08); }

    /* List layout */
    .list-view .product-card { display: flex; flex-direction: row; align-items: center;     padding: 10px; border: 1px solid lightgray;
    border-radius: 0;}
    .list-view .card-img-wrap { width: 200px; min-width: 160px; }
    .list-view .card-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
    .list-view .card-body-wrap { padding: 14px 18px; flex: 1; }
    .list-view .card-desc { display: block ; }

    /* Grid layout */
    .grid-view .product-card { flex-direction: column; }
    .grid-view .card-img-wrap { width: 100%;  }
    .grid-view .card-img-wrap img { width: 100%; height: 100%; object-fit: cover; }
    .grid-view .card-body-wrap { padding: 12px 14px; }
    .grid-view .card-desc { display: none !important; }

    /* Tiny grid (4-6 cols) */
    .grid-view.cols-4 .card-img-wrap,
    .grid-view.cols-5 .card-img-wrap,
    .grid-view.cols-4 .card-body-wrap,
    .grid-view.cols-5 .card-body-wrap,
    .grid-view.cols-6 .card-body-wrap { padding: 8px 10px; }
    .grid-view.cols-4 .card-colors,
    .grid-view.cols-5 .card-colors,
    .grid-view.cols-6 .card-colors { display: none !important; }
    .grid-view.cols-4 .card-title,
    .grid-view.cols-5 .card-title,
    .grid-view.cols-6 .card-title { font-size: 12px !important; }
    .grid-view.cols-4 .card-price,
    .grid-view.cols-5 .card-price,
    .grid-view.cols-6 .card-price { font-size: 11px !important; }

    .card-title { font-size: 14px; font-weight: 600; color: #c8860a; margin: 0 0 4px; }
    .card-price { font-size: 13px; font-weight: 600; color: #222; margin: 0 0 4px; }
    .card-colors { font-size: 12px; color: #c8860a; margin: 0 0 8px; }
    .card-desc { font-size: 13px; color: #666; line-height: 1.55; margin: 0; }

    /* 5-column fix — Bootstrap has no col for 5 */
    .col-5ths {
        width: 20%;
        flex: 0 0 20%;
        max-width: 20%;
        padding-right: calc(var(--bs-gutter-x) * .5);
        padding-left: calc(var(--bs-gutter-x) * .5);
    }

/* Mobile: always 2 columns */
@media (max-width: 767.98px) {
    #productGrid .product-col {
        width: 50% !important;
        flex: 0 0 50% !important;
        max-width: 50% !important;
    }
    
       /* 1 column / list view */
    #productGrid.list-view .product-col {
        width: 100% !important;
        flex: 0 0 100% !important;
        max-width: 100% !important;
    }
    .grid-view .card-body-wrap {
    padding: 12px 6px;
}
.card-title {
    font-size: 12px;
}
.card-price {
    font-size: 11px;
}
    
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


<script>
    window.dataLayer = window.dataLayer || [];

    window.dataLayer.push({
        event: "view_category",

        ecommerce: {
            item_list_id: "{{ $category->id ?? '' }}",
            item_list_name: "{{ $category->name ?? '' }}"
        }
    });

    console.log("view_category fired");
</script>

<section class="breadcrumb-section">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>{{ $category->name }}</h2>

            <ul class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    {{ $category->name }}
                </li>
            </ul>
        </div>
    </div>
</section>





<div class="categryProductLaout">
    <div class="custom-container">

    <!-- Toolbar -->
 <div class="toolbar-wrap">
    <div class="d-flex align-items-center justify-content-center gap-2 flex-wrap">

        <!-- List -->
        <button class="layout-btn active" data-col="1">
            <span class="layout-list-icon"></span>
        </button>

 <!-- 2 Column -->
<button class="layout-btn" data-col="2">
    <div class="view-icon view-2">
        <span></span><span></span>
    </div>
</button>

<!-- 3 Column -->
<button class="layout-btn d-none d-md-block" data-col="3">
    <div class="view-icon view-3">
        <span></span><span></span><span></span>
    </div>
</button>

<!-- 4 Column -->
<button class="layout-btn d-none d-md-block" data-col="4">
    <div class="view-icon view-4">
        <span></span><span></span><span></span><span></span>
    </div>
</button>

<!-- 5 Column -->
<button class="layout-btn d-none d-md-block" data-col="5">
    <div class="view-icon view-5">
        <span></span><span></span><span></span><span></span><span></span>
    </div>
</button>

<!-- 6 Column -->
<button class="layout-btn d-none d-md-block" data-col="6">
    <div class="view-icon view-6">
        <span></span><span></span><span></span>
        <span></span><span></span><span></span>
    </div>
</button>

    </div>
</div>
    
    
    
    
    
    

    <!-- Product Grid -->
    <div id="productGrid" class="row g-3 list-view">
        

        
        

        <!-- Product 1 -->
          @foreach($products as $index => $product)
        <div class="col-12 product-col">
            <a href="{{route('productView',$product->slug?:Str::slug($product->name))}}" class="product-card">
                <div class="card-img-wrap">
                    <img src="{{asset($product->image())}}" alt="Classic Chair">
                </div>
                <div class="card-body-wrap">
                    <p class="card-title">{{Str::limit($product->name,50)}}</p>
                    <p class="card-price">
                        
                        {{priceFullFormat($product->offerPrice())}}/-  
        
                        @if($product->regularPrice() > $product->offerPrice())
                        <del>{{priceFullFormat($product->regularPrice())}}/-</del>
                        @endif 
                        
                         <span>({{$product->discountPercent()}}%)</span>
                    </p>
                    <p class="card-colors">3 colors available</p>
                    <p class="card-desc">Bring timeless elegance to your dining experience with the Classic Chair — where refined design meets everyday comfort. Expertly crafted from high-quality injection-molded plastic, this chair features graceful lines and...</p>
                </div>
            </a>
        </div>
  @endforeach

    </div><!-- /productGrid -->
</div>
</div>





@endsection 
@push('js')



<script>
$(function () {

    const colClassMap = {
        1: 'col-12',
        2: 'col-6',
        3: 'col-4',
        4: 'col-3',
        5: 'col-5ths',
        6: 'col-2'
    };

    $('.layout-btn').on('click', function () {
        const col = parseInt($(this).data('col'));

        $('.layout-btn').removeClass('active');
        $(this).addClass('active');

        const $grid = $('#productGrid');
        const $cols = $grid.find('.product-col');

        $cols.removeClass('col-12 col-6 col-4 col-3 col-5ths col-2');

        $cols.addClass(colClassMap[col]);

        if (col === 1) {
            $grid.removeClass('grid-view cols-2 cols-3 cols-4 cols-5 cols-6')
                 .addClass('list-view');
        } else {
            $grid.removeClass('list-view')
                 .addClass('grid-view cols-' + col);
        }
    });

    // Mobile default = 2 columns
    if ($(window).width() < 768) {
        const $grid = $('#productGrid');
        const $cols = $grid.find('.product-col');

        $cols.removeClass('col-12 col-6 col-4 col-3 col-5ths col-2');
        $cols.addClass('col-6');

        $grid.removeClass('list-view cols-1 cols-3 cols-4 cols-5 cols-6')
             .addClass('grid-view cols-2');

        $('.layout-btn').removeClass('active');
        $('.layout-btn[data-col="2"]').addClass('active');
    }

});
</script>



<script>

$(function () {

  var $parent = $(".range-slider");
  if (!$parent.length) return;

  var $range = $parent.find("input[type=range]");
  var $display = $parent.find(".range-slider-display");

  function updateValues() {
    var min = parseInt($range.eq(0).val());
    var max = parseInt($range.eq(1).val());

    if (min > max) {
      var temp = min;
      min = max;
      max = temp;
    }

    $range.eq(0).val(min);
    $range.eq(1).val(max);

    // $display.text("$" + min.toLocaleString() + " - $" + max.toLocaleString());
  }

  $range.on("input", updateValues);

  updateValues(); // initialize on load
  
   
  $('.shortBy').change(function(){
      var shortBy = $(this).val();
      $('.inputShortBy').val(shortBy);
  });

});

// (function() {

//   var parent = document.querySelector(".range-slider");
//   if(!parent) return;

//   var
//     rangeS = parent.querySelectorAll("input[type=range]"),
//     numberS = parent.querySelectorAll("input[type=number]");

//   rangeS.forEach(function(el) {
//     el.oninput = function() {
//       var slide1 = parseFloat(rangeS[0].value),
//         	slide2 = parseFloat(rangeS[1].value);

//       if (slide1 > slide2) {
// 		[slide1, slide2] = [slide2, slide1];
//       }
//       numberS[0].value = slide1;
//       numberS[1].value = slide2;
//     }
//   });


//   numberS.forEach(function(el) {
//     el.oninput = function() {
// 			var number1 = parseFloat(numberS[0].value),
// 					number2 = parseFloat(numberS[1].value);
			
//       if (number1 > number2) {
//         var tmp = number1;
//         numberS[0].value = number2;
//         numberS[1].value = tmp;
//       }

//       rangeS[0].value = number1;
//       rangeS[1].value = number2;
      

//     }
//   });
  
  

// })();


    $(document).ready(function(){
        

    
    //     $('.min-range, .max-range').on('change', function() {
    //         filterAction();
    //     });
       
    //   $(document).on('change','.priceFilter',function(){
    //         filterAction();
    //   });
       
       $(document).on('change','.filterAction',function(){
           filterAction();
           
       });
       
       function filterAction(){
           var url="{{route('productCategoryFilter')}}";
           var formData = $('.proSideBar').find('select, input').serialize();
           $.ajax({
                url:url,
                dataType: 'json',
                cache: false,
                data:formData,
                success : function(data){

                $('.ajaxProductList').empty().append(data.viewData);
                
                setTimeout(function() {
                }, 200);

                },error: function () {
                    alert('error');
                }
            });
       }
       
       
       
       
    });


</script>

@endpush