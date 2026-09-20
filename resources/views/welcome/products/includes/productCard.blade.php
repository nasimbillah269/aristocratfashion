 {{--
 <a href="{{ route('productView',$product->slug?:Str::slug($product->name)) }}" class="prod-card card">
                    <div class="img-box">
                        <img src="{{ asset($product->image()) }}" loading="lazy">
                    </div>
                    <div class="card-body">
                        <div class="prod-name">{{ $product->name }}</div>
                        <div class="prod-price">{{ priceFullFormat($product->offerPrice()) }}/-</div>
                    </div>
                </a>
                --}}
                
<!--<div class="product-card">-->
<!--    <div class="product-thumb">-->
<!--        <span class="badge-stock in">In Stock</span>-->
<!--        <div class="thumb-actions">-->
<!--            <button type="button" aria-label="Compare" data-tooltip="Compare">-->
<!--                <i class="fa-solid fa-code-compare"></i>-->
<!--            </button>-->
<!--            <button-->
<!--                type="button"-->
<!--                aria-label="Quick View"-->
<!--                data-tooltip="Quick View"-->
<!--                data-bs-toggle="modal"-->
<!--                data-bs-target="#quickViewModal"-->
<!--            >-->
<!--                <i class="fa-solid fa-eye"></i>-->
<!--            </button>-->
<!--            <button class="wishlistCompareUpdate" type="button" aria-label="Add to Wishlist" data-tooltip="Add to Wishlist" data-url="{{route('wishlistCompareUpdate',[$product->id,'wishlist'])}}" >-->
<!--                <i class="fa-regular fa-heart"></i>-->
<!--            </button>-->
<!--        </div>-->
<!--        <img src="{{ asset($product->image()) }}" alt="Apple Cider Vinegar Niacinamide Beauty Tablet" />-->
<!--    </div>-->
<!--    <div class="product-body">-->
<!--        <div class="product-brand">APB</div>-->
<!--        <div class="product-title">-->
<!--            <a href="{{ route('productView',$product->slug?:Str::slug($product->name)) }}">{{ $product->name }}</a>-->
<!--        </div>-->
<!--        <div class="product-rating">-->
<!--            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i-->
<!--            ><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>-->
<!--            <span class="rating-count">(0)</span>-->
<!--        </div>-->
<!--        <div class="product-price">৳ 990</div>-->
<!--        <div class="product-sku">SKU: APB-ACV-35</div>-->
<!--        <div class="product-actions">-->
<!--            <button class="btn btn-add-cart"  data-id="{{$product->id}}" data-url="{{route('addToCart',$product->id)}}" -->
<!--            class="addCart {{$product->variation_status?'':'ajaxaddToCart'}}"><i class="fa-solid fa-cart-shopping me-1"></i> Add To Cart</button>-->
<!--            <button class="btn btn-buy-now">Buy Now</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<div class="product-card">
    <div class="product-thumb">
        @if($product->labelTag())
            <span class="badge-stock in">{{ $product->labelTag() }}</span>
        @elseif($product->stock_status ?? false)
            <span class="badge-stock in">In Stock</span>
        @endif

        <div class="thumb-actions">
            <!--<button type="button" aria-label="Compare" data-tooltip="Compare">-->
            <!--    <i class="fa-solid fa-code-compare"></i>-->
            <!--</button>-->

            <button
                type="button"
                class="quickview-trigger"
                data-url="{{ route('productView', $product->slug ?: Str::slug($product->name)) }}"
                aria-label="Quick View"
                data-tooltip="Quick View"
                data-bs-toggle="modal"
                data-bs-target="#quickViewModal"
                data-id="{{ $product->id }}"
            >
                <i class="fa-solid fa-eye"></i>
            </button>

            <button 
                class="wishlistCompareUpdate" 
                type="button" 
                aria-label="Add to Wishlist" 
                data-tooltip="Add to Wishlist" 
                data-url="{{ route('wishlistCompareUpdate', [$product->id, 'wishlist']) }}"
            >
                <i class="{{ $product->isWl() ? 'fa-solid' : 'fa-regular' }} fa-heart"></i>
            </button>
        </div>

        <a href="{{ route('productView',$product->slug?:Str::slug($product->name)) }}">
            <img src="{{ asset($product->image()) }}" alt="{{ $product->name }}" />
        </a>
    </div>

    <div class="product-body">
        @if($product->brand)
            <div class="product-brand">{{ $product->brand->name }}</div>
        @endif

        <div class="product-title">
            <a href="{{ route('productView',$product->slug?:Str::slug($product->name)) }}" title="{{ $product->name }}">
                {{ Str::limit($product->name, 50) }}
            </a>
        </div>

        <div class="product-rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <span class="rating-count">({{ $product->reviews_count ?? 0 }})</span>
        </div>

        <div class="product-price">
            {{ priceFullFormat($product->offerPrice()) }}
            @if($product->regularPrice() > $product->offerPrice())
                <del class="text-muted ms-2" style="font-size: 0.85em;">{{ priceFullFormat($product->regularPrice()) }}</del>
            @endif
        </div>

        @if($product->sku)
            <div class="product-sku">SKU: {{ $product->sku }}</div>
        @endif

        <div class="product-actions">
            @if($product->variation_status)
                <a 
                    href="{{ route('pageView', $product->slug ?: Str::slug($product->name)) }}" 
                    class="btn btn-add-cart"
                >
                    <i class="fa-solid fa-cart-shopping me-1"></i> Add To Cart
                </a>
            @else
                <button 
                    type="button"
                    class="btn btn-add-cart addCart ajaxaddToCart" 
                    data-id="{{ $product->id }}" 
                    data-url="{{ route('addToCart', $product->id) }}"
                >
                    <i class="fa-solid fa-cart-shopping me-1"></i> Add To Cart
                </button>
            @endif
            
                <form class="addToCartForm" action="{{route('addToCart',$product->id)}}" method="post">
        @csrf

      



            <!-- Buy Now -->
            <button type="submit" name="orderNow" value="order" class=" buyNow buyNowSinBtn btn" data-product-id="{{ $product->id }}" style="background-color: #e91e63; color: #fff;">
                <i class="fas fa-bolt"></i> Buy Now
            </button>

    </form>

            
                 
        </div>
    </div>
</div>

