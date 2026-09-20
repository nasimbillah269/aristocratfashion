 
                
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
<!--            <button class="wishlistCompareUpdate" type="button" aria-label="Add to Wishlist" data-tooltip="Add to Wishlist" data-url="<?php echo e(route('wishlistCompareUpdate',[$product->id,'wishlist'])); ?>" >-->
<!--                <i class="fa-regular fa-heart"></i>-->
<!--            </button>-->
<!--        </div>-->
<!--        <img src="<?php echo e(asset($product->image())); ?>" alt="Apple Cider Vinegar Niacinamide Beauty Tablet" />-->
<!--    </div>-->
<!--    <div class="product-body">-->
<!--        <div class="product-brand">APB</div>-->
<!--        <div class="product-title">-->
<!--            <a href="<?php echo e(route('productView',$product->slug?:Str::slug($product->name))); ?>"><?php echo e($product->name); ?></a>-->
<!--        </div>-->
<!--        <div class="product-rating">-->
<!--            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i-->
<!--            ><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i>-->
<!--            <span class="rating-count">(0)</span>-->
<!--        </div>-->
<!--        <div class="product-price">৳ 990</div>-->
<!--        <div class="product-sku">SKU: APB-ACV-35</div>-->
<!--        <div class="product-actions">-->
<!--            <button class="btn btn-add-cart"  data-id="<?php echo e($product->id); ?>" data-url="<?php echo e(route('addToCart',$product->id)); ?>" -->
<!--            class="addCart <?php echo e($product->variation_status?'':'ajaxaddToCart'); ?>"><i class="fa-solid fa-cart-shopping me-1"></i> Add To Cart</button>-->
<!--            <button class="btn btn-buy-now">Buy Now</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<div class="product-card">
    <div class="product-thumb">
        <?php if($product->labelTag()): ?>
            <span class="badge-stock in"><?php echo e($product->labelTag()); ?></span>
        <?php elseif($product->stock_status ?? false): ?>
            <span class="badge-stock in">In Stock</span>
        <?php endif; ?>

        <div class="thumb-actions">
            <!--<button type="button" aria-label="Compare" data-tooltip="Compare">-->
            <!--    <i class="fa-solid fa-code-compare"></i>-->
            <!--</button>-->

            <button
                type="button"
                class="quickview-trigger"
                data-url="<?php echo e(route('productView', $product->slug ?: Str::slug($product->name))); ?>"
                aria-label="Quick View"
                data-tooltip="Quick View"
                data-bs-toggle="modal"
                data-bs-target="#quickViewModal"
                data-id="<?php echo e($product->id); ?>"
            >
                <i class="fa-solid fa-eye"></i>
            </button>

            <button 
                class="wishlistCompareUpdate" 
                type="button" 
                aria-label="Add to Wishlist" 
                data-tooltip="Add to Wishlist" 
                data-url="<?php echo e(route('wishlistCompareUpdate', [$product->id, 'wishlist'])); ?>"
            >
                <i class="<?php echo e($product->isWl() ? 'fa-solid' : 'fa-regular'); ?> fa-heart"></i>
            </button>
        </div>

        <a href="<?php echo e(route('productView',$product->slug?:Str::slug($product->name))); ?>">
            <img src="<?php echo e(asset($product->image())); ?>" alt="<?php echo e($product->name); ?>" />
        </a>
    </div>

    <div class="product-body">
        <?php if($product->brand): ?>
            <div class="product-brand"><?php echo e($product->brand->name); ?></div>
        <?php endif; ?>

        <div class="product-title">
            <a href="<?php echo e(route('productView',$product->slug?:Str::slug($product->name))); ?>" title="<?php echo e($product->name); ?>">
                <?php echo e(Str::limit($product->name, 50)); ?>

            </a>
        </div>

        <div class="product-rating">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <span class="rating-count">(<?php echo e($product->reviews_count ?? 0); ?>)</span>
        </div>

        <div class="product-price">
            <?php echo e(priceFullFormat($product->offerPrice())); ?>

            <?php if($product->regularPrice() > $product->offerPrice()): ?>
                <del class="text-muted ms-2" style="font-size: 0.85em;"><?php echo e(priceFullFormat($product->regularPrice())); ?></del>
            <?php endif; ?>
        </div>

        <?php if($product->sku): ?>
            <div class="product-sku">SKU: <?php echo e($product->sku); ?></div>
        <?php endif; ?>

        <div class="product-actions">
            <?php if($product->variation_status): ?>
                <a 
                    href="<?php echo e(route('pageView', $product->slug ?: Str::slug($product->name))); ?>" 
                    class="btn btn-add-cart"
                >
                    <i class="fa-solid fa-cart-shopping me-1"></i> Add To Cart
                </a>
            <?php else: ?>
                <button 
                    type="button"
                    class="btn btn-add-cart addCart ajaxaddToCart" 
                    data-id="<?php echo e($product->id); ?>" 
                    data-url="<?php echo e(route('addToCart', $product->id)); ?>"
                >
                    <i class="fa-solid fa-cart-shopping me-1"></i> Add To Cart
                </button>
            <?php endif; ?>
            
                <form class="addToCartForm" action="<?php echo e(route('addToCart',$product->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

      



            <!-- Buy Now -->
            <button type="submit" name="orderNow" value="order" class=" buyNow buyNowSinBtn btn" data-product-id="<?php echo e($product->id); ?>" style="background-color: #e91e63; color: #fff;">
                <i class="fas fa-bolt"></i> Buy Now
            </button>

    </form>

            
                 
        </div>
    </div>
</div>

<?php /**PATH D:\xampp\htdocs\aristocratfashion\resources\views/welcome/products/includes/productCard.blade.php ENDPATH**/ ?>