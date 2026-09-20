<div class="row">
    <!-- প্রোডাক্ট ইমেজ -->
    <div class="col-md-6">
        <div class="product-thumb" style="aspect-ratio: 1/1; border-radius: 6px; overflow: hidden;">
            <img
                src="{{ asset($product->image()) }}"
                alt="{{ $product->name }}"
                id="qvImage"
                class="w-100 h-100 object-fit-cover"
            />
        </div>
    </div>

    <!-- প্রোডাক্ট ডিটেইলস -->
    <div class="col-md-6">
        <!-- ব্র্যান্ড / ক্যাটাগরি -->
        <div class="product-brand" id="qvBrand">
            {{ optional($product->productCategories->first())->name ?? 'APB' }}
        </div>

        <!-- প্রোডাক্টের নাম -->
        <h5 class="fw-bold mb-2" id="qvTitle">{{ $product->name }}</h5>

        <!-- রেটিং -->
        <div class="product-rating mb-2">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
            ><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i
            ><i class="fa-regular fa-star"></i>
            <span class="rating-count">(0)</span>
        </div>

        <!-- প্রোডাক্ট প্রাইস -->
        <div class="product-price fs-4 mb-3" id="qvPrice">
            @if($product->stockStatus())
                <span>{{ priceFullFormat($product->offerPrice()) }}</span>
                @if($product->regular_price > $product->offerPrice())
                    <del class="text-muted fs-6 ms-2">{{ priceFullFormat($product->regular_price) }}</del>
                @endif
            @else
                <span>{{ priceFullFormat($product->purchase_price) }}</span>
            @endif
        </div>

        <!-- ডেসক্রিপশন -->
        <div class="text-muted small mb-3">
            {!! $product->short_description ?? 'Stock, packaging, and full details will load here from the product page.' !!}
        </div>

        <!-- ফর্ম ও বাটনসমূহ -->
        <form class="addToCartForm" action="{{ route('addToCart', $product->id) }}" method="post">
            @csrf
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-add-cart ajaxaddToCart addToSinBtn" data-product-id="{{ $product->id }}" data-url="{{ route('addToCart', $product->id) }}">
                    <i class="fa-solid fa-cart-shopping me-1"></i> Add To Cart
                </button>

                <button type="submit" name="orderNow" value="order" class="btn btn-buy-now buyNow buyNowSinBtn" data-product-id="{{ $product->id }}">
                    Buy Now
                </button>
            </div>
        </form>
    </div>
</div>
