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

.pageBannerimg img {
    width: 100%;
    margin-top: 22px;
}

.btn-add-cart {
    background: #fff;
    border: 1.5px solid var(--pink);
    color: var(--pink);
}

 </style>
@endpush 

@section('contents')



<div class="pageBannerimg">
    <div class="container">
        <img src="{{asset($page->image())}}" alt="Personal Care">
    </div>
</div>


<div class="explorLatestProduct mb-4">
    <div class="container">
        <h4>New Arrival</h4>
          <div class="row">
                    @foreach($latestProducts as $product )
                    <div class="col-md-3">
                        <div class="product-item">@include(welcomeTheme().'products.includes.productCard')</div>
                    </div>

                    @endforeach
                </div>
    </div>
</div>


@endsection @push('js') 


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