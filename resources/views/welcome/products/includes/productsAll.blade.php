@if($products->count() > 0)

<div class="row-cols-lg-3 row-cols-md-3 grid-section view-option row g-3 g-xl-4">
  @foreach($products as $index => $product)
  <div> 
    @include(welcomeTheme().'.products.includes.productCard')
    
  </div>
  @endforeach

</div>


<div class="paginationPart">
    {{$products->links('pagination')}}
</div>

@else


<div>
    <p style="text-align: center;font-size: 24px;color: gray;margin-top: 100px;">No Product found</p>
</div>



@endif